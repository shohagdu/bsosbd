@extends('frontDirectory.layouts.master')
@section('title', 'Contact Us')
@section('main_content')



    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" >
                <h5 class="d-inline-block text-primary  border-bottom border-5">Profile of </h5>
                <h1>{{ $facultyMember->name??NULL }}</h1>
            </div>
            <div class="row g-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        @if(!empty($facultyMember->image) && Storage::disk('public')->exists($facultyMember->image))
                            <img src="{{ asset('storage/app/public/' . $facultyMember->image) }}"  style="height: 350px;width: 100%;">
                        @else
                            <img src="{{ asset('public/frontView/img/default.jpeg') }}" style="height: 350px;width: 100%;">
                        @endif
                        <div class="p-4">
                            <p class="h3 d-block mb-3" >{{ $facultyMember->name??NULL }}</p>
                            <p class="m-0" >{{ $facultyMember->designation??NULL }}</p>
                            <p class="m-0">{{ $facultyMember->degree_info??NULL }}</p>
                            <p class="m-0">{{ $facultyMember->institute??NULL }}</p>                       </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6">
                    <p class="m-0" style="color: #333;">
{{--                        {{ $facultyMember->institute??NULL }}--}}
                        {!! $facultyMember->biography??NULL  !!}
                        adfas
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->



    <div class="container-fluid py-5">
        <div class="container" style="color: #333;">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="row justify-content-center position-relative" >
                        <div class="col-lg-12">
                            <div class="">
                                <table class="table table-bordered" style="width: 100%;color:#333;">
                                    <tr>
                                        <td colspan="2" style="font-weight: bold;font-size:20px;">Please Check Before Payment</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Name</th>
                                        <td>     {{$facultyMember->name??NULL}}</td>
                                    </tr>
                                    <tr>
                                        <th>Institute</th>
                                        <td>{{$facultyMember->institute??NULL}}</td>
                                    </tr>
                                    <tr>
                                        <th>Degree</th>
                                        <td>{{$facultyMember->degree??NULL}}</td>
                                    </tr>

                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{$facultyMember->mobile??NULL}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$facultyMember->email??NULL}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center">
                                            <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #levelFontSize{
            font-size: 20px;
            font-weight: bold;
        }
        #showAmount{
            font-weight: bold;
            font-size: 22px;
            color:red;
        }

    </style>
@endsection



