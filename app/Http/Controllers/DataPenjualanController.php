<?php

namespace App\Http\Controllers;

use App\Models\DataPenjualan;
use App\Models\DataObat;
use Illuminate\Http\Request;

class DataPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $jenis_obat = $request->input('jenis_obat');

        $penjualan = DataPenjualan::query();

        if ($bulan) {
            $penjualan->where('bulan', $bulan);
        }
        if ($tahun) {
            $penjualan->where('tahun', $tahun);
        }
        if ($jenis_obat) {
            $penjualan->where('id_obat', $jenis_obat);
        }

        //paginate
        $penjualan = $penjualan->paginate(10);

        // Data jenis obat
        $jenis = [
            1 => "Moluskisida",
            2 => "Rodentisida",
            3 => "Herbisida",
            4 => "Nutrisi",
            5 => "Insektisida",
            6 => "Fungisida"
        ];

        // Data bulan
        $bulanList = [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        ];

        // Data grafik
        $chartData = DataPenjualan::selectRaw('bulan, SUM(total_terjual) as total')
            ->where('id_obat', $jenis_obat)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        // Daftar obat
        $obatList = DataObat::all();

        return view('Dashboard.DataPenjualan.index', compact('penjualan', 'bulanList', 'jenis', 'chartData', 'obatList'));
    }

    public function create()
    {
        $obatList = DataObat::all();
        return view('Dashboard.DataPenjualan.create', compact('obatList'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_obat' => 'required|exists:data_obat,id_obat',
            'tahun' => 'required|integer|min:2015|max:2025',
            'musim' => 'required|in:1,2',
            'bulan' => 'required|integer|between:1,12',
            'total_terjual' => 'required|integer|min:0',
        ]);

        DataPenjualan::create([
            'id_obat' => $request->id_obat,
            'tahun' => $request->tahun,
            'musim' => $request->musim,
            'bulan' => $request->bulan,
            'total_terjual' => $request->total_terjual,
        ]);

        return redirect()->route('penjualan')->with('success', 'Data berhasil disimpan!');
    }

    public function show(string $id)
    {
        $penjualan = DataPenjualan::findOrFail($id);
        return view('Dashboard.DataPenjualan.show', compact('penjualan'));
    }

    public function edit($id)
    {
        $penjualan = DataPenjualan::findOrFail($id);
        $obatList = DataObat::all();
        return view('Dashboard.DataPenjualan.edit', compact('penjualan', 'obatList'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_obat' => 'required|exists:data_obat,id_obat',
            'tahun' => 'required|integer|min:2015|max:2025',
            'musim' => 'required|integer|in:1,2',
            'bulan' => 'required|integer|between:1,12',
            'total_terjual' => 'required|integer|min:0',
        ]);

        $penjualan = DataPenjualan::findOrFail($id);
        
        $penjualan->update([
            'id_obat' => $request->id_obat,
            'tahun' => $request->tahun,
            'musim' => $request->musim,
            'bulan' => $request->bulan,
            'total_terjual' => $request->total_terjual,
        ]);

        return redirect()->route('penjualan')->with('success', 'Data penjualan berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $penjualan = DataPenjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
