@extends('frontDirectory.layouts.master')
@section('title', 'Dashboard')
@section('main_content')

    <!-- Hero Start -->
    <div class="container-fluid">
        <div class="row">
            <img src="{{ asset('frontView/img/bsos_banner.jpg') }}" class=" w-100 h-100 ">
        </div>
{{--        <div class="container py-5">--}}
{{--            <div class="row justify-content-start">--}}
{{--                <div class="col-lg-12 text-center " style="margin-top: 250px;">--}}
{{--                    <div class="pt-2" >--}}
{{--                        <a href="{{ url('/registration') }}" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Registration</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- Hero End -->


    <!-- Home page Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
{{--                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">--}}
{{--                    <div class="position-relative h-100">--}}
{{--                        <img class="position-absolute w-100 h-100 rounded" src="{{ asset('frontView/img/about.jpg')  }}" style="object-fit: cover;">--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-12">
                    <div class="mb-4">
{{--                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About</h5>--}}
                        <h4 class="display-6">Bangladesh School of Oncoplastic Surgery</h4>
                    </div>
                    <p style="text-align: justify;color:#333;line-height: 30px;">
                        Bangladesh School Of Oncoplastic Surgery is an institute for the education and training of the practicing breast surgeons or emerging breast surgeons of the country. Aim is to produce a bunch of new generation breast surgeons. It is running its activities under the umbrella of Bangladesh Cancer Society since 2019. It runs a course on ‘Advanced Breast Cancer Surgery’ for the period of two years. It covers recent advancements of diagnostic, imaging, molecular biology, surgical procedures including oncoplastic and important non surgical issues. Training includes hands on practice of imaging and oncoplastic procedures. We are in educational collaboration with International School of Oncoplastic Surgery, Pune,India, SENATURK Turkey and Association of Breast Surgery UK. As a part of the learning objectives we arrange international conference on breast cancer. The first conference was held in 2019. The second conference is going to be held in February 23-24, 2025 in the name of BREASTBDCON 2025 as it is the largest forum for the surgeons on breast diseases.. It also includes radiologists and oncologist. Rich faculties from UK, Turkey, India and Australia is joining in this auspicious gathering. At present it is the largest platform for the breast education in Bangladesh. Students has to face subject to subject examination and at the end a summative examination to achieve a certificate. The participants also has to maintain a logbook for their performance on breast cancer patients. Faculties from Surgery, plastic surgery, oncology, pathology, radiology and other related subjects are involved to run the course.
                    </p>
                    <p style="text-align: justify;color:#333;line-height: 30px;">
                        Prof Dr.M Mizanur Rahman Retd. Professor surgical oncology from NICRH also a breast surgeon is the founder chief of this institute and under his thoughtful effort and time the valuable course is maintained. Future direction is to establish  a Breast academy of international standard in the country to deliver services for the country.
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- Home Page End -->
@endsection
