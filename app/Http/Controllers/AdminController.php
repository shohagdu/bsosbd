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
        $totalApplicant = WorkshopRegistration::where(['is_active'=>1])->count();
        $totalFacultyMember  = Faculty_member::where(['is_active'=>1])->count();
        return view('dashboard',compact('totalApplicant','totalFacultyMember'));
    }
    public function updateFacultyMember($id){
        $id=decrypt($id)??'';
        if(!empty($id)){
            $facultyMemberInfo =    Faculty_member::where('id',$id)->first();
        }else{
            $facultyMemberInfo =   [];
        }
//        dd($facultyMemberInfo);
        $country = ['UK','Turkey','Australia','India'];
        return view('admin.facultyMember.update',compact('facultyMemberInfo','country'));
    }

    public function updatedStoreFacultyMember(Request $request)
    {

        $data=[
            'country'         =>  $request->country??NULL,
            'name'     =>  $request->name??NULL,
            'degree_info'          =>  $request->degree??NULL,
            'institute'     =>  $request->institute??NULL,
            'designation'        =>  $request->designation??NULL,
            'is_active'        =>  $request->is_active??NULL,
            'updated_time'    =>date('Y-m-d H:i:s'),
            'updated_ip'    =>'NULL',
        ];
        DB::table('faculty_members')->where('id',$request->facultyMemberId)->update($data);
        return redirect('/facultyMember')->with('success', 'Your Registration Complete Successfully');

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
