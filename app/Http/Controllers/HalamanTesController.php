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

        ]);

        $validatedData['peserta_id'] = auth('peserta')->user()->id;
        $request->session()->put('form_filled', true);

        $tesminat = TesMinat::create($validatedData);
        $peserta = TesMinat::where('peserta_id', auth('peserta')->user()->id)->first();

        if ($request->has('jurusan_id')) {
            $jurusan = $request->input('jurusan_id');
    
            foreach ($jurusan as $data) {
                JurusanItems::create([
                    'jurusan_id' => $data,
                    'peserta_id' => $peserta->peserta_id,
                    'minat_id' => $tesminat->id
                ]);
            }
        }

        if ($request->has('pernyataan_id')) {
            $pernyataan = $request->input('pernyataan_id');
    
            foreach ($pernyataan as $datapernyataan) {
                PernyataanItems::create([
                    'pernyataan_id' => $datapernyataan,
                    'peserta_id' => $peserta->peserta_id,
                    'minat_id' => $tesminat->id
                ]);
            }
        }

        return redirect('halaman-tes/hasil');
    }


    public function hasil(Request $request){

        if (!$request->session()->has('form_filled')) {
            return redirect('halaman-tes')->with('error', 'Silakan isi Pernyataan terlebih dahulu.');
        } 

        $peserta = Peserta::where('id', auth('peserta')->user()->id)->first();
        $hasiljurusan = JurusanItems::where('peserta_id', auth('peserta')->user()->id)->where('minat_id', 7)->latest()->get();
        $hasilpernyataan = PernyataanItems::where('peserta_id', auth('peserta')->user()->id)->where('minat_id', 7)->latest()->get();

        return view('tes.hasil',[
            'title' => 'Halaman Hasil Tes Jurusan',
            'subtitle' => 'Hasil Tes Jurusan',
            'peserta' => $peserta,
            'hasiljurusan' => $hasiljurusan,
            'hasilpernyataan' => $hasilpernyataan,
            'active' => 'hasil'
        ]);
    }
}
