@extends('admin.layouts.master')
@section('main_content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Counter No #  {{ $countID??NULL }}
                        @if($countID==7)
                            (1st Day)
                        @endif
                    </h5>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Degree/Institute</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Package Ctg</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($allApplicant))
                        @foreach($allApplicant as $applicant)
                            <tr>
                                <td>{{ $applicant->kit_collect_sl_no??NULL }}</td>
                                <td>{{ $applicant->member_id??NULL }}</td>
                                <td>{{ $doctorTitle[$applicant->title]??NULL }}</td>
                                <td>{{ $applicant->name??NULL }}</td>
                                <td>{{ $applicant->degree??NULL }} <br/>{{ $applicant->institute??NULL }}</td>
                                <td>{{ $applicant->mobile??NULL }}</td>
                                <td>{{ $applicant->email??NULL }}</td>
                                <td>{{ !empty($applicant->package_category)?($applicant->package_category==1?'Delegrate':'Trainee'):NULL }}</td>



                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
