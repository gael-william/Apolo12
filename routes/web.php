<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductController::class, 'welcome']);
// Routes publiques (Connexion & Déconnexion)
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Correction ici


// Tableau de routes pour l'admin (super admin et admin)
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Tableau de bord de l'admin
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Gestion des utilisateurs (uniquement pour super admin)
    Route::middleware('role:super_admin')->prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Gestion des boutiques
    Route::prefix('boutiques')->name('admin.boutiques.')->group(function () {
        Route::get('/', [BoutiqueController::class, 'index'])->name('index');
        Route::get('/create', [BoutiqueController::class, 'create'])->name('create');
        Route::post('/', [BoutiqueController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BoutiqueController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BoutiqueController::class, 'update'])->name('update');
        Route::delete('/{id}', [BoutiqueController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [BoutiqueController::class, 'show_admin'])->name('show');
    });

    // Gestion des produits
    Route::prefix('produits')->name('admin.produits.')->group(function () {
        Route::get('boutiques/{boutique}/products', [ProductController::class, 'index'])->name('boutiques.products');
        Route::get('boutiques/{boutique}/products/create', [ProductController::class, 'create'])->name('boutiques.products.create');
        Route::post('boutiques/{boutique}/products', [ProductController::class, 'store'])->name('boutiques.products.store');
        Route::get('boutiques/{boutique}/products/{product}/edit', [ProductController::class, 'edit'])->name('boutiques.products.edit');
        Route::put('boutiques/{boutique}/products/{product}', [ProductController::class, 'update'])->name('boutiques.products.update');
        Route::delete('boutiques/{boutique}/products/{product}', [ProductController::class, 'destroy'])->name('boutiques.products.destroy');
    });
});


// Route publique pour voir les boutiques
Route::get('/boutique/{id}', [BoutiqueController::class, 'show'])->name('boutique.show');
Route::get('/seeall', [ProductController::class, 'seeAll'])->name('seeall');
