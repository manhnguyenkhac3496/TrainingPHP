<?php
namespace Controllers;
include_once 'Models/User.php';

use User;


class Add
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function addUser()
    {
        $user = new User();
        $id = $_REQUEST['id'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        if ($user->updateUser($id, $username, $password)) {
            echo "Add user success";
            header('Location:option');
        } else {
            echo "Login error!";
        }
    }
}