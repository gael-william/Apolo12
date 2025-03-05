<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoutiqueController;
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
});