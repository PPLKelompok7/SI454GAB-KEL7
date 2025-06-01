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
        <h5 class="card-title">Data Pendaftaran Konseling <span>| Tambahkan Data</span></h5>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Mahasiswa</th>                         
              <th scope="col">Nama Konselor</th>                         
              <th scope="col">sesi</th>                         
              <th scope="col">hari</th>                         
              <th scope="col">status</th>                         
              <th scope="col">Action</th>                         
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $value)                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>     
                <td>{{$value->mahasiswa->name}}</td>                                        
                <td>{{$value->sesiKonseling->konselor->user->name}}</td>                                        
                <td>{{ $value->sesiKonseling->hari }}</td>                
                <td>{{ $value->sesiKonseling->sesi }}</td>                
                <td>
                  @if ($value->status == "Menunggu")
                    <span class="btn btn-sm btn-info">Menunggu</span>
                  @elseif ($value->status == "Terverifikasi")
                    <span class="btn btn-sm btn-warning">Terverifikasi</span>
                  @else
                    <span class="btn btn-sm btn-success">Selesai</span>
                  @endif
                </td>                

                <td>
                  <button class="btn btn-sm btn-primary detail-button"  data-id="{{ $value->id }}" data-bs-toggle="modal"
                    data-bs-target="#detailModal"><i class="bi bi-eye"></i> Detail</button>
                    <button class="btn btn-sm btn-info edit-button"  data-id="{{ $value->id }}" data-bs-toggle="modal"
                      data-bs-target="#editModal"><i class="bi bi-pencil"></i> Update Status Dan Link</button>
                    {{-- <button class="btn btn-sm btn-danger delete"  data-id="{{ $value->id }}"><i class="bi bi-trash"></i> Hapus</button> --}}

                </td>
            </tr> 
            @endforeach

          </tbody>
        </table>

      </div>

    </div>
  </div>



  

  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Status Data Pendaftaran Konseling</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editstatus" >
            <input readonly type="hidden" class="form-control" id="update_id">
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Nama Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-nama"></span></div>
            </div>

            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Email Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-email"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Gambar Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <img id="update-gambar" style="width: 250px; height: auto;margin-top:10px;"></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Nip Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-nip"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">No Telepon Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-no_telepon"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Deskripsi Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-deskripsi"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">hari</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-hari"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Sesi</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-sesi"></span></div>
            </div>
            <hr>
            <h4>Data Mahasiswa</h4>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">nim</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-nim"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">jurusan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-jurusan"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">fakulitas</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-fakulitas"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">tempat tanggal lahir</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-tempat_tanggal_lahir"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">phone</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-phone"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">keluhan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-keluhan"></span></div>
            </div>   
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">kesimpulan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-kesimpulan"></span></div>
            </div>      
            <div class="col-12 pt-3">
              <label for="yourUsername" class="form-label">status Konseling : &nbsp; </label>
              <div class="input-group has-validation">
                <select id="update-status" class="form-control">
                  <option disabled style="text-align: center" selected>-- Silahkan Pilih status Konseling --</option>
                  <option value="Menunggu">Menunggu</option>
                  <option value="Terverifikasi">Terverifikasi</option>
                  <option value="Selesai">Selesai</option>
                </select>
              </div>
            </div>
            <div class="col-12 pt-3">
              <label for="yourUsername" class="form-label">link Meet : &nbsp; </label>
              <div class="input-group has-validation">
                <textarea id="update-link" required class="form-control"  rows="2" placeholder="sertakan https:// "></textarea>
              </div>
            </div>                                               
            <div class="modal-footer mt-4">
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
          <h5 class="modal-title">detail Data Pendaftaran Konseling</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="detailForm" >
            <input readonly type="hidden" class="form-control" id="detail_id">
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
              <div class="col-lg-3 col-md-4 label">hari</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-hari"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Sesi</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-sesi"></span></div>
            </div>
            <hr>
            <h4>Data Mahasiswa</h4>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">nim</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-nim"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">jurusan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-jurusan"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">fakulitas</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-fakulitas"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">tempat tanggal lahir</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-tempat_tanggal_lahir"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">phone</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-phone"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">keluhan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-keluhan"></span></div>
            </div>                   
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">status Konseling</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-status"></span></div>
            </div>  
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">link</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-link"></span></div>
            </div> 
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">kesimpulan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-kesimpulan"></span></div>
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
                url: '{{ url('admin/pendaftaran_konseling/create') }}',
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
                url: '{{ url('admin/pendaftaran_konseling/detail') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#detail_id').val(data.id);
                     $("#detail-nama").html(data.sesi_konseling.konselor.user.name);                  
                     $("#detail-email").html(data.sesi_konseling.konselor.user.email);                  
                     $("#detail-gambar").attr('src', '{{ asset('storage') }}' + '/' + data.sesi_konseling.konselor.gambar);
                     $("#detail-nip").html(data.sesi_konseling.konselor.nip);                  
                     $("#detail-no_telepon").html(data.sesi_konseling.konselor.no_telepon);                  
                     $("#detail-deskripsi").html(data.sesi_konseling.konselor.deskripsi);                  
                     $("#detail-hari").html(data.sesi_konseling.hari);                  
                     $("#detail-sesi").html(data.sesi_konseling.sesi);                  

                     $("#detail-nim").html(data.nim);                  
                     $("#detail-jurusan").html(data.jurusan);                  
                     $("#detail-fakulitas").html(data.fakulitas);                  
                     $("#detail-tempat_tanggal_lahir").html(data.tempat_tanggal_lahir);                  
                     $("#detail-phone").html(data.phone);                  
                     $("#detail-keluhan").html(data.keluhan);     
                    if (data.link) {
                        $("#detail-link").html('<a href="' + data.link + '" target="_blank">' + data.link + '</a>');
                    } else {
                        $("#detail-link").html('Belum ada link');
                    }       
                    if (data.kesimpulan) {
                        $("#detail-kesimpulan").html(data.kesimpulan);
                    } else {
                        $("#detail-kesimpulan").html('Belum ada kesimpulan');
                    }       
                     
                    let statusClass = 'btn ';
                    if (data.status == 'Menunggu') {
                        statusClass += 'btn-info'; 
                    } else if (data.status == 'Terverifikasi') {
                        statusClass += 'btn-warning'; 
                    } else if (data.status == 'Selesai') {
                        statusClass += 'btn-success'; 
                    } 
                    $('#detail-status').html(data.status) 
                                      .removeClass() 
                                      .addClass(statusClass);              
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
                url: '{{ url('admin/pendaftaran_konseling/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                     $('#update_id').val(data.id);
                     $("#update-nama").html(data.sesi_konseling.konselor.user.name);                  
                     $("#update-email").html(data.sesi_konseling.konselor.user.email);                  
                     $("#update-gambar").attr('src', '{{ asset('storage') }}' + '/' + data.sesi_konseling.konselor.gambar);
                     $("#update-nip").html(data.sesi_konseling.konselor.nip);                  
                     $("#update-no_telepon").html(data.sesi_konseling.konselor.no_telepon);                  
                     $("#update-deskripsi").html(data.sesi_konseling.konselor.deskripsi);                  
                     $("#update-hari").html(data.sesi_konseling.hari);                  
                     $("#update-sesi").html(data.sesi_konseling.sesi);                  

                     $("#update-nim").html(data.nim);                  
                     $("#update-jurusan").html(data.jurusan);                  
                     $("#update-fakulitas").html(data.fakulitas);                  
                     $("#update-tempat_tanggal_lahir").html(data.tempat_tanggal_lahir);                  
                     $("#update-phone").html(data.phone);                  
                     $("#update-keluhan").html(data.keluhan);   
                     if (data.kesimpulan) {
                        $("#update-kesimpulan").html(data.kesimpulan);
                    } else {
                        $("#update-kesimpulan").html('Belum ada kesimpulan');
                    }                 
                     $("#update-status").val(data.status);                  
                     $("#update-link").val(data.link);                  

                                                    
                                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });    
        $("#editstatus").submit(function(event) {
            event.preventDefault();
            var id = $('#update_id').val();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("status", $("#update-status").val());            
            formData.append("link", $("#update-link").val());            


            $.ajax({
                url: '{{ url('admin/pendaftaran_konseling/update') }}/' + id,
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
        // $(document).on('click', '.delete', function(event) {
        //     event.preventDefault();
        //     var id = $(this).data('id');
        //     if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        //         $.ajax({
        //             url: '{{ url('admin/pendaftaran_konseling/destroy') }}/' + id,
        //             type: 'get',
        //             data: {
        //                 "_token": "{{ csrf_token() }}"
        //             },
        //             success: function(response) {
        //                 alert(response.message);
        //                 location.reload();
        //             },
        //             error: function(xhr) {
        //                 console.log(xhr.responseText);
        //             }
        //         });
        //     }
        // });
    });
</script>
@endsection