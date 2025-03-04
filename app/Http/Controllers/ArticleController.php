<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Collecte;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function overview()
    {
        // Fetch all articles, ordered by published_at (newest first)
        $articles = Article::orderBy('published_at', 'desc')->get();

    // Fetch locations with latitude and longitude
    $locations = Collecte::join('signals', 'collectes.signal_id', '=', 'signals.id')
        ->select('signals.latitude', 'signals.longitude')
        ->get();

    // Debug: Check if locations are being passed correctly
    //dd($locations);

        return view('overview', compact('locations', 'articles'));

    }

    public function show($id)
    {
        // Fetch the article by ID
        $article = Article::findOrFail($id);

        // Pass the article to the view
        return view('article', compact('article'));
    }

    public function contributerHome()
    {
        // Fetch all articles, ordered by published_at (newest first)
        $articles = Article::orderBy('published_at', 'desc')->get();

        // Pass the articles to the contributerHome view
        return view('contributerHome', compact('articles'));
    }
}