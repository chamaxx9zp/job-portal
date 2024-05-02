<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\isPremiumUser;

class PostJobController extends Controller
{
    public function __construct()
    {
        $this->middleware(isPremiumUser::class);
    }

    public function create()
    {
        return view('job.create');
    }
}
