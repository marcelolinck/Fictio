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
            $table->longText('corpo');
            $table->json('tags');
            $table->unsignedBigInteger('noticia_status_id')->default('2');
            $table->foreign('noticia_status_id')->references('id')->on('noticia_status');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 50)->unique();
            $table->boolean('destaque');
            $table->timestamps();
        });

    
        Schema::create('noticia_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('noticia_foto_path', 2048)->default('https://via.placeholder.com/1920x1080.png/000044?text=default_photo');
            $table->unsignedBigInteger('noticia_id');
            $table->foreign('noticia_id')->references('id')->on('noticias');
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
        Schema::dropIfExists('noticia_fotos');
        // Schema::dropIfExists('noticias_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('noticia_status');
    }
};
