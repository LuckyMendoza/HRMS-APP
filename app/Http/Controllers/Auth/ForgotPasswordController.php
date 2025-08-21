<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Show the email request form (kept for completeness; modal may be used instead)
    public function showLinkRequestForm()
    {
        try {
            return view('auth.forgot-password');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the form.']);
        }
    }

    public function sendResetLinkEmail(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|exists:users,email'
            ]);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while sending the password reset link.']);
        }
    }
}
