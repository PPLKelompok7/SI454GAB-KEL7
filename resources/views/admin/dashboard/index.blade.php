@extends('template.admin.index')
@section('content_admin')
    <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('template_admin')}}/index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

        <div class="col-lg-12">
        <div class="row">
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">                
                    <div class="card-body">
                    <h5 class="card-title">Total Admin <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-hdd-rack"></i>
                        </div>
                        <div class="ps-3">
                        {{-- <h6>{{$rak}}</h6> --}}
                        <h6>{{ $total_admin }}</h6>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">                
                    <div class="card-body">
                    <h5 class="card-title">Total Mahasiswa <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-life-preserver"></i>
                        </div>
                        <div class="ps-3">
                        {{-- <h6>{{$category}}</h6> --}}
                        <h6>{{ $total_mahasiswa }}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card customers-card">                
                    <div class="card-body">
                    <h5 class="card-title">Total Konselor <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                        </div>
                        <div class="ps-3">
                        {{-- <h6>{{$buku}}</h6> --}}
                        <h6>{{ $total_konselor }}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">                
                    <div class="card-body">
                    <h5 class="card-title">Total Sesi Konseling <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-arrow-bar-right"></i>
                        </div>
                        <div class="ps-3">
                        {{-- <h6>{{$user}}</h6> --}}
                        <h6>{{ $total_sesi_konseling }}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">                
                    <div class="card-body">
                    <h5 class="card-title">Total Pendaftaran Sesi Konseling (Menunggu) <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person"></i>
                        </div>
                        <div class="ps-3">
                        {{-- <h6>{{$murid}}</h6> --}}
                        <h6>{{ $pendaftaran_sesi_konseling_menunggu }}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-4">
                <div class="card info-card customers-card">                
                    <div class="card-body">
                    <h5 class="card-title">Total Pendaftaran Sesi Konseling (Terverifikasi) <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-arrow-90deg-right"></i>
                        </div>
                        <div class="ps-3">
                        {{-- <h6>{{$jumlah_pinjam_buku}}</h6> --}}
                        <h6>{{ $pendaftaran_sesi_konseling_terverifikasi }}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            <div class="col-xxl-12 col-xl-12">
                <div class="card info-card revenue-card">                
                    <div class="card-body">
                    <h5 class="card-title">Total Pendaftaran Sesi Konseling (Selesai) <span>| Today</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-arrow-90deg-left"></i>
                        </div>
                        <div class="ps-3">
                        {{-- <h6>{{$jumlah_pengembalian_buku}}</h6> --}}
                        <h6>{{ $pendaftaran_sesi_konseling_selesai }}</h6>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
           

            

            <!-- Reports -->

        </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
    </div>
    </section>
@endsection