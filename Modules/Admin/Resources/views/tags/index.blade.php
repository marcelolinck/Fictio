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
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $config['namePage'] }}</li>
                            </ol>
                        </nav>
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




            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class"col-md-2">
                                <a href="{{ route('tags.create') }}" class="btn btn-primary"> Adicionar</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>DESCRIÇÃO</th>
                                    <th class="text-center">DESTAQUE NA HOME</th>
                                    <th>CRIADO EM</th>
                                    <th class="text-center">AÇÕES</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tags as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->descricao }}</td>
                                        <td class="text-center">
                                            @if ($item->destaque == 1)
                                                <a href="#" class="badge bg-light-success">Sim</a>
                                            @else
                                                <a href="#" class="badge bg-light-danger ">Não</a>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->format('d/m/Y h:m') }}</td>
                                        <td class="text-center">
                                            @can('tags_edit', 'tags_delete')
                                                <form action="{{ route('tags.destroy', $item->id) }}" method="post">

                                                    @can('tags_edit')
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="{{ route('users.edit', $item->id) }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Editar"><i
                                                                class="icon dripicons-document-edit"></i>Editar
                                                        </a>
                                                    @endcan
                                                    @can('tags_delete')
                                                        @csrf
                                                        @method('delete')
                                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                                            type="submit" class="btn btn-danger btn-sm"><i
                                                                class="icon dripicons-trash class"></i>Excluir</button>
                                                    @endcan
                                                </form>
                                            @endcan
                                            @cannot('tags_edit', 'tags_delete')
                                                <a href="#" class="badge bg-light-info">Sem ações</a>
                                            @endcannot
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center"colspan='6'>SEM DADOS PARA EXIBIR</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    @endsection
