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
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            autoComplete='off' readonly />
                    </div>
                    <div class="col-12">
                        <label htmlFor="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                            autoComplete='off' readonly />
                    </div>
                    <div class="col-12">
                        <label for="password">Tipo</label>
                        <select disabled class="form-control @error('role_id') is-invalid @enderror" name="role_id"
                            id="role_id">
                            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
