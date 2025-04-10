<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->take(6)->orderBy('created_at', 'desc')->get();

        return view('welcome', compact('articles'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);

        return redirect()->back();
    }
}
