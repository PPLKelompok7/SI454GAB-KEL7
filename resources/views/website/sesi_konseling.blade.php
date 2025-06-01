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

        <form method="GET" action="{{ url('sesi_konseling') }}" class="mb-4 text-center">
            <div class="input-group" style="max-width: 600px; margin: 0 auto;">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama konselor, hari, atau sesi..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <div class="row">
            @foreach ($sesi_konseling as $value)                    
                <div class="col-md-4 mb-4">
                    <div class="testimonial-item h-100 border rounded p-4">
                        <div class="text-center mb-3">
                            <img class="rounded-circle mb-2" src="{{ asset('storage/'.$value->konselor->gambar) }}" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                            <h5 class="mt-2">{{ $value->konselor->user->name }}</h5>
                        </div>
                        <div class="row fw-bold mb-1">
                            <div class="col-4">Nama</div>
                            <div class="col-8">: {{ $value->konselor->user->name }}</div>
                        </div>
                        <div class="row fw-bold mb-1">
                            <div class="col-4">Hari</div>
                            <div class="col-8">: {{ $value->hari }}</div>
                        </div>
                        <div class="row fw-bold mb-3">
                            <div class="col-4">Sesi</div>
                            <div class="col-8">: {{ $value->sesi }}</div>
                        </div>
                        <div class="text-center">
                            @if ($value->status == "Terisi")
                                <span class="text-warning fw-bold">Terisi</span>
                            @else
                                <span class="text-success fw-bold">Tersedia</span><br>
                                <a href="{{ url('sesi_konseling/'.$value->id) }}" class="btn btn-primary btn-sm mt-2">Ambil Sesi Ini!</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
