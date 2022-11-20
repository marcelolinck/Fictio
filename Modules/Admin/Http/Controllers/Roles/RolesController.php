<?php

namespace Modules\Admin\Http\Controllers\Roles;

use App\Models\Config\RolesModel;
use App\Models\Permissions\PermissionsModel;
use App\Models\RolesPermissionsModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class RolesController extends Controller
{

    public function __construct(Request $request, RolesModel $roles)

    {
        $this->title = 'Fictio';
        $this->request = $request;
        $this->repository = $roles;
    }
    
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Grupos Cadastrados";
        $config['controller'] = 'roles';
        
        $roles = $this->repository::all();
    
        return view('admin::roles.index', compact('roles','config'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Cadastrar novo grupo";
        $config['controller'] = 'roles';
        
        $permissions = PermissionsModel::orderby('name', 'asc')->get();
        
        return view('admin::roles.create', compact('permissions','config'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $role = $request->validate([
            'name' => 'required|unique:permissions|min:5|max:50',
            'permission' => 'required',
        ]);
        $role['guard_name'] = 'web';

      
        $role = Role::create($role);
       
        $role->syncPermissions($request->input('permission'));

        //Somente faz um redirect para o formulario que lista todos os dados inseridos
        return redirect()->route('roles.index')->with('success', 'Cadastrado com sucesso');
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
        $config['namePage'] = "Edição de grupo";
        $config['controller'] = 'roles';

        if (!$roleAtual = $this->repository->find($id))
            return redirect()->route('roles.index')->with('danger', 'Grupo não encontrado! Tente novamente');
        $permissions = PermissionsModel::orderby('name', 'asc')->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin::roles.edit', compact('roleAtual', 'permissions', 'rolePermissions', 'config'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $role = $request->validate([
            'name' => 'required| min:5 | max:50',
            'permission' => 'required',
        ]);

        if (!$role = Role::findOrFail($id))
            return redirect()->route('roles.index')->with('danger', 'Grupo não encontrado! Tente novamente');

        $role->name = $request->input('name');
        $role->save();
        
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success', ' Grupo Atuaizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $roleAtual = $this->repository->where('id', $id)->first();
        if (!$roleAtual)
            return redirect()->route('roles.index')->with('danger', 'Não excluído! Selecione o registro correto para exclusão');

        $roleAtual->delete();
        return redirect()->route('roles.index')->with('success', 'Grupo excluído com sucesso');
    }

    public function listarPermissoes($id)
    {
        //$grupo = GrupoModel::with('grupoPermissoes')->get();

        //$permissoes = PermissaoModel::all();
        $permissoes = RolesPermissionsModel::all();
        
        //dd($permissoes);

        return view('admin.pages.config.grupos.listarPermissoes', compact('grupo', 'permissoes', 'PermissoesGrupo'));
    }
}
