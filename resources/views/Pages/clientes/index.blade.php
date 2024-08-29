<x-layout title="Clientes">
    <div class="mt-4">
        @if ($mensagemSucesso)
            <div class="alert alert-success">
                {{ $mensagemSucesso }}
            </div>
        @endif
        <h2 class="h1">Clientes</h2>
        <button class="btn btn-success mb-2 col-md-2" data-bs-toggle="modal" data-bs-target="#criarCliente">Incluir
            Cliente</button>
        <input class="form-control mb-2" id="tableSearch" type="text" placeholder="Buscar na Tabela pelo nome">
        <div class="card table-responsive shadow h-75">
            <table class="table  min-vw-100">
                <thead class="table-dark">
                    <tr>
                        <th scope="row">ID</th>
                        <th><a id="sortName" href="#" class="text-decoration-none text-light">Nome</a></th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereco</th>
                        <th>Nº Endereco</th>
                        <th>Complemento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="clienteTable" class="table-group-divider align-middle">
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td class="w-auto">{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>{{ $cliente->endereco }}</td>
                            <td>{{ $cliente->numero_endereco }}</td>
                            <td>{{ $cliente->complemento }}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $cliente->id }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
                                    class="ms-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @include('Pages.clientes.modal.modal-editar-cliente', ['cliente' => $cliente])
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex gap-2 justify-content-center mt-3">
                {{ $clientes->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @include('Pages.clientes.modal.modal-criar-cliente')
    </div>

    <script>
        $(document).ready(function() {
            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tbody tr").each(function() {
                    var rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(value));
                });
            });
        });

        document.getElementById('sortName').addEventListener('click', function() {
            const table = document.getElementById('clienteTable');
            const rows = Array.from(table.querySelectorAll('tr'));
            const sortedRows = rows.sort((a, b) => {
                const nameA = a.querySelectorAll('td')[1].textContent.toLowerCase();
                const nameB = b.querySelectorAll('td')[1].textContent.toLowerCase();
                return nameA.localeCompare(nameB);
            });

            // Reordenando as linhas na tabela
            sortedRows.forEach(row => table.appendChild(row));
        });
    </script>
</x-layout>
