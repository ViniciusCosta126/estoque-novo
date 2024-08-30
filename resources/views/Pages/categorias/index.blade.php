<x-layout title="Categorias">
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
        <h2 class="h1">Categorias</h2>
        <button class="btn btn-success mb-2 col-md-2" data-bs-toggle="modal" data-bs-target="#criarCategoria">Incluir
            nova
            Categoria
        </button>
        <div class="card table-responsive shaddow h-100 w-75">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-light">
                        <th scope="col">ID</th>
                        <th scope="col"><a id="sortName" href="#"
                                class="text-decoration-none text-light">Nome</a>
                        </th>
                        <th scope="col">Descricao</th>
                        <th scope="col">Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody id="productTable" class="table-group-divider align-middle">
                    @foreach ($categorias as $item)
                        <tr class="{{ !$item->status ? 'table-danger' : '' }}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->descricao }}</td>
                            <td>{{ $item->status == 1 ? 'ativo' : 'inativo' }}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->id }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('categorias.destroy', $item->id) }}" method="POST"
                                    class="ms-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @include('Pages.categorias.modal.modal-editar-categoria', [
                            'categoria' => $item,
                        ])
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex gap-2 justify-content-center mt-3">
                {{ $categorias->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @include('Pages.categorias.modal.modal-criar-categoria')
    </div>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.getElementById('liveToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
