@extends('layouts.master2')

@section('title')
    {{ $program->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-1">
            @if ($program)
                <div class="card">
                    <img src="{{ asset('images/program/' . $program->image) }}" class="card-img-top border" alt="{{ $program->title }}">
                    <div class="card-body">
                        {{-- <h5 class="card-title">{{ $program->title }}</h5> --}}
                        <p class="tanggal">{{ date('d-m-Y', strtotime($program->tanggal)) }}</p>
                        <p class="card-text text-justify">{{ $program->deskripsi }}</p>
                    </div>
                </div>
            @else
                <h3>Program tidak ditemukan</h3>
            @endif
        </div>
    </div>
@endsection
