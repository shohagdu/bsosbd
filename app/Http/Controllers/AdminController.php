<?php

namespace App\Http\Controllers;

use App\Libraries\Lrvbkash;
use App\Models\Home;
use App\Models\WorkshopRegistration ;
use Illuminate\Http\Request;
use App\Models\Faculty_member;
use DB,PDF;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard(){
        $doctorTitle            =   Home::getDoctorTitle();
        $totalApplicant         = WorkshopRegistration::where(['is_active'=>1,'is_payment_status'=>1])->count();
        $totalFacultyMember     = Faculty_member::where(['is_active'=>1])->count();
        $allApplicant= WorkshopRegistration::where(['is_active'=>1,'is_payment_status'=>1])->orderBy('id','DESC')->limit(10)->get();
        $totalReceivedAmnt= WorkshopRegistration::where(['is_active'=>1,'is_payment_status'=>1])->sum('received_amount');

        $ctgWiseReceived = WorkshopRegistration::selectRaw("
                CASE
                    WHEN package_category = 1 THEN 'Delegate'
                    WHEN package_category = 2 THEN 'Trainee'
                    ELSE 'Other'
                END as package_category_label,
                CASE
                    WHEN attend_days = 1 THEN 'One Day'
                    WHEN attend_days = 2 THEN 'Both Days'
                    WHEN attend_days = 3 THEN 'Both Days (Trainee)'
                    ELSE 'Other'
                END as attend_days_label,
                SUM(received_amount) as total_receive_amount,
                COUNT(id) as totalApplicant
            ")
            ->whereNotNull('package_category')
            ->where('is_payment_status', 1)
            ->where('received_amount', '>', 0)
            ->groupBy('package_category', 'attend_days')
            ->orderBy('package_category', 'ASC')
            ->get();

        $titleWiseReceived = WorkshopRegistration::selectRaw("
                CASE
                    WHEN title = 1 THEN 'Professor'
                    WHEN title = 2 THEN 'Associate Professor'
                    WHEN title = 3 THEN 'Senior Consultant'
                    WHEN title = 4 THEN 'Assistant Professor'
                    WHEN title = 5 THEN 'Junior Consultant'
                    WHEN title = 6 THEN 'Postgraduate Dr.'
                    WHEN title = 7 THEN 'Doctor'
                    ELSE 'Other'
                END as title_label,
                 CASE
                    WHEN attend_days = 1 THEN 'One Day'
                    WHEN attend_days = 2 THEN 'Both Days'
                    WHEN attend_days = 3 THEN 'Both Days (Trainee)'
                    ELSE 'Other'
                END as attend_days_label,
                SUM(received_amount) as total_receive_amount,
                COUNT(id) as totalApplicant
            ")
            ->whereNotNull('title')
            ->where('is_payment_status', 1)
            ->where('received_amount', '>', 0)
            ->groupBy('title', 'attend_days')
            ->orderBy('title', 'ASC')
            ->get();

        $kitDistribute = DB::table('workshop_registration')
            ->select(
                'kit_collect_counter_no',
                DB::raw('COUNT(*) AS total_records'),
                DB::raw('MIN(kit_collect_sl_no) AS start_id'),
                DB::raw('MAX(kit_collect_sl_no) AS end_id')
            )
            ->where('is_payment_status', 1)
            ->groupBy('kit_collect_counter_no')
            ->orderBy('kit_collect_counter_no', 'ASC')
            ->get();

        //  dd($ctgWiseReceived);
        return view('dashboard',compact('totalApplicant','totalFacultyMember','allApplicant','totalReceivedAmnt','ctgWiseReceived','titleWiseReceived','doctorTitle','kitDistribute'));
    }

    public function workshopApplicant(){
        $allApplicant       =   WorkshopRegistration::where(['is_active'=>1,'is_payment_status'=>1])->get();
        $doctorTitle        =   Home::getDoctorTitle();
        return view('admin.applicant',compact('allApplicant','doctorTitle'));
    }
    public function viewApplicant($id){
        $id=decrypt($id)??'';
        if(!empty($id)){
            $applicant =    WorkshopRegistration::where('id',$id)->first();
        }else{
            $applicant =   [];
        }
        $doctorTitle      =   Home::getDoctorTitle();
        return view('admin.applicant.show',compact('applicant','doctorTitle'));
    }

    public function facultyMember(){
        $facultyMember= Faculty_member::whereIn('is_active',[1,2])->get();
        return view('admin.facultyMember',compact('facultyMember'));
    }


    public function addNewFacultyMember(){
        $facultyMemberInfo =   [];
        $country = ['UK','Turkey','Australia','India','China'];

        return view('admin.facultyMember.update',compact('facultyMemberInfo','country'));
    }

    public function updateFacultyMember($id){
        $id=decrypt($id)??'';
        if(!empty($id)){
            $facultyMemberInfo =    Faculty_member::where('id',$id)->first();
        }else{
            $facultyMemberInfo =   [];
        }
        $country = ['UK','Turkey','Australia','India','China'];
        return view('admin.facultyMember.update',compact('facultyMemberInfo','country'));
    }

    public function updatedStoreFacultyMember(Request $request)
    {

        $validatedData = $request->validate([
            'country'       => 'required| string',
            'name'          => 'required|string',
            'institute'     => 'required|string',
            'designation'   => 'required|string',
            'view_order'   => 'required',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('faculty_images', 'public');
        }elseif(!empty($request->hiddenImage)){
            $imagePath= $request->hiddenImage;
        }

        if(empty($request->facultyMemberId)){

            $data = [
                'image'         => $imagePath,
                'country'       => $request->country ?? NULL,
                'name'          => $request->name ?? NULL,
                'degree_info'   => $request->degree ?? NULL,
                'institute'     => $request->institute ?? NULL,
                'designation'   => $request->designation ?? NULL,
                'is_active'     => $request->is_active ?? NULL,
                'view_order'     => $request->view_order ?? NULL,
                'biography'     => $request->biography ?? NULL,
                'created_time' => date('Y-m-d H:i:s'),
                'created_ip'    =>  $request->ip()??NULL,
            ];
          //  dd($data);
            DB::table('faculty_members')->insert($data);
            return redirect('/facultyMember')->with('success', 'Successfully Save Faculty Member information ');

        }else {
            $data = [
                'image'         => $imagePath,
                'country'       => $request->country ?? NULL,
                'name'          => $request->name ?? NULL,
                'degree_info'   => $request->degree ?? NULL,
                'institute'     => $request->institute ?? NULL,
                'designation'   => $request->designation ?? NULL,
                'view_order'     => $request->view_order ?? NULL,
                'biography'     => $request->biography ?? NULL,
                'is_active'     => $request->is_active ?? NULL,
                'updated_time'  => date('Y-m-d H:i:s'),
                'updated_ip'    => $request->ip()??NULL,
            ];

            DB::table('faculty_members')->where('id', $request->facultyMemberId)->update($data);
            return redirect('/facultyMember')->with('success', 'Successfully Update faculty Member Information');
        }

    }


    public function create_bkash_token(Request $request)
    {
        if ($request->ajax() && ($request->method() == 'GET')) {
            $lrvbkash_lib = new Lrvbkash();
            $request_token = $lrvbkash_lib->create_accesstoken();
            Session::put('bkashToken', isset($request_token['id_token'])? $request_token['id_token']:null);
            return isset($request_token['id_token'])? $request_token['id_token']:null;
        }
    }

    public function create_bkash_payment(Request $request)
    {
        if ($request->ajax() && Session::has('bkashToken') && ($request->method() == 'GET')) {
            $token = Session::get('bkashToken');
            $lrvbkash_lib = new Lrvbkash();
            return $lrvbkash_lib->create_payment($token, $request->amount);
        }else{
            return response()->json([
                'success' => true,
                'authorized' => false,
                'message' => 'Only accessible from a web browser.'
            ]);
        }
    }
    public function submittedAbstract(){
        $doctorTitle      =   Home::getDoctorTitle();
        $abstractFile= DB::table('workshop_abstract_record')->whereIn('is_active',[1,2])->get();
        return view('admin.sumittedAbstract',compact('abstractFile','doctorTitle'));
    }
    public function showKitDistributeDetails($countID){
        $doctorTitle        =   Home::getDoctorTitle();

        if ($countID == 'ALL') {
            // If "ALL", don't filter by kit_collect_counter_no
            $allApplicant = DB::table('workshop_registration')
                ->where(['is_active' => 1, 'is_payment_status' => 1])
                ->get();
        } else {
            // If a specific $countID is provided, filter by kit_collect_counter_no
            $allApplicant = DB::table('workshop_registration')
                ->where(['is_active' => 1, 'kit_collect_counter_no' => $countID, 'is_payment_status' => 1])
                ->get();
        }

        return view('admin.showKitDistributeDetails',compact('allApplicant','doctorTitle','countID'));
    }
    public function showKitDistributeDetailsPDF($countID=NULL){
        $doctorTitle        =   Home::getDoctorTitle();
//        $allApplicant       =   DB::table('workshop_registration')->where(['is_active'=>1,'kit_collect_counter_no'=>$countID,'is_payment_status'=>1])->get();
//
        // Check if $countID is "ALL"
        if ($countID == 'ALL') {
            // If "ALL", don't filter by kit_collect_counter_no
            $allApplicant = DB::table('workshop_registration')
                ->where(['is_active' => 1, 'is_payment_status' => 1])
                ->get();
        } else {
            // If a specific $countID is provided, filter by kit_collect_counter_no
            $allApplicant = DB::table('workshop_registration')
                ->where(['is_active' => 1, 'kit_collect_counter_no' => $countID, 'is_payment_status' => 1])
                ->get();
        }


        // Generate the PDF with the appropriate data
        $pdf = PDF::loadView('admin.showKitDistributeDetailsPDF', compact('allApplicant', 'doctorTitle', 'countID'))
            ->setPaper('A4', 'P') // Set paper size and orientation
            ->setOptions([
                'isHtml5ParserEnabled' => true, // Enable HTML5 parser for styling
                'isPhpEnabled' => true, // Enable PHP for page numbers
                'defaultFont' => 'Arial', // Default font for the document
                'margin_top' => 20, // Top margin (in mm)
                'margin_left' => 15, // Left margin (in mm)
                'margin_right' => 15, // Right margin (in mm)
                'margin_bottom' => 20, // Bottom margin (in mm)
                "enable_php"=> true
            ]);

        return $pdf->download('COUNTER-No-'.$countID .'.pdf');
    }


    public function kitDistributionSmsGenerate(){
        $allApplicant       =   DB::table('workshop_registration')->where(['is_active'=>1,'is_payment_status'=>1])->get();

        $dumpSmsHistory=[];
        foreach ($allApplicant as $applicantData) {
            if(!empty($applicantData)) {
                $applicantName  =  (!empty($applicantData->name)?$applicantData->name:'');
                $applicantID    =  (!empty($applicantData->member_id)?$applicantData->member_id:'');
                $kit_collect_counter_no    =  (!empty($applicantData->kit_collect_counter_no)?$applicantData->kit_collect_counter_no:'');
                $kit_collect_sl_no    =  (!empty($applicantData->kit_collect_sl_no)?$applicantData->kit_collect_sl_no:'');

                $msg    =   "Dear, \n". $applicantName.", thank you for participating in BREASTBDCON 2025. Please collecet your registration Kit  at 1st Floor.\nCOUNTER NO # ". $kit_collect_counter_no .
                    ",\nSL NO # ".$kit_collect_sl_no.
                    ",\nID # ".$applicantID.
                    "\nVenue: Shaheed Abu Sayed International Convention Centre, Mintu Road, BSMMU, Dhaka".
                    "\nDate: 23 Feb 2025".
                    "\nProgram Schedule: https://bsosbd.com/scientificSession";
                $smsEmail = [
                    'visitor_id'        => $applicantData->id??NULL,
                    'mobile_number'     => $applicantData->mobile??NULL,
                    'email'             => $applicantData->email??NULL,
                    'msg'               => $msg,
                    'send_sms_status'   => 1,
                    'send_email_status' => 1,
                    'ins_date'          => date('Y-m-d H:i:s'),
                    'ins_by'            => NULL,
                ];
                DB::table('sms_history')->insert($smsEmail);

                $dumpSmsHistory[]=$smsEmail;
            }
       }
        echo "<pre/>";
        print_r($dumpSmsHistory);


    }
    public function compGroupSmsGenerate(){
        $allApplicant       =   DB::table('complementary_registration_group')->where(['is_active'=>1])->limit(1)->get();

        $dumpSmsHistory=[];
        foreach ($allApplicant as $applicantData) {
            if(!empty($applicantData)) {
                $applicantName  =  (!empty($applicantData->name)?$applicantData->name:'');
                $kit_collect_counter_no    =  (!empty($applicantData->kit_collect_counter_no)?$applicantData->kit_collect_counter_no:'');
                $msg    =   "Dear, \n". $applicantName.", thank you for participating in BREASTBDCON 2025. Please collecet your registration Kit  at 1st Floor.\nCOUNTER NO # ". $kit_collect_counter_no .
                    "\nVenue: Shaheed Abu Sayed International Convention Centre, Mintu Road, BSMMU, Dhaka. ".
                    "\nDate: 23 Feb 2025".
                    "\nProgram Schedule: https://bsosbd.com/scientificSession";
                $smsEmail = [
                    'visitor_id'        => $applicantData->id??NULL,
                    'mobile_number'     => $applicantData->mobile??NULL,
                    'email'             => NULL,
                    'msg'               => $msg,
                    'send_sms_status'   => 1,
                    'send_email_status' => 1,
                    'ins_date'          => date('Y-m-d H:i:s'),
                    'ins_by'            => NULL,
                ];
                DB::table('sms_history')->insert($smsEmail);

                $dumpSmsHistory[]=$smsEmail;
            }
       }
        dd($dumpSmsHistory);
    }




    public function oneDaysApplicant(){
        /*


       UPDATE   workshop_registration SET `kit_collect_counter_no`= 2 WHERE  is_payment_status=1 AND is_active=1 AND attend_days in (2,3) ORDER BY id ASC limit 60;

       UPDATE workshop_registration
        SET kit_collect_counter_no = 3
        WHERE id IN (
            SELECT id FROM (
                SELECT id FROM workshop_registration
                WHERE is_payment_status = 1
                AND is_active = 1
                AND attend_days IN (2,3)
                ORDER BY id ASC
                LIMIT 60 OFFSET 60
            ) AS subquery
        );

       UPDATE workshop_registration
SET kit_collect_counter_no = 4
WHERE is_payment_status = 1
AND is_active = 1
AND attend_days IN (2,3)
AND id BETWEEN 954 AND 1233;

        UPDATE workshop_registration
SET kit_collect_counter_no = 5
WHERE is_payment_status = 1
AND is_active = 1
AND attend_days IN (2,3)
AND id BETWEEN 1235 AND 1459;


 UPDATE workshop_registration
SET kit_collect_counter_no = 6
WHERE is_payment_status = 1
AND is_active = 1
AND attend_days IN (2,3)
AND id BETWEEN 1461 AND 1711;

UPDATE   workshop_registration SET `kit_collect_counter_no`=7  WHERE is_payment_status=1 AND is_active=1 AND attend_days =1 ORDER BY id ASC;


SELECT kit_collect_counter_no, COUNT(*),  MIN(id) AS start_id,
    MAX(id) AS end_id FROM `workshop_registration` WHERE is_payment_status=1 GROUP BY kit_collect_counter_no ORDER BY kit_collect_counter_no ASC;


        UPDATE workshop_registration
SET `kit_collect_sl_no` = (@counter := @counter + 1)
WHERE is_payment_status = 1 AND is_active=1
ORDER BY id ASC;






        SELECT * FROM `workshop_registration`
        WHERE is_payment_status = 1
        AND is_active = 1
        AND attend_days = 2
        ORDER BY id ASC
        LIMIT 60 OFFSET 60;



        */
    }

}
