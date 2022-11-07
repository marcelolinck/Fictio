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
    {{-- FIM DO STATUS --}}
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
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" id="comentarios">
                        <h4 class="card-title">Comentários</h4>
                    </div>
                    <div class="card-body">

                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>USUÁRIO</th>
                                        <th>E-MAIL</th>
                                        <th>COMENTÁRIO</th>
                                        <th>DATA DA PUBLICAÇÃO</th>
                                        <th>STATUS</th>
                                        <th class="text-center">AÇÕES</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($noticiaAtual->comentarios as $comentario)
                                        <tr>
                                            <td>{{ $comentario->id }}</td>
                                            <td>{{ $comentario->user->name }}</td>
                                            <td>{{ $comentario->user->email }}</td>
                                            <td>{{ $comentario->descricao }}</td>
                                            <td>{{ $comentario->created_at->format('d/m/Y h:m') }}</td>
                                            <td><span
                                                    class="badge {{ $comentario->status->corStatus }}">{{ $comentario->status->descricao }}</span>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('noticiasComentarios.update', $comentario->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="hidden" id="noticia_id" name="noticia_id"
                                                        value={{ $noticiaAtual->id }}>

                                                    <input type="hidden" id="id"
                                                        name="id"value={{ $comentario->id }}>
                                                    <input type="hidden" id="noticia_comentario_status_id"
                                                        name="noticia_comentario_status_id"
                                                        value={{ $comentario->noticia_comentario_status_id }}>

                                                    <button data-bs-toggle="tooltip" data-bs-placement="top"
                                                        @if ($comentario->noticia_comentario_status_id == 1 || $comentario->noticia_comentario_status_id == 3) title="Bloquear" type="submit"
                                                                    class="btn btn-success btn-sm"><i
                                                                    class="icon dripicons-trash class"></i>Aprovar
                                                                @else
                                                                    title="Bloquear" type="submit"
                                                                    class="btn btn-danger btn-sm"><i
                                                                    class="icon dripicons-trash class"></i>Reprovar @endif
                                                        </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="7">SEM COMENTÁRIOS ATÉ O MOMENTO</td>


                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
