@extends('layouts.main')

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

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex" style="gap: 20px">
                <div class="flex-fill">
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
                <div class="flex-fill">
                    <label for="tahun">Pilih Tahun:</label>
                    <select id="tahun" class="form-control" onchange="updateChart()">
                        <option value="">-- Pilih Tahun --</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        let chart; // deklarasikan chart
        const ctx = document.getElementById('myChart').getContext('2d');

        // inisialisasi dengan data dari controller
        const initialLabels = @json($data['labels']);
        const initialValues = @json($data['values']);

        function createChart(labels, values) {
            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Terjual',
                        data: values,
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

        createChart(initialLabels, initialValues);

        function updateChart() {
            const idObat = document.getElementById('obatSelect').value;
            const tahun = document.getElementById('tahun').value;

            if (chart) {
                chart.destroy(); // Hancurkan chart yang ada jika ada
            }

            if (idObat && tahun) {
                // Mengambil data dari server
                fetch(`/chart/${idObat}/${tahun}`)
                    .then(response => response.json())
                    .then(data => {
                        createChart(data.labels, data.values);
                    })
                    .catch(error => console.error('Error fetching chart data:', error));
            } else {
                // Jika tidak ada idObat, hapus chart
                // ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
                createChart(initialLabels, initialValues);
            }
        }
    </script>
@endsection
