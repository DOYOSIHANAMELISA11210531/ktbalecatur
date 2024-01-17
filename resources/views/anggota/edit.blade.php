@extends('layouts.master')

@section('title')
    Edit Anggota
@endsection 

@section('content')
    <h1>Edit Anggota</h1>

    <form action="/admin/anggota/{{$anggota->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $anggota->nama) }}">
            @error('nama')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan">
                <option value="" disabled>Pilih Jabatan</option>
                <option value="Ketua" {{ $anggota->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="Wakil Ketua" {{ $anggota->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                <option value="Sekretaris 1" {{ $anggota->jabatan == 'Sekretaris 1' ? 'selected' : '' }}>Sekretaris 1</option>
                <option value="Sekretaris 2" {{ $anggota->jabatan == 'Sekretaris 2' ? 'selected' : '' }}>Sekretaris 2</option>
                <option value="Bendahara 1" {{ $anggota->jabatan == 'Bendahara 1' ? 'selected' : '' }}>Bendahara 1</option>
                <option value="Bendahara 2" {{ $anggota->jabatan == 'Bendahara 2' ? 'selected' : '' }}>Bendahara 2</option>
                <option value="Koordinator Bidang" {{ $anggota->jabatan == 'Koordinator Bidang' ? 'selected' : '' }}>Koordinator Bidang</option>
                <option value="Anggota" {{ $anggota->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
            </select>
            @error('jabatan')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Padukuhan</label>
            <select class="form-control @error('padukuhan') is-invalid @enderror" name="padukuhan">
                <option value="" disabled>Pilih Padukuhan</option>
                <option value="Pasekan Kidul" {{ $anggota->padukuhan == 'Pasekan Kidul' ? 'selected' : '' }}>Pasekan Kidul</option>
                <option value="Pasekan Lor" {{ $anggota->padukuhan == 'Pasekan Lor' ? 'selected' : '' }}>Pasekan Lor</option>
                <option value="Nyamplung Kidul" {{ $anggota->padukuhan == 'Nyamplung Kidul' ? 'selected' : '' }}>Nyamplung Kidul</option>
                <option value="Nyamplung Lor" {{ $anggota->padukuhan == 'Nyamplung Lor' ? 'selected' : '' }}>Nyamplung Lor</option>
                <option value="Kluwih" {{ $anggota->padukuhan == 'Kluwih' ? 'selected' : '' }}>Kluwih</option>
                <option value="Sumber" {{ $anggota->padukuhan == 'Sumber' ? 'selected' : '' }}>Sumber</option>
                <option value="Sumber Gamol" {{ $anggota->padukuhan == 'Sumber Gamol' ? 'selected' : '' }}>Sumber Gamol</option>
                <option value="Gamol" {{ $anggota->padukuhan == 'Gamol' ? 'selected' : '' }}>Gamol</option>
                <option value="Ngaran" {{ $anggota->padukuhan == 'Ngaran' ? 'selected' : '' }}>Ngaran</option>
                <option value="Pereng Kembang," {{ $anggota->padukuhan == 'Pereng Kembang,' ? 'selected' : '' }}>Pereng Kembang,</option>
                <option value="Pereng Dawe" {{ $anggota->padukuhan == 'Pereng Dawe' ? 'selected' : '' }}>Pereng Dawe</option>
                <option value="Jatisawit" {{ $anggota->padukuhan == 'Jatisawit' ? 'selected' : '' }}>Jatisawit</option>
                <option value="Jitengan" {{ $anggota->padukuhan == 'Jitengan' ? 'selected' : '' }}>Jitengan</option>
                <option value="Sembung" {{ $anggota->padukuhan == 'Sembung' ? 'selected' : '' }}>Sembung</option>
                <option value="Temuwuh Kidul" {{ $anggota->padukuhan == 'Temuwuh Kidul' ? 'selected' : '' }}>Temuwuh Kidul</option>
                <option value="Temuwuh Lor" {{ $anggota->padukuhan == 'Temuwuh Lor' ? 'selected' : '' }}>Temuwuh Lor</option>
                <option value="Gejawan Kulon " {{ $anggota->padukuhan == 'Gejawan Kulon ' ? 'selected' : '' }}>Gejawan Kulon </option>
                <option value="Gejawan Wetan" {{ $anggota->padukuhan == 'Gejawan Wetan' ? 'selected' : '' }}>Gejawan Wetan</option>
                
            </select>
            @error('padukuhan')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Upload Foto</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" accept="image/*" >
            @error('image')
                <div class="invalid-feedback">wajib diisi</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/admin/anggota" class="btn btn-secondary">Batal</a>
    </form>
@endsection
