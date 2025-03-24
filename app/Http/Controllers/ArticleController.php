<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;


class ArticleController extends Controller 
{
    public function create()
    {
        return view('articles.create'); 
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at','desc')->paginate(8);
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function byCategory(Category $category) 
    {   
        $articles = $category->articles->where('is_accepted', true);
        return view('articles.byCategory', compact('articles', 'category'));
    } 

    public function searchArticle(Request $request) {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10);
        return view('articles.searched', compact('articles', 'query'));
    }
}
