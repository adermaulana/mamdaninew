<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pernyataan;
use App\Models\Rapor;
use App\Models\Peserta;
use App\Models\Jurusan;
use App\Models\TesMinat;

class HalamanTesController extends Controller
{

    public function rapor(){

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
            return redirect('halaman-tes')->with('success', 'Anda telah melakukan input data rapor sebelumnya, Sekarang Anda Diarahkan Ke Halaman Tes Pernyataan');
        }

        Rapor::create($validatedData);

        return redirect('halaman-tes');
    }


    public function tes(Request $request){


        if (!$request->session()->has('form_filled')) {
            return redirect('halaman-tes/rapor')->with('error', 'Silakan isi Nilai Rapor terlebih dahulu.');
        }

        $pesertaId = Auth::guard('peserta')->id();

        $rapor = Rapor::where('peserta_id', $pesertaId)->first();

        return view('tes.index',[
            'title' => 'Halaman Tes',
            'subtitle' => 'Tes Jurusan',
            'pernyataan' => Pernyataan::all(),
            'jurusan' => Jurusan::all(),
            'active' => 'tes'
        ]);
    }

    public function storepernyataan(Request $request){
        
        $validatedData = $request->validate([
            'pernyataan_id' => 'required',
            'jurusan_id' => 'required',
        ]);

        $validatedData['peserta_id'] = auth('peserta')->user()->id;
        $request->session()->put('form_filled', true);

        TesMinat::create($validatedData);
        
        return redirect('halaman-tes/hasil');
    }


    public function hasil(Request $request){

        if (!$request->session()->has('form_filled')) {
            return redirect('halaman-tes')->with('error', 'Silakan isi Pernyataan terlebih dahulu.');
        } 

        $peserta = Peserta::where('id', auth('peserta')->user()->id)->first();
        $hasil = TesMinat::where('peserta_id', auth('peserta')->user()->id)->first();

        return view('tes.hasil',[
            'title' => 'Halaman Hasil Tes Jurusan',
            'subtitle' => 'Hasil Tes Jurusan',
            'peserta' => $peserta,
            'hasil' => $hasil,
            'active' => 'hasil'
        ]);
    }
}
