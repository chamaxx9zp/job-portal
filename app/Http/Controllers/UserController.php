<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationFormRequest;

class UserController extends Controller
{   
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';

    public function createSeeker()
    {
        return view('user.seeker-register');
    }

    public function createEmployer()
    {
        return view('user.employer-register');
    }

    // making user profile
    public function storeSeeker(RegistrationFormRequest $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER,
        ]);

        return redirect()->route('login')->with('successMessage','Your Account was Created');
    }

    public function storeEmployer(RegistrationFormRequest $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_POSTER,
            'user_trial' => now()->addWeek()
        ]);

        return redirect()->route('login')->with('successMessage','Your Account was Created');
    }

    public function login()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            if(auth()->user()->user_type == 'employer') {
                return redirect()->to('dashboard');
            }else {
                return redirect()->to('/');
            }
        }

        return 'Wrong Email or Password';
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function seekerProfile()
    {
        return view('seeker.profile'); 
    }

    public function update(Request $request)
    {
        if($request->hasFile('profile_pic')) {
            $imagepath = $request->file('profile_pic')->store('profile', 'public');   

            User::find(auth()->user()->id)->update(['profile_pic' => $imagepath]);
        }

        User::find(auth()->user()->id)->update($request->except('profile_pic'));

        return back()->with('success','Your profile has been updated');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user();
        if(!Hash::check($request->current_password, $user->password)) {
            return back()->with('error','Current password is incorrect');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','Your password has been updated successfully');
    }
        
}
