<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator; 
use App\Models\User;
use App\Models\Admission;
use App\Models\Salary;
use App\Models\SmsSetting;
use App\Models\WhatsappSetting;
use App\Models\StaffAttendance;
use App\Models\TeacherCategory;
use App\Models\StudentAttendance;
use App\Models\Teacher;
use App\Models\BirthdayWishes;
use App\Models\WhatsappApiResponse;
use App\Models\Master\MessageTemplate;
use App\Models\AttendanceStatus;
use App\Models\Setting;
use App\Models\Master\Branch;
use App\Models\CronJobs;
use Session;
use Hash;
use Helper;
use Str;
use Redirect;
use Carbon\Carbon;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CronJobController extends Controller

{
    
    public function cronJobs(){
        $this->birthdayMessage();
        $this->attendanceSendMassage();
    }

    public function birthdayMessage(){
        
        $today = now();
        $time = date("H:i A");
       
        if($time == "00:15 AM"){
     
            $cronJobs = new CronJobs;
            $cronJobs->function_name = __FUNCTION__;
            $cronJobs->save();
        
            $students = Admission::whereMonth('dob',$today->month)->whereDay('dob',$today->day)->where('status',1)->get(['mobile', 'first_name', 'last_name']);
      
            $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
                                ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                               ->where('message_types.status',1)->where('message_types.slug','birthday-wishes')->first();
            $branch = Branch::find(1);
            $setting = Setting::where('session_id',3)->where('branch_id',1)->first();
           
            $arrey1 =   array(
                            '{#name#}',
                            '{#school_name#}');
                            
            if($branch->whatsapp_srvc == 1){
                
                foreach($students as $stu){
                    
                    $arrey2 = array(
                                    $stu->first_name . ' ' . $stu->last_name,
                                    $setting->name);
                            
                    if ($stu->mobile != ""){
                            $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
                            Helper::sendWhatsappMessage($stu->mobile,$whatsapp);
                    }
                }
            }
        }
    }
    
    public function attendanceSendMassage111(Request $request){
        
        
    //          $todate = date('Y-m-d');
             
    //          $student = StudentAttendance::where('student_attendance.modify_data',0)->whereDate('date',$todate)->groupBy('admission_id')->orderBy('id','ASC')->get();
    
    //          foreach($student as $item){
    //                 $studen = StudentAttendance::where('admission_id',$item->admission_id)->whereDate('date',$todate)->orderBy('id','ASC')->get();
    //                   foreach($studen as $key=>$item1){
    //                             if($key == 0){
    //                             StudentAttendance::where('id',$item1->id)->update(['attendance_status_id'=>1]);
    //                             }
    //                             if($key == 1){
    //                             StudentAttendance::where('id',$item1->id)->update(['attendance_status_id'=>2]);
    //                              StudentAttendance::where('admission_id',$item1->admission_id)->whereDate('date',$todate)->update(['modify_data'=>1]);
    //                             }
    //                   }
    //          }
             
             
             
            
             
    // $studentdata = StudentAttendance::Select('student_attendance.*','admissions.first_name','admissions.last_name','admissions.mobile')
    //                     ->leftjoin('admissions','admissions.id','student_attendance.admission_id')->where('student_attendance.message_status',0)->whereNotNull('admissions.mobile')->whereDate('date',$todate)->get();
                        
                        
                    
    //           foreach($studentdata as $item3){
                    
    //               if(!empty($item3['mobile'])){
                      
                   
    //                     		$AttendanceStatus = AttendanceStatus::where('id',$item3->attendance_status_id)->get()->first();



    //                             $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
    //                                     ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
    //                                   ->where('message_types.status',1)->where('message_types.slug','attendance')->first();
                                   
    //                             $branch = Branch::find($item3->branch_id);
    //                             $setting = Setting::where('branch_id',$item3->branch_id)->first(); 
    //                             $arrey1 =   array(
    //                                             '{#name#}',
    //                                             '{#today_day#}',
    //                                             '{#today_time#}',
    //                                             '{#attendance_status#}',
    //                                             '{#support_no#}',
    //                                             '{#school_name#}');
                                               
    //                             $arrey2 = array(
    //                                             $item3->first_name." ".$item3->last_name,
    //                                             date('d-m-Y',strtotime($item3->date)),
    //                                             date('h:i:s A',strtotime($item3->updated_at)),
    //                                             $AttendanceStatus->name,
    //                                             $setting->mobile,
    //                                             $setting->name);
                           
    //                         if($template->status != 1){
                                  
    //                             if($branch->whatsapp_srvc != 0){
                                    
                                 
    //                                 if ($item3->mobile != ""){
    //                                     if($template->whatsapp_status != 0){
    //                                         $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
    //                                        Helper::sendWhatsappMessage($item3->mobile,$whatsapp);
    //                                      
                                          
                                          
    //                                         StudentAttendance::where('id',$item3['id'])->whereDate('date',$todate)->update(['message_status'=>1]);
    //                                     }
    //                                 }
    //                             }
                                
                               
    //                         }
                 
    //                 }
                    
                  
    //              }
    } 
    
    
     public function updateAttendanceStatus($todate){
         
        $cronJobs = new CronJobs;
        $cronJobs->function_name = __FUNCTION__;
        $cronJobs->save();
         
         $student = StudentAttendance::whereDate('date',$todate)->groupBy('admission_id')->orderBy('id','ASC')->pluck('admission_id')->implode(',');
         
         if(!empty($student))
         {
             $student = explode(',',$student);
        
        foreach($student as $item)
        
        {
        $data = StudentAttendance::whereDate('date',$todate)->where('admission_id',$item)->get();
        
            // Filter the data
$filteredData = collect();
$inRecord = null;

foreach ($data as $key=>$record) {
       $updateStatus = StudentAttendance::find($data[0]->id); 
    if ($key == 0) {
      
        $inRecord = $record;
        
     
        if(empty($updateStatus->attendance_status_message))
        {
            
            $array = [['biomatric'=>'yes','in'=>$inRecord->time,'in_message_status'=>'','out'=>'','out_message_status'=>'']];
            $updateStatus->attendance_status_message = json_encode($array);
            $updateStatus->save();
        }
        else
        {
            $array = json_decode($updateStatus->attendance_status_message, true);
    $array[0]['in'] = $inRecord->time;
    $updateStatus->attendance_status_message = json_encode($array); 
    
    $updateStatus->save();
        }
        
       //  $filteredData->push($inRecord);
    } else {
        // Treat the current record as an "out"
        $inTime = Carbon::parse($inRecord->time);
        $outTime = Carbon::parse($record->time);

        if ($inTime->diffInMinutes($outTime) >= 60) {
            // If the difference is 15 minutes or more, keep both records
        
          //  $filteredData->push($record);
          
           if(!empty($updateStatus->attendance_status_message))
        {
            
       
            $array = json_decode($updateStatus->attendance_status_message, true);
            
         
    $array[0]['out'] = $outTime->format('h:i:s');
      $updateStatus->attendance_status_message = json_encode($array);
    
    if($array[0]['out_message_status'] == '') 
    {
    $updateStatus->save();
    }
        }
        if(($record->id ?? '') != '')
           {
               StudentAttendance::find($record->id)->forceDelete();
           }
            $inRecord = null; // Reset for the next pair
        } 
        else
        {
           if(($record->id ?? '') != '')
           {
               StudentAttendance::find($record->id)->forceDelete();
           }
        }
    }
}
       
        }
       
         }
     }
    
    
 public function attendanceSendMassage(){
    
    $cronJobs = new CronJobs;
    $cronJobs->function_name = __FUNCTION__;
    $cronJobs->save();
            
         $todate = date('Y-m-d');
     $this->updateAttendanceStatus($todate);
     
    
     
    

                                $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
                                        ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                                      ->where('message_types.status',1)->where('message_types.slug','attendance')->first();
                                   
                                  
             
             $student = StudentAttendance::whereDate('date',$todate)->groupBy('admission_id')->orderBy('id','ASC')->get();
    

            $receiverNames =[];
                
             foreach($student as $item){
             
                 //   $studen = StudentAttendance::where('admission_id',$item->admission_id)->whereDate('date',$todate)->orderBy('id','ASC')->first();
                    
                    $studen= StudentAttendance::leftJoin('admissions', 'student_attendance.admission_id', '=', 'admissions.id')
    ->where('student_attendance.admission_id', $item->admission_id)
    ->whereDate('student_attendance.date', $todate)
    ->orderBy('student_attendance.id', 'ASC')
    ->select('student_attendance.*', 'admissions.first_name','admissions.last_name','admissions.mobile') // Select specific fields as needed
    ->first();
    
                    
                    if(!empty($studen))
                    {
                         $branch = Branch::find($studen->branch_id);
                                $setting = Setting::where('branch_id',$studen->branch_id)->first(); 
                                $arrey1 =   array(
                                                '{#name#}',
                                                '{#today_day#}',
                                                '{#attendance_time#}',
                                                '{#attendance_status#}',
                                                '{#support_no#}',
                                                '{#school_name#}');
                                               
                               
                        
                        
                   
                    $decode = json_decode($studen->attendance_status_message ?? []);
                 
                       
                       if(!empty($decode))
                       {
                           if($decode[0]->biomatric == 'yes')
                           {
                               if($decode[0]->in_message_status != 'Checked')
                               {
                                   
                                   $mark = 'Present';
                                 if ($studen->time > '09:00:00') {
                                            $mark = 'Absent';
                                        }
                                    $arrey2 = array(
                                                $studen->first_name." ".$studen->last_name,
                                                date('d-m-Y',strtotime($studen->date)),
                                                date('h:i A',strtotime($decode[0]->in)),
                                                    $mark,
                                                $setting->mobile,
                                                $setting->name);
                                                
                                                  $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
                                                  
                                                  if($decode[0]->in != '')
                                                  {
                                   $receiverNames[] = ['field'=>'in_message_status','attendance_id'=>$studen->id,'mobile'=>$studen->mobile,'message'=>$whatsapp];
                                                  }
                                                      
                                                  }
                               elseif($decode[0]->in_message_status == 'Checked' && $decode[0]->out_message_status != 'Checked')
                               {
                                    $arrey2 = array(
                                                $studen->first_name." ".$studen->last_name,
                                                date('d-m-Y',strtotime($studen->date)),
                                                date('h:i A',strtotime($decode[0]->out)),
                                                'Out',
                                                $setting->mobile,
                                                $setting->name);
                                                
                                                 $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
                                                 if($decode[0]->out != '')
                                                  {
                                                     
                                   $receiverNames[] = ['field'=>'out_message_status','attendance_id'=>$studen->id,'mobile'=>$studen->mobile,'message'=>$whatsapp];
                               }
                               }
                               
                           }
                           else
                           {
                               //without biomatrci
                           }
                           
                       }
                       
                    }
             }
                          
                            if($template->status != 1){
                                  
                                if($branch->whatsapp_srvc != 0){
                                    
                                 if(!empty($receiverNames))
                                 {
                                     foreach($receiverNames as $item)
                                     {
                                        if($template->whatsapp_status != 0){
                                        //   Helper::sendWhatsappMessage($item->mobile,$whatsapp);
                                        $response =   Helper::sendWhatsappMessage($item['mobile'],$item['message']);
                                          $response1 = json_decode($response);
                                        $messageTimestamp = isset($response1->message->messageTimestamp) ? $response1->message->messageTimestamp : null;

                                          
                                      
                                        if ($messageTimestamp != '') {
   $attendance = StudentAttendance::find($item['attendance_id']);

if ($attendance) {
    $attendanceStatusMessage = json_decode($attendance->attendance_status_message, true);

$field = $item['field'];
    $attendanceStatusMessage[0][$field] = 'Checked';

    $attendance->attendance_status_message = json_encode($attendanceStatusMessage);
    $attendance->save();
}
}

else
{
    
    $error = WhatsappApiResponse::whereDate('date',date('Y-m-d'))->first();
    
    if(!empty($error))
    {
    $error->message = $response;
    $error->save();
    }
    else
    {
        $error = new WhatsappApiResponse;
    $error->item = 'Whatsapp Error';
    $error->date = date('Y-m-d');
    $error->message = $response;
    $error->save();
    }
    

    
}

                                        }
                                 }
                                }
                                }
                                
                               
                            }
                 
    } 
     public function birthday_auto_massage(){

        
        $today = now();
        $time = date("H:i A");
       
            $students = Admission::whereMonth('dob',$today->month)->whereDay('dob',$today->day)->where('status',1)->groupBy('admissionNo')->get(['mobile', 'first_name','id']);
      
            $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
                                ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                               ->where('message_types.status',1)->where('message_types.slug','birthday-wishes')->first();
            $branch = Branch::find(1);
            $setting = Setting::first();
           //dd($setting);
            $arrey1 =   array(
                            '{#name#}',
                            '{#school_name#}');
               $error=0;             
            if($branch->whatsapp_srvc == 1){
                if(!empty($students)){
                    foreach($students as $stu){
                        
                        $arrey2 = array($stu->first_name,$setting->name);
                                
                        if ($stu->mobile != ""){
                                $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
                            $response =     Helper::sendWhatsappMessage($stu->mobile,$whatsapp);
                                
                          /*  $value = new  BirthdayWishes;
                                $value->user_id = Session::get('user_id');
                                $value->session_id = Session::get('session_id');
                                $value->branch_id = Session::get('branch_id');
                                $value->user_id_sender = $stu->id ;
                              $value->role_id = 3 ;
                                
                              $decode = json_decode($response);
                            
                              if($decode->status == 'error')
                              {
                                  $value->status = 1; //0 for success ,1 for failed
                                  $value->failed_message = $decode->message;
                                  $error++;
                                    $value->save();
                                 // return redirect::to('happy_birthday')->with('error', 'Something went wrong !!!');
                              }
                              else
                              {
                                  $value->status = 0; //0 for success ,1 for failed
                                 
                                    $value->save();
                              }*/
                        }
                        
                    }
                }
            }
        
    }
}
