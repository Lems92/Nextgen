<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        return view('accueil');
    }

    public function about(): View
    {
        return view('about');
    }

    public function faq(): View
    {
        return view('faq');
    }
}
