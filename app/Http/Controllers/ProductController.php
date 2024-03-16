<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function buyPage()
    {
        if (Auth::check()) {
            return view('buy');
        }
        return view('auth.login');
    }
}
