<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Konseling Mahasiswa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <style>
        /* *{
            text-transform: capitalize;
        } */
    </style>
    <!-- Favicons -->
    {{-- <link href="{{asset('template_admin')}}/assets/img/favicon.png" rel="icon"> --}}
    <link rel="shortcut icon" href="{{ asset('template-pinterest') }}/docs/assets/img/logo.png" type="image/x-icon">

    <link href="{{ asset('template_admin') }}/img/favicon.ico" rel="icon">

    <link href="{{ asset('template_admin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template_admin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template_admin') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
* Template Name: Konseling Mahasiswa - v2.4.1
* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
    @yield('css_admin')
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('template_admin') }}/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Konseling Mahasiswa</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            {{-- <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form> --}}
            @include('waktu.index')
        </div>

        
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
      
              <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                  <i class="bi bi-clock"></i>
                </a>
              </li><!-- End Search Icon-->
      
              <li class="nav-item dropdown">
      
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                  <i class="bi bi-bell"></i>
                  <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->
      
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                  <li class="dropdown-header">
                    You have 4 new notifications
                    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="notification-item">
                    <i class="bi bi-exclamation-circle text-warning"></i>
                    <div>
                      <h4>Lorem Ipsum</h4>
                      <p>Quae dolorem earum veritatis oditseno</p>
                      <p>30 min. ago</p>
                    </div>
                  </li>
      
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="notification-item">
                    <i class="bi bi-x-circle text-danger"></i>
                    <div>
                      <h4>Atque rerum nesciunt</h4>
                      <p>Quae dolorem earum veritatis oditseno</p>
                      <p>1 hr. ago</p>
                    </div>
                  </li>
      
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="notification-item">
                    <i class="bi bi-check-circle text-success"></i>
                    <div>
                      <h4>Sit rerum fuga</h4>
                      <p>Quae dolorem earum veritatis oditseno</p>
                      <p>2 hrs. ago</p>
                    </div>
                  </li>
      
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="notification-item">
                    <i class="bi bi-info-circle text-primary"></i>
                    <div>
                      <h4>Dicta reprehenderit</h4>
                      <p>Quae dolorem earum veritatis oditseno</p>
                      <p>4 hrs. ago</p>
                    </div>
                  </li>
      
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="dropdown-footer">
                    <a href="#">Show all notifications</a>
                  </li>
      
                </ul><!-- End Notification Dropdown Items -->
      
              </li><!-- End Notification Nav -->
      
              <li class="nav-item dropdown">
      
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                  <i class="bi bi-chat-left-text"></i>
                  <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->
      
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                  <li class="dropdown-header">
                    You have 3 new messages
                    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="message-item">
                    <a href="#">
                      <img src="{{ asset('template_admin') }}/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                      <div>
                        <h4>Maria Hudson</h4>
                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                        <p>4 hrs. ago</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="message-item">
                    <a href="#">
                      <img src="{{ asset('template_admin') }}/assets/img/messages-2.jpg" alt="" class="rounded-circle">
                      <div>
                        <h4>Anna Nelson</h4>
                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                        <p>6 hrs. ago</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="message-item">
                    <a href="#">
                      <img src="{{ asset('template_admin') }}/assets/img/messages-3.jpg" alt="" class="rounded-circle">
                      <div>
                        <h4>David Muldon</h4>
                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                        <p>8 hrs. ago</p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li class="dropdown-footer">
                    <a href="#">Show all messages</a>
                  </li>
      
                </ul><!-- End Messages Dropdown Items -->
      
              </li><!-- End Messages Nav -->
      
              <li class="nav-item dropdown pe-3">
      
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="{{ asset('template_admin') }}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize">{{ auth()->user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->
      
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                    <h6 class="text-capitalize">{{ auth()->user()->name }}</h6>
                    <span>Web Designer</span>
                  </li>
                  {{-- <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <i class="bi bi-person"></i>
                      <span>My Profile</span>
                    </a>
                  </li> --}}
                  <li>
                    <hr class="dropdown-divider">
                  </li>    
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('/') }}">
                      <i class="bi bi-display"></i>
                      <span>Ke website</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>                                                           
      
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('logout') }}">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                    </a>
                  </li>
      
                </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->
      
            </ul>
          </nav>

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if (auth()->user()->is_role == "Admin")
            <li class="nav-item">
                <a class="nav-link @if (!request()->is('admin/dashboard')) collapsed @endif"
                    href="{{ url('admin/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (!request()->is('admin/pendaftaran_konseling')) collapsed @endif"
                  href="{{ url('admin/pendaftaran_konseling') }}">
                  <i class="bi bi-diagram-3"></i>
                  <span>Pendaftaran Data Konseling</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (!request()->is('admin/sesi_konseling')) collapsed @endif"
                  href="{{ url('admin/sesi_konseling') }}">
                  <i class="ri ri-file-list-2-fill"></i>
                  <span>Sesi Konseling</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (!request()->is('admin/konselor')) collapsed @endif"
                    href="{{ url('admin/konselor') }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Data Konselor</span>
                </a>
            </li>           
            <li class="nav-item">
                <a class="nav-link @if (!request()->is('admin/user')) collapsed @endif"
                    href="{{ url('admin/user') }}">
                    <i class="ri ri-user-3-line"></i>
                    <span>Data User</span>
                </a>
            </li>                     

            <li class="nav-heading">Laporan</li>
            <li class="nav-item">
                <a class="nav-link @if (!request()->is('admin/laporan')) collapsed @endif"
                    href="{{ url('admin/laporan') }}">
                    <i class="bi bi-newspaper"></i>
                    <span>Laporan</span>
                </a>
            </li>
        @elseif (auth()->user()->is_role == "Konselor")      
            <li class="nav-item">
                <a class="nav-link @if (!request()->is('konselor/dashboard')) collapsed @endif"
                    href="{{ url('konselor/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
              <a class="nav-link @if (!request()->is('konselor/sesi_konseling')) collapsed @endif"
                  href="{{ url('konselor/sesi_konseling') }}">
                  <i class="ri ri-file-list-2-fill"></i>
                  <span>Sesi Konseling Anda</span>
              </a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if (!request()->is('konselor/pendaftaran_konseling')) collapsed @endif"
                href="{{ url('konselor/pendaftaran_konseling') }}">
                <i class="bi bi-diagram-3"></i>
                <span>Pendaftaran Sesi Konseling Anda</span>
            </a>
          </li>

        @elseif (auth()->user()->is_role == "Mahasiswa")      
        <li class="nav-item">
          <a class="nav-link @if (!request()->is('mahasiswa/dashboard')) collapsed @endif"
              href="{{ url('mahasiswa/dashboard') }}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (!request()->is('mahasiswa/pendaftaran_konseling')) collapsed @endif"
              href="{{ url('mahasiswa/pendaftaran_konseling') }}">
              <i class="bi bi-diagram-3"></i>
              <span>Pendaftaran Sesi Konseling Anda</span>
          </a>
        </li>
        @endif



    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
    @yield('content_admin')
</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Konseling Mahasiswa</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="{{ url('/') }}">Konseling Mahasiswa</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('template_admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('template_admin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template_admin') }}/assets/vendor/chart.js/chart.min.js"></script>
<script src="{{ asset('template_admin') }}/assets/vendor/echarts/echarts.min.js"></script>
<script src="{{ asset('template_admin') }}/assets/vendor/quill/quill.min.js"></script>
<script src="{{ asset('template_admin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{ asset('template_admin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="{{ asset('template_admin') }}/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('template_admin') }}/assets/js/main.js"></script>

</body>

</html>
