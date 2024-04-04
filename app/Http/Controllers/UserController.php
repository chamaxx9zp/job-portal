<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function createSeeker()
    {
        return view('users.register-seeker');
    }

    public function createEmployer()
    {
        return view('users.employer-register');
    }
}
