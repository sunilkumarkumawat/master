<?php

namespace App\Http\Controllers\fees;

use Illuminate\Validation\Validator;
use App\Models\Student;
use App\Models\ClassType;
use App\Models\Admission;
use App\Models\BillCounter;
use App\Models\SmsSetting;
use App\Models\Account;
use App\Models\FeesStructure;
use App\Models\FeesGroup;
use App\Models\FeesMaster;
use App\Models\FeesDiscount;
use App\Models\FeesCollect;
use App\Models\Sessions;
use App\Models\PermissionMessages;
use PDF;
use App\Models\FeesDetail;
use App\Models\Invoice;
use App\Models\StoreItem;
use App\Models\StoreItemRequest;
use App\Models\StoreBillingDetail;
use App\Models\Master\MessageTemplate;
use App\Models\Master\Branch;
use App\Models\Master\PaymentMode;
use App\Models\Setting;
use App\Models\fees\FeesAssign;
use App\Models\fees\FeesDetailsInvoices;
use App\Models\fees\FeesAssignDetail;
use Session;
use Helper;
use Hash;
use Str;
use Redirect;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use App\Http\Controllers\WhatsappController;

class FeesController extends Controller

{

    public function FeesGroupRemoveDuplicateEntries()
    {
        $feesAssignDuplicateEntries = FeesAssignDetail::get();
    
        $data = [];
        
        foreach($feesAssignDuplicateEntries as $item)
        {
            if (!isset($data[$item->admission_id])) {
                $data[$item->admission_id] = [];
            }
            $data[$item->admission_id][] = ['group_id' => $item->fees_group_id, 'fees_master_id' => $item->fees_master_id];
        }
        
        $duplicates = [];
    
        foreach($data as $admission_id => $entries)
        {
            $group_ids = array_column($entries, 'group_id');
    
            $counts = array_count_values($group_ids);
            
            $repeated_group_ids = array_filter($counts, function($count) {
                return $count > 1;
            });
    
            if (!empty($repeated_group_ids)) {
                $duplicates[$admission_id] = $entries;
            }
        }
    
        $add = [];
        foreach($duplicates as $key => $admissionIds)
        {
            $classArray = [];
            foreach($admissionIds as $item)
            { 
                $getClass = FeesMaster::where('id', $item['fees_master_id'])->first();
                if (!empty($getClass)) {
                    if (!in_array($getClass->class_type_id, $classArray)) {
                        $classArray[] = $getClass->class_type_id;
                    }
                }
            }
            $add[$key] = $classArray;
        }
        
        
        foreach($add as $key => $admissionIds)
        {
            $deleteClassGroups = []; 
            
            for($i=0; $i < count($admissionIds)-1; $i++)
            {
               $deleteClassGroups[] = $admissionIds[$i]; 
            }
           
           $master = FeesMaster::whereIn('class_type_id',$deleteClassGroups)->pluck('id')->implode(',');
           
           if(!empty($master))
           {
              $master = explode(',',$master); 
           }
           
           $finalDelete = FeesAssignDetail::whereIn('fees_master_id',$master ?? [])->where('admission_id',$key)->delete();
        }
        
    }

    public function feeDashboard()
    {

        return view('fees/fee_dashboard');
    }
    

  
    public function addFees(Request $request){
       
        $serach['name'] = $request->name;
        $serach['admission_type_id'] = $request->admission_type_id ?? '';
        $serach['class_type_id'] = !empty($request->class_type_id) ? $request->class_type_id : 0;
        
        if ($request->isMethod('post')) {
        
            $value = $request->name;
            if ($request->class_type_id > 0 || $request->name != '') {
                $data =  Admission::with('ClassTypes')->where('status', 1)->where('session_id', Session::get('session_id'))->where('school','=',1);
                
                if(Session::get('role_id') > 1){
                    $data = $data->where('branch_id', Session::get('branch_id'));
                }
                if (!empty(Session::get('admin_branch_id'))) {
                   $data = $data->where('branch_id', Session::get('admin_branch_id'));
                }
                    
                if ($request->name != '') {
                    $data = $data->where(function ($query) use ($value) {
                       
                        $query->where('first_name', 'like', '%' . $value . '%');
                        $query->orWhere('userName', 'like', '%' . $value . '%');
                        $query->orWhere('mobile', 'like', '%' . $value . '%');
                        $query->orWhere('aadhaar', 'like', '%' . $value . '%');
                        $query->orWhere('email', 'like', '%' . $value . '%');
                        $query->orWhere('father_name', 'like', '%' . $value . '%');
                        $query->orWhere('mother_name', 'like', '%' . $value . '%');
                        $query->orWhere('address', 'like', '%' . $value . '%');
                        $query->orWhere('admissionNo', 'like', '%' . $value . '%');
                    });
                }
                if ($request->class_type_id != '') {
                    $data = $data->where("class_type_id", $request->class_type_id);
                }
                
                if ($request->admission_type_id != '') {
                    $data = $data->where("admission_type_id", $request->admission_type_id);
                }
                $allstudents = $data->orderBy('id', 'ASC')->get();
            } else {
                return redirect::to('Fees/add')->with('error', 'Please type the input value  !');
            }
    
            return  view('fees.fees_collect.add', ['data' => $allstudents, 'serach' => $serach]);
        }

        return  view('fees.fees_collect.add', ['serach' => $serach]);
    }
    public function feesLedgerCollect(Request $request){
        
         $serach['name'] = $request->name;
        $serach['class_type_id'] = !empty($request->class_type_id) ? $request->class_type_id : 0;
        $serach['sr_no'] = !empty($request->sr_no) ? $request->sr_no : "";
        
        $srno = Admission::where('status', 1)->where('admission_type_id', 1)->where('branch_id', Session::get('branch_id'))->where('session_id', Session::get('session_id'))->where('school','=',1)->whereNotNull('ledger_no')->orderBy('ledger_no')->get();
        
        
        if ($request->isMethod('post')) {
            $request->validate([
               // 'sr_no' => 'required',
            ]);
            $allstudents = Admission::where('branch_id', Session::get('branch_id'))->where('session_id', Session::get('session_id'))->where('status', 1)->where('admission_type_id', 1);
            // if ($request->class_type_id > 0) {
              
            //     $allstudents = $allstudents->where('class_type_id',$request->class_type_id);
            // }
    //   if ($request->class_type_id > 0 && $request->sr_no != '') {
          if ($request->sr_no != '') {
                $allstudents = $allstudents-> where('ledger_no',$request->sr_no);
          }
               
                if (!empty($request->name)) {
                    $value = $request->name;
                    $allstudents = $allstudents->where(function ($query) use ($value) {
                        $query->orWhere('ledger_no', 'like', '%' . $value . '%');
                        $query->orWhere('father_name', 'like', '%' . $value . '%');
                        $query->orWhere('admissionNo', 'like', '%' . $value . '%');
                        $query->orWhere('mobile', 'like', '%' . $value . '%');
                        $query->orWhere('first_name', 'like', '%' . $value . '%');
                        $query->orWhere('last_name', 'like', '%' . $value . '%');
                    });
                }
               
                
                $allstudents = $allstudents->whereNotNull('ledger_no')->get();
                
            return  view('fees.fees_collect.byLedger', ['data' => $allstudents, 'serach' => $serach,'srno_post'=>$request->sr_no,'srno'=>$srno]);
        }
        return  view('fees.fees_collect.byLedger', ['serach' => $serach,'srno'=>$srno]);
    }



   

    


    public function feesGroup(Request $request)
    {
//         $check_for_transportation = FeesGroup::where('name', 'LIKE', '%' . 'transportation' . '%')->first();

// if(empty($check_for_transportation))
// {
//     $fees_group = new FeesGroup; //model name
//             $fees_group->user_id = Session::get('id');
//             $fees_group->session_id = Session::get('session_id');
//             $fees_group->branch_id = Session::get('branch_id');
//             $fees_group->name = 'Transportation Fees';
//             $fees_group->description = 'Transportation Fees';
//             $fees_group->save();
    
// }

        if ($request->isMethod('post')) {
            $request->validate([

                'name' => 'required',
            ]);

                
            $fees_group = new FeesGroup; //model name
            $fees_group->user_id = Session::get('id');
            $fees_group->session_id = Session::get('session_id');
            $fees_group->branch_id = Session::get('branch_id');
            $fees_group->name = $request->name;
            $fees_group->description = $request->description;
            $fees_group->save();
            
            
          
            return redirect::to('feesGroup')->with('message', 'Fees Group Added Successfully !');
        }
        $fees_group_list = FeesGroup::where('session_id', Session::get('session_id'));
        
        if(Session::get('role_id') > 1){
            $fees_group_list = $fees_group_list->where('branch_id', Session::get('branch_id'));
        }
        if (!empty(Session::get('admin_branch_id'))) {
               $fees_group_list = $fees_group_list->where('branch_id', Session::get('admin_branch_id'));
            }
        $fees_group_list = $fees_group_list->orderBy('id', 'ASC')->get();

        return view('fees.fees.feesGroup', ['dataview' => $fees_group_list]);
    }


    public function feesGroupEdit(Request $request, $id)
    {

        $data = FeesGroup::find($id);
        if ($request->isMethod('post')) {
            $request->validate([

                'name' => 'required',
            ]);


            $data->user_id = Session::get('id');
            $data->session_id = Session::get('session_id');
            $data->branch_id = Session::get('branch_id');
            $data->name = $request->name;
            $data->description = $request->description;
            $data->save();

            return redirect::to('feesGroup')->with('message', 'Fees Group Updated Successfully !');
        }
        $fees_group_list = FeesGroup::where('session_id', Session::get('session_id'));
        
        if(Session::get('role_id') > 1){
            $fees_group_list = $fees_group_list->where('branch_id', Session::get('branch_id'));
        }
        if (!empty(Session::get('admin_branch_id'))) {
               $fees_group_list = $fees_group_list->where('branch_id', Session::get('admin_branch_id'));
            }
        $fees_group_list = $fees_group_list->orderBy('id', 'DESC')->get();

        return view('fees.fees.feesGroupEdit', ['data' => $data, 'dataview' => $fees_group_list]);
    }

    public function feesGroupDelete(Request $request)
    {

        $id = $request->delete_id;

        $feesGroup = FeesGroup::find($id)->delete();
        return redirect::to('feesGroup')->with('message', 'Fees Group Deleted Successfully !');
    }

 
    public function studentFeesOnclick(Request $request)
    {
        $this->FeesGroupRemoveDuplicateEntries();
        
        $BillCounter = BillCounter::where('type','FeesSlip')->get()->first();
        
        if (!empty($BillCounter)) {
            $counter = !empty($BillCounter->counter) ? $BillCounter->counter : 0;
            $BillCounterNo = $counter + 1;
        }
        
        $sessionId = $request->session_id ?? Session::get('session_id');
        $checkStudent = Admission::where('session_id',$sessionId)->where('unique_system_id',$request->unique_system_id)->first();
        
        $admission_id = null;
         $data['stuData'] = [];
        if(!empty($checkStudent)){
            $admission_id = $checkStudent->id;
             $data['stuData'] =  Admission::find($admission_id);
        }
        else
        {
             $data['stuData'] = array('first_name'=>'not_found_not_found','class_type_id'=>'not');
        }
        
       
        $data['session_id'] =  $sessionId;
        $data['BillCounter'] =  $BillCounterNo;
        
        $data['sessions'] = [];
        
        $sessions = Sessions::orderBy('id','DESC')->get();
        
        if(!empty($sessions)){
            foreach($sessions as $item){
                if($item->id <= Session::get('session_id')){
                    $data['sessions'][] = $item;
                }
            }
        }
        $data['FeesAssign'] =  FeesAssign::where('session_id',$sessionId)->where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->first();
        $data['FeesCollect'] =  FeesCollect::where('session_id',$sessionId)->where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->first();
        $data['FeesDetailsInvoices'] = FeesDetailsInvoices::where('session_id',$sessionId)->where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->orderBy('id','DESC')->get();
        $data['FeesMaster'] =  FeesMaster::where('session_id',$sessionId)->where('branch_id',Session::get('branch_id'))->where('class_type_id', $data['stuData']['class_type_id'])->get();
        $data['stuFeeDet'] =  FeesDetail::with('PaymentMode')->with('Admission')->with('FeesCollect')->where('session_id',$sessionId)->where('branch_id',Session::get('branch_id'))->where('admission_id', $admission_id)->where('fees_type',0)->orderBy('id','DESC')->get();
        $data['BillCounter'] = BillCounter::where('session_id',$sessionId)->where('branch_id',Session::get('branch_id'))->where('type','FeesSlip')->get()->first();
        $data['inventory'] = StoreItemRequest::where('session_id',$sessionId)->where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->groupBy('receipt_no')->get();

        
        
        if (!empty($data['FeesAssign']->total_amount)) {
            return view('fees.fees_collect.student_bill', ['data' => $data]);
        } else {
             $data = 0;
             echo $data;

        }
    }

/*public function studentPaySubmit(Request $request)
    {
        
   
        $BillCounter = BillCounter::where('type', 'FeesSlip')->get()->first();
        
        $FeesAssign = FeesAssign::where('admission_id',$request->admission_id)->get()->first();

        if ($request->isMethod('post')) {
            
            
            $admission_id = $request->admission_id;
            if (!empty($admission_id)) {

                $counter = !empty($BillCounter->counter) ? $BillCounter->counter : 0;
                $BillCounter->counter = $counter + 1;
                $BillCounter->save();
                
                $payOld = FeesCollect::where('admission_id',$admission_id)->first();
          
      
                if(!empty($payOld)){
                    $pay = $payOld;
                    
                     $discount = FeesCollect::where('admission_id',$admission_id)->increment('discount', $request->discount_amount);
                     $amount = FeesCollect::where('admission_id', $admission_id)->increment('amount', $request->amount);
                     
                $payDetail = new FeesDetail; //model name
                $payDetail->user_id = Session::get('id');
                $payDetail->session_id = Session::get('session_id');
                $payDetail->branch_id = Session::get('branch_id');
                $payDetail->fees_counter_id = Session::get('counter_id');
                $payDetail->fees_collect_id = $payOld->id;
                $payDetail->receipt_no  = $request->slip_no;
                $payDetail->admission_id = $request->admission_id;
                $payDetail->paid_amount = $request->amount;
                $payDetail->payment_mode_id = $request->payment_mode_id;
                $payDetail->discount = $request->discount_amount;
                $payDetail->total_amount = $request->pay_amt;
                $payDetail->discount_remark = $request->discount_remark;
                $payDetail->status = 0;
                $payDetail->date = date('Y-m-d');
                $payDetail->save();  
                     
                     
                }else{
                    
                $pay = new FeesCollect;
                $pay->user_id = Session::get('id');
                $pay->session_id = Session::get('session_id');
                $pay->branch_id = Session::get('branch_id');
                $pay->admission_id = $request->admission_id;
                $pay->fees_assign_id = $FeesAssign->id;
                $pay->amount = $request->amount;
                $pay->discount = $request->discount_amount;
                $pay->save();
                $collect_id = $pay->id;
        

                $payDetail = new FeesDetail; //model name
                $payDetail->user_id = Session::get('id');
                $payDetail->session_id = Session::get('session_id');
                $payDetail->branch_id = Session::get('branch_id');
                $payDetail->fees_counter_id = Session::get('counter_id');
                $payDetail->fees_collect_id = $collect_id;
                $payDetail->receipt_no  = $request->slip_no;
                $payDetail->admission_id = $request->admission_id;
                $payDetail->paid_amount = $request->amount;
                $payDetail->payment_mode_id = $request->payment_mode_id;
                $payDetail->discount = $request->discount_amount;
                $payDetail->total_amount = $request->pay_amt;
                $payDetail->discount_remark = $request->discount_remark;
                $payDetail->status = 0;
                $payDetail->date = date('Y-m-d');
                $payDetail->save();
              }
              
          }
        }




          $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
                            ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                          ->where('message_types.status',1)->where('message_types.slug','fees-collect')->first();
                          
                         
                           
        $admissiondata = Admission::where('id',$request->admission_id)->get()->first(); 
        $branch = Branch::find(Session::get('branch_id'));
        $setting = Setting::where('branch_id',Session::get('branch_id'))->first();
        $payment_mode = PaymentMode::where('id',$request->payment_mode_id)->first();
        $arrey1 = array(
                        '{#name#}',
                        '{#collect_amount#}',
                        '{#method#}',
                        '{#school_name#}');
        $arrey2 = array(
                        $admissiondata->first_name." ".$admissiondata->last_name,
                        $request->amount,
                        $payment_mode->name,
                        $setting->name);
            
              

                $fees_print = FeesDetail::with('Admission')->with('PaymentMode')->with('FeesCollect')->with('ClassTypes')->find($payDetail->id);
                $mobile = $fees_print['Admission']['father_mobile'];
               
                     
                $printPreview =    Helper::printPreview('Fees Collect');
                
                $pdf = PDF::loadView($printPreview,['data'=>$fees_print]);
              
                $file_name = 'Fees Recipt '. $request->slip_no . '-' . time() . ' .pdf';
                $destinationPath = env('IMAGE_UPLOAD_PATH').'fees_receipt_pdf/';
                $file_path = $destinationPath . $file_name;
                file_put_contents($file_path, $pdf->output());
                $file_show_path = env('IMAGE_SHOW_PATH').'fees_receipt_pdf/'.$file_name;
             //   dd($file_show_path);
                
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
                                        Helper::sendWhatsappMessage($request->mobile,$whatsapp,'media',$file_show_path);
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
                
        if ($request->print == 'print') {
            return redirect::to('print_payement/' . $payDetail->id)->with('message', 'Payment Collected Successfully.');
        } else {
            
            return back();
            // return redirect::to('Fees/add')->with('message', 'Payment Collected Successfully.');
    }
}*/
public function inventoryPaySubmit(Request $request)
    {
        
          $enteredAmount = (Int)$request->get('enteredAmount');
    $collectedData = $request->get('collectedData');

    // Sort the array by 'pending' in ascending order
    usort($collectedData, function ($a, $b) {
        return $a['pending'] - $b['pending'];
    });
    
     foreach ($collectedData as $item) {
        $pending = (Int)($item['pending'] ?? 0);
        $receipt = $item['receipt'];
        $admissionId = $item['admission_id'];

        if ($enteredAmount >= $pending) {
            // Deduct the full pending amount and save to the database
            $this->saveStoreReceipt($admissionId, $receipt, $pending);
         
            $enteredAmount -= $pending;
        } else {
            // Partial payment case, if enteredAmount is less than the pending amount
            $this->saveStoreReceipt($admissionId, $receipt, $enteredAmount);
            $enteredAmount = 0;
            break; // Exit the loop as no more amount left to allocate
        }
    }
      
        
        
    }
    
    
    function saveStoreReceipt($admissionId, $receipt, $amount) {

if($amount > 0 )
{
   $pay = new StoreBillingDetail;
   $pay->user_id = Session::get('id');
                $pay->session_id =Session::get('session_id');
                $pay->branch_id = Session::get('branch_id');
                $pay->fees_counter_id = Session::get('counter_id');
   $pay->admission_id = $admissionId;
   $pay->receipt_no = $receipt;
   $pay->amount = $amount;
   $pay->date = date('Y-m-d');
   
   $pay->save();
}}
    public function studentPaySubmit(Request $request)
    { 
        

        
        $cheque_image = '';
   
        $session_id = $request->session_id ?? Session::get('session_id');
        $BillCounter = BillCounter::where('session_id',$session_id)->where('branch_id',Session::get('branch_id'))->where('type', 'FeesSlip')->get()->first();
        
        $FeesAssign = FeesAssign::where('admission_id',$request->admission_id)->get()->first();
    
        $fees_details_id =[];
        $slip = "";
            
        if ($request->isMethod('post')) {
            $admission_id = $request->admission_id;
            
            $data = Admission::where('id',$admission_id)->first();
            
            if (!empty($admission_id)) {
                if (!empty($request->selected_head)) {


            $counter = !empty($BillCounter->counter) ? $BillCounter->counter : 0;
                $BillCounter->counter = $counter + 1;
                $BillCounter->save();
            foreach($request->selected_head as $key=> $head)
            {
                    
                   
                    if( ((int)$request->amount[$key]) != 0  || ((int)$request->discount_amount[$key]) != 0)
               {
                
                
                $payOld = FeesCollect::where('admission_id',$admission_id)->first();
          
      
                if(!empty($payOld)){
                    $pay = $payOld;
                    
                     $discount = FeesCollect::where('admission_id',$admission_id)->increment('discount', $request->discount_amount[$key] ?? 0);
                     $amount = FeesCollect::where('admission_id', $admission_id)->increment('amount', $request->amount[$key] ?? 0);
                     
                $payDetail = new FeesDetail; //model name
                $payDetail->user_id = Session::get('id');
                $payDetail->session_id = $session_id;
                $payDetail->branch_id = Session::get('branch_id');
                $payDetail->fees_counter_id = Session::get('counter_id');
                $payDetail->fees_collect_id = $payOld->id;
                $payDetail->fees_group_id = $head;
                $payDetail->receipt_no  = $request->slip_no[$key];
                $payDetail->admission_id = $admission_id;
                $payDetail->paid_amount = $request->amount[$key]+$request->discount_amount[$key];
                 $payDetail->installment_fine = $request->fine[$key];
                $payDetail->payment_mode_id = $request->payment_mode_id;
                $payDetail->discount = $request->discount_amount[$key];
            
                // if($request->discount_amount[$key] > 0 )
                // {
                //     $feesAssign = FeesAssignDetail::where('admission_id',$admission_id)->where('fees_group_id',$head)->first();
                   
                //   $feesAssign->discount =   $request->discount_amount[$key];
                //     $feesAssign->save();
                // }
                $payDetail->total_amount = $request->amount[$key];
                $payDetail->discount_remark = $request->discount_remark;
                $payDetail->status = 0;
                $payDetail->date = $request->date;
                $payDetail->transition_id = $request->transition_id;
                $payDetail->bank_name = $request->bank_name;
                $payDetail->cheque_date = $request->cheque_date;
                $payDetail->cheque_number = $request->cheque_number;
              
                
                /*$transaction_slip = '';
                if ($request->file('transaction_slip')) {
                    $image = $request->file('transaction_slip');
                    $path = $image->getRealPath();
                    $transaction_slip = time() . uniqid() . $image->getClientOriginalName();
                    $destinationPath = env('IMAGE_UPLOAD_PATH') . 'transaction_slip';
                    $image->move($destinationPath, $transaction_slip);
                }
                
                $payDetail->transaction_slip = $transaction_slip;  */
                
                 if ($request->file('cheque_image')) {
                    $image = $request->file('cheque_image');
                    $path = $image->getRealPath();
                    $cheque_image = time() . uniqid() . $image->getClientOriginalName();
                    $destinationPath = env('IMAGE_UPLOAD_PATH') . 'cheque_image';
                    $image->move($destinationPath, $cheque_image);
                }
                
                
                  $payDetail->cheque_image= $cheque_image ?? '';
                $payDetail->save();  
                     
                     
                     $fees_details_id[]= $payDetail->id;
                     
                }else{
                    
                $pay = new FeesCollect;
                $pay->user_id = Session::get('id');
                $pay->session_id = $session_id;
                $pay->branch_id = Session::get('branch_id');
                $pay->admission_id = $request->admission_id;
                $pay->fees_assign_id = $FeesAssign->id;
                $pay->amount = $request->amount[$key];
               // $pay->discount = $request->discount_amount;
                $pay->save();
                $collect_id = $pay->id;
        

                $payDetail = new FeesDetail; //model name
                $payDetail->user_id = Session::get('id');
                $payDetail->session_id = $session_id;
                $payDetail->branch_id = Session::get('branch_id');
                $payDetail->fees_counter_id = Session::get('counter_id');
                $payDetail->fees_collect_id = $collect_id;
                  $payDetail->fees_group_id = $head;
                $payDetail->receipt_no  = $request->slip_no[$key];
                $payDetail->admission_id = $admission_id;
                $payDetail->paid_amount = $request->amount[$key]+$request->discount_amount[$key];
                $payDetail->installment_fine = $request->fine[$key];
                $payDetail->payment_mode_id = $request->payment_mode_id;
                $payDetail->discount = $request->discount_amount[$key];
                  $payDetail->cheque_date = $request->cheque_date;
                $payDetail->cheque_number = $request->cheque_number;
               $payDetail->cheque_image= $cheque_image ?? '';
                //  if($request->discount_amount[$key] > 0 )
                // {
                //     $feesAssign = FeesAssignDetail::where('admission_id',$admission_id)->where('fees_group_id',$head)->first();
                   
                //   $feesAssign->discount =   $request->discount_amount[$key];
                //     $feesAssign->save();
                // }
                $payDetail->total_amount = $request->amount[$key];
              //  $payDetail->discount_remark = $request->discount_remark;
                $payDetail->status = 0;
                $payDetail->date = $request->date;
                
                /*$transaction_slip = '';
                if ($request->file('transaction_slip')) {
                    $image = $request->file('transaction_slip');
                    $path = $image->getRealPath();
                    $transaction_slip = time() . uniqid() . $image->getClientOriginalName();
                    $destinationPath = env('IMAGE_UPLOAD_PATH') . 'transaction_slip';
                    $image->move($destinationPath, $transaction_slip);
                }
                
                $payDetail->transaction_slip = $transaction_slip;  */
                
                $payDetail->save();
                 
                     $fees_details_id[]= $payDetail->id;
              }
              
          }
            }
            }
            
                if(!empty($fees_details_id))
                {
                    
                  $invoice_count = '';
                  $last = FeesDetailsInvoices::orderBy('id', 'desc')->first();
                   
                  if(!empty($last))
                  {
                      $invoice_count = $last->id;
                  }
                    $invoice = new FeesDetailsInvoices();
                    $invoice->user_id = Session::get('id');
                    $invoice->session_id = $session_id;
                    $invoice->branch_id = Session::get('branch_id');
                    $invoice->admission_id = $admission_id;
                    $invoice->fees_details_id = implode(',',$fees_details_id );
                    $invoice->payment_date = $request->date; 
                    $invoice->payment_mode = $request->payment_mode_id;
                    $invoice->admission_id = $admission_id;
                    $invoice->transaction_id = $request->transition_id;
                    $invoice->bank_name = $request->bank_name;
                    $invoice->cheque_date = $request->cheque_date;
                    $invoice->cheque_number = $request->cheque_number;
                    $invoice->cheque_image= $cheque_image ?? '';
                    $defaultInvoice =  'Invoice_'.$admission_id.'_'.($invoice_count != '' ? ($invoice_count+1) : 1);
                    $invoice->invoice_no = $request->slip_no[$key];
                    $invoice->save();
                    
                    $slip = $invoice->invoice_no;
                }
            }
        }


        


            $response = $this->callAction('printFeesInvoice', [ 
    'request' => new Request([
        'fees_invoice_id' => implode(',',$fees_details_id ),
        'invoice_no' => $slip,
        'sendReceipMedia' =>$request->sendReceipMedia ?? 'no',
        'message_type' => $request->message_type,
        'admission_id' => $admission_id
    ])
]);


  return Response::json(array('status' => 'success','unique_system_id'=>$data->unique_system_id,'session_id' => $data->session_id,'slip'=>$slip,'fees_details_id'=>implode(',',$fees_details_id ))); 
         
    
}
 
    public function viewFees(Request $request)
    {

        $serach['name'] = $request->name;
        $serach['class_type_id'] = $request->class_type_id;
        $serach['starting'] = $request->starting;
        $serach['ending'] = $request->ending;
        $serach['admission_no'] = $request->admission_no;

        $data =  FeesDetail::select('fees_detail.*','class.name as class_name','admissions.school')->with('FeesCollect')->with('PaymentMode')
                    ->leftjoin('admissions as admissions', 'admissions.id', 'fees_detail.admission_id')
                    ->leftjoin('class_types as class','class.id','admissions.class_type_id')
                    ->where('fees_detail.session_id', Session::get('session_id'))->where('fees_type',0);
                    
            if(Session::get('role_id') > 1){
                $data = $data->where('fees_detail.branch_id', Session::get('branch_id'));
            }  
            if (!empty(Session::get('admin_branch_id'))) {
               $data = $data->where('fees_detail.branch_id', Session::get('admin_branch_id'));
            }
                    
        if (!empty($request->name)) {

            $data = $data->where('admissions.first_name', 'LIKE', '%' . $request->name . '%')
                ->orwhere('admissions.last_name', 'LIKE', '%' . $request->name . '%')
                ->orwhere('admissions.father_name', 'LIKE', '%' . $request->name . '%')
                ->orwhere('admissions.mother_name', 'LIKE', '%' . $request->name . '%')
                ->orwhere('admissions.admissionNo', $request->name)
                ->orwhere('admissions.mobile', 'LIKE', '%' . $request->name . '%')
                ->orwhere('admissions.aadhaar', $request->name)
                ->orwhere('admissions.email', 'LIKE', '%' . $request->name . '%');
        }
        if (!empty($request->starting)) {
            $data = $data->whereBetween('fees_detail.date', [$request->starting, $request->ending]);
        }
        if (!empty($request->starting)) {
            $data = $data->whereBetween('fees_detail.date', [$request->starting, $request->ending]);
        }
        
        if (!empty($request->class_type_id)) {
            $data = $data->where("admissions.class_type_id", $request->class_type_id);
        }



        if (Session::get('role_id') == 2) {
            $fees = $data->where('admissions.class_type_id', Session::get('class_type_id'))->orderBy('id', 'DESC')->get();
        } else {
            $fees = $data->where('admissions.school','=',1)->orderBy('id', 'DESC')->get();
        }

        return view('fees.fees_collect.index', ['fees' => $fees, 'serach' => $serach]);
    }
    
    public function studentAssignFeesEdit(Request $request,$admission_id)
    {
            $data = FeesCollect::select('fees_collect.*','class.name as class_name',
                                'admissions.school','admissions.first_name','admissions.last_name','admissions.admissionNo','admissions.father_name','admissions.id as admission_id','admissions.mobile as mobile')
                                ->leftjoin('admissions as admissions', 'admissions.id', 'fees_collect.admission_id')
                                ->leftjoin('class_types as class','class.id','admissions.class_type_id')
                                ->where('fees_collect.session_id', Session::get('session_id'))
                                ->where('fees_collect.branch_id', Session::get('branch_id'));

            if (!empty(Session::get('admin_branch_id'))) {
               $data = $data->where('fees_collect.branch_id', Session::get('admin_branch_id'));
            }
            if(Session::get('role_id') > 1){
                $data = $data->where('fees_collect.branch_id', Session::get('branch_id'));
            } 
            if ($admission_id != '') {
                $data = $data->where("admissions.id", $admission_id);
            }
            
    
            if (Session::get('role_id') == 2) {
                $fees = $data->where('admissions.class_type_id', Session::get('class_type_id'))->orderBy('id', 'DESC')->first();
            } else {
                $fees = $data->where('admissions.school','=',1)->orderBy('id', 'DESC')->first();
            }
           
            
            $details='';
            if(!empty($fees))
            {
             $details =   FeesDetail:: where('fees_collect_id', $fees->id)->get();
            }       
        
    
            return view('fees.fees_edit.fees_edit', ['fees' => $fees,'details'=>$details]);
    }
    
    
    public function AssignFeesEdit(Request $request,$id){
        
        $data = FeesAssignDetail::select('fees_assign_details.*','fees_group.id as feesGroupId')
                                ->leftJoin('fees_group','fees_group.id','fees_assign_details.fees_group_id')
                                ->where('fees_assign_details.admission_id',$id)
                                ->get();
                                
        $feesAssign = FeesAssign::where('admission_id',$id)->first(); 
        
         if ($request->isMethod('post')) {
            $feesAssign->emi_check = $request->emi_check;
            $feesAssign->save();
            
            for($i=0; $i < count($request->fees_group_id); $i++ ){
                $values = FeesAssignDetail::where('fees_assign_id',$request->fees_assign_id[$i])
                                            ->where('fees_master_id',$request->fees_master_id[$i])
                                            ->where('fees_group_id',$request->fees_group_id[$i])
                                            ->where('admission_id',$id)
                                            ->first();
                if(!empty($values)){
                    $values->fees_group_amount = $request->amount[$i];
                    $values->save();
                }else{
                    $values = new FeesAssignDetail;
                    $values->user_id = Session::get('id');
                    $values->branch_id = Session::get('branch_id');
                    $values->session_id = Session::get('session_id');
                    $values->fees_group_amount = $request->amount[$i];
                    $values->admission_id = $request->admission_id[$i];
                    $values->fees_assign_id = $request->fees_assign_id[$i];
                    $values->fees_master_id = $request->fees_master_id[$i];
                    $values->fees_group_id = $request->fees_group_id[$i];
                    $values->save();
                }
            }
            
            return redirect::to('student_assign_fees')->with('message', 'Assign Fees Update Successfully.');
         }
                                
        return view('fees.assign_fees_student.edit',['data'=>$data,'feesAssign'=>$feesAssign]);
    }
    
    
    public function studentFeesEdit(Request $request)
    { 
           if ($request->isMethod('post')) {
               
               
               $collect_data = FeesCollect::where('id',$request->fees_collect_id)->update([
                   
                   'amount'=>$request->g_amount,
                   'discount'=>$request->g_discount
                   ]);
      
      
      
                foreach($request->fees_detail_id as $key=>$item)
                {
                    
                    
                    $detail_data = FeesDetail::where('id',$item)->update([
                        'fees_counter_id'=>Session::get('counter_id'),
                        'paid_amount'=>$request->amount[$key],
                        'discount'=>$request->discount[$key],
                        'total_amount'=>$request->amount[$key],
                        'installment_fine'=>$request->installment_fine[$key],
                        'date'=>$request->date[$key],
                        // 'total_amount'=>$request->total_amount[$key],
                        'payment_mode_id'=>$request->payment_mode_id[$key],
                        'discount_remark'=>$request->discount_remark[$key],
                        // 'discount_percent'=>$request->discount_percent[$key],
                        ]);
                }
                
                 return redirect::to('fees/ledger')->with('message', 'Fees Updated Successfully !');
           }
        
        
    }



    public function getFeesDetail(Request $request)
    {
        $admission_id = $request->admission_id;
        $fees = FeesCollect::with('Student')->with('ClassTypes')->with('PaymentMode')->orderBy('id', 'DESC')->groupBy('admission_id')->get();
        $feesDetail = FeesDetail::where('admission_id', $admission_id)->with('FeesType')->orderBy('id', 'DESC')->get();
        $html = "";
        $name = "n";
        $count = 1;
        foreach ($feesDetail   as $key => $item) {
            $html .= '<tr><td>' . $count++ . '</td><td>' . $item['FeesType']['name'] . '<input type="hidden" name="fees_type_id[]" value="' . $item['fees_type_id'] . '"></td><td title="Click on the amount for edit"><span id="' . $name . $count . '" class="editable">' . $item['amount'] . '</span></td>
         <td><a href="" class="btn btn-primary  btn-xs ml-3"><i class="fa fa-edit"></i></a></td></tr>';
            // return view('fees.fees_collect.index',['data'=>$fees,'dataview'=>$feesDetail]);
        }
        echo $html;
    }
  

    public function printPayement($id)
    {
        
        $explode = explode(',',$id);
        
        $fess_print = FeesDetail::select('fees_detail.*','admissions.first_name','fees_group.name as fees_group_name','admissions.last_name','class_types.name as class_name','admissions.father_name','admissions.admissionNo','payment_modes.name as payment_mode')
                        ->leftJoin('admissions','admissions.id','fees_detail.admission_id')
                        ->leftJoin('payment_modes','payment_modes.id','fees_detail.payment_mode_id')
                        ->leftJoin('fees_collect','fees_collect.id','fees_detail.fees_collect_id')
                        ->leftJoin('fees_group','fees_group.id','fees_detail.fees_group_id')
                        ->leftJoin('class_types','class_types.id','admissions.class_type_id')
                        ->whereIn('fees_detail.id',$explode)->get();
        
        
        $printPreview = Helper::printPreview('Fees Collect');
        //dd($printPreview);
        return view($printPreview, ['data' => $fess_print]);
        // return view('print_file.student_print.print_fees', ['data' => $fess_print]);
    }
    
    public function printFeesInvoice(Request $request){
       
        $explode = [];
        
        $message = $request->sendReceipMedia ?? 'no';
       
       
     
        $invoice_no = $request->invoice_no ?? "";
        
        if(!empty($request->fees_invoice_id))
        {
            
    
            $explode = explode(',',$request->fees_invoice_id);
        }
        
    
       $fess_print = FeesDetail::select('fees_detail.*','class_types.orderBy as classNumber','admissions.first_name','fees_group.name as fees_group_name','admissions.last_name','class_types.name as class_name','admissions.father_name','admissions.admissionNo','payment_modes.name as payment_mode')
                        ->leftJoin('admissions','admissions.id','fees_detail.admission_id')
                        ->leftJoin('payment_modes','payment_modes.id','fees_detail.payment_mode_id')
                        ->leftJoin('fees_collect','fees_collect.id','fees_detail.fees_collect_id')
                        ->leftJoin('fees_group','fees_group.id','fees_detail.fees_group_id')
                        ->leftJoin('class_types','class_types.id','admissions.class_type_id');
                      
        
        
          
                        if($invoice_no != ''){
                       $fess_print=$fess_print->where('fees_detail.receipt_no',$invoice_no);
                        }
                        else{
                          $fess_print=    $fess_print->whereIn('fees_detail.id',$explode);
                        }
                        $fess_print=$fess_print->get();
                        
        $printPreview = Helper::printPreview('Fees Collect');
        
       //dd($printPreview);
     
       if($message == 'on')
       { 
           
           
           

            $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
                            ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                          ->where('message_types.status',1)->where('message_types.slug','fees-collect')->first();
                          
            $getStudent = Admission::find($request->admission_id);
            $setting = Setting::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->first();
            
            $arrey1 =   array(
                        '{#name#}',
                        '{#collect_amount#}',
                        '{#school_name#}',
                        '{#school_mobile#}');
                       
            $arrey2 = array(
                        $getStudent->first_name." ".$getStudent->last_name,
                        100,
                        $setting->name,
                        $setting->mobile);
                           
    
         $pdf = PDF::loadView($printPreview, ['data' => $fess_print]);
         $pdf->setPaper('A4', 'portrait'); 
 
              $file_name = 'Fees Recipt ' . '-' . time() . ' .pdf';
                $destinationPath = env('IMAGE_UPLOAD_PATH').'fees_receipt_pdf/';
                 $file_path = $destinationPath . $file_name; 
                 file_put_contents($file_path, $pdf->output());
                 $file_show_path = env('IMAGE_SHOW_PATH').'fees_receipt_pdf/'.$file_name;

    if($request->message_type = 'text'){
           $file_show_path = '';
    }
    
    

   $parameters = [
       
        'admission_id' => 1,
        'toMobile' => '9166697302',
        'text' => $template->whatsapp_content,
        'filepath' => $file_show_path, 
    ];
   $controller = new WhatsappController();
    $response = $controller->callAction('messageReadyWhatsappMessage', $parameters);
       }
       return view($printPreview, ['data'=>$fess_print]);
       
       
        //dd($fess_print);
    }
    
    public function printPayementGenerate($id)
    {
        $fess_print = FeesDetail::with('Admission')->with('PaymentMode')->with('FeesCollect')->with('ClassTypes')->find($id);
        //dd($fess_print);
        $printPreview =    Helper::printPreview('Fees Collect');
        //dd($printPreview);
        $randomString = Str::random(10);
        $pdf = PDF::loadView($printPreview, ['data' => $fess_print]);

        file_put_contents(env('IMAGE_UPLOAD_PATH'). 'feesPaymentPdf' . '/' .$randomString.$fess_print->receipt_no . '.pdf', $pdf->output());
        $file_url = env('IMAGE_SHOW_PATH') . 'feesPaymentPdf' . '/' .$randomString.$fess_print->receipt_no . '.pdf';  
        
        FeesDetail::where('id',$id)->update(['fees_pdf_name' => $file_url]);
        return redirect::to('fees/index')->with('message', 'PDF Generated Successfully !');
        
        // return view($printPreview, ['data' => $fess_print]);
        
        // return view('print_file.student_print.print_fees', ['data' => $fess_print]);
    }
    


    public function collectFeesDelete(Request $request)
    {
            $admissionId = $request->admission_id ;
        $fee_invoice_id = $request->fees_invoice_id;
        $data = Admission::where('id',$admissionId)->first();
        $FeesDetailsInvoices = FeesDetailsInvoices::where('session_id',$request->session_id)->where('id',$fee_invoice_id)->first();
        if(!empty($FeesDetailsInvoices)){
            $explode = explode(',', $FeesDetailsInvoices->fees_details_id);
            $fees_detail_ids = FeesDetail::whereIn('id',$explode)->delete();
            $FeesDetailsInvoices->delete();
            
            $total_collected = FeesDetail::where('admission_id',$admissionId)->sum('total_amount');
            
            $fees_collect = FeesCollect::where('admission_id',$admissionId)->first();
            
            $fees_collect->amount= $total_collected;
            $fees_collect->save();
            
        }
    
        return Response::json(array('status' => 'success','unique_system_id'=>$data->unique_system_id,'session_id' => $data->session_id)); 
    }
  /*  public function collectFeesDelete(Request $request)
    {
        $fees_detail_id = $request->fees_detail_id;
        $data = Admission::where('id',$request->admission_id)->first();
        FeesDetail::find($fees_detail_id)->delete();
        FeesCollect::where('id', $request->collect_id)->decrement('amount', $request->revert_amount);
        $FeesDetailsInvoices = FeesDetailsInvoices::where('session_id',$request->session_id)->where('admission_id',$request->admission_id)->get();
        
        
        // dd($FeesDetailsInvoices);
        
        
        
        if(!empty($FeesDetailsInvoices)){
            foreach($FeesDetailsInvoices as $key=> $item){
                $explode = explode(',', $item->fees_details_id);
                
                if(count($explode) > 1){
                    if (in_array($fees_detail_id, $explode)) {
                        $removeIds = array_diff($explode, [$fees_detail_id]);
                        $updatedArray = implode(',', $removeIds);
                        FeesDetailsInvoices::where('id',$item->id)->update(['fees_details_id' => $updatedArray]);
                    }
                }else{
                    $check = FeesDetailsInvoices::where('id',$item->id)->where('fees_details_id',$fees_detail_id)->first();
                    if(!empty($check)){
                        $check->delete();
                    }
                }
            }
        }
    
        return Response::json(array('status' => 'success','unique_system_id'=>$data->unique_system_id,'session_id' => $data->session_id)); 
    }*/

    public function feesSearchData(Request $request)
    {

        $name = $request->post('name');
        $class_type_id = $request->get('class_type_id');
        $fees_type_id = $request->get('fees_type_id');

        $data =  FeesCollect::with('Student')->with('PaymentMode');
        if (!empty($name)) {
            $data = $data->where("student_name", $name);
        }
        if (!empty($class_type_id)) {
            $data = $data->where("class_type_id", $class_type_id);
        }

        $allfees = $data->orderBy('id', 'DESC')->get();


        return  view('fees.fees_collect.fees_search_data', ['data' => $allfees]);
    }

    // public function addStudentFees(Request $request, $id)
    // {

    //     $admission_id = $id;
    //     $data['stuData'] =  Admission::find($admission_id);
    //     $data['stuFeeAmount'] =  FeesMaster::where('class_type_id', $data['stuData']['class_type_id'])->sum('amount');
    //     $data['stuPaidAmount'] =  FeesCollect::where('class_type_id', $data['stuData']['class_type_id'])->where('admission_id', $admission_id)->sum('net_amount');

    //     return view('fees.fees.student_bill_2', ['data' => $data]);
    // }

    public function feesMasterData(Request $request)
    {

        $data =  FeesMaster::find($request->fees_master_id);
        $paidAmount =  FeesDetail::where('class_type_id', $request->class_type_id)->where('fees_type_id', $data['fees_type_id'])->sum('total_amount');
        //dd($data);
        if ($paidAmount > 0) {

            $net_amount =  $data['amount'] - $paidAmount;
        } else {
            $net_amount = $data['amount'];
        }

        echo json_encode($net_amount);
    }

    public function ledgerSave(Request $request)
    {
       
       if(!empty($request->admission_id))
       {
           foreach($request->admission_id as $key => $ids)
           {
               $find = Admission::find($ids);
               $find->ledger_no = $request->ledger_number[0] ?? null; 
               $find->save();
               
           }
            return redirect::to('ledger_update')->with('message', 'Ledger Number Updated Successfully');
       }
    }
    public function ledgerUpdate(Request $request)
    {
          $serach['name'] = $request->name;
        $serach['class_type_id'] = !empty($request->class_type_id) ? $request->class_type_id : 0;
        
        if ($request->isMethod('post')) {
            
            $value = $request->name;
            $data = Admission::with('ClassTypes')->where('status', 1)->where('admission_type_id', 1)->where('session_id', Session::get('session_id'))->where('school','=',1);
                
            if(Session::get('role_id') > 1){
                $data = $data->where('branch_id', Session::get('branch_id'));
            }
            if (!empty(Session::get('admin_branch_id'))) {
               $data = $data->where('branch_id', Session::get('admin_branch_id'));
            }
                
            if (!empty($request->name)) {
                $data = $data->where(function ($query) use ($value) {
                   
                    $query->where('first_name', 'like', '%' . $value . '%');
                    $query->orWhere('userName', 'like', '%' . $value . '%');
                    $query->orWhere('mobile', 'like', '%' . $value . '%');
                    $query->orWhere('aadhaar', 'like', '%' . $value . '%');
                    $query->orWhere('email', 'like', '%' . $value . '%');
                    $query->orWhere('father_name', 'like', '%' . $value . '%');
                    $query->orWhere('mother_name', 'like', '%' . $value . '%');
                    $query->orWhere('address', 'like', '%' . $value . '%');
                    $query->orWhere('admissionNo', 'like', '%' . $value . '%');
                });
            }
            
            if (!empty($request->class_type_id)) {
                $data = $data->where("class_type_id", $request->class_type_id);
            }
                
            $allstudents = $data->orderBy('id', 'DESC')->get();
            return  view('fees.fees_collect.studentSearchList', ['data' => $allstudents]);
        }

      return view('fees.fees_collect.ledgerUpdate',['serach' => $serach]);
    
        
        
    }

    public function feesLedger(Request $request)
    {
        $search['name'] = $request->name;
        $search['class_type_id'] = $request->class_type_id ?? '';
        $serach['starting'] = $request->starting;
        $serach['ending'] = $request->ending;
        
        $data = Admission::select('admissions.*','fees_assigns.total_amount','fees_detail.fees_counter_id','fees_detail.date','class_types.name as className','fees_assigns.total_discount as assign_discount','fees_collect.amount as collect_amount', 'fees_collect.discount')
                                        ->leftJoin('fees_assigns as fees_assigns', 'fees_assigns.admission_id', 'admissions.id')
                                        ->leftJoin('class_types', 'class_types.id', 'admissions.class_type_id')
                                        ->leftJoin('fees_collect as fees_collect', 'fees_collect.admission_id', 'admissions.id')
                                        ->leftJoin('fees_detail as fees_detail', 'fees_detail.admission_id', 'admissions.id')
                                        ->where('admissions.admission_type_id',1)
                                        ->where('admissions.status',1)
                                        ->where('admissions.school',1)
                                        ->groupBy('admissions.id');
        if ($request->isMethod('post')) {
            if (!empty($request->name)) {
                $value = $request->name;

                $data = $data->where(function ($query) use ($value) {
                    $query->where("admissions.first_name", 'like', '%' . $value . '%');
                    $query->orwhere("admissions.last_name", 'like', '%' . $value . '%');
                    $query->orwhere("admissions.mobile", 'like', '%' . $value . '%');
                    $query->orwhere("admissions.email", 'like', '%' . $value . '%');
                    $query->orwhere("admissions.aadhaar", 'like', '%' . $value . '%');
                    $query->orwhere("admissions.father_name", 'like', '%' . $value . '%');
                    $query->orwhere("admissions.mother_name", 'like', '%' . $value . '%');
                    $query->orwhere("admissions.address", 'like', '%' . $value . '%');
                });
            }
            if (!empty($request->class_type_id)) {
                $data = $data->where('admissions.class_type_id',$request->class_type_id);
            }
            if (!empty($request->starting)) {
            $data = $data->whereBetween('fees_detail.date', [$request->starting, $request->ending]);
            }
            if (!empty($request->starting)) {
                $data = $data->whereBetween('fees_detail.date', [$request->starting, $request->ending]);
            }
        }
        if (Session::get('role_id') == 2) {
            $data = $data->where('admissions.class_type_id', Session::get('class_type_id'))->where('admissions.branch_id', Session::get('branch_id'))->where('admissions.session_id', Session::get('session_id'))->orderBy('admissions.id', 'DESC')->get();
        } else {
            $data = $data->where('admissions.branch_id', Session::get('branch_id'))->where('admissions.session_id', Session::get('session_id'))->orderBy('admissions.id', 'DESC')->get();
        }


        return view('fees.ledger.view', ['data' => $data, 'search' => $search]);
    }

    public function feesLedgerPrint($id)
    {
        $data['stuData'] = FeesAssign::select('fees_assigns.*','admissions.first_name','admissions.last_name','admissions.mobile','admissions.father_name','admissions.email')
                            ->leftJoin('admissions','admissions.id','fees_assigns.admission_id')->where('admission_id', $id)->first();
                            
        $data['stuPaidDetail'] = FeesDetail::select('fees_detail.*','modes.name','feesgroup.name as fees_name')
                                 ->leftJoin('payment_modes as modes','modes.id','fees_detail.payment_mode_id')
                                 ->leftJoin('fees_group as feesgroup','feesgroup.id','fees_detail.fees_group_id')
                                 ->where('fees_detail.admission_id',$id)->where('fees_detail.fees_type',0)->get();
                                 
            //dd($data['stuPaidDetail']);                
            
        $data['total_collect'] = FeesDetail::where('admission_id', $id)->where('admission_id',$id)->sum('total_amount');
        
        $data['total_assign'] = FeesAssign::where('admission_id',$id)->where('admission_id',$id)->sum('total_amount');
        
        $printPreview =    Helper::printPreview('Fees Ledger');
        //dd($printPreview);
        return view($printPreview, ['data' => $data]);
         
        return view('fees.ledger.fees_ledgr_print', ['data' => $data]);
    }
    
    public function LedgerPrint($id)
    {
        $data['stuData'] = FeesAssign::select('fees_assigns.*','admissions.first_name','admissions.last_name','admissions.mobile','admissions.father_name','admissions.email','admissions.admissionNo','admissions.class_type_id')
                           ->leftJoin('admissions','admissions.id','fees_assigns.admission_id')->where('admissions.school',1)->where('fees_assigns.admission_id',$id)->first();
                            
       $data['stuPaidDetail'] = FeesDetail::select('fees_detail.*','modes.name','feesgroup.name as fees_name')
                                 ->leftJoin('payment_modes as modes','modes.id','fees_detail.payment_mode_id')
                                 ->leftJoin('fees_group as feesgroup','feesgroup.id','fees_detail.fees_group_id')
                                 ->where('fees_detail.fees_type',0)->where('fees_detail.admission_id',$id)->get();
   
   // dd($data['stuPaidDetail']);                  
        $data['total_collect'] = FeesDetail::where('fees_type',0)->where('admission_id', $id)->where('admission_id',$id)->sum('total_amount');
       
        $data['stuadmissions'] = Admission::select('admissions.*','class_types.name as class_name')
                                 ->leftJoin('class_types','class_types.id','admissions.class_type_id')->get()->first();
                              
        $data['total_assign'] = FeesAssign::where('admission_id',$id)->where('admission_id',$id)->sum('total_amount');
      
        $printLager =  Helper::printPreview('Fees Ledger');
        return view($printLager, ['data' => $data]);
        
       // return view('print_file.student_print.lager_print', ['data' => $data]);
    }
    
    
    
     public function studentAssignFees(Request $request)
    {
         $search['admissionNo'] = $request->admissionNo;
        $search['class_type_id'] = $request->class_type_id;
        $search['name'] = $request->name;
        

 $data = Admission::select('admissions.*', 'fees_assigns.total_amount')
                            ->leftJoin('fees_assigns as fees_assigns','fees_assigns.admission_id','admissions.id');
                            
        if ($request->isMethod('post')) {
    
            $request->validate([]);
            if (!empty($request->name)) {
                $value = $request->name;
                $data = $data->where(function ($query) use ($value) {
                    $query->where('first_name', 'LIKE', '%' . $value . '%');
                    $query->orWhere('last_name', 'LIKE', '%' . $value . '%');
                    $query->orWhere('father_name', 'LIKE', '%' . $value . '%');
                    $query->orWhere('mother_name', 'LIKE', '%' . $value . '%');
                    $query->orWhere('mobile', 'LIKE', '%' . $value . '%');
                    $query->orWhere('email', 'LIKE', '%' . $value . '%');
                    $query->orWhere('aadhaar', 'LIKE', '%' . $value . '%');
                    $query->orWhere('address', 'LIKE', '%' . $value . '%');
                });
            }

            if (!empty($request->admissionNo)) {
                $data = $data->where("admissionNo", $request->admissionNo);
            }
            if (!empty($request->class_type_id)) {
                $data = $data->where("class_type_id", $request->class_type_id);
            }
            if (!empty($request->admission_date)) {
                $data = $data->where("admission_date", $request->admission_date);
            }
       
        
              $data = $data->where('school', '>', 0)->where('admissions.branch_id', Session::get('branch_id'))->where('admissions.session_id', Session::get('session_id'))->get();

        }

        return view('fees.assign_fees_student.view', ['data' => $data,'search'=>$search]);
    }
    
    
    
    public function studentFeesDetails(Request $request,$id){
        $payment_modes = PaymentMode::get();
        $data = Admission::where('id',$id)->first();
        $fees['school_fees'] = '';
        $fees['library_fees'] = '';
        $fees['hostel_fees'] = '';
        if($data->school != 0){
           $fees['school_fees'] = FeesDetail::select('fees_detail.*','admissions.first_name','admissions.mobile')
                                    ->leftjoin('admissions','admissions.id','fees_detail.admission_id')
                                    ->where('fees_detail.fees_type',0)->where('fees_detail.admission_id',$id)->orderBy('id', 'DESC')->get();
         $total_school_fees =  FeesAssign::where('admission_id',$id)->first();
          if(!empty($total_school_fees))
                    {
                        $collected_school_fees = FeesCollect::where('admission_id',$id)->first();
                        $fees['total_school_fees']  = $total_school_fees->net_amount ?? 0;
                         $fees['collected_school_fees'] =  $collected_school_fees->amount ?? 0;
                    }else
                    {
                         $fees['total_school_fees'] =0;
                         $fees['collected_school_fees'] =0;
                    }
        }
        if($data->library != 0){
           $fees['library_fees'] = Invoice::select('invoices.*','admissions.first_name as first_name','admissions.mobile','admissions.admissionNo','fees_detail.payment_mode_id') 
                                    ->leftjoin('library_assign as library_assign','library_assign.admission_id','invoices.admission_id')
                                        ->leftjoin('admissions','admissions.id','library_assign.admission_id')
                                        ->leftjoin('fees_detail','fees_detail.invoice_id','invoices.id')
                                        ->where('library_assign.session_id',Session::get('session_id'))
                                        ->where('library_assign.branch_id',Session::get('branch_id'))
                                        ->GroupBy('invoices.id')->where('invoices.invoice_type',0)
                                        ->where('invoices.admission_id',$id)
                                        ->where('admissions.library',1)->orderBy('id', 'DESC')->get();
                                          if(count($fees['library_fees']) != 0)
                    {
                         $fees['total_library_fees']  = $fees['library_fees']->sum('total_amount') ?? 0;
                         $fees['collected_library_fees']  = $fees['library_fees']->sum('paid_amount') ?? 0;
                    }else
                    {
                         $fees['total_library_fees'] = 0;
                         $fees['collected_library_fees'] = 0;
                    }
        }
        if($data->hostel != 0){
           $fees['hostel_fees'] = Invoice::select('invoices.*','admissions.first_name as first_name','admissions.mobile','admissions.admissionNo') 
                                    ->leftjoin('hostel_assign as hostel_assign','hostel_assign.admission_id','invoices.admission_id')
                                        ->leftjoin('admissions','admissions.id','hostel_assign.admission_id')
                                        ->where('hostel_assign.session_id',Session::get('session_id'))
                                        ->where('hostel_assign.branch_id',Session::get('branch_id'))
                                        ->GroupBy('invoices.id')->where('invoices.invoice_type',1)
                                        ->where('invoices.admission_id',$id)
                                        ->where('admissions.hostel',1)->orderBy('id', 'DESC')->get();
                                          if(count($fees['hostel_fees']) != 0)
                    {
                         $fees['total_hostel_fees']  = $fees['hostel_fees']->sum('total_amount') ?? 0;
                         $fees['collected_hostel_fees']  = $fees['hostel_fees']->sum('paid_amount') ?? 0;
                    }else
                    {
                         $fees['total_hostel_fees'] = 0;
                         $fees['collected_hostel_fees'] = 0;
                    }
        }
        return view('master.fees.student_fees_details',['data' => $fees, 'student' => $data,'paymentModes'=>$payment_modes]);
    }
    
    
    public function fees_breakdown_details(Request $request,$id){
        $data = FeesAssignDetail::where('id',$id)->first();
        $student = Admission::where('id',$data->admission_id)->first();
        return view('fees.fees_collect.fees_breakdown',['data' => $data,'student' => $student]);
    }
    public function getFeesGroup(Request $request){
       
   $data =  FeesMaster::Select('fees_master.*','groups.name as fees_group_name','class.name as class_name','session.from_year as from_year','session.to_year as to_year')
                            ->leftjoin('fees_group as groups','groups.id','fees_master.fees_group_id')
                            ->leftjoin('class_types as class','class.id','fees_master.class_type_id')
                            ->leftjoin('sessions as session','session.id','fees_master.session_id')
                          ->where('fees_master.class_type_id',$request->class_type_id)->where('fees_master.session_id', $request->session_id)->get();
          return Response::json(array('data' => $data)); 
    }
    
    
    public function feesRemainderCron(Request $request){
                     
                     
                     $search['class_type_id'] = $request->class_type_id ?? '';
                     $search['admission_type_id'] = $request->admission_type_id ?? '';
        
        $session = Session::get('session_id');
        $admission_ids = Admission::Select('admissions.*','class_types.name as class_name')
                    ->leftjoin('class_types','class_types.id','admissions.class_type_id')
                    ->where('admissions.school',1)->where('admissions.status',1)->where('admissions.session_id',$session)->where('admissions.branch_id', Session::get('branch_id'));
                     
                    if($search['class_type_id']  != '')
                    {
                        
                         $admission_ids = $admission_ids->where('admissions.class_type_id', $search['class_type_id']);
                    }
                    if($search['admission_type_id']  != '')
                    {
                        
                         $admission_ids = $admission_ids->where('admissions.admission_type_id', $search['admission_type_id']);
                    }
                   
                    
                  $admission_ids =$admission_ids->orderBy('admissions.class_type_id','ASC')->get();
                
                   $template = MessageTemplate::Select('message_templates.*','message_types.slug')
                                ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
                                ->where('message_types.status',1)->where('message_types.slug','feesreminder')->first();
                    
                $setting = Setting::first();     
       
       
               $studentArray =[];
              
               foreach($admission_ids as $student)
               {
                       $fees_assigned = FeesAssign::where('admission_id',$student->id)->where('session_id',$session)->first();
                      
                     $fees_collected = FeesCollect::where('admission_id',$student->id)->where('session_id',$session)->first();
                  
                     $isRemaining = (($fees_assigned->total_amount ?? 0)-($fees_assigned->total_discount ?? 0))-($fees_collected->amount ?? 0);
                    // dd($isRemaining);
           
             if($isRemaining >0 )
             {
               $getHead =  FeesAssignDetail::Select('fees_assign_details.*','fees_group.name as group_name')
                        ->leftjoin('fees_group','fees_group.id','fees_assign_details.fees_group_id')
                      
                       ->where('admission_id',$student->id)->where('fees_assign_details.session_id',$session)
                    //   ->whereNotNull('installment_due_date')
                    //   ->whereDate('installment_due_date','<=', date('Y-m-d'))
                       ->get();
                    
                  
          $AllRemainingFees = '';
          $total_pending = 0;
          $remainingAmount = 0;
          $installment_due_date = '';
            foreach($getHead as $head)
            {
            //if($head->installment_due_date >= date('Y-m-d') || $head->installment_due_date === null)
            //{
            $feesDetails = FeesDetail::where('admission_id',$student->id)->where('fees_group_id',$head->fees_group_id)->sum('paid_amount');
       
            $remainingAmount = (($head->fees_group_amount ?? 0) - ($head->discount ?? 0)) - ($feesDetails ?? 0);
                   
                            
        if($remainingAmount > 0)
        {
            $line = $head->group_name . ' = Rs.' . number_format($remainingAmount);
        
            $AllRemainingFees .= $line . "\n";
            
            $total_pending += $remainingAmount;
            $installment_due_date = $head->installment_due_date;
                                }
                                    // }
                                }         
           $AllRemainingFees .= '<span class="bg-danger p-1">*TOTAL PENDING:' . ' = Rs.' . $total_pending.'*</span>';
       
             $arrey1 = array(
                                 '{#name#}',
                                 '{#class_name#}',
                                 '{#fees_remain#}',
                                 '{#school_name#}',
                                 '{#dur_date#}',
                                 );
                       
                    $arrey2 = array(
                                    ($student->first_name ?? 0).' '.($student->last_name ?? ''),
                                    $student->class_name ?? '',
                                   preg_replace('/<br\s*\/?>/', '', nl2br($AllRemainingFees)) ,
                                    $setting->name ?? '',
                                    // date("d-m-Y", strtotime($installment_due_date)),
                                    '',
                                    
                                    );
               
                    $message = str_replace($arrey1,$arrey2,$template->whatsapp_content);       
               //  dd($message);    
                    
            // if($remainingAmount > 0)
            // {
                $studentArray[] =  array( 'id'=>$student->id,
               'name'=>($student->first_name ?? 0).' '.($student->last_name ?? ''),
               'class_type_id'=>$student->class_name,
               'mobile'=>$student->mobile,
                'pendings'=>$AllRemainingFees,
                'message'=>$message,
                );
                //   }
             }
    }
      return view('fees.dues.duesList',['data' => $studentArray,'search'=>$search]);
    }
    
    /*public function getSessionwiseFeesDetails(Request $request){
        if($request->isMethod('post')){
            $data['FeesAssign'] =  FeesAssign::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->first();
            $data['FeesCollect'] =  FeesCollect::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->first();
            $data['FeesDetailsInvoices'] =  FeesDetailsInvoices::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->orderBy('id','DESC')->get();
            $data['FeesMaster'] =  FeesMaster::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('class_type_id', $data['stuData']['class_type_id'])->get();
            $data['stuFeeDet'] =  FeesDetail::with('PaymentMode')->with('Admission')->with('FeesCollect')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->where('admission_id', $admission_id)->where('fees_type',0)->orderBy('id','DESC')->get();
        }
    }*/
    
    
    public function feesModification(Request $request){
        
     
        $admissionNo = $request->admissionNo ?? '';
        $class_type_id= $request->class_type_id ?? '';
        $admission_type_id= $request->admission_type_id_modify ?? '';
        
        
          $data =  FeesAssign::Select('fees_assigns.*','admissions.first_name','admissions.last_name','admissions.admissionNo','admissions.mobile')
                            ->leftjoin('admissions','admissions.id','fees_assigns.admission_id')->where('fees_assigns.session_id',Session::get('session_id'))
             ->where('fees_assigns.branch_id',Session::get('branch_id'));
             
              if($class_type_id != '')
             {
                 $data= $data->where('admissions.class_type_id',$class_type_id);
             }
              if($admission_type_id != '')
             {
                 $data= $data->where('admissions.admission_type_id',$admission_type_id);
             }
             
             
             if($admissionNo != '')
             {
                 $data= $data->where('admissions.admissionNo',$admissionNo);
             }
            
             
             
            $data = $data ->get();
        
             
             
        return view('fees.modification.fees_modification', ['data' => $data]);
        
    }
    
    
    
    
   /* public function updateAssignedFees(Request $request){
        
        $feesAssignedId = $request->fees_assign_detail_id ?? '';
        $amount = $request->amount ?? '';
        $discount = $request->discount ?? '';
        
        $feesAssignDetail = FeesAssignDetail::find($feesAssignedId);
        $admission_id = $feesAssignDetail->admission_id;
        $feesAssignDetail->fees_group_amount = $amount;
        $feesAssignDetail->discount = $discount;
        $feesAssignDetail->save();
        
        
        $feesAssignDetail = FeesAssignDetail::where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->get();    
        
        $total_amount = 0;
        $total_discount = 0;
        if(!empty($feesAssignDetail))
        {
            foreach($feesAssignDetail as $item)
            { 
                $total_amount += $item->fees_group_amount ?? 0;
                $total_discount += $item->discount ?? 0;
                
                 
            }
        }
        
        $feesAssign = FeesAssign::find($feesAssignDetail[0]->fees_assign_id);
        $feesAssign->total_amount = $total_amount ?? 0;
        $feesAssign->total_discount = $total_discount ?? 0;
        $feesAssign->net_amount = $total_amount-$total_discount;
        $feesAssign->save();
        
        
       return Response::json(array('message' =>'Fees Updated Successfully' )); 
        
    }*/
    
     public function updateAssignedFees(Request $request){
        
        $feesAssignedId = $request->fees_assign_detail_id ?? '';
        
        $value = $request->value ?? '';
        $field = $request->field ?? '';
        
        $feesAssignDetail = FeesAssignDetail::find($feesAssignedId);
        
        $admission_id = $feesAssignDetail->admission_id;
        
        $feesAssignDetail->$field = $value;
        $feesAssignDetail->save();

        $feesAssignDetail = FeesAssignDetail::where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->get();    
        
        $total_amount = 0;
        $total_discount = 0;
        if(!empty($feesAssignDetail))
        {
            foreach($feesAssignDetail as $item)
            { 
                $total_amount += $item->fees_group_amount ?? 0;
                $total_discount += $item->discount ?? 0;
                
                 
            }
        }
        
        $feesAssign = FeesAssign::find($feesAssignDetail[0]->fees_assign_id);
        $feesAssign->total_amount = $total_amount ?? 0;
        $feesAssign->total_discount = $total_discount ?? 0;
        $feesAssign->net_amount = $total_amount-$total_discount;
        $feesAssign->save();
        
        
       return Response::json(array('message' =>'Fees Updated Successfully' )); 
        
    }
    
    
    public function deleteAssignedFees(Request $request){
        
        $assign_id = $request->fees_assign_detail_id ?? '' ;
        
        $deleteData = FeesAssignDetail::find($assign_id);
        
        $admission_id = $deleteData->admission_id;
         $deleteData->delete();  
         
         
        $feesAssignDetail=FeesAssignDetail::where('branch_id',Session::get('branch_id'))->where('admission_id',$admission_id)->get();    
        
        
        $total_amount = 0;
        $total_discount = 0;
        if(!empty($feesAssignDetail))
        {
            foreach($feesAssignDetail as $item)
            {
                $total_amount += $item->fees_group_amount ?? 0;
                $total_discount += $item->discount ?? 0;
                
                 
            }
        }
        
        $feesAssign = FeesAssign::find($feesAssignDetail[0]->fees_assign_id);
        $feesAssign->total_amount = $total_amount ?? 0;
        $feesAssign->total_discount = $total_discount ?? 0;
        $feesAssign->net_amount = $total_amount-$total_discount;
        $feesAssign->save();
        
     return Response::json(array('id' =>$assign_id )); 
    
}
    public function getStudentsList(Request $request){
        $fees_assign_details = FeesAssignDetail::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))
                                    ->groupBy('admission_id')->pluck('admission_id')->implode(',');
        $admissionIds = [];
        if(!empty($fees_assign_details)){
            $admissionIds = explode(',', $fees_assign_details);
        }
        
        $class_type_id = $request->class_type_id ?? '';
        $admissionNo= $request->admissionNo ?? '';
        
        
        $data = Admission::where('session_id',Session::get('session_id'))
              
               ->where('status',1)
               ->where('branch_id',Session::get('branch_id'));
                if($class_type_id != ''){
                $data= $data->where('class_type_id', $class_type_id);
            }
if($request->admission_type_id != '')
             {
                 $data = $data->where('admission_type_id',$request->admission_type_id);
             }
            if($admissionNo != ''){
                 $data= $data->where('admissionNo',$admissionNo);
            }
             
           
             
             
            $data = $data->get();
            
        return view('fees.modification.admissionList', ['data' => $data]);
        
    }
    
      public function createFeesInstallment(Request $request){
            
            if(!empty($request->installment_name))
            {
                foreach($request->installment_name as $key=> $name)
                {
                    
                    
        $fees_group = FeesGroup::where('name' , $name)->first();            
                    
                if(!empty($fees_group))
                {
                    $fees_group = $fees_group;
                }
                else
                {
                   $fees_group = new FeesGroup; //model name
                }
             
            $fees_group->user_id = Session::get('id');
            $fees_group->session_id = Session::get('session_id');
            $fees_group->branch_id = Session::get('branch_id');
            $fees_group->name = $name;
            $fees_group->fees_type = 'installment';
            $fees_group->description = $request->description;
            $fees_group->save();
                }
                return redirect::to('feesGroup')->with('message','Fees Group Created successfully');
            }
            
        }
     
        public function createFeesInstallmentClassWise(Request $request){
            if(!empty($request->installmentRow))
            {
                $returnStatus['fees_master'] = [];
                
                foreach($request->installmentRow as $key=> $row)
                {
                    $returnStatus['entry'] = false;
                    $fees_group = FeesGroup::find($request->installment_id[$key]);          
                if(!empty($fees_group))
                {
                    $fees_group = $fees_group;
                }
                
                $fees_group->user_id = Session::get('id');
                $fees_group->session_id = Session::get('session_id');
                $fees_group->branch_id = Session::get('branch_id');
                $fees_group->name = $request->installment_name[$key];
                $fees_group->fees_type = 'installment';
                $fees_group->save();
                
               
             if(!empty($request->installment_class_type_id))
            {
                $fees_master = FeesMaster::where('fees_group_id' , $fees_group->id)->where('class_type_id' , $request->installment_class_type_id)->first();
                
                if(!empty($fees_master))
                {
                    $fees_master = $fees_master;
                    $isUsed1 = FeesDetail::where('fees_group_id',$fees_group->id)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->count();
                    $isUsed2 = FeesAssignDetail::where('fees_group_id',$fees_group->id)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))->count();
                    if(($isUsed1 + $isUsed2) == 0){
                       $returnStatus['entry'] = true;
                       $returnStatus['fees_master'][] = $fees_master->id;
                    }else{
                       $returnStatus['entry'] = false;
                    }
                }
                else
                {
                     $fees_master = new FeesMaster; //model name
                     $returnStatus['entry'] = true;
                     $returnStatus['fees_master'][] = $fees_master->id;
                }
           
                $fees_master->user_id = Session::get('id');
                $fees_master->session_id = Session::get('session_id');
                $fees_master->branch_id = Session::get('branch_id');
                $fees_master->fees_group_id = $fees_group->id;
                $fees_master->amount = $request->installment_value[$key];
                $fees_master->installment_month = $request->installment_month[$key];
                $fees_master->installment_fine = $request->installment_fine[$key];
                $fees_master->installment_due_date = $request->installment_due_date[$key];
                $fees_master->class_type_id = $request->installment_class_type_id;
                $fees_master->save();
            
                }
            
            }
                $returnStatus['class_type_id'] = $request->installment_class_type_id;
            
                return $returnStatus;
            }
            
        }
        
        public function assignFeesMultipleStudents(Request $request){
            if(!empty($request->admissionIds)){
                foreach($request->admissionIds as $admission){
                    if(!empty($request->fees_master_ids)){
                        foreach($request->fees_master_ids as $master_id){
                            $fees_master = FeesMaster::find($master_id);
                            
                            $fees_assign_details = FeesAssignDetail::where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))
                                        ->where('fees_master_id',$master_id)->where('admission_id',$admission)->first();
                                        
                            if(empty($fees_assign_details)){       
                                $feesAssign = FeesAssign::where('admission_id', $admission)->first();
                                if(!empty($feesAssign)){
                                    $feesAssign = $feesAssign;
                                }else{
                                    $feesAssign = new FeesAssign();
                                }
                                
                                $feesAssign->user_id = Session::get('id');
                                $feesAssign->session_id = Session::get('session_id');
                                $feesAssign->branch_id = Session::get('branch_id');
                                $feesAssign->admission_id = $admission;
                                $feesAssign->save();
                        
                                $values = FeesAssignDetail::where('fees_assign_id',$feesAssign->id)
                                            ->where('fees_master_id',$fees_master->id)
                                            ->where('fees_group_id',$fees_master->fees_group_id)
                                            ->where('admission_id',$admission)
                                            ->first();
                                            
                                if(!empty($values)){
                                    $values = $values;
                                }else{
                                     $values = new FeesAssignDetail;
                                }
                               
                                $values->user_id = Session::get('id');
                                $values->branch_id = Session::get('branch_id');
                                $values->session_id = Session::get('session_id');
                                $values->fees_group_amount = $fees_master->amount;
                                $values->admission_id = $admission;
                                $values->fees_assign_id = $feesAssign->id;
                                $values->class_type_id = $fees_master->class_type_id;
                                $values->fees_master_id = $fees_master->id;
                                $values->fees_group_id = $fees_master->fees_group_id;
                                $values->installment_month = $fees_master->installment_month;
                                $values->installment_fine = $fees_master->installment_fine;
                                $values->installment_due_date= $fees_master->installment_due_date;
                                $values->save();
                                
                                $total_assign_detail = FeesAssignDetail::where('admission_id',$admission)->sum('fees_group_amount');
                                $discount_assign_detail = FeesAssignDetail::where('admission_id',$admission)->sum('discount');
                    
                                $amountIncrement = FeesAssign::where('id',$feesAssign->id)->update(['total_amount'=>$total_assign_detail ]);
                                $amountIncrement = FeesAssign::where('id',$feesAssign->id)->update(['net_amount'=>($total_assign_detail-$discount_assign_detail) ]);
                                //   $amountIncrement = FeesAssign::where('id',$feesAssign->id)->increment('total_amount', $request->installment_value[$key] );
                                //   $amountIncrement = FeesAssign::where('id',$feesAssign->id)->increment('net_amount', $request->installment_value[$key] );
                            }             
                        }
                    }
                }
                
                return redirect::to("feesMasterAdd")->with('message','Students Assigned Successfully');
            }
        }
        
        public function getMasterData(Request $request){
            $masterData = FeesMaster::select('fees_master.*','fees_group.name as fees_group_name')
                                    ->leftJoin('fees_group','fees_group.id','fees_master.fees_group_id')
                                    ->where('fees_master.class_type_id',$request->class_type_id)
                                    ->where('fees_master.session_id',Session::get('session_id'))
                                    ->where('fees_master.branch_id',Session::get('branch_id'))
                                    ->get();
            
            return $masterData; 
        }
        
        
        
        
       
    
        
        public function caReport(Request $request){
                 
            $search['name'] = $request->name;
            $search['class_type_id'] = $request->class_type_id ?? '';
            $serach['starting'] = $request->starting;
            $serach['ending'] = $request->ending;
            
            $deletedRecords =  FeesDetail::onlyTrashed()->select('fees_detail.*')->get();
                                    
            $deletedRecordsArray = $deletedRecords->toArray();

          //dd($deletedRecordsArray);
                                    
        $data = FeesDetail::withTrashed()->select('fees_detail.*','fees_counters.name as counter_name','admissions.image','admissions.mobile','admissions.father_name','admissions.first_name','admissions.last_name','admissions.admissionNo','class_types.name as class_name')
                                    ->leftJoin('admissions','admissions.id','fees_detail.admission_id')
                                    ->leftJoin('fees_counters','fees_counters.id','fees_detail.fees_counter_id')
                                    ->leftJoin('class_types','class_types.id','admissions.class_type_id')
                                    ->where('fees_detail.session_id', Session::get('session_id'))
                                    ->where('fees_detail.branch_id', Session::get('branch_id'))->groupBy('receipt_no');
        //dd($data);
        
        if ($request->isMethod('post')) {
        if (!empty($request->name)) {
            $value = $request->name;
            $data = $data->where(function ($query) use ($value) {
                $query->where("admissions.first_name", 'like', '%' . $value . '%')
                    ->orWhere("admissions.last_name", 'like', '%' . $value . '%')
                    ->orWhere("admissions.mobile", 'like', '%' . $value . '%')
                    ->orWhere("admissions.email", 'like', '%' . $value . '%')
                    ->orWhere("admissions.aadhaar", 'like', '%' . $value . '%')
                    ->orWhere("admissions.father_name", 'like', '%' . $value . '%')
                    ->orWhere("admissions.mother_name", 'like', '%' . $value . '%')
                    ->orWhere("admissions.address", 'like', '%' . $value . '%');
            });
        }
        
        if (!empty($request->class_type_id)) {
            $data = $data->where('admissions.class_type_id', $request->class_type_id);
        }
        if (!empty($request->starting)) {
            $data = $data->whereBetween('fees_detail.date', [$request->starting, $request->ending]);
        }
        if (!empty($request->class_type_id)) {
            $data = $data->where("admissions.class_type_id", $request->class_type_id);
        }
    }

    // Apply additional conditions based on the user's role
    if (Session::get('role_id') == 2) {
        $data = $data->where('admissions.class_type_id', Session::get('class_type_id'))
            ->where('admissions.branch_id', Session::get('branch_id'))
            ->where('admissions.session_id', Session::get('session_id'));
    } else {
        $data = $data->where('admissions.branch_id', Session::get('branch_id'))
            ->where('admissions.session_id', Session::get('session_id'));
    }

   $data = $data->where('school', '>', 0)->where('admissions.branch_id', Session::get('branch_id'))->where('admissions.session_id', Session::get('session_id'))->get();
        
        
           return view('fees.reports.CA', ['data' => $data, 'search' => $search]);
       
         
     }
             public function PrintRevertFeesInvoice(Request $request){
                 
               
        
        $invoice_no = $request->invoice_no ?? "";
     
       $fess_print = FeesDetail::onlyTrashed()->select('class_types.orderBy as classNumber','fees_detail.*','admissions.first_name','fees_group.name as fees_group_name','admissions.last_name','class_types.name as class_name','admissions.father_name','admissions.admissionNo','payment_modes.name as payment_mode')
                        ->leftJoin('admissions','admissions.id','fees_detail.admission_id')
                        ->leftJoin('payment_modes','payment_modes.id','fees_detail.payment_mode_id')
                        ->leftJoin('fees_collect','fees_collect.id','fees_detail.fees_collect_id')
                        ->leftJoin('fees_group','fees_group.id','fees_detail.fees_group_id')
                        ->leftJoin('class_types','class_types.id','admissions.class_type_id');
                      
                       $fess_print=$fess_print->where('fees_detail.receipt_no',$invoice_no);
                      
                        $fess_print=$fess_print->get();
                 return view('master.printFilePanel.FeesManagement.template6',['data' => $fess_print]);
             }
    
}

