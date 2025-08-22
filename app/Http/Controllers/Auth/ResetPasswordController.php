<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request)
    {
        try {
            return view('auth.reset-password', ['token' => $request->token, 'email' => $request->email]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while loading the reset form.']);
        }
    }

    public function reset(Request $request)
    {
        try {
            $validated = $request->validate([
                'token' => 'required',
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required'
            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect('/')->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while resetting your password.']);
        }
    }
}
