<?php

namespace App\Http\Controllers;

use App\Models\TesMinat;
use App\Models\Rapor;
use App\Models\Peserta;
use App\Models\JurusanItems;
use App\Models\PernyataanItems;
use Illuminate\Http\Request;
use App\FIS\Fuzzy;

class TesMinatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $hasiljurusan = JurusanItems::latest()->get();
        $hasilpernyataan = PernyataanItems::latest()->get();


        $phuzzy = new Fuzzy;

		$phuzzy->clearMembers();
		
		$phuzzy->setInputNames(['minat', 'rapor']);
		
        //Fuzzifikasi
		$phuzzy->addMember('minat', 'tidak_tertarik',  0, 0, 1, 'LEFT_INFINITY');
		$phuzzy->addMember('minat', 'cukup_tertarik', 2, 3, 4, 'TRIANGLE');
		$phuzzy->addMember('minat', 'sangat_tertarik', 3.5, 4.5, 5, 'RIGHT_INFINITY');

		$phuzzy->addMember('rapor', 'cukup',  0, 60, 79, 'LEFT_INFINITY');
		$phuzzy->addMember('rapor', 'baik', 79, 80, 89, 'TRIANGLE');
		$phuzzy->addMember('rapor', 'sangat_baik', 85, 90, 100, 'RIGHT_INFINITY');

		$phuzzy->SetOutputNames(array('penjurusan'));

		$phuzzy->addMember('penjurusan', 'kurang_sesuai',  0, 60, 79, 'LEFT_INFINITY');
		$phuzzy->addMember('penjurusan', 'cukup_sesuai', 79, 80, 89, 'TRIANGLE');
		$phuzzy->addMember('penjurusan', 'sangat_sesuai', 85, 90, 100, 'RIGHT_INFINITY');

		$phuzzy->clearRules();

        //Inferensi
		$phuzzy->addRule('IF minat.tidak_tertarik AND rapor.cukup THEN penjurusan.kurang_sesuai');
		$phuzzy->addRule('IF minat.cukup_tertarik AND rapor.baik THEN penjurusan.cukup_sesuai');
		$phuzzy->addRule('IF minat.sangat_tertarik AND rapor.sangat_baik THEN penjurusan.sangat_sesuai');
		$phuzzy->addRule('IF minat.sangat_tertarik AND rapor.baik THEN penjurusan.sangat_sesuai');
		$phuzzy->addRule('IF minat.cukup_tertarik AND rapor.sangat_baik THEN penjurusan.sangat_sesuai');
		$phuzzy->addRule('IF minat.tidak_tertarik AND rapor.baik THEN penjurusan.kurang_sesuai');

		$nilairapor = Rapor::where('peserta_id', auth('peserta')->user()->id)->first();

        $jurusan_id = JurusanItems::where('minat_id',$lastInputData->id)->latest()->first();

        $hasilpernyataan2 = PernyataanItems::where('minat_id', $lastInputData->id)->where('peserta_id',$tes)->whereHas('pernyataan', function ($query) use ($jurusan_id) {
                $query->where('jurusan_id', $jurusan_id->jurusan_id);
        })->latest()->get();

        $count = $hasilpernyataan2->count();

        $rata_rata = ($nilairapor->semester_1 + $nilairapor->semester_2 + $nilairapor->semester_3 + $nilairapor->semester_4 + $nilairapor->semester_5) / 5;

		$phuzzy->setRealInput('minat',$count);
		$phuzzy->setRealInput('rapor', $rata_rata);

		$result = $phuzzy->Execute();

        return view('dashboard.tesminat.index',[
            'title' => 'Halaman Hasil Tes Jurusan',
            'subtitle' => 'Tes Jurusan',
            'peserta' => $peserta,
            'hasiljurusan' => $hasiljurusan,
            'hasilpernyataan' => $hasilpernyataan,
            'active' => 'hasil',
            'hasil' => $result,
            'hasilpernyataan2' => $hasilpernyataan2
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTesMinatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function show(TesMinat $tesMinat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function edit(TesMinat $tesMinat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTesMinatRequest  $request
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TesMinat $tesMinat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TesMinat  $tesMinat
     * @return \Illuminate\Http\Response
     */
    public function destroy(TesMinat $tesMinat)
    {
        //
    }
}
