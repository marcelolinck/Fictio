<?php

namespace Modules\Admin\Http\Controllers\Dashboard;


use App\Models\Noticias\NoticiasComentariosModel;
use App\Models\Noticias\NoticiasModel;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function __construct()
    {
        $this->title = 'Fictio';
        //$this->middleware('role:Administrador');
        
        
    }
    public function index()
    {
        $user = User::find(Auth::id());
        if($user->status_id != 1) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Conta suspensa, fale com o Admin');
        }
        $user->resyncPerm();
       
        //dd($userRole);
        $config['title'] = $this->title;
        $config['namePage'] = "Dashboard de Noticias";
        $config['controller'] = 'dash';
        $config['contador_noticias'] = NoticiasModel::with('status', 'comentarios')->get();
        $config['contador_comentarios']  = NoticiasComentariosModel::count();
        $config['contador_usuarios']  = User::count();

        return view('admin::dashboard\index', compact('config'));
    }
}
