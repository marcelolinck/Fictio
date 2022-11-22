<?php

namespace Modules\Admin\Http\Controllers\Noticias;

use App\Models\Noticias\NoticiasComentariosModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class NoticiasComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
    public function __construct()
    {
        $this->repository = NoticiasComentariosModel::all();
        $this->title = 'Fictio';

         //Controles de acessso
         $this->middleware('permission:comment_view|comment_action', ['only' => ['index','show']]);
         $this->middleware('permission:noticias_insert', ['only' => ['create','store']]);
         $this->middleware('permission:comment_action', ['only' => ['edit','update']]);
         $this->middleware('permission:noticias_delete', ['only' => ['destroy']]);
    }
    
    
     public function index()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Comentários Efetuados";
        $config['controller'] = 'noticias';
        $comentarios = $this->repository;
        return view('admin::comentarios.index', compact('config', 'comentarios'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        if (!$ComentarioAtual = $this->repository->find($id))
            return redirect()->route('noticias.index')->with('danger_tag', 'Notícia não encontrada! Tente novamente');

        $data = $request->only('id', 'noticia_comentario_status_id', 'noticia_id');
        $noticia_id = $data['noticia_id'];

        if($data['noticia_comentario_status_id'] == 1){
            $data['noticia_comentario_status_id'] = 2;
        }
        
        elseif($data['noticia_comentario_status_id'] == 3){
            $data['noticia_comentario_status_id'] = 2;
        }
        else{
            $data['noticia_comentario_status_id'] = 3;
        }
        //dd($data);
        
        $ComentarioAtual->update($data);

        return Redirect::to(URL::previous() ."#comentarios")->with('success_tag', 'Status do comentário atualizado com sucesso');
        //return redirect()->route('noticias.edit', $noticia_id)->with('success', 'Status do comentário atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
