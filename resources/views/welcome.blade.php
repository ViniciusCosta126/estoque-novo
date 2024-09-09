<x-layout title="Bem vindo Ao SharkErp">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Vendas/mes</div>
                    <div class="card-body">
                        <canvas id="chartVendas"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Faturamento/mes</div>
                    <div class="card-body">
                        <canvas id="faturamento"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('faturamento').getContext('2d');
    const statusVendas = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pendente', 'Processando', 'Aprovado', 'Cancelado'],
            datasets: [{
                label: 'Numero de vendas',
                data: [350000, 1000000, 765000, 535000],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });

    const vendasCtx = document.getElementById('chartVendas').getContext('2d');
    const vendas = new Chart(vendasCtx, {
        type: 'bar',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril'],
            datasets: [{
                label: 'Numero de vendas',
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
</script>
