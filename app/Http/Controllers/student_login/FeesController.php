<?php

namespace App\Http\Controllers\student_login;
use App\Models\User;
use App\Models\State;
use App\Models\FeesAssign;
use App\Models\Admission;
use App\Models\Master\Branch;
use App\Models\Master\Homework;
use Illuminate\Validation\Validator; 
use Session;
use Hash;
use Str;
use Redirect;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeesController extends Controller
{

    public function fees(Request $request){
        
        $feesAssign = FeesAssign::where('branch_id',Session::get('branch_id'))->with('FeesGroup')->with('FeesType')->with('Admission')->orderby('id','DESC')->get();
        $studentData = Admission::where('session_id',Session::get('session_id'))
                             ->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
     
        return view('dashboard.student.fees',['data'=>$studentData,'dataview'=>$feesAssign]);
    }
    
}
