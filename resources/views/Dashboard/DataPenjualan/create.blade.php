@extends('Dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <!-- Tambahkan style inline untuk mengubah warna latar belakang dan teks -->
            <h1 style="background-color: black; color: white; padding: 10px; border-radius: 5px;">Tambah Data Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('penjualan') }}">Data Penjualan</a></li>
                <li class="breadcrumb-item active">Tambah Data Penjualan</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    <div class="card mx-3">
        <div class="card-body">
            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_obat" class="form-label">Jenis Obat</label>
                    <select name="id_obat" class="form-control" id="id_obat" required>
                        <option disabled selected>--- Pilih Jenis Obat ---</option>
                        @foreach ($obatList as $obat)
                            <option value="{{ $obat->id_obat }}">{{ $obat->jenis_obat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="musim" class="form-label">Musim</label>
                    <select name="musim" class="form-control" id="musim" required>
                        <option disabled selected>--- Pilih Musim ---</option>
                        <option value="1">Musim Tanam 1</option>
                        <option value="2">Musim Tanam 2</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select name="bulan" class="form-control" id="bulan" required>
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
                </div>

                <div class="mb-3">
                    <label for="total_terjual" class="form-label">Total Terjual</label>
                    <input type="number" class="form-control" name="total_terjual" id="total_terjual" required>
                </div>

                <a href="{{ route('penjualan') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
