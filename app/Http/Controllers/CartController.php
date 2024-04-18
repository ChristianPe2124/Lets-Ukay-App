<?php

namespace App\Http\Controllers;

use App\Mail\OrderDelivered;
use App\Mail\OrderRequest;
use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\RequestProducts;
use App\Models\TransactionRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            return view('user.Shopping.cart', compact('cart_order', 'cart_order_count', 'user', 'firstName', 'price_summary'));
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

            $order_date = Carbon::now()->format('Ymd') . $product_id . '-' . $user->id;

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
            $cart->order_date = $order_date;
            $cart->save();
            // update product status
            $status = Product::where('product_id', $product_id)
                ->update(array(
                    'status' => $cart->status,
                    'buyer_id' => $user->id,
                    'order_date' => $order_date,
                ));

            toastr()->success('Data has been saved successfully!', ['timeOut' => 3000]);
            return redirect()->back();
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
        toastr()->success('Delete Successfully', ['timeOut' => 3000]);
        return redirect()->route('cart');
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
            "success" => toastr()->success('Successfully remove on cart?'),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function myOrders()
    {
        if (Auth::check()) {
            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $orders = DB::table('order_details')
                ->select('name', 'status', 'created_at', DB::raw('COUNT(user_id) as quantity'), 'user_id', 'id', DB::raw('SUM(price) as total'))
                ->where('user_id', Auth::id())
                ->groupBy('created_at')
                ->orderBy('status', 'DESC')
                ->paginate(10);
            return view('user.Shopping.orders', compact('orders', 'firstName'));
        }
        return view('auth.login');
    }
    public function orderDetails($id, $created_at)
    {
        if (Auth::check()) {
            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            //  Get Order Details from DB
            $price_summary = OrderDetails::where('user_id', $id)->where('created_at', $created_at)->sum('price');
            $status = OrderDetails::where('user_id', $id)->where('created_at', $created_at)->get(['status']);
            $delivery_price = $price_summary + 50;

            $OrderDetails = OrderDetails::where('user_id', $id)->where('created_at', $created_at)->get();
            $cart_order = Cart::where('user_id', $user->id)->get();

            return view('user.Shopping.order-details',
                compact('user', 'cart_order', 'OrderDetails', 'firstName',
                    'price_summary', 'delivery_price', 'status'));
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

            $orderPin = time() . '-' . $cart[0]['user_id'];

            $order_date = $cart->pluck('order_date');

            $sender = Auth()->user()->email;
            $toEmail = "shielape14@gmail.com";
            $message = "Your customer  " . ucfirst(trans($firstName)) . " has been purchased. Please check the details on the Admin Dashboard.";
            $subject = "Let’s Ukay Client Order Request ";

            $response = Mail::to($toEmail)->send(new OrderRequest($message, $subject, $sender));
            // dd($response);

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
                        'order_pin' => $orderPin,
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
                        'order_pin' => $orderPin,
                    ]);
                }
                // update product status

                Product::whereIn('order_date', $order_date)->update(array(
                    'status' => "Processing",
                    'buyer_id' => $id,
                    'order_pin' => $orderPin,
                ));

                // Delete each cart after submitting order
                $cart->each->delete();

                toastr()->success('Successfully Ordered!', ['timeOut' => 5000]);
                return redirect()->route('cart');
            }
        }
        return view('auth.login');
    }

    public function orderDelivered(Request $request)
    {
        if (Auth::check()) {

            $date = $request->created_at;
            $id = Auth()->user()->id;

            $orderDetails = OrderDetails::where('user_id', $id)->where('created_at', $date)->get();
            $transaction = TransactionRecord::where('user_id', $id)->where('created_at', $date)->get();

            $subject = "Ka-Ukay! Your Order Has Been Delivered ";
            $toEmail = Auth()->user()->email;
            $message = "Dear " . ucfirst(trans(Auth()->user()->name)) . ", <br><br>
            We're excited to inform you that your order has been successfully delivered!
            We hope you're as thrilled to receive your items as we were to send them to you. <br><br>
            <strong>Order Details:</strong> <br><br>
            •	Order Number: [Order Number] <br>
            •	Shipping Address: [Shipping Address] <br>
            •	Delivery Date: [Delivery Date] <br><br>
            <strong>What's Next?</strong> We hope everything arrived in perfect condition and meets your expectations.
            If you have any questions, or feedback, or need assistance with your order, please don't hesitate to reach
            our email and contact number [ukayletsukay@gmail.com or +63-xxx-xxx-xxxx].
            Your satisfaction is our top priority, and we're here to help in any way we can. <br><br>
            <strong>Share Your Experience</strong>: We would love to hear about your shopping experience with us.
            Your feedback helps us improve our products and services for future customers. Feel free to leave a review
            on our email or your favorite review platform. <br><br>
            Thank you for choosing Let’s Ukay! We appreciate your business and hope to serve you again in the future.
            "
            ;

            $response = Mail::to($toEmail)->send(new OrderDelivered($message, $subject));
            // dd($response, $toEmail);

            $order_pin = $transaction[0]['order_pin'];
            $product = Product::where('order_pin', $order_pin)->get();
            $product->each->delete();

            $orderDetails->each->update(array(
                'status' => "Delivered",
            ));
            $transaction->each->update(array(
                'status' => "Delivered",
            ));

            toastr()->success('Successfully Received!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('orders');

        }
        return view('auth.login');
    }
}
