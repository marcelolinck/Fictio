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
                        <p class="text-subtitle text-muted">Aqui estão listadas todas as permissõe que podem e devem ser
                            usadas
                            para criação/edição de grupos de acesso.</p>

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
                                <a href="{{ route('permissions.create') }}" class="btn btn-primary"> Adicionar</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PERMISSÃO</th>
                                    <th>CRIADO EM</th>
                                    <th class="text-center">AÇÕES</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at->format('d/m/Y h:m') }}</td>
                                        <td class="text-center">
                                            @can('permission_edit', 'permission_delete')
                                                <form action="{{ route('permissions.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    @can('permission_edit')
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="{{ route('permissions.edit', $item->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><i
                                                                class="icon dripicons-document-edit"></i>Editar</a>
                                                    @endcan
                                                    @can('permission_delete')
                                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                                            type="submit" class="btn btn-danger btn-sm"><i
                                                                class="icon dripicons-trash class"></i>Excluir</button>
                                                    @endcan
                                                    @cannot('group_edit', 'group_delete')
                                                        <a href="#" class="badge bg-light-info">Sem ações</a>
                                                    @endcannot
                                                @endcan
                                            </form>
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
