<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->withCount('users')->where('user_id', auth()->user()->id)->get();
        return view('applicants.index', compact('listings'));

    }

    public function show(Listing $listing)
    {
        // $this->authorize('view', $listing);

        $listing = Listing::with('users')->where('slug',$listing->slug)->first();

        return view('applicants.show', compact('listing'));

    }
}
