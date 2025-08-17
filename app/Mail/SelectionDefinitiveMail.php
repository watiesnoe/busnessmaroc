<?php

namespace App\Mail;

use App\Models\Candidature;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SelectionDefinitiveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $candidature;

    public function __construct(Candidature $candidature)
    {
        $this->candidature = $candidature;
    }

    public function build()
    {
        return $this->subject('Félicitations - Sélection définitive')
            ->view('emails.selection_definitive')
            ->with([
                'nom' => $this->candidature->user->prenom . ' ' . $this->candidature->user->nom,
                'poste' => $this->candidature->offre->titre ?? 'N/A',
            ]);
    }
}
