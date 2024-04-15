<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;

class UserController extends Controller
{

    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';
    
    public function login()
    {
        return view('users.login');
    }

    public function createSeeker()
    {
        return view('users.register-seeker');
    }

    public function storeSeeker(RegistrationFormRequest $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER
        ]);

        return back();
    }

    public function createEmployer()
    {
        return view('users.employer-register');
    }
}
