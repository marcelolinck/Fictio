<?php

namespace Modules\Admin\Http\Controllers\Users;

use App\Models\Config\UserStatusModel;
use App\Models\Noticias\NoticiasModel;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->title = 'Fictio';
        $this->repository = User::with('userStatus')->orderby('created_at', 'desc')->get();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Usuários  Cadastrados";
        $config['controller'] = 'users';
        $users = $this->repository;


        return view('admin::users.index', compact('config', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $config['title'] = $this->title;
        $config['namePage'] = "Cadastrar novo usuário";
        $config['controller'] = 'users';
        $roles = Role::orderby('name', 'asc')->get();
        $status = UserStatusModel::orderby('descricao', 'asc')->get();


        return view('admin::users.create', compact('config', 'roles', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required',
            'status_id' => 'required',
        ]);


        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('role_id'));

        //Somente faz um redirect para o formulario que lista todos os dados inseridos
        return redirect()->route('users.index')->with('success', 'Cadastrado com sucesso');
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
        $config['namePage'] = "Editar usuário";
        $config['controller'] = 'users';

        $roles = Role::orderby('name', 'asc')->get();
        $status = UserStatusModel::all();
        $userRole = DB::table("model_has_roles")->where("model_has_roles.model_id", $id)->pluck('role_id')->first();


        if (!$userAtual = $this->repository->find($id))
            return redirect()->route('users.index')->with('danger', 'Usuário não encontrado! Tente novamente');

        return view('admin::users.edit', compact('config', 'roles', 'status', 'userAtual', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'role_id' => 'required',
            'status_id' => 'required',
        ]);

        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        if (!$user = $this->repository->find($id))
            return redirect()->route('users.index')->with('danger', 'Registro não encontrado! Tente novamente');
        // $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('role_id'));
        return redirect()->route('users.index')->with('success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $usuarioAtual = $this->repository->where('id', $id)->first();
        if (NoticiasModel::where('user_id', $id)->first())
            return redirect()->route('users.index')->with('danger', 'Não excluído! O usuário selecionado possui notícias atreladas. Favor somente inativá-lo');
        
        if (!$usuarioAtual)
            return redirect()->route('users.index')->with('danger', 'Não excluído! Selecione novamente para exclusão');


        $usuarioAtual->roles()->detach();
        $usuarioAtual->delete();
        return redirect()->route('users.index')->with('success', 'Excluído com sucesso');
    }
}
