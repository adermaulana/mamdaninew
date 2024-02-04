<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Rapor;
use Illuminate\Support\Facades\Hash;

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

    public function edit(){
        return view('peserta.edit',[
            'title' => 'My Profile',
            'subtitle' => 'My Profile',
            'peserta' => Peserta::where('id', auth('peserta')->user()->id)->first(),
            'active' => 'register'
        ]);
    }

    public function update(Request $request){

        $id = auth('peserta')->user()->id;

        $peserta = Peserta::FindOrFail($id);

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'address' => 'required|max:255',
            'number' => 'required|min:6|max:13'
        ]);

            Peserta::where('id',$peserta->id)
            ->update($validateData);

            return redirect('/profil')
            ->with('success','Data Berhasil Diubah!');

    }

    public function editPassword(){
        return view('peserta.edit-password',[
            'title' => 'My Profile',
            'subtitle' => 'My Profile',
            'peserta' => Peserta::where('id', auth('peserta')->user()->id)->first(),
            'active' => 'register'
        ]);
    }

    public function updatePassword(Request $request){

        $id = auth('peserta')->user()->id;

        $peserta = Peserta::FindOrFail($id);

        $request->validate([
            'password_lama' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->password_lama, auth()->user()->password)){
            return back()->with("error", "Password Tidak Cocok");
        }

        Peserta::whereId($id)->update([
            'password' => Hash::make($request->new_password)
        ]);

            return redirect('/profil')
            ->with('success','Password Berhasil Diubah!');

    }
}
