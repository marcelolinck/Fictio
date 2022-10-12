<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Deixa de ser curioso e acessa as rotas certinho <br> http://127.0.0.1:8000/api/site/noticias <br> http://127.0.0.1:8000/api/site/noticias/tags";
});
