<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Commande;
use App\Models\Boutique;

class CommandeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $commande;
    public $boutique;
    public $produits;
    public $adminName;

    /**
     * Create a new message instance.
     */
    public function __construct(Commande $commande, Boutique $boutique, $adminName)
    {
        $this->commande = $commande;
        $this->boutique = $boutique;
        $this->produits = json_decode($commande->produit, true);
        $this->adminName = $adminName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle Commande #' . $this->commande->id . ' - ' . $this->boutique->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.commande-notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
