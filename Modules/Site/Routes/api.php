<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/noticias/tags/{tag}',[Modules\Site\Http\Controllers\Noticias\NoticiasController::class, 'searchTags']);
    Route::get('/noticias', [Modules\Site\Http\Controllers\Noticias\NoticiasController::class, 'index']);
    Route::get('/noticias/{id}', [Modules\Site\Http\Controllers\Noticias\NoticiasController::class, 'show']);
    

});
