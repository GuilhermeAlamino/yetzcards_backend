@extends('admin.main-layout')

@section('content-header')
    <!-- Topbar -->
    @include('admin.components.top-bar')
    <!-- End of Topbar -->
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-2 text-gray-800">Gerenciar Jogadores</h1>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <ol class="breadcrumb bg-transparent float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gerenciar Jogadores</li>
                </ol>
            </div>
        </div>
        @if (session('success'))
            <div class=" mt-3 alert alert-danger">
                {{ session('success') }}
            </div>
        @endif

        @if (session('success_verify'))
            <div class=" mt-3 alert alert-success">
                {{ session('success_verify') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Jogadores</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Nivel</th>
                                <th>Goleiro</th>
                                <th>Confirmado</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <td>{{ $player['id'] }}</td>
                                    <td>{{ $player['name'] }}</td>
                                    <td>{{ __('auth.nivel.' . $player['nivel']) }}</td>
                                    <td>{{ $player['goalkeeper'] == 1 ? 'Sim' : 'Não' }}</td>
                                    <td>
                                        <div class="ring-container">

                                            @if ($player['confirmed'] == 0)
                                                <div class="ringring dot-red"></div>
                                            @else
                                                <div class="ringring dot-green"></div>
                                            @endif

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="/dashboard/player/show/{{ $player->id }}"
                                                class="btn btn-primary btn-sm btn-act-table">
                                                <i class="fas fa-eye"></i> Visualizar
                                            </a>
                                            <a href="/dashboard/player/edit/{{ $player->id }}"
                                                class="btn btn-success btn-sm btn-act-table mx-1">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <form action="/dashboard/player/delete/{{ $player->id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm btn-act-table">
                                                    <i class="fas fa-trash"></i> Deletar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $players->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
