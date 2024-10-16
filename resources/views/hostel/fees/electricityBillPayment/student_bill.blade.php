 @php

$getPaymentMode = Helper::getPaymentMode();
use Carbon\Carbon;
@endphp             
        
 
 <div class="row">
     <div class="col-12 col-md-12 text-center"> <h3>Electricity Bill Pay</h3></div>
      <div class="col-12 col-md-12">
            <form action="{{ url('hostel/fees/electricity/pay') }}" method="post">
                                 @csrf
          <table class="_table table-striped table-bordered" id="tableId">
              <thead class="bg-primary">
                                      <tr>
                                        <!--<th class="text-danger">Fees Type*</th>-->
                                       <th>Sr.No.</th>
                                       <th>Month</th>
                                       <th>Total Days</th>
                                        <th class="text-danger">Total Monthly Unit*</th>
                                        <th class="text-danger">Monthly Consumption Unit*</th>
                                        <th class="text-danger">Per Unit Rate*</th>
                                        <th class="text-danger">Amount</th>
                                        <th class="text-danger">Payment Mode</th>
                                        <th class="text-danger">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         
                                 @php      
                                 
            $value =   Helper::getBillDetails($data['stuData']['date'],$data['stuData']['end_date'],$data['stuData']['admission_id'] ,$hostel_room_id,$floor_id,$building_id,$hostel_id,$data['stuData']['id']); 
         
               @endphp
               
             @if(!empty($value))
             @foreach($value as $key => $item)
             
            
            @if($month_id == $item->month_id)
             
                    <tr>
                                <td>
                                    {{$key+1}}
                                <input type="hidden" name="hostel_assign_id[]" value ="{{$item->hostel_assign_id ?? ''}}" checked />
                                <input type="hidden" name="total_days_id[]"value ="{{$item->id ?? ''}}" />
                                
                                </td>
                                <td>
                                    @php
                                   $dateObj   = DateTime::createFromFormat('!m', $item->month_id);
                                        $monthName = $dateObj->format('F');
                                    $consumptionDays =0;
                                    @endphp
                                    
                                    
                                    {{$monthName ?? ''}}
                                                         <input type="hidden" value="{{$item->month_id ?? ''}}" name="month_id[]" />
                                    
                                    </td>
                                <td>
                                    {{$item->total_days ?? ''}}
                                    <!--{{   $consumptionDays  =$item->total_days ?? ''}}-->
                                 <input type="hidden" value="{{$item->total_days ?? ''}}" name="total_days[]" />
                                </td>
                                <td>
                                    @php
                                    
                                     $value2 =   Helper::monthlyUnits($hostel_room_id,$floor_id,$building_id,$hostel_id); 
                                        $meter =0;
                                    @endphp
                                
                                 @if(!empty($value2))
                                 @foreach($value2 as $key1 => $item1)
                                @if($item->month_id == $item1->month_id )
                                <!--{{$meter = $item1->meter_unit ?? '' }}-->
                                {{$item1->meter_unit ?? '' }}
                                
                                 <input type="hidden" value=" {{$item1->meter_unit ?? '' }}" name="total_monthly_unit[]" />
                                @endif
                                @endforeach
                                @endif
                                </td>
                                     <td>
                                         
                                          @php
                                    
                                     $value3 =   Helper::monthlyConsumption($item->month_id,$hostel_room_id,$floor_id,$building_id,$hostel_id); 
                           
                               
                               $totalMonthDays =  $value3['days'] ;
                               $total_consumption =0;
                                    @endphp
                                   
                                  {{ number_format((float)($meter/$totalMonthDays)*$consumptionDays, 2, '.', '')}}
                                  <!--{{$total_consumption =($meter/$totalMonthDays)*$consumptionDays}}-->
                                
                                <input type="hidden" value="{{ number_format((float)($meter/$totalMonthDays)*$consumptionDays, 2, '.', '')}}" name="monthly_consumption_uni[]" />
                                     
                                     </td>
                                     <td>
                                          @php
                                   $setting =   DB::table('settings')->where('session_id',Session::get('session_id'))->where('id',1)->first();
                               
                                   @endphp
                                   
                                   {{ $setting->per_unit_amount}}
                                     <input type="hidden" value=" {{ $setting->per_unit_amount}}" name="per_unit_rate[]" />
                                    
                                     </td>
                                     <td> 
                                    
                                   {{ number_format((float)$total_consumption* $setting->per_unit_amount, 2, '.', '')}}
                                
                                     <input type="hidden" value=" {{ number_format((float)$total_consumption* $setting->per_unit_amount, 2, '.', '')}}" name="total_amount[]" />
                                   </td>
                                     <td> 
                                  
                                @if(!empty($getPaymentMode))
                             
                          
                                <select name="payment_mode_id" class="form-control" {{$item->payment_mode_id != '' ? 'disabled' : ''  }}>
                                    
                                    <option>Select</option>
                                    
                                    @foreach($getPaymentMode as $value)
                                    <option value="{{$value->id ?? ''}}" {{$value->id == $item->payment_mode_id ? 'selected' : ''  }} </option>{{$value->name ?? ''}}</option>
                                    @endforeach
                                </select>
                                @endif
                                  
                                     </td>
                                     <td>
                                         @php
                                          
                                          
        
                                @endphp
                                         
                                            @if($item->payment_status != '0' )
                                            <!--<button class="btn btn-danger statusChange" data-hostel_assign_id="{{$item->hostel_assign_id}}" data-id="{{ $item->electricity_id ?? ''}}" data-toggle="modal" data-target="#electricstatus" type="button" data-status="{{$item->payment_status ?? ''}}">-->
                                            <!-- Unpaid-->
                                            <!--</button>-->
                                            
                                          <small class="text-danger">  Fees Not Collected </small>
                                             @else
                                            <!--<button class="btn btn-success statusChange" data-hostel_assign_id="{{$item->hostel_assign_id}}" data-id="{{$item->electricity_id ?? ''}}" data-toggle="modal" data-target="#electricstatus" type="button" data-status="{{$item->payment_status ?? ''}}">-->
                                            <!-- Paid-->
                                            <!--</button>-->
                                       <small class="text-success">  Fees Collected </small>
                                        @endif
                                        
                                       </td>
                                     
                                     
                                      </tr>
                                         @endif
                                      @endforeach
                                     @endif
                                 
                                    
                                    </tbody>
                                    </table>
                                    <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Collect</button>
                                 
                                </div>
                           
                            </form>
          </div>
     
                 
                </div>
               
          
            
            <script>
      function calculateSum() {
    var sum = 0;

    $(".amount").each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
        }
    });

    $("#pay_amt").val(sum.toFixed(2));

}      
 function addElement_room(){
	    var SITEURL  = "{{ url('/') }}";
		var div=document.getElementById('maindiv_room');
		
		var num=Number(document.getElementById('value_room').value)+Number(1);
		document.getElementById('value_room').value=num;
		var num1=Number(document.getElementById('total_room').value)+Number(1);
		document.getElementById('total_room').value=num1;
		var heightchange=Number(42)*(Number(num)-Number(1))+Number(110)+Number(15);
		//alert(heightchange);
		$("#main_room").css('height',heightchange);
		var newdiv = document.createElement('div');
	  	var divIdName = 'append_'+num;
	   	var contents ='';
		newdiv.setAttribute('id',divIdName);
		contents='<tr class="tr_clone"><div class="row pl-1"><div class="form-group pr-2"><select class="form-control" id="select" onchange="categorys(this.value,'+num+')" name="category[]" style="width:130px;" required><option value="">Select</option> @if(!empty($data['FeesMaster'])) @foreach($data['FeesMaster'] as $fees_master) <option value="{{ $fees_master->id }}" {{ ( $fees_master->id == $data['stuData']['section_id'] ? 'selected' : '' ) }}>{{ $fees_master['FeesType']['name']   ?? ''  }}</option> @endforeach @endif <option value="Total Assigned Fees1">Other Fees</option></select></div><div class="form-group pr-2 pl-2" style="display: none;"><input id="fees_name_'+num+'" type="text" class="form-control item-name fees_name" name="fees_name[]" value="" placeholder="Fees Name" style="width: 200px;" required></div><div class="form-group pr-2"><input name="qty[]" id="qty_'+num+'" onblur="calcSum(this.value,'+num+')" placeholder="Quantity" style="width: 200px;"class="form-control quantity qty" maxlength="100" type="text"  value="1" readonly></div><div class="form-group pr-2"><input name="amount[]"  placeholder="Amount" class="form-control amount" onkeyup="calcSum(this.value,'+num+')" maxlength="100" style="width: 200px;" type="text" id="amount_'+num+'" value="{{ old('amount') }}" required></div><div class="form-group pr-2"><input name="discount[]"  style="width: 200px;" placeholder="Discount" class="form-control cal discount" maxlength="100" onkeyup="discount(this.value,'+num+')" type="text" id="discount_'+num+'" value="{{ old('discount') }}"></div><div class="form-group pr-2"><input name="total_amount[]" id="total_amount_'+num+'" placeholder="Total Amount" class="form-control tolamount" style="width: 200px;"maxlength="100" type="text"  value="" tabindex="1" readonly></div><div style="padding: 6px;" id="add"><input type="button" onclick="addElement_room();" value="" title="Add More Fees" class="addmoreprodtxtbx" id="button" name="button" ><input type="button" class="removeprodtxtbx" name=delrow_'+num+' id=delrow_'+num+'  value="" onclick="removeElement_room(\'append_'+num+'\','+num+')"></div></div></tr>';
		
		newdiv.innerHTML = contents;
	  	div.appendChild(newdiv);

	}
	
            </script>
            
   <div class="modal fade" id="electricstatus" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Status conformation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id">
            <input type="hidden" id="status">
            <input type="hidden" id="hostel_assign_id">
        <p>Are you sure you want to change status ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="changeStatus()" class="btn btn-primary" data-dismiss="modal">Change</button>
          <button type="button" id="closemodal" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
           
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

$('#payment_mode_id').on('change', function() {
    
    if(this.value == 9){
        
var total_amount=jQuery('#pay_amt').val();
    
                  // console.log(result);
                   var options = {
                        "key": "{{ Config::get('app.razorpay_key') }}", 
                        "amount": total_amount*100, 
                       
                        "currency": "INR",
                        "name": "Rukmani Software",
                        "description": "Live Transaction",
                        "image": "https://www.rukmanisoftware.com/public/assets/img/header-logo.png",
                        "handler": function (response){
                         $("#transaction_id").val(response.razorpay_payment_id);  
                        }
                    };
                    
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                    
}
        
});
</script>
<script>
    $(document).ready(function(){
        $('.statusChange').click(function(){
           var status = $(this).data('status');
           var id = $(this).data('id');
           var hostel_assign_id = $(this).data('hostel_assign_id');
           $('#status').val(status);
           $('#id').val(id);
           $('#hostel_assign_id').val(hostel_assign_id);
       });
    });
</script>
<style>
._table {
    width: 100%;
    border-collapse: collapse;
}

._table :is(th, td) {
    padding: 8px 10px;
}
.success {
    background-color: #24b96f !important;
}
.danger {
    background-color: #ff5722 !important;
}
.action_container>* {
    border: none;
    outline: none;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    padding: 8px 14px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}
textarea {
    height: calc(2.25rem) !important;
}
</style>

<style>
 .addmoreprodtxtbx {
  background-color: #FFFFFF;
  background-image: url({{url('https://saleanalysics.rukmanisoftware.com/public/images/list_add.png')}});
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 16px;
  margin-top:4px;
  width: 16px;
}

.removeprodtxtbx {
  background-color: #FFFFFF;
  background-image: url({{url('https://saleanalysics.rukmanisoftware.com/public/images/delete2.png')}});
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 15px;
 
   margin:4px 0 0 0 !important;
  width: 16px;
 
}
</style>
