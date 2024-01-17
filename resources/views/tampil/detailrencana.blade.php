@extends('layouts.master2')

@section('title')
    {{ $rencana->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-1">
            @if ($rencana)
                <div class="card">
                    <img src="{{ asset('images/rencana/' . $rencana->image) }}" class="card-img-top border" alt="{{ $rencana->title }}">
                    <div class="card-body">
                        <p class="tanggal">{{ date('d-m-Y', strtotime($rencana->tanggal)) }}</p>
                        <p class="card-text text-justify">{{ $rencana->deskripsi }}</p>
                    </div>
                </div>
            @else
                <h3>Program kerja tidak ditemukan</h3>
            @endif
        </div>
    </div>
@endsection
