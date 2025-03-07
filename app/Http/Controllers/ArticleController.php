<?php
namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('overview', compact('articles'));
    }
    

    public function show($id)
    {
        // Fetch the article by ID
        $article = Article::findOrFail($id);

        // Pass the article to the view
        return view('articles', compact('article'));
    }

    public function contributerHome()
    {
        // Fetch all articles, ordered by published_at (newest first)
        $articles = Article::orderBy('published_at', 'desc')->get();

        // Pass the articles to the contributerHome view
        return view('contributerHome', compact('articles'));
    }
    
}