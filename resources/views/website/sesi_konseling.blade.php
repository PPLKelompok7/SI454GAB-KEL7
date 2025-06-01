@extends('template.website.index')
@section('content_website')
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-4 animated slideInDown">Sesi Konseling</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sesi Konseling</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Sesi Konseling</p>
            <h1 class="display-5 mb-5">Sesi Konseling!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
            @foreach ($sesi_konseling as $value)                    
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5" >
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-user fa-2x text-danger"></i>
                        </div>
                        <div class="row" style="font-weight: bold">
                            <div class="col-lg-3 col-md-4 label ">Nama</div>
                            <div class="col-lg-9 col-md-8">: &nbsp; {{ $value->konselor->user->name }}</div>
                        </div>
                        <div class="row" style="font-weight: bold">
                            <div class="col-lg-3 col-md-4 label ">hari</div>
                            <div class="col-lg-9 col-md-8">: &nbsp; {{ $value->hari }}</div>
                        </div>
                        <div class="row" style="font-weight: bold">
                            <div class="col-lg-3 col-md-4 label ">sesi</div>
                            <div class="col-lg-9 col-md-8">: &nbsp; {{ $value->sesi }}</div>
                        </div>                           
                    </div>
                    <img class="rounded-circle mb-3" src="{{ asset('storage/'.$value->konselor->gambar) }}" alt="" style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;">
                    <h4>{{ $value->konselor->user->name }}</h4>
                    <span>
                    @if ($value->status == "Terisi")
                        <span class="text-warning fw-bold">Terisi</span>
                    @else
                        <span class="text-success fw-bold">Tersedia</span>   <br>
                        <span class="btn btn-primary mt-2"> <a href="{{ url('sesi_konseling/'.$value->id) }}" style="color: white;" >Ambil Sesi Ini!</a></span>                      
                    @endif
                    </span>
                </div>
            @endforeach

            
        </div>
    </div>
</div>
@endsection