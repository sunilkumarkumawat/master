<?php

namespace App\Http\Controllers\master;
use Illuminate\Validation\Validator; 
use App\Models\User;
use App\Models\Master\Dues;
use Session;
use Hash;
use Str;
use Redirect;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DuesController extends Controller

{
    

    public function add(Request $request){
        
        
        return view('master.dues.add');
    }    
    

    
    
}
