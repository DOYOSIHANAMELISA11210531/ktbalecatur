@extends('layouts.master2')

{{-- @section('title')
    Program Kerja Karang Taruna
@endsection --}}

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        <form action="login_proses" method="POST">
            @csrf
            <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com">
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
            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now</a></small>
        </main>
    </div>
</div>

@endsection

