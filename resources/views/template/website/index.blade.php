
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>konseling mahasiswa - Financial Services Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <style>
        *{
            text-transform: capitalize;
        }
    </style>
    <!-- Favicon -->
    <link href="{{ asset('template_website') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template_website') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('template_website') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template_website') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template_website') }}/css/style.css" rel="stylesheet">
</head>

<body>

    @if(session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-danger" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                {{-- <small><i class="fa fa-map-marker-alt text-danger me-2"></i>123 Street, New York, USA</small> --}}
                {{-- <small class="ms-4"><i class="fa fa-clock text-danger me-2"></i>9.00 am - 9.00 pm</small> --}}
            </div>
            <div class="col-lg-6 px-5 text-end">
                {{-- <small><i class="fa fa-envelope text-danger me-2"></i>info@example.com</small> --}}
                {{-- <small class="ms-4"><i class="fa fa-phone-alt text-danger me-2"></i>+012 345 6789</small> --}}
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="display-5 text-danger m-0">konseling mahasiswa</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('/konselor') }}" class="nav-item nav-link {{ Request::is('konselor') ? 'active' : '' }}">Konselor</a>
                    <a href="{{ url('/sesi_konseling') }}" class="nav-item nav-link {{ Request::is('sesi_konseling') ? 'active' : '' }}">sesi konseling</a>


                    @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                        <div class="dropdown-menu border-light m-0">
                            @if (auth()->user()->is_role == "Admin")
                                <a href="{{ url('admin/dashboard') }}" class="dropdown-item">Dashboard</a>    
                            @elseif (auth()->user()->is_role == "Konselor")
                                <a href="{{ url('konselor/dashboard') }}" class="dropdown-item">Dashboard</a>    
                            @elseif (auth()->user()->is_role == "Mahasiswa")
                                <a href="{{ url('mahasiswa/dashboard') }}" class="dropdown-item">Dashboard</a>
                            @endif
                            <a href="{{ url('logout') }}" class="dropdown-item">Logout</a>
                        </div>                            
                    </div>
                    @else

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login</a>
                        <div class="dropdown-menu border-light m-0">
                            <a href="{{ url('login') }}" class="dropdown-item">Login</a>
                            <a href="{{ url('register') }}" class="dropdown-item">Register</a>
                        </div>                            
                    </div>

                        
                    @endauth
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu border-light m-0">
                            <a href="{{ asset('template_website') }}/project.html" class="dropdown-item">Projects</a>
                            <a href="{{ asset('template_website') }}/feature.html" class="dropdown-item">Features</a>
                            <a href="{{ asset('template_website') }}/team.html" class="dropdown-item">Team Member</a>
                            <a href="{{ asset('template_website') }}/testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="{{ asset('template_website') }}/404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> --}}
                    {{-- <a href="{{ asset('template_website') }}/contact.html" class="nav-item nav-link">Contact</a> --}}
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-sm-square rounded-circle ms-3" href="{{url('/')}}">
                        {{-- <small class="fab fa-facebook-f text-danger"></small> --}}
                    </a>
                    <a class="btn btn-sm-square rounded-circle ms-3" href="{{url('/')}}">
                        {{-- <small class="fab fa-twitter text-danger"></small> --}}
                    </a>
                    <a class="btn btn-sm-square rounded-circle ms-3" href="{{url('/')}}">
                        {{-- <small class="fab fa-linkedin-in text-danger"></small> --}}
                    </a>
                </div>
            </div>
        </nav>
    </div>

    @yield('content_website')
      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="{{url('/')}}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="{{url('/')}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="{{url('/')}}"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="{{url('/')}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>                
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    {{-- <a class="btn btn-link" href="{{url('/')}}">About Us</a> --}}
                    <a class="btn btn-link" href="{{url('/')}}">Contact Us</a>
                    <a class="btn btn-link" href="{{url('/')}}">Our Services</a>
                    <a class="btn btn-link" href="{{url('/')}}">Terms & Condition</a>
                    <a class="btn btn-link" href="{{url('/')}}">Support</a>
                </div>                
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">konseling mahasiswa</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="{{ url('/') }}">konseling mahasiswa</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-danger btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template_website') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('template_website') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('template_website') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('template_website') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('template_website') }}/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('template_website') }}/js/main.js"></script>
</body>

</html>