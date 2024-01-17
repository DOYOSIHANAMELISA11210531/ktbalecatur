@extends('layouts.master')

@section('title')
    Detail Kategori
@endsection 

@section('content')

    <div>
        <strong>Kategori : </strong><br> {{ $category->name }}<br>
        <strong>Deskripsi:</strong> <br>
        {{ $category->deskripsi }}<br>
    </div>

    <a href="/admin/kategori" class="btn btn-primary my-3">Kembali</a>
@endsection
