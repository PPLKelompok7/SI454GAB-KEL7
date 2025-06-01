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
                                    <a href="{{ route('mahasiswa-read-komunitas', ['id_komunitas' => $item->id]) }}">
                                        <h5 class="card-title">{{ $item->nama_komunitas }} | {{ $item->kategori_komunitas }}
                                        </h5>
                                    </a>
                                </div>

                                <p class="card-text">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


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
        $(document).ready(function() {});
    </script>
@endsection