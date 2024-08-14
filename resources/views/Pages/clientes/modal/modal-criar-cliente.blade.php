<div class="modal fade" id="criarCliente" role="dialog" aria-labelledby="criarClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" id="criarClienteLabel">Criar Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.store') }}" class="" method="POST">
                    @csrf
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="nome" class="fw-semibold">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf" class="fw-semibold">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-6">
                            <label for="email" class="fw-semibold">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefone" class="fw-semibold">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group col-md-4">
                            <label for="endereco" class="fw-semibold">Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="numero_endereco" class="fw-semibold">Nº Endereço</label>
                            <input type="text" name="numero_endereco" id="numero_endereco" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complemento" class="fw-semibold">Complemento</label>
                            <input type="text" name="complemento" id="complemento" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn col-md-4 btn-primary mt-2">Incluir Cliente</button>
                </form>
            </div>
        </div>
    </div>
</div>
