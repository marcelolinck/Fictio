<?php

namespace Modules\Site\Http\Controllers\Noticias;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Noticias\NoticiasModel;
use Inertia\Inertia;
use App\Models\Noticias\TagsModel;
use Termwind\Components\Dd;

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
        ->select('id', 'titulo', 'tags')
        ->whereJsonContains('tags', $tags)
        ->take(3)
        ->get();
        return $noticiasRaw;

    }
    public function viewNoticia($id){
        $noticia = NoticiasModel::with('fotos')
        ->find($id);

        $noticiaTratada['id'] = $noticia->id;
        $noticiaTratada['tags'] = $noticia->tags;
        $noticiaTratada['titulo'] = $noticia->titulo;
        $noticiaTratada['texto'] = $noticia->corpo;
        $noticiaTratada['imagem'] = count($noticia->fotos) > 0 ? $noticia->fotos[0]->url : 'https://via.placeholder.com/150';
        $noticiaTratada['sugestoes'] = $this->getLast3Wtags($noticia->tags);

        //dd($noticiaTratada);
        return Inertia::render('components/NoticiaUni/Index', [
            'noticia' => $noticiaTratada
        ]);

    }


    private function get5NewsWithTag($tag){
        $noticiasRaw = NoticiasModel::with('fotos')
        ->whereJsonContains('tags', $tag)
        ->select('id', 'titulo')
        ->take(5)
        ->get()
        ->toArray();
        foreach($noticiasRaw as $key => $noticia){
            if(count($noticia['fotos']) > 0){
                $noticiasRaw[$key]['imagem'] = $noticia['fotos'][0]['noticia_foto_path'];
            }
            else{
                $noticiasRaw[$key]['imagem'] = 'https://via.placeholder.com/150';
            }
            unset($noticiasRaw[$key]['fotos']);
        }
        return $noticiasRaw;
    }

    public function viewHome(){
        $noticia = new NoticiasModel();
        //last register
        $noticia = $noticia
        ->with('fotos')
        ->orderby('id', 'desc')
        ->first();

        $tagsDestaque = TagsModel::where('destaque', 1)
        ->select('id', 'descricao as nome')
        ->get();

        /* dd(NoticiasModel::with('fotos')->orderby('id', 'desc')->get()->toArray()); */
        $noticiaTratada['id'] = $noticia->id;
        $noticiaTratada['titulo'] = $noticia->titulo;

        $noticiaTratada['imagem'] = count($noticia->fotos) > 0 ? $noticia->fotos[0]->noticia_foto_path : 'https://via.placeholder.com/150';
        

        $noticiasTagDestaque = [];
        foreach($tagsDestaque as $tag){            
            $last5WTag = $this->get5NewsWithTag(ucwords($tag['nome']));
            if(count($last5WTag) > 0){
                $noticiasTagDestaque[] = [
                    'tag' => $tag->nome,
                    'noticias' => $last5WTag
                ];
            }
        }
        
        return Inertia::render('components/Home/Index', compact('noticiaTratada', 'noticiasTagDestaque'));
    }
    public function busca(Request $request){
        $noticias = NoticiasModel::with('fotos')
        ->where('titulo', 'like', '%'.$request->busca.'%')
        ->select('id', 'titulo', 'corpo')
        ->take(5)
        ->get()
        ;
        //get only first 40 letters of field corpo
        $noticias = $noticias->map(function($noticia){
            $noticia->corpo = substr($noticia->corpo, 0, 60);
            return $noticia;
        });
        //dd($noticias);
        return $noticias;




    }
    
}
