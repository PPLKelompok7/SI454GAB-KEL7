@extends('template.admin.index')
@section('content_admin')
<style>
    .badge { cursor: pointer; }    
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
        <div class="card-body">
            <h5 class="card-title">Data Artikel <span>| Tambahkan Data</span></h5>
            <a href="{{ route('article.add') }}" class="btn btn-success">
                Tambah Data
            </a>
            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>                         
                        <th scope="col">Penulis</th>                         
                        <th scope="col">Gambar</th>                         
                        <th scope="col">Action</th>                         
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $article->judul }}</td>
                        <td>{{ $article->penulis }}</td>
                        <td>
                            @if ($article->gambar)
                            <img src="{{ asset('storage/' . $article->gambar) }}" alt="gambar artikel" style="width: 120px">
                            @else
                            Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/article/' . $article->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger delete-button">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>






  {{-- <script>
    function previewImage() {
        var input = document.getElementById('gambar');
        var preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
   
    function previewImageEdit() {
        var input = document.getElementById('edit_gambar');
        var preview = document.getElementById('preview_edit_gambar');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
        }
</script>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        $("#createForm").submit(function(event) {
            event.preventDefault();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("user_id", $("#user_id").val());
            formData.append("nip", $("#nip").val());
            formData.append("no_telepon", $("#no_telepon").val());
            formData.append("deskripsi", $("#deskripsi").val());
            formData.append("gambar", $("#gambar")[0].files[0]);
            $.ajax({
                url: '{{ url('admin/konselor/create') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.detail-button', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('admin/konselor/detail') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#detail_id').val(data.id);
                     $("#detail_user_nama").val(data.user.name);
                     $("#detail_user_email").val(data.user.email);
                     $("#detail_nip").val(data.nip);
                     $("#detail_no_telepon").val(data.no_telepon);
                     $("#detail_deskripsi").val(data.deskripsi);
                     $("#preview_detail_gambar").attr('src', '{{ asset('storage') }}' + '/' + data.gambar);
                    },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }); 
        $(document).on('click', '.edit-button', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('admin/konselor/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#edit_id').val(data.id);
                     $("#edit_user_id").val(data.user_id);
                     $("#edit_nip").val(data.nip);
                     $("#edit_no_telepon").val(data.no_telepon);
                     $("#edit_deskripsi").val(data.deskripsi);
                     $("#preview_edit_gambar").attr('src', '{{ asset('storage') }}' + '/' + data.gambar);
                    },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });    
        $("#editForm").submit(function(event) {
            event.preventDefault();
            var id = $('#edit_id').val();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("user_id", $("#edit_user_id").val());
            formData.append("nip", $("#edit_nip").val());
            formData.append("no_telepon", $("#edit_no_telepon").val());
            formData.append("deskripsi", $("#edit_deskripsi").val());
            var fileInput = document.getElementById('edit_gambar');
                if (fileInput.files.length > 0) {
                    formData.append("gambar", fileInput.files[0]);
                }

            $.ajax({
                url: '{{ url('admin/konselor/update') }}/' + id,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
        $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    url: '{{ url('admin/konselor/destroy') }}/' + id,
                    type: 'get',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach(button => {
      button.addEventListener("click", function () {
        const form = this.closest("form");
        Swal.fire({
          title: 'Yakin ingin menghapus?',
          text: "Data tidak bisa dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#6c757d',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  });
</script>

@endsection