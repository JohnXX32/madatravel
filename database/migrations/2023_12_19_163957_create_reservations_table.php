<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user'); // Colonne pour la clé étrangère
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_activite_detail'); // Colonne pour la clé étrangère
            $table->foreign('id_activite_detail')->references('id')->on('activite_details');
            $table->timestamp('date_debut');
            $table->timestamp('date_fin');
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
        Schema::dropIfExists('reservations');
    }
}
