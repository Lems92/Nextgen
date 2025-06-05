<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\URL;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email'),
            function ($user, $token) {
                $actionUrl = URL::temporarySignedRoute(
                    'password.reset',
                    now()->addMinutes(10),
                    ['token' => $token, 'email' => $user->email]
                );

                Mail::to($user->email)->send(new ResetPasswordMail($actionUrl));
            }
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'message' => 'Un email de réinitialisation a été envoyé à votre adresse email. Le lien expirera dans 10 minutes.'
            ]);
        }

        return response()->json([
            'message' => 'Impossible de trouver un utilisateur avec cette adresse e-mail.'
        ], 422);
    }
} 