<?php

namespace Modules\Admin\Http\Controllers\Noticias;

use App\Models\Noticias\NoticiasComentariosModel;
use App\Models\Noticias\NoticiasModel;
use App\Models\Noticias\NoticiasStatusModel;
use App\Models\Noticias\TagsModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->title = 'Fictio';
        $this->repository = NoticiasModel::with('status','comentarios')->orderby('created_at','desc')->get();
    }
    public function index()
    {

        //    $data = NoticiasModel::get();
        //     $obj = json_decode($data);

        //return $data;

        $config['title'] = $this->title;
        $config['namePage'] = "Noticias Cadastradas";
        $config['controller'] = 'noticias';
        $noticias = $this->repository;
        // dd($noticias);

        return view('admin::noticias.index', compact('config', 'noticias'));
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Crie sua Notícia aqui";
        $config['controller'] = 'noticias_create';
        $config['controller'] = 'noticias_create';
        $tags = TagsModel::all();
        $status = NoticiasStatusModel::orderby('descricao', 'asc')->get();
       
       
            return view('admin::noticias.create', compact('config','tags', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        

        $data = $request->except(["_token","filepond","_method"]);
        
        $data['created_at'] = now();
        $data['updated_at'] = now();
        $data['tags'] = json_encode($data['tags']);
        $data['user_id'] = rand(1,10);
        //dd($request->except("_token"));
        //Nesse momento recebe os dados do formulário e insere diretamente no banco
        NoticiasModel::insert($data);

        //Somente faz um redirect para o formulario que lista todos os dados inseridos
        return redirect()->route('noticias.index')->with('success', 'Cadastrado com sucesso');
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
        $config['title'] = $this->title;
        $config['namePage'] = "Edição Notícia";
        $config['controller'] = 'noticias_edit';
        $tags = TagsModel::all();

        if (!$noticiaAtual = $this->repository->find($id))
            return redirect()->route('admin::noticias.index')->with('danger', 'Noticia não encontrada! Tente novamente');
       
       //dd($noticiaAtual->tags);
            return view('admin::noticias.edit', compact('noticiaAtual','config','tags'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        if (!$tagAtual = $this->repository->find($id))
            return redirect()->route('tags.index')->with('danger', 'Notícia não encontrada! Tente novamente');

        $data = $request->only('descricao');
        $data['updated_at'] = now();
        $tagAtual->update($data);
        return redirect()->route('tags.index')->with('success', 'Tag Atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $noticiaAtual = $this->repository->where('id', $id)->first();
        if (!$noticiaAtual)
            return redirect()->route('admin::noticias.index')->with('danger', 'Não excluído! Selecione o registro correto para exclusão');

        $noticiasComentarios = NoticiasComentariosModel::where('noticia_id', $id)->select('id')->get();
        //dd($noticiasComentarios);
        dd($noticiasComentarios::delete());
        $noticiaAtual->delete();

        return redirect()->route('admin::noticias.index')->with('success', 'Notícia Excluída com sucesso');
    }
}
