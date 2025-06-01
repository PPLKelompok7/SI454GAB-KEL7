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
        <h5 class="card-title">Data Pendaftaran Sesi Konseling Anda <span>| Data Data</span></h5>
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
                      data-bs-target="#editModal"><i class="bi bi-pencil"></i> Tambahkan Kesimpulan</button>
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
          <h5 class="modal-title">Tambahkan Kesimpulan Data Pendaftaran Konseling</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editstatus" >
            <input readonly type="hidden" class="form-control" id="update_id">
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Nama Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-nama-konselor"></span></div>
            </div>

            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Email Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-email-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Gambar Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <img id="update-gambar-konselor" style="width: 250px; height: auto;margin-top:10px;"></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Nip Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-nip-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">No Telepon Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-no_telepon-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Deskripsi Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-deskripsi-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">hari</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-hari-sesi"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Sesi</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-sesi-detail"></span></div>
            </div>
            <hr>
            <h4>Data Mahasiswa</h4>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Nama Mahasiswa</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-nama-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">NIM</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-nim-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Jurusan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-jurusan-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Fakultas</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-fakulitas-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Tempat Tanggal Lahir</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-ttl-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Phone</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-phone-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Keluhan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-keluhan-mahasiswa"></span></div>
            </div>       
            <div class="row pt-3">
                <div class="col-lg-3 col-md-4 label">Status Konseling</div>
                <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-status-konseling"></span></div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-3 col-md-4 label">Link</div>
                <div class="col-lg-9 col-md-8">: &nbsp; <span id="update-link-konseling"></span></div>
            </div>    
            <div class="col-12 pt-3">
                <label for="update-kesimpulan" class="form-label">Kesimpulan Sesi Ini: &nbsp; </label>
                <div class="input-group has-validation">
                  <textarea id="update-kesimpulan" required class="form-control"  rows="5" ></textarea>
                </div>
            </div>
            <hr class="mt-4">
            <h4>Riwayat Konseling Sebelumnya</h4>
            <div id="update-riwayat-konseling-list" class="mt-3">
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
          <h5 class="modal-title">Detail Data Pendaftaran Konseling</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="detailForm" >
            <input readonly type="hidden" class="form-control" id="detail_id">
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Nama Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-nama-konselor"></span></div>
            </div>

            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Email Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-email-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Gambar Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <img id="detail-gambar-konselor" style="width: 250px; height: auto;margin-top:10px;"></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Nip Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-nip-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">No Telepon Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-no_telepon-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Deskripsi Konselor</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-deskripsi-konselor"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Hari</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-hari-sesi"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Sesi</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-sesi-detail"></span></div>
            </div>
            <hr>
            <h4>Data Mahasiswa</h4>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Nama Mahasiswa</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-nama-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">NIM</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-nim-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Jurusan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-jurusan-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Fakultas</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-fakulitas-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Tempat Tanggal Lahir</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-ttl-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Phone</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-phone-mahasiswa"></span></div>
            </div>
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Keluhan</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-keluhan-mahasiswa"></span></div>
            </div>                   
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Status Konseling</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-status-konseling"></span></div>
            </div>  
            <div class="row pt-3">
              <div class="col-lg-3 col-md-4 label">Link</div>
              <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-link-konseling"></span></div>
            </div>    
            <div class="row pt-3">
                <div class="col-lg-3 col-md-4 label">Kesimpulan Sesi Ini</div>
                <div class="col-lg-9 col-md-8">: &nbsp; <span id="detail-kesimpulan-aktif"></span></div>
            </div>
            <hr class="mt-4">
            <h4>Riwayat Konseling Sebelumnya</h4>
            <div id="detail-riwayat-konseling-list" class="mt-3">
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
                url: '{{ url('konselor/pendaftaran_konseling/detail') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate active counseling session details
                    let pendaftaranAktif = data.pendaftaran_aktif;
                    $('#detail_id').val(pendaftaranAktif.id);
                    $("#detail-nama-konselor").html(pendaftaranAktif.sesi_konseling.konselor.user.name);                  
                    $("#detail-email-konselor").html(pendaftaranAktif.sesi_konseling.konselor.user.email);                  
                    $("#detail-gambar-konselor").attr('src', '{{ asset('storage') }}' + '/' + pendaftaranAktif.sesi_konseling.konselor.gambar);
                    $("#detail-nip-konselor").html(pendaftaranAktif.sesi_konseling.konselor.nip);                  
                    $("#detail-no_telepon-konselor").html(pendaftaranAktif.sesi_konseling.konselor.no_telepon);                  
                    $("#detail-deskripsi-konselor").html(pendaftaranAktif.sesi_konseling.konselor.deskripsi);                  
                    $("#detail-hari-sesi").html(pendaftaranAktif.sesi_konseling.hari);                  
                    $("#detail-sesi-detail").html(pendaftaranAktif.sesi_konseling.sesi);                  

                    $("#detail-nama-mahasiswa").html(pendaftaranAktif.mahasiswa.name);
                    $("#detail-nim-mahasiswa").html(pendaftaranAktif.nim);                  
                    $("#detail-jurusan-mahasiswa").html(pendaftaranAktif.jurusan);                  
                    $("#detail-fakulitas-mahasiswa").html(pendaftaranAktif.fakulitas);                  
                    $("#detail-ttl-mahasiswa").html(pendaftaranAktif.tempat_tanggal_lahir);                  
                    $("#detail-phone-mahasiswa").html(pendaftaranAktif.phone);                  
                    $("#detail-keluhan-mahasiswa").html(pendaftaranAktif.keluhan);     
                    if (pendaftaranAktif.link) {
                        $("#detail-link-konseling").html('<a href="' + pendaftaranAktif.link + '" target="_blank">' + pendaftaranAktif.link + '</a>');
                    } else {
                        $("#detail-link-konseling").html('Belum ada link');
                    }  
                    if (pendaftaranAktif.kesimpulan) {
                        $("#detail-kesimpulan-aktif").html(pendaftaranAktif.kesimpulan);
                    } else {
                        $("#detail-kesimpulan-aktif").html('Belum ada kesimpulan');
                    }              
                     
                    let statusClass = 'btn ';
                    if (pendaftaranAktif.status == 'Menunggu') {
                        statusClass += 'btn-info'; 
                    } else if (pendaftaranAktif.status == 'Terverifikasi') {
                        statusClass += 'btn-warning'; 
                    } else if (pendaftaranAktif.status == 'Selesai') {
                        statusClass += 'btn-success'; 
                    } 
                    $('#detail-status-konseling').html(pendaftaranAktif.status) 
                                      .removeClass() 
                                      .addClass(statusClass);

                    // Populate counseling history
                    let riwayatList = $('#detail-riwayat-konseling-list');
                    riwayatList.empty(); // Clear previous history
                    if (data.riwayat_konseling && data.riwayat_konseling.length > 0) {
                        data.riwayat_konseling.forEach(function(riwayat) {
                            let tglSelesai = '';
                            if (riwayat.updated_at) {
                                try {
                                    tglSelesai = new Date(riwayat.updated_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' });
                                } catch (e) {
                                    tglSelesai = riwayat.updated_at;
                                }
                            } else {
                                tglSelesai = 'Tanggal tidak tersedia';
                            }
                            
                            riwayatList.append('<div class="mb-3 border p-2">');
                            riwayatList.append('<p><strong>Tanggal Selesai:</strong> ' + tglSelesai + '</p>');
                            if (riwayat.sesi_konseling) {
                                riwayatList.append('<p><strong>Sesi:</strong> ' + (riwayat.sesi_konseling.hari || '') + ', ' + (riwayat.sesi_konseling.sesi || '') + '</p>');
                            }
                            riwayatList.append('<p><strong>Keluhan:</strong> ' + (riwayat.keluhan || 'Tidak ada keluhan') + '</p>');
                            riwayatList.append('<p><strong>Kesimpulan:</strong> ' + (riwayat.kesimpulan || 'Belum ada kesimpulan') + '</p>');
                            riwayatList.append('</div>');
                        });
                    } else {
                        riwayatList.append('<p>Tidak ada riwayat konseling sebelumnya.</p>');
                    }
                                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('Gagal memuat detail. Silakan cek konsol.');
                }
            });
        }); 
        $(document).on('click', '.edit-button', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('konselor/pendaftaran_konseling/edit') }}/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate active counseling session details for editing
                    let pendaftaranAktif = data.pendaftaran_aktif;
                    $('#update_id').val(pendaftaranAktif.id);
                    $("#update-nama-konselor").html(pendaftaranAktif.sesi_konseling.konselor.user.name);                  
                    $("#update-email-konselor").html(pendaftaranAktif.sesi_konseling.konselor.user.email);                  
                    $("#update-gambar-konselor").attr('src', '{{ asset('storage') }}' + '/' + pendaftaranAktif.sesi_konseling.konselor.gambar);
                    $("#update-nip-konselor").html(pendaftaranAktif.sesi_konseling.konselor.nip);                  
                    $("#update-no_telepon-konselor").html(pendaftaranAktif.sesi_konseling.konselor.no_telepon);                  
                    $("#update-deskripsi-konselor").html(pendaftaranAktif.sesi_konseling.konselor.deskripsi);                  
                    $("#update-hari-sesi").html(pendaftaranAktif.sesi_konseling.hari);                  
                    $("#update-sesi-detail").html(pendaftaranAktif.sesi_konseling.sesi);                  

                    $("#update-nama-mahasiswa").html(pendaftaranAktif.mahasiswa.name);
                    $("#update-nim-mahasiswa").html(pendaftaranAktif.nim);                  
                    $("#update-jurusan-mahasiswa").html(pendaftaranAktif.jurusan);                  
                    $("#update-fakulitas-mahasiswa").html(pendaftaranAktif.fakulitas);                  
                    $("#update-ttl-mahasiswa").html(pendaftaranAktif.tempat_tanggal_lahir);                  
                    $("#update-phone-mahasiswa").html(pendaftaranAktif.phone);                  
                    $("#update-keluhan-mahasiswa").html(pendaftaranAktif.keluhan);                  
                    if (pendaftaranAktif.link) {
                        $("#update-link-konseling").html('<a href="' + pendaftaranAktif.link + '" target="_blank">' + pendaftaranAktif.link + '</a>');
                    } else {
                        $("#update-link-konseling").html('Belum ada link');
                    }  
                     
                    let statusClass = 'btn ';
                    if (pendaftaranAktif.status == 'Menunggu') {
                        statusClass += 'btn-info'; 
                    } else if (pendaftaranAktif.status == 'Terverifikasi') {
                        statusClass += 'btn-warning'; 
                    } else if (pendaftaranAktif.status == 'Selesai') {
                        statusClass += 'btn-success'; 
                    } 
                    $('#update-status-konseling').html(pendaftaranAktif.status) 
                                      .removeClass() 
                                      .addClass(statusClass);  

                    $("#update-kesimpulan").val(pendaftaranAktif.kesimpulan);  

                    // Populate counseling history
                    let riwayatListEdit = $('#update-riwayat-konseling-list');
                    riwayatListEdit.empty(); // Clear previous history
                    if (data.riwayat_konseling && data.riwayat_konseling.length > 0) {
                        data.riwayat_konseling.forEach(function(riwayat) {
                            let tglSelesai = '';
                            if (riwayat.updated_at) {
                                try {
                                    tglSelesai = new Date(riwayat.updated_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' });
                                } catch (e) {
                                    tglSelesai = riwayat.updated_at;
                                }
                            } else {
                                tglSelesai = 'Tanggal tidak tersedia';
                            }
                            
                            riwayatListEdit.append('<div class="mb-3 border p-2">');
                            riwayatListEdit.append('<p><strong>Tanggal Selesai:</strong> ' + tglSelesai + '</p>');
                            if (riwayat.sesi_konseling) {
                                riwayatListEdit.append('<p><strong>Sesi:</strong> ' + (riwayat.sesi_konseling.hari || '') + ', ' + (riwayat.sesi_konseling.sesi || '') + '</p>');
                            }
                            riwayatListEdit.append('<p><strong>Keluhan:</strong> ' + (riwayat.keluhan || 'Tidak ada keluhan') + '</p>');
                            riwayatListEdit.append('<p><strong>Kesimpulan:</strong> ' + (riwayat.kesimpulan || 'Belum ada kesimpulan') + '</p>');
                            riwayatListEdit.append('</div>');
                        });
                    } else {
                        riwayatListEdit.append('<p>Tidak ada riwayat konseling sebelumnya.</p>');
                    }
                                                                                      
                    },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('Gagal memuat data untuk edit. Silakan cek konsol.');
                }
            });
        });    
        $("#editstatus").submit(function(event) {
            event.preventDefault();
            var id = $('#update_id').val();
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("kesimpulan", $("#update-kesimpulan").val());            

            $.ajax({
                url: '{{ url('konselor/pendaftaran_konseling/update') }}/' + id,
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
        //             url: '{{ url('konselor/pendaftaran_konseling/destroy') }}/' + id,
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