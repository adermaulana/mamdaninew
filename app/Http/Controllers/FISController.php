<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FIS\Fuzzy;
use App\Models\Rapor;

class FISController extends Controller
{
    public function test(){
        
        $phuzzy = new Fuzzy;

		$phuzzy->clearMembers();
		
		$phuzzy->setInputNames(['minat', 'rapor']);
		
        //Fuzzifikasi
		$phuzzy->addMember('minat', 'tidak_tertarik',  0, 60, 79, 'LEFT_INFINITY');
		$phuzzy->addMember('minat', 'cukup_tertarik', 70, 80, 89, 'TRIANGLE');
		$phuzzy->addMember('minat', 'sangat_tertarik', 85, 90, 100, 'RIGHT_INFINITY');

		$phuzzy->addMember('rapor', 'cukup',  0, 60, 79, 'LEFT_INFINITY');
		$phuzzy->addMember('rapor', 'baik', 70, 80, 89, 'TRIANGLE');
		$phuzzy->addMember('rapor', 'sangat_baik', 85, 90, 100, 'RIGHT_INFINITY');

		$phuzzy->SetOutputNames(array('penjurusan'));

		$phuzzy->addMember('penjurusan', 'kurang_sesuai',  0, 60, 79, 'LEFT_INFINITY');
		$phuzzy->addMember('penjurusan', 'cukup_sesuai', 70, 80, 89, 'TRIANGLE');
		$phuzzy->addMember('penjurusan', 'sangat_sesuai', 85, 90, 100, 'RIGHT_INFINITY');

		$phuzzy->clearRules();

        //Inferensi
		$phuzzy->addRule('IF minat.tidak_tertarik AND rapor.cukup THEN penjurusan.kurang_sesuai');
		$phuzzy->addRule('IF minat.cukup_tertarik AND rapor.baik THEN penjurusan.cukup_sesuai');
		$phuzzy->addRule('IF minat.sangat_tertarik AND rapor.sangat_baik THEN penjurusan.sangat_sesuai');
		$phuzzy->addRule('IF minat.sangat_tertarik AND rapor.cukup THEN penjurusan.cukup_sesuai');
		$phuzzy->addRule('IF minat.sangat_tertarik AND rapor.baik THEN penjurusan.sangat_sesuai');
		$phuzzy->addRule('IF minat.cukup_tertarik AND rapor.sangat_baik THEN penjurusan.sangat_sesuai');
		$phuzzy->addRule('IF minat.tidak_tertarik AND rapor.baik THEN penjurusan.kurang_sesuai');

		$nilairapor = Rapor::where('peserta_id', auth('peserta')->user()->id)->first();

		$rata_rata = ($nilairapor->semester_1 + $nilairapor->semester_2 + $nilairapor->semester_3 + $nilairapor->semester_4 + $nilairapor->semester_5) / 5;

		$phuzzy->setRealInput('minat', 100);
		$phuzzy->setRealInput('rapor', 10);

		$result = $phuzzy->Execute();

        return view('tes',[
            'hasil' => $result
        ]);
    }
}
