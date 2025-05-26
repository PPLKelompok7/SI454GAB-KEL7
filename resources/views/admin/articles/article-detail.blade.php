@extends('template.admin.index')
@section('content_admin')

<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="card-header">
        <h5>Detail Artikel</h5>
      </div>

      <form>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-label">Judul Artikel:</label>
              <input type="text" class="form-control" value="{{ $article->judul }}" readonly>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-label">Penulis:</label>
              <input type="text" class="form-control" value="{{ $article->penulis }}" readonly>
            </div>
          </div>
        </div>

        <div class="form-group mt-3">
          <label class="form-label">Gambar Artikel:</label><br>
          @if($article->gambar)
            <img src="{{ asset('storage/gambar/' . $article->gambar) }}" alt="Gambar" width="150" class="mb-2">
          @else
            <p><em>Tidak ada gambar</em></p>
          @endif
        </div>

        <div class="form-group mt-3">
          <label class="form-label">Isi Artikel:</label>
          <textarea class="form-control" rows="18" readonly style="background-color: #f8f9fa;">{{ $article->isi }}</textarea>
        </div>

        <div class="card-footer text-end mt-4">
          <a href="{{ url('/admin/article') }}" class="btn btn-secondary">Kembali</a>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
