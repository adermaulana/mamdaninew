@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

<div class="pagetitle">
  <h1>Tes Minat</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- columns -->
  <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Daftar Tes Minat</h5>
              <table class="table table-bordered" id="datatable-noexport">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jurusan Diminati</th>
                <th>Nilai Penjurusan</th>
                <th>Pengumuman</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($hasiljurusan as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->peserta->name }} </td>
            <td>{{ $data->hasil_jurusan }} </td>
            @if($data->nilai >= 90)
            <td class="text-success">{{ $data->nilai }} </td>
            @elseif($data->nilai <= 89 && $data->nilai >= 60)
            <td class="text-warning">{{ $data->nilai }} </td>
            @else
            <td class="text-danger">{{ $data->nilai }} </td>
            @endif
            <td>
              <a class="btn btn-success" href="/send-email/{{ $data->id }}">Umumkan</a>
            </td>
          </tr>
          @endforeach 
        </tbody>
    </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End columns -->

  </div>
</section>

</main><!-- End #main -->



<script type="text/javascript" id="javascript">

</script>

@endsection