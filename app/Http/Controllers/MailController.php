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

        $user = Auth()->user();
        $name = Auth()->user()->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0];

        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $toEmail = $request->email;
        $message = "Dear " . ucfirst(trans($firstName)) . ", <br><br>
        Are you ready to skyrocket and sell your thrift items to new heights of success? Look no further!
        At Let’s Ukay, we specialize in providing top-notch selling services to maximize your pre-loved items
        and enjoy our community. <br><br>
        Here's how we can help you: <br><br>
        •	Optimized your items in our product listings: Say goodbye to lackluster product descriptions and images.
            We'll optimize your items in our product listings to captivate the audience and compel them to make a purchase. <br>
        •	Dedicated Support and Guidance: Our team is committed to your success. You'll have access to dedicated
            support and guidance every step of the way. <br><br>
        How it works: <br><br>
        We will help to clean out your closet Ka-Ukay! <br><br>
        1. Fill up your kit. Free up space in your closet by filling any box or bag with
        gently used items you no longer wear, need, or love. <br>
        2. Send us your stuff. Please add your email so we can send our contact details and we can
        talk together about shipping and prices of your items. Items that meet our quality standards are photographed,
        listed, and shipped to our fellow ka-Ukay. <br>
        3. We do the rest! Now it's ready to sell! We work to ensure your items sell as quickly as possible. <br><br>
        If you have any questions, or feedback, or need assistance with your order, please don't hesitate to reach our
        email and contact number [ukayletsukay@gmail.com or +63-xxx-xxx-xxxx]. Your satisfaction is our top priority,
        and we're here to help in any way we can. <br><br>
        We look forward to helping you sell your pre-loved items! <br>"
        ;
        $subject = "Subject: Let’s Ukay Selling Platform";
        $header = "We do the selling. You take the credit.";

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject, $header));

        if (!$response) {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            return redirect()->route('sell');
        }
        toastr()->success('Email sent successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('sell');
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

        $user = Auth()->user();
        $name = Auth()->user()->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0];

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $toEmail = $request->email;
        $message = "Dear " . ucfirst(trans($firstName)) . ", <br><br>
        I hope this email finds you well. As we approach, we have a donation section on our website.
        We are reaching out to our community to ask for your support in a special initiative to provide clothing
        to those in need. <br><br>
        Now, we're launching a clothing drive to collect new and gently used clothing items for individuals
        and families who are experiencing homelessness or facing economic hardship. Your donation of clothes can
        make a significant difference in someone's life by providing warmth, comfort, and dignity. <br><br>
        We are accepting donations of the following items: <br><br>
        •	Men's, Women's, and Children's Clothing: Including shirts, pants, dresses, jackets, sweaters, and more. <br>
        •	Outerwear: Coats, jackets, scarves, hats, and gloves to help keep individuals warm during the colder months. <br>
        •	Footwear: Shoes, boots, and sneakers in good condition. <br><br>
        If you have any gently used clothing items that you no longer need or if you'd like to purchase new items
        to donate, we would be incredibly grateful for your contribution. <br><br>
        You can contact us on how to donate; <br><br>
        Contact Number: +63-xxx-xxx-xxxx <br><br>
        Address: Xxxx Xxx Xxxx <br><br>
        Once the donation is processed, we will send the details that it’s been delivered to your preferred organizations. <br><br>
        Your generosity can make a tangible difference in the lives of those in need, providing them with essential clothing and a sense of dignity and hope. <br><br>
        Thank you for considering this request and for your continued support of the Let’s Ukay Donation Platform. Together, we can make a positive impact in our community."
        ;
        $subject = "Let’s Ukay Donation Platform ";
        $header = "Help Us Make a Difference: Donate Clothes to those in Need.";

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject, $header));

        if (!$response) {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            return redirect()->route('donate');
        }
        toastr()->success('Email sent successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('donate');
    }
}
