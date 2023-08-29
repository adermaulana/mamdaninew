<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pernyataan;
use App\Models\Rapor;
use App\Models\Peserta;
use App\Models\Jurusan;
use App\Models\TesMinat;
use App\Models\PernyataanItems;
use App\Models\JurusanItems;
use App\FIS\Fuzzy;
use Illuminate\Support\Facades\DB;

class HalamanTesController extends Controller
{

    public function rapor(){

        if (!Auth::guard('peserta')) {
            // Jika auth admin, tampilkan pemberitahuan
            session()->flash('error', 'Anda adalah Admin tidak bisa melakukan tes!');
        return redirect('/');
        }

        return view('tes.rapor',[
            'title' => 'Halaman Input Nilai Rapor',
            'subtitle' => 'Input Nilai Rapor',
            'active' => 'tes'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'semester_1' => 'required',
            'semester_2' => 'required',
            'semester_3' => 'required',
            'semester_4' => 'required',
            'semester_5' => 'required'
        ]);
        
        $validatedData['peserta_id'] = auth('peserta')->user()->id;
        $request->session()->put('form_filled', true);

        $existingRapor = Rapor::where('peserta_id', Auth::guard('peserta')->id())->first();
        if ($existingRapor) {
            return redirect('halaman-tes')->with('error', 'Anda telah melakukan input data rapor sebelumnya, Sekarang Anda Diarahkan Ke Halaman Tes Pernyataan');
        }

        Rapor::create($validatedData);

        return redirect('halaman-tes');
    }


    public function tes(Request $request){

        $pesertaId = Auth::guard('peserta')->id();

        $rapor = Rapor::where('peserta_id', $pesertaId)->first();

        if(!empty($rapor)){
            return view('tes.index',[
                'title' => 'Halaman Tes',
                'subtitle' => 'Tes Jurusan',
                'pernyataan' => Pernyataan::all(),
                'jurusan' => Jurusan::all(),
                'active' => 'tes'
            ]);
            
        } else if(!$request->session()->has('form_filled')) {
            return redirect('halaman-tes/rapor')->with('error', 'Silakan isi Nilai Rapor terlebih dahulu.');
        } 

    }

    public function storepernyataan(Request $request){

        $validatedData = $request->validate([
            'pernyataan_id' => 'required'
        ]);

        $validatedData['peserta_id'] = auth('peserta')->user()->id;
        $request->session()->put('form_filled', true);

        $tesminat = TesMinat::create($validatedData);
        $peserta = TesMinat::where('peserta_id', auth('peserta')->user()->id)->first();


        if ($request->has('pernyataan_id')) {
            $pernyataan = $request->input('pernyataan_id');
    
            foreach ($pernyataan as $datapernyataan) {
                PernyataanItems::create([
                    'pernyataan_id' => $datapernyataan,
                    'peserta_id' => $peserta->peserta_id,
                    'minat_id' => $tesminat->id,
                ]);
            }
        }

        return redirect('halaman-tes/hasil');
    }


    public function hasil(Request $request){

        if (!$request->session()->has('form_filled')) {
            return redirect('halaman-tes')->with('error', 'Silakan isi Pernyataan terlebih dahulu.');
        }

        $tes = auth('peserta')->user()->id;
        $lastInputData = TesMinat::latest('id')->first();
        $peserta = Peserta::where('id', auth('peserta')->user()->id)->first();
        $hasiljurusan = JurusanItems::where('minat_id', $lastInputData->id )->where('peserta_id',$tes)->latest()->get();
        $hasilpernyataan = PernyataanItems::where('minat_id', $lastInputData->id)->where('peserta_id',$tes)->latest()->get();

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

        //Terbaru query mengambil jurusan

        $jurusanTerbanyak = DB::table('pernyataan_items')
        ->join('pernyataans', 'pernyataan_items.pernyataan_id', '=', 'pernyataans.id')
        ->join('jurusans', 'pernyataans.jurusan_id', '=', 'jurusans.id')
        ->select('jurusans.id', 'jurusans.name', DB::raw('COUNT(pernyataan_items.id) as total_pernyataan'))
        ->groupBy('jurusans.id', 'jurusans.name')
        ->orderByDesc('total_pernyataan')
        ->where('peserta_id',$tes)
        ->where('minat_id',$lastInputData->id)
        ->first();

        $rata_rata = ($nilairapor->semester_1 + $nilairapor->semester_2 + $nilairapor->semester_3 + $nilairapor->semester_4 + $nilairapor->semester_5) / 5;

		$phuzzy->setRealInput('minat',$jurusanTerbanyak->total_pernyataan);
		$phuzzy->setRealInput('rapor', $rata_rata);

		$result = $phuzzy->Execute();

        return view('tes.hasil',[
            'title' => 'Halaman Hasil Tes Jurusan',
            'subtitle' => 'Tes Jurusan',
            'peserta' => $peserta,
            'hasiljurusan' => $jurusanTerbanyak->name,
            'hasilpernyataan' => $hasilpernyataan,
            'active' => 'hasil',
            'hasil' => $result
        ]);

    }

}