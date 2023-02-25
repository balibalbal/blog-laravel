@extends('frontend.layouts.main')

@section('isi')

<div class="container">  
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">   
            <main class="form-signin w-100 m-auto">
                @if (session()->has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="post">                  
                  <h5 class="h5 mb-3 fw-normal text-center">Login</h5>
                    @csrf
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                  <small class="d-block text-center mt-2">Belum Registrasi? <a href="/register" class="text-decoration-none">Registrasi Sekarang!</a></small>
                </form>
              </main>
        </div>
    </div>
</div>

@endsection