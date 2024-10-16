<?php

namespace App\Http\Controllers\master;
use Illuminate\Validation\Validator; 
use App\Models\User;
use App\Models\Master\Homework;
use App\Models\Master\HourlyHomework;
use App\Models\Master\UploadHomework;
use App\Models\Master\HomeworkDocuments;
use App\Models\SmsSetting;
use App\Models\Master\MessageTemplate;
use App\Models\Master\MessageType;
use App\Models\Master\TeacherSubject;
use App\Models\Master\Branch;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Admission;
use App\Models\Teacher;
use App\Helpers\helper;
use Session;
use Hash;
use Str;
use File;
use Redirect;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeworkController extends Controller

{

    public function hwDetailWithoutLogin(Request $request, $id){
       $students = UploadHomework::orderBy('id','DESC')->groupBy('admission_id')->get();


        return view('master.home_work.home_work.details',['students'=>$students]);
    }
    
    public function dashboard(Request $request){

        return view('master.home_work.dashboard');
    }    
    

    public function add(Request $request){
       
        if($request->isMethod('post')){
            $request->validate([
        
          'title'  => 'required',
          'class_type_id'  => 'required',
         'subject'  => 'required',
         'homework_date'  => 'required',
         'submission_date'  => 'required',
         'description'  => 'required',
             
         ]);
         
/*         $stuEmail = Admission::where('class_type_id',$request->class_type_id); 
*/         
            $homework ='';
                if($request->file('content_file')){
                 $image = $request->file('content_file');
                $path = $image->getRealPath();      
                $homework =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'homework';
                $image->move($destinationPath, $homework);      
            }
        
        $addhomework = new Homework;//model name
        $addhomework->user_id = Session::get('id');
        $addhomework->session_id = Session::get('session_id');
        $addhomework->branch_id = Session::get('branch_id');
        $addhomework->teacher_id = Session::get('teacher_id');
		$addhomework->class_type_id = $request->class_type_id;
		$addhomework->title = $request->title;
		$addhomework->subject  = $request->subject;
		$addhomework->homework_date  = $request->homework_date;
		$addhomework->submission_date  = $request->submission_date;
		$addhomework->content_file = $homework;
		$addhomework->description = $request->description;
		$addhomework->view_status = '1';
	
        $addhomework->save();
        
        $template = MessageTemplate::Select('message_templates.*','message_types.slug')
                    ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                    ->where('message_types.status',1)->where('message_types.slug','homework')->first();
            
        $branch = Branch::find(Session::get('branch_id'));
        $setting = Setting::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->first();
        $students = Admission::where('class_type_id',$request->class_type_id)
                    ->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->get();
        
        $subject = Subject::where('id',$request->subject)->first();
          
        for($i = 0; $i < count($students); $i++){
            
            $arrey1 =   array(
                        '{#name#}',
                        '{#subject#}',
                        '{#title#}',
                        '{#description#}',
                        '{#submission_date#}',
                        '{#school_name#}');
                       
            $arrey2 = array(
                        $students[$i]->first_name." ".$students[$i]->last_name,
                        $subject->name,
                        $request->title,
                        strip_tags($request->description),
                        date('d-m-Y',strtotime($request->submission_date)),
                        $setting->name);
                
                if($template->status != 1){
                            if($students[$i]->email != ""){
                                if($branch->email_srvc != 0){
                                    if($template->email_status != 0){
                                        $message = str_replace($arrey1,$arrey2,$template->email_content);
                                        $emailData = ['email' => $students[$i]->email, 'data' => $message, 'subject' => $template->title];
                                        Helper::sendMail('email_print.template_print', $emailData);
                                    } 
                                } 
                            }
                        
                            if($branch->whatsapp_srvc != 0){
                                if ($students[$i]->mobile != ""){
                                    if($template->whatsapp_status != 0){
                                        $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
                                        Helper::sendWhatsappMessage($students[$i]->mobile,$whatsapp);
                                    }
                                }
                            }
                            
                            if($branch->sms_srvc != 0){
                                if($students[$i]->mobile != ""){
                                    if($template->sms_status != 0){
                                        $sms = str_replace($arrey1,$arrey2,$template->sms_content);
                                        Helper::SendMessage($students[$i]->mobile, $sms);
                                    }
                                }
                            }    
                    }

        }           
                    
        
        return redirect::to('homework/index')->with('message', 'Homework Added Successfully.');
        }
        
        return view('master.home_work.home_work.add');
    }

    public function index(Request $request){
        
        $search['class_type_id'] = $request->class_type_id;
        $search['admissionNo'] = $request->admissionNo;
        $search['name'] = $request->name;
        
            $homework = Homework::select('homeworks.*')->with('Subject')->with('ClassType')->with('Teacher')
		    ->leftjoin('admissions as admission','admission.class_type_id','homeworks.class_type_id')
		    ->where('homeworks.session_id',Session::get('session_id'))
		    ->where('homeworks.branch_id',Session::get('branch_id'));           
            
            if(Session::get('role_id') == 3 ){
                $allhomework = $homework->where('homeworks.class_type_id',Session::get('class_type_id'));
            }
            
            
                           if(Session::get('role_id') == 2)
            {
                
                 $checkClassTeacher= Teacher::where('id',Session::get('teacher_id'))->first('class_type_id');
                 
                 $classes = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('class_type_id')->get();
                 $subjects = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('subject_id')->get();
              
               $att1 = array();
                $att2 = array();
              if(!empty($subjects))
              {
                  
                  foreach($subjects as $item)
                  {
                      $att1[] = $item->subject_id;
                  }
                  
                 // $allhomework =$homework->whereIn('homeworks.subject',$att1)->whereIn('teacher_id',[0,Session::get('teacher_id')]);
              }
              if(!empty($checkClassTeacher))
              {
                  $sub = Subject::where('class_type_id',$checkClassTeacher->class_type_id)->get();
                  
                 
                  foreach($sub as $item)
                  {
                      $att1[] = $item->id;
                  }
                  
                  
              }
         
              $allhomework =$homework->whereIn('homeworks.subject',$att1);
       
            //       if(!empty($classes))
            //   {
                  
            //       foreach($classes as $item)
            //       {
            //           $att2[] = $item->class_type_id;
            //       }
                  
            //       $allhomework =$homework->whereIn('homeworks.class_type_id',$att2);
            //   }
          
            }
            
    		 if($request->isMethod('post')){
    		    
    		     if(!empty($request->name)){
            		$allhomework = $homework->where('admission.first_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.last_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.mobile', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.email', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.aadhaar', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.father_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.mother_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.address', 'LIKE', '%'.$request->name.'%');
    		    }
    		    if(!empty($request->class_type_id)){
    		        $allhomework = $homework->where('homeworks.class_type_id',$request->class_type_id);
    		    }
    		    if(!empty($request->admissionNo)){
    		        $allhomework = $homework->where('admission.admissionNo',$request->admissionNo);
    		    }    		    
    		}
    		$allhomework = $homework->groupBy('homeworks.id')->orderBy('id','DESC')->get();
    		$students = UploadHomework::with('Admission')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'));
        		if(Session::get('role_id') == 1){
        		    $students = $students->orderBy('id','DESC')->get();
        		}else{
        		    $students = $students->where('class_type_id',Session::get('class_type_id'))->orderBy('id','DESC')->get();
        		}
            
        return view('master.home_work.home_work.index',['data'=>$allhomework, 'students'=>$students, 'search'=>$search]);
    }

    public function edit(Request $request,$id){
    
        $data = Homework::find($id);

        if($request->isMethod('post')){
                $request->validate([
                    
          'title'  => 'required',
          'class_type_id'  => 'required',
         'subject'  => 'required',
         'homework_date'  => 'required',
         'submission_date'  => 'required',
         'description'  => 'required',      
             
        ]);

        if($request->file('content_file')){
            $image = $request->file('content_file');
            $path = $image->getRealPath();      
            $homework =  time().uniqid().$image->getClientOriginalName();
            $destinationPath = env('IMAGE_UPLOAD_PATH').'homework';
            $image->move($destinationPath, $homework); 
            if (File::exists(env('IMAGE_UPLOAD_PATH') . 'homework/' . $data->content_file)) {
                    File::delete(env('IMAGE_UPLOAD_PATH') . 'homework/' . $data->content_file);
                    }
            $data->content_file = $homework;
         }
       
        $data->user_id = Session::get('id');
        $data->session_id = Session::get('session_id');
        $data->branch_id = Session::get('branch_id');
        if(!empty(Session::get('teacher_id'))){
            
                    $data->teacher_id = Session::get('teacher_id');

        }
        $data->title = $request->title;
        $data->class_type_id = $request->class_type_id;
		$data->subject  = $request->subject;
		$data->homework_date  = $request->homework_date;
		$data->submission_date  = $request->submission_date;
		$data->description  = $request->description;
        $data->save();
               	
        return redirect::to('homework/index')->with('message', 'Homework Updated Successfully.');
        }         
    
        return view('master.home_work.home_work.edit',['data'=>$data]);
    }
   
      public function downloadHomework(Request $request,$id){
        $upload_list = Homework::find($id);
        
        if(File::exists(env('IMAGE_UPLOAD_PATH').'homework/'.$upload_list->content_file)){
            $image = 'schoolimage/homework/'.$upload_list['content_file'];
           
            return Response::download($image);               
        }else{
            return redirect::to('assignments')->with('error', 'No File Found.');
        }
 
    }    

      public function downloadAssignment(Request $request,$img_name){
       
       $image = 'schoolimage/uploadHomework/'.$img_name; 
        return Response::download($image);
 
    } 
    

     public function delete(Request $request){
     
        $id = $request->delete_id;
       
        $HourlyHomework = Homework::find($id);
     
         if (File::exists(env('IMAGE_UPLOAD_PATH') . 'homework/' . $HourlyHomework->content_file)) {
        File::delete(env('IMAGE_UPLOAD_PATH') . 'homework/' . $HourlyHomework->content_file);
        }
         $HourlyHomework->delete();
         return redirect::to('homework/index')->with('message', ' Homework Deleted Successfully.');
    }

    public function uploadHomework(Request $request){
        
        $adminMail = User::where('role_id','1')->get()->first();
        $teacherMail = Teacher::where('class_type_id',Session::get('class_type_id'))->get()->first();
       
        $stu = Admission::where('id',Session::get('id'))->get()->first();

        if($request->isMethod('post')){
            $request->validate([]);


        
            $uploadHW = new UploadHomework;//model name
            $uploadHW->user_id = Session::get('id');
            $uploadHW->session_id = Session::get('session_id');
            $uploadHW->admission_id = Session::get('id');
            $uploadHW->branch_id = Session::get('branch_id');
    		$uploadHW->class_type_id = Session::get('class_type_id');
    		$uploadHW->submission_date  = date('Y-m-d');
    		$uploadHW->message  = $request->message;
    		$uploadHW->homework_id  = $request->homework_id;
    
                /*if($request->hasfile('content_file')){
                    foreach($request->file('content_file') as $key=>$image){
                        $image = $request->file('content_file')[$key];
                        $path = $image->getRealPath();      
                        $homework =  time().uniqid().$image->getClientOriginalName();
                        $destinationPath = env('IMAGE_UPLOAD_PATH').'uploadHomework';
                        $image->move($destinationPath, $homework);     
        
                        $arr[] =   $homework;
                        $image_list = implode($arr,'@');
                    }
                    $uploadHW->content_file  = $image_list;
                }*/		
            $uploadHW->save();
            $upload_hw_id = $uploadHW->id;
                    
            for ($count = 0; $count <= count($request->content_file); $count++) {
                if (isset($request->content_file[$count])) {   
                    
                    $uploadDocument = new HomeworkDocuments;//model name
                    
                    if($request->hasfile('content_file')){
                        $image = $request->file('content_file')[$count];
                        $path = $image->getRealPath();      
                        $document =  time().uniqid().$image->getClientOriginalName();
                        $destinationPath = env('IMAGE_UPLOAD_PATH').'uploadHomework';
                        $image->move($destinationPath, $document);     
                    }
    
                    $uploadDocument->user_id = Session::get('id');
                    $uploadDocument->session_id = Session::get('session_id');
                    $uploadDocument->branch_id = Session::get('branch_id');   
                    $uploadDocument->admission_id = Session::get('id');
                    $uploadDocument->upload_hw_id  = $upload_hw_id;
                    $uploadDocument->content_file  = $document;
                    $uploadDocument->save(); 
                }
            }  

        if(!empty($adminMail['email'] || $teacherMail['email'])){
            $emailData = ['email' => $adminMail['email'], 'first_name' => $stu['first_name'], 'last_name' => $stu['last_name'], 'father_name' => $stu['father_name'], 'dateTime' => date('l jS \of F Y h:i:s A'), 'url' => 'https://www.school.rukmanisoftware.com/homework/detail/1', 'subject' => 'Assignment Upload by Student'];
          Helper::sendMail('email_print.assignment_upload', $emailData);            
        
            $emailData = ['email' => $teacherMail['email'], 'first_name' => $stu['first_name'], 'last_name' => $stu['last_name'], 'father_name' => $stu['father_name'],  'dateTime' => date('l jS \of F Y h:i:s A'), 'url' => 'https://www.school.rukmanisoftware.com/homework/detail/1', 'subject' => 'Assignment Upload by Student'];
            Helper::sendMail('email_print.assignment_upload', $emailData);            
        
            $email_status =UploadHomework::find($upload_hw_id);
            $email_status->email_status  = '1';
            $email_status->save();
        }
     
        return redirect::to('homework/index')->with('message', ' Assignment Upload Successfully.');
        }
    }    

    public function resendUploadHomework(Request $request){
        
        $adminMail = User::where('id','1')->get()->first();
        $teacherMail = User::where('class_type_id',Session::get('class_type_id'))->get()->first();
        $stu = Admission::where('id',Session::get('id'))->get()->first();

        if (!empty($adminMail['email'])) {
            $emailData = ['email' => $adminMail['email'], 'first_name' => $stu['first_name'], 'last_name' => $stu['last_name'], 'father_name' => $stu['father_name'], 'dateTime' => date('l jS \of F Y h:i:s A'), 'url' => 'https://www.school.rukmanisoftware.com/homework/detail/1', 'subject' => 'Assignment Upload by Student'];
            Helper::sendMail('email_print.assignment_upload', $emailData);
        }
        
        if (!empty($teacherMail['email'])) {
            $emailData = ['email' => $teacherMail['email'], 'first_name' => $stu['first_name'], 'last_name' => $stu['last_name'], 'father_name' => $stu['father_name'],  'dateTime' => date('l jS \of F Y h:i:s A'), 'url' => 'https://www.school.rukmanisoftware.com/homework/detail/1', 'subject' => 'Assignment Upload by Student'];
            Helper::sendMail('email_print.assignment_upload', $emailData);
        }        

    }

    public function homeworkDetails(Request $request, $id){
        $search['name'] = $request->name;
        $students = UploadHomework::select('upload_homeworks.*')->with('Admission')->with('ClassType')
        ->where('upload_homeworks.session_id',Session::get('session_id'))->where('upload_homeworks.branch_id',Session::get('branch_id'))->where('homework_id',$id)
        ->leftjoin('admissions as Admission','Admission.id','upload_homeworks.admission_id');
  
    		if($request->isMethod('post')){
    		     if(!empty($request->name)){
            		$students = $students->where('Admission.first_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('Admission.last_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('Admission.mobile', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('Admission.email', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('Admission.aadhaar', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('Admission.father_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('Admission.mother_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('Admission.address', 'LIKE', '%'.$request->name.'%');
    		    }
    		}
        
		if(Session::get('role_id') == 1){
		   $students =  $students->orderBy('id','DESC');
		}else if(Session::get('role_id') == 2){
		    $students = $students->where('upload_homeworks.homework_id',$id)->orderBy('id','DESC');
		}else{
		    $students = $students->where('upload_homeworks.class_type_id',Session::get('class_type_id'))->where('admission_id',Session::get('id'))->orderBy('id','DESC');
		}
		
	$students = $students->groupBy('admission_id')->groupBy('homework_id')->get();
        
    
        return view('master.home_work.home_work.details',['students'=>$students, 'id'=>$id, 'search'=>$search]);
    }

    public function particularHomeworkDetails(Request $request){
       
        
            $data = UploadHomework::with('Admission')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('admission_id',$request->admission_id)->where('homework_id',$request->homework_id)->orderBy('id','DESC')->get();
        
        return view('master.home_work.home_work.data_homework',['data'=>$data]);
    }

    public function evaluateHomework(Request $request){
        
        if($request->isMethod('post')){
           $status = '1';
            foreach($request->id as $key=>$item){
                    $data = HomeworkDocuments::where('id',$request->id[$key])->update(['hw_review'=>$request->review[$key],'status'=>$status,'evaluate_date'=>date('Y-m-d'),'teacher_id'=>Session::get('teacher_id')]);
                }
           
            return redirect::to('homework/index')->with('message', ' Homework Evaluated Successfully.');
        }
    }  

    public function hwAdd(Request $request){
       
        if($request->isMethod('post')){
     
       
           $request->validate([
             'class_type_id'  => 'required',
             'subject'  => 'required',
             'admission_id'  => 'required',
             'times'  => 'required',
             'content_file'  => 'required',
             'title'  => 'required',
         ]);
        
              $homework ='';
                    if($request->file('content_file')){
                     $image = $request->file('content_file');
                    $path = $image->getRealPath();      
                    $homework =  time().uniqid().$image->getClientOriginalName();
                    $destinationPath = env('IMAGE_UPLOAD_PATH').'homework';
                    $image->move($destinationPath, $homework);     
                 }
                
           
                  
        $addhomework = new HourlyHomework;//model name
        $addhomework->user_id = Session::get('id');
        $addhomework->session_id = Session::get('session_id');
        $addhomework->branch_id = Session::get('branch_id');
		$addhomework->class_type_id = $request->class_type_id;
	    $addhomework->admission_id  = $request->admission_id;
		$addhomework->subject  = $request->subject;
		$addhomework->homework_date  = $request->homework_date;
		$addhomework->content_file = $homework;
		$addhomework->title = $request->title;
		$addhomework->times = $request->times;
        $addhomework->save();


        return redirect::to('hourly/hw/view')->with('message', 'Homework Added Successfully.');
        }
        
        return view('master.home_work.hourly.add');
    }

    public function hourlyHomeworkView(Request $request){
        
        $search['class_type_id'] = $request->class_type_id;
        $search['admissionNo'] = $request->admissionNo;
        $search['name'] = $request->name;
        
            $homework = HourlyHomework::select('hourly_homework.*','admission.first_name as first_name','admission.last_name as last_name')           
		    ->leftjoin('admissions as admission','admission.id','hourly_homework.admission_id')
		    ->where('hourly_homework.session_id',Session::get('session_id'))
		    ->where('hourly_homework.branch_id',Session::get('branch_id')); 
            
            if(Session::get('role_id') == 2 ){
                $allhomework = $homework->where('hourly_homework.class_type_id',Session::get('class_type_id'));
            }
            if(Session::get('role_id') == 3 ){
                $allhomework = $homework->where('hourly_homework.admission_id',Session::get('id'));
            }            
    		 if($request->isMethod('post')){
    		    
    		     if(!empty($request->name)){
            		$allhomework = $homework->where('admission.first_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.last_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.mobile', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.email', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.aadhaar', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.father_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.mother_name', 'LIKE', '%'.$request->name.'%')
        		                    ->orWhere('admission.address', 'LIKE', '%'.$request->name.'%');
    		    }
    		    if(!empty($request->class_type_id)){
    		        $allhomework = $homework->where('hourly_homework.class_type_id',$request->class_type_id);
    		    }
    		    if(!empty($request->admissionNo)){
    		        $allhomework = $homework->where('admission.admissionNo',$request->admissionNo);
    		    }    		    
    		}
    		$allhomework = $homework->groupBy('hourly_homework.id')->orderBy('id','DESC')->get();
    	
    // 		$students = UploadHomework::with('Admission')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'));
    //     		if(Session::get('role_id') == 1){
    //     		    $students = $students->orderBy('id','DESC')->get();
        		 
    //     		}else{
    //     		    $students = $students->where('class_type_id',Session::get('class_type_id'))->orderBy('id','DESC')->get();
    //     		}
            
        return view('master.home_work.hourly.view',['data'=>$allhomework,'search'=>$search]);
    }

      public function downloadHourlyHomework(Request $request,$id){
        $upload_list = HourlyHomework::find($id);
        $image = 'schoolimage/homework/'.$upload_list['content_file'];
       
        return Response::download($image);
 
    } 
    
    public function findStudent(Request $request){
        $data = array();
        if($request->isMethod('post')){
            $data = Admission::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))
            ->where('class_type_id',$request->class_type_id)->orderBy('id','DESC')->get();
            $userData ='<option value="">Select</option>';
            foreach($data as $user){
            $userData.='
            <option value="'.$user['id'].'">'.$user['first_name'].'&nbsp;'.$user['last_name'].'</option>';
            }
        echo $userData;
        }
    } 

    public function uploadHourlyHomework(Request $request){

        if($request->isMethod('post')){
            $request->validate([]);

                    if($request->hasfile('student_upload_file')){
                        $image = $request->file('student_upload_file');
                        $path = $image->getRealPath();      
                        $document =  time().uniqid().$image->getClientOriginalName();
                        $destinationPath = env('IMAGE_UPLOAD_PATH').'uploadHomework';
                        $image->move($destinationPath, $document);     
                    }

            $uploadHW = HourlyHomework::where('id',$request->homework_id)->update(['message'=>$request->message,'student_upload_file'=>$document]);
                    
            /*for ($count = 0; $count <= count($request->content_file); $count++) {
                if (isset($request->content_file[$count])) {   
                    
                    $uploadDocument = new HomeworkDocuments;//model name
                    
                    if($request->hasfile('content_file')){
                        $image = $request->file('content_file')[$count];
                        $path = $image->getRealPath();      
                        $document =  time().uniqid().$image->getClientOriginalName();
                        $destinationPath = env('IMAGE_UPLOAD_PATH').'uploadHomework';
                        $image->move($destinationPath, $document);     
                    }
    
                    $uploadDocument->user_id = Session::get('id');
                    $uploadDocument->session_id = Session::get('session_id');
                    $uploadDocument->branch_id = Session::get('branch_id');   
                    $uploadDocument->admission_id = Session::get('id');
                    $uploadDocument->upload_hw_id  = $upload_hw_id;
                    $uploadDocument->content_file  = $document;
                    $uploadDocument->save(); 
                }
            }*/  

        return redirect::to('hourly/hw/view')->with('message', ' Assignment Upload Successfully.');
        }
    } 

    public function hourlyHomeworkDetails(Request $request, $id){
       
         $students = HourlyHomework::select('hourly_homework.*','admission.first_name as first_name','admission.last_name as last_name','admission.father_name')           
		    ->leftjoin('admissions as admission','admission.id','hourly_homework.admission_id')->where('hourly_homework.id',$id)->with('ClassType');

  
		if(Session::get('role_id') == 1){
		   $students =  $students->orderBy('id','DESC')->groupBy('hourly_homework.admission_id')->get();
		}else if(Session::get('role_id') == 2){
		    $students = $students->where('hourly_homework.class_type_id',Session::get('class_type_id'))->groupBy('hourly_homework.admission_id')->orderBy('id','DESC')->get();
	
	 
		}else{
		    $students = $students->where('hourly_homework.class_type_id',Session::get('class_type_id'))->where('hourly_homework.admission_id',Session::get('id'))->groupBy('hourly_homework.admission_id')->orderBy('id','DESC')->get();
		}
        
       
        return view('master.home_work.hourly.details',['students'=>$students, 'id'=>$id]);
    }

    public function particularHourlyHomeworkDetails(Request $request){
        
            $data = HourlyHomework::with('Admission')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('admission_id',$request->admission_id)->orderBy('id','DESC')->get();
        
        return view('master.home_work.hourly.data_homework',['data'=>$data]);
    }

    public function evaluateHourlyHomework(Request $request){
        
        if($request->isMethod('post')){
           $status = '1';
            foreach($request->id as $key=>$item){
                    $data = HourlyHomework::where('id',$request->id[$key])->update(['hw_review'=>$request->review[$key],'status'=>$status,'evaluate_date'=>date('Y-m-d'),'teacher_id'=>Session::get('teacher_id')]);
                }
           
            return redirect::to('hourly/hw/view')->with('message', ' Homework Evaluated Successfully.');
        }
    }  
    
}
