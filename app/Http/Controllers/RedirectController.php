<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function registerpage()
    {
        return view('registration');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
