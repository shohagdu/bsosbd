@extends('frontDirectory.layouts.master')
@section('title', 'Dashboard')
@section('main_content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">International Faculties</h5>

            </div>
            <div class="row gx-5">
                @if(!empty($UK))
                    <h1 class="d-inline-block  text-uppercase border-bottom border-5 text-center">UK</h1>
                    @foreach($UK as $ukFaculty)
                        <div class="team-item col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100" src="{{ asset('frontView/img/default.jpeg')}}" style="object-fit: cover;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $ukFaculty->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $ukFaculty->designation??NULL }}</h6>
                                        <p class="m-0">{{ $ukFaculty->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $ukFaculty->institute??NULL }}</p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        {{--                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div style="height: 50px;"></div>
                @if(!empty($Turkey))
                    <h1 class="d-inline-block  text-uppercase border-bottom border-5 text-center">Turkey</h1>
                    @foreach($Turkey as $facultyTurkey)
                        <div class="team-item col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100" src="{{ asset('frontView/img/default.jpeg')}}" style="object-fit: cover;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $facultyTurkey->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $facultyTurkey->designation??NULL }}</h6>
                                        <p class="m-0">{{ $facultyTurkey->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $facultyTurkey->institute??NULL }}</p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        {{--                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div style="height: 50px;"></div>
                @if(!empty($Australia))
                    <h1 class="d-inline-block  text-uppercase border-bottom border-5 text-center">Australia</h1>
                    @foreach($Australia as $facultyAustralia)
                        <div class="team-item col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100" src="{{ asset('frontView/img/default.jpeg')}}" style="object-fit: cover;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $facultyAustralia->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $facultyAustralia->designation??NULL }}</h6>
                                        <p class="m-0">{{ $facultyAustralia->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $facultyAustralia->institute??NULL }}</p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        {{--                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div style="height: 50px;"></div>
                @if(!empty($India))
                    <h1 class="d-inline-block  text-uppercase border-bottom border-5 text-center">India</h1>
                    @foreach($India as $facultyIndia)
                        <div class="team-item col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100" src="{{ asset('frontView/img/default.jpeg')}}" style="object-fit: cover;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $facultyIndia->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $facultyIndia->designation??NULL }}</h6>
                                        <p class="m-0">{{ $facultyIndia->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $facultyIndia->institute??NULL }}</p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        {{--                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection


