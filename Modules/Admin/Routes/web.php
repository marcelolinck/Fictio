<?php


use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\dashboard\DashController;
use Modules\Admin\Http\Controllers\Noticias\NoticiasController;
use Modules\Admin\Http\Controllers\Noticias\NoticiasComentariosController;
use Modules\Admin\Http\Controllers\Tags\TagController;
use Modules\Admin\Http\Controllers\UsersController;
use Modules\Admin\Http\Controllers\Noticias\NoticiaFotoController;

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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::resource('dashboard', DashController::class);
    Route::resource('users', UsersController::class);
    Route::resource('tags', TagController::class);
    Route::resource('noticiasComentarios', NoticiasComentariosController::class);
    Route::resource('fotos', NoticiaFotoController::class);
    Route::resource('noticias', NoticiasController::class);
});
