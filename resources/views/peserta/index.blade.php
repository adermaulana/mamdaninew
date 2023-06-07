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

  <div class="row justify-content-center">
  <div class="col-md-4 pb-3">
     <div class="card">
        <div class="card-body">
          <div class="card-title"><h5>Data Diri</h5>
          <span> Nama : <strong>{{ $peserta->name }}</strong></span><br>
          <span> Email : <strong>{{ $peserta->email }}</strong></span><br>
          <span> Alamat : <strong>{{ $peserta->address }}</strong></span><br>
          <span> No Telepon : <strong>{{ $peserta->number }}</strong></span>
         </div>
          <div class="embed-responsive embed-responsive-16by9">

          </div>
          <hr>
          <div class="card-title">Terima Kasih Sudah Menggunakan Aplikasi Ini</div>

          </div>
     </div>
  </div>
  <div class="col-md-8">
     <div class="card">
        <div class="card-body">
           <h1 class="card-title text-center p-3">Nilai Rapor</h1>
           <hr>
           <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h3>Nilai Semester 1</h3>
            <h3 class="semester"> {{ $rapor->semester_1 }} </h6>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h3>Nilai Semester 2</h3>
            <h3 class="semester"> {{ $rapor->semester_2 }} </h3>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h3>Nilai Semester 3</h3>
            <h3 class="semester"> {{ $rapor->semester_3 }} </h3>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h3>Nilai Semester 4</h3>
            <h3 class="semester"> {{ $rapor->semester_4 }} </h3>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h3>Nilai Semester 5</h3>
            <h3 class="semester"> {{ $rapor->semester_5 }} </h3>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
            <div class="form-group">
            <h3>Nilai Semester 6</h3>
            <h3 class="semester"> {{ $rapor->semester_6 }} </h3>
            </div>
            </div>

            </div>
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