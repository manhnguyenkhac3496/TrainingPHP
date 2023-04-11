<?php

class User{
    private $user_name;
    private $password;
    private $created_at;
    private $updated_at;

    public function __construct()
    {
    }

    function checkLogin($user_name, $password) {
        if ($this->validateEmail($user_name)) {
            echo 'Format of username is "...@amela.vn"';
            return false;
        }

        $sql_user = new PDO('mysql:host=localhost;dbname=traning', "root", "manh");

        $selsec = $sql_user->prepare('SELECT * FROM users WHERE user_name = ? AND password = ?');
        $selsec->execute(array($user_name, $password));
        return $selsec->fetch();
    }

    function selectUser() {
        $sql_user = new PDO('mysql:host=localhost;dbname=traning', "root", "manh");
        $select = $sql_user->prepare('SELECT * FROM users');
        $select->execute();
        return $select->fetch();
    }

    function addUser($username, $password) {
        if ($this->validateEmail($username)) {
            echo 'Format of username is "...@amela.vn"';
            return false;
        }

        if ($this->validatePass($password)) {
            echo 'Length of pass > 4';
            return false;
        }

        $sql_user = new PDO('mysql:host=localhost;dbname=traning', "root", "manh");
        $insert = $sql_user->prepare('INSERT INTO users (user_name, password, created_ad) values (?, ?, ?)');
        $insert->execute(array($username, $password, date("hh:ii:ss")));
        return $insert->fetch();
    }

    function updateUser ($id, $username, $password) {
        if (!is_numeric($id)) {
            echo "id must is number.";
            return false;
        }

        if ($this->validateEmail($username)) {
            echo 'Format of username is "...@amela.vn"';
            return false;
        }

        if ($this->validatePass($password)) {
            echo 'Length of pass > 4';
            return false;
        }

        $sql_user = new PDO('mysql:host=localhost;dbname=traning', "root", "manh");
        $update = $sql_user->prepare('UPDATE users SET user_name = ? , password = ? , update_at = ? WHERE id = ?');
        $update->execute(array($username, $password, date("hh:ii:ss"), $id));
        return $update->fetch();
    }

    function deleteUser ($username) {
        if ($this->validateEmail($username)) {
            echo 'Format of username is "...@amela.vn"';
            return false;
        }

        $sql_user = new PDO('mysql:host=localhost;dbname=traning', "root", "manh");
        $update = $sql_user->prepare('DELETE FROM users WHERE username = ?');
        $update->execute(array($username));
        return $update->fetch();
    }



    function validateEmail($user_name) {
        if (substr($user_name, -10) == "@amela.vn" && strlen($user_name) > 10) {
            return true;
        }
        return false;
    }

    function validatePass($pass) {
        if (strlen($pass) > 4) {
            return true;
        }
        return false;
    }
}