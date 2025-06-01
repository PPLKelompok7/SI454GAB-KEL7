@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-bold text-xl mb-4">Tambah Feedback</h2>
    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="isi_feedback" class="form-label">Isi Feedback</label>
            <textarea name="isi_feedback" id="isi_feedback" class="form-control @error('isi_feedback') is-invalid @enderror" rows="4" required>{{ old('isi_feedback') }}</textarea>
            @error('isi_feedback')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Kirim Feedback</button>
        <a href="{{ route('feedback.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
