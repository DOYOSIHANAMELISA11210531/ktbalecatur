@extends('layouts.master')

@section('title')
    Daftar Kegiatan Terlaksana
@endsection 

@section('content')
<a href="{{ ('program/create')}}" class="btn btn-success btn-sm">Tambah</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kegiatan</th>
                <th>PJ Kegiatan</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Deskripsi Kegiatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($program as $key => $program)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $program->title }}</td>
                    <td>{{ $program->pj_kegiatan }}</td>
                    <td>{{ date('d-m-Y', strtotime($program->tanggal)) }}</td>
                    <td>{{ $program->tempat }}</td>
                    <td>{{ strlen($program->deskripsi) > 50 ? substr($program->deskripsi, 0, 50) . '...' : $program->deskripsi }}</td>
                    <td>
                        <form action="/admin/program/{{$program->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/admin/program/{{$program->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/admin/program/{{$program->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin akan menghapusnya?')">Hapus</button>
                        </form>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Data Kegiatan Terlaksana Kosong
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
