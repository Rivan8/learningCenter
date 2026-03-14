<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    // Tampilkan form permintaan reset password
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // Kirim email link reset password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return back()->with(
            $status === Password::RESET_LINK_SENT
                ? ['status' => __($status)]
                : ['email' => __($status)]
        );
    }
}
