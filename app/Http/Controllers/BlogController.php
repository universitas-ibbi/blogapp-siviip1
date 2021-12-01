<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pages\admin\blog\list.blade.php
        return view("pages.admin.blog.list",[
            "blog" => Blog::all() //SELECT * FROM TBLBLOG;
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // pages\admin\blog\form.blade.php
        return view("pages.admin.blog.form",[
            "kategori" => \App\Models\Kategori::all()
        ]);
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
            "judul" => "required|min:10",
            "isi" => "required|min:10",
            "kategori_id" => "required",
            "user_id" => "required"
        ]);

        // Blog::insert($request->except("_token"));
        Blog::create([
            "judul" => $request->judul,
            "isi" => $request->isi,
            "kategori_id" => $request->kategori_id,
            "gambar" => $request->file("gambar")->store("images"),
            "user_id" => $request->user_id
        ]);

        return redirect()->route("blog.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view("pages.admin.blog.form",[
            "blog" => $blog,
            "kategori" => \App\Models\Kategori::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->except(["_token","_method"]));

        return redirect()->route("blog.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route("blog.index");
    }
}
