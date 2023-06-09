<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Rapor;

class UserPesertaController extends Controller
{
    public function index(){
        return view('peserta.index',[
            'title' => 'My Profile',
            'subtitle' => 'My Profile',
            'peserta' => Peserta::where('id', auth('peserta')->user()->id)->first(),
            'rapor' => Rapor::where('peserta_id', auth('peserta')->user()->id)->first(),
            'active' => 'register'
        ]);
    }
}
