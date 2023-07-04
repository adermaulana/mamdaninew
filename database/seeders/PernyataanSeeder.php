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
            'nama' => 'Saya ingin mempelajari mengenai aplikasi perangkat lunak dan 
            perancangan interior gedung',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Saya senang berwirausaha tentang produk yang berhubungan 
            dengan pengelasan',
            'jurusan_id' => 4
        ]);
        
        Pernyataan::create([
            'nama' => 'Saya ingin mempunyai kemampuan untuk melakukan perbaikan 
            pada berbagai instrumen elektronika',
            'jurusan_id' => 6
        ]);


        Pernyataan::create([
            'nama' => 'Saya senang melakukan perbaikan sistem bahan bakar sepeda motor',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mengetahui estimasi biaya kontruksi',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mempelajari dasar-dasar konstruksi bangunan dan teknik pengukuran tanah',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Saya tertarik dan suka sesuatu yang berhubungan dengan otomotif',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mempelajari bagaimana coding untuk sebuah operasi komputer',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Saya senang melakukan riset, analisis dan berhitung',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin bekerja sebagai seorang operator pada perusahaan bidang elektronika',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Saya tertarik mengetahui tentang Kontruksi jalan dan jembatan',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Saya senang tentang semua yang berhubungan dengan Internet',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mempelajari bagaimana merakit komputer',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin bisa bekerja di perusahaan otomotif untuk bidang pekerjaan las dan bubut',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mempelajari lebih dalam yang berhubungan dengan elektronika industri',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Saya senang melakukan pekerjaan servis pada roda, ban, dan rantai',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Saya tertarik mengenal Operating System (OS)',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mempelajari bagaimana teknik-teknik pengelasan',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Saya tertarik dengan pekerjaan yang berhubungan dengan listrik',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Saya tertarik mempelajari tentang kontruksi dan utilitas gedung',
            'jurusan_id' => 3
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mempelajari bagaimana pemasangan dan pengoperasian motor listrik dengan kendali elektrimekanik',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Saya tertarik untuk membuat motor/mobil listrik',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Saya tertarik mempelajari mengenai robotik',
            'jurusan_id' => 6
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin lebih mengenal Komponen-Komponen Komputer',
            'jurusan_id' => 1
        ]);

        Pernyataan::create([
            'nama' => 'Saya senang melihat orang-orang yang bekerja dibidang listrik',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Saya bercita-cita ingin membuat bengkel las sendiri',
            'jurusan_id' => 4
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin mempelajari tentang cara merancang dan menggunakan alat-alat mesin pada sepeda motor',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin menjadi teknisi atau mekanik handal',
            'jurusan_id' => 5
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin bisa bekerja di PLN',
            'jurusan_id' => 2
        ]);

        Pernyataan::create([
            'nama' => 'Saya ingin bisa merawat dan memperbaiki peralatan rumah tangga listrik',
            'jurusan_id' => 2
        ]);
    }
}
