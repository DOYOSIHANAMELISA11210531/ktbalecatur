@extends('layouts.master2')

@section('title')
    Anggota Karang Taruna
@endsection

@section('content')
    <div class="row">

        @forelse ($anggota as $item)
            <div class="col-md-2 mb-2">
                {{-- Hapus atau komentar bagian card --}}
                {{-- <div class="card d-flex flex-column"> --}}
                {{--     <div class="card-body"> --}}
                        <img src="{{ asset('images/anggota/' . $item->image) }}" class="img-fluid card-img-top object-fit-cover" alt="{{ $item->title }}">
                        <br>
                        <h5 class="card-title text-center">{{ $item->nama }}</h5>
                        <p class="card-title text-center">{{ $item->padukuhan }}</p>
                        <p class="card-title text-center">{{ $item->jabatan }}</p>
                {{-- </div> --}}
                {{-- </div> --}}
            </div>
        @empty
            <h3>Belum ada data anggota</h3>
        @endforelse
    </div>
@endsection
