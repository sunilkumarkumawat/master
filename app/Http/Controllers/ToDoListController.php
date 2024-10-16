<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator; 
use App\Models\ToDoList;
use Session;
use Hash;
use Str;
use Redirect;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToDoListController extends Controller

{

    
    public function addTask(Request $request){
        if($request->isMethod('post')){
            $add = new ToDoList;//model name
            $add->user_id = Session::get('id');
            $add->session_id = Session::get('session_id');
            $add->branch_id = Session::get('branch_id'); 
            $add->name = $request->task;
            $add->status = '1';
    	    $add->save();
        }
    }

    public function deleteTask(Request $request){
        $deleteTask =  ToDoList::find($request->task_id)->delete();
    }

    public function statusTask(Request $request){
        
        if($request->status == 1){
            $data = ToDoList::where('id',$request->id)->update(['status'=>'0']);
        }else{
            $data = ToDoList::where('id',$request->id)->update(['status'=>'1']);
        }
    }




} 
  





