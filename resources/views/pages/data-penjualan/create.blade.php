@extends('layouts.main')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Data Penjualan</a></li>
                <li class="breadcrumb-item active">Tambah Data Penjualan</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="jenis_obat" class="form-label">Jenis Obat</label>
            <select name="jenis_obat" class="form-control @error('jenis_obat') is-invalid @enderror" id="jenis_obat"
                required>
                <option disabled selected>--- Pilih Jenis Obat ---</option>
                @foreach ($obatList as $obat)
                    <option value="{{ $obat->id_obat }}">{{ $obat->jenis_obat }}</option>
                @endforeach
            </select>
            @error('jenis_obat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <select name="tahun" class="form-control @error('tahun') is-invalid @enderror" id="tahun" required>
                <option disabled selected>--- Pilih Tahun ---</option>
                @for ($tahun = 2015; $tahun <= date('Y'); $tahun++)
                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                @endfor
            </select>
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="musim" class="form-label">Musim</label>
            <select name="musim" class="form-control @error('musim') is-invalid @enderror" id="musim" required>
                <option disabled selected>--- Pilih Musim ---</option>
                <option value="1">Musim Tanam 1</option>
                <option value="2">Musim Tanam 2</option>
            </select>
            @error('musim')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <select name="bulan" class="form-control @error('bulan') is-invalid @enderror" id="bulan" required>
                <option disabled selected>--- Pilih Bulan ---</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            @error('bulan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_terjual" class="form-label">Total Terjual</label>
            <input type="number" class="form-control @error('total_terjual') is-invalid @enderror" name="total_terjual"
                id="total_terjual" required>
            @error('total_terjual')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
