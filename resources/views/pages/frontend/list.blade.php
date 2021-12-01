@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($blog as $item)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ Storage::url($item->gambar) }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">{{ $item->isi }}</p>
                        <a href="{{ route("blog.detail",["id" => $item->id]) }}"
                            class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
