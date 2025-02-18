<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    
    public function overview(){
        return view('overview');
    }

    public function overviewv(){
        return view('overviewv');
    }

    public function signInWithEmail(){
        return view('signInWithEmail');
    }

    

    public function signInWithUsername(){
        return view('signInWithUsername');
    }

    public function signUp(){
        return view('signUp');
    }

    public function article(){
        return view('article');
    }

    public function contributerHome(){
        return view('contributerHome');
    }

    public function report(){
        return view('report');
    }

}
