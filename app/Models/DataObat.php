<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    use HasFactory;

    protected $table = 'data_obat'; // Nama tabel
    protected $primaryKey = 'id_obat'; // Primary key
    public $incrementing = false; // Mengatur agar ID tidak auto-increment
    protected $keyType = 'string'; // Tipe ID (sesuaikan dengan tipe yang Anda gunakan, bisa 'int' atau 'string')

    protected $fillable = ['id_obat', 'jenis_obat']; // Kolom yang dapat diisi
}
