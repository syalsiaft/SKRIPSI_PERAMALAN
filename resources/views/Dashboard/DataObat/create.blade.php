@extends('Dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Tambah Data Obat</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('obat') }}">Data Obat</a></li>
                <li class="breadcrumb-item active">Tambah Data Obat</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    <div class="card mx-3">
        <div class="card-body">
            <form action="{{ route('obat.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="jenis_obat" class="form-label">Jenis Obat</label>
                    <select name="jenis_obat" class="form-control" id="jenis_obat" required onchange="setIdObat()">
                        <option disabled selected value="">--- Pilih Jenis Obat ---</option>
                        <option value="Moluskisida">Moluskisida</option>
                        <option value="Rodentisida">Rodentisida</option>
                        <option value="Herbisida">Herbisida</option>
                        <option value="Nutrisi">Nutrisi</option>
                        <option value="Insektisida">Insektisida</option>
                        <option value="Fungisida">Fungisida</option>
                    </select>
                    @error('jenis_obat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="id_obat" id="id_obat">

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function setIdObat() {
            const selectElement = document.getElementById('jenis_obat');
            const selectedOption = selectElement.value;
            // AJAX call to get the ID based on the selected option
            fetch(`/obat/id/${selectedOption}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('id_obat').value = data.id_obat; // Set value ke input hidden
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
