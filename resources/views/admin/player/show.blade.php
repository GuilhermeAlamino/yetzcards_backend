@extends('admin.main-layout')

@section('content-header')
    <!-- Topbar -->
    @include('admin.components.top-bar')
    <!-- End of Topbar -->
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Usuários</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Usúario</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="col-12">
                        <label htmlFor="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $player->name }}"
                            autoComplete='off' readonly />
                    </div>
                    <div class="col-12">
                        <label htmlFor="nivel" class="form-label">Nível</label>
                        <input type="text" class="form-control" id="nivel" name="nivel"
                            value="{{ __('auth.nivel.' . $player->nivel) }}" autoComplete='off' readonly />
                    </div>
                    <div class="col-12">
                        <label for="goalkeeper">Goleiro</label>
                        <select disabled class="form-control" name="goalkeeper" id="goalkeeper">
                            <option value="1" selected>{{ $player->goalkeeper == 1 ? 'Sim' : 'Não' }}
                            </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="confirmed">Confirmado</label>
                        <select disabled class="form-control" name="confirmed" id="confirmed">
                            <option value="1" selected>{{ $player->confirmed == 1 ? 'Sim' : 'Não' }}
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
