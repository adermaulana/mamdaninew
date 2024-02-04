@extends('layouts.main')

<style>
   .semester {
      color:blue;
   }
</style>

@section('container')

<section class="">
    <div class="container text-center text-md-start mt-0">
      <!-- Grid row -->
      <div style="background-color:#0652dd; color:#e9edc9;" class="row mt-5">
        <!-- Grid column -->
        <div class="col-md-6 col-lg-6 col-xl-4 mx-auto mb-2 mt-4">
          <!-- Content -->
          <h1 class="text-uppercase fw-bold mb-4 ">
            {{ $subtitle }}
          </h1>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->
    </div>
  </section>

  <div id="wrapper">

     

<div id="content-wrapper">
  <div class="container mt-3">

  @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif

    <div class="row justify-content-center">
    <div class="col-md-4 pb-3">
      <div class="card">
          <div class="card-body">
            <div class="card-title"><h5>Data Diri</h5>
            <span> Nama : <strong>{{ $peserta->name }}</strong></span><br>
            <span> Email : <strong>{{ $peserta->email }}</strong></span><br>
            <span> Alamat : <strong>{{ $peserta->address }}</strong></span><br>
            <span> No Telepon : <strong>{{ $peserta->number }}</strong></span><br>
            <a href="/profil/edit" class="btn btn-success mt-3">Ubah Data</a>
            <a href="/profil/edit-password" class="btn btn-primary mt-3">Ubah Password</a>
          </div>
            <hr>
            <div class="card-title">Terima Kasih Sudah Menggunakan Aplikasi Ini</div>
            </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
          <div class="card-body">
<form action="/profil/edit-password" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Password Lama</h6>
<input type="password" name="password_lama" class="form-control" >
@error('password_lama')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 mt-3">
<div class="form-group">
<h6>Password Baru</h6>
<input type="password" name="new_password" class="form-control" >
@error('new_password')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 mt-3">
<div class="form-group">
<h6>Konfirmasi Password Baru</h6>
<input type="password" name="new_password_confirmation" class="form-control" >
@error('new_password_confirmation')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div>
<div class="col-xs-6 col-sm-6 col-md-6 mt-4 ms-3">
<div class="form-group">
<button style="margin-left:-15px;"  type="submit" class="btn btn-primary col-6 me-1">Submit</button>
</div>
</div>
</form>
          </div>
      </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->

      

  </div>
<!-- /.content-wrapper -->
</div>

@endsection