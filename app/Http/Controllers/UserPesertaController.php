<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPesertaController extends Controller
{
    public function index(){
        return view('peserta.index',[
            'title' => 'My Profile',
            'subtitle' => 'My Profile'
        ]);
    }
}
