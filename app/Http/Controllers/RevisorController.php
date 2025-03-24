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

    public function accept(Article $article)
    {
        session()->put('lastAction', [
            'article_id'=> $article->id,
        ]);
        $article->setAccepted(true);

        return redirect()->back()->with('message', "Hai accettato l'articolo $article->title");
    }

    public function reject(Article $article)
    {
        session()->put('lastAction', [
            'article_id'=> $article->id,
        ]);
        $article->setAccepted(false);

        return redirect()->back()->with('message', "Hai rifiutato l'articolo $article->title");
    }

    public function cancelLastAction()
    {
        $lastAction = session()->get('lastAction');

        if($lastAction) {
            $article = Article::find($lastAction['article_id']);

            if($article){
                $article->setAccepted(null);
                session()->forget('lastAction');

                return redirect()->back()->with('message', "L'ultima operazione è stata annullata");
            }  
        }
        return redirect()->back()->with('errorMessage', "Nessuna operazione da annullare.");
    }
}
