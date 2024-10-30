@extends('Dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Obat</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data Obat</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="{{ route('obat.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus-circle"></i> Tambah Data
                </a>
            </div>
        </div>
    </div>
@endsection

@section('konten')
    @if ($message = Session::get('success'))
        <script>
            // Notifikasi
            Swal.fire({
                title: 'Sukses!',
                text: "{{ $message }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <div class="table table-bordered">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id Obat</th>
                    <th class="text-center">Jenis Obat</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $item->id_obat }}</td>
                        <td class="text-center">{{ $item->jenis_obat }}</td>
                        <td class="text-center">
                            <form action="{{ route('obat.destroy', $item->id_obat) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-3">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
