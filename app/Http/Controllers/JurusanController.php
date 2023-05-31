<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.jurusan.index',[
            'title' => 'Jurusan',
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jurusan.create',[
            'title' => 'Tambah Data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
            ]);

            Jurusan::create($validatedData);
            return redirect()->route('jurusan.index')
            ->with('success','Jurusan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::FindOrFail($id);
        return view('dashboard.jurusan.edit',[
            'title' => "Ubah Jurusan",
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::FindOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required'
            ]);

            Jurusan::where('id',$jurusan->id)
            ->update($validatedData);

            return redirect()->route('jurusan.index')
            ->with('success','Jurusan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::FindOrFail($id);
        Jurusan::destroy($jurusan->id);

        return redirect()->route('jurusan.index')
        ->with('success','Data Berhasil Dihapus');
    }
}
