@extends('template.website.index')
@section('content_website')
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-4 animated slideInDown">Konselor</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Konselor</li>
            </ol>
        </nav>
    </div>
</div>

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
                    <img class="img-fluid rounded" src="{{ asset('storage/'.$value->gambar) }}" alt="" style="width: 200px; height: 250px; object-fit: cover; border-radius: 50%; margin-left: 25%; margin-right: auto; margin-bottom: 20px; margin-top: 20px; display: flex;">>
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
@endsection