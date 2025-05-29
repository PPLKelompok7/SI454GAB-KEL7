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
                    <a href="{{ route('konselor-komunitas') }}" class="btn btn-sm btn-success mt-3"><i
                            class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <div class="d-flex justify-content-between align-items-start">
                        <h5 class="card-title">
                            {{ $page_title }} <span>| {{ $sub_title }}</span>
                        </h5>
                    </div>
                    @if ($komunitas->img_path)
                        <img src="{{ asset('storage/' . $komunitas->img_path) }}" class="img-fluid rounded-start mb-3"
                            alt="Alt {{ $komunitas->nama_komunitas }}" width="300px"><br>
                    @else
                        <span class="text-danger">Belum ada gambar</span>
                    @endif

                    {{ $komunitas->artikel }}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h5>Komentar</h5>
        @if ($komentar)
            @foreach ($komentar as $item)
                <div class="w-full max-w-2xl mx-auto p-4">
                    <div class="bg-white rounded-2xl p-4 mb-4">
                        <div class="flex flex-col space-y-1">
                            <div class="flex justify-between text-sm">
                                <span class="font-semibold">{{ $item->user->name }}</span>
                                <span class="float-end">{{ $item->created_at }}</span>
                            </div>
                            <p class="text-gray-700 mt-2">
                                {{ $item->komentar }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">Belum ada komentar di komunitas ini</p>
        @endif

        <hr>
        <input type="hidden" id="id_komunitas" value="{{ $komunitas->id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-title">
                                Tambahkan Komentar</span>
                            </h5>
                        </div>
                        <textarea name="komentar" id="komentar" cols="30" rows="3" class="form-control mb-2"
                            placeholder="Tuliskan komentar..."></textarea>
                        <button class="btn btn-dark" onclick="storeKomentar()"><i class="fa-solid fa-paper-plane"></i> Kirim
                            Komentar</button>
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
        function storeKomentar() {
            let id_komunitas = $('#id_komunitas').val();
            let komentar = $('#komentar').val();
            $.ajax({
                type: "POST",
                url: "{{ route('konselor-do-komentar') }}",
                data: {
                    id_komunitas: id_komunitas,
                    komentar: komentar
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        Swal.fire({
                            text: 'Berhasil mengirim komentar',
                            icon: 'success',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                }
            });
        }
        $(document).ready(function() {});
    </script>
@endsection
