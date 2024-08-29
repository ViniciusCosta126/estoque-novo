<x-layout title="Produtos">
    <div class="mt-4">
        @if ($mensagemSucesso)
            <div class="alert alert-success">
                {{ $mensagemSucesso }}
            </div>
        @endif
        <h2 class="h1">Produtos</h2>
        <button class="btn btn-success mb-2 col-md-2" data-bs-toggle="modal" data-bs-target="#criarProduto">Incluir novo
            Produto
        </button>
        <input class="form-control mb-2" id="tableSearch" type="text" placeholder="Buscar na Tabela pelo nome">
        <div class="table-responsive card shadow h-75">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-light">
                        <th scope="col">ID</th>
                        <th scope="col"><a id="sortName" href="#"
                                class="text-decoration-none text-light">Nome</a>
                        </th>
                        <th scope="col">Preco</th>
                        <th scope="col">Preco Custo</th>
                        <th scope="col">Margem</th>
                        <th scope="col">Quantidade Estoque</th>
                        <th scope="col">Qtd Minima em Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="productTable" class="table-group-divider align-middle">
                    @foreach ($produtos as $produto)
                        <tr class="{{ $produto->qtd_estoque < $produto->qtd_minima ? 'table-danger' : '' }}">
                            <th scope="row">
                                <a data-bs-toggle="modal" data-bs-target="#showModal{{ $produto->id }}"
                                    class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                    {{ $produto->id }}
                                </a>
                            </th>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ \App\Helpers\ProdutoHelper::formatCurrency($produto->preco) }}</td>
                            <td>{{ \App\Helpers\ProdutoHelper::formatCurrency($produto->preco_custo) }}</td>
                            <td>{{ \App\Helpers\ProdutoHelper::formatPorcentage($produto->preco_custo, $produto->preco) }}
                            </td>
                            <td>{{ $produto->qtd_estoque }}</td>
                            <td>{{ $produto->qtd_minima }}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $produto->id }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                    class="ms-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @include('Pages.produtos.modal.modal-editar-produto', ['produto' => $produto])
                        @include('Pages.produtos.modal.modal-show-produto', ['produto' => $produto])
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex gap-2 justify-content-center mt-3">
                {{ $produtos->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @include('Pages.produtos.modal.modal-criar-produto')
    </div>

    <script>
        $(document).ready(function() {
            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        document.getElementById('sortName').addEventListener('click', function() {
            const table = document.getElementById('productTable');
            const rows = Array.from(table.querySelectorAll('tr'));
            const sortedRows = rows.sort((a, b) => {
                const nameA = a.querySelectorAll('td')[0].textContent.toLowerCase();
                const nameB = b.querySelectorAll('td')[0].textContent.toLowerCase();
                return nameA.localeCompare(nameB);
            });

            // Reordenando as linhas na tabela
            sortedRows.forEach(row => table.appendChild(row));
        });
    </script>
</x-layout>
