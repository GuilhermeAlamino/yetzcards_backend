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
                <h1 class="h3 mb-2 text-gray-800">Atualizar Jogador</h1>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <ol class="breadcrumb bg-transparent float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/player">Gerenciar Jogadores</a></li>
                    <li class="breadcrumb-item active">Atualizar Jogador</li>
                </ol>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-4">

                        <h6 class="m-0 font-weight-bold text-primary">Jogador</h6>
                    </div>
                    <div class="col-lg-8 d-flex justify-content-end">
                        <a href="/player/delete/{{ $player->id }}" class="btn btn-danger btn-sm btn-act-table">
                            <i class="fas fa-trash"></i> Deletar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/player/edit/{{ $player->id }}">
                    @method('PUT')
                    @csrf
                    <div class="col-12">
                        <label htmlFor="name" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $player->name }}" autoComplete='off' />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label htmlFor="nivel" class="form-label">Nivel</label>
                        <select class="form-control @error('nivel') is-invalid @enderror" name="nivel" id="nivel">
                            <option value="1" {{ $player->nivel == 1 ? 'selected' : '' }}>Iniciante
                            </option>
                            <option value="2" {{ $player->nivel == 2 ? 'selected' : '' }}>Intermediário
                            </option>
                            <option value="3" {{ $player->nivel == 3 ? 'selected' : '' }}>Avançado
                            </option>
                            <option value="4" {{ $player->nivel == 4 ? 'selected' : '' }}>Expert
                            </option>
                            <option value="5" {{ $player->nivel == 5 ? 'selected' : '' }}>Veterano
                            </option>
                        </select>
                        @error('nivel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="goalkeeper">Goleiro</label>
                        <select class="form-control @error('goalkeeper') is-invalid @enderror" name="goalkeeper"
                            id="goalkeeper">
                            <option value="1" {{ $player->goalkeeper == 1 ? 'selected' : '' }}>Sim
                            </option>
                            <option value="0" {{ $player->goalkeeper == 0 ? 'selected' : '' }}>Não
                            </option>
                        </select>
                        @error('goalkeeper')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="confirmed">Confirmado</label>
                        <select class="form-control @error('confirmed') is-invalid @enderror" name="confirmed"
                            id="confirmed">
                            <option value="1" {{ $player->confirmed == 1 ? 'selected' : '' }}>Sim
                            </option>
                            <option value="0" {{ $player->confirmed == 0 ? 'selected' : '' }}>Não
                            </option>
                        </select>
                        @if (session('success'))
                            <div class=" mt-3 alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12 pt-3">
                        <button type="submit" class="form-control btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
