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
                        <td colspan="7" style="border-top: 1px solid #fff;border-left: 1px solid #fff;border-right: 1px solid #fff;text-align: left;font-size: 15px;font-weight: bold;margin-bottom: 10px;">
                            Counter No #  {{ $countID??NULL }}
                            @if($countID==7)
                                (1st Day)
                            @endif
                        </td>
                        <td colspan="{{ $countID=='ALL'?2:1 }}"  style="border-top: 1px solid #fff;border-left: 1px solid #fff;border-right: 1px solid #fff;font-size: 15px;text-align: right;font-weight: bold">
                            Total: {{ count($allApplicant) }}
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 35px;">SL No</th>
                        @if($countID=='ALL')
                            <th style="width: 60px;">Counter</th>
                        @endif
                        <th style="width: 60px;">ID</th>
                        <th style="width: 110px;text-align: left">Title</th>
                        <th style="width: 150px;text-align: left" >Name</th>
                        <th style="width: 50px;">Mobile</th>
                        <th style="width: 50px;">Package</th>
                        <th style="width: 60px;">Days</th>
                        <th >Signature</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($allApplicant))
                    @foreach($allApplicant as $applicant)
                        <tr>
                            <td style="text-align: center">{{ $applicant->kit_collect_sl_no??NULL }}</td>
                            @if($countID=='ALL')
                                <td style="text-align: center;width: 60px;">{{ $applicant->kit_collect_counter_no??NULL }}</td>
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
    th{
        padding-left: 3px;
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: center;
        font-size: 12px;
    }
   td {
        padding-left: 3px;
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: left;
        font-size: 11px;
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
<script type="text/php">
    if (isset($pdf)) {
        $x = 520;  // Move to the right side (adjust if needed)
        $y = 820;  // Position near the bottom
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
{{--        $font = $pdf->getFontMetrics()->get_font("helvetica", "normal"); // Set font--}}
        $size = 10;  // Adjust font size for readability
        $color = array(0, 0, 0);  // Black color
        $word_space = 0.0;
        $char_space = 0.0;
        $angle = 0.0;

        $pdf->page_text($x, $y, $text, '', $size, $color, $word_space, $char_space, $angle);
    }


</script>
