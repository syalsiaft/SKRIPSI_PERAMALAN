<?php

namespace App\Http\Controllers;

use App\Models\DataPenjualan;
use App\Models\DataObat;
use Illuminate\Http\Request;

class DataPenjualanController extends Controller
{
    public function index()
    {
        // Menggunakan paginate
        $penjualan = DataPenjualan::paginate(10);

        $jenis = [
            1 => "Moluskisida",
            2 => "Rodentisida",
            3 => "Herbisida",
            4 => "Nutrisi",
            5 => "Insektisida",
            6 => "Fungisida"
        ];
        $bulan = [
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

        // Mengembalikan view dengan data paginasi yang benar
        return view('Dashboard.DataPenjualan.index', compact('penjualan', 'bulan', 'jenis'));
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
            'id_obat' => 'required',
            'musim' => 'required|in:1,2',
            'bulan' => 'required|integer|between:1,12',
            'total_terjual' => 'required|integer|min:0',
        ]);

        // Simpan data penjualan
        DataPenjualan::create([
            'id_obat' => $request->id_obat,
            'musim' => $request->musim,
            'bulan' => $request->bulan,
            'jenis_obat' => $request->id_obat,
            'total_terjual' => $request->total_terjual,
        ]);

        session()->flash('success', 'Data berhasil disimpan!');
        return redirect()->route('penjualan');
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
        return view('penjualan.edit', compact('penjualan', 'obatList'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_obat' => 'required|exists:data_obat,id_obat',
            'musim' => 'required|integer|in:1,2',
            'bulan' => 'required|integer|between:1,12',
            'jenis_obat' => 'required|integer|between:1,6',
            'total_terjual' => 'required|integer|min:0',
        ]);

        $penjualan = DataPenjualan::findOrFail($id);
        $penjualan->update($request->all());

        return redirect()->route('penjualan')->with('success', 'Data penjualan berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $penjualan = DataPenjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
