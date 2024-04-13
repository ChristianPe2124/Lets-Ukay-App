<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sellPage()
    {
        if (Auth::check()) {
            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $cart_order = Cart::where('user_id', $user->id)->get();
            return view('user.sell-view', compact('cart_order', 'firstName'));
        }
        return view('auth.login');
    }
    public function sellMail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $toEmail = $request->email;
        $message = "
                    Welcome ka-Ukay!, Congratulations for joining our platform.
                    We are glad to have you on board.
                    We are a platform that connects buyers and sellers.
                    We are here to help you sell your products.
                    ";
        $subject = "Ka-Ukay Selling Platform";

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject));

        if (!$response) {
            return redirect()->route('sell')->with('error', 'Something went wrong!');
        }
        return redirect()->route('sell')->with('success', 'Email sent successfully!');
    }
    public function donatePage(Request $request)
    {
        if (Auth::check()) {
            $user = Auth()->user();
            $name = Auth()->user()->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0];

            $cart_order = Cart::where('user_id', $user->id)->get();
            return view('user.donate-view', compact('cart_order', 'firstName'));
        }
        return view('auth.login');
    }
    public function donateMail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $toEmail = $request->email;
        $message = "
                    Welcome ka-Ukay!, Congratulations for joining our platform.
                    We are glad to have you on board.
                    We are here to help you donate your products.
                    We are a platform that connects buyers and sellers.
                    ";
        $subject = "Ka-Ukay Donation Platform";

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject));

        if (!$response) {
            return redirect()->route('sell')->with('error', 'Something went wrong!');
        }
        return redirect()->route('sell')->with('success', 'Email sent successfully!');
    }
}
