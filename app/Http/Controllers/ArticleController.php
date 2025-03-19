<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller 
{
    public function create()
    {
        return view('articles.create'); // Assicurati che esista la vista
    }

<<<<<<< HEAD



=======
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->paginate(8);
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
>>>>>>> refs/remotes/origin/pagina-dettaglio-annuncio
}
