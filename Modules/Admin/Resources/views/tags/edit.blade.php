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
                        <p class="text-subtitle text-muted">Aqui estão listadas todas as tags que podem e devem ser usadas
                            para criação/edição de noticias</p>
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

            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informe o nome da TAG</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" method="post" action="{{ route('tags.update', $tagAtual->id) }}">
                                        @csrf
                                        @method("patch")
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-2 pt-1">
                                                    <label>Descrição da TAG</label>
                                                </div>
                                                <div class="col-md-6 form-group pt-1">
                                                    <input type="text" id="descricao" class="form-control" value="{{$tagAtual->descricao ?? ''}}"
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
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Atualizar</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
            <!-- // Basic Horizontal form layout section end -->


        </div>
    @endsection
