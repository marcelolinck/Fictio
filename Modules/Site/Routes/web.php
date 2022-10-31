<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
//use App\Http\Controllers\Noticias\NoticiasController;

Route::get('/', 'Noticias\NoticiasController@viewHome');
Route::get('/noticia/{id}', 'Noticias\NoticiasController@viewNoticia');

Route::get('/sobre', 'Sobre\SobreController@index');
