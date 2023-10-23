<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $articles = Article::latest()->paginate(12);
        return view('welcome', compact('articles'));
    }

    public function article(Article $article){
        return view('article', compact('article'));
    }

    public function about(){
        return view('about');
    }
}
