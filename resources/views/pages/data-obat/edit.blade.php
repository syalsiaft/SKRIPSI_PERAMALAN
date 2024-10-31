@extends('layouts.main')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Edit Data Obat</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Obat</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('obat.update', $data->id_obat) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-mb-3">
            <label for="jenis_obat" class="form-label">Jenis Obat</label>
            <select name="jenis_obat" class="form-control" id="jenis_obat" required>
                <option disabled value="">--- Pilih Jenis Obat ---</option>
                <option value="moluskisida" {{ $data->jenis_obat == 'Moluskisida' ? 'selected' : '' }}>Moluskisida</option>
                <option value="rodentisida" {{ $data->jenis_obat == 'Rodentisida' ? 'selected' : '' }}>Rodentisida</option>
                <option value="herbisida" {{ $data->jenis_obat == 'Herbisida' ? 'selected' : '' }}>Herbisida</option>
                <option value="nutrisi" {{ $data->jenis_obat == 'Nutrisi' ? 'selected' : '' }}>Nutrisi</option>
                <option value="insektisida" {{ $data->jenis_obat == 'Insektisida' ? 'selected' : '' }}>Insektisida</option>
                <option value="fungisida" {{ $data->jenis_obat == 'Fungisida' ? 'selected' : '' }}>Fungisida</option>
            </select>
        </div>
        <a href="{{ route('obat') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
