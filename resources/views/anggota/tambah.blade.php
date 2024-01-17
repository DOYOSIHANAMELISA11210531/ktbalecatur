@extends('layouts.master')

@section('title')
    Tambah Anggota
@endsection 

@section('content')
    <h1>Tambah Anggota</h1>

    <form action="{{ ('/admin/anggota') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{old('jabatan')}}">
                <option value="" selected disabled>-- Pilih Jabatan --</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Sekretaris 1">Sekretaris 1</option>
                <option value="Sekretaris 2">Sekretaris 2</option>
                <option value="Bendahara 1">Bendahara 1</option>
                <option value="Bendahara 2">Bendahara 2</option>
                <option value="Koordinator Bidang">Koordinator Bidang</option>
                <option value="Anggota">Anggota</option>
            </select>
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Padukuhan</label>
            <select class="form-control @error('padukuhan') is-invalid @enderror" name="padukuhan" value="{{old('padukuhan')}}">
                <option value="" selected disabled>(pilih)</option>
                <option value="Pasekan Kidul">Pasekan Kidul</option>
                <option value="Nyamplung Kidul">Nyamplung Kidul</option>
                <option value="Nyamplung Lor">Nyamplung Lor</option>
                <option value="Kluwih">Kluwih</option>
                <option value="Sumber">Sumber</option>
                <option value="Sumber Gamol">Sumber Gamol</option>
                <option value="Gamol">Gamol</option>
                <option value="Ngaran">Ngaran</option>
                <option value="Pereng Kembang">Pereng Kembang</option>
                <option value="Pereng Dawe">Pereng Dawe</option>
                <option value="Jatisawit">Jatisawit</option>
                <option value="Jitengan">Jitengan</option>
                <option value="Sembung">Sembung</option>
                <option value="Temuwuh Kidul">Temuwuh Kidul</option>
                <option value="Temuwuh Lor">Temuwuh Lor</option>
                <option value="Gejawan Kulon ">Gejawan Kulon </option>
                <option value="Gejawan Wetan">Gejawan Wetan</option>
            </select>
            @error('padukuhan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Upload Foto</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/*" >
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="/admin/anggota" class="btn btn-secondary mt-3">Kembali</a>
@endsection
