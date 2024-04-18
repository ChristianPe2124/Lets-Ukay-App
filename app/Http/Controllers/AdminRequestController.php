<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\RequestProducts;
use App\Models\TransactionRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
                ->select(DB::raw('count(user_id) as quantity', ), 'name', 'email', 'status', 'user_id', 'order_pin')
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

            $user = User::find($id);
            return view('admin.Request.request-process', compact('requestProcess', 'firstName', 'user'));
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

            $user = User::find($id);
            return view('admin.Request.request-view', compact('OrderDetails', 'clientID', 'firstName', 'user'));
        }
        return view('auth.login');
    }
    public function requestCreate(Request $request)
    {
        if (Auth::check()) {

            $created_at = $request->created_at;
            $id = (int) $request->user_id;

            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $requestCreate = RequestProducts::where('user_id', $id)->where('created_at', $created_at)->get();

            $toEmail = $requestCreate[0]['email'];
            $message = "Dear " . ucfirst(trans($requestCreate[0]['name'])) . ", <br><br>
            We're excited to inform you that your order has been shipped! Your satisfaction is our top priority,
            and we're thrilled to let you know that your items are on their way to you. <br><br>
            <strong>Order Details:</strong> <br><br>
            •	Order Number: [Order Number] <br>
            •	Shipping Address: [Shipping Address] <br>
            •	Estimated Delivery Date: [Estimated Delivery Date] <br><br>
            <strong>Tracking Information</strong>: To track your order, please use the following tracking number: [Tracking Number].
            You can track your order's progress on our website or through the carrier's website. <br><br>
            <strong>What's Next?</strong> Once your order arrives, we hope you enjoy your new items. If you have any questions or concerns
            about your order, feel free to reach out to our email and contact number
            [ukayletsukay@gmail.com or +63-xxx-xxx-xxxx]. We're here to assist you every step of the way. <br><br>
            Thank you for choosing Let’s Ukay! We appreciate your business and look forward to serving you again in the future."
            ;
            $subject = "Ka-Ukay! Your Order Has Been Shipped ";

            $response = Mail::to($toEmail)->send(new OrderShipped($message, $subject));

            // dd($response);

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
                    'order_pin' => $requestCreate[$i]['order_pin'],
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
            Product::where('order_pin', $requestCreate[0]['order_pin'])->update(array(
                'status' => "Shipped",
            ));

            toastr()->success('Successfully Submit', 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('request');
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
            $user = User::find($id);
            return view('admin.Transaction.transaction-history', compact('transaction', 'firstName', 'user'));
        }
        return view('auth.login');
    }
    public function transactionDestroy(Request $request)
    {
        if (Auth::check()) {
            $orderRequest = RequestProducts::where('user_id', $request->user_id)
                ->where('order_pin', $request->order_pin)
                ->get();
            $orderRequest->each->delete();

            $OrderDetails = OrderDetails::where('user_id', $request->user_id)
                ->where('order_pin', $request->order_pin)
                ->get();
            $OrderDetails->each->delete();

            Product::where('order_pin', $request->order_pin)->update(array(
                'status' => 'instock',
                'buyer_id' => null,
                'order_pin' => null,
                'order_date' => null,
            ));

            toastr()->success('Order has been cancelled', ['timeOut' => 5000]);
            return redirect()->route('request');
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
