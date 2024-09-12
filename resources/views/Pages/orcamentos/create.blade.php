<x-layout>
    <div class="mt-2">
        <h1 class="mb-4">Criar Orçamento</h1>

        <form action="" method="POST">
            @csrf
            <div class="mb-3 col-md-6">
                <label for="cliente_id" class="form-label">Cliente:</label>
                <select name="cliente_id" id="cliente_id" class="form-select">
                    <option value="" selected disabled>Selecione um cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <h3>Produtos</h3>
            <div class="mb-3 col-md-6">
                <label for="produtoSelect" class="form-label">Escolha um Produto</label>
                <select id="produtoSelect" class="form-select">
                    <option value="" selected disabled>Selecione um produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }} - R$
                            {{ number_format($produto->preco, 2, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>

            <div id="produtoCards" class="row"></div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Salvar Orçamento</button>
            </div>
        </form>
    </div>
</x-layout>

<script>
    const produtos = @json($produtos);
    const produtoSelect = document.getElementById('produtoSelect');
    const produtoCards = document.getElementById('produtoCards');

    produtoSelect.addEventListener('change', function() {
        const produtoId = this.value;
        const produto = produtos.find(p => p.id == produtoId);

        if (!document.getElementById(`produto-card-${produtoId}`)) {
            const card = `
                <div class="col-md-2 mb-4" id="produto-card-${produtoId}">
                    <div class="card h-100">
                        <div class="card-body position-relative">
                            <h5 class="card-title">${produto.nome}</h5>
                            <p class="card-text">Preço: R$ ${produto.preco.toFixed(2).replace('.', ',')}</p>
                            <div class="mb-3">
                                <input type="hidden" name="produtos[${produto.id}][id]" value="${produto.id}">
                                <label for="quantidade-${produto.id}" class="form-label">Quantidade:</label>
                                <input type="number" class="form-control" name="produtos[${produto.id}][quantidade]" id="quantidade-${produto.id}" min="1" value="1">
                            </div>
                        </div>
                        <div class="position-absolute top-0 end-0 me-2 mt-2">
                            <button type="button" class="btn btn-danger" onclick="removeCard(${produto.id})"><i class="fa-regular fa-rectangle-xmark"></i></button>
                        </div>
                    </div>
                </div>`;

            produtoCards.insertAdjacentHTML('beforeend', card);
        }
    });

    function removeCard(produtoId) {
        const card = document.getElementById(`produto-card-${produtoId}`);
        card.remove();
    }
</script>
