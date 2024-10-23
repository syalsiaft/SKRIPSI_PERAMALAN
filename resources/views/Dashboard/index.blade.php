@extends('Dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Menu Utama</li>
                <li class="breadcrumb-item active">Beranda</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    <section class="content-header">
        <div class="container-fluid mt-2 px-3">
        </div>

        @if ($message = Session::get('success'))
            <div class="container-fluid px-3">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">SUKSES</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <strong>{{ $message }}</strong>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <!-- Data Obat -->
            <div class="col-lg-3 col-6">
                <div class="small-box"
                    style="background-color: #597445; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); overflow: hidden; height: 180px;">
                    <!-- Bagian Gambar -->
                    <div
                        style="height: 70%; margin-top: 10px; margin-bottom: 10px; background: url('{{ asset('dist/img/logo_data7.png') }}') center/90% no-repeat; opacity: 0.7;">
                    </div>
                    <!-- Bagian Tulisan -->
                    <div class="inner"
                        style="height: 20%; background-color: rgba(255, 255, 255, 1); display: flex; align-items: center; justify-content: center;">
                        <h5 style="font-family: 'Merriweather', serif; font-weight: bold; color: black; margin: 0;">Data
                            Obat</h5>
                    </div>
                </div>
                <!-- More Info Button -->
                <a href="{{ route('obat') }}" class="small-box-footer"
                    style="background-color: #008080; color: white; font-weight: bold; padding: 10px; border-radius: 5px; text-align: center; display: block; margin-top: 10px;">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            <!-- Data Penjualan -->
            <div class="col-lg-3 col-6">
                <div class="small-box"
                    style="background-color: #729762; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); overflow: hidden; height: 180px; margin-left: 15px;">
                    <!-- Bagian Gambar -->
                    <div
                        style="height: 70%; margin-top: 10px; margin-bottom: 10px; background: url('{{ asset('dist/img/logo_data4.png') }}') center/90% no-repeat; opacity: 0.7;">
                    </div>
                    <!-- Bagian Tulisan -->
                    <div class="inner"
                        style="height: 20%; background-color: rgba(255, 255, 255, 1); display: flex; align-items: center; justify-content: center;">
                        <h5 style="font-family: 'Merriweather', serif; font-weight: bold; color: black; margin: 0;">Data
                            Penjualan</h5>
                    </div>
                </div>
                <!-- More Info Button -->
                <a href="{{ route('penjualan') }}" class="small-box-footer"
                    style="background-color: #008080; color: white; font-weight: bold; padding: 10px; border-radius: 5px; text-align: center; display: block; margin-top: 10px;">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
