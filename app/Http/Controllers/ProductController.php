<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $category = $request->selectedCategory;
        $min = $request->minNumber;
        $max = $request->maxNumber;

        if (Auth::check()) {
            $is_admin = auth()->user()->is_admin == "1";
            if ($is_admin) {
                $products = DB::table('products')
                    ->get();
                return view('adminHome', compact('products'));
            }

            if (empty($min) && empty($max)) {
                if ($category == "All") {
                    $buy_products = DB::table('products')
                        ->where('status', '=', 'instock')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

                    $productCount = DB::table('products')->where('status', '=', 'instock')
                        ->orderBy('created_at', 'desc')
                    // ->where('category', $category)
                        ->get();

                } else {
                    $buy_products = DB::table('products')
                        ->where('status', '=', 'instock')
                        ->where('category', $category)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

                    $productCount = DB::table('products')->where('status', '=', 'instock')
                        ->orderBy('created_at', 'desc')
                        ->where('category', $category)
                        ->get();
                }
            } elseif (empty($min) || empty($max)) {
                if ($category == "All") {
                    $buy_products = DB::table('products')
                        ->where('status', '=', 'instock')
                        ->WhereBetween('price', ["0", $max])
                        ->orWhereBetween('price', [$min, "5000"])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

                    $productCount = DB::table('products')->where('status', '=', 'instock')
                        ->orderBy('created_at', 'desc')
                        ->get();
                } else {
                    $buy_products = DB::table('products')
                        ->where('status', '=', 'instock')
                        ->WhereBetween('price', ["0", $max])
                        ->orWhereBetween('price', [$min, "5000"])
                        ->where('category', $category)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

                    $productCount = DB::table('products')->where('status', '=', 'instock')
                        ->orderBy('created_at', 'desc')
                        ->get();
                }
            } else {
                if ($category == "All") {
                    $buy_products = DB::table('products')
                        ->where('status', '=', 'instock')
                        ->whereBetween('price', [$min, $max])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

                    $productCount = DB::table('products')->where('status', '=', 'instock')
                        ->orderBy('created_at', 'desc')
                        ->whereBetween('price', [$min, $max])
                        ->get();
                } else {
                    $buy_products = DB::table('products')
                        ->where('status', '=', 'instock')
                        ->where('category', $category)
                        ->whereBetween('price', [$min, $max])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

                    $productCount = DB::table('products')->where('status', '=', 'instock')
                        ->orderBy('created_at', 'desc')
                        ->whereBetween('price', [$min, $max])
                        ->get();
                }
            }

            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $cart_order = Cart::where('user_id', $user->id)->get();
            return view('user.Shopping.buy', compact('buy_products', 'productCount', 'cart_order', 'firstName'));
        }
    }
}
