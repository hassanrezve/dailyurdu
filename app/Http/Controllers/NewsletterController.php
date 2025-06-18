<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Handle the newsletter subscription request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email'
        ], [
            'email.required' => 'ای میل ایڈریس درکار ہے',
            'email.email' => 'درست ای میل ایڈریس درج کریں',
            'email.unique' => 'یہ ای میل ایڈریس پہلے سے رجسٹرڈ ہے'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // TODO: Add your newsletter subscription logic here
        // For example, you might want to:
        // 1. Store the email in a database
        // 2. Send a welcome email
        // 3. Add the subscriber to your newsletter service (Mailchimp, etc.)

        return back()->with('success', 'آپ کا نیوز لیٹر سبسکرپشن کامیابی سے مکمل ہو گیا ہے۔');
    }
} 