<x-layout title="Orcamentos">
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
        <h2 class="h1">Orcamentos</h2>
    </div>
    <a class="btn btn-success mb-2 col-md-2" href="{{ route('orcamentos.create') }}">Incluir novo
        Orcamento
    </a>
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
