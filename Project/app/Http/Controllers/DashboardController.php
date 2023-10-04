<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('dashboard');
         #to stop the user from accessing this view if he is not authenticated 
         #use condition 
        //  if(Auth::check()){
        //     return view('dashboard');
        //  }
        //  else{
        //     return back();
        //  }

        #use the middleware go to the web.php and use the method middleware('auth')
        
        #use a function inside the controller to controll all of the methodes instead of just index()
    }
}
