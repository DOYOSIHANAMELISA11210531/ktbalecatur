@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection 

@section('title2')
    Daftar Kategori Program Karang Taruna 
@endsection 

@section('content')
    <a href="{{('/admin/kategori/create')}}" class="btn btn-success mb-3 btn-sm">Tambah</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $key => $category)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ strlen($category->deskripsi) > 50 ? substr($category->deskripsi, 0, 50) . '...' : $category->deskripsi }}</td>
                    <td>
                        <form action="/admin/kategori/{{$category->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/admin/kategori/{{$category->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/admin/kategori/{{$category->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Data Kategori Kosong
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
