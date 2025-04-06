<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    // Mostra il modulo per richiedere il reset della password
    public function create()
    {
        return view('auth.passwords.email');
    }

    // Elabora la richiesta di reset della password
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Invia la richiesta per il reset della password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Messaggio di successo o errore
        if ($status == Password::RESET_LINK_SENT) {
            // Successo
            return back()->with('status', __('Password reset link sent.'));
        }

        // Errore
        return back()->withErrors(['email' => __('We can\'t find a user with that email address.')]);
    }

    // Mostra il modulo per il reset effettivo della password
    public function showResetForm(Request $request, $token)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
    }

    // Salva la nuova password
    public function reset(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'token' => ['required'],
        ]);

        // Esegui il reset della password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        // Messaggio di successo o errore
        if ($status == Password::PASSWORD_RESET) {
            // Successo
            return redirect()->route('login')->with('status', __('Your password has been reset! You can now login.'));
        }

        // Errore
        return back()->withErrors(['email' => __('The provided token is invalid or expired.')]);
    }
}
