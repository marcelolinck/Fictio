<?php


use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\dashboard\DashController;
use Modules\Admin\Http\Controllers\Noticias\NoticiasController;
use Modules\Admin\Http\Controllers\Noticias\NoticiasComentariosController;
use Modules\Admin\Http\Controllers\Tags\TagController;
use Modules\Admin\Http\Controllers\Noticias\NoticiaFotoController;
use Modules\Admin\Http\Controllers\Permissions\PermissionsController;
use Modules\Admin\Http\Controllers\Roles\RolesController;
use Modules\Admin\Http\Controllers\Users\UsersController;
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

    Route::get('roles/permissions/{id}', [RolesController::class, 'listarPermissoes'])->name('roles.listarPermissoes');
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('tags', TagController::class);
    Route::resource('noticiasComentarios', NoticiasComentariosController::class);
    Route::resource('fotos', NoticiaFotoController::class);
    Route::resource('noticias', NoticiasController::class);
});
