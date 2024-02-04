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
  <h1>Nilai Rapor</h1>
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
              <h5 class="card-title">Daftar Nilai Rapor</h5>
              <table class="table table-bordered" id="datatable-noexport">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Semester 1</th>
                <th>Semester 2</th>
                <th>Semester 3</th>
                <th>Semester 4</th>
                <th>Semester 5</th>
                <th>Bukti Nilai Rapor</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($rapor as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->peserta->name }} </td>
            <td>{{ $data->semester_1 }} </td>
            <td>{{ $data->semester_2 }} </td>
            <td>{{ $data->semester_3 }} </td>
            <td>{{ $data->semester_4 }} </td>
            <td>{{ $data->semester_5 }} </td>
            <td><a href="{{ asset('storage/' . $data->bukti_rapor) }}" target="_blank" class="btn btn-success">Lihat</a>
            <a href="{{ asset('storage/' . $data->bukti_rapor) }}" download="{{ $data->bukti_rapor }}" class="btn btn-danger">Unduh</a>
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