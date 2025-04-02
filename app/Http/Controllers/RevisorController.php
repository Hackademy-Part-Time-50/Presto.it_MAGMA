<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Artisan, Mail, Auth, Session};
use Illuminate\Http\Request;
use App\Models\{Article, User, RevisoreRequest};
use App\Mail\BecomeRevisor;

class RevisorController extends Controller
{
    /**
     * Mostra la dashboard del revisore con l'articolo da revisionare.
     */
    public function index()
    {
        $article_to_check = Article::whereNull('is_accepted')->first();
        return view('revisor.index', compact('article_to_check'));
    }

    /**
     * Accetta un articolo e salva l'azione nella sessione.
     */
    public function accept(Article $article)
    {
        $this->storeLastAction($article);
        $article->setAccepted(true);

        return back()->with('message', "Hai accettato l'articolo \"{$article->title}\"");
    }

    /**
     * Rifiuta un articolo e salva l'azione nella sessione.
     */
    public function reject(Article $article)
    {
        $this->storeLastAction($article);
        $article->setAccepted(false);

        return back()->with('message', "Hai rifiutato l'articolo \"{$article->title}\"");
    }

    /**
     * Annulla l'ultima azione eseguita su un articolo.
     */
    public function cancelLastAction()
    {
        $lastAction = Session::get('lastAction');

        if (!$lastAction) {
            return back()->with('errorMessage', "Nessuna operazione da annullare.");
        }

        $article = Article::find($lastAction['article_id']);

        if ($article) {
            $article->setAccepted(null);
            Session::forget('lastAction');
            return back()->with('message', "L'ultima operazione è stata annullata.");
        }

        return back()->with('errorMessage', "Articolo non trovato.");
    }

    // Nel RevisorController

    public function makeRevisor(User $user)
    {
        $revisoreRequest = $user->revisoreRequest;

        if ($revisoreRequest && $revisoreRequest->status === 'rifiutato') {
            return redirect()->route('homepage')->with('error', 'Questa richiesta è stata rifiutata.');
        }

        $user->update(['is_revisor' => true]);
        $revisoreRequest->update(['status' => 'approvato']);

        return redirect()->route('revisor.index')->with('message', 'L\'utente è ora un revisore.');
    }


    public function rejectRevisor(User $user)
    {
        $revisoreRequest = $user->revisoreRequest;

        if ($revisoreRequest) {
            $revisoreRequest->update(['status' => 'rifiutato']);
            return redirect()->route('homepage')->with('message', 'La richiesta è stata rifiutata.');
        }

        return redirect()->route('homepage')->with('error', 'Nessuna richiesta trovata per questo utente.');
    }



    /**
     * Mostra informazioni su come diventare revisore.
     */
    public function info()
    {
        return view('revisore.info');
    }

    /**
     * Gestisce la richiesta per diventare revisore.
     */
    public function richiedi(Request $request)
    {
        $user = Auth::user();

        if (RevisoreRequest::where('user_id', $user->id)->exists()) {
            return redirect()->route('revisore.info')->with('error', 'Hai già inviato una richiesta.');
        }

        Mail::to('admin@presto.it')->send(new BecomeRevisor($user));
        RevisoreRequest::create(['user_id' => $user->id, 'status' => 'in attesa']);

        return redirect()->route('homepage')->with('message', 'Email di richiesta inviata. Riceverai al più presto una risposta.');
    }

    /**
     * Salva l'ultima azione nella sessione.
     */
    private function storeLastAction(Article $article): void
    {
        Session::put('lastAction', ['article_id' => $article->id]);
    }


}
