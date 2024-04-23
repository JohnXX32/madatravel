<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produit'); // Colonne pour la clé étrangère
            $table->foreign('id_produit')->references('id')->on('produits');
            $table->float('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_produits');
    }
}
