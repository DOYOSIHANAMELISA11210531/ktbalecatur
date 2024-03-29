@extends('layouts.master2')

{{-- @section('title')
    Program Kerja Karang Taruna
@endsection --}}

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
        <form action="register_proses" method="POST">
            @csrf
            <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" placeholder="name@example.com" value="{{old('name')}}">
            <label for="floatingInput">Nama</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
            <label for="floatingInput">Email address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Daftar</button>
        </form>
        <small class="d-block text-center mt-3">Already have an account?? <a href="/login">Login Now</a></small>
        </main>
    </div>
</div>

@endsection

