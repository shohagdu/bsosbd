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
                        <th style="width: 35px;">SL No</th>
                        @if($countID=='ALL')
                            <th>Counter</th>
                        @endif
                        <th style="width: 60px;">ID</th>
                        <th style="width: 110px;text-align: left">Title</th>
                        <th style="width: 150px;text-align: left" >Name</th>
                        <th style="width: 50px;">Mobile</th>
                        <th style="width: 50px;">Package</th>
                        <th style="width: 60px;">Days</th>
                        <th style="width: 150px;text-align: left" >Signature</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($allApplicant))
                        @foreach($allApplicant as $applicant)
                            <tr>
                                <td style="text-align: center">{{ $applicant->kit_collect_sl_no??NULL }}</td>
                                @if($countID=='ALL')
                                    <td style="text-align: center">{{ $applicant->kit_collect_counter_no??NULL }}</td>
                                @endif
                                <td>{{ $applicant->member_id??NULL }}</td>
                                <td>{{ $doctorTitle[$applicant->title]??NULL }}</td>
                                <td>{{ $applicant->name??NULL }}</td>
                                <td>{{ $applicant->mobile??NULL }}</td>
                                <td>{{ !empty($applicant->package_category)?($applicant->package_category==1?'Delegate':'Trainee'):NULL }}</td>
                                <td>{{ !empty($applicant->attend_days)?($applicant->attend_days==1?"1st Day":'Both Days'):NULL }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
