@extends('template.website.index')
@section('content_website')

    @php
        $image = asset('storage/' . $webinar->gambar);
        $fallbackImage = asset('template_webinar/placeholder.webp');
        $speaker = $konselor->firstWhere('id', $webinar->user_id);
    @endphp

    <div class="container-fluid webinar-page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <p class="fs-4">Webinar</p>
            <h1 class="display-3 mb-4 animated slideInDown text-wrap text-break">{{ $webinar->nama }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Webinar</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row align-items-start gap-4">
                <div class="w-100 w-lg-50 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <img src="{{ $image }}" alt='' onerror="this.src='{{ $fallbackImage }}';" class="img-fluid rounded"
                        style="max-height: 400px; object-fit: cover; width: 100%;">
                </div>
                <div class="w-100 w-lg-50 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <p>{{ $webinar->deskripsi ?? 'Belum ada deskripsi' }}</p>
                    <p><strong>Tanggal:</strong> {{ $webinar->tanggal }}</p>
                    <p><strong>Jam:</strong> {{ $webinar->jam }}</p>
                    <p><strong>Pembicara:</strong> {{ $speaker?->user->name ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection