<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaFilmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_filme', function (Blueprint $table) {
            $table->integer('lista_id')->unsigned();
            $table->integer('filme_id')->unsigned();
            $table->foreign('lista_id')->references('listaId')->on('listas');
            $table->foreign('filme_id')->references('filmeId')->on('filmes');
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
        Schema::dropIfExists('lista_filme');
    }
}
