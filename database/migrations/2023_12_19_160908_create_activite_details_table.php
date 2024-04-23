<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_activite'); // Colonne pour la clé étrangère
            $table->foreign('id_activite')->references('id')->on('activites');
            $table->string('nom', 50);
            $table->unsignedBigInteger('id_ville'); // Colonne pour la clé étrangère
            $table->foreign('id_ville')->references('id')->on('ville');
            $table->float('prix');
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
        Schema::dropIfExists('activite_details');
    }
}
