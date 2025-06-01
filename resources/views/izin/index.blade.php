@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-bold text-xl mb-4">Riwayat Surat Izin Sakit</h2>
    <div class="mb-4">
        <a href="{{ route('izin.create') }}" class="btn btn-primary">Ajukan Surat Izin Sakit</a>
    </div>
    <input type="text" class="form-control mb-4" placeholder="Cari surat izin..." id="search-izin">

    @foreach($izin as $item)
    <div class="card shadow-sm rounded mb-3 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
            <p class="mb-1">
                <span class="badge bg-info">{{ ucfirst($item->status) }}</span>
                | {{ $item->tanggal_mulai }} s/d {{ $item->tanggal_selesai }}
            </p>
            <p class="mb-1">{{ $item->alasan }}</p>
            @if($item->bukti_file)
                <a href="{{ asset('storage/'.$item->bukti_file) }}" target="_blank" class="text-primary">Lihat Bukti</a>
            @endif
        </div>
        <div class="dropdown">
            <button class="btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </button>
            <ul class="dropdown-menu">
                @if($item->status == 'pending')
                <li>
                    <a class="dropdown-item" href="{{ route('izin.edit', $item->id) }}">Ubah Izin</a>
                </li>
                <li>
                    <form action="{{ route('izin.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus izin ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item text-danger" type="submit">Hapus Izin</button>
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
