@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('main_content')
    <div class="row">
        <div class="col-6 col-lg-8 col-xxl-6 d-flex">
            <h1 class="h3 mb-3">Dashboard</h1>
        </div>
        <div class="col-6 col-lg-8 col-xxl-6 pull-right" style="text-align: right">

        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title"> Applicant</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $totalApplicant??'0' }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Faculty</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $totalFacultyMember??'0' }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Latest Applicant</h5>
                </div>

                <table class="table table-hover my-0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Institute</th>
                        <th>Degree</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @if(!empty($allApplicant))
                        @foreach($allApplicant as $applicant)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $applicant->member_id??NULL }}</td>
                                <td>{{ $applicant->title??NULL }}</td>
                                <td>{{ $applicant->name??NULL }}</td>
                                <td>{{ $applicant->institute??NULL }}</td>
                                <td>{{ $applicant->degree??NULL }}</td>
                                <td>{{ $applicant->mobile??NULL }}</td>
                                <td>{{ $applicant->email??NULL }}</td>
                                <td>{{ $applicant->amount??NULL }}</td>
                                <td><a href="{{ url('/viewApplicant/'.encrypt($applicant->id)) }}" class="btn btn-primary btn-sm">View</a>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

{{--                <table class="table table-hover my-0">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Name</th>--}}
{{--                        <th class="d-none d-xl-table-cell">Institute</th>--}}
{{--                        <th class="d-none d-xl-table-cell">Degree</th>--}}
{{--                        <th>Amount</th>--}}
{{--                        <th class="d-none d-md-table-cell">Payment Status</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>Project Apollo</td>--}}
{{--                        <td class="d-none d-xl-table-cell">01/01/2021</td>--}}
{{--                        <td class="d-none d-xl-table-cell">31/06/2021</td>--}}
{{--                        <td><span class="badge bg-success">Done</span></td>--}}
{{--                        <td class="d-none d-md-table-cell">Vanessa Tucker</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
            </div>
        </div>

    </div>
@endsection
