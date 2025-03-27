<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
//use Artisan;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BecomeRevisor;
use App\Models\User;


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

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'Email di richiesta inviata. Riceverai al più presto una risposta.');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', [
            'email' => $user->email,
        ]);
        return redirect()->back()->with('message', "L'utente $user->name è ora revisore");
    }
}
