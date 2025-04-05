<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ConfirmRevisorRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Crea una nuova istanza del messaggio.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Costruisce l'email.
     */
    public function build()
    {
        return $this->subject('Conferma richiesta revisore')
                    ->view('mail.confirm_revisor_request');
    }
}
