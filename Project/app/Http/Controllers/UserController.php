<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationFormRequest;


class UserController extends Controller
{
    const JOB_SEEKER = "seeker";
    const JOB_POSTER = 'employer';
    public function createSeeker(){
        return view('user.seeker-register');
    }

    public function storeSeeker(RegistrationFormRequest $request){
        
        $user = User::create([
            "name" => request("name"),
            "email" => request('email'),
            "password" => bcrypt(request('password')),
            "user_type" => self::JOB_SEEKER
        ]);
        Auth::login($user);
        $user->sendEmailVerificationNotification();
        return redirect()->route('verification.notice')->with('successMessage','Account created successfuly');
    }

    public function createEmployer() {
        return view('user.employer-register');
    }

    public function storeEmployer(RegistrationFormRequest $request){
        $user=User::create([
            "name" => request('name'),
            'email'=> request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_POSTER,
            'user_trial' => now()->addWeek()
        ]);
        $user->sendEmailVerificationNotification();
        #you can practice Carbon it allow you to formate a date as you want 
        // /Carbon/Carbon::parse($date)->format('Y-m-d');
        Auth::login($user);
        return redirect()->route('verificarion.notice')->with('successMessage','Account created successfuly');
    }

    public function login(){
        return view('user.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }
        else{
            return redirect("/login");
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
