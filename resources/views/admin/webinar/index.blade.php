@extends('template.admin.index')
@section('content_admin')

{{-- Page Title --}}
<div class="pagetitle">
    <h1>Daftar Webinar</h1>
</div>

{{-- Search & Add Button --}}
<section class="section">
    <div class="input-group my-4 gap-4">
        <input type="text" class="form-control rounded" placeholder="Cari Webinar" />
        <button class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Webinar</button>
    </div>

    {{-- Webinar List --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gap-4">
        @foreach ($webinars as $webinar)
            @include('components.webinar-card', $webinar)
        @endforeach
    </div>
</section>

{{-- Modal Tambah Webinar --}}
@include('components.webinar-modal')

@endsection
