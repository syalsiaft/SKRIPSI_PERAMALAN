<?php

namespace App\Http\Controllers;

use App\Models\DataPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'labels' => [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ],
            'values' => [],
        ];

        return view('pages.dashboard.index', compact('data'));
    }

    public function getChartData($jenis_obat, $tahun)
    {
        $penjualans = DataPenjualan::where('jenis_obat', $jenis_obat)
            ->where('tahun', $tahun)
            ->select('bulan', 'total_terjual')
            ->orderBy('bulan')
            ->get();

        $data = [
            'labels' => [],
            'values' => []
        ];

        foreach ($penjualans as $penjualan) {
            $data['labels'][] = $this->getBulan($penjualan->bulan);
            $data['values'][] = $penjualan->total_terjual;
        }

        return response()->json($data);
    }

    private function getBulan($bulan)
    {
        $bulanArray = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $bulanArray[$bulan] ?? '';
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
