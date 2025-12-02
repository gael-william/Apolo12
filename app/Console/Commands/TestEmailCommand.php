<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Commande;
use App\Models\Boutique;
use App\Models\User;
use App\Mail\CommandeNotification;
use Illuminate\Support\Facades\Mail;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test l\'envoi d\'email de notification de commande';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        if (!$email) {
            $email = $this->ask('Entrez l\'email de test:');
        }

        // Créer des données de test
        $boutique = Boutique::first();
        if (!$boutique) {
            $this->error('Aucune boutique trouvée. Créez d\'abord une boutique.');
            return 1;
        }

        // Créer une commande de test
        $commande = new Commande([
            'boutique_id' => $boutique->id,
            'produit' => json_encode([
                [
                    'name' => 'Produit Test 1',
                    'price' => 1500,
                    'quantity' => 2
                ],
                [
                    'name' => 'Produit Test 2',
                    'price' => 2500,
                    'quantity' => 1
                ]
            ]),
            'quantite' => 3,
            'total' => 5500,
            'numero_telephone' => '+226 12345678',
            'etat' => 'en attente'
        ]);

        try {
            Mail::to($email)->send(new CommandeNotification($commande, $boutique, 'Admin Test'));
            $this->info("Email de test envoyé avec succès à {$email}");
            $this->info("Vérifiez les logs dans storage/logs/laravel.log");
        } catch (\Exception $e) {
            $this->error("Erreur lors de l'envoi de l'email: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
