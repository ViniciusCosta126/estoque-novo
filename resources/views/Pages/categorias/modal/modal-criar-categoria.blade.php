<div class="modal fade" id="criarCategoria" role="dialog" aria-labelledby="criarCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" id="criarCategoriaLabelr">Criar Categoria</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('categorias.store') }}" class="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-2 col-md-12">
                            <label for="nome" class="fw-semibold">Nome</label>
                            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}"
                                id="nome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-2 col-md-12">
                            <label for="descricao" class="fw-semibold">Descricao</label>
                            <input type="text" class="form-control" name="descricao" value="{{ old('descricao') }}"
                                id="descricao">
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="status" class="fw-semibold">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn col-md-4 btn-success mt-2">Incluir Categoria</button>
                </form>
            </div>
        </div>
    </div>
</div>
