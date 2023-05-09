<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

require_once 'ValidateController.php';

class UserController extends Controller {

    private $user;
    public function __construct()
    {
        $this->user = new User();
    }

    function regisUserForm() {
        return view('user/regisUser');
    }

    function regisUser(Request $request) {
        $errors = array();
        if ($request->input('password') != $request->input('passwordConfirm')) {
            $errors[] = 'Pass not match';
        }
        if (!validateEmail($request->input('email'))) {
            $errors[] = 'Username must is email format (@gmail.com, @amela.vn), thanks!';
        }
        if (!validatePassword($request->input('password'))) {
            array_push($errors, 'Rule password:', 'Password greater than 8 characters', 'Contain: uppercase, lowercase, and numbers', 'Not contain special character: _, }, ..');
        }

        if (count($errors) >= 1) {
            return view('user/regisUser')->with('errors', $errors);
        }

        try {
            $data = [
                'user_name' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'email' => $request->input('email'),
            ];
            $this->user->create($data);
            return view('user/login')->with('message', 'Create successfully');
        } catch (e) {
            return view('user/regisUser')->with('errors', array('Has error when create account!'));
        }
    }
}
