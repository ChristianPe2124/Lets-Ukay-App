<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function buyPage()
    {
        if (Auth::check()) {
            $is_admin = auth()->user()->is_admin == "1";
            if ($is_admin) {
                $products = DB::table('products')->get();
                return view('adminHome', compact('products'));
            }
            $buy_products = DB::table('products')->where('status', '=', 'instock')->orderBy('created_at', 'desc')->paginate(10);
            $productCount = DB::table('products')->where('status', '=', 'instock')->orderBy('created_at', 'desc')->get();
            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $cart_order = Cart::where('user_id', $user->id)->get();
            return view('user.Shopping.buy', compact('buy_products', 'productCount', 'cart_order', 'firstName'));
        }
        return view('auth.login');
    }
    public function category(Request $request)
    {

        dd($request->all());
        $product_category = Product::find();
    }
}
