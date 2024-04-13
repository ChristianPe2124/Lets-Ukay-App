<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\RequestProducts;
use App\Models\TransactionRecord;
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
                ->where('status', 'Processing')
                ->select(DB::raw('count(user_id) as quantity', ), 'name', 'email', 'status', 'user_id')
                ->get();
            return view('admin.Request.request', compact('order_product', 'firstName'));
        }
        return view('auth.login');
    }
    public function request_process($id, $created_at)
    {
        if (Auth::check()) {

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $requestProcess = RequestProducts::where('user_id', $id)->where('created_at', $created_at)->get();

            return view('admin.Request.request-process', compact('requestProcess', 'firstName'));
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

            $OrderDetails = OrderDetails::where('user_id', $id)
                ->where('status', 'Processing')
                ->groupBy('created_at')
                ->select(DB::raw('count(user_id) as quantity', ), 'name', 'email', 'status', 'user_id', 'created_at')
                ->get();
            return view('admin.Request.request-view', compact('OrderDetails', 'clientID', 'firstName'));
        }
        return view('auth.login');
    }
    public function requestCreate(Request $request)
    {
        if (Auth::check()) {

            $created_at = $request->created_at;
            $id = (int) $request->user_id;

            $requestCreate = RequestProducts::where('user_id', $id)->where('created_at', $created_at)->get();
            for ($i = 0; $i < count($requestCreate); $i++) {
                TransactionRecord::firstOrCreate([
                    'name' => $requestCreate[$i]['name'],
                    'email' => $requestCreate[$i]['email'],
                    'src' => $requestCreate[$i]['src'],
                    'product_id' => $requestCreate[$i]['product_id'],
                    'status' => 'Shipped',
                    'created_at' => $created_at,
                    'user_id' => $id,
                    'price' => $requestCreate[$i]['price'],
                ]);
            }

            $requestCreateDelete = RequestProducts::where('user_id', $id)->where('created_at', $created_at)->get();
            $requestCreateDelete->each->delete();

            OrderDetails::where('user_id', $id)->where('created_at', $created_at)->update(array(
                'status' => "Shipped",
            ));
            RequestProducts::where('user_id', $id)->where('created_at', $created_at)->update(array(
                'status' => "Shipped",
            ));

            return redirect()->route('request')->with('success', 'Successfully Submit');
        }
        return view('auth.login');
    }
    public function transaction()
    {
        if (Auth::check()) {

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $transaction = TransactionRecord::groupBy('user_id')
                ->select(DB::raw('count(user_id) as quantity'), 'name', 'email', 'status', 'created_at', 'user_id')
                ->get();

            return view('admin.Transaction.transaction', compact('transaction', 'firstName'));
        }
        return view('auth.login');
    }
    public function transactionView($id, $created_at)
    {
        if (Auth::check()) {

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $transaction = TransactionRecord::groupBy('created_at')
                ->where('user_id', $id)
                ->select(DB::raw('count(user_id) as quantity'),
                    DB::raw('SUM(price) as price'), 'name', 'email', 'status', 'created_at', 'user_id')
                ->get();

            return view('admin.Transaction.transaction-view', compact('transaction', 'firstName'));
        }
        return view('auth.login');
    }
    public function transactionHistory($id, $created_at)
    {
        if (Auth::check()) {

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $transaction = TransactionRecord::where('user_id', $id)->where('created_at', $created_at)
                ->get();

            return view('admin.Transaction.transaction-history', compact('transaction', 'firstName'));
        }
        return view('auth.login');
    }
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
