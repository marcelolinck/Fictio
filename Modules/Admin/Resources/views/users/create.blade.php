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
                    <p class="text-subtitle text-muted">Aqui você pode criar um novo usuário e definir a que grupo o mesmo irá pertencer:</p>
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
                            <h4 class="card-title">Informe o nome do usuário</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="post" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2 pt-1">
                                                <label>Nome do usuário:</label>
                                            </div>
                                            <div class="col-md-10 form-group pt-1">
                                                <input type="text" class="form-control" value="{{ old('name')}}" name="name" id="name" placeholder="Informe o nome do usuário" minleght="5" maxleght="50" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Email: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('name')}}" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 pt-1">
                                                <label>Pertencerá ao grupo:</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="form-select" id="role_id" name="role_id" required>
                                                    <option value="">Selecione</option>
                                                    @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Senha: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="informe a senha" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Status: </label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="form-select" id="status_id" name="status_id" required>
                                                    @foreach ($status as $item)
                                                    <option value="{{$item->id}}">{{$item->descricao}}</option>
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
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Cadastrar</button>
                                                <a href="{{ route('users.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
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
