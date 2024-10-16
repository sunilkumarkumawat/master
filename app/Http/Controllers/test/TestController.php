<?php

namespace App\Http\Controllers\test;
use Illuminate\Validation\Validator; 
use App\Models\User;
use App\Models\Admission;
use App\Models\ClassType;
use App\Models\hostel\Hostel;
use App\Models\hostel\HostelBuilding;
use App\Models\BillCounter;
use App\Models\Setting;
use App\Models\Invoice;
use App\Models\FeesDetail;
use App\Models\Student;
use App\Models\Master\RegistrationTerms;
use App\Models\hostel\HostelFloor;
use App\Models\hostel\HostelRoom;
use App\Models\hostel\HostelBed;
use App\Models\hostel\StudentExpense;
use App\Models\hostel\HostelAssign;
use App\Models\hostel\HostelDetail;
use App\Models\hostel\HostelFeesDetail;
use App\Models\SmsSetting;
use App\Models\WhatsappSetting;
use App\Models\hostel\Head;
use App\Models\Master\MessageTemplate;
use App\Models\hostel\HostelMeterUnit;
use App\Models\Master\MessageType;
use App\Models\Master\Branch;
use Session;
use Hash;
use Helper;
use File;
use Str;
use Redirect;
use Carbon\Carbon;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller

{

    public function test(){
        
        $data = HostelBed::get();
        
        return view('test.test', ['data' => $data]);
    }


}
