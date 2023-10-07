<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function index()
    // {
    //     if(auth()->guest()){
    //         abort(403);
    //     };

    //     $is_admin=Auth::user()->is_admin;

    //     if($is_admin=='0')
    //     {
    //         return view('home.admin-dashboard');
    //     }
    //     else
    //     {
    //         return view('dashboard');
    //     }
    // }

    // public function register()
    // {
    //     $this->authorize('register');
    //     return view('auth.register');
    // }
}