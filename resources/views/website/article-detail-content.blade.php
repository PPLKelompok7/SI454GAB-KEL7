@extends('template.website.index')
@section('content_website')

<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-4 animated slideInDown">{{ $article->judul }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/article') }}">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $article->judul }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Artikel" class="img-fluid rounded" style="max-height: 400px;">
        </div>
        <div class="text-center mb-5">
            <h2>{{ $article->judul }}</h2>
            <p class="text-muted">Oleh: {{ $article->penulis }}</p>
        </div>
        <div class="article-content" style="text-align: justify">
            {!! $article->isi !!}
        </div>

        <div class="mt-4 text-center">
            <a href="{{ url('/article') }}" class="btn btn-primary">← Kembali ke Daftar Artikel</a>
        </div>
    </div>
</div>

@endsection
