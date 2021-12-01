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
            <input type="text"
                class="form-control
                @error('nama') is-invalid @enderror" name="nama"
                value="{{ isset($kategori)?$kategori->nama:old("nama") }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group float-right">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
