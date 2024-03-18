<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $user = Auth()->user();
            $cart_order = Cart::where('user_id', $user->id)->get();
            return view('cart', compact('cart_order'));
        }
        return view('login');
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
            $cart->status = "pending";
            $cart->src = $cart_product->src;
            $cart->user_id = $user->id;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->save();
            // update product status
            $status = Product::where('product_id', $product_id)->update(array(
                'status' => $cart->status,
            ));
            $product = new Product;
            $product->status = $status;
            $product->update();

            return redirect()->back()->with('success', 'Successfully added item');
        }
        return view('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
