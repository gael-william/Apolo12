<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Page d'accueil
Route::get('/', [ProductController::class, 'welcome']);

// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Redirection après connexion
// Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
//     return redirect()->route('admin.dashboard');
// })->name('dashboard');

// Routes Admin
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit'); // Ajout route édition
        Route::put('/{user}', [UserController::class, 'update'])->name('update'); // Ajout route mise à jour
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
    

    Route::prefix('boutiques')->name('admin.boutiques.')->group(function () {
        Route::get('/', [BoutiqueController::class, 'index'])->name('index');
        Route::get('/create', [BoutiqueController::class, 'create'])->name('create');
        Route::post('/', [BoutiqueController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BoutiqueController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BoutiqueController::class, 'update'])->name('update');
        Route::delete('/{id}', [BoutiqueController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [BoutiqueController::class, 'show_admin'])->name('show');
    });

    Route::prefix('produits')->name('admin.produits.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
    });
});

// Routes publiques pour voir les boutiques
Route::get('/boutique/{id}', [BoutiqueController::class, 'show'])->name('boutique.show');
Route::get('/seeall', [ProductController::class, 'seeAll'])->name('seeall');
