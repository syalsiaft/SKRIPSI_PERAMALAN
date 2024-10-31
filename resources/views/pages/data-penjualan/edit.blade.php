@extends('layouts.main')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Edit Data Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Data Penjualan</a></li>
                <li class="breadcrumb-item active">Edit Data Penjualan</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
            <form action="{{ route('penjualan.update', $penjualan->id_penjualan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="jenis_obat" class="form-label">Jenis Obat</label>
                    <select name="jenis_obat" class="form-control" id="jenis_obat" required>
                        <option disabled>--- Pilih Jenis Obat ---</option>
                        @foreach ($obatList as $obat)
                            <option value="{{ $obat->id_obat }}"
                                {{ $penjualan->id_obat == $obat->id_obat ? 'selected' : '' }}>
                                {{ $obat->jenis_obat }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select name="tahun" class="form-control" id="tahun" required>
                        <option disabled>--- Pilih Tahun ---</option>
                        @for ($tahun = 2015; $tahun <= date('Y'); $tahun++)
                            <option value="{{ $tahun }}" {{ $penjualan->tahun == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label for="musim" class="form-label">Musim</label>
                    <select name="musim" class="form-control" id="musim" required>
                        <option disabled>--- Pilih Musim ---</option>
                        <option value="1" {{ $penjualan->musim == 1 ? 'selected' : '' }}>Musim Tanam 1</option>
                        <option value="2" {{ $penjualan->musim == 2 ? 'selected' : '' }}>Musim Tanam 2</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select name="bulan" class="form-control" id="bulan" required>
                        <option disabled>--- Pilih Bulan ---</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $penjualan->bulan == $i ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $i, 10)) }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <label for="total_terjual" class="form-label">Total Terjual</label>
                    <input type="number" class="form-control" name="total_terjual" id="total_terjual"
                        value="{{ $penjualan->total_terjual }}" required>
                </div>

                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
@endsection
