@php
$classType = Helper::classType();
$getState = Helper::getState();
$getcitie = Helper::getCity();
$getPaymentMode = Helper::getPaymentMode();
$getCountry = Helper::getCountry();

@endphp
@extends('layout.app')
@section('content')

<div class="content-wrapper">

  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-outline card-orange">
            <div class="card-header bg-primary flex_items_toggel">
              <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;{{ __('View Students Fees Edit') }}</h3>
              <div class="card-tools">
                <a href="{{url('fee_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><span class="Display_none_mobile">{{ __('common.Back') }} </span></a>
              </div>

            </div>

                <div class="row m-2">
                    
                        <table  class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead>
                    <tr role="row">
                      <th>{{ __('Admission No') }}</th>
                      <th>{{ __('Name of Student') }}</th>
                      <th class="text-center">{{ __('Class') }}</th>
                      <th>{{ __('Father"s Name') }}</th>
                      <th>{{ __('Mobile') }}</th>
                     
                      <th>{{ __('student.Ad. Type') }}</th>
                      <th>{{ __('student.Ad. Date') }}</th>
                     
                    </tr>
                  </thead>
                  <tbody id="product_list_show">
                      
                      </tbody>
                     <td>{{ $fees['admissionNo'] ?? '-' }}</td>
                     <td>{{ $fees['first_name'] ?? '-' }}</td>
                     <td>{{ $fees['class_name'] ?? '-' }}</td>
                     <td>{{ $fees['father_name'] ?? '-' }}</td>
                     <td>{{ $fees['mobile'] ?? '-' }}</td>
                     <td> 
                     @if(!empty($fees['admission_type_id']))
                     @if($fees['admission_type_id'] == 1)
                      <p>Regular</p>
                   
                      @elseif($fees['admission_type_id'] == 2)
                      <p>Non</p>
                      
                      @elseif($fees['admission_type_id'] == 3)
                      <p>Other</p>
                      @else
                      -
                      @endif
                      
                      @endif</td>
                     <td>@if(!empty($fees['admission_date']))
                         {{date('d-m-Y', strtotime($fees['admission_date'])) ?? '' }}
                         @else
                         -
                         @endif
                         </td>
                          
                      </table>
            
            
             
            
             
           
            </div>
            
            <div class="row m-2">
              <div class="col-12" style="overflow-x:scroll;">
                  
                  <form action="{{url('studentFeesEdit')}}" method="post" >
                      @csrf
                <table id="" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead>
                    <tr role="row">
                    
                      <th>{{ __('Receipt No') }}</th>
                      <th>{{ __('Payment Mode') }}</th>
                      <th>{{ __('Amount') }}</th>
                      <!--<th>{{ __('Dis%') }}</th>-->
                     
                      <th>{{ __('Total Amount') }}</th>
                      <th>{{ __('Fine') }}</th>
                      <th>Payment Date</th>
                      <!--<th>{{ __('Discount Remark') }}</th>-->
                     
                    </tr>
                  </thead>
                  <tbody id="product_list_show">

                    @if(!empty($details))
                    @php
                        $i=1
                    @endphp
                   
                    
                    @foreach ($details as $item)
                    
                    @php
                   // dd($item);
                    @endphp
                    <tr>
                        
                      <td>
                          <input type="hidden" name="fees_detail_id[]" value="{{$item->id ?? ''}}"/>
                          {{ $item['receipt_no'] }}</td>
                      <td>
                      
                      <select class="form-control" name="payment_mode_id[]">
                          @if(!empty($getPaymentMode))
                          <option  value="" > Select</option>
                          @foreach($getPaymentMode as $item1)
                          <option value="{{$item1->id ?? ''}}"  {{$item['payment_mode_id'] == $item1->id ? 'selected' : ''}}>{{$item1->name ?? ''}}</option>
                          @endforeach
                          @endif
                      </select>
                      
                      </td>
                    
                      <td>
                          <input type="text" class="amount"  onblur="abc()" value="{{ $item['paid_amount'] ?? 0}}" onkeypress="javascript:return isNumber(event)" name="amount[]" />
                          <input type="hidden" class="discount" onkeypress="myFunction()" onblur="abc()" value="{{ $item['discount'] ?? 0}}" name="discount[]" />
                         <input type="hidden" class="discount_remark"  value="{{ $item['discount_remark'] ?? '-'}}" name="discount_remark[]" />
                          <input type="hidden" class="discount_percent"  name="discount_percent[]"onblur="abc()"  maxlength="3"onkeypress="javascript:return isNumber(event)" value="0" />
                          </td>
                       <!-- <td>
                           <input type="text" class="discount_percent"  name="discount_percent[]"onblur="abc()"  maxlength="3"onkeypress="javascript:return isNumber(event)" value="0" />
                        </td>-->
                        <td>
                           ₹ <input type="text" class="input_field total_amount" onblur="abc()" onkeypress="javascript:return isNumber(event)" value="{{ $item['total_amount'] ?? 0}}" name="total_amount[]" readonly />
                        </td>
                         <td>
                           <input type="text" class="installment_fine" onkeypress="myFunction()" value="{{ $item['installment_fine'] ?? 0}}" name="installment_fine[]" />
                        </td>
                        <td>
                            <input type="date" class="form-control" value="{{ $item['date'] ?? ''}}" name="date[]" id="date"> 
                        </td>
                     <!-- <td>
                           <input type="text" class="discount_remark"  value="{{ $item['discount_remark'] ?? '-'}}" name="discount_remark[]" />
                          
                          </td>-->
                      
                  


                    
                    </tr>
                    @endforeach
                    
                  
                    @endif
                  </tbody>
                    <tfoot>
                        <tr>
                       
                          <th></th>
                          <th></th>
                          <th>Total Amount</th>
                          <!--<th>Total Discount</th>-->
                          <th>Grand Total</th>
                          <th></th>
                          <th></th>
                          
                        </tr>
                        <tr>
                          
                            <td></td>
                            <td></td>
                            <td>
                                 ₹ <input type="hidden" name="fees_collect_id" value="{{$details[0]['fees_collect_id'] ?? ''}}"/> 
                                  <input type="hidden" name="admission_id" value="{{$fees['admission_id'] ?? ''}}"/> 
                                     <input id="g_amount" type="text" class="input_field" name="g_amount" readonly /> 
                                
                            </td>
                            <!--<td >  <input id="g_discount" type="text" class="input_field" name="g_discount" readonly/> </td>-->
                            <td > ₹ <input id="g_total_amount" type="text" class="input_field" name="g_total_amount"  readonly/> </td>
                            <td></td>
                            <td></td>
                           
                        </tr>
                            @if(!empty($details))
                            
                            @if(count($details) >0)
                        <tr> <td colspan=7 class="text-center p-4"> <button class="btn btn-primary" >Update</button></td></tr>
                        @endif
                        @endif
                    </tfoot>
                  
                </table>
                </form>
              </div>
            </div>

            </div>
            </div>
            </div>
            </div>
            </section>
    </div>


<script>
    $( document ).ready(function() {
        
        var amount = 0;
        var discount = 0;
        var total_amount = 0;
$( ".amount" ).each(function( index ) {
    
        amount += parseInt($(this).val());
});


$( ".discount" ).each(function( index ) {
 discount += parseInt($(this).val());
});


$( ".total_amount" ).each(function( index ) {
    $(this).val(parseInt($( ".amount" ).eq(index).val()) -parseInt($( ".discount" ).eq(index).val()));
    
  total_amount += parseInt($(this).val());
});


$('#g_amount').val(amount);
$('#g_discount').val(discount);
$('#g_total_amount').val(total_amount);



$(".discount").on("input", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9.]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
   {
     evt.preventDefault();
   }
 });

$(".discount").keypress(function(){
 var index =  $('.discount').index(this);
 $( ".discount_percent" ).eq(index).val(0);

});
});
   
    function abc(){
        $( ".amount" ).each(function( index ) {
   
    if(isNaN(parseInt($(this).val())))
    {
      $(this).val(0); 
       $('.discount').eq(index).val(0);  
    }
     if(parseInt($(this).val()) <= 0)
    {
        $(this).val(0);  
         $('.discount').eq(index).val(0);  
    }
   
});
        $( ".discount" ).each(function( index ) {
   
    if(isNaN(parseInt($(this).val())))
    {
      $(this).val(0);  
     
    }
    if(parseInt($(this).val()) < 0)
    {
        $(this).val(0);  
    }
   
});
        $( ".total_amount" ).each(function( index ) {
   
    if(isNaN(parseInt($(this).val())))
    {
      $(this).val(0);  
    }
   
});
        $( ".discount_percent" ).each(function( index ) {
   
    if(isNaN(parseInt($(this).val())))
    {
      $(this).val(0);  
    }
    if(parseInt($(this).val()) >100)
    {
      $(this).val(100);  
    }
    else if(parseInt($(this).val()) < 0)
    {
        $(this).val(0);  
    }
   
});
        calculate();
    }
    
    function calculate(){
       amount = 0;
       discount = 0;
        total_amount = 0;
$( ".amount" ).each(function( index ) {
   
       
        amount += parseInt($(this).val());
});


$( ".discount" ).each(function( index ) {
    if(parseInt($( ".discount_percent" ).eq(index).val()) > 0 )
    {
        
        
        var percent = parseInt( $( ".discount_percent" ).eq(index).val());
        var amount = parseInt( $( ".amount" ).eq(index).val());
       
       
       $(this).val((amount*percent)/100);
        discount += parseInt($(this).val());
    }
    else
    {
        
         if(parseInt($('.amount').eq(index).val()) < parseInt($(this).val())){
             
             	toastr.error('Discount cannot be greater than amount !');
          
             $(this).val(0)
             
                
              discount += parseInt($(this).val());
         }else
         {
              discount += parseInt($(this).val());
             		
         }
         
       
    }
 
});


$( ".total_amount" ).each(function( index ) {
     $(this).val(parseInt($( ".amount" ).eq(index).val()) -parseInt($( ".discount" ).eq(index).val()));
  total_amount += parseInt($(this).val());
});


$('#g_amount').val(amount);
$('#g_discount').val(discount);
$('#g_total_amount').val(total_amount);


 $( ".discount_percent" ).each(function( index ) {

if(parseInt($(this).val()) > 0)
{
    $('.discount').eq(index).val(0)
}


});
    }
</script>

<style>
    .input_field{
        border: none;
  background: none;
  color:#8c8888;
  font-weight:700;
    }
</style>



            @endsection