<?php

namespace Modules\Admin\Http\Controllers\Tags;

use App\Models\Noticias\TagsModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->title = 'Fictio';
        $this->repository = TagsModel::all();
    }
    public function index()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Tags Cadastradas";
        $config['controller'] = 'tags'; 
        $tags = $this->repository;


        return view('admin::tags\index', compact('config','tags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Criar nova Tag";
        $config['controller'] = 'tags'; 
        return view('admin::tags\create', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'descricao' => 'required|min:5|max:50',
            
        ]);
    
        $data = $request->only('descricao');

        //Nesse momento recebe os dados do formulário e insere diretamente no banco
        $this->repository->create($data);

        //Somente faz um redirect para o formulario que lista todos os dados inseridos
      return redirect()->route('tags.index')->with('success', 'Cadastrado com sucesso');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $tagAtual = $this->repository->where('id', $id)->first();
        if(!$tagAtual)
        return redirect()->route('tags.index')->with('danger
        ', 'Não excluído! Selecione o registro correto para exclusão');

        $tagAtual-> delete();
        return redirect()->route('tags.index')->with('success', 'Excluído com sucesso');
    }
}
