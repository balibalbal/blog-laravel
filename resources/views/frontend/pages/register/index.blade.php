@extends('frontend.layouts.main')

@section('isi')

<div class="container">  
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <main class="form-registration">
                <form action="/register" method="post">                  
                  <h5 class="h3 mb-3 fw-normal text-center">Silahkan Registrasi</h5>
                  @csrf
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror                    
                  </div>
                  <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="name" placeholder="username" required value="{{ old('username') }}">
                    <label for="floatingInput">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
                  <small class="d-block text-center mt-2">Sudah Registrasi? <a href="/login">Login Sekarang!</a></small>
                </form>
              </main>
        </div>
    </div>
</div>

@endsection