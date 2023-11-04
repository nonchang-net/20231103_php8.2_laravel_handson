<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        $data = ['articles' => $articles];
        return view('articles.index', $data);
    }

    public function create()
    {
        $article = new Article();
        $data = ['article' => $article];
        return view('articles.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        $article = new Article();
        $article->user_id = \Auth::id();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        return redirect(route('articles.index'));
    }

    public function show(Article $article)
    {
        $data = ['article' => $article];
        return view('articles.show', $data);
    }

    public function edit(Article $article)
    {
        $this->authorize($article);

        $data = ['article' => $article];
        return view('articles.edit', $data);
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize($article);

        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        return redirect(route('articles.show', $article));
    }

    public function destroy(Article $article)
    {
        $this->authorize($article);

        $article->delete();
        return redirect(route('articles.index'));
    }

    public function bookmark_articles()
    {
        $articles = \Auth::user()->bookmark_articles()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'articles' => $articles,
        ];
        return view('articles.bookmarks', $data);
    }
}
