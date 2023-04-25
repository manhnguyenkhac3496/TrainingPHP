<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function __construct()
    {
    }

    function login(Request $request) {
        if (Auth::attempt(['user_name' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect(route('home'));
        }

        if (Auth::check()) {
            return redirect(route('home'));
        }
    }
}
