<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// tabella  ponet che  farà il collegamento tra tabella project e technologies 
// il nome delle due tabelle va messo al singolare e non aggiungere nessuna colonna 
// per scriverla bisogna mettere create_nome tabella che inizia con la lettera dell'alfabeto prima della prima lettera della seconda tabella
// in questo caso la p è proma della t nell'alfabeto
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('project_technology');
    }
};
