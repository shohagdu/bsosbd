@extends('frontDirectory.layouts.master')
@section('title', 'Contact Us')
@section('main_content')
    <div class="container-fluid py-5">
        <div class="container" style="color: #333;">
            <div class="row gx-5">

                <div class="col-lg-12">
                    <div class="row justify-content-center position-relative" >
                        <div class="col-lg-12">
                            <div class="">
                                <table class="table table-bordered" style="width: 100%;color:#333;">
                                    <tr>
                                        <td colspan="2" style="font-weight: bold;font-size:20px;">Thanks!!  Submit your Abstract.</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Name</th>
                                        <td>   {{$doctorTitle[$registrationInfo->title]??NULL}}    {{$registrationInfo->name??NULL}}</td>
                                    </tr>
                                    <tr>
                                        <th>Institute</th>
                                        <td>{{$registrationInfo->institute??NULL}}</td>
                                    </tr>
                                    <tr>
                                        <th>Degree</th>
                                        <td>{{$registrationInfo->degree??NULL}}</td>
                                    </tr>

                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{$registrationInfo->mobile??NULL}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$registrationInfo->email??NULL}}</td>
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
@endsection



