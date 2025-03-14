@extends('frontDirectory.layouts.master')
@section('title', 'Contact Us')
@section('main_content')
    @include('frontDirectory.layouts.event_sub_menu')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Submit Abstract</h5>
                    <h4 class="display-6">BREASTBDCON 2025</h4>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center position-relative" >
                        <div class="col-lg-12">
                            <div class="">
                                @if(session('success'))
                                    <div class="form-group">
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="form-group">
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    </div>
                                @endif
                                <form action="{{url('/saveAbstract')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 col-sm-3">
                                            <label  id="levelFontSize">Title <span class="mandatory_field">(*)</span> </label>
                                            <select id="title"  name="title" required
                                                    class="form-control changeDoctorTitle">
                                                <option value="">Select Title</option>
                                                @foreach($doctorTitle as $key=> $title)
                                                    <option value="{{$key}}">{{$title}}</option>
                                                @endforeach
                                            </select>
                                            @error('title')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-sm-9">
                                            <label id="levelFontSize">Name <span class="mandatory_field">(*)</span></label>
                                            <input id="name" type="text" name="name" required
                                                   placeholder="Enter Name" class="form-control">
                                            @error('name')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label id="levelFontSize">Institute <span class="mandatory_field">(*)</span></label>
                                            <input id="institute" type="text" required name="institute" placeholder="Enter Institute"
                                                   class="form-control">
                                            @error('institute')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">Highest Degree <span class="mandatory_field">(*)</span></label>
                                            <input id="degree" type="text" required name="degree" placeholder="Enter Highest Degree"
                                                   class="form-control">
                                            @error('degree')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">Mobile No  <span class="mandatory_field">(*)</span></label>
                                            <input id="mobile_personal" required type="text" name="mobile" maxlength="15" minlength="11"
                                                   placeholder="Enter Mobile No(Applicant)" class="form-control">
                                            @error('mobile')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">E-mail <span class="mandatory_field">(*)</span></label>
                                            <input id="email" required type="email" name="email" placeholder="Enter Email"
                                                   class="form-control">
                                            @error('email')
                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label id="levelFontSize">Attach Abstract File <span class="mandatory_field">(*)</span> <span style="color:red"> [Only PDF & DOC file allow]</span></label>
                                            <input id="abstractFile" required type="file" name="abstractFile"
                                                   class="form-control">
                                            @error('abstractFile')
                                                <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Submit Now</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #levelFontSize{
            font-weight: bold;
            font-size: 16px;
            color:#333;
        }
    </style>

@endsection


