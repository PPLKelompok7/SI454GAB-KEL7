@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Daftar Pengajuan Surat Izin Sakit</h2>
    @foreach($izin as $item)
    <div class="card shadow-sm rounded mb-3 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
            <p class="mb-1">
                <span class="badge bg-info text-dark">{{ ucfirst($item->status) }}</span>
                | {{ $item->user->name }} | {{ $item->tanggal_mulai }} s/d {{ $item->tanggal_selesai }}
            </p>
            <p class="mb-1">{{ $item->alasan }}</p>
            @if($item->bukti_file)
                <a href="{{ asset('storage/'.$item->bukti_file) }}" target="_blank" class="text-primary">Lihat Bukti</a>
            @endif
        </div>
        @if($item->status == 'pending')
        <div>
            <form action="{{ route('izin.approve', $item->id) }}" method="POST" style="display: inline-block;">
                @csrf
                <button class="btn btn-success btn-sm">Approve</button>
            </form>
            <form action="{{ route('izin.reject', $item->id) }}" method="POST" style="display: inline-block;">
                @csrf
                <button class="btn btn-danger btn-sm">Reject</button>
            </form>
        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection
