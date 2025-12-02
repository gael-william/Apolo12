<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index($boutiqueId, Request $request)
    {
        $boutique = Boutique::findOrFail($boutiqueId);
        $query = Product::where('boutique_id', $boutiqueId);

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->get();

        return view('admin.produit.index', compact('boutique', 'products'));
    }


    
public function create($boutiqueId)
{
    $categories = Category::all(); // <-- récupérer toutes les catégories dynamiques
    $boutique = Boutique::findOrFail($boutiqueId);
    return view('admin.produit.create', compact('boutique', 'categories'));
}

    public function store(Request $request, $boutiqueId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'certificate' => 'nullable|string',
            'description' => 'nullable|string',
            'cropped_image' => 'required', // Image recadrée obligatoire
        ]);

        $boutique = Boutique::findOrFail($boutiqueId);

        // Décoder l'image base64
        $imageData = $request->cropped_image;
        list(, $imageData) = explode(',', $imageData);
        $imageData = base64_decode($imageData);

        // Générer un nom unique et enregistrer l'image
        $imageName = 'products/' . uniqid() . '.png';
        Storage::disk('public')->put($imageName, $imageData);

        // Sauvegarde en base de données
        $boutique->products()->create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'certificate' => $request->certificate,
            'description' => $request->description,
            'image_url' => $imageName
        ]);

        return redirect()->route('admin.boutiques.products', $boutiqueId)->with('success', 'Produit ajouté avec succès.');
    }

    public function edit($boutiqueId, $productId)
    {
        $boutique = Boutique::findOrFail($boutiqueId); // Récupère la boutique
        $product = $boutique->products()->findOrFail($productId); // Récupère le produit
        return view('admin.produit.edit', compact('boutique', 'product')); // Passe les données à la vue
    }

    public function update(Request $request, $boutiqueId, $productId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'category' => 'required|string',
            'price' => 'required|numeric',
            'certificate' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $boutique = Boutique::findOrFail($boutiqueId); // Récupère la boutique
        $product = $boutique->products()->findOrFail($productId); // Récupère le produit

        // Mettre à jour les données du produit
        $product->update([
            'name' => $request->name,
            // 'category' => $request->category,
            'price' => $request->price,
            'certificate' => $request->certificate,
            'description' => $request->description,
        ]);

        // Si une nouvelle image est fournie
        if ($request->has('cropped_image')) {
            // Décoder l'image base64
            $imageData = $request->cropped_image;
            list(, $imageData) = explode(',', $imageData);
            $imageData = base64_decode($imageData);

            // Générer un nom unique et enregistrer l'image
            $imageName = 'products/' . uniqid() . '.png';
            Storage::disk('public')->put($imageName, $imageData);

            // Supprimer l'ancienne image si elle existe
            if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
                Storage::disk('public')->delete($product->image_url);
            }

            // Mettre à jour l'URL de l'image
            $product->update(['image_url' => $imageName]);
        }

        return redirect()->route('admin.boutiques.products', $boutiqueId)->with('success', 'Produit mis à jour avec succès.');
    }


    public function destroy($boutiqueId, $productId)
    {
        $boutique = Boutique::findOrFail($boutiqueId); // Récupère la boutique
        $product = $boutique->products()->findOrFail($productId); // Récupère le produit

        // Supprimer l'image associée si elle existe
        if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
            Storage::disk('public')->delete($product->image_url);
        }

        // Supprimer le produit
        $product->delete();

        return redirect()->route('admin.boutiques.products', $boutiqueId)->with('success', 'Produit supprimé avec succès.');
    }


    public function showByCategory($category)
    {
        $categories = ['Cosmétique', 'Alimentation', 'Pharmacopée'];

        if (!in_array($category, $categories)) {
            abort(404, "Catégorie non trouvée");
        }

        $products = Product::where('category', $category)->get();
        return view('admin.produit.index', compact('products', 'category'));
    }

    public function welcome()
    {
        $produitsAlimentation = Product::with('boutique')->where('category', 'Alimentation')->latest()->take(8)->get();
        $produitsCosmetique = Product::with('boutique')->where('category', 'Cosmétique')->latest()->take(8)->get();
        $produitsPharmacopee = Product::with('boutique')->where('category', 'Pharmacopée')->latest()->take(8)->get();
        $boutiques = Boutique::all();

        $menusLesPlusCommandes = Product::with('boutique')
            ->select('products.*', DB::raw('(SELECT COUNT(*) FROM commandes WHERE products.id = commandes.produit) as commandes_count'))
            ->orderBy('commandes_count', 'desc')
            ->limit(8)
            ->get();

        $categoriesDynamiques = Category::whereNotIn('name', ['Alimentation', 'Cosmétique', 'Pharmacopée'])->get();

        return view('welcome', compact(
            'produitsAlimentation',
            'produitsCosmetique',
            'produitsPharmacopee',
            'boutiques',
            'menusLesPlusCommandes',
            'categoriesDynamiques'
        ));
    }

public function seeAll(Request $request)
{
    $categorySlug = $request->query('category');

    switch ($categorySlug) {
        case 'alimentation':
            $produits = Product::where('category', 'Alimentation')->get();
            $categoryName = 'Alimentation';
            break;
        case 'cosmetique':
            $produits = Product::where('category', 'Cosmétique')->get();
            $categoryName = 'Cosmétique';
            break;
        case 'pharmacopee':
            $produits = Product::where('category', 'Pharmacopée')->get();
            $categoryName = 'Pharmacopée';
            break;
        default:
            // Rechercher la catégorie dynamique correspondante
            $categoryName = Str::title(str_replace('-', ' ', $categorySlug)); // e.g. "produits-naturels" => "Produits Naturels"
            $produits = Product::where('category', $categoryName)->get();
            break;
    }

    return view('seeall', compact('produits', 'categoryName'));
}


    public function toggleStock($id)
    {
        $product = Product::findOrFail($id);
        $product->stock = $product->stock > 0 ? 0 : 1;
        $product->save();

        if (request()->ajax()) {
            return response()->json([
                'new_status' => $product->stock,
                'message' => 'Statut de stock mis à jour.'
            ]);
        }

        return back()->with('success', 'Statut de stock mis à jour.');
    }
}
