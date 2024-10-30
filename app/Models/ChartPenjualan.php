<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPenjualan; 

class ChartPenjualan extends Model
{
    use HasFactory;

    public function getDataPenjualan()
    {
        return DataPenjualan::selectRaw('bulan, tahun, SUM(total_terjual) as total_penjualan')
            ->groupBy('bulan', 'tahun')
            ->orderBy('tahun', 'ASC')
            ->orderBy('bulan', 'ASC')
            ->get();
    }
}
