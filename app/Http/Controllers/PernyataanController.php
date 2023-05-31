<?php

namespace App\Http\Controllers;

use App\Models\Pernyataan;
use Illuminate\Http\Request;

class PernyataanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.instrumen.index',[
            'title' => 'Instrumen Pernyataan',
            'pernyataan' => Pernyataan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.instrumen.create',[
            'title' => 'Tambah Data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
            ]);

            Pernyataan::create($validatedData);
            return redirect()->route('instrumen.index')
            ->with('success','Instrumen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pernyataan $pernyataan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pernyataan = Pernyataan::FindOrFail($id);
        return view('dashboard.instrumen.edit',[
            'title' => "Ubah Instrumen Pernyataan",
            'pernyataan' => $pernyataan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pernyataan = Pernyataan::FindOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required'
            ]);

            Pernyataan::where('id',$pernyataan->id)
            ->update($validatedData);

            return redirect()->route('instrumen.index')
            ->with('success','Instrumen Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pernyataan = Pernyataan::FindOrFail($id);
        Pernyataan::destroy($pernyataan->id);

        return redirect()->route('instrumen.index')
        ->with('success','Data Berhasil Dihapus');
    }
}
