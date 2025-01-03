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
                        <div class=" col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    @if(!empty($ukFaculty->image) && Storage::disk('public')->exists($ukFaculty->image))
                                        <img src="{{ asset('storage/app/public/' . $ukFaculty->image) }}" style="width: 100%;height: 200px;">
                                    @else
                                        <img src="{{ asset('public/frontView/img/default.jpeg') }}" style="width: 100%;height:200px;">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $ukFaculty->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $ukFaculty->designation??NULL }}</h6>
                                        <p class="m-0">{{ $ukFaculty->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $ukFaculty->institute??NULL }}</p>
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
                        <div class=" col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    @if(!empty($facultyTurkey->image) && Storage::disk('public')->exists($facultyTurkey->image))
                                        <img src="{{ asset('storage/app/public/' . $facultyTurkey->image) }}" style="width: 100%;height: 200px;">
                                    @else
                                        <img src="{{ asset('public/frontView/img/default.jpeg') }}" style="width: 100%;height:200px;">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $facultyTurkey->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $facultyTurkey->designation??NULL }}</h6>
                                        <p class="m-0">{{ $facultyTurkey->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $facultyTurkey->institute??NULL }}</p>
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
                        <div class=" col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    @if(!empty($facultyAustralia->image) && Storage::disk('public')->exists($facultyAustralia->image))
                                        <img src="{{ asset('storage/app/public/' . $facultyAustralia->image) }}" style="width: 100%;height: 200px;">
                                    @else
                                        <img src="{{ asset('public/frontView/img/default.jpeg') }}" style="width: 100%;height:200px;">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $facultyAustralia->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $facultyAustralia->designation??NULL }}</h6>
                                        <p class="m-0">{{ $facultyAustralia->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $facultyAustralia->institute??NULL }}</p>
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
                        <div class=" col-lg-6" style="margin-top: 10px;">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">

                                    @if(!empty($facultyAustralia->image) && Storage::disk('public')->exists($facultyAustralia->image))
                                        <img src="{{ asset('storage/app/public/' . $facultyAustralia->image) }}" style="width: 100%;height: 200px;">
                                    @else
                                        <img src="{{ asset('public/frontView/img/default.jpeg') }}" style="width: 100%;height:200px;">
                                    @endif
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>{{ $facultyIndia->name??NULL }}</h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4">{{ $facultyIndia->designation??NULL }}</h6>
                                        <p class="m-0">{{ $facultyIndia->degree_info??NULL }}</p>
                                        <p class="m-0">{{ $facultyIndia->institute??NULL }}</p>
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



