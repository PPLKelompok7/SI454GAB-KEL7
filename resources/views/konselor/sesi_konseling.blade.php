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
        <h5 class="card-title">Data Sesi konseling Anda <span>| Data Anda</span></h5>
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
                    data-bs-target="#detailModal"><i class="bi bi-eye"></i> Detail</button>
                </td>
            </tr> 
            @endforeach

          </tbody>
        </table>

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
        $(document).on('click', '.detail-button', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ url('konselor/sesi_konseling/detail') }}/' + id,
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
    });
</script>
@endsection