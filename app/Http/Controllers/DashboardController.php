<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\donotAllowUserToMakePayment;

class DashboardController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }

    public function verify()
    {
        return view('user.verify');
    }
} 
