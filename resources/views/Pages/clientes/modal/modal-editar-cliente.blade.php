@props(['cliente'])
<div class="modal fade" id="editModal{{ $cliente->id }}"" role="dialog" aria-labelledby="editarClienteLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" id="editarClienteLabel">Editar Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.update', $cliente->id) }}" class="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="nome" class="fw-semibold">Nome</label>
                            <input type="text" value="{{ $cliente->nome }}" class="form-control" name="nome"
                                id="nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf" class="fw-semibold">CPF</label>
                            <input type="text" class="form-control" value="{{ $cliente->cpf }}" name="cpf"
                                id="cpf">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="email" class="fw-semibold">Email</label>
                            <input type="text" class="form-control" value="{{ $cliente->email }}" name="email"
                                id="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone" class="fw-semibold">Telefone</label>
                            <input type="text" class="form-control" value="{{ $cliente->telefone }}" name="telefone"
                                id="telefone">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-4">
                            <label for="endereco" class="fw-semibold">Endereço</label>
                            <input type="text" name="endereco" value="{{ $cliente->endereco }}" id="endereco"
                                class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numero_endereco" class="fw-semibold">Nº Endereço</label>
                            <input type="text" name="numero_endereco" value="{{ $cliente->numero_endereco }}"
                                id="numero_endereco" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complemento" class="fw-semibold">Complemento</label>
                            <input type="text" name="complemento" value="{{ $cliente->complemento }}"
                                id="complemento" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn col-md-4 btn-primary mt-2">Salvar Cliente</button>
                </form>
            </div>
        </div>
    </div>
</div>
