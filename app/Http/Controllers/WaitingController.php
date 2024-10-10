<?php

namespace App\Http\Controllers;

use App\Utils\Redirection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WaitingController extends Controller
{
    public function waiting_email(Request $request) : View | RedirectResponse
    {
        if($request->user()->hasVerifiedEmail()) {
            return redirect()->route(Redirection::redirect_if_authenticated($request->user()));
        }
        return view('waiting.verification_email');
    }

    public function waiting_admin(Request $request) : View | RedirectResponse
    {
        if($request->user()->is_accepted_by_admin) {
            return redirect()->route(Redirection::redirect_if_authenticated($request->user()));
        }
        return view('waiting.verification_admin');
    }
}
