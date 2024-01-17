@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection

@section('title2')
    Tambah Rencana
@endsection

@section('content')
    <form action="/admin/rencana" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Program Kerja</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Penanggung Jawab Kegiatan</label>
            <input type="text" class="form-control @error('pj_kegiatan') is-invalid @enderror" name="pj_kegiatan" value="{{old('pj_kegiatan')}}">
            @error('pj_kegiatan')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{old('tanggal')}}">
            @error('tanggal')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" id="" value="{{old('kategori_id')}}">
                <option value="" selected disabled>-- Pilih Kategori --</option>
                @forelse ($kategori as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @empty
                    <option value=""><a href="/admin/kategori/create">tambah kategori</a></option>
                @endforelse
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30" rows="10">{{old('deskripsi')}}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Upload Foto Kegiatan</label>

            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/*" value="{{old('image')}}">
            @error('image')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    <a href="/admins/rencana" class="btn btn-secondary mt-3">Kembali</a>
@endsection
