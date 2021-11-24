@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Kategori</h1>
    <hr>
    <form action="{{ isset($kategori)
                        ?route("kategori.update",$kategori)
                        :route("kategori.store") }}"
        method="post">
        @isset($kategori)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama"
                value="{{ isset($kategori)?$kategori->nama:"" }}">
        </div>
        <div class="form-group float-right">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
