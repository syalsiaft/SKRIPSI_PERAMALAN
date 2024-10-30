<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Diagram Penjualan</h1>
    <canvas id="myChart" width="400" height="200"></canvas>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const labels = {!! json_encode($dataPenjualan->map(function($item) {
            return $item->bulan . ' ' . $item->tahun;
        })) !!};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan',
                data: {!! json_encode($dataPenjualan->pluck('total_penjualan')) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        };

        const config = {
            type: 'line', 
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myChart = new Chart(ctx, config);
    </script>
</body>
</html>
