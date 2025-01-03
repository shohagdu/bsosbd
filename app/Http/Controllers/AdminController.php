<?php

namespace App\Http\Controllers;

use App\Libraries\Lrvbkash;
use App\Models\Home;
use App\Models\WorkshopRegistration ;
use Illuminate\Http\Request;
use App\Models\Faculty_member;
use DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard(){
        $totalApplicant         = WorkshopRegistration::where(['is_active'=>1])->count();
        $totalFacultyMember     = Faculty_member::where(['is_active'=>1])->count();
        $allApplicant= WorkshopRegistration::where(['is_active'=>1,'is_payment_status'=>1])->orderBy('id','DESC')->limit(10)->get();
        return view('dashboard',compact('totalApplicant','totalFacultyMember','allApplicant'));
    }

    public function workshopApplicant(){
        $allApplicant= WorkshopRegistration::where(['is_active'=>1,'is_payment_status'=>1])->get();
        return view('admin.applicant',compact('allApplicant'));
    }

    public function facultyMember(){
        $facultyMember= Faculty_member::whereIn('is_active',[1,2])->get();
        return view('admin.facultyMember',compact('facultyMember'));
    }


    public function addNewFacultyMember(){
        $facultyMemberInfo =   [];
        $country = ['UK','Turkey','Australia','India'];

        return view('admin.facultyMember.update',compact('facultyMemberInfo','country'));
    }

    public function updateFacultyMember($id){
        $id=decrypt($id)??'';
        if(!empty($id)){
            $facultyMemberInfo =    Faculty_member::where('id',$id)->first();
        }else{
            $facultyMemberInfo =   [];
        }
        $country = ['UK','Turkey','Australia','India'];
        return view('admin.facultyMember.update',compact('facultyMemberInfo','country'));
    }

    public function updatedStoreFacultyMember(Request $request)
    {

        $validatedData = $request->validate([
            'country'       => 'required| string',
            'name'          => 'required|string',
            'institute'     => 'required|string',
            'designation'   => 'required|string',
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

}
