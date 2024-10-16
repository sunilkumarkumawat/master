<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator; 
use App\Models\DownloadCenter;
use App\Models\ExaminationAdmitCard;
use App\Models\Master\TeacherSubject;
use App\Models\FeesCollect;
use App\Models\fees\FeesAssign;
use Session;
use Hash;
use Str;
use Redirect;
use Response;
use Auth;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadController extends Controller

{
    public function downloadCenter(){
        $upload_count = DownloadCenter::where('session_id',Session::get('session_id'))
                             ->where('branch_id',Session::get('branch_id'))->count();
                             
        $assignments_count = DownloadCenter::where('session_id',Session::get('session_id'))
                             ->where('branch_id',Session::get('branch_id'))->where('content_type','Assignments')->count();
                             
        $syllabus_count =  DownloadCenter::where('session_id',Session::get('session_id'))
                             ->where('branch_id',Session::get('branch_id'))->where('content_type','Syllabus')->count();
                             
        $study_material_count =  DownloadCenter::where('session_id',Session::get('session_id'))
                             ->where('branch_id',Session::get('branch_id'))->where('content_type','Study Material')->count();
                             
        $other_doc_count =  DownloadCenter::where('session_id',Session::get('session_id'))
                             ->where('branch_id',Session::get('branch_id'))->where('content_type','Other Downloads')->count();
                             
                             
                            
        return view('download_center.download_center',['upload_count'=>$upload_count,'assignments_count'=>$assignments_count,
                    'syllabus_count'=>$syllabus_count,'study_material_count'=>$study_material_count,'other_doc_count'=>$other_doc_count]);
 
    }
    
    public function upload(Request $request){
        if($request->isMethod('post')){
            $request->validate([
            
            'content_title' => 'required',    
            'content_type' => 'required',    
            'upload_date' => 'required',    
            // 'content_file' => 'required',    
            ]);

            $download_center ='';
                if($request->file('content_file')){
                 $image = $request->file('content_file');
                $path = $image->getRealPath();      
                $download_center =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'download_center';
                $image->move($destinationPath, $download_center);     
            }
                 
            $upload = new DownloadCenter;//model name
            $upload->user_id = Session::get('id');
            $upload->session_id = Session::get('session_id');
            $upload->branch_id = Session::get('branch_id');
            $upload->content_title = $request->content_title;
            $upload->class_type_id = $request->class_search_id;
            $upload->content_type = $request->content_type;
            $upload->upload_date = $request->upload_date;
            $upload->description = $request->description;
            $upload->video_link = $request->video_link;
            $upload->content_file = $download_center;
            $upload->save();
            
            return redirect::to('upload/content')->with('message', 'Content Uploaded Successfully !');
        }   
        $upload_list = DownloadCenter::select('download_center.*','types.name as class_name')
                                ->leftjoin('class_types as types','types.id','download_center.class_type_id')->where('download_center.session_id',Session::get('session_id'))->where('download_center.branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
        if(Session::get('role_id') > 1){
            
                     if(Session::get('role_id') == 2){
                 
                 $classes = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->where('branch_id',Session::get('branch_id'))->groupBy('class_type_id')->get();
                
              if(!empty($classes))
              {
                   $att = array();
                  foreach($classes as $item)
                  {
                      $att[] = $item->class_type_id;
                  }
                  
                  $upload_list = $upload_list->where('branch_id',Session::get('branch_id'))->whereIn('class_type_id',$att);
              }
           
            
        }
           $upload_list = $upload_list->where('branch_id',Session::get('branch_id'));
        }
        return view('download_center.upload',['dataview'=>$upload_list]);
 
    }
    
    public function upload_edit(Request $request,$id){
        $upload = DownloadCenter::find($id);
        if($request->isMethod('post')){
            $request->validate([
            
            'content_title' => 'required',    
            'content_type' => 'required',    
            'upload_date' => 'required',    
            ]);

            $download_center ='';
                if($request->file('content_file')){
                 $image = $request->file('content_file');
                $path = $image->getRealPath();      
                $download_center =  time().uniqid().$image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'download_center';
                $image->move($destinationPath, $download_center); 
                if (File::exists(env('IMAGE_UPLOAD_PATH') . 'download_center/' . $upload->content_file)) {
                    File::delete(env('IMAGE_UPLOAD_PATH') . 'download_center/' . $upload->content_file);
                    }
                
                $upload->content_file = $download_center;
            }
                 
            $upload->user_id = Session::get('id');
            $upload->session_id = Session::get('session_id');
            $upload->branch_id = Session::get('branch_id');
            $upload->content_title = $request->content_title;
            $upload->content_type = $request->content_type;
            $upload->upload_date = $request->upload_date;
            $upload->class_type_id = $request->class_search_id;
             $upload->video_link = $request->video_link;
            $upload->description = $request->description;
            $upload->save();
            
            return redirect::to('upload/content')->with('message', 'Content Updated Successfully !');
        }   
        $upload_list = DownloadCenter::where('session_id',Session::get('session_id'))
                             ->where('branch_id',Session::get('branch_id'))->orderBy('id', 'DESC')->get();
        
        return view('download_center.upload_edit',['dataview'=>$upload_list,'upload_data'=>$upload]);
 
    }
    
    public function download(Request $request,$id){
        $upload_list = DownloadCenter::find($id);
        $image = 'schoolimage/download_center/'.$upload_list['content_file'];
       
        return Response::download($image);
    }    

    public function uploadDelete(Request $request){
       
        $id = $request->delete_id;
        $upload_list = DownloadCenter::find($id);
       
        if(File::exists(env('IMAGE_UPLOAD_PATH').'download_center/'.$upload_list->content_file)){
            File::delete(env('IMAGE_UPLOAD_PATH').'download_center/'.$upload_list->content_file);
        }        
        $upload_delete = DownloadCenter::find($id)->delete();

        return redirect::to('download_center')->with('message', 'Content Deleted Successfully !');
    }
    
    public function assignments(){
     
        $assignments = DownloadCenter::select('download_center.*','types.name as class_name')
                                ->leftjoin('class_types as types','types.id','download_center.class_type_id')
                                ->where('download_center.session_id',Session::get('session_id'))
                                ->where('download_center.branch_id',Session::get('branch_id'));
        
        if(Session::get('role_id') > 1){
        if(Session::get('role_id') == 2){
                       
                 $classes = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('class_type_id')->get();
                
              if(!empty($classes))
              {
                   $att = array();
                  foreach($classes as $item)
                  {
                      $att[] = $item->class_type_id;
                  }
                  
                  $assignments =$assignments->whereIn('class_type_id',$att);
              }
           
            
        }
        
        elseif(Session::get('role_id') == 3){
             
             $assignments = $assignments->where('branch_id',Session::get('branch_id'))->where('class_type_id',Session::get('class_type_id'));
         }
        else
        {
            $assignments = $assignments->where('branch_id',Session::get('branch_id'));
        
        }
        }
        $assignments = $assignments->where('content_type','Assignments')->orderBy('id', 'DESC')->get();
        return view('download_center.assignments',['data'=>$assignments]);  
    }
    
     public function studyMaterials(){
        //$studyMaterials = DownloadCenter::where('session_id',Session::get('session_id'));
        
         $studyMaterials = DownloadCenter::select('download_center.*','types.name as class_name')
                                ->leftjoin('class_types as types','types.id','download_center.class_type_id')
                                ->where('download_center.session_id',Session::get('session_id'))
                                ->where('download_center.branch_id',Session::get('branch_id'));
     
        if(Session::get('role_id') > 1){
            
            if(Session::get('role_id') == 2){
                 
                 $classes = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('class_type_id')->get();
                
              if(!empty($classes))
              {
                   $att = array();
                  foreach($classes as $item)
                  {
                      $att[] = $item->class_type_id;
                  }
                  
                  $studyMaterials =$studyMaterials->whereIn('class_type_id',$att);
              }
           
            
        }
         elseif(Session::get('role_id') == 3){
             
                 $studyMaterials = $studyMaterials->where('branch_id',Session::get('branch_id'))->where('class_type_id',Session::get('class_type_id'));
         }
        
        else
        {
           $studyMaterials = $studyMaterials->where('branch_id',Session::get('branch_id'));
        
        }
           
        }
        $studyMaterials = $studyMaterials->where('content_type','Study Material')->orderBy('id', 'DESC')->get();
                             
                             
                            
        return view('download_center.study_material',['data'=>$studyMaterials]);  
    }
    public function syllabus(){
        //$syllabus = DownloadCenter::where('session_id',Session::get('session_id'));
        
         $syllabus = DownloadCenter::select('download_center.*','types.name as class_name')
                                ->leftjoin('class_types as types','types.id','download_center.class_type_id')
                                ->where('download_center.session_id',Session::get('session_id'))
                                ->where('download_center.branch_id',Session::get('branch_id'));
        
        if(Session::get('role_id') > 1){
            
                 if(Session::get('role_id') == 2){
                     
                 $classes = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('class_type_id')->get();
                
              if(!empty($classes))
              {
                   $att = array();
                  foreach($classes as $item)
                  {
                      $att[] = $item->class_type_id;
                  }
                  
                  $syllabus =$syllabus->whereIn('class_type_id',$att);
              }
           
            
        }
         elseif(Session::get('role_id') == 3){
             
             $syllabus = $syllabus->where('branch_id',Session::get('branch_id'))->where('class_type_id',Session::get('class_type_id'));
         }
        
        
        else
        {
           $syllabus = $syllabus->where('branch_id',Session::get('branch_id'));
        
        }
           
        }
        $syllabus = $syllabus->where('content_type','Syllabus')->orderBy('id', 'DESC')->get();
        return view('download_center.syllabus',['data'=>$syllabus]);  
    }
     public function studentAdmitCard(Request $request){
         
         $data = '';
         $fees =[];
         if(Session::get('role_id') == 3)
         {
             
                   $total_school_fees =  FeesAssign::where('admission_id',Session::get('id'))->first();
          if(!empty($total_school_fees))
                    {
                        $collected_school_fees = FeesCollect::where('admission_id',Session::get('id'))->first();
                        
                      
                        $fees['total_school_fees']  = $total_school_fees->net_amount ?? 0;
                         $fees['collected_school_fees'] =  $collected_school_fees->amount ?? 0;
                    }else
                    {
                         $fees['total_school_fees'] =0;
                         $fees['collected_school_fees'] =0;
                    }
             
      
      $data = ExaminationAdmitCard::select('examination_admit_cards.*','exam.name as exam_name','admission.email','admission.mobile')
                                ->leftjoin('exams as exam','exam.id','examination_admit_cards.exam_id')
                                ->leftjoin('admissions as admission','admission.id','examination_admit_cards.admission_id')
                                ->where('examination_admit_cards.admission_id',Session::get('id'))
                                ->where('examination_admit_cards.branch_id',Session::get('branch_id'))->orderBy('created_at' ,'ASC' )->get();
         }
         else
         {
             $data = [];
         }
         
           return view('download_center.studentAdmitCard',['data'=>$data,'fees'=>$fees]);  
         
     }
     
     public function otherDownloads(){
        //$otherDownloads = DownloadCenter::where('session_id',Session::get('session_id'));
        
        $otherDownloads = DownloadCenter::select('download_center.*','types.name as class_name')
                                ->leftjoin('class_types as types','types.id','download_center.class_type_id')
                                ->where('download_center.session_id',Session::get('session_id'))
                                ->where('download_center.branch_id',Session::get('branch_id'));
        
        if(Session::get('role_id') > 1){
                         if(Session::get('role_id') == 2){
                     
                 $classes = TeacherSubject::where('teacher_id',Session::get('teacher_id'))->groupBy('class_type_id')->get();
                
              if(!empty($classes))
              {
                   $att = array();
                  foreach($classes as $item)
                  {
                      $att[] = $item->class_type_id;
                  }
                  
                  $otherDownloads =$otherDownloads->whereIn('class_type_id',$att);
              }
           
            
        }
         elseif(Session::get('role_id') == 3){
             
               $otherDownloads = $otherDownloads->where('branch_id',Session::get('branch_id'))->where('class_type_id',Session::get('class_type_id'));
         }
        
        else
        {
            $otherDownloads = $otherDownloads->where('branch_id',Session::get('branch_id'));
        
        }
          
        }
        $otherDownloads = $otherDownloads->orderBy('id', 'DESC')->get();
        
        return view('download_center.other_downloads',['data'=>$otherDownloads]);  
    }
}    