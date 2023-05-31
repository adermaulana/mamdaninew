  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard') ? 'text-primary bg-light' : '' }}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/instrumen*') ? 'text-primary bg-light' : '' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-text"></i><span>Instrumen Pernyataan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/instrumen*'))
        <ul id="charts-nav" class="nav-content ">
        @else
        <ul id="charts-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/instrumen/create">
            @if(Request::is('dashboard/instrumen/instrumen'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Pernyataan</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Pernyataan</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/instrumen">
            @if(Request::is('dashboard/instrumen'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Pernyataan</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Pernyataan</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/minat*') ? 'text-primary bg-light' : ''  }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-text"></i><span>Data Tes Minat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/minat*'))
        <ul id="icons-nav" class="nav-content ">
        @else
        <ul id="icons-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/minat">
            @if(Request::is('dashboard/minat'))
            <i class="bi bi-circle"></i><span class="text-primary">Lihat Tes Minat</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Tes Minat</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/peserta*') ? 'text-primary bg-light' : '' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Data Peserta</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/peserta*'))
        <ul id="components-nav" class="nav-content">
        @else
        <ul id="components-nav" class="nav-content collapse ">
        @endif
         <li>
            <a href="/dashboard/peserta/create">
            @if(Request::is('dashboard/peserta/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Peserta</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Peserta</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/peserta">
            @if(Request::is('dashboard/peserta'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Peserta</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Peserta</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/jurusan*') ? 'text-primary bg-light' : '' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-file-text"></i><span>Data Jurusan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/jurusan*'))
        <ul id="forms-nav" class="nav-content ">
        @else
        <ul id="forms-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/jurusan/create">
            @if(Request::is('dashboard/jurusan/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Jurusan</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Jurusan</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/jurusan">
            @if(Request::is('dashboard/jurusan'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Jurusan</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Jurusan</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/rapor*') ? 'text-primary bg-light' : '' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Data Nilai Rapor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/rapor*'))
        <ul id="tables-nav" class="nav-content " data-bs-parent="#sidebar-nav">
        @else
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        @endif
        <li>
            <a href="/dashboard/rapor/create">
            @if(Request::is('dashboard/rapor/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Nilai Rapor</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Nilai Rapor</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/rapor">
            @if(Request::is('dashboard/rapor'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Nilai Rapor</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Nilai Rapor</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


    </ul>

  </aside><!-- End Sidebar-->