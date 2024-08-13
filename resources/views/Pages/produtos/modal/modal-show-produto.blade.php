@props(['produto'])

<div class="modal fade" id="showModal{{ $produto->id }}" role="dialog" aria-labelledby="showModalLabel{{ $produto->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="showModalLabel{{ $produto->id }}">Produto: {{ $produto->nome }}</h5>
            </div>
            <div class="modal-body">
                <p class="fs-5 fw-semibold">{{ $produto->descricao }}</p>
            </div>
        </div>
    </div>
