@extends('template.admin.index')
@section('content_admin')

<style>
  .badge {
    cursor: pointer;
  }

  .dataTable-input {
    border: 1px solid black;
  }

  @media only screen and (max-width: 520px) {
    .dataTable-dropdown {
      display: none;
    }
  }
</style>

<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body p-4">
      
      <div class="card-header mb-4">
        <h5 class="mb-0">Form Tambah Data Artikel</h5>
      </div>

      <form action="{{ url('/admin/article-add') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="judul" class="form-label">Judul Artikel:</label>
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul artikel" value="{{ old('judul') }}" required>
              @error('judul')
              <p class="text-danger text-xs pt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="penulis" class="form-label">Penulis:</label>
              <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan nama penulis" value="{{ old('penulis') }}" required>
              @error('penulis')
              <p class="text-danger text-xs pt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="gambar" class="form-label">Gambar Artikel (opsional):</label>
          <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
          @error('gambar')
          <p class="text-danger text-xs pt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group mb-4">
          <label for="isi" class="form-label">Isi Artikel:</label>
          <textarea class="form-control" name="isi" id="isi" rows="7" placeholder="Masukkan isi artikel" required>{{ old('isi') }}</textarea>
          @error('isi')
          <p class="text-danger text-xs pt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="card-footer text-end p-0">
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <a href="{{ url('/admin/article') }}" class="btn btn-secondary">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
