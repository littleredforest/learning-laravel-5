<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Article;

class ArticlesController extends Controller
{
    public function index() {
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id) {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function create() {
        return view('articles.create');
    }

    public function store() {
        Article::create(Request::all());

        return redirect('articles');
    }
    //
}
