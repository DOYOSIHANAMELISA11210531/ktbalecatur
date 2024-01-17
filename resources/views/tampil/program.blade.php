@extends('layouts.master2')

@section('title')
    Kegiatan Terlaksana Karang Taruna
@endsection

@section('content')
    <div class="row">
        @forelse ($program as $item)
            <div class="col-md-4 mb-4" data-tanggal="{{ date('Y-m-d', strtotime($item->tanggal)) }}">
                <div class="card d-flex flex-column">
                    <div class="card-body">
                        <img src="{{ asset('images/program/' . $item->image) }}" class="img-fluid card-img-top object-fit-cover" alt="{{ $item->title }}">
                        <br>
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="tanggal">{{ date('d-m-Y', strtotime($item->tanggal)) }}</p>
                        <p class="card-text">{{ substr($item->deskripsi, 0, 100) }}...</p>
                        <a href="{{ route('detailprogram', ['id' => $item->id]) }}">Selengkapnya...</a>
                    </div>
                </div>
            </div>
        @empty
            <h3>Belum ada data Program Kegiatan</h3>
        @endforelse
    </div>
    
@endsection

