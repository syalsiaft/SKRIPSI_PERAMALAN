<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    use HasFactory;

    protected $table = 'data_obat';
    protected $primaryKey = 'id_obat';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_obat', 'jenis_obat']; 
}
