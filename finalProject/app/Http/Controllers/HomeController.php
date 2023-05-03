<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
    function showHome() {
        return view('home');
    }
}
