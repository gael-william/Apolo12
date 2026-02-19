<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Commande;
use App\Models\User;
use App\Mail\CommandeNotification;
use App\Jobs\SendCommandeNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class CommandeController extends Controller
{
   public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'numero_telephone' => 'required|string',
            'panier' => 'required|array',
            'total' => 'required|numeric',
            'boutique_id' => 'required|exists:boutiques,id',
        ]);

        $commande = Commande::create([
            'boutique_id' => $validated['boutique_id'],
            'produit' => json_encode($validated['panier']),
            'quantite' => array_sum(array_column($validated['panier'], 'quantity')),
            'total' => $validated['total'],
            'numero_telephone' => $validated['numero_telephone'],
        ]);

        $boutique = Boutique::findOrFail($validated['boutique_id']);

        // 🔥 ENVOI WHATSAPP DIRECTEMENT ICI
        try {

            $twilio = new Client(
                env('TWILIO_SID'),
                env('TWILIO_TOKEN')
            );

            $numeroBoutique = "whatsapp:+".$boutique->phone;

            $twilio->messages->create(
                $numeroBoutique,
                [
                    "from" => env('TWILIO_WHATSAPP_FROM'),
                    "body" => "🛒 Nouvelle commande reçue !\n"
                            . "Total : ".$commande->total." FCFA\n"
                            . "Client : ".$commande->numero_telephone
                ]
            );

        } catch (\Exception $twilioError) {
            Log::error("Erreur Twilio : ".$twilioError->getMessage());
        }

        return response()->json([
            'success' => true,
            'redirect_url' => route('commande.voir', $commande->id),
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}

    

    public function generatePdf($id)
    {
        $commande = Commande::findOrFail($id);
        $produits = json_decode($commande->produit, true);

        $pdf = Pdf::loadView('admin.commandes.pdf', compact('commande', 'produits'));

        return $pdf->download("commande_$commande->id.pdf");
    }

    public function show(Request $request)
    {
        $query = Commande::with('boutique')->orderBy('created_at', 'desc');
    
        // ✅ Filtrer par dates si spécifiées
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
    
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
    
        // ✅ Si la boutique est spécifiée (ex: dans l'URL avec ?boutique_id=2)
        $boutique = null;
        if ($request->filled('boutique_id')) {
            $boutique = Boutique::findOrFail($request->boutique_id);
        }
    
        $commandes = $query->get();
    
        return view('admin.commandes.show', compact('commandes', 'boutique'));
    }
    

    public function updateEtat(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->etat = $request->etat;
        $commande->save();

        return back()->with('success', 'État mis à jour');
    }

    public function ShowBoutique($id)
    {
        $commandes = Commande::where('boutique_id', $id)->orderBy('created_at', 'desc')->get();
        $boutique = Boutique::findOrFail($id);

        return view('admin.commandes.show', compact('commandes', 'boutique'));
    }

    public function afficherCommande($id)
    {
        $commande = Commande::with('boutique')->findOrFail($id);
        $produits = json_decode($commande->produit, true);
        $boutique = $commande->boutique;

        return view('show_commandes', compact('commande', 'produits', 'boutique'));
    }
}
