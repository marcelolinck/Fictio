<?php

use Illuminate\Support\Facades\Route;
use Modules\Site\Http\Controllers\Noticias\NoticiasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/site', function (Request $request) {
//     return $request->user();
// });

Route::prefix('site')->group(function () {

    
    
});
Route::get('/noticias/tags',[NoticiasController::class, 'searchTags']);
Route::get('/noticias', [NoticiasController::class, 'index']);
Route::get('/noticias/{id}', [NoticiasController::class, 'show']);
Route::get('/busca', [NoticiasController::class, 'busca']);
