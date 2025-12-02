<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Commande;
use App\Models\Boutique;
use App\Models\User;
use App\Mail\CommandeNotification;
use Illuminate\Support\Facades\Mail;

class SendCommandeNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $commande;
    public $boutique;

    /**
     * Create a new job instance.
     */
    public function __construct(Commande $commande, Boutique $boutique)
    {
        $this->commande = $commande;
        $this->boutique = $boutique;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Récupérer tous les admins liés à cette boutique
        $admins = User::where('boutique_id', $this->boutique->id)
                     ->where('email', '!=', '')
                     ->whereNotNull('email')
                     ->get();
        
        // Envoyer l'email à tous les admins de la boutique
        foreach ($admins as $admin) {
            try {
                Mail::to($admin->email)->send(new CommandeNotification($this->commande, $this->boutique, $admin->name));
            } catch (\Exception $emailException) {
                \Log::error('Erreur envoi email commande (Job): ' . $emailException->getMessage(), [
                    'commande_id' => $this->commande->id,
                    'admin_email' => $admin->email,
                    'boutique_id' => $this->boutique->id
                ]);
            }
        }
        
        // Envoyer aussi aux super admins
        $superAdmins = User::where('role', 'super_admin')
                          ->where('email', '!=', '')
                          ->whereNotNull('email')
                          ->get();
        
        foreach ($superAdmins as $superAdmin) {
            try {
                Mail::to($superAdmin->email)->send(new CommandeNotification($this->commande, $this->boutique, $superAdmin->name));
            } catch (\Exception $emailException) {
                \Log::error('Erreur envoi email super admin (Job): ' . $emailException->getMessage(), [
                    'commande_id' => $this->commande->id,
                    'super_admin_email' => $superAdmin->email,
                    'boutique_id' => $this->boutique->id
                ]);
            }
        }
    }
}
