<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenjualan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'data_penjualan';

    // Primary key
    protected $primaryKey = 'id_penjualan';

    // Auto increment
    public $incrementing = false; // Jika ID tidak auto-increment

    // Tipe data primary key
    protected $keyType = 'string'; // Atau 'int', sesuai kebutuhan

    // Kolom yang dapat diisi
    protected $fillable = [
        'id_obat',
        'musim',
        'bulan',
        'jenis_obat', // Pastikan ini ada jika ingin menyimpan
        'total_terjual',
    ];

    // Relasi dengan model DataObat
    public function obat()
    {
        return $this->belongsTo(DataObat::class, 'id_obat', 'id_obat');
    }
}
