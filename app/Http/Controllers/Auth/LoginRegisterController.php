<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\EmailVerification;
use Carbon\Carbon;

class LoginRegisterController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:6',
            ]);

            $credentials = $request->only('email', 'password');
            $remember = $request->boolean('remember');

            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();
                return redirect()->intended('/')->with('success', 'Login successful!');
            }

            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred during login. Please try again.']);
        }
    }

    public function register(Request $request)
{
    // Remove the try-catch for validation - let Laravel handle it naturally
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
        'password' => 'required|string|confirmed|min:6',
    ]);

    try {
        // Generate OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Store OTP in database
        EmailVerification::updateOrCreate(
            ['email' => $validated['email']],
            [
                'otp' => Hash::make($otp),
                'expires_at' => Carbon::now()->addMinutes(10)
            ]
        );

        // Send OTP email
        Mail::send('emails.otp-verification', ['otp' => $otp], function($message) use ($validated) {
            $message->to($validated['email'])
                    ->subject('Email Verification Code');
        });

        // Store registration data in session
        $request->session()->put('registration_data', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        return redirect()->route('verify.otp')->with('success', 'Please check your email for the verification code.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred during registration. Please try again.'])
                    ->with('show_register_modal', true)
                    ->withInput(); // This preserves the old input values
    }
}

    public function showOtpForm()
    {
        if (!session()->has('registration_data')) {
            return redirect()->route('register');
        }
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required|string|size:6'
            ]);

            $registration_data = session('registration_data');
            if (!$registration_data) {
                return redirect()->route('register');
            }

            $verification = EmailVerification::where('email', $registration_data['email'])
                ->where('expires_at', '>', Carbon::now())
                ->first();

            if (!$verification || !Hash::check($request->otp, $verification->otp)) {
                return back()->withErrors(['otp' => 'Invalid or expired verification code.']);
            }

            // Create user after successful verification
            $user = User::create([
                'name' => $registration_data['name'],
                'email' => $registration_data['email'],
                'password' => Hash::make($registration_data['password']),
            ]);

            // Delete verification record
            $verification->delete();
            
            // Clear session data
            session()->forget('registration_data');

            Auth::login($user);

            return redirect('/')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
         
            return back()->withErrors(['error' => 'An error occurred during verification. Please try again.']);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success', 'Logged out successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred during logout. Please try again.']);
        }
    }
}
