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
            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                <a href="{{ route('penjualan.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Tambah Data
                </a>
            </div>
        </div>
    </div>
@endsection

@section('konten')
    @if (session('success'))
        <script>
            // Notifikasi
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
                    <th class="text-center">Id Obat</th>
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
                        <td class="text-center">{{ $item->id_obat }}</td>
                        <td class="text-center">{{ $item->musim }}</td>
                        <td class="text-center">{{ $bulan[$item->bulan] }}</td>
                        <td class="text-center">{{ $jenis[$item->id_obat] ?? 'Jenis tidak dikenal' }}</td>
                        <td class="text-center">{{ $item->total_terjual }}</td>
                        <td class="text-center">
                            <a href="{{ route('penjualan.edit', $item->id_penjualan) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('penjualan.destroy', $item->id_penjualan) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
