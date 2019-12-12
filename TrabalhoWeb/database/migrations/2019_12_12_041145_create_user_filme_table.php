<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFilmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_filme', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('filme_id')->unsigned();
            $table->integer('avaliacao');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_filme');
    }
}
