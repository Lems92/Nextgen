<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utils\Redirection;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use App\Events\EmailVerified;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $route = Redirection::redirect_if_authenticated($request->user());
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route($route, absolute: false));
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
            event(new EmailVerified($request->user()));
        }

        return redirect()->intended(route($route, absolute: false));
    }
}
