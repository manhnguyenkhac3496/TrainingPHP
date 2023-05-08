<?php

namespace App\Http\Controllers;

require_once 'ValidateController.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function __construct()
    {
    }

    function login(Request $request) {
        global $LOGIN_VALID;
        echo $LOGIN_VALID;
        if ((!validateUsername($request->input('username')) || !validatePassword($request->input('password'))) && $request->input('username') != 'admin') {
            return redirect()->route('login')->with('error_message', 'Username or password is valid');
        }

        if (Auth::attempt(['user_name' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect(route('list'));
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('home');
    }
}
