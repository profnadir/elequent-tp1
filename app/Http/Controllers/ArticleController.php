<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        // $articles = Article::get();
        // $articles = Article::orderBy('title')->take(5)->get();
        // $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);

        /* $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->author = $request->author;
        $article->save(); */

        Article::create($validated);

        //Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);

        // $article->title = $request->title;
        // $article->content = $request->content;
        // $article->author = $request->author;
        // $article->save();

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'article updated successfully');
        //return redirect()->route('articles.index')->with('error', 'article didnt updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'article deleted successfully');
    }
}
