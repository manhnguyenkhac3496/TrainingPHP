<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function __construct()
    {
    }

    function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => 'admin', 'password' => 'password'])) {
            return redirect(route('home'));
        }

        if (Auth::check()) {
            return redirect(route('home'));
        }
    }
}
