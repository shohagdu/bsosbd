@extends('admin.layouts.master')
@section('main_content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 ">
{{--            {{ dd($facultyMemberInfo) }}--}}
            <div class="card flex-fill">
                <div class="card-header" >
                    <div class="row">
                        <div class="col-6 col-lg-8 col-xxl-6" >
                            <h5 class="card-title mb-0">Update Faculty Member Information</h5>
                        </div>
                        <div class="col-6 col-lg-4 col-xxl-6" style="text-align: right">
                            <a href="{{ url('/facultyMember') }}" class="btn btn-info btn-sm">Record</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div >
                        <form action="{{ url('updatedStoreFacultyMember') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Country</label>
                                <select class="form-control form-control-lg"   name="country"  >
                                    <option value="">Select One</option>
                                    @if(!empty($country))
                                        @foreach($country as $cont)
                                            <option value="{{$cont}}" {{ $cont==$facultyMemberInfo->country?"selected":'' }}>{{$cont}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input value="{{ $facultyMemberInfo->name??'' }}" class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input class="form-control form-control-lg" value="{{ $facultyMemberInfo->designation??'' }}" type="text" name="designation" placeholder="Enter your company name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Institute</label>
                                <input class="form-control form-control-lg" value="{{ $facultyMemberInfo->institute??'' }}" type="text" name="institute" placeholder="Enter Institute" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Degree Info</label>
                                <input class="form-control form-control-lg" value="{{ $facultyMemberInfo->degree_info??'' }}" type="text" name="degree" placeholder="Enter Degree" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control form-control-lg"  type="file" name="image"  />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control form-control-lg"   name="is_active"  >
                                    <option value="">Select One</option>
                                    <option value="1" {{ $facultyMemberInfo->is_active==1?'selected':'' }}>Active</option>
                                    <option value="2"  {{ $facultyMemberInfo->is_active==2?'selected':'' }}>In-Active</option>
                                </select>
                            </div>

                            <div class=" mt-3">
                                <input type="hidden" name="facultyMemberId" id="facultyMemberId" value="{{ $facultyMemberInfo->id??'' }}">
{{--                                <a href="index.html" class="btn btn-lg btn-primary">Sign up</a>--}}
                                 <button type="submit" class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
