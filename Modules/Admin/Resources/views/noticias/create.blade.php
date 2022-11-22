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
                        <p class="text-subtitle text-muted">Aqui você pode criar sua nova e classica-la de acordo com o
                            segmento</p>
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
                <div class="col-md-12 form-group">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>
                            <ul style="list-style: none;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <form class="form form-horizontal" enctype="multipart/form-data" method="post"
                action="{{ route('noticias.store') }}">
                @csrf
                @method('post')

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
                                                    <label>Título</label>
                                                </div>
                                                <div class="col-md-10 form-group pt-1">
                                                    <input type="text" id="titulo" class="form-control" value=""
                                                        name="titulo"
                                                        placeholder="Informe o titulo da noticia a ser criada"
                                                        minleght="5" maxleght="50" tabindex="1">
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
                                    <textarea name="corpo" id="default" cols="30" rows="10" tabindex="2">

                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- CORPO DA NOTICIA --}}

                {{-- IMAGENS DA NOTICIA --}}
                <section class="section">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Selecione a para incluir na notícia</h5>
                                </div>
                                {{-- <div class="card-content"> --}}
                                <div class="card-body">
                                    <!-- File uploader with validation -->
                                    <input type="file" name="noticia_foto[]" class="form-control" id="noticia_foto">
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>

                    </div>
                </section>
                {{-- FIM IMAGENS DA NOTICIA --}}

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
                                                    nova TAG,<a href="{{ route('tags.index') }}" target="_blank"> clique
                                                        aqui.</a>
                                                </p>
                                                <div class="form-group">
                                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                                        tabindex="3" name="tags[]">
                                                        <optgroup label="tags">
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->descricao }}">{{ $tag->descricao }}
                                                                </option>
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
                <section class="basic-choices">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <h6>Selecione o status da notícia:</h6>
                                                <p>Importante que irá aparecer ativa somente se estiver com status
                                                    <strong>PUBLICADO</strong>
                                                </p>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="noticia_status_id"
                                                        name="noticia_status_id">
                                                        @foreach ($status as $item)
                                                            <option value="{{ $item->id }}">{{ $item->descricao }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Cadastrar</button>
                                                    <a href="{{ route('noticias.index') }}"
                                                        class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
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


    {{-- FIM DAS TAGS ATRELADAS --}}
    {{-- COMENTARIOS ATRELADOS ATRELADAS --}}
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
