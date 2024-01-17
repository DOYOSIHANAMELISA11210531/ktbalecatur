@extends('layouts.master')

@section('title')
    Karang Taruna Balecatur
@endsection 

@section('title2')
    Anggota Karang Taruna
@endsection 

@push('scripts')
    <script src="{{asset('/template/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
    $(function () {
        $("#example1").DataTable();
    });
</script>
@endpush

@push('style')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">    
@endpush

@section('content')
    
    <div class="card-body mb-2">
    <a  href="/admin/anggota/create" class="btn btn-primary btn-sm mb-3">Tambah</a>
    <table id="example1" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Padukuhan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota as $key => $value)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->jabatan}}</td>
                    <td>{{$value->padukuhan}}</td>
                    <td>
                        <form action="/admin/anggota/{{$value->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/admin/anggota/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/admin/anggota/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td>
                        Data Anggota Kosong
                    </td>
                </tr>
            @endforelse
            
        </tbody>  
    </table>
</div>

@endsection 