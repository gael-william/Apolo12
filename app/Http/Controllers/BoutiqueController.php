<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoutiqueController extends Controller
{
    public function index()
    {
        $boutiques = Boutique::all(); // Récupère toutes les boutiques
        return view('admin.boutique.index', compact('boutiques'));
    }
    public function create()
    {
        return view('admin.boutique.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'city' => 'required|string|max:255',
            'description' => 'nullable|string',
            'owner_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'business_type' => 'required|string',
        ]);
    
        // Vérifier si une image recadrée a été envoyée
        if ($request->has('cropped_image') && !empty($request->cropped_image)) {
            // Décoder l'image Base64
            $imageData = $request->cropped_image;
            $image = str_replace('data:image/png;base64,', '', $imageData);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '.png';
    
            Storage::disk('public')->put('boutiques/' . $imageName, base64_decode($image));
    
            $imagePath = 'boutiques/' . $imageName;
        } else {
            return back()->withErrors(['cropped_image' => 'Veuillez recadrer l\'image avant de soumettre.']);
        }
    
        // Création de la boutique
        Boutique::create([
            'name' => $request->name,
            'location' => $request->location,
            'city' => $request->city,
            'description' => $request->description,
            'owner_name' => $request->owner_name,
            'phone' => $request->phone,
            'business_type' => $request->business_type,
            'image' => $imagePath
        ]);
    
        return redirect()->route('admin.boutique.index')->with('success', 'Boutique ajoutée avec succès');
    }
    

    public function edit($id)
{
    $boutique = Boutique::findOrFail($id); // Récupère la boutique par son ID
    return view('admin.boutique.edit', compact('boutique')); // Passe les données à la vue
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string',
        'city' => 'required|string|max:255',
        'description' => 'nullable|string',
        'owner_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'business_type' => 'required|string',
    ]);

    $boutique = Boutique::findOrFail($id); // Récupère la boutique à mettre à jour

    // Vérifier si une nouvelle image recadrée a été envoyée
    if ($request->has('cropped_image') && !empty($request->cropped_image)) {
        // Décoder l'image Base64
        $imageData = $request->cropped_image;
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.png';

        // Enregistrer la nouvelle image
        Storage::disk('public')->put('boutiques/' . $imageName, base64_decode($image));

        // Supprimer l'ancienne image si elle existe
        if ($boutique->image && Storage::disk('public')->exists($boutique->image)) {
            Storage::disk('public')->delete($boutique->image);
        }

        $imagePath = 'boutiques/' . $imageName;
    } else {
        $imagePath = $boutique->image; // Conserver l'ancienne image
    }

    // Mettre à jour la boutique
    $boutique->update([
        'name' => $request->name,
        'location' => $request->location,
        'city' => $request->city,
        'description' => $request->description,
        'owner_name' => $request->owner_name,
        'phone' => $request->phone,
        'business_type' => $request->business_type,
        'image' => $imagePath
    ]);

    return redirect()->route('admin.boutique.index')->with('success', 'Boutique mise à jour avec succès');
}

public function destroy($id)
{
    $boutique = Boutique::findOrFail($id); // Récupère la boutique par son ID

    // Supprimer l'image associée si elle existe
    if ($boutique->image && Storage::disk('public')->exists($boutique->image)) {
        Storage::disk('public')->delete($boutique->image);
    }

    // Supprimer la boutique
    $boutique->delete();

    return redirect()->route('admin.boutique.index')->with('success', 'Boutique supprimée avec succès');
}


public function show_admin($id)
{
    $boutique = Boutique::findOrFail($id);
    return view('admin.boutique.show', compact('boutique'));
}


public function show($id)
{
    $boutique = Boutique::findOrFail($id);
    $produits = Product::where('boutique_id', $id)->get();
    
    return view('showboutique', compact('boutique', 'produits'));
}

}
