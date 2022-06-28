<?php

namespace App\Http\Controllers;

use App\Models\Bimbel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BimbelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bimbel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'materi' => 'required|string|max:255',
        ]);

        $path = Storage::putFile('bimbel', $request->file('tugas'));

        Bimbel::create([
            'nama_mapel' => $request->nama_mapel,
            'materi' => $request->materi,
            'tugas' => $path,
        ]);

        return redirect()->route('index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bimbel $bimbel)
    {
        //
        return view('edit', compact('bimbel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Bimbel $bimbel, Request $request)
    {

        if ($request->file('tugas') == null) {
            $path = $bimbel->tugas;
        }
        if ($request->file('tugas') != null) {
            Storage::delete($bimbel->tugas);
            $path = Storage::putFile('bimbel', $request->file('tugas'));
        }
        $bimbel->update([
            'nama_mapel' => $request->nama_mapel,
            'materi' => $request->materi,
            'tugas' => $path,
        ]);
        return redirect()->route('index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bimbel $bimbel)
    {
        //
        Storage::delete($bimbel->tugas);
        $bimbel->delete();
        return redirect()->route('index')->with('success', 'Data berhasil dihapus');
    }
}
