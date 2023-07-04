@extends('layouts.main')

@section('container')

<section class="">
    <div class="container text-center text-md-start mt-0">
      <!-- Grid row -->
      <div style="background-color:#0652dd; color:#e9edc9;" class="row mt-5">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-2 mt-4">
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
            <h1 class="mt-3">Hasil Tes Jurusan</h1>
            <h6 class="mt-3">Setelah Mengisi Pernyataan Yang Ada, berikut Hasil Tes Jurusan Anda :</h6>
            <hr>
            <span>Dengan Memilih Pernyataan Berikut : </span><br>
            <table class="col table">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Pernyataan</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($hasilpernyataan as $data)
                  <tr>
                      <td> {{ $loop->iteration }} </td>
                      <td> {{ $data->pernyataan->nama }} </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
            <p class="mt-3"> Jurusan Yang Kamu Pilih </p>
            <table class="col table">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Jurusan</th>
                      <th>Hasil Kecocokan</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($hasiljurusan as $data1)
                  <tr>
                      <td> {{ $loop->iteration }} </td>
                      <td> {{ $data1->jurusan->name }} </td>
                      @foreach($hasil as $tes)
                      @if($tes <= 78)
                      <td><b class="text-danger">Kurang Sesuai</b></td>
                      @elseif($tes >= 79 && $tes <= 89)
                      <td><b class="text-success">Cukup Sesuai</b></td>
                      @else
                      <td><b class="text-primary">Sangat Sesuai</b></td>
                      @endif
                      @endforeach
                  </tr>
                  @endforeach
              </tbody>
          </table>
          <table class="col table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Kecocokan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasilpernyataan as $data2)
                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td>{{ $data2->pernyataan->jurusan->name }}</td>
                  <td>{{ $data2->pernyataan->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
@endsection