<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lista', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('lista_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lista_id')->references('listaId')->on('listas');
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
        Schema::dropIfExists('user_lista');
    }
}
