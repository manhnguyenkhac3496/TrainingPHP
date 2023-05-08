<?php

function validateUsername($username) : bool {
    if (!str_ends_with($username, '@amela.vn') &&
        !str_ends_with($username, '@gmail.vn')) {
        return false;
    }
    return true;
}

function validatePassword($password) : bool {
    global $LENGTH_PASSWORD;
    if (strlen($password) < $LENGTH_PASSWORD) {
        return false;
    }
    if (!preg_match("/[A-Z]/", $password) ||
        !preg_match("/[a-z]/", $password) ||
        !preg_match("/[0-9]/", $password)) {
        return false;
    }
    if (preg_match("/[^a-zA-Z0-9]/", $password)) {
        return false;
    }
    return true;
}
