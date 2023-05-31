<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::create([
            'name' => 'Teknik Komputer dan Jaringan'
        ]);

        Jurusan::create([
            'name' => 'Teknik Instalasi Tenaga Listrik'
        ]);

        Jurusan::create([
            'name' => 'Desain Pemodelan dan Bangunan'
        ]);

        Jurusan::create([
            'name' => 'Teknik Pengelasan'
        ]);

        Jurusan::create([
            'name' => 'Teknik dan Bisnis Sepeda Motor'
        ]);

        Jurusan::create([
            'name' => 'Teknik Elektronika Industri'
        ]);
    }
}
