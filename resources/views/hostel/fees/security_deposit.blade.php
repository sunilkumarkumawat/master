@php
$getPaymentMode = Helper::getPaymentMode();
@endphp
@extends('layout.app') 
@section('content')

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; {{ __('hostel.Hostel Security Deposite Add') }}</h3>
							<div class="card-tools"> 
							    <!--<a href="{{url('meter_unit')}}" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i>View </a> -->
							    <a href="{{url('fee_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i>{{ __('common.Back') }}  </a> 
							</div>
						</div>
                             <form id="studentDetailsForm" method="post" action="{{ url('hostel/fees/security_deposite_add') }}">
                           @csrf
                            <div class="row m-2">
                                <div class="col-md-4">
                        			<label>{{ __('hostel.Select Student') }}<font style="color:red"><b>*</b></font></label>
                        
                           <select name="hostel_assign_id" id="hostel_assign_id" class="form-control select2 " required>
                              <option value="">{{ __('common.Select') }}</option>
                              @if(!empty($allstudents))
                              @foreach($allstudents as $value)
                              <option value="{{ $value->id }}" {{ ( $value->id == $search['student_details'] ?? '' ) ? 'selected' : '' }}>{{ $value->first_name ?? ''}}  : {{ $value->father_name ?? ''}}</option>
                              @endforeach
                              @endif
                           </select>
                       
                            	</div>   
                            	   <div class="col-md-2">
                            		<div class="form-group">
                            			<label>{{ __('hostel.Mess Security Deposit') }}</label>
                            			<input type="text" class="form-control" id="mess_security_deposite" name="mess_security_deposite" placeholder="{{ __('hostel.Mess Security Deposit') }}" required> 
                            	    </div>
                            	</div>   
                               <div class="col-md-2">
                            		<div class="form-group">
                            			<label>{{ __('hostel.Hostel Security Deposite') }}</label>
                            			<input type="text" class="form-control" id="security_deposit" name="security_deposit" placeholder="{{ __('hostel.Hostel Security Deposite') }}" required> 
                            	    </div>
                            	</div>   
                               <div class="col-md-2">
                            		<div class="form-group">
                            			<label>{{ __('hostel.Deposit Date') }}</label>
                            			<input type="date" class="form-control" id="date" name="date" placeholder="{{ __('hostel.Deposit Date') }}"  value={{date('Y-m-d')}} required >
                            	    </div>
                            	</div>   
                            
                                  <div class="col-md-2">
                              <div class="form-group">
                                 <label>{{ __('hostel.Payment Mode') }}</label>
                                 <select class="form-control" id="payment_mode_id" name="payment_mode_id" onchange="payment_mode_function(this.value);">

                                    @if(!empty($getPaymentMode))
                                    @foreach($getPaymentMode as $value)
                                    <option value="{{ $value->id }}">{{ $value->name ?? ''}}</option>
                                    @endforeach
                                    @endif
                                 </select>
                              </div>
                           </div>
                               
                                <div class="col-md-12 text-center ">
                            	    <div class="form-group">
                            	      
                            			<button type="submit" class="btn btn-primary">{{ __('hostel.Save') }}</button>
                            			
                            	    </div>                    
                            	</div>
                                
                            </div> 
                        </form>
                      
                      
                              <div class="row m-2">

                                <div class="col-md-12">
                                    
                                    <table id="" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead>
                                            <tr role="row">
                                                <th>{{ __('common.SR.NO') }}</th> 
                                                <th>{{ __('common.Name') }}</th> 
                                                <th>{{ __('common.Mobile') }}</th> 
                                               
                                                <!--<th>{{ __('messages.Hostel') }}</th>-->
                                                <!--<th>{{ __('messages.Building') }}</th>-->
                                                <!--<th>{{ __('messages.Floor') }}</th>-->
                                                <!--<th>{{ __('messages.Room') }}</th>                                           -->
                                                                          
                                                <th>{{ __('common.Fathers Name') }}</th>                                           
                                                <th>{{ __('hostel.Deposit On') }}</th>                                           
                                                                                      
                                                <th>{{ __('hostel.Security Deposit') }}</th>                                           
                                                <th>{{ __('hostel.Mess Deposit') }}</th>                                           
                                                <th>{{ __('hostel.Payment Mode') }}</th>                                           
                                                <th>{{ __('hostel.Status') }}</th>                                           
                                                <th>{{ __('common.Action') }}</th>                                           
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="student_list_show">
            
                                            @if(!empty($data))
                                            @foreach($data as $key =>$item)
                                            
                                          
                                            <tr>
                                                 <td>{{$key+1 }}</td>  
                                                <td style=" text-transform: capitalize;">{{$item->first_name ?? ''}}</td>
                                                <td>{{$item->mobile ?? ''}}</td>
                                                <!--<td>{{$item->hostel_name ?? ''}}</td>-->
                                                <!--<td>{{$item->building_name ?? ''}}</td>-->
                                                <!--<td>{{$item->floor_name ?? ''}}</td>-->
                                                <!--<td>{{$item->room_name ?? ''}}</td>-->
                                                <!--<td>{{$item->bad_name ?? ''}}</td>-->
                                                <td style=" text-transform: capitalize;">{{$item->father_name ?? ''}}</td>
                                                <td>{{date('d-m-Y', strtotime($item->date)) ?? ''}} </td>
                                                <td>{{$item->security_deposit ?? ''}}</td>
                                                <td>{{$item->mess_security_deposite ?? ''}}</td>
                                                <td>
                                                
                                                  @if(!empty($getPaymentMode))
                                    @foreach($getPaymentMode as $value)
                                 {{ $value->id == $item->payment_mode_id ?  $value->name : '' }}
                                    @endforeach
                                    @endif
                                                
                                                </td>
                                                <td class="text-{{ $item->status == 0 ? 'success' : 'danger'}}">{{$item->status == 0 ? 'Paid' : 'Refunded' }}</td>
                                                <td>
                                                    
                                                  
                                                        
                                                       
                                                        <button type="submit" class="paid_data btn btn-{{ $item->status == 0 ? 'danger' : 'success'}}" 
                                                                                data-id="{{$item->id ?? ''}}"
                                                                                data-status="{{$item->status ?? ''}}"
                                                                                data-hostel_assign_id="{{$item->hostel_assign_id ?? ''}}"
                                                                                data-toggle="modal"
                                                                               
                                                                                data-target="#myPaidModal" {{ $item->status == 0 ? '' : 'disabled'}}>
                                                                            {{ $item->status == 0 ? 'Refund' : 'Paid'}}
                                                        </button>

                                                </td>
                                          </tr>
                                        
                            @endforeach                                            
                                        @endif
                                  
                                           
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                <div class="modal" id="myPaidModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="background: #555b5beb;">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-white">{{ __('hostel.Are You Sure You Want To Refund') }}</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                            </div>
                                                <form action="{{url('hostel/fees/security_deposite_refund')}}" method="post">
              	                                    @csrf
                                                
                                                        <input type="hidden" id="security_status" name="security_status" />
                                                        <input type="hidden" id="security_id" name="security_id" />
                                                        <input type="hidden" id="hostel_assign_id_1" name="hostel_assign_id" />
                                                      
                                                
        
                                                    <div class="text-center p-3">
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">{{ __('hostel.Refund') }}</button>
                                                         <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">{{ __('common.Close') }}</button>
                                                       
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
    $(document).ready(function(){
        $('.paid_data').click(function(){
            var id = $(this).data("id");
            var status = $(this).data("status");
            var hostel_assign_id = $(this).data("hostel_assign_id");
         


        
            $("#security_id").val(id);
            $("#security_status").val(status);
            $("#hostel_assign_id_1").val(hostel_assign_id);
        });
        
   
    });
</script>


                        

@endsection      