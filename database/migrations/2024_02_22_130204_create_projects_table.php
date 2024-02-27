<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // creazione della tabella projects
            $table->string('nome_progetto');
            $table->date('inizio_progetto');
            $table->text('descrizione');
            // NB BISOGNA CAMBIARE IN ENV FILESYSTEM_DISK DA LOCAL A PUBLIC FILESYSTEM_DISK=public E 
            // ANCHE NEL FILE CONFIG/FILESYSTEM DA LOCAL SI METTE PUBLIC
            $table->text('img')->nullable();

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
        Schema::dropIfExists('projects');
    }
};
