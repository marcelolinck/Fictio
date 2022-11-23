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
                        <p class="text-subtitle text-muted">Aqui você efetuará o cadastramento da permissão que já está na BLADE.</p>
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
                                    <form class="form form-horizontal" method="post" action="{{ route('permissions.store') }}">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-2 pt-1">
                                                    <label>Descrição da Permissão</label>
                                                </div>
                                                <div class="col-md-6 form-group pt-1">
                                                    <input type="text" id="name" class="form-control"
                                                        value="{{old('name')}}" name="name"
                                                        placeholder="Informe o nome da permissão ex: coment_view, coment_delete, coment_edit ou coment_delete" minleght="5"
                                                        maxleght="50" required>
                                                </div>
                                            </div>
                                            <div class="row">
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
                                                        class="btn btn-primary me-1 mb-1">Cadastrar</button>
                                                    <a href="{{ route('permissions.index') }}"
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
            <!-- // Basic Horizontal form layout section end -->


        </div>
    @endsection
