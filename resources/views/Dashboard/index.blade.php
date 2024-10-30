@extends('Dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-6">
            <h1>Diagram Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Menu Utama</li>
                <li class="breadcrumb-item active">Diagram Penjualan</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    <section class="content-header">
        <div class="container-fluid mt-2 px-3">
            <div class="form-group">
                <label for="obatSelect">Pilih Jenis Obat:</label>
                <select id="obatSelect" class="form-control" onchange="updateChart()">
                    <option value="">-- Pilih Jenis Obat --</option>
                    <option value="1">Moluskisida</option>
                    <option value="2">Rodentisida</option>
                    <option value="3">Herbisida</option>
                    <option value="4">Nutrisi</option>
                    <option value="5">Insektisida</option>
                    <option value="6">Fungisida</option>
                </select>
            </div>

            <canvas id="myChart" width="400" height="200"></canvas>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        let myChart;

        const bulanList = {!! json_encode($bulanList ?? []) !!};
        if (!bulanList.length) {
            console.warn('bulanList is empty');
        }

        const chartData = {!! json_encode($chartData ?? []) !!};

        function updateChart() {
            const selectedObat = document.getElementById('obatSelect').value;

            if (myChart) {
                myChart.destroy();
            }

            if (selectedObat) {
                const totalTerjual = {};
                const selectedData = chartData.filter(data => data.id_obat == selectedObat);

                bulanList.forEach(month => {
                    totalTerjual[month] = selectedData.find(data => data.bulan === month)?.total_terjual || 0;
                });

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: bulanList,
                        datasets: [{
                            label: 'Data Penjualan',
                            data: bulanList.map(month => totalTerjual[month] || 0), // mengambil55 data total terjual per bulan
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }
    </script>
@endsection
