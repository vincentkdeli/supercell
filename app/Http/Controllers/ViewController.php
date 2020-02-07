<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    //

    function root() {
        return redirect('/home');
    }

    function home() {
        return view('home');
    }

    function login() {
        return view('login');
    }

    function register() {
        return view('register');
    }

    function updateprofile() {
        return view('updateprofile');
    }

    function insertmember() {
        return view('insertmember');
    }

    function insertBrand() {
        return view('insertbrand');
    }
}
