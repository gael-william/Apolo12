<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Commande;
use App\Models\Boutique;
use App\Models\User;
use App\Models\Publicite;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            // 'products' => Product::count(),
            // 'orders' => Commande::count(),
            'shops' => Boutique::count(),
            // 'users' => User::count(),
            // 'ads' => Publicite::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
