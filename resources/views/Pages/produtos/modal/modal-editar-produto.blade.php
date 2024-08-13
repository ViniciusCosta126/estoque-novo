@props(['produto'])

<div class="modal fade" id="editModal{{ $produto->id }}" role="dialog" aria-labelledby="editModalLabel{{ $produto->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="editModalLabel{{ $produto->id }}">Editar Produto</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="nome" class="fw-semibold">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="{{ $produto->nome }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="preco" class="fw-semibold">Preço</label>
                        <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                            value="{{ $produto->preco }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="preco_custo" class="fw-semibold">Preço Custo</label>
                        <input type="number" step="0.01" class="form-control" id="preco_custo" name="preco_custo"
                            value="{{ $produto->preco_custo }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="descricao" class="fw-semibold">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control">{{ $produto->descricao }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="qtd_estoque" class="fw-semibold">Quantidade em Estoque</label>
                        <input type="number" class="form-control" id="qtd_estoque" name="qtd_estoque"
                            value="{{ $produto->qtd_estoque }}">
                    </div>
                    <div class="form-group">
                        <label for="qtd_minima" class="fw-semibold">Quantidade Mínima</label>
                        <input type="number" class="form-control" id="qtd_minima" name="qtd_minima"
                            value="{{ $produto->qtd_minima }}">
                    </div>
                    <button type="submit" class="btn mt-2 btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
