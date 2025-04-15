<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('boutique_id'); // pour lier à la boutique
            $table->json('produit');
            $table->integer('quantite');
            $table->integer('total');
            $table->string('numero_telephone');
            $table->string('etat')->default('en attente');
            $table->timestamps();
        
            $table->foreign('boutique_id')->references('id')->on('boutiques')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
