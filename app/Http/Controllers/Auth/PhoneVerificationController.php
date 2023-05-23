<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Twilio\Rest\Client;


class PhoneVerificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function verify_phone(){
        return view('auth.verify-phone');
    }
    public function verify_phone_number(Request $request){
        $request->validate([
            "otp" => 'required',
        ]);
        $user = User::find(auth()->id()); 
        if($user->mobile_verification_code = $request->otp){
            $user->mobile_verified_at = now();
            $user->save();
            return redirect('/');
        }else{
            return back()->with("message",'Invalid OTP');
        }
    }
    public function resent(Request $req)
    {
        $user = User::find(auth()->id());
        $otp = random_int(100000, 999999);
        $user->mobile_verification_code = $otp;
        $user->save();


        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $client = new Client($sid, $token);

        $client->messages->create(
            $user->mobile,
            [
                "from" => env("TWILIO_Number"),
                'body' => 'Thanks for registering on ' . config("app.url") . "\n your OTP is: " . $otp
            ]
        );

        return redirect(RouteServiceProvider::VERIFY_PHONE)->with('status', 'verification-link-sent');
    }
}
