<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\WorkshopRegistration ;
use Illuminate\Http\Request;
use App\Models\Faculty_member;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontDirectory.index');
    }
    public function about()
    {
        return view('frontDirectory.about');
    }
    public function contact()
    {
        return view('frontDirectory.contact');
    }
    public function registration()
    {
        $doctorTitle      =   Home::getDoctorTitle();
        return view('frontDirectory.registration',compact('doctorTitle'));
    }


    public function Breastbdcon2024()
    {
        $UK             =   Faculty_member::where('country','UK')->get();
        $Turkey         =   Faculty_member::where('country','Turkey')->get();
        $Australia      =   Faculty_member::where('country','Australia')->get();
        $India          =   Faculty_member::where('country','India')->get();
        return view('frontDirectory.Breastbdcon2024',compact('UK','Turkey','Australia','India'));
    }
    public function internationalFaculty()
    {
        $UK             =   Faculty_member::where('country','UK')->get();
        $Turkey         =   Faculty_member::where('country','Turkey')->get();
        $Australia      =   Faculty_member::where('country','Australia')->get();
        $India          =   Faculty_member::where('country','India')->get();
        return view('frontDirectory.internationalFaculty',compact('UK','Turkey','Australia','India'));
    }

    public function registrationSuccess($id)
    {
        $id=decrypt($id);
        if(!empty($id)) {
            $registrationInfo = WorkshopRegistration::where('id', $id)->first();
            return view('frontDirectory.registrationSuccess', compact('registrationInfo'));
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'         => 'required| integer',
            'name'          => 'required|string',
            'institute'     => 'required|string',
            'mobile'     => 'required|string',
            'email'     => 'required|string',
        ]);
        $data=[
            'title'         =>  $request->title??NULL,
            'member_id'     =>  date('ymd').rand(999,10000),
            'name'          =>  $request->name??NULL,
            'institute'     =>  $request->institute??NULL,
            'degree'        =>  $request->degree??NULL,
            'mobile'        =>  $request->mobile??NULL,
            'email'         =>  $request->email??NULL,
            'subs_ctg'      =>  1,
            'attend_days'   =>  $request->presentDays??NULL,
            'amount'        =>  $request->amount??'0.00',
            'is_payment_status' =>0,
            'created_at'    =>date('Y-m-d H:i:s'),
            'created_ip'    =>'NULL',
          ];
        $insertedId = DB::table('workshop_registration')->insertGetId($data);
        return redirect('/registrationSuccess/'.encrypt($insertedId));

    }
    public function workshopApplicant(){
        $allApplicant= WorkshopRegistration::where(['is_active'=>1])->get();
        return view('admin.applicant',compact('allApplicant'));
    }
    public function facultyMember(){
        $facultyMember= Faculty_member::whereIn('is_active',[1,2])->get();
        return view('admin.facultyMember',compact('facultyMember'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
