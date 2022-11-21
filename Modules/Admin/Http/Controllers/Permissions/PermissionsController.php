<?php

namespace Modules\Admin\Http\Controllers\Permissions;

use App\Models\Permissions\PermissionsModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->title = 'Fictio';
        $this->repository = PermissionsModel::orderby('name', 'asc')->get();

        //Controles de acessso
        $this->middleware('permission:permission_view|permission_insert|permission_edit|permission_delete', ['only' => ['index','show']]);
        $this->middleware('permission:permission_insert', ['only' => ['create','store']]);
        $this->middleware('permission:permission_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Permissões Cadastradas";
        $config['controller'] = 'permissions';
        $permissions = $this->repository;


        return view('admin::permissions.index', compact('config', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Cadastrar nova permissão";
        $config['controller'] = 'permissions';
        return view('admin::permissions.create', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:permissions|min:5|max:50',
        ]);
        
        $data['guard_name'] = 'web';

        //Nesse momento recebe os dados do formulário e insere diretamente no banco
        PermissionsModel::create($data);

        //Somente faz um redirect para o formulario que lista todos os dados inseridos
      return redirect()->route('permissions.index')->with('success', 'Cadastrado com sucesso');
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
        $config['namePage'] = "Editar permissão";
        $config['controller'] = 'permissions';
        if(!$permissionAtual = $this->repository->find($id))
            return redirect()-> route('permissions.index')->with('danger', 'Permissão não encontrado! Tente novamente');
       
        return view('admin::permissions.edit', compact('permissionAtual','config'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        if(!$permissionAtual = $this->repository->find($id))
            return redirect()-> route('permissions.index')->with('danger', 'Permissão não encontrada! Tente novamente');

        $data = $request->validate([
            'name' => 'required|unique:permissions|min:5|max:50',
        ]);
        $permissionAtual->update($data);
        return redirect()->route('permissions.index')->with('success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $permissaoAtual = $this->repository->where('id', $id)->first();
        if(!$permissaoAtual)
        return redirect()->route('permissions.index')->with('success', 'Não excluído! Selecione o registro correto para exclusão');

        $permissaoAtual-> delete();
        return redirect()->route('permissions.index')->with('success', 'Excluído com sucesso');
    }
}
