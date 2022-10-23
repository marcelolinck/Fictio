<?php

namespace Modules\Site\Http\Controllers\Noticias;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Noticias\NoticiasModel;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return NoticiasModel::with('fotos','comentarios','comentarios.user','comentarios.status')->orderby('created_at', 'desc')
        ->get();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return NoticiasModel::with('fotos','comentarios','comentarios.user','comentarios.status')
        ->where('id', $id)
        ->orderby('created_at', 'desc')
        ->get();
    }
    public function searchTags(Request $request){

        $filtro = $request->tags;
        
        return NoticiasModel::with('fotos','comentarios','comentarios.user','comentarios.status')
        ->whereJsonContains('tags', $filtro)
        ->get();
    }
}
