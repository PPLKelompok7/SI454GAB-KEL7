@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-bold text-xl mb-4">Daftar Feedback</h2>
    <div class="mb-4">
        <a href="{{ route('feedback.create') }}" class="btn btn-primary">Tambah Feedback</a>
    </div>
    <input type="text" class="form-control mb-4" placeholder="Cari feedback..." id="search-feedback">

    @foreach($feedbacks as $feedback)
    <div class="card shadow-sm rounded mb-3 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
            <p class="font-semibold mb-2">{{ $feedback->isi_feedback }}</p>
            <small class="text-muted">Dikirim: {{ $feedback->created_at->format('d M Y, H:i') }}</small>
        </div>
        <div class="dropdown">
            <button class="btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('feedback.edit', $feedback->id) }}">Ubah Feedback</a>
                </li>
                <li>
                    <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Yakin hapus feedback ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item text-danger" type="submit">Hapus Feedback</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
