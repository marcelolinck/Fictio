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
                                <h4 class="card-title">Edição do usuário</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" method='post' action='{{ route('users.update', $userAtual->id)}}'>
                                    @csrf
                                    @method('patch')

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nome do usuário: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="name" class="form-control" name="name"
                                                    placeholder="Informe o nome do usuário"
                                                    value="{{ $userAtual->name }}" required="required">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Email: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="email" id="email" class="form-control" name="email"
                                                    placeholder="Email" value="{{ $userAtual->email }}" required="required">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Grupo de Acesso: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="form-select" id="role_id" name="role_id" required="required" >
                                                    <option value="">Selecione</option>
                                                   
                                                    @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $userRole) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Senha: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Status: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="form-select" id="status_id" name="status_id" required>
                                                    @foreach ($status as $status_selec)
                                                        <option value="{{ $status_selec->id }}" @if ($status_selec->id ==  $userAtual->status_id) selected @endif>{{ $status_selec->descricao }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                             @if ($errors->any())
                                            <div class="col-md-12 form-group">
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
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Atualizar</button>
                                                <a href="{{ route('users.index') }}" type="reset"
                                                    class="btn btn-secondary me-1 mb-1" autofocus>Cancelar</a>
                                            </div>

                                        </div>
                                    </div>


                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- // Basic Horizontal form layout section end -->


        </div>
    @endsection
