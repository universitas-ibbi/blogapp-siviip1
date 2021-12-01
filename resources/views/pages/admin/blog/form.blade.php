@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Blog</h1>
    <hr>
    <form action="{{ isset($blog)?route("blog.update",$blog):route("blog.store") }}"
        method="post" enctype="multipart/form-data">
        @isset($blog)
            @method("PUT")
        @endisset
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control
                @error('judul') is-invalid @enderror" name="judul"
                value="{{ isset($blog)?$blog->judul:old("judul") }}">
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="isi">Isi</label>
            <textarea name="isi" class="form-control
                @error('isi') is-invalid @enderror"
                id="" cols="30" rows="10">{{ isset($blog)?$blog->isi:old('isi') }}</textarea>
            @error('isi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" name="gambar">
            @if (!empty($blog->gambar))
                <img src="{{ Storage::url($blog->gambar) }}" alt=""
                class="my-2">
            @endif
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori_id" id="" class="form-control text-capitalize">
            @foreach ($kategori as $item)
                <option value="{{ $item->id }}"
                    {{ (isset($blog) && $blog->kategori_id==$item->id)?"SELECTED":"" }}
                    >{{ $item->nama }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
