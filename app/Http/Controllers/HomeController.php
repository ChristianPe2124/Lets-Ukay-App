<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        $user = Auth()->user();

        $name = Auth()->user()->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0];

        if (Auth::check()) {
            $is_admin = auth()->user()->is_admin == "1";
            if ($is_admin) {
                $products = DB::table('products')->get();
                return view('adminHome', compact('products', 'firstName'));
            }
            $cart_order = Cart::where('user_id', $user->id)->get();
            return view('welcome', compact('cart_order', 'firstName'));
        }
    }
    public function index()
    {
        $user = Auth()->user();

        $name = Auth()->user()->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0];

        if (Auth::check()) {
            $is_admin = auth()->user()->is_admin == "1";
            if ($is_admin) {
                $products = DB::table('products')->get();
                return view('adminHome', compact('products', 'firstName'));
            }
            $cart_order = Cart::where('user_id', $user->id)->get();
            return view('welcome', compact('cart_order', 'firstName'));
        }
    }
    public function adminHome()
    {
        $user = Auth()->user();
        $name = Auth()->user()->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0];
        $products = DB::table('products')->get();
        return view('adminHome', compact('products', 'firstName'));
    }
}
