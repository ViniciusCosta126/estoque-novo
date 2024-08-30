@props(['categorias'])

<div class="modal fade" id="criarProduto" role="dialog" aria-labelledby="criarProdutoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" id="criarProdutoLabel">Criar Produto</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('produtos.store') }}" class="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-2 col-md-12">
                            <label for="nome" class="fw-semibold">Nome</label>
                            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}"
                                id="nome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-2 col-md-6">
                            <label for="preco" class="fw-semibold">Preço</label>
                            <input type="number" class="form-control" name="preco" value="{{ old('preco') }}"
                                step="0.01" id="preco">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="preco_custo" class="fw-semibold">Preço de custo</label>
                            <input type="number" class="form-control" value="{{ old('preco_custo') }}"
                                name="preco_custo" step="0.01" id="preco_custo">
                        </div>
                    </div>


                    <div class="form-group mb-2">
                        <label for="descricao" class="fw-semibold">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group mb-2 col-md-6">
                            <label for="qtd_estoque" class="fw-semibold">Quantidade do Estoque</label>
                            <input type="number" value="{{ old('qtd_estoque') }}" class="form-control"
                                name="qtd_estoque" id="qtd_estoque">
                        </div>
                        <div class="form-group mb-2 col-md-6">
                            <label for="qtd_minima" class="fw-semibold">Quantidade Minima em estoque</label>
                            <input type="number" class="form-control" {{ old('qtd_minima') }} name="qtd_minima"
                                id="qtd_minima">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoria_id" class="fw-semibold">Categoria</label>
                        <select class="form-control" name="categoria_id" id="categoria_id">
                            @foreach ($categorias as $item)
                                @if ($item->status != 0)
                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn col-md-4 btn-success mt-2">Incluir Produto</button>
                </form>
            </div>
        </div>
    </div>
</div>
