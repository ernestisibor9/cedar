<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SubcribeMail;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubcriberController extends Controller
{
    // Subscribe
    public function subscribe(Request $request){
        // Validate the request
        $request->validate([
            'email' =>'required|email|unique:subscribers,email',
        ]);

        // Create a new subscriber
        Subscriber::insert([
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);

        $data = [
            'title' => 'A New Subscriber',
            'message' => "A new subscriber $request->email has just subscribed to the newsletter"
        ];

        Mail::to('info@cedargrowthconsult.com')->send(new SubcribeMail($data));

        // Return a success message
        $notification = array(
            'message' => 'You have successfully subscribe to our newsletter',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
