<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Redirection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function connexion(): View | RedirectResponse
    {
        if(Auth::check()) {
            $user = Auth::user();
            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }
        return view('connexion');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            return redirect()->route(Redirection::redirect_if_authenticated($user));
        }

        // Identifiants invalides
        return redirect()->route('connexion')->withErrors(['email' => 'Identifiants invalides']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
