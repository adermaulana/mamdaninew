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

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show col-lg-12 mt-2" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-12 mt-2" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif


  <div class="row">
  <div class="col-4">
        <div  class="form-check mt-4 mb-4">
            <h6>Pilihlah Pernyataan yang Sesuai Minat Anda</h6>
            <h2>Punya Pertanyaan?</h2>
            <h3>Hubungi : 0853xxxx</h3>
        </div>
    </div>


    <div class="col">
      <form action="/halaman-tes" method="post" onsubmit="return updateCheckboxes()">
        @csrf
        <hr>
          <div class="row">
            <div class="col">
              <h6 class="mt-3">Centang Pernyataan yang Menurut Anda Sesuai dengan yang diinginkan <b>( 7 )</b> ! Jika tidak, cukup abaikan!</h6>
              @error('pernyataan_id')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
              <table class="col table">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th
                          >Pernyataan</th>
                          <th>Ya</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($pernyataan as $data)
                      <tr>
                          <td> {{ $loop->iteration }} </td>
                          <td> {{ $data->nama }} </td>
                          <td><input class="form-check-input pernyataan-checkbox" name="pernyataan_id[]" type="checkbox" value="{{ $data->id }}" id="flexCheckChecked"></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              
              <input class="btn btn-primary" onclick="validateForm()" type="submit" id="submitButton" value="Kirim">
            </div>
          </div>
      </form>
  </div>
  </div>


@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
  var checkboxes = $('.jurusan-checkbox');
  var maxAllowed = 3;

  function updateCheckboxes() {
    var checkedCount = $('.jurusan-checkbox:checked').length;

    checkboxes.each(function() {
      if (checkedCount >= maxAllowed && !$(this).is(':checked')) {
        $(this).prop('disabled', true);
      } else {
        $(this).prop('disabled', false);
      }
    });
  }

  checkboxes.on('change', updateCheckboxes);
});
</script>

<script>
  $(document).ready(function() {
  var checkboxes = $('.pernyataan-checkbox');
  var maxAllowed = 7;
  var submitButton = $('#submitButton');

  function updateCheckboxes() {
    var checkedCount = $('.pernyataan-checkbox:checked').length;
    var submitButton = $('#submitButton');
    checkboxes.each(function() {
      if (checkedCount >= maxAllowed && !$(this).is(':checked')) {
        submitButton.prop('disabled', false);
      } else if ( checkedCount < maxAllowed && !$(this).is(':checked')){
        submitButton.prop('disabled', false);
      }
      
      if (checkedCount > 7 && !$(this).is(':checked')) {
                alert("Jumlah pernyataan yang dicentang tidak boleh melebihi 7.");
                submitButton.prop('disabled', true);
                return false;
            } 
    });
  }

  function handleSubmit(event) {
        var checkedCount = $('.pernyataan-checkbox:checked').length;
        if (checkedCount < maxAllowed) {
            event.preventDefault(); // Prevent form submission
            alert("Anda harus memilih  7 pernyataan sebelum mengirimkan hasil tes.");
        }
    }

  checkboxes.on('change', updateCheckboxes);
  submitButton.on('click', handleSubmit);
});
</script>
