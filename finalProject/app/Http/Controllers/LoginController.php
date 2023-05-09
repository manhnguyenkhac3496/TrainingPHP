<?php

namespace App\Http\Controllers;

require_once 'ValidateController.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function __construct()
    {
    }

    function loginForm() {
        return view('user/login');
    }

    function login(Request $request) {
        if (isset(Auth::user()->user_name)) {
            return view('user/login')->with('message', 'You need to logout before login!');
        }
        if (Auth::attempt(['user_name' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect(route('list'));
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
