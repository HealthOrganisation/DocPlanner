<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function show()
    {
        $category = $request->query('category');

    if ($category && $category != 'all') {
        $articles = Article::where('category', $category)->get();
    } else {
        $articles = Article::all();
    }

    return view('articles', compact('articles'));
    }
    /////////////////////////////////////
    public function find($id)
    {
        $article = Article::findOrFail($id);
        return view('show', compact('article'));
    }
    ////////////////////////////////////
    public function showArticles(Request $request)
{
    $category = $request->get('category', 'all'); // Default to 'all' if no category is selected.

    // If category is not 'all', filter articles by category
    if ($category !== 'all') {
        $articles = Article::where('category', $category)->get();
    } else {
        $articles = Article::all();
    }

    return view('articles', compact('articles', 'category'));
}

}
