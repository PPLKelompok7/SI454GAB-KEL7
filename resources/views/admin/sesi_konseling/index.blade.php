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
        <h5 class="card-title">Data Sesi konseling <span>| Tambahkan Data</span></h5>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
            Tambah Data</button>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Konselor</th>                         
              <th scope="col">hari</th>                         
              <th scope="col">sesi</th>                         
              <th scope="col">status</th>                         
              <th scope="col">Action</th>                         
            </tr>
          </thead>
          <tbody>
            @foreach ($sesi_konseling as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{$value->konselor->user->name}}</td>                                        
                <td>{{ $value->hari }}</td>                
                <td>{{ $value->sesi }}</td>                
                <td>
                  @if ($value->status == "Tersedia")
                    <span class="btn btn-sm btn-success">Tersedia</span>
                  @else
                    <span class="btn btn-sm btn-warning">Terisi</span>
                  @endif
                </td>                

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
          <h5 class="modal-title">Tambah Data Sesi konseling</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm" >
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Konselor
                  </label>
                  <div class="input-group has-validation">
                    <select name="konselor_id" id="konselor_id" required class="form-control">
                      <option selected disabled  style="text-align:center">-- silahkan pilih konselor --</option>
                        @foreach ($konselor as $value)
                            <option value="{{ $value->id }}">{{ $value->user->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>                   
                <div class="col-12">
                  <label for="yourUsername" class="form-label">Sesi</label>
                  <div class="input-group has-validation">
                    <select name="sesi" id="sesi" required class="form-control">
                      <option selected disabled  style="text-align:center">-- silahkan pilih sesi --</option>
                       <option value="08:00-09:00">08:00-09:00</option>
                       <option value="09:00-10:00">09:00-10:00</option>
                       <option value="10:00-11:00">10:00-11:00</option>
                       <option value="13:00-14:00">13:00-14:00</option>
                       <option value="14:00-15:00">14:00-15:00</option>
                    </select>
                  </div>
                </div> 
                <div class="col-12">
                  <label for="yourUsername" class="form-label">hari</label>
                  <div class="input-group has-validation">
                    <select name="hari" id="hari" required class="form-control">
                      <option selected disabled  style="text-align:center">-- silahkan pilih hari --</option>
                       <option value="Senin">Senin</option>
                       <option value="Selasa">Selasa</option>
                       <option value="Rabu">Rabu</option>
                       <option value="Kamis">Kamis</option>
                       <option value="Jumat">Jumat</option>
                    </select>
                  </div>
                </div> 
                <div class="col-12">
                  <label for="yourUsername" class="form-label">status</label>
                  <div class="input-group has-validation">
                    <select name="status" id="status" required class="form-control">
                      <option selected disabled  style="text-align:center">-- silahkan pilih status --</option>
                       <option value="Tersedia">Tersedia</option>
                       <option value="Terisi">Terisi</option>
                    </select>
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
          <h5 class="modal-title">Edit Data Sesi konseling</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editForm" >
            <input type="hidden" id="edit_id">
            <div class="col-12">
              <label for="yourUsername" class="form-label">Konselor
              </label>
              <div class="input-group has-validation">
                <select name="edit_konselor_id" id="edit_konselor_id" required class="form-control">
                  <option selected disabled  style="text-align:center">-- silahkan pilih konselor --</option>
                    @foreach ($konselor as $value)
                        <option value="{{ $value->id }}">{{ $value->user->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>                   
            <div class="col-12">
              <label for="yourUsername" class="form-label">Sesi</label>
              <div class="input-group has-validation">
                <select name="sesi" id="edit_sesi" required class="form-control">
                  <option selected disabled  style="text-align:center">-- silahkan pilih sesi --</option>
                   <option value="08:00-09:00">08:00-09:00</option>
                   <option value="09:00-10:00">09:00-10:00</option>
                   <option value="10:00-11:00">10:00-11:00</option>
                   <option value="13:00-14:00">13:00-14:00</option>
                   <option value="14:00-15:00">14:00-15:00</option>
                </select>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">hari</label>
              <div class="input-group has-validation">
                <select name="hari" id="edit_hari" required class="form-control">
                  <option selected disabled  style="text-align:center">-- silahkan pilih hari --</option>
                   <option value="Senin">Senin</option>
                   <option value="Selasa">Selasa</option>
                   <option value="Rabu">Rabu</option>
                   <option value="Kamis">Kamis</option>
                   <option value="Jumat">Jumat</option>
                </select>
              </div>
            </div> 
            <div class="col-12">
              <label for="yourUsername" class="form-label">status</label>
              <div class="input-group has-validation">
                <select name="status" id="edit_status" required class="form-control">
                  <option selected disabled  style="text-align:center">-- silahkan pilih status --</option>
                   <option value="Tersedia">Tersedia</option>
                   <option value="Terisi">Terisi</option>
                </select>
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
          <h5 class="modal-title">detail Data Sesi konseling</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="detailForm" >
            <input readonly type="hidden" class="form-control" id="detail_id" name="detail_id">
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Nama Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-nama"></span></div>
            </div>

            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Email Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-email"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Gambar Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <img id="detail-gambar" style="width: 250px; height: auto;margin-top:10px;"></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Nip Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-nip"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">No Telepon Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-no_telepon"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Deskripsi Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-deskripsi"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Sesi</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-sesi"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">hari</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-hari"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">status</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-status"></span></div>
            </div>                        
            <div class="modal-footer mt-4">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        $("#createForm").submit(function(event) {
            event.preventDefault();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("konselor_id", $("#konselor_id").val());
            formData.append("sesi", $("#sesi").val());
            formData.append("hari", $("#hari").val());
            formData.append("status", $("#status").val());
            $.ajax({
                url: '{{ url('admin/sesi_konseling/create') }}',
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
                url: '{{ url('admin/sesi_konseling/detail') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#detail_id').val(data.id);
                     $("#detail-nama").html(data.konselor.user.name);                  
                     $("#detail-email").html(data.konselor.user.email);                  
                     $("#detail-gambar").attr('src', '{{ asset('storage') }}' + '/' + data.konselor.gambar);
                     $("#detail-nip").html(data.konselor.nip);                  
                     $("#detail-no_telepon").html(data.konselor.no_telepon);                  
                     $("#detail-deskripsi").html(data.konselor.deskripsi);                  
                     $("#detail-sesi").html(data.sesi);                  
                     $("#detail-hari").html(data.hari);                  
                     $("#detail-status").html(data.status);                  
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
                url: '{{ url('admin/sesi_konseling/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#edit_id').val(data.id);
                     $("#edit_konselor_id").val(data.konselor_id);
                     $("#edit_sesi").val(data.sesi);
                     $("#edit_hari").val(data.hari);
                     $("#edit_status").val(data.status);
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
            formData.append("konselor_id", $("#edit_konselor_id").val());
            formData.append("sesi", $("#edit_sesi").val());            
            formData.append("hari", $("#edit_hari").val());
            formData.append("status", $("#edit_status").val());            

            $.ajax({
                url: '{{ url('admin/sesi_konseling/update') }}/' + id,
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
                    url: '{{ url('admin/sesi_konseling/destroy') }}/' + id,
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