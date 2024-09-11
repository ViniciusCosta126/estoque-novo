<x-layout title="Clientes">
    <div class="mt-4">
        @isset($mensagemSucesso)
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
        @endisset
        <div class="d-flex align-items-center ">
            <h2 class="h1 text-capitalize">clientes</h2>
            <a href="#" class="dropdown-toggle ms-4 nav-link col-md-12" data-bs-toggle="dropdown"
                id="navbarDropdownMenuLink2">
                <i class="fa-solid fa-filter"></i>
            </a>
            <ul class="dropdown-menu p-3" aria-labelledby="navbarDropdownMenuLink2">
                <h5>Filtros</h5>
                <form action="{{ route('clientes.filter') }}" method="POST" class="col-md-12">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-2 col-md-6">
                            <label class="fw-semibold" for="nome">Nome cliente</label>
                            <input class="form-control" type="text" name="nome" id="nome">
                        </div>
                        <div class="form-group mb-2 col-md-6">
                            <label class="fw-semibold" for="cpf">Cpf cliente</label>
                            <input class="form-control" type="text" name="cpf" id="cpf">
                        </div>
                    </div>

                    <div class="form-group mb-2 ">
                        <label class="fw-semibold" for="telefone">Telefone cliente</label>
                        <input class="form-control" type="text" name="telefone" id="telefone">
                    </div>

                    <div class="form-group mb-2 ">
                        <label class="fw-semibold" for="email">Email cliente</label>
                        <input class="form-control" type="text" name="email" id="email">
                    </div>

                    <div class="form-group mb-2">
                        <label class="fw-semibold" for="endereco">Endereco cliente</label>
                        <input class="form-control" type="text" name="endereco" id="endereco">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
                </form>
            </ul>
        </div>
        <a href="{{ route('clientes.create') }}" class="btn btn-success mb-2 col-md-2">Incluir
            Cliente</a>
        <input class="form-control mb-2" id="tableSearch" type="text" placeholder="Buscar na Tabela pelo nome">
        <div class="card table-responsive shadow " style="height: 85%">
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
