<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\RequestProducts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function request()
    {
        if (Auth::check()) {

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $order_product = RequestProducts::groupBy(DB::raw('user_id'))
                ->select(DB::raw('count(user_id) as quantity', ), 'name', 'email', 'status', 'user_id')
                ->get();
            return view('request', compact('order_product', 'firstName'));
        }
        return view('login');
    }
    public function requestCreate()
    {
        if (Auth::check()) {

            $cart_order = Cart::where('user_id', Auth::User()->id)->get(['name', 'email', 'status', 'src', 'productID']);
            $order_product = RequestProducts::where('user_id', Auth::user()->id)->get();

            if ($order_product) {
                $order_product->each->delete();
            }
            for ($i = 0; $i < count($cart_order); $i++) {
                RequestProducts::firstOrCreate([
                    'name' => $cart_order[$i]['name'],
                    'email' => $cart_order[$i]['email'],
                    'status' => $cart_order[$i]['status'],
                    'src' => $cart_order[$i]['src'],
                    'product_id' => $cart_order[$i]['productID'],
                    'user_id' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            return redirect()->route('cart')->with('success', 'Successfully Submit');
        }
        return view('auth.login');
    }
    public function requestView($id)
    {
        if (Auth::check()) {

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];
            $clientID = $id;

            $OrderDetails = OrderDetails::where('user_id', $id)->get();
            return view('request-view', compact('OrderDetails', 'clientID', 'firstName'));
        }
        return view('auth.login');
    }
    public function transaction()
    {
        if (Auth::check()) {

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            return view('transaction', compact('firstName'));
        }
        return view('auth.login');
    }
    public function transactionApprove(Request $request)
    {
        if (Auth::check()) {
            $orderRequest = RequestProducts::where('user_id', $request->clientID)->get();
            dd($orderRequest);
            // return redirect()->route('request')->with('success', 'Transaction has been cancel');
        }
        return view('auth.login');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transactionDestroy(Request $request)
    {
        if (Auth::check()) {
            $orderRequest = RequestProducts::where('user_id', $request->clientID)->get();
            dd($orderRequest);
        }
        return view('auth.login');
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
}
