<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pages/admin/kategori/list.blade.php
        return view("pages.admin.kategori.list",[
            "kategori" => Kategori::all() // SELECT * FROM TBLKATEGORI
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.kategori.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => "required|min:10"
        ]);

        // mass assignment
        Kategori::create($request->except("_token"));
        // INSERT INTO TBLKATEGORI(NAMA) VALUES(NILAI)
        // Kategori::create([
        //     "nama_kategori" => $request->nama
        // ]);

        return redirect()->route("kategori.index")
            ->with("info","Berhasil Tambah Kategori");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view("pages.admin.kategori.form",compact("kategori"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $kategori->update($request->except("_token"));

        return redirect()->route("kategori.index")
            ->with("info","Berhasil Rubah Kategori");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route("kategori.index")
            ->with("info","Berhasil Hapus Kategori");
    }
}
