<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('admin.articles.article', ['articles' => $articles]);
    } 

    public function add() {
        return view('admin.articles.article-add');
    }
}
