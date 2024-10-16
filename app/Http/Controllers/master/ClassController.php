<?php

namespace App\Http\Controllers\master;
use Illuminate\Validation\Validator; 
use App\Models\User;
use App\Models\Admin;
use App\Models\ClassType;
use Session;
use Hash;
use Str;
use Redirect;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ClassController extends Controller

{

    
   
    public function add(Request $request){
        
        if($request->isMethod('post')){
                $request->validate([
             'name'  => 'required',

         ]);
         
         
         $orderBy = 0;
         
        $arrayOfStrings = [
        'play',
        'kg',
        'nursery',
        'lkg',
        'ukg',
        'prep',
        'first','1',
        'second','2',
        'third','3',
        'fourth','4',
        'fifth','5',
        'sixth','6',
        'seventh','7',
        'eighth','8',
        'ninth','9',
        'tenth','10',
        'eleventh','11',
        'twelfth','12',
        
        
        ];
        $number = ['0','0', '0', '0','0','0','1','1','2','2','3','3',
        '4','4','5','5','6','6','7','7','8','8','9','9','10','10','11','11','12','12'];
        $stringToCheck = strtolower($request->name);
        
        foreach ($arrayOfStrings as $key => $string) {
           if (strpos($stringToCheck,$string) !== false) {
        $orderBy = $number[$key];
        }
}
        $class = new ClassType;//model name
        $class->user_id = Session::get('id');
        $class->session_id = Session::get('session_id');
        $class->branch_id = Session::get('branch_id');
        $class->name =$request->name;
        $class->orderBy =$orderBy;
        
        $class->save();
           
        return redirect::to('add_class')->with('message', 'Students Class add Successfully.');
        
        }    
        $alladd_type =  ClassType::where('session_id',Session::get('session_id'))->where('branch_id',Session('branch_id'));
        
       
            
          $alladd_type = $alladd_type->orderBy('orderBy', 'ASC')->get();
        
            return view('admin.class.add',['data'=>$alladd_type]);
    }    
    
     public function edit(Request $request,$id){
        
        $data = ClassType::find($id);
        if($request->isMethod('post')){
        $request->validate([
            
                 'name'  => 'required',
                 
                 ]);
            
            
                $data->session_id = Session::get('session_id');
                $data->branch_id = Session::get('branch_id');
                $data->name =$request->name;
                $data->save();
                
            return redirect::to('add_class')->with('message', 'Students Update Class Successfully.');
        }
          return view('admin.class.edit',['data'=>$data]);
     }
     
     public function delete(Request $request){
       
        $id = $request->delete_id;
       
        $sss = ClassType::find($id)->delete();
         return redirect::to('add_class')->with('message', 'Class  Delete Successfully.');
    }
     

}
