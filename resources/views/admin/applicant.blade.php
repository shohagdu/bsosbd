@extends('admin.layouts.master')
@section('main_content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Workshop Applicant</h5>
                </div>
            <table class="table table-bordered table-striped">
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
        </div>
        </div>
    </div>
@endsection