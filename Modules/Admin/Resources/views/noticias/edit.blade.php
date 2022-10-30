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
                                <li class="breadcrumb-item"><a href="/admin/tags">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $config['namePage'] }}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informações do título</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" method="post" action="{{ route('tags.update', $noticiaAtual->id) }}">
                                        @csrf
                                        @method("patch")
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-2 pt-1">
                                                    <label>Título</label>
                                                </div>
                                                <div class="col-md-6 form-group pt-1">
                                                    <input type="text" id="descricao" class="form-control" value="{{$noticiaAtual->titulo ?? ''}}"
                                                        name="descricao" placeholder="Informe o nome da tag ex: Futebol"
                                                        minleght="5" maxleght="50">
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
                                    </form>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Corpo da notícia</h4>
                            </div>
                            <div class="card-body">
                                <textarea name="" id="default" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Comentários</h4>
                            </div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection
