@extends('layouts.main')

@section('container')

<section class="hero">

      <div class="intro-text mt-5">

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif

        <h1>
          <span class="hear"> Rekomendasi Penentuan
            Konsentrasi Jurusan </span> <br />
          <span class="connecting">  SMKN 8 Jeneponto
            </span>
        </h1>
        <p>
          Website ini digunakan untuk menentukan jurusan yang cocok <br />
          untuk teman - teman yang ingin mendaftarkan
          diri pada kejurusan <br> yang di inginkan di SMKN 8 Jeneponto
        </p>
        <a class="button btn red" href="/halaman-tes/rapor">Coba Tes Sekarang</a>
        <div class="row mt-4">
            <div class="col col-3">
              <h6>Total Pendaftar</h6>
              <h2>{{ $pendaftar }}</h2>
            </div>
        </div>
      </div>
      <div class="i-frame me-5">
        <img width="500" src="/img/ilustrasi.jpg">
      </div>
</section>
<br><br><br><br><br>
<hr>
@endsection

