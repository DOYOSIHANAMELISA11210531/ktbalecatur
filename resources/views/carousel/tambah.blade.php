@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection 

@section('title2')
    Carousel
@endsection 

@section('content')

<form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Pilih Gambar</label>
        <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/*" >
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
<a href="/kategori" class="btn btn-secondary mt-3">Kembali</a>

@endsection