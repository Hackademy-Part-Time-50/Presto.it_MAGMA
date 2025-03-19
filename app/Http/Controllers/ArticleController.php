<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller 
{
    public function create()
    {
        return view('articles.create'); // Assicurati che esista la vista
    }




    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }



}
