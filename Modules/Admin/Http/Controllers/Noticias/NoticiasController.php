<?php

namespace Modules\Admin\Http\Controllers\Noticias;


use App\Models\Noticias\NoticiasFotosModel;
use App\Models\Noticias\NoticiasModel;
use App\Models\Noticias\NoticiasStatusModel;
use App\Models\Noticias\TagsModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->title = 'Fictio';
        $this->repository = NoticiasModel::with('fotos','status','comentarios')->orderby('created_at','desc')->get();
        $this->tags = TagsModel::orderby('descricao','asc')->get();
        $this->status = NoticiasStatusModel::orderby('descricao', 'asc')->get();
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
        $tags = $this->tags;
        $status = $this->status;


            return view('admin::noticias.create', compact('config','tags', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'titulo' => 'required',
            'noticia_status_id' => 'required',
            'corpo' => 'required',
            'tags' => 'required',
        ]);
        $fotos = $request->validate([
            'noticia_foto' => 'required',
            'noticia_foto.*' => 'mimes:jpeg,jpg,png,webp'
        ]);

        $arquivo = $fotos['noticia_foto'];

        $noticia = new NoticiasModel();


        $noticia->titulo = $data['titulo'];
        $noticia->corpo = $data['corpo'];
        $noticia->created_at = now();
        $noticia->updated_at = now();
        $noticia->tags = $data['tags'];
        $noticia->user_id = rand(1,10);
        $noticia->noticia_status_id = $data['noticia_status_id'];
        $noticia->save();

        for ($i = 0; $i < count($request->allFiles()['noticia_foto']); $i++){
            $arquivo = $request->allfiles()['noticia_foto'][$i];

            $fotos = new NoticiasFotosModel();
            $fotos->noticia_id = $noticia->id;
            $fotos->noticia_foto_path = $arquivo->store('images', 'public');
            $fotos->save();
            unset($fotos);
        }

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
        $tags = $this->tags;
        $status = $this->status;

        if (!$noticiaAtual = $this->repository->find($id))
            return redirect()->route('admin::noticias.index')->with('danger', 'Noticia não encontrada! Tente novamente');

       //dd($noticiaAtual);
            return view('admin::noticias.edit', compact('noticiaAtual','config','tags','status'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
       // dd($request->all());
        if (!$noticiaAtual = $this->repository->find($id))
            return redirect()->route('noticias.index')->with('danger', 'Notícia não encontrada! Tente novamente');

        $noticiaAtual->titulo = $request->titulo;
        $noticiaAtual->corpo = $request->corpo;
        $noticiaAtual->noticia_status_id = $request->noticia_status_id;
        $noticiaAtual->tags = $request['tags'];

        $noticiaAtual->update();

        return redirect()->route('noticias.index')->with('success', 'Noticia Atualizada com sucesso');
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


        foreach($noticiaAtual->fotos  as $fotos){
            Storage::delete($fotos->noticia_foto_path);
        }

        $noticiaAtual->fotos()->delete();
        $noticiaAtual->comentarios()->delete();
        $noticiaAtual->delete();

        return redirect()->route('noticias.index')->with('success', 'Notícia Excluída com sucesso');
    }
}
