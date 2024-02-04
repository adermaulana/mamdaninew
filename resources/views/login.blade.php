@extends('layouts.main')

@section('container')

<style>
    #button:hover{
        background-color:#e9edc9 !important;
        border-color:#e9edc9;
    }
</style>

<div class="container ">
  <div class="row justify-content-center">
    <div class="col-md-4">

      @if(session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
      
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <main  class="form-signin mt-5">
      <img class="mt-2 mb-2 mx-auto d-block" src="img/logo.png" alt="" width="100">
      <h1 class="h4 mb-3 fw-normal text-center ">Please login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating mt-4">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" autofocus required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating ">
          <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
    
        <button style="background-color:#ccd5ae;" id="button" class="w-100 btn btn-lg " type="submit">Login</button>
      </form>
    </main>
  </div>
</div>
</div>
@endsection