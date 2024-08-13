<div class="modal fade" id="criarProduto" role="dialog" aria-labelledby="criarProdutoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" id="criarProdutoLabel">Criar Produto</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('produtos.store') }}" class="" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nome" class="fw-semibold">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}"
                            id="nome">
                    </div>
                    <div class="form-group mb-2">
                        <label for="preco" class="fw-semibold">Preço</label>
                        <input type="number" class="form-control" name="preco" value="{{ old('preco') }}"
                            step="0.01" id="preco">
                    </div>
                    <div class="form-group mb-2">
                        <label for="preco_custo" class="fw-semibold">Preço de custo</label>
                        <input type="number" class="form-control" value="{{ old('preco_custo') }}" name="preco_custo"
                            step="0.01" id="preco_custo">
                    </div>
                    <div class="form-group mb-2">
                        <label for="descricao" class="fw-semibold">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao') }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="qtd_estoque" class="fw-semibold">Quantidade do Estoque</label>
                        <input type="number" value="{{ old('qtd_estoque') }}" class="form-control" name="qtd_estoque"
                            id="qtd_estoque">
                    </div>
                    <div class="form-group mb-2">
                        <label for="qtd_minima" class="fw-semibold">Quantidade Minima em estoque</label>
                        <input type="number" class="form-control" {{ old('qtd_minima') }} name="qtd_minima"
                            id="qtd_minima">
                    </div>
                    <button type="submit" class="btn col-md-4 btn-primary mt-2">Incluir Produto</button>
                </form>
            </div>
        </div>
    </div>
</div>
