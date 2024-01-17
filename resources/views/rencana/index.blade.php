@extends('layouts.master')

@section('title')
    Daftar Program Kerja Karang Taruna Balecatur
@endsection 

@section('content')
<a href="{{ ('/admin/rencana/create')}}" class="btn btn-success btn-sm">Tambah</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kegiatan</th>
                <th>PJ Kegiatan</th>
                <th>Tanggal</th>
                <th>Deskripsi Kegiatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rencana as $key => $rencana)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $rencana->title }}</td>
                    <td>{{ $rencana->pj_kegiatan }}</td>
                    <td>{{ date('d-m-Y', strtotime($rencana->tanggal)) }}</td>

                    <td>{{ strlen($rencana->deskripsi) > 50 ? substr($rencana->deskripsi, 0, 50) . '...' : $rencana->deskripsi }}</td>
                    <td>
                        <form action="/admin/rencana/{{$rencana->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/admin/rencana/{{$rencana->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/admin/rencana/{{$rencana->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        Data Rencana Kosong
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
@endsection
