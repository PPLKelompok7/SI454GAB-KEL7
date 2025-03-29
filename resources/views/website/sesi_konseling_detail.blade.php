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
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="min-height: 450px;">
                <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Data Konselor</p>
                <h1 class="display-5 mb-4">{{ $sesi_konseling->konselor->user->name }}</h1>
                <p class="mb-4" style="font-weight:semi-bold; text-align:justify;">{!! $sesi_konseling->konselor->deskripsi  !!}</p>
                <div class="border rounded p-4" style="font-weight: bold;">
                    <p class="mb-4"><img style="width: 200px" src="{{ asset('storage/'.$sesi_konseling->konselor->gambar) }}" alt=""></p>
                    <p>Nip : {{ $sesi_konseling->konselor->nip }}</p>
                    <p>email : {{ $sesi_konseling->konselor->user->email }}</p>
                    <p>hari : {{ $sesi_konseling->hari }}</p>
                    <p>sesi : {{ $sesi_konseling->sesi }}</p>
                    <p>Status : <span class="btn btn-sm btn-success">{{ $sesi_konseling->status }}</span> </p>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Sesi Konseling</p>
                <h1 class="display-5 mb-4">Form Sesi Konseling</h1>
                <p class="mb-4" style="font-weight: semi-bold">Silahkan Isi data Berikut Ini</a>.</p>
                <form action="{{ url('sesi_konseling_post') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="hidden" value="{{ $sesi_konseling->id }}" name="sesi_konseling_id"> 
                                {{-- <input required type="text" class="form-control" id="name" readonly value="{{ auth()->user()->name }}" placeholder="Your Name"> --}}
                                <input required type="text" class="form-control" name="name" readonly value="@auth{{ auth()->user()->name }}@endauth" placeholder="Your name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="email" class="form-control" name="email" readonly value="@auth{{ auth()->user()->email }}@endauth" placeholder="Your email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="number" class="form-control" name="nim" placeholder="Your nim">
                                <label for="nim">Your nim</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="text" class="form-control" name="jurusan" placeholder="Your jurusan">
                                <label for="jurusan">Your jurusan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="text" class="form-control" name="fakulitas" placeholder="Your fakulitas">
                                <label for="fakulitas">Your fakulitas</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input required type="number" class="form-control" name="phone" placeholder="Your phone">
                                <label for="phone">Your phone</label>
                            </div>
                        </div>                       
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input required type="date" class="form-control" name="tempat_tanggal_lahir" placeholder="Your tempat tanggal lahir">
                                <label for="tempat tanggal lahir">Your tempat tanggal lahir</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea required class="form-control" placeholder="Your keluhan" name="keluhan" style="height: 100px"></textarea>
                                <label for="message">keluhan</label>
                            </div>
                        </div>
                        <div class="col-12">
                            @auth
                                <button class="btn btn-primary btn-sm fw-semibold" type="submit" style="padding: 10px 20px; font-size: 14px;">Submit</button>

                            @else
                                <span class="btn btn-warning btn-sm fw-semibold" style="padding: 10px 20px; font-size: 14px;">Silahkan Login Terlebih Dahulu</span>

                            @endauth
                        </div>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@endsection