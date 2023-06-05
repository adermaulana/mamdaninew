@extends('layouts.main')

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


  <div class="row">
  <div class="col-5">
        <div  class="form-check mt-4 mb-4">
            <h6>Pilihlah Pernyataan yang Sesuai Minat Anda</h6>
            <h2>Punya Pertanyaan?</h2>
            <h3>Hubungi : 0853xxxx</h3>
        </div>
    </div>


    <div class="col">
        <form action="" method="post">
            <h1 class="mt-3">Tertarik Dengan Jurusan Apa?</h1>
            <h6 class="mt-3">Centang Pernyataan yang Menurut Anda Sesuai dengan yang diinginkan!</h6>
            <hr>
            @foreach($pernyataan as $data)
            <div  class="form-check mt-3 mb-3">
                <input class="form-check-input" type="checkbox" value="{{ $data->nama }}" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                {{ $data->nama }}
                </label>    
            </div>
            @endforeach
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
  </div>



@endsection