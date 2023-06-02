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
            Tes Jurusan 
          </h1>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->
    </div>
  </section>

@foreach($pernyataan as $data)
  <div  class="form-check mt-4 mb-4">
      <input class="form-check-input" type="checkbox" value="{{ $data->nama }}" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
      {{ $data->nama }}
    </label>    
</div>
@endforeach


@endsection