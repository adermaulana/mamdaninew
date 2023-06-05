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

  <div id="wrapper">

     

<div id="content-wrapper">
<div class="container mt-3">

  <div class="row justify-content-center">
  <div class="col-md-4 pb-3">
     <div class="card">
        <div class="card-body">
          <div class="card-title"><h5>Apakah anda Pendaki Baru? </h5><p>Kami Sarankan agar anda menyimak video <strong>Safety Talk</strong> berikut:</p></div>
          <div class="embed-responsive embed-responsive-16by9">

          </div>
          <hr>
          <div class="card-title">Mohon disimak sampai habis ya, Terima Kasih ^_^</div>

          </div>
     </div>
  </div>
  <div class="col-md-8">
     <div class="card">
        <div class="card-body">
           <div class="row justify-content-center">
              <div class="col-3">
                 <img src="/kawasan/images/icon-ciremai.jpg" class="img-fluid">
              </div>
           </div>
           <h4 class="card-title text-center p-3">Balai TN Gunung Ciremai</h4>
           <div class="row ">
              <div class="col-md-12">
                 <form id="form-register">
                  <input type="hidden" class="form-control" name="application_id" value="008">
                    <div class="form-row">
                       <div class="form-group col-md-6">
                          <label>Nama Depan</label>
                          <input type="text" placeholder="Ketik Nama Depan" class="form-control" name="first_name" autocomplete="off">
                       </div>
                       <div class="form-group col-md-6">
                          <label>Nama Belakang</label>
                          <input type="text" placeholder="Ketik Nama Belakang" class="form-control" name="last_name" autocomplete="off">
                       </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                          <label>Alamat Email</label>
                          <input type="email" placeholder="Ketik Email" class="form-control" name="email" autocomplete="off" onkeyup="$('[name=username]').val(this.value.split('@')[0])">
                       </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                          <label>Nomor HP</label>
                          <input type="number" placeholder="Ketik Nomor HP" class="form-control" name="mobile" autocomplete="off">
                       </div>
                    </div>
                    
                        
                        
                           <input type="text" name="group_id" class="form-control d-none" value="2002200">
                        
                    
                    
                    <div class="form-row">
                       <div class="form-group col-md-12">
                          <label>Kata Sandi</label>
                          <input type="password" placeholder="Ketik Kata Sandi" class="form-control" name="password" autocomplete="off">
                       </div>
                    </div>
                    
                    <div class="form-row">
                       <div class="form-group col-md-12">
                          <label>Ulangi Kata Sandi</label>
                          <input type="password" placeholder="Ketik Ulang Kata Sandi" class="form-control" name="password2" autocomplete="off">
                       </div>
                    </div>
                    
                    <div class="form-row">
                       <div class="form-group col">
                          <label>Username</label>
                          <input type="text" placeholder="Username" class="form-control" name="username" autocomplete="off">
                       </div>
                       <!-- <div class="form-group col">
                          <label></label>
                          <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="true" name="enabled">
                             <label class="form-check-label">
                             Reset Password
                             </label>
                          </div>
                       </div> -->
                    </div>
                    <!-- <div class="form-group form-check">
                       <input type="checkbox" class="form-check-input" id="exampleCheck1">
                       <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <div class="border border-bottom mb-3"></div>
                    <div class="row justify-content-center text-center">
                       <div class="col">
                          <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
                       </div>
                    </div>
                 </form>
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