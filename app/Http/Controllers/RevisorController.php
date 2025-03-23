<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted',null)->first();
        return view('revisor.index', compact('article_to_check'));
    }
}
