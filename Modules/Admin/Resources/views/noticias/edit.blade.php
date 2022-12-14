@extends('admin::layouts.layout')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-8 order-md-1 order-last">
                        <h3>{{ $config['title'] }} - {{ $config['namePage'] }}</h3>
                        <p class="text-subtitle text-muted">Aqui você pode editar a noticia selecionada, visualizar os
                            comentários e aprovar/reprovar algum comentário inadequado</p>
                    </div>


                    <div class="col-12 col-md-4 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('noticias.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $config['namePage'] }}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            @if (\Session::has('danger'))
                <div class="alert alert-danger alert-dismissible show fade">
                    {!! \Session::get('danger') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    {!! \Session::get('success') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="col-md-4 form-group">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </strong>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <form class="form form-horizontal" method="post" action="{{ route('noticias.update', $noticiaAtual->id) }}">
                @csrf
                @method('patch')
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informações do título:</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-md-2 pt-1">
                                                    <label>Título:</label>
                                                </div>
                                                <div class="col-md-10 form-group pt-1">
                                                    <input type="text" id="descricao" class="form-control"
                                                        value="{{ $noticiaAtual->titulo ?? '' }}" name="titulo"
                                                        placeholder="Informe o nome da tag ex: Futebol" minleght="5"
                                                        maxleght="50">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                {{-- CORPO DA NOTICIA --}}
                <section class="section">


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Corpo da notícia</h4>
                                </div>
                                <div class="card-body">
                                    <textarea name="corpo" id="default" cols="30" rows="10">
                                {{ $noticiaAtual->corpo ?? '' }}
                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- CORPO DA NOTICIA --}}
                {{-- FOTOS DA NOTICIA --}}
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Foto incluida - Clique na foto para abrir as opções(caso tenha foto abaixo)</h5>
                                </div>

                                <div class="row">
                                    @forelse ($noticiaAtual->fotos as $foto)
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <a href="#opcoesFoto{{ $foto->id }}" data-bs-toggle="collapse"
                                                            role="button" aria-expanded="true" aria-controls="opcoesFoto">
                                                            <img class="img-fluid w-100"
                                                                src="
                                                            @if (str_contains($foto->noticia_foto_path, 'http')) {{ $foto->noticia_foto_path }}
                                                             @else
                                                                {{ url('storage/' . $foto->noticia_foto_path) }} @endif
                                                            "
                                                                alt="foto{{ $foto->id }}">
                                                        </a>
                                                    </div>
                                                    <div class="card-footer justify-content-center collapse mb-4"
                                                        id="opcoesFoto{{ $foto->id }}" style="">
                                                        <button type="button" class="btn btn-primary block"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEditarFoto{{ $foto->id }}">
                                                            Editar
                                                        </button>

                                                        <button type="button" class="btn btn-danger block"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalExclusao{{ $foto->id }}">
                                                            Excluir
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <div class="m-3 alert alert-dark">
                                                Nenhuma foto cadastrada - <button type="button" class="btn btn-success block" data-bs-toggle="modal"
                                                data-bs-target="#modalAdicionarFoto">
                                                 Clique aqui para adicionar Foto
                                            </button>
                                            </div>
                                        </div>
                                        
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                {{-- FIM DAS FOTOS NOTICIA --}}

                {{-- TAGS ATRELADAS --}}
                <section class="multiple-choices">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <h6>Tags</h6>
                                                <p>Clique dentro do campo para selecionar outras tags. Para cadastrar uma
                                                    nova
                                                    TAG,<a href="{{ route('tags.index') }}" target="_blank"> clique
                                                        aqui.</a>
                                                </p>
                                                <div class="form-group">
                                                    <select class="choices form-select multiple-remove" name="tags[]"
                                                        multiple="multiple">
                                                        <optgroup label="tags">
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->descricao }}"
                                                                    @foreach ($noticiaAtual->tags as $tagAtual)
                                                            @if ($tag->descricao == $tagAtual)
                                                            selected
                                                            @endif @endforeach>
                                                                    {{ $tag->descricao }}
                                                            @endforeach

                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- FIM DAS TAGS ATRELADAS --}}
                {{-- INICIO DO STATUS --}}
                <section class="basic-choices">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <h6>Selecione o status da notícia:</h6>
                                                <p>Importante: A notícia irá aparecer no site somente se estiver com status
                                                    <strong>PUBLICADO</strong>
                                                </p>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="noticia_status_id"
                                                        name="noticia_status_id">
                                                        @foreach ($status as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($noticiaAtual->noticia_status_id == $item->id) selected @endif>
                                                                {{ $item->descricao }}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Atualizar</button>
                                                    <a href="{{ route('noticias.index') }}"
                                                        class="btn btn-light-danger me-1 mb-1">Cancelar</a>
                                                </div>
                                            </div>

                                        </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>


    {{-- FIM DO STATUS --}}
    {{-- INICIO DO ADICIONAR FOTO --}}

    <div class="modal fade" id="modalAdicionarFoto" tabindex="-1" aria-labelledby="modaltitleAdicionar"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <form action="{{ route('fotos.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="noticia_id" value="{{ $noticiaAtual->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltitleAdicionar">
                            <h4 class="card-title">Selecione uma foto:</h4>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </button>
                    </div>

                    <div class="modal-body">
                        <input class="form-control" type="file" name='noticia_foto' id='noticia_foto' required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cancelar</span>
                        </button>
                        <button type="submit" class="btn btn-success ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Adicionar</span>
                        </button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    {{-- FIM DO ADICIONAR FOTO --}}

    {{-- MODAL EDITAR FOTO --}}
    @foreach ($noticiaAtual->fotos as $foto)
        <div class="modal fade" id="modalEditarFoto{{ $foto->id }}" tabindex="-1"
            aria-labelledby="modaltitleEditar" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <form action="{{ route('fotos.update', $foto->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltitleEditar">
                                <h4 class="card-title">Atualizar foto {{ $foto->id }}!</h4>
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18">
                                    </line>
                                    <line x1="6" y1="6" x2="18" y2="18">
                                    </line>
                                </svg>
                            </button>
                        </div>

                        <div class="modal-body">
                            <input type="file" class="form-control" name='fotoAtualizar' required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Cancelar</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Atualizar Foto</span>
                            </button>
                        </div>
                </form>
            </div>
        </div>
        </div>
    @endforeach
    {{-- FIM MODAL EDITAR FOTO --}}

    {{-- MODAL EXCLUSAO --}}
    @foreach ($noticiaAtual->fotos as $foto)
        <div class="modal fade" id="modalExclusao{{ $foto->id }}" tabindex="-1"
            aria-labelledby="modaltitleExclusao" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <form action="{{ route('fotos.destroy', $foto->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaltitleExclusao">
                                <h4 class="card-title">Confirmação!</h4>
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18">
                                    </line>
                                    <line x1="6" y1="6" x2="18" y2="18">
                                    </line>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="card-title">Deseja excluir a foto {{ $foto->id }}?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Cancelar</span>
                            </button>
                            <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Confirmo a exclusão</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    {{-- FIM MODAL EXCLUSAO --}}

    @if (\Session::has('danger_tag'))
        <div class="alert alert-danger alert-dismissible show fade">
            {!! \Session::get('danger_tag') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (\Session::has('success_tag'))
        <div class="alert alert-success alert-dismissible show fade">
            {!! \Session::get('success_tag') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
   
    </div>
@endsection
