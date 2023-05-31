<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanTesController extends Controller
{
    public function index(){
        return view('tes.index',[
            'title' => 'Halaman Tes'
        ]);
    }
}
