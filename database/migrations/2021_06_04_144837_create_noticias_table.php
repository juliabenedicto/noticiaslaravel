<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categoria_noticia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('autor_noticia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->text('contenido');
            $table->string('imagen');
            $table->foreignId('autor_id')->index('id')->on('autor_noticia')->comment('El autor que crea la noticia');
            $table->foreignId('categoria_id')->index('id')->on('categoria_noticia')->comment('La categoría de la noticia');
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
        Schema::dropIfExists('categoria_noticia');
        Schema::dropIfExists('autor_noticia');
        Schema::dropIfExists('noticias');
    }
}
