<?php

namespace Modules\Admin\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function __construct(){
        $this->title = 'Fictio';
        
    }
    public function index()
    {
       $config['title'] = $this->title;
       $config['namePage'] = "Dashboard de Noticias";
       $config['controller'] ='dash';

        return view('admin::dashboard\index', compact('config'));
    }

    
}
