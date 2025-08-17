<?php

namespace App\Mail;

use App\Models\Candidature;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConvocationEntretienMail extends Mailable
{
    use Queueable, SerializesModels;

    public $candidature;

    public function __construct(Candidature $candidature)
    {
        $this->candidature = $candidature;
    }

    public function build()
    {
        return $this->subject('Convocation à un entretien')
            ->view('emails.convocation_entretien')
            ->with([
                'nom' => $this->candidature->user->prenom . ' ' . $this->candidature->user->nom,
                'poste' => $this->candidature->offre->titre ?? 'N/A',
                'date' => now()->addDays(3)->format('d/m/Y H:i'),
                'lieu' => 'Siège de l\'entreprise',
            ]);
    }
}
