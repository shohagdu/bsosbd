@extends('frontDirectory.layouts.master')
@section('title', 'Dashboard')
@section('main_content')

    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-12 text-center " style="margin-top: 250px;">
                    <div class="pt-2" >
                        <a href="registration.php" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Registration</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Home page Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="{{ asset('frontView/img/about.jpg')  }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About Us</h5>
                        <h1 class="display-4">Bangladesh School of Oncoplastic Surgery</h1>
                    </div>
                    <p>No Content is found</p>

                </div>
            </div>
        </div>
    </div>
    <!-- Home Page End -->
@endsection
