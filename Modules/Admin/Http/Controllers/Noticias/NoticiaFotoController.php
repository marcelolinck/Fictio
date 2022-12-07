<?php

namespace Modules\Admin\Http\Controllers\Noticias;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Noticias\NoticiasFotosModel;
use Illuminate\Support\Facades\Storage;

class NoticiaFotoController extends Controller
{

    public function __construct()
    {
        $this->repository = NoticiasFotosModel::all();
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
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
    public function saveIMG($img){
        
    }
    public function store(Request $request)
    {

        $foto = $request->validate([
            'noticia_foto' => 'required',
            'noticia_id' => 'required',
            'noticia_foto.*' => 'mimes:jpeg,jpg,png,webp'
        ]);

        $arquivo = $foto['noticia_foto'];


            $arquivo = $request->allfiles()['noticia_foto'];

            $fotos = new NoticiasFotosModel();
            $fotos->noticia_foto_path = $arquivo->store('images', 'public');
            $fotos->noticia_id = $request->noticia_id;
            $fotos->save();
            unset($fotos);


        //Somente faz um redirect para o formulario que lista todos os dados inseridos
        return redirect()->route('noticias.edit', $request->noticia_id)->with('success', 'Foto adicionada com sucesso');
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
        

        $fotoAtual = $this->repository->where('id', $id)->first();
        if (!$fotoAtual)
            return redirect()->route('noticias.edit', $id)
            ->with('danger', 'Não Atualizado! Selecione a foto correta para exclusão');
        
        $arquivo = $request->allfiles()['fotoAtualizar'];
        
        //dd($arquivo);
        if($arquivo){
            if(Storage::exists($fotoAtual->noticia_foto_path)){
                Storage::delete($fotoAtual->noticia_foto_path);
            }
        
        $fotoAtual->noticia_foto_path = $arquivo->store('images', 'public');
        $fotoAtual->id = $id;
        //dd($fotoAtual);
        $fotoAtual->update();
        unset($fotos);
        }
        return redirect()->route('noticias.edit', $fotoAtual->noticia_id )
        ->with('success', 'Foto Atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)

    
    {
        $fotoAtual = $this->repository->where('id', $id)->first();
        if (!$fotoAtual)
            return redirect()->route('noticias.edit', $id)->with('danger', 'Não excluída! Selecione a foto correta para exclusão');


        Storage::delete($fotoAtual->noticia_foto_path);
        
        $fotoAtual->delete();

        return redirect()->route('noticias.edit', $fotoAtual->noticia_id )->with('success', 'Foto removida com sucesso');
    }
}
