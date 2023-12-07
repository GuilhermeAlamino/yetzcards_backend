@extends('admin.main-layout')

@section('content-header')
    <!-- Topbar -->
    @include('admin.components.top-bar')
    <!-- End of Topbar -->
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Configurações</h1>
        <div class="row">
            <div class="col-6">
                <h1 class="h3 mb-2 text-gray-800">Configurações</h1>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <ol class="breadcrumb bg-transparent float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" href="/dashboard/settings">Configurações</li>
                </ol>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Configurações do Sorteio</h6>
            </div>
            <div class="card-body">
                <form class="row" method="POST" action="/dashboard/user/settings">
                    @method('PUT')
                    @csrf
                    <div class="col-3">
                        <label htmlFor="limit_per_team" class="form-label">Limite de Jogadores (Time)</label>
                        <input type="number" class="form-control @error('limit_per_team') is-invalid @enderror"
                            id="limit_per_team" name="limit_per_team" value="{{ $settings['limit_per_team'] ?? '0' }}"
                            autoComplete='off' />
                    </div>
                    <div class="col-3">
                        <label htmlFor="balancing" class="form-label">Balanceamento</label>
                        <select class="form-control @error('balancing') is-invalid @enderror" name="balancing"
                            id="balancing">
                            <option value="1" {{ $settings['balancing'] == 1 ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ $settings['balancing'] == 0 ? 'selected' : '' }}>Desativado</option>
                        </select>
                    </div>
                    <div class="col-12">
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
