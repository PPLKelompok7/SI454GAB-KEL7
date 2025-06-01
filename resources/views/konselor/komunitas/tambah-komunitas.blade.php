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

        .card-komunitas {
            display: flex;
            height: 250px;
            /* sesuaikan sesuai kebutuhan */
            overflow: hidden;
            /* pastikan apapun yang keluar card ter-hidden */
            position: relative;
        }

        .card-komunitas>.row.g-0 {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        .card-komunitas .col-md-4 {
            height: 100%;
            overflow: hidden;
            flex-shrink: 0;
            /* jangan kecilkan kolom gambar */
            max-width: 33.3333%;
            /* sama dengan col-md-4 */
            position: relative;
        }

        .card-komunitas .col-md-4 img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            display: block;
            position: relative;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="card-title">
                            {{ $page_title }} <span>| {{ $sub_title }}</span>
                        </h5>
                    </div>

                    <a href="{{ route('konselor-komunitas') }}" class="btn btn-sm btn-success"> <i
                            class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Nama Komunitas</label>
                            <input type="text" name="nama_komunitas" id="nama_komunitas" class="form-control"
                                placeholder="Masukkan nama komunitas....">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-control"
                                placeholder="Masukkan kategori">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                placeholder="Masukkan deskripsi...">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Tulisan</label>
                            <textarea name="artikel" id="artikel" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="Gambar">Gambar</label>
                            <input type="file" name="img" id="img" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-sm btn-primary" onclick="storeKomunitas()">Simpan</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function storeKomunitas() {
            var formData = new FormData();
            formData.append('nama_komunitas', $('#nama_komunitas').val());
            formData.append('kategori', $('#kategori').val());
            formData.append('deskripsi', $('#deskripsi').val());
            formData.append('artikel', $('#artikel').val());
            formData.append('img', $('#img')[0].files[0]);

            // Kirim data melalui AJAX
            $.ajax({
                url: "{{ route('konselor-store-komunitas') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        text: response.msg,
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'konselor-komunitas';
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        text: response.msg,
                        icon: 'error',
                    });
                    console.log(xhr.responseText);
                }
            });
        }

        $(document).ready(function() {});
    </script>
@endsection
