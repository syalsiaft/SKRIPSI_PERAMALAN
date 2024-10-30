<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualan extends Model
{
    use HasFactory;

    protected $table = 'data_penjualan';
    protected $primaryKey = 'id_penjualan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_obat',
        'tahun',
        'musim',
        'bulan',
        'jenis_obat',
        'total_terjual',
    ];
    
    public function obat()
    {
        return $this->belongsTo(DataObat::class, 'id_obat', 'id_obat');
    }
}
