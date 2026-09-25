<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validateWithBag('newsletter', [
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.unique' => 'You are already subscribed to our newsletter!',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return back()->with('newsletter_success', 'Welcome! You have successfully subscribed to our newsletter.');
    }

    public function unsubscribeView()
    {
        return view('pages.unsubscribe');
    }

    public function unsubscribe(Request $request)
    {
        $request->validateWithBag('unsubscribe', [
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::where('email', $request->email)->first();

        if ($subscriber) {
            $subscriber->delete();
            return back()->with('success', 'Your email has been removed from our mailing list. We are sorry to see you go!');
        }

        return back()->withErrors(['email' => 'This email address was not found in our subscriber list.'], 'unsubscribe');
    }
}
