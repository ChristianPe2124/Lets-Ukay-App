<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                $products = DB::table('products')
                    ->orderBy('status', 'ASC')
                    ->get();
                return view('admin.adminHome', compact('products', 'firstName'));
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
                return view('admin.adminHome', compact('products', 'firstName'));
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
        $products = DB::table('products')
            ->where('status', 'like', "instock")
            ->orWhere('status', 'like', "outofstock")
            ->orWhere('status', 'like', "Processing")
            ->orWhere('status', 'like', "Pending")
            ->orderBy('buyer_id', 'ASC')
            ->get();
        return view('admin.adminHome', compact('products', 'firstName'));
    }

    public function myAccount()
    {
        $user = Auth()->user();
        $name = Auth()->user()->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0];

        if (Auth::check()) {
            return view('User.MyAccount.my_account', compact('firstName'));
        }
        return view('auth.login');
    }
    public function editMyAccount(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required|max:10',
            'address' => 'nullable',
        ]);

        $user = User::findOrFail(Auth()->user()->id);

        if (Hash::check($request->old_password, $user->password)) {

            User::where('id', auth()->user()->id)->update(array(
                'name' => $request->fullname,
                'email' => $request->email,
                'contact_no' => $request->phoneNumber,
                'address' => $request->address,
                'password' => Hash::make($request->new_password),
            ));

            toastr()->success('Account Updated Successfully', 'Congrats', ['timeOut' => 5000]);
            return redirect()->back();

        } else {

            User::where('id', auth()->user()->id)->update(array(
                'name' => $request->fullname,
                'email' => $request->email,
                'contact_no' => $request->phoneNumber,
                'address' => $request->address,
            ));

            toastr()->success('Account Updated Successfully', 'Congrats', ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
}
