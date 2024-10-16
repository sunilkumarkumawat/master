<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Carbon;
use DB;
use Mail;
use Session;
use File;
use App\Models\Admin;
use App\Models\fees\FeesCounter;
use App\Models\User;
use App\Models\SidebarSub;
use App\Models\FailedMessages;
use App\Models\Teacher;
use App\Models\Admission;
use App\Models\exam\digital\ChapterDigital;
use App\Models\exam\digital\ExamResultDigital;
use App\Models\exam\digital\ExamPatternDigital;
use App\Models\exam\digital\TopicDigital;
use App\Models\exam\digital\SukaDigital;
use App\Models\exam\digital\UploadByDigital;
use App\Models\exam\digital\QuestionTypeDigital;
use App\Models\exam\digital\LevelDigital;
use App\Models\PrintFileSubModule;
use App\Models\StoreItem;
use App\Models\StoreItemRequest;
use App\Models\StoreBillingDetail;
use App\Models\PrintFileSetting;
use App\Models\PrintFileDetails;
use App\Models\TotalDays;
use App\Models\Chat;
use App\Models\Account;
use App\Models\WhatsappApiResponse;
use App\Models\StudentAttendance;
use App\Models\Master\TeacherSubject;
use App\Models\examoffline\PerformanceMarks;
use App\Models\TeacherAttendance;
use App\Models\Month;
use App\Models\FeesReminder;
use App\Models\Master\SubjectStreams; 
use App\Models\Master\Weekendcalendar; 
use App\Models\exam\Exam;
use App\Models\Remark;
use App\Models\HostelStudent;
use App\Models\hostel\ElectricityBillPayment;
use App\Models\hostel\HostelMeterUnit;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Setting;
use App\Models\hostel\HostelFeesDetail;
use App\Models\ClassType;
use App\Models\BloodGroup;
use App\Models\Enquiry;
use App\Models\exam\FillMarks;
use App\Models\exam\FillMinMaxMarks;
use App\Models\Sidebar;
use App\Models\Gender;
use App\Models\Subject;
use App\Models\FeesGroup;
use App\Models\Invantory;
use App\Models\FeesMaster;
use App\Models\FeesDetail;
use App\Models\FeesDiscount;
use App\Models\FeesAssign;
use App\Models\FeesCollect;
use App\Models\OnlinePaymentTransaction;
use App\Models\hostel\StudentExpenseDetail;
use App\Models\AdmitCardNote;
use App\Models\hostel\StudentExpense;
use App\Models\TeacherDocuments;
use App\Models\PermissionManagement;
use App\Models\AttendanceStatus;
use App\Models\Master\Branch;
use App\Models\Master\EnquiryStatus;
use App\Models\Master\TimePeriods;
use App\Models\Master\PaymentMode;
use App\Models\Master\Complaint;
use App\Models\Master\Role;
use App\Models\Master\BusRoute;
use App\Models\Master\Bus;
use App\Models\Master\BusRouteAssign;
use App\Models\Master\BusAssign;
use App\Models\Master\MessageContent;
use App\Models\Master\MessageType;
use App\Models\hostel\Hostel;
use App\Models\Expense;
use App\Models\hostel\HostelBuilding;
use App\Models\hostel\HostelFloor;
use App\Models\hostel\HostelRoom;
use App\Models\hostel\HostelBed;
use App\Models\hostel\MessFoodCategory;
use App\Models\hostel\MessFeesStrucher;
use App\Models\hostel\HostelAssign;
use App\Models\hostel\HostelDetail;
use App\Models\hostel\Head;
use App\Models\library\Library;
use App\Models\library\LibraryPlan;
use App\Models\library\LibraryCategory;
use App\Models\library\LibraryCabin;
use App\Models\Master\SidebarPermission;
use App\Models\Master\NoticeBoard;
use App\Models\Master\HomeworkReview;
use App\Models\Master\HomeworkDocuments;
use App\Models\exam\ExamResultDetail;
use App\Models\exam\ExamResult;
use App\Models\exam\AssignExam;
use App\Models\ExaminationScheduleDetail;
use App\Models\Sessions;
use App\Models\library\LibraryAssign;
use App\Models\library\LibraryTimeSlot;
use App\Models\ToDoList;
use DateTime;
use Response;
class Helper{

     public static function getSetting(){
       
       $setting = Setting::where('branch_id',Session::get('branch_id'))->with('Account')->with('City')->with('Country')->with('State')->with('Account')->get()->first();
       
         if(empty($setting)){
            $setting = Setting::where('branch_id',1)->with('Account')->with('City')->with('Country')->with('State')->with('Account')->get()->first();
         }
      
       return $setting;
   
    } 
    
    public static function getInventoryAmount($receipt,$admissionId) {
        
     $amount =   StoreItemRequest::where('admission_id',$admissionId)->where('receipt_no',$receipt)->get();
   
     $total['total'] = 0;
     $total['paid'] = 0;
        if(!empty($amount))
        {
            foreach($amount as $item)
            {
               $total['total'] += $item->qty*$item->price; 
            }
            
        }
        
        $total['paid'] = StoreBillingDetail::where('admission_id',$admissionId)->where('receipt_no',$receipt)->sum('amount');
        
        return $total;
    }
    
     public static function getUsers(){
          
        
      $users = User::select('users.*','role.name as role_name')
        ->leftjoin('role','role.id','users.role_id')
         ->orderBy('users.role_id')->get();
          return $users ;
      }
    public static function sendMail($tmplale,$data) {
                /*Mail::send($tmplale, $data, function($message) use ($data) {
                    $message->from(getenv('MAIL_FROM_ADDRESS'));
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    if(!empty($data['file'])){
                        $message->attach($data['file']); 
                    }
                 
               });*/
               
    }


    // public static function sendWhatsappMessage($toMobile, $text ,$type =null, $filepath = null){
    //   if(empty($type)){
    //      $type ='text';
    //   }
      
    //     if (!empty($toMobile)) {
            
          
    //         $serverUrl = "https://wapp.powerstext.in/api/send";
    //         $params = array(
    //             'number' => '91' . $toMobile,
    //             'type' => $type,
    //             'message' => $text,
    //             'media_url' => $filepath,
    //             'instance_id' => '65924764028FF',
    //             'access_token' => '658d5c21b7da1'
    //         );
           
    //         $url = $serverUrl . '?' . http_build_query($params);
    //          //dd($url);
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_URL, $url);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         $output = curl_exec($ch);
    //         curl_close($ch);


    //     $decode = json_decode($output);
    //     if($decode->status != 'success')
    //     {
    //         $data = new FailedMessages;
    //         $data->branch_id =Session::get('branch_id');
    //         $data->session_id =Session::get('session_id');
    //         $data->mobile =$toMobile;
    //         $data->type = 'text';
    //         $data->platform = 'whatsapp';
    //         $data->media_url = $filepath;
    //         $data->sender_message = $text;
    //         $data->status = $decode->status ?? '';
    //         $data->message = $decode->message ?? '';
    //         $data->save();
            
    //     }
    //         return $output;
    //     }
    // }

    public static function sendWhatsappMessage($toMobile, $text,$filepath=null,$filename = null){
        $branch = Branch::first();
        
        $testMobile = Session::get('testMobile');
          if(!empty($testMobile)){
              $toMobile = $testMobile;
          }
       // $toMobile = 9166697302;
        if (!empty($toMobile)) {
            if(!empty($filepath)){
                $serverUrl = 'https://wapi.pt1.in/api/send?';
                 $params = array(
                'number' => '91' . $toMobile,
                'type'=>"media",
                'message' => $text,
                'media_url' => $filepath,
                'instance_id' => '66DEB19117CCD',
               'access_token' => '66deb15b4b3fc',
               
            );
            $url = $serverUrl . '&' . http_build_query($params);
            // dd($url);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
           //
            curl_close($ch);
    
            // You may want to add error handling here
    
            }else{
                $serverUrl = 'https://wapi.pt1.in/api/send?';
                
               
            if(!empty($serverUrl)){
                $params = array(
                    'number' => '91' . $toMobile,
                   'type' => 'text',
                    'message' => $text,
                   'instance_id' => $branch->instance_id,
                   'access_token' => $branch->access_token,              
                );
                $url = $serverUrl . '&' . http_build_query($params);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $output = curl_exec($ch);
               // dd($ch);
                curl_close($ch);
    
            // You may want to add error handling here
                
                if($branch->api_link == "https://wapi.pt1.in/api/send?"){    
                    $result =  json_decode($output);
                    if(($result->status ?? '' ) == "success" || ($result->status ?? '' ) == "error"){
                        $message = $result->message;
                        $error = $message->messageTimestamp ?? null;
                        if($error == null){
                            $whatsapp_error = new WhatsappApiResponse;
                            $whatsapp_error->item = json_encode($params);
                            $whatsapp_error->message = $result->message ?? null;
                            $whatsapp_error->save();
                            session()->put('whatsapp_error',$whatsapp_error->message);
                            session()->put('whatsapp_error_respose_id',$whatsapp_error->id);
                        }
                    }
                    
                    return $output;
                }
            }else{
                $whatsapp_error = new WhatsappApiResponse;
                $whatsapp_error->item = "Whatsapp Authentication Error";
                $whatsapp_error->message = "Whatsapp Api Url Missing";
                $whatsapp_error->save();
                session()->put('whatsapp_error',$whatsapp_error->message);
                session()->put('whatsapp_error_respose_id',$whatsapp_error->id);
            }

            }
            
        }
    } 
    
    public static function sendWhatsappGroupMessage($group_id,  $text, $type=null,$filepath = null){
 if(empty($type)){
         $type ='text';
      }
        if (!empty($group_id)) {
            $serverUrl = "https://wapp.powerstext.in/api/send_group";
            $params = array(
                'group_id' => $group_id,
                'type' => $type,
                'message' => $text,
                'media_url' => $filepath,
                'instance_id' => '6613950872DC3',
                'access_token' => '661393ca7a4d7'
            );
           
            $url = $serverUrl . '?' . http_build_query($params);
             //dd($url);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);


        $decode = json_decode($output);

        if($decode->status == 'error')
        {
            $data = new FailedMessages;
            $data->branch_id =Session::get('branch_id');
            $data->session_id =Session::get('session_id');
            $data->group_id =$group_id;
            $data->type = $type;
            $data->platform = 'whatsapp';
            $data->media_url = $filepath;
            $data->sender_message = $text;
            $data->status = $decode->status ?? '';
            $data->message = $decode->message ?? '';
            $data->save();
            
        }
        
      
            return $output;
        }
    }

 public static function SendMessage($mobile="",$msg="",$template_id=""){ 
        
        $username = env('SMS_USER_NAME');
        $apiKey = env('SMS_API_KEY');
        $apiRoute = env('SMS_API_ROUTE');
        $sender = env('SMS_SENDER');
        $apiRequest = 'Text';
        $numbers = $mobile; 
        $message = $msg;
        $templateid = $template_id;
        $data = 'username='.$username.'&apikey='.$apiKey.'&apirequest='.$apiRequest.'&route='.$apiRoute.'&mobile='.$numbers.'&sender='.$sender."&TemplateID=".$templateid."&message=".$message;
        $url = 'http://123.108.46.13/sms-panel/api/http/index.php?'.$data;
        $url = preg_replace("/ /", "%20", $url);
        $response = file_get_contents($url);
    }
 /*   public static function sendWhatsappMessage($toMobile, $text, $filename = null){
        if (!empty($toMobile)) {
            $serverUrl = "https://wapi.powerstext.in/api/send";
            $params = array(
                'number' => '91' . $toMobile,
                'type' => 'text',
                'message' => $text,
                'instance_id' => '64D9EB19BF75A',
                'access_token' => '64d9ea6f6f5b4' 
            );

            $url = $serverUrl . '?' . http_build_query($params);
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
    

            return $output;
        }
}*/
   
    
    
    public static function getBirthday() {
        $today = now();
                $data = Enquiry::select('enquirys.*','types.name as class_name')
                                ->leftjoin('class_types as types','types.id','enquirys.class_type_id')->whereMonth('enquirys.dob',$today->month)
            ->whereDay('enquirys.dob',$today->day)->count();
            
                
       return $data;
               
    }
     
    public static function getresult($table_name,$id=null){
         
            $result = DB::table($table_name);
            
            if($id >0){
              $result =$result->where('id',$id);
             
                 }
         $result = $result->orderBy('id','DESC')->get();
       
       return $result;
    }
   

   public static function getPermission(){
       $getPermission = PermissionManagement::where('reg_user_id',Session::get('id'))->first(['add','download','edit','deletes']);
       return $getPermission;
   }
   public static function getCounters(){
       $FeesCounter = FeesCounter::get();
       return $FeesCounter;
   }
   
     public static function getExamType(){
       $getExamType = Exam::all();
       return $getExamType;
   
   }
   
     public static function getFoodCategory(){
       $getFoodCategory = MessFoodCategory::all();
       return $getFoodCategory;
   
   }
   
     public static function getEnquiryStatus(){
       $getEnquiryStatus = EnquiryStatus::whereNull('deleted_at')->get();
       return $getEnquiryStatus;
   
   }
   
       public static function getDocumentsIsNull($id){
       $hostel_detail = HostelAssign::where('id',$id)->first();
       
       $count = 0;
       $name = '';
       $comma ='';
       
       if(!empty($hostel_detail))
       {
            if($hostel_detail->student_image == '')
            {
                $count++;
                
                
                 $name = $name.$count==0 ? '':','.'Student Image' ;
                
                
            }
            if($hostel_detail->Signature_img == '')
            {
                $count++;
                  $name = $name.','.'Student Signature' ;
            }
            if($hostel_detail->student_id_proof == '')
            {
                $count++;
                  $name = $name.','.'Student Id' ;
            }
            if($hostel_detail->college_id == '')
            {
                $count++;
                  $name = $name.','.'College Id' ;
            }
            if($hostel_detail->police_verification == '')
            {
                $count++;
                  $name = $name.','.'Police Verification' ;
            }
            if($hostel_detail->covid_certificate == '')
            {
                $count++;
                  $name = $name.','.'Covid Certificate' ;
            }
       }
       
       $name =  preg_replace('/,/', '',  $name, 1);
     
      
       return $name;
   
   }
   
      public static function getCount($table_name,$colem_name=null,$method =null,$where_colem_name=null,$where_value_name =null){
       
            $user_id = Session::get('id');
            $result = DB::table($table_name)->where('deleted_at', '=', Null)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'));
            if(!empty($where_colem_name)){
                 $result =$result->where($where_colem_name,$where_value_name);
         
             }
             /*if($user_id > 1){
                 $result =$result->where('user_id',$user_id);
             }*/
            if(!empty($colem_name)){
              $result =$result->$method($colem_name);
            }
          return $result;
   }
     public static function getAllUsers(){
       $getAllUsers = User::whereNull('deleted_at')->get();
       return $getAllUsers;
   
   }

     public static function getMessFeesStrucher(){
       $getMessFeesStrucher = MessFeesStrucher::all();
       return $getMessFeesStrucher;
   
   }
     public static function getAllHead(){
       $getAllHead = Head::whereNull('deleted_at')->get();
       return $getAllHead;
   
   }
      public static function studentexamview(){
       $studentexamview = Exam::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get();
       return $studentexamview;
   }
   
    public static function getMonth(){
        $getMonth = Month::orderBy('id','ASC')->get();
        return $getMonth;
    }  
    
   public static function getCountry(){
       $getCountry = Country::where('id',101)->get();
       return $getCountry;
   }
   
   public static function getState(){
        $country_id = Setting::where('branch_id',Session::get('branch_id'))->get()->first();
        
        if(empty($country_id))
        {
            $getstate = State::where('country_id',101)->get();
        }
        else
        {
            $getstate = State::where('country_id',$country_id->country_id)->get();
        }
       
       return $getstate;
   
   }
   
    public static function getMessageType(){
        $getMessageType = MessageType::where('status',1)->get();
        return $getMessageType;
    }
   
   public static function getcomplaint(){
       $getcomplaint = Complaint::where('id',Session::get('id'))->get()->first();
       return $getcomplaint;
   
   }
   public static function getallStudent(){
       $getallStudent = Admission::get();
       return $getallStudent;
   
   }
   
       public static function getstudentbirthday(){
        $today = Carbon::now()->format('m-d'); 
    $getstudentbirthday = DB::table('admissions')->where('branch_id',Session::get('branch_id'))->where(DB::raw("DATE_FORMAT(dob, '%m-%d')"), $today)
        ->orderBy('id', 'DESC')->groupBy('admissionNo')
         ->whereNull('deleted_at')
        ->get();
       return $getstudentbirthday;
   }  
   
    public static function getUsersBirthday(){
    $getUsersBirthday = User::whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [date('m-d')])
        ->orderBy('id', 'DESC')
        ->get();
        
       return $getUsersBirthday;
   }  
   
   
    public static function getCity(){
        $state_id = Setting::where('branch_id',Session::get('branch_id'))->get()->first();
         if(empty($state_id))
        {
            
            $state_ids = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41];
            $getcitie = City::whereIn('state_id',$state_ids)->get();
        }
        else
        {
            $getcitie = City::where('state_id',$state_id->state_id)->get();
        }
       
       return $getcitie;
   }
     public static function getQRCode($id){
       $qrcoede = Account::where('id',$id)->first();
       return $qrcoede;
   
   }
   
     
    
    public static function getNewChat(){
        $getNewChat = Chat::select('chats.*','Admission.*')
        ->leftjoin('admissions as Admission','Admission.id','chats.from_id')
        ->where('chats.to_id',Session::get('id'))->where('Admission.class_type_id',Session::get('class_type_id'))->where('chats.status',0)->groupBy('chats.from_id')->get();
        return $getNewChat;
    }   
   
    public static function getSiderbar(){
       $getSidebar = Sidebar::orderBy('id', 'ASC')->get();
       return $getSidebar;
   
   }
    
   
   public static function classType(){
    $getTypeclass = ClassType::where('branch_id',Session::get('branch_id'))->orderBy('orderBy', 'ASC');

    if (Session::get('role_id') == 2) {
        // Assuming TeacherSubject is not used in this code
        $classes = Teacher::where('id', Session::get('teacher_id'))->get();
        $att = array();

        if (!$classes->isEmpty()) {
            foreach ($classes as $item) {
                $classTypeIds = unserialize($item->class_type_id ?? '');

                if (!empty($classTypeIds) && is_array($classTypeIds)) {
                    foreach ($classTypeIds as $class) {
                        $att[] = $class;
                    }
                }
            }
        }

        if (!empty($att)) {
            $getTypeclass = $getTypeclass->whereIn('id', $att);
        } else {
            // Handle the case where no class_type_id was found
            // For example, you might return an empty collection or a default value
            return collect(); // Returning an empty collection
        }
    }

    $getTypeclass = $getTypeclass->get();
    return $getTypeclass;
}
    
    public static function bloodGroupType(){
       $getTypeblood = BloodGroup::orderBy('id', 'ASC')->get();
       return $getTypeblood;
   
    }
   public static function examPanelClassType(){
          $getTypeclass = ClassType::where('branch_id',Session::get('branch_id'))->orderBy('orderBy', 'ASC');
        if(Session::get('role_id') == 2)
        {
            
            
            $checkClassTeacher = Teacher::where('id',Session::get('teacher_id'))->first('class_type_id');
         
            $classes = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('class_type_id')->get();
             $att = array();
              
              if(!empty($classes))
              {
                  foreach($classes as $item)
                  {
                      $att[] = $item->class_type_id;
                  }
              }
              
              if(!empty($checkClassTeacher))
              {
                 
                      $att[] = $checkClassTeacher->class_type_id;
                
              }
              
            
           
            $getTypeclass = $getTypeclass->whereIn('id',$att);
            
        }
        
      $getTypeclass = $getTypeclass->get();
      return $getTypeclass;
 
   }
           
           
           
    public static function getMarks($exam_id,$className ,$admissionNo){
       $marks = FillMarks::where('exam_id',$exam_id)->where('class_type_id',$className)->where('admission_id',$admissionNo)->where('session_id', Session::get('session_id'))->get(['id','subject_id','student_marks']);
     
       return $marks;
   
   }
    public static function getMaxMarks($exam_id,$className ){
       $marks = FillMinMaxMarks::where('exam_id',$exam_id)->where('class_type_id',$className)->where('session_id', Session::get('session_id'))->get(['subject_id','exam_minimum_marks','exam_maximum_marks']);
     
       return $marks;
   
   }
    public static function roleType(){
       $getRole = Role::orderBy('id', 'ASC')->get();
       return $getRole;
   
   }
   

    public static function getrole(){
       $role = Role::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $role;
   
   }
   public static function getPermisn(){
       $user_id = Session::get('id');
        $Permisn = PermissionManagement::where('reg_user_id', $user_id)->first();
             

       return $Permisn;
   
   }
   
   public static function getPermisnByBranch(){
       $data = Branch::find(Session::get('branch_id'));
       return $data;
   }
   public static function getAllBranch(){
       $data = Branch::orderBy('id','ASC')->get();
       return $data;
   }
   
   public static function getStudents(){
       $getStudents = Enquiry::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getStudents;
   }

   public static function getStudent(){
       $getStudent = Admission::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getStudent;
   }
   
   public static function attendanceType(){
       $getAttendance= AttendanceStatus::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getAttendance;
   }
   
  public static function getaccount(){
       $getaccounts = Account::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getaccounts;
   }

  
   public static function getInvantory(){
       $getInvantory = Invantory::orderBy('id', 'ASC')->get();
       return $getInvantory;
   }


   
   public static function getgender(){
       $getgenders = Gender::orderBy('id', 'ASC')->get();
       return $getgenders;
   }
   
   public static function getAttendanceStatus(){
       $getAttendanceStatus = AttendanceStatus::where('status',1)->orderBy('id', 'ASC')->get();
       return $getAttendanceStatus;
   }   
 
   public static function getSubject(){
       $getsubject = Subject::orderBy('id', 'ASC')->get();
       return $getsubject;
   }
   
   public static function getStreamSubjects($class_type_id){
       $streamSubjects = Subject::where('class_type_id',$class_type_id)->orderBy('id', 'ASC')->get();
       return $streamSubjects;
   }
   
/*   public static function getTeacherSubject(){
       $getsubject = Subject::orderBy('id', 'ASC');
       
             
                      if(Session::get('role_id') == 2)
            {
                 $subjects = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('subject_id')->get();
                
              if(!empty($subjects))
              {
                   $att = array();
                  foreach($subjects as $item)
                  {
                      $att[] = $item->subject_id;
                  }
                  
                  $getsubject =$getsubject->whereIn('id',$att);
              }
            }
            else
            {
               $getsubject =$getsubject-> groupBy('name');
            }
            
            $getsubject = $getsubject->get();
       return $getsubject;
   }*/

   public static function getFeesGroup(){
       $getFeesGroup = FeesGroup::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'ASC')->get();
       return $getFeesGroup;
   }   



   public static function feesDiscount(){
       $feesDiscount = FeesDiscount::orderBy('id', 'DESC')->get();
       return $feesDiscount;
   }
   
 
   public static function getPaymentMode(){
       $getPaymentMode = PaymentMode::orderBy('id', 'ASC')->get();
       return $getPaymentMode;
   } 

   public static function getStuFeesDetail($fees_group_id,$fees_type_id,$admission_id){
     
        $data = FeesCollect::where('fees_group_id',$fees_group_id)->where('fees_type_id',$fees_type_id)->where('admission_id',$admission_id)->get()->first();
        
       return $data;
   
   }

   public static function feesType(){
       $feesType = FeesMaster::with('FeesGroup')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get();
       return $feesType;
   } 

   public static function onlinePayDetail(){
       $onlinePayDetail = OnlinePaymentTransaction::with('Student')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get()->first();
       return $onlinePayDetail;
   } 
   
   public static function busRoute(){
       $busRoute = BusRoute::where('session_id',Session::get('session_id'));
       
       if(Session::get('branch_id') > 1){
          $data =  $busRoute->where('branch_id',Session::get('branch_id'));
       }
        $data = $busRoute->orderBy('id', 'DESC')->get();
       return $data;
   }
   
   public static function bus(){
       $bus = Bus::where('session_id',Session::get('session_id'));
       
       if(Session::get('role_id') > 1){
           $data = $bus->where('branch_id',Session::get('branch_id'));
       }
        $data = $bus->orderBy('id', 'DESC')->get();
       return $data;
   }
   
   public static function busRouteAssign($route_id){
       $busRouteAssign = BusRouteAssign::with('BusRoute')->with('Bus')->where('route_id',$route_id)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get();
       
       return $busRouteAssign;
   }

   public static function busAssign(){
       $busAssign = BusAssign::with('busId')->with('busRoute')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get()->first();
       
       return $busAssign;
   }   
   
    public static function getUser(){
      $role=Session::get('role_id');
      $user_id=Session::get('id');
      $teacher_id=Session::get('teacher_id');
      $student_id=Session::get('id');
    
        if($role==3){
           $studentData = Admission::with('ClassTypes')->where('id',$student_id)->where('branch_id',Session::get('branch_id'))->get()->first();
        return $studentData;
        }else{
           $userData = User::where('id',$user_id)->get()->first(); 
        return $userData;
        }
          
    }
      
   public static function getHostel(){
       $getHostel = Hostel::where('session_id',Session::get('session_id'));
       if(Session::get('role_id') > 1){
           $getHostel = $getHostel->where('branch_id',Session::get('branch_id'));
       }
       
       $getHostel = $getHostel->orderBy('id', 'DESC')->get();
       return $getHostel;
   }      
      
   public static function getHostelBuilding($hostel_id){
       $getHostelBuilding = HostelBuilding::where('hostel_id',$hostel_id)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get();
       return $getHostelBuilding;
   }      

   public static function getHostelBuildingAll(){
       $getHostelBuildingAll = HostelBuilding::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getHostelBuildingAll;
   } 
   
   public static function getHostelFloor(){
       $getHostelFloor = HostelFloor::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getHostelFloor;
   }
   
   public static function getHostelRoom(){
       $getHostelRoom = HostelRoom::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getHostelRoom;
   }
   
   public static function getHostelBed(){
       $getHostelBed = HostelBed::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getHostelBed;
   }   

   public static function getMessageContent(){
       $getMessageContent = MessageContent::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get();
       return $getMessageContent;
   }      
      
   public static function expanceSum(){
       $expanceSum = Expense::sum('amount');
       return $expanceSum;
   }        
      
    public static function noticeBoard(){
       
        $noticeBoard = NoticeBoard::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))
        ->whereDate('to_date', '>=', date("Y-m-d"))->whereDate('from_date', '<=', date("Y-m-d"))->orderBy('id', 'DESC')->get();
       
       $newData = [];
       foreach($noticeBoard as $item)
       {
            foreach(explode(',', $item->role_id) as $role_id) 
          {
              if($role_id == Session::get('role_id'))
              {
           $newData[]=$item;
              }
                  
              }
       }
       
        return $newData;
    }      
      
   public static function getLibrary(){
       $getLibrary = Library::where('session_id',Session::get('session_id'));
       
       if(Session::get('role_id') > 1){
           $data = $getLibrary->where('branch_id',Session::get('branch_id'));
       }
        $data = $getLibrary->orderBy('id', 'DESC')->get();
       return $data;
   }      
   public static function getRemark(){
       $getRemark = Remark::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
       return $getRemark;
   }      
    
   public static function getSession(){
       $session = Sessions::all();
       return $session;
   }
   
    public static function actionPermission(){
        $actionPermission = PermissionManagement::where('reg_user_id',Session::get('id'))->get()->first();
        return $actionPermission;
    }  

    public static function task(){
       // dd(Session::all());
        
        $task = ToDoList::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('status',1)->orderBy('id','DESC')->get();
        return $task;
    }
 

    public static function homeworkReview(){
        $homeworkReview = HomeworkReview::orderBy('id','ASC')->get();
        return $homeworkReview;
    }
     public static function count($id){
        $homeworkReview = HomeworkDocuments::where('upload_hw_id',$id)->where('status','0')->count(); 
        return $homeworkReview;
    
    
        }

    public static function getHwDocument($id){
       $hwDocument = HomeworkDocuments::where('upload_hw_id',$id)->get();
       return $hwDocument;
   }

    public static function examAtndStu($id){
       $exam = AssignExam::where('exam_id',$id)->get()->first();
       $examAtndStu['atnStu'] = ExamResult::where('exam_id',$id)->count();
       $examAtndStu['examRes'] = ExamResult::where('exam_id',$id)->sum('percentage');
       $examAtndStu['allStu'] = Admission::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('class_type_id',$exam->class_type_id)->where('status',1)->count();
       
       return $examAtndStu;
    } 


    
    public static function chartAttendanceStudents(){
        $att = array();
      
		 
        $att['Present'] = $data=StudentAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',1)->count();
        $att['Absent'] = $data=StudentAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',2)->count();
        $att['Work_From_Home'] = $data=StudentAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',3)->count();
        $att['Half_Day'] = $data=StudentAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',4)->count();
        $att['Holiday'] = $data=StudentAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',5)->count();
        return $att;
   } 
    public static function chartAttendanceTeachers(){
        $att = array();
      
		 
        $att['Present'] = $data=TeacherAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',1)->count();
        $att['Absent'] = $data=TeacherAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',2)->count();
        $att['Work_From_Home'] = $data=TeacherAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',3)->count();
        $att['Half_Day'] = $data=TeacherAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',4)->count();
        $att['Holiday'] = $data=TeacherAttendance::where('date',date('Y-m-d'))->where('session_id',Session::get('session_id'))
		 ->where('branch_id',Session::get('branch_id'))->where('attendance_status_id',5)->count();
        return $att;
   } 


 

    public static function staffAtten($id,$monthId){
        
       
        
        $month = $monthId;
        $year = date("Y");
        $sundays=0;
        if(!empty($monthId)){
            $total_days=date('t', mktime(0, 0, 0, $month, 1, $year));
            for($i=1;$i<=$total_days;$i++)
            if(date('N',strtotime($year.'-'.$month.'-'.$i))==7)
            $sundays++;             
        }
       
       $staffAtten['P'] = TeacherAttendance::where('staff_id',$id)->whereMonth('date',$monthId)->where('current_attendance_status_id',1)->groupBy('date')->get()->count();
       $staffAtten['A'] = TeacherAttendance::where('staff_id',$id)->whereMonth('date',$monthId)->where('current_attendance_status_id',3)->count();
       $staffAtten['W'] = TeacherAttendance::where('staff_id',$id)->whereMonth('date',$monthId)->where('current_attendance_status_id',8)->groupBy('date')->get()->count();
       $staffAtten['HF'] = TeacherAttendance::where('staff_id',$id)->whereMonth('date',$monthId)->where('current_attendance_status_id',4)->groupBy('date')->get()->count();
       $staffAtten['H'] = TeacherAttendance::where('staff_id',$id)->whereMonth('date',$monthId)->where('current_attendance_status_id',5)->groupBy('date')->get()->count();
       $recode = TeacherAttendance::where('staff_id',$id)->whereMonth('date',$monthId)->where('current_attendance_status_id',7)->groupBy('date')->get()->count();
       $staffAtten['d'] = $recode*2;
       $staffAtten['TotalDay'] = Carbon::now()->month($monthId)->daysInMonth; // 28
       $staffAtten['Sunday'] = $sundays; // 28
       return $staffAtten;
    } 


   public static function id($id,$admission_id,$homework_id){
      // $status = HomeworkDocuments::where('upload_hw_id',$id)->where('admission_id',$admission_id)->get(); 
      $status[0] = HomeworkDocuments::select('homework_documents.*','upload.homework_id')
		 ->leftjoin('upload_homeworks as upload','upload.id','homework_documents.upload_hw_id')
		->where('upload.homework_id',$homework_id)->where('homework_documents.admission_id',$admission_id)->count();
      
       $status[1] = HomeworkDocuments::select('homework_documents.*','upload.homework_id')
		 ->leftjoin('upload_homeworks as upload','upload.id','homework_documents.upload_hw_id')
		->where('upload.homework_id',$homework_id)->where('homework_documents.admission_id',$admission_id)->where('homework_documents.status',1)->count();
      
    // dd($status);
       return $status;
   
   
       }

    public static function examData($id){
      $data = ExamResult::select('exam_results.*','Exam.name as exam_name','Admission.first_name','Admission.last_name','Admission.father_name','Admission.mobile')
		 ->leftjoin('admissions as Admission','Admission.id','exam_results.admission_id')
		 ->leftjoin('exams as Exam','Exam.id','exam_results.exam_id')
		 ->where('exam_results.exam_id',$id)->orderBy('id','DESC')->get();
       
       return $data;
   } 


   public static function getBookCategory(){
      $bookCategory = LibraryCategory::orderBy('id', 'DESC')->get();
        return $bookCategory;
  }

    public static function chatUserName($role_id,$table_id){
        if($role_id == 3){
            $chatUserName = Admission::where('id',$table_id)->get()->first();
        }elseif($role_id == 2){
            $chatUserName = User::where('teacher_id',$table_id)->get()->first();
        }else{
            $chatUserName = User::where('id',$table_id)->get()->first();
        }
        return $chatUserName;
    }
    
    public static function monthlyUnits($hostel_room_id,$floor_id,$building_id,$hostel_id){
          
      $data = HostelMeterUnit::where('hostel_room_id',$hostel_room_id)->
      where('floor_id',$floor_id)->
      where('building_id',$building_id)->
      where('hostel_id',$hostel_id)->get();
       return $data;
   }
      public static function monthlyConsumption($month_id,$hostel_room_id,$floor_id,$building_id,$hostel_id){
          
      $data1= TotalDays::where('room_id',$hostel_room_id)->
      where('floor_id',$floor_id)->
      where('building_id',$building_id)->
      where('hostel_id',$hostel_id)->
      where('month_id',$month_id)->groupBy('hostel_assign_id')->get();
      
      $data['people']=count($data1);
      
      $data['days'] = TotalDays::where('room_id',$hostel_room_id)->
      where('floor_id',$floor_id)->
      where('building_id',$building_id)->
      where('hostel_id',$hostel_id)->
      where('month_id',$month_id)->sum('total_days');
       return $data;
   }
      public static function getBillDetails($date,$end_date,$admission_id, $hostel_room_id,$floor_id,$building_id,$hostel_id,$hostel_assign_id){
       
       
   
           $data['assigned_ids'] =  HostelAssign:: where('floor_id',$floor_id)->
       where('building_id',$building_id)->
       where('hostel_id',$hostel_id)->
      // whereMonth('date', '>=', $month_id)->
       get();
       
     
     
        
        
         $day_arr =0;
     $per_head_unit =0;
     
     $carbonDate;
     
     $old_id=[];
     $old_month_id=[];
 
    $i =0;
    $day_arr = 0;
     foreach($data['assigned_ids'] as $item)
     {
       
           $carbonDate = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
           $carbonDate =   $carbonDate->format('n');
  
    //   $lastDayOfMonth = Carbon::createFromDate(date("Y"), $carbonDate)->endOfMonth();
      
                $currentMonthLastDay = Carbon::createFromDate(date("Y"), $carbonDate)->endOfMonth();
    $datetime1 = new DateTime($item['date']);
     $datetime2 = new DateTime($currentMonthLastDay);
 
        
         $carbonDate1 = Carbon::createFromFormat('Y-m-d', $item['date']);
           $carbonDate1 =   $carbonDate1->format('n');
    $monthDiff = $carbonDate-$carbonDate1;
 $joiningDate =$item['date'];

              if($item['date'] != null)
        {
            $joiningDate =Carbon::createFromFormat('Y-m-d',  $joiningDate);
            for($i =0 ; $i<$monthDiff; $i++)
            {
               
           $joiningMonth =   $joiningDate->format('n');
           
         
  
      $lastDayOfMonth = Carbon::createFromDate(date("Y"), $joiningMonth)->endOfMonth();
       $start;
        $days;
      if($i> 0)
      {
          
          $start = new DateTime($joiningDate);
          
          
      }
      else
      {
            $start = new DateTime($item['date']);
      }
     
        $end = new DateTime($lastDayOfMonth);
             $interval = $start->diff($end);
             if($i> 0 )
             {
                       $days = $interval->format('%a')+1;  
             }
             else
             {
                 $days = $interval->format('%a');
             }
                 
                $day_arr += $days;
                $initialDate = Carbon::parse($end);
            //   $joiningMonth =  $initialDate->addDay(1); 
              $joiningDate = \Carbon\Carbon::parse($initialDate->addDay(1)->format('Y-m-d'));
           
           
           $olddata = TotalDays::where('month_id',$joiningMonth)->where('hostel_assign_id',$item['id'])->first();
           
           if(empty($olddata))
           {
           $totalDays = new TotalDays;
           $totalDays->hostel_assign_id = $item['id'];
           $totalDays->total_days = $days;
           $totalDays->month_id = $joiningMonth;
           $totalDays->hostel_id =  $item['hostel_id'];
           $totalDays->building_id =  $item['building_id'];
           $totalDays->floor_id =  $item['floor_id'];
           $totalDays->room_id =  $item['room_id'];
           $totalDays->bed_id =  $item['bed_id'];
           $totalDays->save();
           }
            }
        }
     }
       
        $endDateIds =  HostelAssign:: where('floor_id',$floor_id)->
       where('building_id',$building_id)->
       where('hostel_id',$hostel_id)->
       where('end_date', '!=', null)->
       get();
        
        
        $days1 = 0;
          foreach($endDateIds as $item)
     {
          $endingDate =Carbon::createFromFormat('Y-m-d',  $item['end_date']);
           
               
          $endingMonth =   $endingDate->format('n');
          $firstDayOfMonth1 = Carbon::createFromDate(date("Y"), $endingMonth)->startOfMonth();
          $lastDayOfMonth1 = Carbon::createFromDate(date("Y"), $endingMonth)->endOfMonth();
          $start1 = new DateTime($firstDayOfMonth1);
             $end1= new DateTime($item['end_date']);
         
          $interval1 = $start1->diff($end1);
           
                      $days1 = $interval1->format('%a')+1;  
                  
                       
                $olddata1 = TotalDays::where('month_id',$endingMonth)->where('hostel_assign_id',$item['id'])->first();
       
          if(!empty($olddata1))
          {         
              $olddata2 =TotalDays::where('id',$olddata1['id'])->update(['total_days'=> $days1]);
          }
                       
     }
        
      

    $hostel_assign_total_days = TotalDays::select('total_days.*','payment.status as payment_status','payment.payment_mode_id','payment.id as electricity_id')
        ->leftjoin('electricity_bill_payments as payment','payment.total_days_id','total_days.id')->where('total_days.hostel_assign_id',$hostel_assign_id)->get();
       
           //dd($hostel_assign_total_days);
  
         return $hostel_assign_total_days;
   }
     public static function getExpanceDetails($id){
        $detailsExpance = StudentExpenseDetail::where('student_expense_id',$id)->get();
        return $detailsExpance;
    }
    
    public static function getTimePeriod(){
        $getTimePeriod = TimePeriods::orderBy('id','ASC')->where('branch_id',Session::get('branch_id'))->whereNull('deleted_at')->get();
        return $getTimePeriod;
    }  
    
     public static function getAllTeachers(){
       $getAllTeachers = Teacher::whereNull('deleted_at')->where('branch_id',Session::get('branch_id'))->get();
       return $getAllTeachers;
   
    }
    
    public static function getNote($id){
        $note = AdmitCardNote::where('id',$id)->first();
        return $note;
    }
    
   
    public static function oldScheduleDetails($subject_id,$class_type_id,$exam_id,$stream_id) {
          $old_data = ExaminationScheduleDetail::where('subject_id',$subject_id)
                                ->where('class_type_id',$class_type_id)
                                ->where('exam_id',$exam_id);
                                if($stream_id != '')
                                {
                               $old_data = $old_data->where('stream_id',$stream_id);
                                }
                                $old_data= $old_data->first();
                            // dd($old_data);  
                               return $old_data;
    }
    // public static function getSubjectName($subject_id,$class_type_id,$stream_id) {
         
    //      if($stream_id != ''){
    //          $subject_name = SubjectStreams::where('id',$subject_id)->first();
    //          $name = $subject_name->sub_name;
    //      }
    //      else
    //      {
    //          $subject_name = Subject::where('id',$subject_id)->first();
    //          $name=$subject_name->name;
    //      }
    //      return $name;
    // }
    
     public static function getSubjectName($id){
       $getsubject = Subject::where('id',$id)->first();
      // dd($getsubject);
       return $getsubject->name ?? 'NA';
   }
   
      public static function getSubjectPercentage($id,$subject_id){
       $getSubjectPercentage = ExamResultDigital::where('id',$id)->first();
      
       $decode1 = json_decode($getSubjectPercentage->result);
      
      $data['correct']=0;
      $data['wrong']=0;
      $data['skip']=0;
      $data['total_ques']=0;
      
      foreach($decode1 as $item)
      {
          if($item->subject_id == $subject_id)
          {
              if($item->correct == 2)
              {
                  $data['correct']++ ;
              }
              
              elseif($item->correct == 1)
              {
                  $data['wrong']++;
              }
              elseif($item->correct == 0)
              {
                $data['skip']++;
              }
              
               $data['total_ques']++;
          }
          
      }
      
    
       return $data;
   }
    public static function allstudents() {
        $data =  HostelAssign::select('hostel_assign.*','admissions.first_name','admissions.father_name')
                    ->leftjoin('admissions','admissions.id','hostel_assign.admission_id')
                    ->where('hostel_assign.branch_id', Session::get('branch_id'))
                    ->where('hostel_assign.bed_status', 1)
                    ->orderBy('hostel_assign.id', 'DESC')->get();
        return $data;
    }
    
 
    public static function SidebarSubPerm($sidebar_id) {
        
        $data =  SidebarSub::where('sidebar_id',$sidebar_id)->orderBy('id','ASC')->get();
        $sidebar_sub_id = array();      
            foreach($data as $item){
               $per = PermissionManagement::where('reg_user_id',Session::get('id'))->whereRaw("find_in_set({$item->id}, sidebar_sub_id)")->first();
              if(!empty($per)){
                 $sidebar_sub_id[] = $item->id; 
              }
            }        
        $data2 =  SidebarSub::wherein('id',$sidebar_sub_id);
        if($sidebar_id != 9)
        {
                $data2 = $data2->orderBy('orderBy','ASC');
        }
        else
        {
                        $data2=$data2->orderBy('name','ASC');        
        }
    
    $data2 = $data2->get();
        return $data2;
    }
    
    public static function SubSidebarPerm($sidebarId){
        $data =  SidebarSub::where('sidebar_id',$sidebarId)->orderBy('id','ASC')->get();
        return $data;
    }
    
    public static function getSeatCounts($time_slot_id){
        $total_seats = LibraryCabin::count();
        $time = LibraryTimeSlot::where('id',$time_slot_id)->first();
        $a1=explode(',', $time->not_assign_time_slot_id);
        $a2=array($time_slot_id);
        $seatsCount = LibraryPlan::where('status', 0)->whereIn('library_time_slot_id', array_merge($a1,$a2))->count();
        $seats['available_seats'] = $total_seats - $seatsCount;
        $seats['booked_seats'] = $seatsCount;
        
        return $seats;
    }
    
    public static function getLibraryCabin($library_id){
       $getLibraryCabin = LibraryCabin::where('library_id',$library_id)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get();
       //dd($getLibraryCabin);
       return $getLibraryCabin;
   } 
   
   
     public static function getChapter(){
       $getChapter = ChapterDigital::orderBy('id', 'ASC')->get();
       return $getChapter;
   }
    public static function getTopic(){
       $getTopic = TopicDigital::orderBy('id', 'ASC')->get();
       return $getTopic;
   }
 
 
   public static function getQuestionType(){
       $getQuestionType = QuestionTypeDigital::orderBy('id', 'ASC')->get();
       return $getQuestionType;
   }
 
   public static function getSuka(){
       $getSuka = SukaDigital::orderBy('id', 'ASC')->get();
       return $getSuka;
   }
 
   public static function getUploadBypic(){
       $getUploadBy = UploadByDigital::orderBy('id', 'ASC')->get();
       return $getUploadBy;
   }
    
     public static function getLevel(){
       $getLevel = LevelDigital::orderBy('id', 'ASC')->get();
       return $getLevel;
   }
   
   public static function getExamPattern(){
       $getExamPattern = ExamPatternDigital::orderBy('id', 'ASC')->get();
       return $getExamPattern;
   }
   
   public static function getPrintPreviewSample($module_id){ 
        $data = PrintFileDetails::Select('print_file_details.*','print_file_modules.name as print_file_modules_name' )
            ->leftjoin('print_file_modules','print_file_modules.id', 'print_file_details.print_file_modules_id')->where('print_file_details.id',$module_id)->first();
        
            $module_name = str_replace(' ', '', $data->print_file_modules_name);
            
           
            
           return env('IMAGE_SHOW_PATH').'default/print_file_samples/'.$module_name.'/'.$data->name.'.jpg';
   }
   public static function printPreview($subModule){ 
        
        $printSubModule = PrintFileSubModule::where('name',$subModule)->first();

        $printPreview = PrintFileDetails::select('print_file_details.*','module.name as module_name')
                    ->leftjoin('print_file_settings as settings', 'settings.print_file_details_id', 'print_file_details.id')
                    ->leftjoin('print_file_modules as module', 'module.id', 'print_file_details.print_file_modules_id')
                    ->where('print_file_details.print_file_sub_modules_id',$printSubModule->id)->first();
        
                    
                       $module_name = str_replace(' ', '', $printPreview->module_name);
                       
                       return 'master.printFilePanel.'.$module_name.'.'.$printPreview->name;
    }
    
    
    public static function getAttendance($admission_id,$class_type_id){ 
         
         
        $first_date = StudentAttendance:: where('session_id',Session::get('session_id'))->where('class_type_id',$class_type_id)->orderBy('date', 'ASC')->first();
        $last_date = StudentAttendance:: where('session_id',Session::get('session_id'))->where('class_type_id',$class_type_id)->orderBy('date', 'DESC')->first();
        
        
        if(!empty($first_date))
        {
            
        
        
        $startDate = Carbon::createFromFormat('Y-m-d', date('Y-m-d' ,strtotime($first_date->date)));
        $endDate = Carbon::createFromFormat('Y-m-d', date('Y-m-d' ,strtotime($last_date->date)));

        $totalDays = 0;

        while ($startDate->lte($endDate)) {
            if ($startDate->dayOfWeek !== Carbon::SUNDAY) {
                $totalDays++;
            }

            $startDate->addDay();
        }
        
        
        
            $presentCount = StudentAttendance::where('session_id',Session::get('session_id'))->where('admission_id',$admission_id)->where('attendance_status_id', 1)->count();
            $absentCount = StudentAttendance::where('session_id',Session::get('session_id'))->where('admission_id',$admission_id)->where('attendance_status_id', 2)->count();
            $holidayCount = StudentAttendance::where('session_id',Session::get('session_id'))->where('admission_id',$admission_id)->where('attendance_status_id', 5)->count();
           
            return $presentCount . '/' .($totalDays-$holidayCount );
            
        }
        else
        {
             return 'N/A';
        }
         
    } 
    
    
    
       public static function getExamsForPerformance($class_type_id)
{
    $exams = AssignExam::where('session_id',Session::get('session_id'))->where('class_type_id',$class_type_id)->pluck('exam_id')->implode(',');
    
    return explode(',',$exams);
}
       public static function getPerformaceSubjects($admission_id,$class_type_id)
{
    
    $clsOrder = ClassType::where('id',$class_type_id)->first();
    $streams = [];
    if($clsOrder->orderBy > 10)
    {
        $student = Admission::where('id',$admission_id)->first();
        
        if(!empty($student))
        {
            $streams = explode(',',($student->stream_subject ?? ''));
            
        }
        
         $subject = FillMarks::where('session_id',Session::get('session_id'))->whereIn('subject_id',$streams)->where('admission_id',$admission_id)->groupBy('subject_id')->pluck('subject_id')->implode(',');
   
    }
    else
    {
       $subject = FillMarks::where('session_id',Session::get('session_id'))->where('admission_id',$admission_id)->groupBy('subject_id')->pluck('subject_id')->implode(',');
     
    }
    
    
    
    
    
    return explode(',',$subject);
}
       public static function getPerformaceOtherSubjets($admission_id,$class_type_id)
{
    
    $clsOrder = ClassType::where('id',$class_type_id)->first();
    $streams = [];
    if($clsOrder->orderBy > 10)
    {
        $student = Admission::where('id',$admission_id)->first();
        
        if(!empty($student))
        {
            $streams = explode(',',($student->stream_subject ?? ''));
            
        }
          $subject = PerformanceMarks::where('session_id',Session::get('session_id'))->where('admission_id',$admission_id)->whereIn('subject_id',$streams)->groupBy('subject_id')->pluck('subject_id')->implode(',');

    }
    else
    {
       $subject = PerformanceMarks::where('session_id',Session::get('session_id'))->where('admission_id',$admission_id)->groupBy('subject_id')->pluck('subject_id')->implode(',');
     
    }
    
    

    
    
    return explode(',',$subject);
}
       public static function getPerformaceSubjectsName($subject_ids)
{
   $name = Subject::whereIn('id',$subject_ids)->pluck('name')->implode(',');
    
    return explode(',',$name);
}
       public static function getPerformaceOtherSubjectsName($other_ids)
{
   $name = Subject::whereIn('id',$other_ids)->pluck('name')->implode(',');
    
    return explode(',',$name);
}
       public static function getParticularPerformaceData($admission_id,$exam_id,$subject_id,$class_type_id)
{
    
  
    $marks['mark'] = FillMarks::where('session_id',Session::get('session_id'))
    ->where('admission_id',$admission_id)
    ->where('exam_id',$exam_id)
    ->where('class_type_id',$class_type_id)
    ->where('subject_id',$subject_id)->first();
    $marks['max'] = FillMinMaxMarks::where('session_id',Session::get('session_id'))
    ->where('exam_id',$exam_id)
    ->where('class_type_id',$class_type_id)
    ->where('subject_id',$subject_id)->first();
    
    
    return $marks;
}
       public static function getParticularOtherPerformaceData($admission_id,$exam_id,$other_id,$class_type_id)
{
    
  
    $marks['mark'] = PerformanceMarks::where('session_id',Session::get('session_id'))
    ->where('admission_id',$admission_id)
    ->where('term_id',$exam_id)
    ->where('class_type_id',$class_type_id)
    ->where('subject_id',$other_id)->first();
   
    
    
    return $marks;
}
       public static function getExamMaximumForPerformance($exam_ids,$class_type_id)
{
    $max = FillMinMaxMarks::where('session_id',Session::get('session_id'))->whereIn('exam_id',$exam_ids)->where('class_type_id',$class_type_id)->sum('exam_maximum_marks');
    
    return $max;
    
}
       public static function getExamObtainedForPerformance($exam_ids,$class_type_id,$admission_id)
{
    $obtained = FillMarks::where('session_id',Session::get('session_id'))->whereIn('exam_id',$exam_ids)->where('admission_id',$admission_id)->where('class_type_id',$class_type_id)->sum('student_marks');
    
    return $obtained;
    
}
       public static function getAttendancePerformance($admission_id, $class_type_id)
{
    $first_date = StudentAttendance::where('session_id', Session::get('session_id'))
        ->where('class_type_id', $class_type_id)
        ->orderBy('date', 'ASC')
        ->first();
    $last_date = StudentAttendance::where('session_id', Session::get('session_id'))
        ->where('class_type_id', $class_type_id)
        ->orderBy('date', 'DESC')
        ->first();

    $holidayList = Weekendcalendar::where('session_id', Session::get('session_id'))
        ->where('attendance_status', 5)
        ->pluck('date')
        ->implode(',');

    $holidayList = explode(',', $holidayList);

    if (!empty($first_date)) {
        $startDate = Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime($first_date->date)));
        $endDate = Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime($last_date->date)));

        $totalDays = 0;

        while ($startDate->lte($endDate)) {
            // Convert the current date to a string format that matches the format of dates in $holidayList
            $currentDate = $startDate->format('Y-m-d');

            // Check if the current date is not a Sunday and not in the holidayList
            if ($startDate->dayOfWeek !== Carbon::SUNDAY && !in_array($currentDate, $holidayList)) {
                $totalDays++;
            }

            $startDate->addDay();
        }

        $presentCount = StudentAttendance::where('session_id', Session::get('session_id'))
            ->where('admission_id', $admission_id)
            ->where('attendance_status_id', 1)
            ->count();
        $absentCount = StudentAttendance::where('session_id', Session::get('session_id'))
            ->where('admission_id', $admission_id)
            ->where('attendance_status_id', 2)
            ->count();
        $holidayCount = StudentAttendance::where('session_id', Session::get('session_id'))
            ->where('admission_id', $admission_id)
            ->where('attendance_status_id', 5)
            ->count();
    $percentage = round(($presentCount / $totalDays) * 100) . '%';

    
        return $percentage;
    } else {
        return 'N/A';
    }
}
  public static function getAdmissionDatatableFields(){

        $array = [];

        $array['SR.NO'] ='id';
        $array['Student.Ad. No'] ='admissionNo';
        $array['Image'] ='image';
        $array['Ledger No'] ='ledger_no';
        $array['Srn'] ='srn';
        $array['Name'] ='first_name';
        $array['F Name'] ='father_name';
        $array['M Name'] ='mother_name';
        $array['Class'] ='class_type_id';
        $array['Mobile'] ='mobile';
        $array['D.O.B.'] ='dob';
        $array['State'] ='state_id';
        $array['City'] ='city_id';
        $array['Village'] ='village_city';
        $array['Address'] ='address';
        $array['Pincode'] ='pincode';
        $array['Caste Category'] ='caste_category';
        $array['Blood Group'] ='blood_group';
        $array['House'] ='house';
        $array['Height'] ='height';
        $array['Weight'] ='weight';
        $array['Family Income'] ='family_annual_income';
        $array['Email'] ='email';
        $array['Family Id'] ='family_id';
        $array['Religion'] ='religion';
        $array['Category'] ='category';
        $array['Aadhar'] ='aadhaar';
        $array['Gender'] ='gender_id';
        $array['Father Mobile'] ='father_mobile';
        $array['Father Aadhaar'] ='father_aadhaar';
        $array['Mother Mobile'] ='mother_mob';
        $array['Mother Aadhaar'] ='mother_aadhaar';
        $array['Guardian Name'] ='guardian_name';
        $array['Guardian Mobile'] ='guardian_mobile';
        $array['Admission Type'] ='admission_type_id';
        $array['Bus No.'] ='bus_number';
        $array['Bus Route'] ='bus_route';
        $array['Stoppage'] ='stoppage';
        $array['Transport Charge'] ='transpor_charges';
        $array['Bank Name'] ='bank_name';
        $array['Bank Account'] ='bank_account';
        $array['Branch Name'] ='branch_name';
        $array['IFSC'] ='ifsc';
        $array['MICR Code'] ='micr_code';
        $array['Remark'] ='remark_1';
        $array['Ad. Date'] ='admission_date';
        $array['Transport'] ='transport';
        
        $array['Bank Account Holder'] ='bank_account_holder';
        $array['Optional Subject'] ='optional_subject';
        $array['Urban/Ruler'] ='urban';
        $array['District'] ='district';
        $array['Tehsil'] ='tehsil';
        $array['Father Pancard'] ='father_pancard';
        $array['Mother Pancard'] ='mother_pancard';
        $array['Income Tax Payee Father'] ='income_tax_payee_father';
        $array['Income Tax Payee Mother'] ='income_tax_payee_mother';
        $array['BPL'] ='bpl';
        $array['BPL Certificate No.'] ='bpl_certificate_no';
        $array['Father Occupation'] ='father_occupation';
        $array['Mother Occupation'] ='mother_occupation';
        $array['Aadhar Verified'] ='aadhar_verified';
        $array['Medium'] ='medium';
        
        return $array;
    }
    public static function getMonthWiseFeeCollection(){ 
        
    // Initialize arrays to store month names and values
    $months = [];
    $values = [];

    // Loop through each month (from January to December)
    for ($month = 1; $month <= 12; $month++) {
        // Get the name of the month
        $monthName = Carbon::create(null, $month, 1)->format('F');
        
        // Query to get the sum of amounts collected for the current month
        $totalAmount = FeesDetail::where('session_id', Session::get('session_id'))
                                      ->where('branch_id',Session::get('branch_id'))
                                  ->whereMonth('date', $month)
                                  ->sum('total_amount');

        // Store month name in $months array and value in $values array
        $months[] = $monthName;
        $values[] = $totalAmount;
    }

    return [
        'val1' => $months,
        'val2' => $values
    ];
   }
    public static function getWeeklyWiseFeeCollection(){ 
  // Get today's date
    $today = Carbon::today();

    // Initialize arrays to store dates and values
    $dates = [];
    $values = [];

$startOfMonth = $today->copy()->startOfMonth();  // Start of the current month

$dates = [];
$values = [];

for ($date = $startOfMonth; $date->lte($today); $date->addDay()) {
    // Get the day number without leading zero (e.g., 1, 2, 3)
    $day = $date->format('d-m-Y');  // 'j' gives the day of the month without leading zeros

    // Query to get the sum of amounts collected on the current day
    $totalAmount = FeesDetail::where('session_id', Session::get('session_id'))
                              ->whereDate('date', $date->format('Y-m-d'))
                              ->sum('total_amount');

    // Store the day number and value in respective arrays
    $dates[] = $day;
    $values[] = $totalAmount;
}

// Output the dates and values


   

    return [
        'val1' => $dates,
        'val2' => $values
    ];
   }
}




