<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class JoblistingController extends Controller
{
    public function index()
    {
        $jobs = Listing::with('profile')->get();
        // return $jobs;
        // dd($jobs);
        return view('home',compact('jobs'));
    }
}
