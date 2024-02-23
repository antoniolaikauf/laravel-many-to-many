<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// NB IL NOME DEL FILE DEVE ESSERE CAMBIATO IN (9999 SAREBBE L'ANNO )ESSENDO CHE LE MIGRATE VANNO IN ORDINE TEMPORALE E QUINDI SE SI CREA DOPO QUESTO 
// FILE UN NUOVA TABELLA E SI VOLE CHE UNA TABELLA FACCIA RIFERIMENTO A LEI DARà ERRORE ESSENDO CHE è STATA CREATA DOPO 
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('projects', function (Blueprint $table) {
            // creazione della colonna type_id nella tabella projects essendo che la tabella type è il nucleo
            // dentro alle tonde bisogna mettere il nome della tabella che vuoi collegare con trattino id es nometabella_id e creerà una nuova colonna
            $table->foreignId('type_id')->constrained();
        });
        // si crea le colonne nella tabella ponte che colleghernno le due tabelle 
        Schema::table('project_technology', function (Blueprint $table) {
            // in questo caso si crea la colonna project_id nella tabella ponte che fara un collegamento con la tabella projects
            // e si crea technology_id che fara collegamento con la tabella technologies
            $table->foreignId('project_id')->constrained();
            $table->foreignId('technology_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('projects', function (Blueprint $table) {
            // la colonna projects_type_id_foreign  bisogna prenderla dal database nella tabella che si vuole dare la foreign key 
            // grazie al quale collegherà le due tabelle in base a one to many quindi la tabella che sarebbe many deve avere la foreign key
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('type_id');
        });
        // la chiave project_technology_project_id_foreign e project_technology_technology_id_foreign si prendono dal database 
        // e si fa la stessa cosa di prima quando si fa il refresh si distrugge e poi si ricostruisce 
        Schema::table('project_technology', function (Blueprint $table) {

            $table->dropForeign('project_technology_project_id_foreign');
            $table->dropColumn('project_id');
            $table->dropForeign('project_technology_technology_id_foreign');
            $table->dropColumn('technology_id');
        });
    }
};
