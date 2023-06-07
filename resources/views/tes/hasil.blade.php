@extends('layouts.main')

@section('container')

<section class="">
    <div class="container text-center text-md-start mt-0">
      <!-- Grid row -->
      <div style="background-color:#0652dd; color:#e9edc9;" class="row mt-5">
        <!-- Grid column -->
        <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-2 mt-4">
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

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show col-lg-12 mt-2" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif


  <div class="row">
  <div class="col-5">
        <div  class="form-check mt-4 mb-4">
            <h2>Berikut Data Diri Anda</h2>
            <h6>Nama : {{ $peserta->name }} </h6>
            <h6>Email : {{ $peserta->email }} </h6>
            <h6>Alamat : {{ $peserta->address }} </h6>
            <h6>Nomor : {{ $peserta->number }} </h6>
        </div>
    </div>


    <div class="col">
        <form action="/halaman-tes/rapor" method="post">
            @csrf
            <h1 class="mt-3">Hasil Tes Jurusan</h1>
            <h6 class="mt-3">Setelah Mengisi Pernyataan Yang Ada, berikut Hasil Tes Jurusan Anda :</h6>
            <hr>

            <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h6>Nilai Semester 1</h6>
            <input type="text" name="semester_1" value="{{ old('semester_1') }}" class="form-control" >
            @error('semester_1')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h6>Nilai Semester 2</h6>
            <input type="text" name="semester_2" value="{{ old('semester_2') }}" class="form-control" >
            @error('semester_2')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h6>Nilai Semester 3</h6>
            <input type="text" name="semester_3" value="{{ old('semester_3') }}" class="form-control" >
            @error('semester_3')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h6>Nilai Semester 4</h6>
            <input type="text" name="semester_4" value="{{ old('semester_4') }}" class="form-control" >
            @error('semester_4')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h6>Nilai Semester 5</h6>
            <input type="text" name="semester_5" value="{{ old('semester_5') }}" class="form-control" >
            @error('semester_5')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h6>Nilai Semester 6</h6>
            <input type="text" name="semester_6" value="{{ old('semester_6') }}" class="form-control" >
            @error('semester_6')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <input class="btn btn-primary col-xs-6 col-sm-6 col-md-6" type="submit" value="Kirim">
            </div>
            </div>

            </div>
            
        </form>
    </div>
  </div>



@endsection