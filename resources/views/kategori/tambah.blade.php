@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection 

@section('title2')
    Tambah Kategori Program Karang Taruna
@endsection 

@section('content')

<form action="{{ ('/admin/kategori') }}" method="post">
  @csrf
  <div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
    @error('name')
      <div class="invalid-feedback">wajib diisi</div>
    @enderror
  </div>

  <div class="form-group">
    <label>Deskripsi</label>
    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3"></textarea>
    @error('deskripsi')
      <div class="invalid-feedback">wajib diisi</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
<a href="/admin/kategori" class="btn btn-secondary mt-3">Kembali</a>

@endsection