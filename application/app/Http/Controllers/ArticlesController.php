<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{

    public function create()
{
    $articles = Article::all(); // Fetch all articles
    return view('admin.articles.create', compact('articles'));
}

    // Store a new article
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'date_posted' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/articles', 'public'); // Store the image in the public disk
        }

        // Create a new article with the authenticated admin's ID
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'date_posted' => $request->date_posted,
            'image' => $imagePath, // Save the image path
            'id_admin' => Auth::id(),
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.articles.create')->with('success', 'Article created successfully.');
    }



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


public function destroy($id)
{
    // Find the article by ID
    $article = Article::findOrFail($id);

    // Delete the article
    $article->delete();

    // Redirect back with a success message
    return redirect()->route('admin.articles.create')->with('success', 'Article deleted successfully.');
}

}
