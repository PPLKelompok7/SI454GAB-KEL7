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
</style>

<div class="col-12">
    <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <h5 class="card-title">Data konselor <span>| Tambahkan Data</span></h5>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data</button>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>                         
              <th scope="col">Email</th>                         
              <th scope="col">Gambar</th>                         
              <th scope="col">nip</th>                         
              <th scope="col">Action</th>                         
            </tr>
          </thead>
          <tbody>
            @foreach ($konselor as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{$value->user->name}}</td>                      
                <td>{{$value->user->email}}</td>                      

                <td>
                  <img src="{{ asset('storage/'.$value->gambar) }}" alt="gambar konselor" style="width: 120px">
                </td>    
                <td>{{ $value->nip }}</td>                
                <td>
                  <button class="btn btn-sm btn-primary detail-button"  data-id="{{ $value->id }}" data-bs-toggle="modal"
                    data-bs-target="#detailModal"><i class="bi bi-eye"></i> detail</button>
                    <button class="btn btn-sm btn-info edit-button"  data-id="{{ $value->id }}" data-bs-toggle="modal"
                      data-bs-target="#editModal"><i class="bi bi-pencil"></i> Edit</button>
                    <button class="btn btn-sm btn-danger delete"  data-id="{{ $value->id }}"><i class="bi bi-trash"></i> Hapus</button>

                </td>
            </tr> 
            @endforeach

          </tbody>
        </table>

      </div>

    </div>
  </div>



  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data konselor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" >
                <div class="col-12">
                  <label for="yourUsername" class="form-label">User <span style="font-size: 12px">*(Yang Tampil Hanya Status Konselor, jika masih tidak ada, sudah di inputkan)</span> 
                  </label>
                  <div class="input-group has-validation">
                    <select name="user_id" id="user_id" required class="form-control">
                      <option selected readonly  style="text-align:center">-- silahkan pilih user --</option>
                      @foreach ($user as $value)
                          @if (!\App\Models\Konselor::where('user_id', $value->id)->exists()) <!-- Cek jika user_id belum ada di tabel Konselor -->
                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endif
                      @endforeach                  

                    </select>
                  </div>
                </div>    
                <div class="col-12">
                  <img id="preview"
                  style="width: 250px; height: auto;margin-top:10px;">
                </div>
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Gambar</label>
                  <div class="input-group has-validation">
                    <input type="file" class="form-control" id="gambar" onchange="previewImage()"  required>
                  </div>
                </div>   
                <div class="col-12">
                  <label for="yourUsername" class="form-label">nip</label>
                  <div class="input-group has-validation">
                    <input type="number" class="form-control" id="nip" required>
                  </div>
                </div> 
                <div class="col-12">
                  <label for="yourUsername" class="form-label">no telepon</label>
                  <div class="input-group has-validation">
                    <input type="number" class="form-control" id="no_telepon" required>
                  </div>
                </div> 
                <div class="col-12">
                  <label for="yourUsername" class="form-label">deskripsi</label>
                  <div class="input-group has-validation">
                    <textarea rows="6" class="form-control" id="deskripsi" required></textarea>
                  </div>
                </div> 

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data konselor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm" >
            <input readonly type="hidden" class="form-control" id="edit_id" name="edit_id">
            <div class="col-12">
              <label for="yourUsername" class="form-label">User <span style="font-size: 12px">*(Yang Tampil Hanya Status Konselor, jangan pilih yang sudah ada / sudah di inputkan)</span> 
              </label>
              <div class="input-group has-validation">
                <select name="user_id" id="edit_user_id" required class="form-control">
                  <option selected readonly  style="text-align:center">-- silahkan pilih user --</option>
                  @foreach ($user as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach                             
                </select>
              </div>
            </div>    
            <div class="col-12">
              <img id="preview_edit_gambar"
              style="width: 250px; height: auto;margin-top:10px;">
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label">Gambar</label>
              <div class="input-group has-validation">
                <input type="file" class="form-control" id="edit_gambar" onchange="previewImageEdit()" >
              </div>
            </div>   
            <div class="col-12">
              <label for="yourUsername" class="form-label">nip</label>
              <div class="input-group has-validation">
                <input type="number" class="form-control" id="edit_nip" required>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">no telepon</label>
              <div class="input-group has-validation">
                <input type="number" class="form-control" id="edit_no_telepon" required>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">deskripsi</label>
              <div class="input-group has-validation">
                <textarea rows="6" class="form-control" id="edit_deskripsi" required></textarea>
              </div>
            </div> 

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">detail Data konselor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="detailForm" >
            <input readonly type="hidden" class="form-control" id="detail_id" name="detail_id">
            <div class="col-12">
              <label for="yourUsername" class="form-label">Nama User 
              </label>
              <div class="input-group has-validation">                
                <input readonly  type="text" class="form-control" id="detail_user_nama" required>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">email 
              </label>
              <div class="input-group has-validation">                
                <input readonly  type="text" class="form-control" id="detail_user_email" required>
              </div>
            </div>    
            <div class="col-12">
              <label for="yourUsername" class="form-label">Gambar</label>
              <img id="preview_detail_gambar"
              style="width: 250px; height: auto;margin-top:10px;">
            </div>
            <div class="col-12">
              <label for="yourUsername" class="form-label">nip</label>
              <div class="input-group has-validation">
                <input readonly  type="number" class="form-control" id="detail_nip" required>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">no telepon</label>
              <div class="input-group has-validation">
                <input readonly  type="number" class="form-control" id="detail_no_telepon" required>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">deskripsi</label>
              <div class="input-group has-validation">
                <textarea rows="6" readonly  class="form-control" id="detail_deskripsi" required></textarea>
              </div>
            </div> 

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
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
</script>
@endsection