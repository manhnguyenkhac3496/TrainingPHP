<?php
include_once 'Controllers/login.php';
use Controllers\Login;
$url = $_REQUEST['url'];
$method = $_SERVER['REQUEST_METHOD'];
switch ($url) {
    case 'login':
        if ($method == 'GET')
            include_once 'View/login.php';
        if ($method == 'POST') {
            $login = new Login();
            $login->checkLogin();
        }
        break;
    case 'option':
        if ($method == 'GET')
            include_once 'View/option.php';
        break;
    case 'add':
        if ($method == 'GET')
            include_once 'View/add.php';
        break;
    case 'update':
        if ($method == 'GET')
            include_once 'View/update.php';
        break;
    case 'delete':
        if ($method == 'GET')
            include_once 'View/delete.php';
        break;
    case 'error':
        echo 'error';
        break;
    default:
        echo 'uri';
        include_once 'View/login.php';
}
