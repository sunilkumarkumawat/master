@php

@endphp
@extends('layout.app') 
@section('content')

 <div class="content-wrapper">
                
   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">                
                <div class="card card-outline card-orange">
                    <div class"card-body">
                        <div class="card-header bg-primary">
                        <h3 class="card-title"><i class="fa fa-money"></i> &nbsp; Pay Final</h3>
                        <div class="card-tools">
                        <a href="{{url('Fees/add')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back </a>
                        </div>
                        
                        </div>                             
                            <form id="quickForm"  action="{{url('razorpay/fees')}}" method="post" >
                                @csrf
                                <div class="row m-2">
                    			<input type="hidden" name="admission_id" id="admission_id" value="{{ $data['admission_id'] ?? ''}}" >
                    			<input type="hidden" name="payment_mode_id" id="payment_mode_id" value="{{ $data['payment_mode_id'] ?? ''}}" >
                    			<input type="hidden" name="student_fees_id" id="student_fees_id" value="{{ $data['fess_id'] ?? ''}}" > 
                    			
                                    <div class="col-md-3">
                            			<div class="form-group">
                            					<label style="color:red;"> Student Name:*</label>
                                    		   <input type="text" name="" id="" class="form-control" placeholder="Student Name" value="{{ $dataview['StudentOnlineFee']['name'] ?? '' }}" readonly>
                            		    </div>
                		            </div>
                                    <div class="col-md-3">
                            			<div class="form-group">
                            					<label style="color:red;"> Father Name:*</label>
                                    		   <input type="text" name="" id="" class="form-control" placeholder="Father Name" value="{{ $dataview['StudentOnlineFee']['father_name'] ?? '' }}" readonly>
                            		    </div>
                		            </div>
                                    <div class="col-md-3">
                            			<div class="form-group">
                            					<label style="color:red;"> Class*</label>
                                    		   <input type="text" name="" id="" class="form-control" placeholder="Student Name" value="{{ $dataview['ClassTypes']['name'] ?? '' }} ({{ $dataview['Section']['name'] ?? '' }})" readonly>
                            		    </div>
                		            </div>                		            
                		            <div class="col-md-3">
                            			<div class="form-group">
                            					<label style="color:red;">Payable Amount:*</label>
                                    		<input type="text" name="pay_amt" id="pay_amt" class="form-control" placeholder="Student Name" value="{{ $data['pay_amt'] }}" readonly>
                            		    </div>
                		            </div>
                                </div>
                                  
                        		<div class="row m-2">
                        		    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center mt-4">
                                    <input type="button" class="btn btn-primary" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        </section>
        
</div>   

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>
    function pay_now(){
         //var amount = "pay_amt*100";
        var admission_id=jQuery('#admission_id').val();
        var payment_mode_id=jQuery('#payment_mode_id').val();
        var pay_amt=jQuery('#pay_amt').val();
        var student_fees_id=jQuery('#student_fees_id').val();
      $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                type:'post',
               url:'razorpay/fees',
               data:{"admission_id" : admission_id,"payment_mode_id":payment_mode_id,"pay_amt":pay_amt,"student_fees_id":student_fees_id,},
               dataType: 'json',
               success:function(result){
                  // console.log(result);
                   var options = {
                        "key": "{{ Config::get('app.razorpay_key') }}", 
                        "amount": pay_amt*100, 
                       
                        "currency": "INR",
                        "name": "Rukmanisoft",
                        "description": "Live Transaction",
                        "image": "https://www.rukmanisoftware.com/public/assets/img/header-logo.png",
                        "handler": function (response){
                          console.log(response);die;
                           $.ajax({
                               headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                               type:'post',
                               url:'razorpay/fees_status',
                               data:{"payment_id" : response.razorpay_payment_id,"student_fees_id" : student_fees_id,},
                               success:function(result){
                                   window.location.href="fees/index";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
               
           });
         
        
        
    }
</script>

   @endsection  