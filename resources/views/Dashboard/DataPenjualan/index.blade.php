@extends('Dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Penjualan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Penjualan</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('penjualan.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Tambah Data
                    </a>
                </div>
                <form action="{{ route('penjualan') }}" method="GET" class="form-inline">
                    <div class="form-group mx-2">
                        <label for="bulan" class="mr-2">Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="">-- Pilih Bulan --</option>
                            @foreach ($bulanList as $key => $value)
                                <option value="{{ $key }}" {{ request('bulan') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mx-2">
                        <label for="tahun" class="mr-2">Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">-- Pilih Tahun --</option>
                            @for ($tahun = 2015; $tahun <= date('Y'); $tahun++)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group mx-2">
                        <label for="jenis_obat" class="mr-2">Jenis Obat:</label>
                        <select name="jenis_obat" id="jenis_obat" class="form-control">
                            <option value="">-- Pilih Jenis Obat --</option>
                            @foreach ($jenis as $key => $value)
                                <option value="{{ $key }}" {{ request('jenis_obat') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('konten')
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <div class="table-responsive mx-3">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tahun</th>
                    <th class="text-center">Musim</th>
                    <th class="text-center">Bulan</th>
                    <th class="text-center">Jenis Obat</th>
                    <th class="text-center">Total Terjual</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                    <tr>
                        <td class="text-center">{{ ($penjualan->currentPage() - 1) * $penjualan->perPage() + $loop->iteration }}</td>
                        <td class="text-center">{{ $item->tahun }}</td>
                        <td class="text-center">{{ $item->musim == 1 ? 'MT1' : 'MT2' }}</td>
                        <td class="text-center">{{ $bulanList[$item->bulan] ?? 'Bulan tidak diketahui' }}</td>
                        <td class="text-center">{{ $jenis[$item->id_obat] ?? 'Jenis tidak dikenal' }}</td>
                        <td class="text-center">{{ $item->total_terjual }}</td>
                        <td class="text-center">
                            <a href="{{ route('penjualan.edit', $item->id_penjualan) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('penjualan.destroy', $item->id_penjualan) }}" method="POST"
                                class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $penjualan->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
