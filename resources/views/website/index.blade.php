@extends('template.website.index')
@section('content_website')

    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('template_website') }}/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8">
                                    <p class="d-inline-block border border-white rounded text-danger fw-semi-bold py-1 px-3 animated slideInDown">Welcome to konseling mahasiswa</p>
                                    <h1 class="display-3 mb-4 animated slideInDown">Konseling: Untuk Keseimbangan Akademik dan Kehidupan Pribadi</h1>
                                    {{-- <a href="{{url('/')}}" class="btn btn-danger py-3 px-5 animated slideInDown">Explore More</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('template_website') }}/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <p class="d-inline-block border border-white rounded text-danger fw-semi-bold py-1 px-3 animated slideInDown">Welcome to konseling mahasiswa</p>
                                    <h1 class="display-3 mb-4 animated slideInDown">Konseling untuk Menyusun Rencana, <br> Mengatasi Kesulitan, dan Mencapai Sukses</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="{{ asset('template_website') }}/img/about.jpg">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">About Us</p>
                    <h1 class="display-5 mb-4">We Help Our Clients To Grow Their Business</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="border rounded p-4">
                        <nav>
                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                <button class="nav-link fw-semi-bold active" id="nav-story-tab" data-bs-toggle="tab" data-bs-target="#nav-story" type="button" role="tab" aria-controls="nav-story" aria-selected="true">Story</button>
                                <button class="nav-link fw-semi-bold" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" type="button" role="tab" aria-controls="nav-mission" aria-selected="false">Mission</button>
                                <button class="nav-link fw-semi-bold" id="nav-vision-tab" data-bs-toggle="tab" data-bs-target="#nav-vision" type="button" role="tab" aria-controls="nav-vision" aria-selected="false">Vision</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-story" role="tabpanel" aria-labelledby="nav-story-tab">
                                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit</p>
                            </div>
                            <div class="tab-pane fade" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit</p>
                            </div>
                            <div class="tab-pane fade" id="nav-vision" role="tabpanel" aria-labelledby="nav-vision-tab">
                                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-danger">
                                    <i class="fa fa-times text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>No Hidden Cost</h4>
                                    <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                                </div>
                                <div class="border-end d-none d-lg-block"></div>
                            </div>
                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-danger">
                                    <i class="fa fa-users text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>Dedicated Team</h4>
                                    <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                                </div>
                                <div class="border-end d-none d-lg-block"></div>
                            </div>
                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-danger">
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>24/7 Available</h4>
                                    <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-users fa-3x text-danger mb-3"></i>
                    <h1 class="display-4 text-white" data-toggle="counter-up">{{ $total_mahasiswa }}</h1>
                    <span class="fs-5 text-white">Total Mahasiswa</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                <div class="col-sm-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-check fa-3x text-danger mb-3"></i>
                    <h1 class="display-4 text-white" data-toggle="counter-up">{{ $total_konselor }}</h1>
                    <span class="fs-5 text-white">Total Konselor</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                <div class="col-sm-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-award fa-3x text-danger mb-3"></i>
                    <h1 class="display-4 text-white" data-toggle="counter-up">{{ $total_selesai_konseling }}</h1>
                    <span class="fs-5 text-white">Selesai Konseling</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                {{-- <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-award fa-3x text-danger mb-3"></i>
                    <h1 class="display-4 text-white" data-toggle="counter-up">1234</h1>
                    <span class="fs-5 text-white">Awards Achieved</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl feature py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Why Choosing Us!</p>
                    <h1 class="display-5 mb-4">Banyak Alasan Kenapa Harus Kamu Pilih Kami!!</h1>
                    <p class="mb-4">Kami hadir untuk mendukung perjalanan Anda menuju kesehatan mental yang lebih baik, dengan pendekatan yang hangat, profesional, dan aman.</p>
                    {{-- <a class="btn btn-danger py-3 px-5" href="{{url('/')}}">Explore More</a> --}}
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-danger mb-3"></i>
                                        <h4 class="mb-3">Eksekusi Cepat</h4>
                                        <p class="mb-3">Eksekusi yang cepat dalam menangani berbagai masalah.</p>
                                        {{-- <a class="fw-semi-bold" href="{{url('/')}}">Read More <i class="fa fa-arrow-right ms-1"></i></a> --}}
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-danger mb-3"></i>
                                        <h4 class="mb-3">Rahasia Terjamin</h4>
                                        <p class="mb-3">Kami selalu jaga privasi anda dalam segala cerita yang dicurahkan.</p>
                                        {{-- <a class="fw-semi-bold" href="{{url('/')}}">Read More <i class="fa fa-arrow-right ms-1"></i></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="feature-box border rounded p-4">
                                <i class="fa fa-check fa-3x text-danger mb-3"></i>
                                <h4 class="mb-3">Supportif dan Ceria</h4>
                                <p class="mb-3">Dapatkan konselor yang selalu memiliki vibes positif dalam setiap sesi konseling </p>
                                {{-- <a class="fw-semi-bold" href="{{url('/')}}">Read More <i class="fa fa-arrow-right ms-1"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Service Start -->
    {{-- <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Our Services</p>
                <h1 class="display-5 mb-5">Awesome Financial Services For Business</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-danger me-3"></i>Financial Planning</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-danger me-3"></i>Cash Investment</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-danger me-3"></i>Financial Consultancy</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-danger me-3"></i>Business Loans</h5>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="{{ asset('template_website') }}/img/service-1.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">25 Years Of Experience In Financial Support</h3>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet.</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Secured Loans</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Credit Facilities</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Cash Advanced</p>
                                    <a href="{{url('/')}}" class="btn btn-danger py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="{{ asset('template_website') }}/img/service-2.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">25 Years Of Experience In Financial Support</h3>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet.</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Secured Loans</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Credit Facilities</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Cash Advanced</p>
                                    <a href="{{url('/')}}" class="btn btn-danger py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="{{ asset('template_website') }}/img/service-3.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">25 Years Of Experience In Financial Support</h3>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet.</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Secured Loans</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Credit Facilities</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Cash Advanced</p>
                                    <a href="{{url('/')}}" class="btn btn-danger py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="{{ asset('template_website') }}/img/service-4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">25 Years Of Experience In Financial Support</h3>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet.</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Secured Loans</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Credit Facilities</p>
                                    <p><i class="fa fa-check text-danger me-3"></i>Cash Advanced</p>
                                    <a href="{{url('/')}}" class="btn btn-danger py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Service End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Sesi Konseling</p>
                <h1 class="display-5 mb-5">Sesi Konseling!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                @foreach ($sesi_konseling as $value)                    
                    <div class="testimonial-item">
                        <div class="testimonial-text border rounded p-4 pt-5 mb-5" >
                            <div class="btn-square bg-white border rounded-circle">
                                <i class="fa fa-user fa-2x text-danger"></i>
                            </div>
                            <div class="row" style="font-weight: bold">
                                <div class="col-lg-3 col-md-4 label ">Nama</div>
                                <div class="col-lg-9 col-md-8">: &nbsp; {{ $value->konselor->user->name }}</div>
                            </div>
                            <div class="row" style="font-weight: bold">
                                <div class="col-lg-3 col-md-4 label ">hari</div>
                                <div class="col-lg-9 col-md-8">: &nbsp; {{ $value->hari }}</div>
                            </div>
                            <div class="row" style="font-weight: bold">
                                <div class="col-lg-3 col-md-4 label ">sesi</div>
                                <div class="col-lg-9 col-md-8">: &nbsp; {{ $value->sesi }}</div>
                            </div>                           
                        </div>
                        <img class="rounded-circle mb-3" src="{{ asset('storage/'.$value->konselor->gambar) }}" alt="" style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;">
                        <h4>{{ $value->konselor->user->name }}</h4>
                        <span>
                            @if ($value->status == "Terisi")
                                <span class="text-warning fw-bold">Terisi</span>
                            @else
                                <span class="text-success fw-bold">Tersedia</span>   <br>
                                <span class="btn btn-primary mt-2"> <a href="{{ url('sesi_konseling/'.$value->id) }}" style="color: white;" >Ambil Sesi Ini!</a></span>                      
                            @endif
                        </span>
                    </div>
                @endforeach

                
            </div>
        </div>
    </div>


    <!-- Callback Start -->
    {{-- <div class="container-fluid callback my-5 pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Get In Touch</p>
                            <h1 class="display-5 mb-5">Request A Call-Back</h1>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="mail" placeholder="Your Email">
                                    <label for="mail">Your Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="mobile" placeholder="Your Mobile">
                                    <label for="mobile">Your Mobile</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-danger w-100 py-3" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Callback End -->


    <!-- Projects Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Our Projects</p>
                <h1 class="display-5 mb-5">We Have Completed Latest Projects</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('template_website') }}/img/service-1.jpg" alt="">
                        <a href="{{url('/')}}"><i class="fa fa-link fa-3x text-danger"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Financial Planning</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('template_website') }}/img/service-2.jpg" alt="">
                        <a href="{{url('/')}}"><i class="fa fa-link fa-3x text-danger"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Cash Investment</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('template_website') }}/img/service-3.jpg" alt="">
                        <a href="{{url('/')}}"><i class="fa fa-link fa-3x text-danger"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Financial Consultancy</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="{{ asset('template_website') }}/img/service-4.jpg" alt="">
                        <a href="{{url('/')}}"><i class="fa fa-link fa-3x text-danger"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Business Loans</h4>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Projects End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Our Konselor</p>
                <h1 class="display-5 mb-5">Exclusive Konselor</h1>
            </div>
            <div class="row g-4">
                @foreach ($konselor as $value)                    
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid rounded" src="{{ asset('storage/'.$value->gambar) }}" alt="" style="width: 200px; height: 250px; object-fit: cover; border-radius: 50%; margin-left: 25%; margin-right: auto; margin-bottom: 20px; margin-top: 20px; display: flex;">
                        <div class="team-text">
                            <h4 class="mb-0">{{ $value->user->name }}</h4>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1" href="{{url('/')}}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href="{{url('/')}}"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href="{{url('https://www.instagram.com/gesyareihan/')}}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>      
                @endforeach

            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-danger fw-semi-bold py-1 px-3">Testimonial</p>
                <h1 class="display-5 mb-5">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-danger"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="{{ asset('template_website') }}/img/testimonial-1.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-danger"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="{{ asset('template_website') }}/img/testimonial-2.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-danger"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="{{ asset('template_website') }}/img/testimonial-3.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-danger"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="{{ asset('template_website') }}/img/testimonial-4.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->


      
@endsection