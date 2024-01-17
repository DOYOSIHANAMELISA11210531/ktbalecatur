@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection
@section('title2')
    Detail Kegiatan terlaksana
@endsection

@section('content')
    <div>
        <strong>Nama:</strong> {{ $program->title }} <br>
        <strong>Penanggung Jawab Kegiatan:</strong> {{ $program->pj_kegiatan }} <br>
        <strong>Tanggal:</strong> {{ strftime('%d %B %Y', strtotime($program->tanggal)) }}<br>
        <strong>Tempat:</strong> {{ $program->tempat }} <br>
        <strong>Deskripsi:</strong> {{ $program->deskripsi }} <br>
        <strong>Foto:</strong> <br>
        <img src="{{asset('images/program/' . $program->image)}}" width="500"> <br><br>
    </div>

    <a href="/admin/program" class="btn btn-secondary">Kembali</a>
@endsection
