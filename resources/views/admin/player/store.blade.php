@extends('admin.main-layout')

@section('content-header')
    <!-- Topbar -->
    @include('admin.components.top-bar')
    <!-- End of Topbar -->
@endsection

@section('body')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Criar Jogadores</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jogadores</h6>
            </div>
            <div class="card-body">
                <form class="row" method="POST" action="/dashboard/player/store" id="player-form">
                    @csrf
                    <div id="dynamic-fields-container" class="col-12">
                        <!-- Grupo inicial de campos -->
                        <div class="dynamic-fields-group">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" name="name[]"
                                        placeholder="Digite seu nome" />
                                </div>
                                <div class="col-3">
                                    <label for="nivel">Nível</label>
                                    <select class="form-control" name="nivel[]">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">Iniciante</option>
                                        <option value="2">Intermediário</option>
                                        <option value="3">Avançado</option>
                                        <option value="4">Expert</option>
                                        <option value="5">Veterano</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="goalkeeper">Goleiro</label>
                                    <select class="form-control" name="goalkeeper[]">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="confirmed">Confirmado</label>
                                    <select class="form-control" name="confirmed[]">
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>

                                <div class="col-2 d-flex align-self-end pt-3">
                                    <button type="button" class="btn btn-danger"
                                        onclick="removeFieldsGroup(this)">Remover</button>
                                </div>

                                <div class="col-12">
                                    @if (session('success'))
                                        <div class=" mt-3 alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pt-3">
                        <button type="button" class="btn btn-success mb-3" onclick="addFieldsGroup()">Adicionar
                            Formulário</button>
                        <button type="submit" class="form-control btn btn-primary">Criar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        var maxGroups = {{ Auth::user()->limit_per_team }};
        var currentGroups = 1;

        function addFieldsGroup() {
            if (currentGroups < maxGroups) {
                var groupClone = document.querySelector('.dynamic-fields-group').cloneNode(true);
                groupClone.querySelectorAll('input, select').forEach(function(input) {
                    input.value = '';
                });
                document.getElementById('dynamic-fields-container').appendChild(groupClone);
                currentGroups++;

                // Atualizar o estado do botão de remoção
                updateRemoveButtonState();
            }
        }

        function removeFieldsGroup(button) {
            var groups = document.querySelectorAll('.dynamic-fields-group');
            if (groups.length > 1) {
                var groupToRemove = button.parentNode.parentNode;
                groupToRemove.parentNode.removeChild(groupToRemove);
                currentGroups--;

                // Atualizar o estado do botão de remoção
                updateRemoveButtonState();
            }
        }

        function updateRemoveButtonState() {
            var removeButtons = document.querySelectorAll('.dynamic-fields-group .btn-danger');
            removeButtons.forEach(function(button) {
                button.disabled = currentGroups <= 1;
            });
        }
    </script>
@endsection
