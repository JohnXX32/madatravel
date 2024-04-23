<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViewActiviteDetails extends Migration
{
    public function up()
    {
        DB::statement('
            CREATE or replace VIEW view_activite_details AS
            select 
                activites.categorie, 
                activite_details.nom, 
                ville.nom_ville,
                regions.nom_region,
                activite_details.prix
            FROM
                activite_details
            JOIN
                activites on activite_details.id_activite = activites.id
            JOIN
                ville on ville.id = activite_details.id_ville
            JOIN
                regions on regions.id = ville.region
        ');
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_activite_detail');
    }
}
