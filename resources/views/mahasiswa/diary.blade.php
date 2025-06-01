@extends('template.admin.index')
@section('content_admin')
<style>
    .badge{cursor: pointer;}    
    .dataTable-input{        
        border: 1px solid black;
    }        
    @media only screen and (max-width: 520px) {
        .dataTable-dropdown  {
          display: none;
        }
    }
    
    /* Custom styles for diary page */
    .modal-dialog {
        display: flex;
        align-items: center;
        min-height: calc(100% - 1rem);
    }
    
    .modal-content {
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    
    .diary-content-preview {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
    }
    
    /* Column widths */
    .table-col-number {
        width: 5%;
    }
    
    .table-col-date {
        width: 15%;
    }
    
    .table-col-title {
        width: 50%;
    }
    
    .table-col-actions {
        width: 30%;
    }
    
    /* Form field styling */
    .form-control:focus {
        border-color: #4154f1;
        box-shadow: 0 0 0 0.25rem rgba(65, 84, 241, 0.25);
    }
    
    /* View diary content styling */
    .diary-content {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        border: 1px solid #dee2e6;
        white-space: pre-line;
    }
    
    /* Button group styling */
    .btn-action-group .btn {
        margin-right: 5px;
        margin-bottom: 5px;
    }
</style>

<div class="pagetitle">
    <h1>Diary Anda</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('mahasiswa/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Diary Anda</li>
        </ol>
    </nav>
</div>

<div class="col-12">
    <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <h5 class="card-title">Data Diary Anda <span>| Catatan Pribadi</span></h5>
        
        <!-- Success message -->
        <div id="alert-message" style="display: none;" class="alert alert-success alert-dismissible fade show" role="alert">
            <span id="alert-text"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        <div class="mb-3">
            <button class="btn btn-primary" id="addDiaryBtn" data-bs-toggle="modal" data-bs-target="#addDiaryModal">
                <i class="bi bi-plus"></i> Tambah Diary Baru
            </button>
        </div>
        
        <div class="table-responsive">
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col" class="table-col-number">#</th>
                  <th scope="col" class="table-col-date">Tanggal</th>                         
                  <th scope="col" class="table-col-title">Judul & Isi</th>                         
                  <th scope="col" class="table-col-actions">Aksi</th>                         
                </tr>
              </thead>
              <tbody>
                @foreach ($diaries as $value)                
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>     
                    <td>{{ \Carbon\Carbon::parse($value->entry_date)->format('d M Y') }}</td>                                        
                    <td>
                        <strong>{{ $value->title }}</strong><br>
                        <span class="diary-content-preview">{{ Str::limit($value->content, 100) }}</span>
                    </td>                                        
                    <td>
                      <div class="btn-action-group">
                          <button class="btn btn-sm btn-info view-button" data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#viewDiaryModal">
                            <i class="bi bi-eye"></i> Lihat
                          </button>
                          <button class="btn btn-sm btn-warning edit-button" data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#editDiaryModal">
                            <i class="bi bi-pencil"></i> Edit
                          </button>
                          <button class="btn btn-sm btn-danger delete-button" data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#deleteDiaryModal">
                            <i class="bi bi-trash"></i> Hapus
                          </button>
                      </div>
                    </td>
                </tr> 
                @endforeach
              </tbody>
            </table>
            
            @if($diaries->isEmpty())
            <div class="text-center py-4">
                <p class="text-muted">Anda belum memiliki catatan diary. Silahkan tambahkan diary baru.</p>
            </div>
            @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Add Diary Modal -->
  <div class="modal fade" id="addDiaryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-journal-plus me-2"></i>Tambah Diary Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addDiaryForm">
            @csrf
            <div class="row mb-3">
              <label for="entry_date" class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="entry_date" id="entry_date" value="{{ date('Y-m-d') }}" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="title" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" placeholder="Judul diary Anda" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="content" class="col-sm-2 col-form-label">Isi Diary</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content" rows="8" placeholder="Tuliskan isi diary Anda di sini..." required></textarea>
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-circle me-1"></i>Batal
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- View Diary Modal -->
  <div class="modal fade" id="viewDiaryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-journal-text me-2"></i>Detail Diary</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <p id="view-entry-date" class="form-control-plaintext"></p>
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
              <p id="view-title" class="form-control-plaintext fw-bold"></p>
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Isi Diary</label>
            <div class="col-sm-10">
              <div id="view-content" class="diary-content"></div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="bi bi-x-circle me-1"></i>Tutup
            </button>
            <button type="button" class="btn btn-warning edit-from-view" data-bs-dismiss="modal">
              <i class="bi bi-pencil me-1"></i>Edit
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Diary Modal -->
  <div class="modal fade" id="editDiaryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-journal-check me-2"></i>Edit Diary</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editDiaryForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit-id">
            <div class="row mb-3">
              <label for="edit-entry-date" class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="entry_date" id="edit-entry-date" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="edit-title" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="edit-title" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="edit-content" class="col-sm-2 col-form-label">Isi Diary</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="content" id="edit-content" rows="8" required></textarea>
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-circle me-1"></i>Batal
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>Update
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Diary Modal -->
  <div class="modal fade" id="deleteDiaryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i>Hapus Diary</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="mb-0">Apakah Anda yakin ingin menghapus diary ini?</p>
          <p class="text-danger small">Tindakan ini tidak dapat dibatalkan.</p>
          <input type="hidden" id="delete-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i>Batal
          </button>
          <button type="button" id="confirmDelete" class="btn btn-danger">
            <i class="bi bi-trash me-1"></i>Hapus
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        // Add Diary
        $('#addDiaryForm').on('submit', function(e) {
            e.preventDefault();
            
            let formData = $(this).serialize();
            
            $.ajax({
                url: '{{ route("diary.store") }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#addDiaryModal').modal('hide');
                    $('#alert-text').text(response.message);
                    $('#alert-message').removeClass('alert-danger').addClass('alert-success').show();
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value + '<br>';
                    });
                    
                    $('#alert-text').html(errorMessage);
                    $('#alert-message').removeClass('alert-success').addClass('alert-danger').show();
                }
            });
        });
        
        // Clear form when modal is closed
        $('#addDiaryModal').on('hidden.bs.modal', function() {
            $('#addDiaryForm')[0].reset();
        });
        
        // View Diary
        $('.view-button').on('click', function() {
            let id = $(this).data('id');
            $('#edit-id').val(id); // Store the ID for edit functionality
            
            $.ajax({
                url: '{{ url("mahasiswa/diary") }}/' + id,
                type: 'GET',
                success: function(data) {
                    $('#view-entry-date').text(new Date(data.entry_date).toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }));
                    $('#view-title').text(data.title);
                    $('#view-content').text(data.content);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
        
        // Edit from view button
        $('.edit-from-view').on('click', function() {
            let id = $('#edit-id').val();
            $('#editDiaryModal').modal('show');
            
            $.ajax({
                url: '{{ url("mahasiswa/diary") }}/' + id + '/edit',
                type: 'GET',
                success: function(data) {
                    $('#edit-id').val(data.id);
                    $('#edit-entry-date').val(data.entry_date);
                    $('#edit-title').val(data.title);
                    $('#edit-content').val(data.content);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
        
        // Edit Diary - Fetch data
        $('.edit-button').on('click', function() {
            let id = $(this).data('id');
            
            $.ajax({
                url: '{{ url("mahasiswa/diary") }}/' + id + '/edit',
                type: 'GET',
                success: function(data) {
                    $('#edit-id').val(data.id);
                    $('#edit-entry-date').val(data.entry_date);
                    $('#edit-title').val(data.title);
                    $('#edit-content').val(data.content);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
        
        // Edit Diary - Submit form
        $('#editDiaryForm').on('submit', function(e) {
            e.preventDefault();
            
            let id = $('#edit-id').val();
            let formData = $(this).serialize();
            
            $.ajax({
                url: '{{ url("mahasiswa/diary") }}/' + id,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editDiaryModal').modal('hide');
                    $('#alert-text').text(response.message);
                    $('#alert-message').removeClass('alert-danger').addClass('alert-success').show();
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    $.each(errors, function(key, value) {
                        errorMessage += value + '<br>';
                    });
                    
                    $('#alert-text').html(errorMessage);
                    $('#alert-message').removeClass('alert-success').addClass('alert-danger').show();
                }
            });
        });
        
        // Delete Diary - Show confirmation
        $('.delete-button').on('click', function() {
            let id = $(this).data('id');
            $('#delete-id').val(id);
        });
        
        // Delete Diary - Confirm delete
        $('#confirmDelete').on('click', function() {
            let id = $('#delete-id').val();
            
            $.ajax({
                url: '{{ url("mahasiswa/diary") }}/' + id,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#deleteDiaryModal').modal('hide');
                    $('#alert-text').text(response.message);
                    $('#alert-message').removeClass('alert-danger').addClass('alert-success').show();
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Close alert
        $('.btn-close').on('click', function() {
            $('#alert-message').hide();
        });
    });
  </script>
@endsection