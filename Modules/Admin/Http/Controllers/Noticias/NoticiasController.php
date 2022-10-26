<?php

namespace Modules\Admin\Http\Controllers\Noticias;

use App\Models\Noticias\NoticiasModel;
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
        $this->repository = NoticiasModel::with('status')->get();
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

        return view('admin::noticias\index', compact('config','noticias'));
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
        //
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
