<?php
namespace Controllers;
include_once 'Models/User.php';

use User;


class Login
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function checkLogin()
    {
        $user = new User();
        $email = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        if ($user->checkLogin($email, $password)) {
            header('Location:add');
        } else {
            echo "Login error!";
        }
    }
}