<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use Illuminate\Http\Request;

class DataObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataObat::distinct('jenis_obat')->get();
        return view('pages.data-obat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.data-obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $request->validate([
             'jenis_obat' => 'required|unique:data_obat,jenis_obat',
         ], [
             'jenis_obat.unique' => 'Jenis obat sudah terdaftar, silahkan masukkan jenis obat yang lain.'
         ]);

         $idObatMap = [
             'Moluskisida' => 1,
             'Rodentisida' => 2,
             'Herbisida' => 3,
             'Nutrisi' => 4,
             'Insektisida' => 5,
             'Fungisida' => 6
         ];

         $id_obat = $idObatMap[$request->jenis_obat] ?? null;

         DataObat::updateOrCreate(
             ['id_obat' => $id_obat],
             ['jenis_obat' => $request->jenis_obat]
         );
         session()->flash('success', 'Data berhasil disimpan!');
         return redirect()->route('obat.index');
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DataObat::where('id_obat', $id)->first();

        if (!$data) {
            return redirect()->route('obat')->with('error', 'Data Obat tidak ditemukan');
        }

        return view('pages.data-obat.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = DataObat::findOrFail($id);

        $request->validate([
            'jenis_obat' => 'required|string|max:255|unique:data_obat,jenis_obat,' . $data->id_obat . ',id_obat',
        ]);

        $data->update([
            'jenis_obat' => $request->jenis_obat,
        ]);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataObat::where('id_obat', $id)->delete();
        return redirect()->route('obat.index')->with('success', 'Berhasil Melakukan Delete Data');
    }

    /**
     * Get ID Obat by Jenis Obat.
     */
   private function getIdByJenisObat($jenis_obat)
{
    switch ($jenis_obat) {
        case 'Moluskisida':
            return 1;
        case 'Rodentisida':
            return 2;
        case 'Herbisida':
            return 3;
        case 'Nutrisi':
            return 4;
        case 'Insektisida':
            return 5;
        case 'Fungisida':
            return 6;
        default:
            return null;
    }
}
}
