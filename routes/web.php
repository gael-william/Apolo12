<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');


Route::prefix('admin/boutiques')->name('admin.boutiques.')->group(function () {
    Route::get('/create', [BoutiqueController::class, 'create'])->name('create');
    Route::post('/store', [BoutiqueController::class, 'store'])->name('store');
});

Route::prefix('admin/boutique')->group(function () {
    Route::get('/admin/boutique', [BoutiqueController::class, 'index'])->name('admin.boutique.index');
    Route::get('/boutiques/{id}/edit', [BoutiqueController::class, 'edit'])->name('admin.boutiques.edit');
Route::put('/boutiques/{id}', [BoutiqueController::class, 'update'])->name('admin.boutiques.update');
Route::delete('/boutiques/{id}', [BoutiqueController::class, 'destroy'])->name('admin.boutiques.destroy');
Route::get('/boutiques/{id}', [BoutiqueController::class, 'show_admin'])->name('admin.boutiques.show');

});

Route::prefix('admin/produit')->group(function () {
    // Routes existantes
    Route::get('boutiques/{boutique}/products', [ProductController::class, 'index'])
        ->name('admin.boutiques.products');

    Route::get('boutiques/{boutique}/products/create', [ProductController::class, 'create'])
        ->name('admin.boutiques.products.create');

    Route::post('boutiques/{boutique}/products', [ProductController::class, 'store'])
        ->name('admin.boutiques.products.store');

    // Nouvelles routes pour l'édition et la suppression
    Route::get('boutiques/{boutique}/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('admin.boutiques.products.edit');

    Route::put('boutiques/{boutique}/products/{product}', [ProductController::class, 'update'])
        ->name('admin.boutiques.products.update');

    Route::delete('boutiques/{boutique}/products/{product}', [ProductController::class, 'destroy'])
        ->name('admin.boutiques.products.destroy');
});

