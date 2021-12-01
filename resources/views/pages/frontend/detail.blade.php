@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ Storage::url($blog->gambar) }}"
        class="w-100 mb-2">
    <h1>{{ $blog->judul }}</h1>
    <p>
        {{ $blog->isi }}
    </p>

    <h2>List Komentar</h2>
    <form action="{{ route("blog.komentar",["blogid" => $blog->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="komentar">Komentar</label>
            <input type="text" class="form-control" name="isi">
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
    <ul class="list-group">
        @foreach ($blog->komentar as $item)
        <li class="list-group-item">
            <h5>{{ $item->isi }}</h5>
            <small>{{ $item->user->name }} - {{ $item->created_at }}</small>
        </li>
        @endforeach
    </ul>
</div>
@endsection
