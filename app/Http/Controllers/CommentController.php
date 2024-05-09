<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Article $article, Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
            'author' => 'required',
        ]);
        
        $article->comments()->create($validated);

        return redirect()->route('articles.show', $article)->with('success', 'Comment created successfully');
    }
}
