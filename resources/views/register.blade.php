@extends('layouts.main')

@section('container')

<style>
    #registrasi:hover{
        background-color:#e9edc9 !important;
        border-color:#e9edc9;
    }
</style>

<div  class="container ">
  <div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration mt-5">
        <img class="mt-2 mb-2 mx-auto d-block" src="img/logo.png" alt="" width="100">
            <h1 class="h3 mb-3 fw-normal text-center">Halaman Registrasi</h1>
          <form action="/register" method="post">
          @csrf
          <div class="form-floating">
              <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama" value="{{ old('name') }}" >
              <label for="name">Nama</label>
              @error('name')
              <div  class="invalid-feedback"> 
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
              <label for="email">Email</label>
              @error('email')
              <div  class="invalid-feedback"> 
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="address" class="form-control rounded-bottom @error('address') is-invalid @enderror" id="address" placeholder="address" required value="{{ old('address') }}">
              <label for="address">Alamat</label>
              @error('address')
              <div  class="invalid-feedback"> 
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="number" name="number" class="form-control rounded-bottom @error('number') is-invalid @enderror" id="number" placeholder="Handphone Number" required value="{{ old('number') }}">
              <label for="number">Nomor Telepon</label>
              @error('number')
              <div  class="invalid-feedback"> 
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required value="{{ old('password') }}">
              <label for="password">Password</label>
              @error('password')
              <div  class="invalid-feedback"> 
                  {{ $message }}
              </div>
              @enderror
            </div>
            <button style="background-color:#ccd5ae;" id="registrasi" class="w-100 btn btn-lg mb-2 mt-3" type="submit">Registrasi</button>
          </form>
          <small style="margin-bottom:62px;" class="d-block text-center">Sudah Daftar? <a class="text-decoration-none" href="/login">Silahkan Login</a></small>
        </main>
    </div>
</div>
</div>
@endsection