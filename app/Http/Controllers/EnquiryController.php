<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Validator;
use App\Models\User;
use App\Models\ClassType;
use App\Models\Setting;
use App\Models\FeesMaster;
use App\Models\Enquiry;
use App\Models\Admission;
use App\Models\StudentAction;
use App\Models\Classs;
use App\Models\BillCounter;
use App\Models\SmsSetting;
use App\Models\WhatsappSetting;
use App\Models\Teacher;
use App\Models\State;
use App\Models\Remark;
use App\Models\City;
use App\Models\Sessions;
use App\Models\Master\MessageTemplate;
use App\Models\fees\FeesAssign;
use App\Models\fees\FeesAssignDetail;
use App\Models\Master\SchoolDesk;
use App\Models\Master\MessageType;
use App\Models\Master\Branch;
use Session;
use Hash;
use Helper;
use QrCode;
use Response;
use Str;
use PDF;
use Mail;
use DB;
use Redirect;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller

{
    public function studentsDashboard()
    {

        return view('students/studentsDashboard');
    }
 
    public function qrCode(Request $request){
         
    $BillCounter = BillCounter::where('session_id',Session::get('session_id'))->where('type', 'StudentRegistration')->first();
    
    $BillCounterNo = null; // Initialize BillCounterNo variable

    if(Session::get('role_id') > 1 && !empty($BillCounter)){
        $BillCounter = $BillCounter->where('branch_id',Session::get('branch_id'));
    }
    
    if (!empty($BillCounter)) {
        $counter = !empty($BillCounter->counter) ? $BillCounter->counter : 0;
        $BillCounterNo = $counter + 1;
    }
    
    if ($request->isMethod('post')) {
        $request->validate([
            'first_name' => 'required',
            'mobile' => 'required|digits:10',
            'father_name' => 'required',
        ]);

        // Increment counter
        if (!empty($BillCounter)) {
            $counter = !empty($BillCounter->counter) ? $BillCounter->counter : 0;
            $BillCounter->counter = $counter + 1;
            $BillCounter->save();
        }

        $addqr = new Enquiry;
        $addqr->user_id = Session::get('id');
        $addqr->session_id = Session::get('session_id');
        $addqr->branch_id = Session::get('branch_id');
        $addqr->registration_no = $BillCounterNo; // Use BillCounterNo here
        $addqr->first_name = $request->first_name;
        $addqr->mobile = $request->mobile;
        $addqr->father_name = $request->father_name;
        $addqr->remark_1 = $request->remark_1;
        $addqr->status = 2;
        
        $addqr->save();
        
        return redirect::to('qr_code')->with('message', 'Enquiry Add Successful.');
    }

    return view('students.enquiry.enquiry_qrCode',['BillCounter' => $BillCounterNo]);
}






    public function enquiryAdd(Request $request)
    {
              
        $BillCounter = BillCounter::where('session_id',Session::get('session_id'))->where('type', 'StudentRegistration')->where('branch_id',Session::get('branch_id'))->get()->first();
        
        
       
       
        if ($request->isMethod('post')) {

            $request->validate([
                'first_name' => 'required',
                'gender_id' => 'required',
                'mobile' => 'required|digits:10',
                'father_name' => 'required',
                'mother_name' => 'required',
            ]);

            $counter = !empty($BillCounter->counter) ? $BillCounter->counter : 0;
            $BillCounter->counter = $counter + 1;
            $BillCounter->save();

            $addstudents = new Enquiry; //model name
            $addstudents->user_id = Session::get('id');
            $addstudents->session_id = Session::get('session_id');
            $addstudents->branch_id = Session::get('branch_id');
            $addstudents->registration_no = $request->registration_no;
            $addstudents->first_name = $request->first_name;
            $addstudents->last_name = $request->last_name;
            $addstudents->id_proof = $request->id_proof;
            $addstudents->id_number = $request->id_number;
            $addstudents->email  = $request->email;
            $addstudents->mobile  = $request->mobile;
            $addstudents->class_type_id = $request->class_type_id;
            $addstudents->father_name = $request->father_name;
            $addstudents->mother_name = $request->mother_name;
            $addstudents->father_mobile = $request->father_mobile;
            $addstudents->dob = $request->dob;
            $addstudents->gender_id = $request->gender_id;
            $addstudents->registration_date = date('Y-m-d');
            $addstudents->address = $request->address;
            $addstudents->remark_1 = $request->remark_1;
            $addstudents->save();
            
            
                           
            $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
                            ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                           ->where('message_types.status',1)->where('message_types.slug','student-registration')->first();
                           
            $branch = Branch::find(Session::get('branch_id'));
            $setting = Setting::where('branch_id',Session::get('branch_id'))->first();
            
            
            $arrey1 =   array(
                            '{#name#}',
                            '{#school_name#}',
                            '{#email#}',
                            '{#mobile#}');
                           
            $arrey2 = array(
                            $request->first_name." ".$request->last_name,
                            $setting->name,
                            $request->email,
                            $request->mobile);
            
            if($template->status != 1){
                            if($request->email != ""){
                                if($branch->email_srvc != 0){
                                    if($template->email_status != 0){
                                        $message = str_replace($arrey1,$arrey2,$template->email_content);
                                        $emailData = ['email' => $request->email, 'data' => $message, 'subject' => $template->title];
                                        Helper::sendMail('email_print.template_print', $emailData);
                                    } 
                                } 
                            }
                        
                            if($branch->whatsapp_srvc != 0){
                                if ($request->mobile != ""){
                                    if($template->whatsapp_status != 0){
                                        $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
                                        Helper::sendWhatsappMessage($request->mobile,$whatsapp);
                                    }
                                }
                            }
                            
                            if($branch->sms_srvc != 0){
                                if($request->mobile != ""){
                                    if($template->sms_status != 0){
                                        $sms = str_replace($arrey1,$arrey2,$template->sms_content);
                                        Helper::SendMessage($request->mobile, $sms);
                                    }
                                }
                            }    
                    }

            return redirect::to('enquiryView')->with('message', 'Enquiry Add Successful.');
        }

        return view('students.enquiry.add', ['BillCounter' => $BillCounter]);
    }

    public function enquiryView(Request $request)
    {

        $search['enquiry_status'] = $request->enquiry_status;
        $search['state_id'] = $request->state_id;
        $search['city_id'] = $request->city_id;
        $search['class_type_id'] = $request->class_type_id;
        $search['name'] = $request->name;
        $search['reminder_date'] = $request->reminder_date;

        $data =  Enquiry::Select('enquirys.*', 'class_types.name as class_name')
            ->leftjoin('class_types', 'class_types.id', 'enquirys.class_type_id');
            
        if (Session::get('role_id') > 1) {
            $data = $data->where('enquirys.branch_id', Session::get('branch_id'));
        }
        if (!empty(Session::get('admin_branch_id'))) {
               $data = $data->where('enquirys.branch_id', Session::get('admin_branch_id'));
            }
     
        if ($request->isMethod('post')) {
            $request->validate([]);
            if (!empty($request->name)) {
                $value = $request->name;
                $allstudents = $data = $data->where(function ($query) use ($value) {
                    $query->where('enquirys.first_name', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.last_name', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.registration_no', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.mobile', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.id_number', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.email', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.father_name', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.mother_name', 'like', '%' . $value . '%');
                    $query->orWhere('enquirys.address', 'like', '%' . $value . '%');
                });
            }
            if (!empty($request->state_id)) {
                $data = $data->where("enquirys.state_id", $request->state_id);
            }
            if (!empty($request->city_id)) {
                $data = $data->where("enquirys.city_id", $request->city_id);
            }
            if (!empty($request->enquiry_status)) {
                $data = $data->where("enquirys.enquiry_status", $request->enquiry_status);
            }
            if (!empty($request->reminder_date)) {
                $data = $data->whereDate("enquirys.reminder_date", $request->reminder_date);
            }
            if (!empty($request->class_type_id)) {
                $data = $data->where("enquirys.class_type_id", $request->class_type_id);
            }
        }

        $allstudents = $data->orderBy('id', 'DESC')->get();
        if($request->pdf == "pdf"){
            $allstudents = $data->orderBy('id', 'DESC')->get();
              $pdf = PDF::loadView('print_file.pdf.registration_list',['data'=>$allstudents]);
              return $pdf->download('student_registration.pdf');
        }
        return view('students.enquiry.view', ['data' => $allstudents, 'search' => $search]);
    }

    public function enquiryEdit(Request $request, $id)
    {

        //dd($request);
        $data = Enquiry::find($id);

        if ($request->isMethod('post')) {
            $request->validate([
                'first_name' => 'required',
                'gender_id' => 'required',
                'mobile' => 'required|digits:10',
                'father_name' => 'required',
                'mother_name' => 'required',
            ]);

           // $data = new Enquiry; //model name
            $data->user_id = Session::get('id');
            $data->session_id = Session::get('session_id');
            $data->branch_id = Session::get('branch_id');
            $data->registration_no = $request->registration_no;
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->id_proof = $request->id_proof;
            $data->id_number = $request->id_number;
            $data->email  = $request->email;
            $data->mobile  = $request->mobile;
            $data->class_type_id = $request->class_type_id;
            $data->father_name = $request->father_name;
            $data->mother_name = $request->mother_name;
            $data->father_mobile = $request->father_mobile;
            $data->dob = $request->dob;
            $data->gender_id = $request->gender_id;
            $data->registration_date = date('Y-m-d');
            $data->address = $request->address;
            $data->remark_1 = $request->remark_1;
            $data->save();

            return redirect::to('enquiryView')->with('message', 'Enquiry Updated Successfully.');
        }

        $getstate = State::where('country_id', $data['country_id'])->get();
        $getcitie = City::where('state_id', $data['state_id'])->get();
        $getcitie = City::where('state_id', $data['state_id'])->get();

        return view('students.enquiry.edit', ['data' => $data, 'getState' => $getstate, 'getCity' => $getcitie]);
    }

    public function enquiryDelete(Request $request)
    {

        $data = Enquiry::find($request->delete_id)->delete();
        return redirect::to('enquiryView')->with('message', 'Enquiry Deleted Successfully !');
    }


    public function studentIdPrintMultiple(Request $request)
    {
        $request->validate([
                'checkbox'  => 'required',
        ]);
        
         $ids =  Admission::Select('admissions.*','class_types.name as class_name')
                          ->leftjoin('class_types','class_types.id','admissions.class_type_id')
                          ->find($request->checkbox);
    
            // $ids = Admission::select("*")->find($request->checkbox);
            
            //$student_id =  Admission::find($id);
            
            
        //   $printPreviewId = Helper::printPreview('Student Id Print');
        //      return view($printPreviewId, ['data' => $ids]);
        
            
             return view('print_file.student_print.multipal_id_print', ['data' => $ids]);
        
    }


    public function registrationPrint(Request $request, $id)
    {

        $registration =  Enquiry::with('ClassTypes')->with('Gender')->find($id);
        
         $printPreview =    Helper::printPreview('Enquiry Print');
    //   dd($printPreview);
    
        return view($printPreview, ['data' => $registration]);

        //return view('print_file.student_print.registration_print', ['data' => $registration]);
    }
 

    public function action_add(Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'name'  => 'required',
                'student_class'  => 'required',
            ]);

            $addstudentaction = new StudentAction; //model name
            $addstudentaction->user_id = Session::get('id');
            $addstudentaction->session_id = Session::get('session_id');
            $addstudentaction->branch_id = Session::get('branch_id');
            $addstudentaction->student_old_new = $request->spl_files1;
            $addstudentaction->name = $request->name;
            $addstudentaction->student_class = $request->student_class;
            $addstudentaction->student_roll_no = $request->student_roll_no;
            $addstudentaction->save();

            return redirect::to('student_action_index')->with('message', 'Students Id Update Successfully.');
        }

        return view('students.student_action.action_add');
    }


    public function student_action_index()
    {
        $allstudent_action =  StudentAction::where('session_id', Session::get('session_id'))
            ->where('branch_id', Session::get('branch_id'))->orderBy('id', 'DESC')->get();
        return view('students.student_action.student_action_index', ['data' => $allstudent_action]);
    }


    public function class_type_search(Request $request)
    {
        if (!empty($request->class_type_id)) {
            $data = array();

            $data = Classs::where('class_id', $request->class_type_id)->get();
            $stateData = '';
            foreach ($data as $class) {
                $stateData .= '
           <option value="' . $class->id . '">' . $class->name . '</option>';
            }
            echo $stateData;
        }
    }


    public function studentRegistrationDetail(Request $request, $id)
    {


        $data = Enquiry::find($id);

        $remark = Remark::where('Student_id', $data['id'])->orderBy('id', 'DESC')->get();

        if (!empty($request->class_type_id)) {
            $data = $data->where("class_type_id", $request->class_type_id);
        }
        return view('students.enquiry.studentRegistrationDetail', ['data' => $data, 'remark' => $remark]);
    }

    public function enquiryRemarkAdd(Request $request)
    {


        if ($request->isMethod('post')) {
            $request->validate([]);
            
            $enquiry = Enquiry::where('id',$request->student_id)->update(['enquiry_status'=>$request->enquiry_status_id,'message'=>$request->remark,'reminder_date'=>$request->date]);

            $remark = new Remark; //model name
            $remark->session_id = Session::get('session_id');
            $remark->branch_id = Session::get('branch_id');
            $remark->date = $request->date;
            $remark->student_id = $request->student_id;
            $remark->enquiry_status_id = $request->enquiry_status_id;
            $remark->remark = $request->remark;
            $remark->save();

            return redirect::to('enquiryView')->with('message', 'Remark Add Successful.');
        }
    }

    public function enquiryRemarkEdit(Request $request)
    {

        $data = Remark::find($request->student_id);

        if ($request->isMethod('post')) {
            /*$request->validate([
               'date' => 'required'
            ]);*/

            $data->date = $request->date;
            $data->remark = $request->remark;
            $data->student_id = $data->student_id;
            $data->save();

            return redirect::to('studentRegistrationDetail/'. $data->student_id)->with('message', 'Remark Edit Successfully !');
        
        }

        return view('students.enquiry.studentRegistrationDetail', ['data' => $data]);
    }
    
      
    
    public function studentDetails(Request $request){
        
        $search['name'] = $request->name;
        $search['class_type_id'] = $request->class_type_id;
        $data =  Admission::with('ClassTypes')->with('FeesAssign')->where('session_id',Session::get('session_id'))->where('status','1');
        
        if(Session::get('role_id') > 1){
            $data = $data->where('branch_id',Session::get('branch_id'));
        }
        if (!empty(Session::get('admin_branch_id'))) {
               $data = $data->where('branch_id', Session::get('admin_branch_id'));
            }
        if($request->isMethod('post')){
         
            
            if(!empty($request->name)){
                $value = $request->name;
                $data->where(function($query) use ($value){
                    $query->where("first_name", 'like', '%' .$value. '%');
                    $query->where("last_name", 'like', '%' .$value. '%');
                    $query->orWhere("father_name", 'like', '%' .$value. '%');
                    $query->orWhere("mother_name", 'like', '%' .$value. '%');
                    $query->orWhere("mobile", 'like', '%' .$value. '%');
                    $query->orWhere("email", 'like', '%' .$value. '%');
                    $query->orWhere("aadhaar", 'like', '%' .$value. '%');
                });
               
            }
           if(!empty($request->admissionNo)){
               $data = $data ->where("admissionNo", $request->admissionNo);
           }           
           if(!empty($request->class_type_id)){
               $data = $data ->where("class_type_id", $request->class_type_id);
           }           
            
        }
        $allstudents = $data->orderBy('first_name','ASC')->get();
        
        

      return  view('students/student_details',['data'=>$allstudents,'search'=>$search]);
    }

      
    public function promoteAdd(Request $request){
 $search['name'] = $request->name;
        $search['class_type_id'] = $request->class_type_id;
  if ($request->isMethod('post')) {
         $data =  Admission::with('ClassTypes')->where('session_id',Session::get('session_id'))->where('status','1');
        
        if(Session::get('role_id') > 1){
            $data = $data->where('branch_id',Session::get('branch_id'));
        }
        if (!empty(Session::get('admin_branch_id'))) {
               $data = $data->where('branch_id', Session::get('admin_branch_id'));
            }
       
            
            if(!empty($request->name)){
                $value = $request->name;
                $data->where(function($query) use ($value){
                    $query->where("name", 'like', '%' .$value. '%');
                    $query->orWhere("father_name", 'like', '%' .$value. '%');
                    $query->orWhere("mother_name", 'like', '%' .$value. '%');
                    $query->orWhere("mobile", 'like', '%' .$value. '%');
                    $query->orWhere("email", 'like', '%' .$value. '%');
                    $query->orWhere("aadhaar", 'like', '%' .$value. '%');
                });
               
            }
           if(!empty($request->admissionNo)){
               $data = $data ->where("admissionNo", $request->admissionNo);
           }           
           if(!empty($request->class_type_id)){
               $data = $data ->where("class_type_id", $request->class_type_id);
           }  
        
        $allstudents = $data->orderBy('first_name','ASC')->get();


// dd($allstudents);
        $session = Sessions::all();
       
      return  view('students/promote/promote',['search'=>$search,'data'=>$allstudents,'session'=>$session]);
  }
        return view('students/promote/promote',['search'=>$search,]);
    }  



    public function SearchValuePromote(Request $request){
   
        $search['name'] = $request->name;
        $search['class_type_id'] = $request->class_type_id;
        
        $data =  Admission::with('ClassTypes')->where('session_id',Session::get('session_id'))->where('status','1');
        
        if(Session::get('role_id') > 1){
            $data = $data->where('branch_id',Session::get('branch_id'));
        }
        if (!empty(Session::get('admin_branch_id'))) {
               $data = $data->where('branch_id', Session::get('admin_branch_id'));
            }
        if($request->isMethod('post')){
         
            
            if(!empty($request->name)){
                $value = $request->name;
                $data->where(function($query) use ($value){
                    $query->where("name", 'like', '%' .$value. '%');
                    $query->orWhere("father_name", 'like', '%' .$value. '%');
                    $query->orWhere("mother_name", 'like', '%' .$value. '%');
                    $query->orWhere("mobile", 'like', '%' .$value. '%');
                    $query->orWhere("email", 'like', '%' .$value. '%');
                    $query->orWhere("aadhaar", 'like', '%' .$value. '%');
                });
               
            }
           if(!empty($request->admissionNo)){
               $data = $data ->where("admissionNo", $request->admissionNo);
           }           
           if(!empty($request->class_type_id)){
               $data = $data ->where("class_type_id", $request->class_type_id);
           }  
        }
        $allstudents = $data->orderBy('first_name','ASC')->get();

        $session = Sessions::all();
       
      return  view('students/promote/promote_Search',['data'=>$allstudents,'session'=>$session]);
    }   

    public function studentsPromoteAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
            ]);
            if(!empty($request->admission_ids))
            {
                
                $group_ids = '';
                  if($request->group_ids != '' )
                  {
                      
                       $group_ids = explode(',', $request->group_ids);
                  }
                 
                   if($group_ids == '' )
                        {
                             return redirect::to('student/promote_add')->with('error', 'Please create fees groups for the promoting class.');
                        }
              
                 $data =  FeesMaster::whereIn('id',$group_ids)->where('class_type_id',$request->promote_class_type_id)->where('session_id', $request->session_id)->get();
                 
                
                   if(count($data) == 0 )
                        {
                             return redirect::to('student/promote_add')->with('error', 'Please create fees groups for the promoting class.');
                        }
                foreach($request->admission_ids as $key => $item)
                {
                    
                    $candidate = Admission::find($item);
                    $student_name = $candidate->first_name;
                    $father_name = $candidate->father_name;
                    $mobile = $candidate->mobile; 
                    $admissionNo = $candidate->admissionNo ?? ''; 
                   
                    $isAlreadyPromoted = Admission::where('admissionNo',$admissionNo)->where('first_name',$student_name)->where('father_name',$father_name)->where('mobile',$mobile)
                    ->where('class_type_id',$request->promote_class_type_id)->where('session_id', $request->session_id)->first();
                    if(empty($isAlreadyPromoted)){
                        $BillCounter = BillCounter::where('type', 'StudentAdmission')
                        ->where('session_id', $request->session_id)->first();
                        $counter = !empty($BillCounter->counter) ? $BillCounter->counter : 0;
                        $BillCounter->counter = $counter + 1;
                        $BillCounter->save();
                        $oldRow = Admission::find($item);
                        $newRow = $oldRow->replicate();
                      //  $newRow = $oldRow;
                        //$newRow->admissionNo = $BillCounter->counter;
                        $newRow->session_id = $request->session_id;
                        // $randomString = Str::random(8);
                        $newRow->userName = 'stu_'.$oldRow->admissionNo."_".$request->session_id;
                        $newRow->admission_date = $request->date;
                        $newRow->class_type_id = $request->promote_class_type_id;
                        $newRow->save();
            if($oldRow->admission_type_id != 2)                   
              {        
                  
          
                  
            $feesGroup = new FeesAssign();
            $feesGroup->user_id = Session::get('id');
            $feesGroup->session_id = $request->session_id;
            $feesGroup->branch_id = Session::get('branch_id');
            $feesGroup->admission_id = $newRow->id;
            
            // $feesGroup->total_amount = $request->total_amount;
          //  $feesGroup->dis_on_total_amt = $request->great_discount;
            // $feesGroup->total_discount = $request->net_discount;
            // $feesGroup->net_amount = $request->pay_amt;
            $feesGroup->save();
            
            $feesGroupId = $feesGroup->id;

           
            $fees_group_amount =0;
            $fees_group_discount =0;
            foreach($data as $value)
             {
                  
                    $feesGroupDetail = new FeesAssignDetail(); //model name
                    $feesGroupDetail->user_id = Session::get('id');
                    $feesGroupDetail->session_id = $request->session_id;
                    $feesGroupDetail->branch_id = Session::get('branch_id');
                    $feesGroupDetail->fees_group_id = $value->fees_group_id;
                    $feesGroupDetail->fees_master_id = $value->id;
                    $feesGroupDetail->fees_group_amount = $value->amount ?? 0;
                    $fees_group_amount += $value->amount ?? 0;
                    $feesGroupDetail->fees_assign_id = $feesGroupId;
                    $feesGroupDetail->admission_id =  $newRow->id;
                    $feesGroupDetail->save();
            }
                $feesGroup->total_amount =$fees_group_amount;
                $feesGroup->total_discount = $fees_group_discount;
                $feesGroup->net_amount = $fees_group_amount-$fees_group_discount;
                  $feesGroup->save();
              } 
                        
                }          
                        
                }
                return redirect::to('student/promote_add')->with('message', 'Student Promoted Successfully.');
            }
        }
              
    }
     public function enquiry_qr_generate()
    {
         $file= QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') ;
     return Response::download($file);
        
    }
 
 
}
