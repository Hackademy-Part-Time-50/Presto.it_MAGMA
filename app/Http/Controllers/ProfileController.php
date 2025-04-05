<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Visualizza il profilo dell'utente
    public function profile()
    {
        $user = Auth::user();
        $articles = $user->articles;

        return view('profile', compact('user', 'articles'));
    }

    // Aggiorna i dati dell'utente, incluso il profilo e l'immagine
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validazione dei dati
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255', // Validazione per il cognome
            'gender' => 'nullable|in:male,female,other', // Validazione per il sesso
            'birth_date' => 'nullable|date', // Validazione per la data di nascita
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Aggiornamento del nome, cognome, sesso, e data di nascita
        $user->name = $validated['name'];
        $user->surname = $validated['surname'] ?? null; // Aggiunto campo cognome
        $user->gender = $validated['gender'] ?? null;   // Aggiunto campo sesso
        $user->birth_date = $validated['birth_date'] ?? null; // Aggiunto campo data di nascita
        $user->email = $validated['email'];

        // Se è presente un'immagine di profilo
        if ($request->hasFile('profile_image')) {
            // Elimina la vecchia immagine se esiste
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            // Carica la nuova immagine
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');

            // Salva il percorso dell'immagine nel campo profile_image del database
            $user->profile_image = $imagePath;
        }

        // Salva le modifiche
        $user->save();

        return redirect()->route('profile')->with('success', 'Profilo aggiornato con successo!');
    }



    // Visualizza la pagina per creare un nuovo articolo
    public function createArticle()
    {
        return view('create.article'); // View per creare un nuovo articolo
    }

    // Salva un nuovo articolo
    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = Auth::user();
        $article = new Article();
        $article->user_id = $user->id;
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->save();

        return redirect()->route('profile')->with('success', 'Articolo creato con successo!');
    }
}
