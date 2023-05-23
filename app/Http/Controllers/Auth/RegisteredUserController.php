<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Twilio\Rest\Client;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:'.User::class],
            'tel' => 'sometimes|string|max:255|unique:users,mobile',
            'profile' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'gender' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $profile = "";
        // dd($request->profile);
        if($request->file('profile')){
            $profile = $request->file('profile')->store('profiles','public');
        }
        $user = User::create([
            'uuid' => Str::uuid(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'gender' => $request->gender,
            'profile' => $profile ?? '',
            'email' => $request->email,
            'mobile' => $request->tel,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);
        if($request->email){
            Auth()->user()->sendEmailVerificationNotification();
            return redirect(RouteServiceProvider::VERIFY)->with('status', 'verification-link-sent');
        }else{
            $user = User::find(auth()->id());
            // dd($user);
            $otp=random_int(100000,999999);
            // dd($otp);
            $user -> mobile_verification_code = $otp;    
            $user -> save();
            
            $sid = env("TWILIO_ACCOUNT_SID");
            $token = env("TWILIO_AUTH_TOKEN");
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                            ->create($user->mobile, // to
                                    [
                                        "from" =>  env("TWILIO_Number"),
                                        "body" => "This is the ship that made the Kessel Run in fourteen parsecs?".config("app.url")."your OTP is:".$otp,
                                        "mediaUrl" => ["https://c1.staticflickr.com/3/2899/14341091933_1e92e62d12_b.jpg"]
                                    ]
                            );
            return redirect(RouteServiceProvider::VERIFY_PHONE)->with('status', 'verification-link-sent');
        }

    }
}
