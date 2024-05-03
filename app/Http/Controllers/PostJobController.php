<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Middleware\isPremiumUser;

class PostJobController extends Controller
{
    public function __construct()
    {
        $this->middleware(isPremiumUser::class);
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = Listing::where('user_id', auth()->user()->id)->get();
        return view('job.index', compact('jobs'));
    }

    public function create()
    {
        return view('job.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'feature_image'=> 'required|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|min:10',
            'roles' => 'required|min:10',
            'job_type'=>'required',
            'address'=>'required',
            'date'=>'required',
            'salary'=> 'required'
        ]); 

        $imagePath = $request->file('feature_image')->store('images', 'public');
        $post = new Listing;
        $post->feature_image = $imagePath;
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->roles = $request->roles;
        $post->job_type = $request->job_type;
        $post->address = $request->address;
        $post->application_close_date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
        $post->salary = $request->salary;
        $post->slug = Str::slug($request->title).'.'. Str::uuid();
        $post->save();
        return back();
    }

    public function edit(Listing $listing)
    {
        return view('job.edit',compact('listing'));
    }

    public function update($id, Request $request)
    {   
        $this->validate($request, [
            'title' => 'required|min:5',
            'feature_image'=> 'mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|min:10',
            'roles' => 'required|min:10',
            'job_type'=>'required',
            'address'=>'required',
            'date'=>'required',
            'salary'=> 'required'
        ]); 

        if($request->hasFile('feature_image')) {
            $featureImage = $request->file('feature_image')->store('images', 'public');
            Listing::find($id)->update(['feature_image' => $featureImage]);
        }

        Listing::find($id)->update($request->except('feature_image'));

        return back()->with('success', 'Your job post has been successfully updated');
    }

    public function destroy($id)
    {
        Listing::find($id)->delete();
        return back()->with('success', 'Your job post has been successfully deleted');
    }
    
}
