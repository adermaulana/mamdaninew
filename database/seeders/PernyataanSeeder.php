<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pernyataan;

class PernyataanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pernyataan::create([
            'nama' => 'Tertarik membuat gambar konstruksi bangunan',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik mempelajari Teknik dasar pengelasan',
            'jurusan_id' => 4
        ]);
        
        Pernyataan::create([
            'nama' => 'Tertarik mengoperasikan software aplikasi program dan gambar',
            'jurusan_id' => 6
        ]);


        Pernyataan::create([
            'nama' => 'Tertarik mempelajari dasar - dasar mesin',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Senang menggunakan software 2D maupun 3D',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik dalam menghitung volume dari sebuah bangunan',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Ingin menjadi Teknisi atau Mekanik pada bengkel sepeda motor',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik membaca buku/artikel komputer',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Senang mempelajari simbol - simbol termasuk dalam pengelasan',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik dengan sistem mikrokontroller dan mikroprosessor',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik menjadi wirausahawan alat dan bahan bangunan',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Senang bekerja dengan perangkat jaringan',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Senang menginstall software sistem operasi dan aplikasi',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Senang dalam membaca atau memahami gambar/skema',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik mempelajari komponen - komponen elektronika',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik menjadi Modifikator dalam bidang Sepeda Motor',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Senang dengan matematika',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik bekerja pada perusahaan pengelasan/welding',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik dalam membuat skema/rangkaian listrik',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Senang dalam mengukur bangunan',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik dalam membuat skema/rangkaian elektronika',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik menjadi wirausahawan dalam bidang Listrik',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Memiliki rasa ingin tahu tentang bagaimana perangkat elektronik bekerja',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Senang mempelajari bagaimana cara kerja internet',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik menggunakan alat – alat kelistrikan',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik dalam membuat skema/gambar pengelasan',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Ingin menjadi wirausahawan dalam bidang Sepeda Motor',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Senang bekerja dengan alat-alat otomotif',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Tertarik bekerja pada perusahaan pembangkit listrik',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Senang memperbaiki sistem listrik',
            'jurusan_id' => 2
        ]);
    }
}
