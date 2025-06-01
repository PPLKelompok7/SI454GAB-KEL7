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

                    <a href="{{ route('admin-tambah-komunitas') }}" class="btn btn-sm btn-success">Tambah
                        Komunitas</a>
                </div>
            </div>
        </div>
    </div>

    @foreach ($komunitas as $item)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-komunitas">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $item->img_path) }}" class="img-fluid rounded-start"
                                alt="Alt {{ $item->nama_komunitas }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <a href="{{ route('admin-read-komunitas', ['id_komunitas' => $item->id]) }}">
                                        <h5 class="card-title">{{ $item->nama_komunitas }} | {{ $item->kategori_komunitas }}
                                        </h5>
                                    </a>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-muted p-0 mt-2" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots fs-5"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item text-danger" href="javascript:void(0)"
                                                    onclick="confirmDelete(`{{ $item->id }}`)"> Hapus Komunitas</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('admin-edit-komunitas', ['id_komunitas' => $item->id]) }}">Ubah
                                                    Komunitas</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <p class="card-text">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="modalKomunitas" tabindex="-1" aria-labelledby="modalKomunitasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalKomunitasLabel">Tambah Komunitas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            <label for="Gambar">Gambar</label>
                            <input type="file" name="img" id="img" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="storeKomunitas()">Simpan</button>
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
        function modalKomunitas() {
            $('#modalKomunitas').modal('show');
        }

        function storeKomunitas() {
            var formData = new FormData();
            formData.append('nama_komunitas', $('#nama_komunitas').val());
            formData.append('kategori', $('#kategori').val());
            formData.append('deskripsi', $('#deskripsi').val());
            formData.append('img', $('#img')[0].files[0]);
            formData.append('_token', $('#csrf_token').val());

            // Kirim data melalui AJAX
            $.ajax({
                url: "{{ route('admin-store-komunitas') }}",
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
                            location.reload();
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

        function confirmDelete(id) {
            Swal.fire({
                text: "Apakah anda yakin untuk menghapus komunitas ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin-delete-komunitas') }}",
                        type: 'POST',
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            if (response.status === true) {
                                Swal.fire({
                                    text: response.msg,
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    text: response.msg,
                                    icon: "error"
                                })
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                text: "Terjadi kesalahan. Coba lagi.",
                                icon: "error"
                            })
                        }
                    });
                }
            });
        }

        $(document).ready(function() {});
    </script>
@endsection
