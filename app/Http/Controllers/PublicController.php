<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
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

    public function tag(Tag $tag){
        $articles = $tag->articles()->paginate(12);
        return view('welcome', compact('articles'));
    }

    public function about(){
        return view('about');
    }
    public function user(User $user){
    $articles = $user->Users()->paginate(12);
    return view('welcome', compact('articles'));
}




}


