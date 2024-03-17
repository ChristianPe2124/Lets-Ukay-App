<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function buyPage()
    {
        if (Auth::check()) {
            $buy_products = DB::table('products')->where('status', '=', 'active')->orderBy('created_at', 'desc')->get();
            return view('buy', compact('buy_products'));
        }
        return view('auth.login');
    }
}
