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

        //Criacao do status da noticia
        Schema::create('noticia_status', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 100);
            $table->timestamps();
        });
        
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('corpo', 10000);
            $table->unsignedBigInteger('noticia_status_id');
            $table->foreign('noticia_status_id')->references('id')->on('noticia_status');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('noticia_tags', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 100);
            $table->unsignedBigInteger('noticias_id');
            $table->foreign('noticias_id')->references('id')->on('noticias');
            $table->timestamps();
        });


        Schema::create('noticia_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('arquivo', 2048);
            $table->unsignedBigInteger('noticias_id');
            $table->foreign('noticias_id')->references('id')->on('noticias');
            $table->timestamps();
        });

        //Criacao do status do cometario
        Schema::create('noticia_comentario_status', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->timestamps();
        });

        //Criacao da tabela de Comentário
        Schema::create('noticia_comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->unsignedBigInteger('noticia_comentario_status_id');
            $table->foreign('noticia_comentario_status_id')->references('id')->on('noticia_comentario_status');
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
        Schema::dropIfExists('noticia_comentarios');
        Schema::dropIfExists('noticia_comentario_status');
        Schema::dropIfExists('noticia_fotos');
        Schema::dropIfExists('noticia_tags');
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('noticia_status');
    }
};
