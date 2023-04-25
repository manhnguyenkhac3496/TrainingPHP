<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    private $user;
    public function __construct()
    {
        $this->user = new Users();
    }

    function regisUser(Request $request) {
        if ($request->input('password') != $request->input('password_confirm')) {
            return "Pass not match!";
        }
        $data = [
            'user_name' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'email' => $request->input('username'),
        ];
        response($this->user->create($data), 200);
    }
}
