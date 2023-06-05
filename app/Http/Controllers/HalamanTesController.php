<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pernyataan;

class HalamanTesController extends Controller
{
    public function index(){
        return view('tes.index',[
            'title' => 'Halaman Tes',
            'subtitle' => 'Tes Jurusan',
            'pernyataan' => Pernyataan::all()
        ]);
    }
}
