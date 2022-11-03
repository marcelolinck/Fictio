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

            <form class="form form-horizontal" method="post" action="{{ route('noticias.store') }}">
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
                                                <div class="col-md-6 form-group pt-1">
                                                    <input type="text" id="descricao" class="form-control" value=""
                                                        name="titulo"
                                                        placeholder="Informe o titulo da noticia a ser criada"
                                                        minleght="5" maxleght="50" tabindex="1">
                                                </div>
                                                @if ($errors->any())
                                                    <div class="col-md-4 form-group">
                                                        <div class="alert alert-warning alert-dismissible fade show"
                                                            role="alert">
                                                            <strong>
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </strong>.
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                @endif
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
                                    <h5 class="card-title">Selecione as fotos para incluir na notícia</h5>
                                </div>
                                {{-- <div class="card-content"> --}}
                                <div class="card-body">

                                    <!-- File uploader with validation -->
                                    <div class="filepond--root with-validation-filepond filepond--hopper"
                                        data-style-button-remove-item-position="left"
                                        data-style-button-process-item-position="right"
                                        data-style-load-indicator-position="right"
                                        data-style-progress-indicator-position="right"
                                        data-style-button-remove-item-align="false" data-hopper-state="drag-drop"
                                        style="height: 76px;"><input class="filepond--browser" type="file"
                                            id="filepond--browser-9dejleahq" aria-controls="filepond--assistant-9dejleahq"
                                            aria-labelledby="filepond--drop-label-9dejleahq" multiple=""
                                            name="noticia_foto[]" required="">
                                        <div class="filepond--drop-label"
                                            style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label
                                                for="filepond--browser-9dejleahq" id="filepond--drop-label-9dejleahq"
                                                aria-hidden="true">Drag &amp; Drop your files or <span
                                                    class="filepond--label-action" tabindex="0">Browse</span></label>
                                        </div>
                                        <div class="filepond--list-scroller"
                                            style="transform: translate3d(0px, 60px, 0px);">
                                            <ul class="filepond--list" role="list"></ul>
                                        </div>
                                        <div class="filepond--panel filepond--panel-root" data-scalable="true">
                                            <div class="filepond--panel-top filepond--panel-root"></div>
                                            <div class="filepond--panel-center filepond--panel-root"
                                                style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.6, 1);">
                                            </div>
                                            <div class="filepond--panel-bottom filepond--panel-root"
                                                style="transform: translate3d(0px, 68px, 0px);"></div>
                                        </div><span class="filepond--assistant" id="filepond--assistant-9dejleahq"
                                            role="status" aria-live="polite" aria-relevant="additions"></span>
                                        <fieldset class="filepond--data"></fieldset>
                                        <div class="filepond--drip"></div>
                                    </div>
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
                                                <p>Clique dentro do campo para selecionar outras tags. Para cadastrar uma nova TAG,<a href="{{ route('tags.index') }}" target="_blank"> clique
                                                        aqui.</a>
                                                </p>
                                                <div class="form-group">
                                                    <select class="choices form-select multiple-remove"
                                                        multiple="multiple" tabindex="3" name="tags[]">
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
                                        <strong>PUBLICADO</strong></p>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="noticia_status_id" name="noticia_status_id">
                                          @foreach ($status as $item)
                                            <option value="{{$item->id}}">{{$item->descricao}}</option>
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
