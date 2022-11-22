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
                        <p class="text-subtitle text-muted">Aqui estão listados todos os comentários de forma fácil para aprovação ou reprovação</p>
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


                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>COMENTÁRIO</th>
                                    <th>AUTOR</th>
                                    <th>TÍTULO DA NOTÍCIA</th>
                                    <th class="text-center">STATUS</th>
                                    <th>CRIADO EM</th>
                                    <th class="text-center">AÇÕES</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($comentarios as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->descricao }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td class="text-center"><a href="{{ route('noticias.edit', $item->id) }}">{{ $item->noticia->titulo }}</a></td>
                                        <td class="text-center">
                                            <a href="#"
                                                class="badge {{ $item->status->corStatus }}">{{ $item->status->descricao }}</a>
                                        </td>
                                        <td>{{ $item->created_at->format('d/m/Y h:m') }}</td>
                                        <td class="text-center">
                                            @can('comment_action')
                                                
                                            
                                            <form action="{{ route('noticiasComentarios.update', $item->id) }}"
                                                method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" id="noticia_id" name="noticia_id"
                                                    value={{ $item->noticia_id }}>

                                                <input type="hidden" id="id" name="id"
                                                    value={{ $item->id }}>
                                                <input type="hidden" id="noticia_comentario_status_id"
                                                    name="noticia_comentario_status_id"
                                                    value={{ $item->noticia_comentario_status_id }}>

                                                <button data-bs-toggle="tooltip" data-bs-placement="top"
                                                    @if ($item->noticia_comentario_status_id == 1 || $item->noticia_comentario_status_id == 3) title="Bloquear" type="submit"
                                                        class="btn btn-success btn-sm"><i class="icon dripicons-trash class"></i>Aprovar
                                                    @else
                                                title="Bloquear" type="submit"
                                                class="btn btn-danger btn-sm"><i class="icon dripicons-trash class"></i>Reprovar @endif
                                                    </button>
                                            </form>
                                            @endcan
                                            @cannot('comment_action')
                                                <a href="#" class="badge bg-light-secondary">Sem ações</a>
                                            @endcannot
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td>--------</td>
                                        <td>SEM </td>
                                        <td>DADOS</td>
                                        <td>--------</td>

                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    @endsection
