<?php

namespace Modules\Site\Http\Controllers\Noticias;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Noticias\NoticiasModel;
use Inertia\Inertia;

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
        ->take(5)
        ->get();
    }
    public function viewNoticia($id){
        $noticia = $this->show($id);
        return Inertia::render('components/NoticiaUni/Index', [
            'noticia' => $noticia
        ]);

    }
    public function viewHome(){
        $noticia = new NoticiasModel();
        //last register
        $noticia = $noticia->with('fotos')
        ->orderby('id', 'desc')
        ->first();

        $noticiaTratada['id'] = $noticia->id;
        $noticiaTratada['titulo'] = $noticia->titulo;
        $noticiaTratada['imagem'] = $noticia->fotos[0]->noticia_foto_patch;
        
        return Inertia::render('components/Home/Index', [
            
            'noticia' => $noticiaTratada
        
        ]);
    }
}
