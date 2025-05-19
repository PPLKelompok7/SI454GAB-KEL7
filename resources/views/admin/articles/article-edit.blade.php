@extends('template.admin.index')
@section('content_admin')

<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="card-header">
        <h5>Form Edit Artikel</h5>
      </div>

      <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="judul" class="form-label">Judul Artikel:</label>
              <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $article->judul) }}" required>
              @error('judul')
              <p class="text-danger text-xs pt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="penulis" class="form-label">Penulis:</label>
              <input type="text" class="form-control" name="penulis" id="penulis" value="{{ old('penulis', $article->penulis) }}" required>
              @error('penulis')
              <p class="text-danger text-xs pt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>

        <div class="form-group mt-3">
          <label for="gambar" class="form-label">Gambar Artikel:</label><br>
          @if($article->gambar)
            <img src="{{ asset('storage/gambar/' . $article->gambar) }}" alt="Gambar" width="150" class="mb-2">
          @endif
          <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
          @error('gambar')
          <p class="text-danger text-xs pt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group mt-3">
          <label for="isi" class="form-label">Isi Artikel:</label>
          <textarea class="form-control" name="isi" id="isi" rows="18" required>{{ old('isi', $article->isi) }}</textarea>
          @error('isi')
          <p class="text-danger text-xs pt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="card-footer text-end mt-4">
          <button type="submit" class="btn btn-primary me-2">Update</button>
          <a href="{{ url('/admin/article') }}" class="btn btn-secondary">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
