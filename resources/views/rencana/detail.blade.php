@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection

@section('title2')
    Detail Rencana
@endsection

@section('content')
    <div>
        <strong>Nama:</strong> {{ $rencana->title }} <br>
        <strong>Penanggung Jawab Kegiatan:</strong> {{ $rencana->pj_kegiatan }} <br>
        <strong>Tanggal:</strong> {{ strftime('%d %B %Y', strtotime($rencana->tanggal)) }}<br>
        <strong>Deskripsi:</strong> {{ $rencana->deskripsi }} <br>
        <strong>Foto:</strong> <br>
        <img src="{{asset('images/rencana/' . $rencana->image)}}" width="500"> <br><br>
    </div>

    <a href="/admin/rencana" class="btn btn-secondary">Kembali</a>
@endsection
