<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollecteSupervisor;
use App\Models\Collecte;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function home()
    {
        return view('overview');
    }

    public function overview()
    {
        $collectes = Collecte::with('signal')->orderBy('starting_date', 'asc')->get();
        $articles = Article::orderBy('created_at', 'desc')->get();
        $locations = [];
        
        // Transform collectes into location data for the map
        foreach ($collectes as $collecte) {
            if ($collecte->signal) {
                $locations[] = [
                    'latitude' => $collecte->signal->latitude,
                    'longitude' => $collecte->signal->longitude,
                    'volume' => $collecte->signal->volume,
                    'starting_date' => $collecte->starting_date
                ];
            }
        }

        return view('overview', compact('collectes', 'locations', 'articles'));
    }

    public function signInWithEmail()
    {
        return view('signInWithEmail');
    }

    public function signInWithUsername()
    {
        return view('signInWithUsername');
    }

    public function signUp() { return view('signUp'); }
    public function article()
    {
        return view('article');
    }

    public function about() { return view('about'); }

    public function contributerHome()
    {
        return view('contributerHome');
    }

    public function report()
    {
        return view('report');
    }

    public function collectes() { return view('collectes'); }

    public function account()
    {
        return view('account');
    }
}
