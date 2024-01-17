@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection 

@section('title2')
    Detail Anggota
@endsection 

@section('content')

    <div>
        <strong>Nama:</strong> {{ $anggota->nama }}<br>
        <strong>Jabatan:</strong> {{ $anggota->jabatan }}<br>
        <strong>Padukuhan:</strong> {{ $anggota->padukuhan }}<br>
        <strong>Foto:</strong><br> 
        <img src="{{ asset('images/anggota/' . $anggota->image) }}" alt="{{ $anggota->nama }}" width="150"><br>
    </div>

    <a href="/admin/anggota" class="btn btn-secondary mt-3">Kembali</a>
@endsection
