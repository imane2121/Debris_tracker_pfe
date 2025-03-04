<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollecteSupervisor;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home() { return view('home'); }
    public function overview() { return view('overview'); }
    public function signInWithEmail() { return view('signInWithEmail'); }
    public function signInWithUsername() { return view('signInWithUsername'); }
    public function signUp() { return view('signUp'); }
    public function article() { return view('article'); }
    public function about() { return view('about'); }
    public function contributerHome() { return view('contributerHome'); }
    public function report() { return view('report'); }
    public function collectes() { return view('collectes'); }

    public function account() { return view('account'); }

}
