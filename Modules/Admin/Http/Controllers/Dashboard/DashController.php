<?php

namespace Modules\Admin\Http\Controllers\Dashboard;

use App\Models\Noticias\NoticiasComentariosModel;
use App\Models\Noticias\NoticiasModel;
use App\Models\User;
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
        
    }
    public function index()
    {
        if(Auth::id() == User::where('status_id', 2)){}
        $config['title'] = $this->title;
        $config['namePage'] = "Dashboard de Noticias";
        $config['controller'] = 'dash';
        $config['contador_noticias'] = NoticiasModel::with('status', 'comentarios')->get();
        $config['contador_comentarios']  = NoticiasComentariosModel::count();

        return view('admin::dashboard\index', compact('config'));
    }
}
