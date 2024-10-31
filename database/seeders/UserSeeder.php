<?php

namespace Database\Seeders;

use App\Models\DataObat;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1'),
        ]);
        DataObat::create([
            'id_obat' => 1,
            'jenis_obat' => 'Moluskisida',
        ]);
        DataObat::create([
            'id_obat' => 2,
            'jenis_obat' => 'Rodentisida',
        ]);
        DataObat::create([
            'id_obat' => 3,
            'jenis_obat' => 'Herbisida',
        ]);
        DataObat::create([
            'id_obat' => 4,
            'jenis_obat' => 'Nutrisi',
        ]);
        DataObat::create([
            'id_obat' => 5,
            'jenis_obat' => 'Insektisida',
        ]);
        DataObat::create([
            'id_obat' => 6,
            'jenis_obat' => 'Fungisida',
        ]);
    }
}
