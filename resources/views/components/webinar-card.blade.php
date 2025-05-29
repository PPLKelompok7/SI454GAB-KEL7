@props(['webinar', 'konselor', 'isHome' => false])
@include('components.webinar-modal')

@php
    $image = asset('storage/' . $webinar->gambar);
    $fallbackImage = asset('template_webinar/placeholder.webp');
    $title = \Illuminate\Support\Str::limit($webinar->nama, 35, '...');
    $speaker = $konselor->firstWhere('user_id', $webinar->user_id);
    $webinarId = $webinar->id;
@endphp

<div class='card mb-4 shadow-sm rounded p-3 wow fadeInUp'
    style="border: 1px solid #e0e0e0; min-height: 440px; display: flex; flex-direction: column; justify-content: space-between;">
    <div class="mb-3 text-center">
        <img src="{{ $image }}" alt='' onerror="this.src='{{ $fallbackImage }}';"
            style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
    </div>

    <div class="my-4">
        <h5 class="fw-bold mb-1" style="color: #2c3e50;">{{ $title }}</h5>
        <div class="mt-2">
            <p class="mb-0 fw-bold">Pembicara:
                <span class="fw-normal">{{ $speaker?->user->name ?? '-' }}</span>
            </p>
            <p class="mb-0 fw-bold">Tanggal: <span class="fw-normal">{{ $webinar->tanggal }}</span></p>
        </div>
    </div>

    @if ($isHome)
        <div class="d-flex w-100">
            <button class="w-100 btn btn-primary"
                onclick="window.location.href='{{ route('webinar.detail', $webinar->id) }}'">Lihat Detail</button>
        </div>
    @endif

    @if(!$isHome)
        <div class="d-flex w-100 gap-2">
            <button class="w-100 btn btn-secondary" onclick="openEditModal({{ $webinar }})" data-bs-target="#webinarModal"
                data-bs-toggle="modal">Edit</button>
            <button class="w-100 btn btn-danger" onclick="handleDeleteWebinar({{ $webinarId }})">Hapus</button>
        </div>
    @endif

</div>

<script>
    function handleDeleteWebinar(id) {
        if (confirm('Hapus webinar ini?')) {
            fetch(`/admin/webinar/delete/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            }).then(response => {
                if (!response.ok) throw new Error('Gagal menghapus data');
                return response.json();
            }).then(() => {
                alert('Webinar berhasil dihapus');
                window.location.reload();
            }).catch(console.error)
        }
    }
</script>