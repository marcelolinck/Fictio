<?php

namespace Modules\Site\Http\Controllers\Noticias;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Noticias\NoticiasModel;
use Inertia\Inertia;
use PhpParser\Builder\Function_;

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
    private function  getLast3Wtags($tags){
        $noticiasRaw = NoticiasModel::with('fotos')
        //->select('id', 'titulo', 'tags')
        ->whereJsonContains('tags', $tags)
        ->take(3)
        ->get()
        ->toArray();
        //get only field 'fotos', 'tags', 'id' and 'titulo'
        $noticias = array_map(function($noticia){
            return array_intersect_key($noticia, array_flip(['fotos', 'tags', 'id', 'titulo']));
        }, $noticiasRaw);
        return $noticias;

    }
    public function viewNoticia($id){
        $noticia = NoticiasModel::with('fotos','comentarios','comentarios.user','comentarios.status')
        ->where('id', $id)
        ->first();
        $noticiaTratada['id'] = $noticia->id;
        $noticiaTratada['tags'] = $noticia->tags;
        $noticiaTratada['titulo'] = $noticia->titulo;
        $noticiaTratada['texto'] = $noticia->corpo;
        $noticiaTratada['imagem'] = $noticia->fotos[0]->noticia_foto_patch;
        $noticiaTratada['comentarios'] = $noticia->comentarios;
        $noticiaTratada['sugestoes'] = $this->getLast3Wtags($noticia->tags);

        //dd($noticiaTratada);
        return Inertia::render('components/NoticiaUni/Index', [
            'noticia' => $noticiaTratada
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
        
        
        
        return Inertia::render('components/Home/Index', compact('noticiaTratada'));
        /* return Inertia::render('components/Home/Index', [
            
            'noticia' => $noticiaTratada
        
        ]); */
    }
    public function destaqueHome(){
        $destaque = NoticiasModel::
        whereJsonContains('tags', ['Futebol', 'Amet'])
        ->take(10)->get();

        return json_decode($destaque);
    }
    
    
    
}
