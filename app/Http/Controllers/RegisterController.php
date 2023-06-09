<?php

namespace App\Http\Controllers;
use App\Models\Peserta;
use App\Models\TesMinat;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register',[
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request) {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:pesertas|unique:users',
            'address' => 'required|max:255',
            'number' => 'required|min:6|max:13',
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        Peserta::create($validateData);

        // $request->session()->flash('success','Registration successfull! please Login');

        return redirect('/login')->with('success','Pendaftaran berhasil! Silahkan login');

    }
}
