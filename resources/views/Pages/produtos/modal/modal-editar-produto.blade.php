@props(['produto', 'categorias'])

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
                    <div class="row">
                        <div class="form-group mb-2 col-md-6">
                            <label for="preco" class="fw-semibold">Preço</label>
                            <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                                value="{{ $produto->preco }}">
                        </div>
                        <div class="form-group mb-2 col-md-6">
                            <label for="preco_custo" class="fw-semibold">Preço Custo</label>
                            <input type="number" step="0.01" class="form-control" id="preco_custo"
                                name="preco_custo" value="{{ $produto->preco_custo }}">
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="descricao" class="fw-semibold">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control">{{ $produto->descricao }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <label for="qtd_estoque" class="fw-semibold">Quantidade em Estoque</label>
                            <input type="number" class="form-control" id="qtd_estoque" name="qtd_estoque"
                                value="{{ $produto->qtd_estoque }}">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="qtd_minima" class="fw-semibold">Quantidade Mínima</label>
                            <input type="number" class="form-control" id="qtd_minima" name="qtd_minima"
                                value="{{ $produto->qtd_minima }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoria" class="fw-semibold">Categoria</label>
                        <select class="form-control" name="categoria" id="categoria">
                            @foreach ($categorias as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $produto->categoria->id ? 'selected' : '' }}>{{ $item->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn mt-2 col-md-4 btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
