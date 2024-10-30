<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil daftar bulan dari tabel penjualan
        $bulanList = DB::table('data_penjualan') // Ganti 'data_penjualan' dengan nama tabel yang tepat
            ->select('bulan') // Ambil kolom bulan yang sudah berisi angka 1-12
            ->distinct() // Pastikan bulan yang diambil unik
            ->orderBy('bulan') // Urutkan berdasarkan bulan
            ->pluck('bulan')
            ->toArray();

        // Ubah angka bulan menjadi nama bulan
        $bulanList = array_map(function($bulan) {
            return date('F', mktime(0, 0, 0, $bulan, 1)); // Mengubah angka bulan menjadi nama bulan
        }, $bulanList);

        // Pastikan bulanList tidak kosong
        if (empty($bulanList)) {
            dd('bulanList is empty');
        }

        // Mengambil data penjualan untuk chart
        $chartData = DB::table('data_penjualan') // Ganti dengan nama tabel yang sesuai
            ->select('id_obat', 'bulan', DB::raw('SUM(total_terjual) as total_terjual')) // Pastikan kolom-kolom ini ada
            ->groupBy('id_obat', 'bulan')
            ->get();

        // Mengembalikan view dengan data yang dibutuhkan
        return view('dashboard', compact('bulanList', 'chartData'));
    }
}
