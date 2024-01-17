@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection
@section('title2')
    Edit Program Terlaksana
@endsection

@section('content')
    <form action="/admin/program/{{$program->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$program->title}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Penanggung Jawab Kegiatan</label>
            <input type="text" class="form-control @error('pj_kegiatan') is-invalid @enderror" name="pj_kegiatan" value="{{$program->pj_kegiatan}}">
            @error('pj_kegiatan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$program->tanggal}}">
            @error('tanggal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Tempat Kegiatan</label>
            <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{$program->pj_kegiatan}}">
            @error('tempat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id">
                @foreach($kategori as $kategori)
                    <option value="{{ $kategori->id }}" {{ $program->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->name }}
                    </option>
                @endforeach

            </select>
            @error('kategori_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3">{{ $program->deskripsi}}</textarea>
            @error('deskripsi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Upload Foto</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/*" >
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="/admin/program" class="btn btn-secondary mt-3">Kembali</a>
@endsection
