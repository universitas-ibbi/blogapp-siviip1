@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List Blog</h1>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("blog.create") }}"
            class="btn btn-success">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th colspan=2 width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($blog as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td class="text-capitalize">{{ $item->kategori->nama }}</td>
            <td>
                <a href="{{ route("blog.show",$item) }}"
                    class="btn btn-block btn-warning">Rubah</a></td>
            <td>
                <a href="#"
                    onclick="event.preventDefault();
                    document.getElementById('form-hapus-{{ $item->id }}').submit();"
                    class="btn btn-block btn-danger">Hapus</a>
                <form
                    id="form-hapus-{{ $item->id }}"
                    action="{{ route("blog.destroy",$item) }}" method="post">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
