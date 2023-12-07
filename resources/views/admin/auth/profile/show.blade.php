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
                <h1 class="h3 mb-2 text-gray-800">Meu Perfil</h1>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <ol class="breadcrumb bg-transparent float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/user">Usúarios</a></li>
                    <li class="breadcrumb-item active">Meu Perfil</li>
                </ol>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-4">

                        <h6 class="m-0 font-weight-bold text-primary">Perfil</h6>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/dashboard/profile/edit">
                    @method('PUT')
                    @csrf
                    <div class="col-12">
                        <label htmlFor="name" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $user->name }}" autoComplete='off' />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label htmlFor="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $user->email }}" autoComplete='off' />
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label for="role_id">Tipo</label>
                        <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                            <option selected value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin
                            </option>
                        </select>
                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label htmlFor="password" class="form-label">Atualizar Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="" autoComplete='off' />
                        @if (session('success'))
                            <div class=" mt-3 alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12 pt-3 pt-2">
                        <button type="submit" class="form-control btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
