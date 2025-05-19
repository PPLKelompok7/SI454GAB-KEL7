@extends('template.website.index')
@section('content_website')

<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-4 animated slideInDown">Artikel</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Artikel Kami</p>
            <h1 class="display-5 mb-0">List Artikel</h1>
        </div>
        <div class="row g-4">
            @foreach ($articles as $article)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top" alt="Gambar Artikel" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->judul }}</h5>
                            <p class="card-text text-muted">Oleh: {{ $article->penulis }}</p>
                            <a href="{{ url('/article/' . $article->id) }}" class="btn btn-primary btn-md">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
