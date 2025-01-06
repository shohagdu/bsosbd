<?php
    $fullUrl        = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
        . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $lastSegment    = isset($fullUrl)? basename(parse_url($fullUrl, PHP_URL_PATH)):'';
?>
<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ url('/public/logo/logo.jpeg') }}" style="height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ (isset($fullUrl) && $lastSegment=='')?"active":'' }} ">Home</a>
{{--                    <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>--}}

{{--                    <a class="nav-item nav-link {{ (isset($fullUrl) && $lastSegment=='Breastbdcon2024')?"active":'' }}" href="{{ url('/Breastbdcon2024') }}">BREASTBDCON 2025</a>--}}

{{--                    <a class="nav-item nav-link {{ (isset($fullUrl) && $lastSegment=='internationalFaculty')?"active":'' }}" href="{{ url('/internationalFaculty') }}">International Faculty</a>--}}


                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">BREASTBDCON 2025</a>
                       <div class="dropdown-menu m-0">
                          <a href="{{ url('/Breastbdcon2024') }}" class="dropdown-item">About</a>
                           <a href="{{ url('/internationalFaculty') }}" class="dropdown-item">International Faculty</a>
                           <a href="{{ url('/scientificSession') }}" class="dropdown-item">Scientific Session</a>
{{--                           <a href="testimonial.html" class="dropdown-item">Testimonial</a>--}}
{{--                           <a href="appointment.html" class="dropdown-item">Appointment</a>--}}
{{--                           <a href="search.html" class="dropdown-item">Search</a>--}}
                       </div>
                   </div>
                    <a href="{{ url('/registration') }}" class="nav-item nav-link {{ (isset($fullUrl) && $lastSegment=='registration')?"active":'' }}">Registration</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link {{ (isset($fullUrl) && $lastSegment=='contact')?"active":'' }}">Contact</a>

                </div>
            </div>
        </nav>
    </div>
</div>
