<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\Http\Requests\InstansiRequest;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instansi.list', [
            'title' => 'Daftar Instansi',
            'instansi' => Instansi::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instansi.create', [
            'title' => 'Daftarkan Instansi',
            'instansi' => Instansi::paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstansiRequest $request)
    {
        Instansi::create([
            'instansi' => $request->instansi,
            'jumlah_pegawai' => $request->jumlah_pegawai,
            'description' => $request->description,
        ]);

        return redirect()->route('instansi.index')->with('message', 'Instansi berhasil didaftarkan!');
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
    public function edit(Instansi $instansi)
    {
        return view('instansi.edit', [
            'title' => 'Edit Instansi',
            'instansi' => $instansi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instansi $instansi)
    {


        $instansi->instansi = $request->instansi;
        $instansi->jumlah_pegawai = $request->jumlah_pegawai;
        $instansi->description = $request->description;

        $instansi->save();

        return redirect()->route('instansi.index')->with('message', 'Instansi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instansi $instansi)
    {
        $instansi->delete();

        return redirect()->route('instansi.index')->with('message', 'Data Instansi berhasil dihapus!');
    }
}
