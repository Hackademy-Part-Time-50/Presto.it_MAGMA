<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    public function profile()
    {
        // Ottieni l'utente loggato
        $user = Auth::user();

        // Recupera gli articoli associati all'utente (presupponendo una relazione hasMany)
        $articles = $user->articles;

        // Passa i dati alla vista
        return view('profile', compact('user', 'articles'));
    }
        
        


}

