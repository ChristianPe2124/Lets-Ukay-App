<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\RequestProducts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        if (Auth::check()) {
            $is_admin = auth()->user()->is_admin == "1";
            if ($is_admin) {
                $products = DB::table('products')->get();
                return view('adminHome', compact('products'));
            }
            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];
            $price_summary = Cart::where('user_id', $user->id)->sum('price');
            $cart_order_count = Cart::where('user_id', $user->id)->get();
            $cart_order = Cart::where('user_id', $user->id)->paginate(5);
            return view('cart', compact('cart_order', 'cart_order_count', 'user', 'firstName', 'price_summary'));
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $product_id)
    {
        if (Auth::check()) {
            // user account details
            $user = auth()->user();

            // product details
            $cart_product = Product::find($product_id);
            // add to cart
            $cart = new Cart;
            $cart->product_name = $cart_product->product_name;
            $cart->product_desc = $cart_product->product_desc;
            $cart->productID = $cart_product->product_id;
            $cart->status = "pending";
            $cart->price = $cart_product->price;
            $cart->src = $cart_product->src;
            $cart->user_id = $user->id;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->save();
            // update product status
            $status = Product::where('product_id', $product_id)
                ->update(array(
                    'status' => $cart->status,
                    'buyer_id' => $user->id,
                ));
            /*  $product = new Product;
            $product->status = $status;
            $product->update(); */

            return redirect()->back()->with('success', 'Successfully added item');
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Destroy
        $cart_order = Cart::find($id);
        $cart_status = $cart_order->status;
        $cart_buyer_id = $cart_order->user_id;
        $cart_product_id = $cart_order->productID;
        $cart_order->delete();

        // Update product status
        $product_id = Product::where('product_id', $cart_product_id)->update(array(
            'status' => "instock",
            'buyer_id' => null,
        ));
        return redirect()->route('cart')->with('success', 'Delete Successfully');
    }

    public function destroyAllSelected(Request $request)
    {
        $ids = $request->ids;

        Cart::whereIn('productID', explode(",", $ids))->delete();
        // update product status and buyer
        Product::whereIn('product_id', explode(",", $ids))->update(array(
            'status' => "instock",
            'buyer_id' => null,
        ));
        return response()->json([
            "success" => "Product have been deleted!",
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderDetails(Request $request)
    {
        if (Auth::check()) {
            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            //  Get Order Details from DB
            $price_summary = OrderDetails::where('user_id', $user->id)->sum('price');
            $status = OrderDetails::where('user_id', $user->id)->get(['status']);
            $delivery_price = $price_summary + 50;
            $OrderDetails = OrderDetails::where('user_id', $user->id)->groupBy('created_at')->get();
            $cart_order = Cart::where('user_id', $user->id)->get();

            return view('order-details', compact('user', 'cart_order', 'OrderDetails', 'firstName', 'price_summary', 'delivery_price', 'status'));
        }
        return view('auth.login');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderDetailsCreate()
    {
        if (Auth::check()) {
            // Name and Id
            $id = Auth()->user()->id;
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            // Create Order Details and Delete Cart Items
            $cart = Cart::where('user_id', $id)->get();
            $OrderDetails = OrderDetails::where('user_id', $id)->get();
            $requestProducts = RequestProducts::where('user_id', $id)->get();
            // dd($requestProducts);
            if (count($cart) === 0) {
                return redirect()->route('cart')->with('error', 'Please place some order!');
            } else {
                // Create Order Details
                for ($i = 0; $i < count($cart); $i++) {
                    OrderDetails::firstOrCreate([
                        'name' => $cart[$i]['name'],
                        'email' => $cart[$i]['email'],
                        'product_name' => $cart[$i]['product_name'],
                        'product_desc' => $cart[$i]['product_desc'],
                        'src' => $cart[$i]['src'],
                        'price' => $cart[$i]['price'],
                        'status' => "Processing",
                        'product_id' => $cart[$i]['productID'],
                        'user_id' => $id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                // Create request_products table
                for ($i = 0; $i < count($cart); $i++) {
                    RequestProducts::firstOrCreate([
                        'name' => $cart[$i]['name'],
                        'email' => $cart[$i]['email'],
                        'product_name' => $cart[$i]['product_name'],
                        'product_desc' => $cart[$i]['product_desc'],
                        'src' => $cart[$i]['src'],
                        'price' => $cart[$i]['price'],
                        'status' => "Processing",
                        'product_id' => $cart[$i]['productID'],
                        'user_id' => $cart[$i]['user_id'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                // update product status
                Product::whereIn('buyer_id', [$id])->update(array(
                    'status' => "Processing",
                    'buyer_id' => $id,
                ));

                // Delete each cart after submitting order
                $cart->each->delete();

                return redirect()->route('cart')->with('success', 'Successfully Ordered!');
            }
        }
        return view('auth.login');
    }
}
