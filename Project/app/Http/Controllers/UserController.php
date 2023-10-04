<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const JOB_SEEKER = "seeker";
    public function createSeeker(){
        return view('user.seeker-register');
    }
    public function storeSeeker(){
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users|string|email|max:255',
            'password' => 'required'
        ]);
        User::create([
            "name" => request("name"),
            "email" => request('email'),
            "password" => bcrypt(request('password')),
            "user_type" => self::JOB_SEEKER
        ]);
        return back();
    }
}
