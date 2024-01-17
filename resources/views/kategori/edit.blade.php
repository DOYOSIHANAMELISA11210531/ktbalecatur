@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection 

@section('title2')
    Tambah Kategori Program Karang Taruna
@endsection 

@section('content')

<form action="/admin/kategori/{{$category->id}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $category->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/kategori" class="btn btn-secondary">Batal</a>
    </form>

@endsection