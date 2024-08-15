<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Payment;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayPalController extends Controller
{
    // PayPal
    public function PayPal(Request $request)
    {
        $notification = array(
            'message' => 'Please login to enroll',
            'alert-type' => 'error',
        );

        if (Auth::check()) {

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('success'),
                    "cancel_url" => route('cancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $request->price
                        ]
                    ]
                ]
            ]);
            // dd($response);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        session()->put('course_id', $request->course_id);
                        session()->put('user_id', Auth::user()->id);
                        session()->put('course_name', $request->course_name);
                        session()->put('quantity', '1');
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('cancel');
            }
        } else {
            // $notification = array(
            //     'message' => 'Please login to enroll',
            //     'alert-type' => 'error',
            // );
            return redirect()->back()->with($notification);
            // return redirect()->route('cancel');
        }
    }
    // success
    public function Success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);
        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            // Insert the payment order into the database
            $payment = new Payment;
            // $payment->user_id = auth()->user()->id;
            $payment->payment_id = $response['id'];
            $payment->course_id = session()->get('course_id');
            $payment->user_id = session()->get('user_id');
            $payment->course_name = session()->get('course_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = 'PayPal';
            $payment->save();
            // success
            $notification = array(
                'message' => 'Payment Successfully Done',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

            unset($_SESSION['course_id']);
            unset($_SESSION['course_name']);
            unset($_SESSION['quantity']);
            unset($_SESSION['user_id']);
        } else {
            // fail
            return redirect()->route('cancel');
        }
    }
    // cancel
    public function Cancel()
    {
        $notification = array(
            'message' => 'Payment Cancelled',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }
}
