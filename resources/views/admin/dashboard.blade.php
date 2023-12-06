@extends('admin.main-layout')

@section('content-header')
    <!-- Topbar -->
    @include('admin.components.top-bar')
    <!-- End of Topbar -->
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jogadores (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $players ?? 0 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Confirmados (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $quantidadeJogadoresConfirmados ?? 0 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Goleiros (Total)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $quantidadeGoleiros ?? 0 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Sortear Jogadores</h6>
                    </div>
                    <div class="card-body">
                        <form class="row" method="POST" action="/dashboard/sortear/store">
                            @csrf
                            <div class="col-12">
                                @if (session('success'))
                                    <div class=" mt-3 alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class=" mt-3 alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                            </div>
                            @endif
                            <div class="col-12 pt-3">
                                <button type="submit" class="form-control btn btn-primary">Sortear</button>
                            </div>
                            <div class="col-12">
                                @if (session('success'))
                                    <div class=" mt-3 alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    @if (isset($time1) && isset($time2))
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-12">
                                        <h5 class="m-0 font-weight-bold text-primary mb-3 text-center">Time A</h5>
                                        <table class="table table-bordered" id="dataTable1" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nome</th>
                                                    <th>Nivel</th>
                                                    <th>Goleiro</th>
                                                    <th>Confirmado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($time1 as $timea)
                                                    <tr>
                                                        <td>{{ $timea['id'] }}</td>
                                                        <td>{{ $timea['name'] }}</td>
                                                        <td>{{ __('auth.nivel.' . $timea['nivel']) }}</td>
                                                        <td>{{ $timea['goalkeeper'] == 1 ? 'Sim' : 'Não' }}</td>
                                                        <td>
                                                            <div class="ring-container">

                                                                @if ($timea['confirmed'] == 0)
                                                                    <div class="ringring dot-red"></div>
                                                                @else
                                                                    <div class="ringring dot-green"></div>
                                                                @endif

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-12">
                                        <h5 class="m-0 font-weight-bold text-primary mb-3 text-center">Time B</h5>
                                        <table class="table table-bordered" id="dataTable2" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nome</th>
                                                    <th>Nivel</th>
                                                    <th>Goleiro</th>
                                                    <th>Confirmado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($time2 as $timeb)
                                                    <tr>
                                                        <td>{{ $timeb['id'] }}</td>
                                                        <td>{{ $timeb['name'] }}</td>
                                                        <td>{{ __('auth.nivel.' . $timeb['nivel']) }}</td>
                                                        <td>{{ $timeb['goalkeeper'] == 1 ? 'Sim' : 'Não' }}</td>
                                                        <td>
                                                            <div class="ring-container">

                                                                @if ($timeb['confirmed'] == 0)
                                                                    <div class="ringring dot-red"></div>
                                                                @else
                                                                    <div class="ringring dot-green"></div>
                                                                @endif

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
