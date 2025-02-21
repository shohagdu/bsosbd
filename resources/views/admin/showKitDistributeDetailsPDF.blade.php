<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <div style="text-align:center;color: #7030a0;font-size: x-large;"> BREASTBDCON 2025 </div>
                <div align="center" style="font-size: large;font-weight: bold;"> Kit distribution </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td colspan="8" style="border-top: 1px solid #fff;border-left: 1px solid #fff;border-right: 1px solid #fff;">

                            <div style="text-align: center;font-size: 18px;font-weight: bold;margin-bottom: 10px;">
                                Counter No #  {{ $countID??NULL }}
                                @if($countID==7)
                                    (1st Day)
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30px;">S/N</th>
                        @if($countID=='ALL')
                            <th>Counter</th>
                        @endif
                        <th style="width: 80px;">ID</th>
                        <th style="width: 120px;">Title</th>
                        <th >Name</th>
                        <th style="width: 80px;">Mobile</th>
                        <th style="width: 100px;" >Email</th>
                        <th style="width: 200px;">Degree/Institute</th>
                        <th>Package</th>
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
                            <td>{{ $applicant->email??NULL }}</td>
                            <td>{{ $applicant->degree??NULL }} <br/>{{ $applicant->institute??NULL }}</td>
                            <td>{{ !empty($applicant->package_category)?($applicant->package_category==1?'Delegrate':'Trainee'):NULL }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #333;
    }
    th, td {
        padding-left: 3px;
        padding-top: 2px;
        text-align: left;
        font-size: 12px;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
</style>

