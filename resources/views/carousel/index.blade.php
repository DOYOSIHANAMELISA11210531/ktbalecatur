@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection 

@section('title2')
    Daftar Kategori Program Karang Taruna 
@endsection 

@section('content')
    <a href="{{ route('carousel.create') }}" class="btn btn-primary mb-3">Add New Image</a>

    <div class="card-body mb-2">
    <a  href="/anggota/create" class="btn btn-primary btn-sm mb-3">Tambah</a>
    <table id="example1" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Padukuhan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota as $key => $value)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->jabatan}}</td>
                    <td>{{$value->padukuhan}}</td>
                    <td>
                        <form action="/anggota/{{$value->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/anggota/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/anggota/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td>
                        Data Anggota Kosong
                    </td>
                </tr>
            @endforelse
            
          </tbody>  
        </table>
    </div>
@endsection
