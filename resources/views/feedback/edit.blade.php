@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="font-bold text-xl mb-4">Edit Feedback</h2>
    <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="isi_feedback" class="form-label">Isi Feedback</label>
            <textarea name="isi_feedback" id="isi_feedback" class="form-control @error('isi_feedback') is-invalid @enderror" rows="4" required>{{ old('isi_feedback', $feedback->isi_feedback) }}</textarea>
            @error('isi_feedback')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('feedback.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
