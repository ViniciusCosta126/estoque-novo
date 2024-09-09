<x-layout title="Produtos">
    <div class="mt-4">
        @isset($mensagemSucesso)
            @if (!empty($mensagemSucesso))
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header text-bg-success">
                            <strong class="me-auto">Nova mensagem do sistema</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            {{ $mensagemSucesso }}
                        </div>
                    </div>
                </div>
            @endif
        @endisset
        <div class="d-flex align-items-center ">
            <h2 class="h1">Produtos</h2>
            <a href="#" class="dropdown-toggle ms-4 nav-link col-md-10" data-bs-toggle="dropdown"
                id="navbarDropdownMenuLink2">
                <i class="fa-solid fa-filter"></i>
            </a>
            <ul class="dropdown-menu p-3" aria-labelledby="navbarDropdownMenuLink2">
                <h5>Filtros</h5>
                <form action="{{ route('produtos.filter') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="" class="fw-semibold">Preço de custo</label>
                        <div class="row g-2">
                            <input placeholder="minimo..." class="col form-control me-2" type="number"
                                name="preco_custo_min" id="preco_custo_min" step="0.01">
                            <input placeholder="maximo..." class="col form-control" type="number"
                                name="preco_custo_max" id="preco_custo_max" step="0.01">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="fw-semibold">Preço</label>
                        <div class="row g-2">
                            <input placeholder="minimo..." class="col form-control me-2" type="number" name="preco_min"
                                id="preco_min" step="0.01">
                            <input placeholder="maximo..." class="col form-control" type="number" name="preco_max"
                                id="preco_max" step="0.01">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoria" class="fw-semibold">Categoria</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <option value="" selected disabled>Selecione uma categoria</option>
                            @foreach ($categorias as $item)
                                @if ($item->status != 0)
                                    <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
                </form>
            </ul>
        </div>

        <a class="btn btn-success mb-2 col-md-2" href="{{ route('produtos.create') }}">Incluir novo
            Produto
        </a>
        <input class="form-control mb-2" id="tableSearch" type="text" placeholder="Buscar na Tabela pelo nome">
        <div class="table-responsive card shadow" style="height: 85%">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-light">
                        <th scope="col">ID</th>
                        <th scope="col"><a id="sortName" href="#"
                                class="text-decoration-none text-light">Nome</a>
                        </th>
                        <th scope="col">Categoria</th>
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
                            <td>{{ $produto->categoria->nome }}</td>
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
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.getElementById('liveToast');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });

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
