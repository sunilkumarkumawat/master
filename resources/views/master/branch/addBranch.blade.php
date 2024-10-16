@php
$getCountry = Helper::getCountry();
$getState = Helper::getState();
$getCity = Helper::getCity();
@endphp
@extends('layout.app')
@section('content')


	@php
	$branchCount = DB::table('branch')->where('deleted_at',null)->count();

	@endphp
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-code-fork"></i> &nbsp; {{ __('master.Add Branch') }}</h3>
                            <div class="card-tools">
                                <a href="{{url('viewBranch')}}" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-eye"></i> {{ __('common.View') }}</a>
                                <a href="{{url('master_dashboard')}}" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-arrow-left"></i> {{ __('common.Back') }} </a>
                            </div>
                        </div>  
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="quickForm" action="{{ url('addBranch') }}" method="post" >
                                    @csrf
                    		        <div class="row mb-2 m-2">
                    		        <div class="col-md-2">
                					    <label for="branch_code" class="text-danger">{{ __('master.Branch Code') }}* :</label>
                    					<input type="text" class="form-control @error('branch_code') is-invalid @enderror" id="branch_code" name="branch_code" placeholder="{{ __('master.Branch Code') }}" value="{{old('branch_code')}}">
                    				    @error('branch_code')
                    						<span class="invalid-feedback" role="alert">
                    							<strong>{{ $message }}</strong>
                    						</span>
                    					@enderror
                    			    </div>
                    			    <div class="col-md-2">
                    					<label for="branch_name" class="text-danger">{{ __('master.Branch Name') }}* :</label>
                    					<input type="text" class="form-control @error('branch_name') is-invalid @enderror" id="branch_name" name="branch_name" placeholder="{{ __('master.Branch Name') }}" value="{{old('branch_name')}}">
                    					@error('branch_name')
                    						<span class="invalid-feedback" role="alert">
                    							<strong>{{ $message }}</strong>
                    						</span>
                    					@enderror
                        			</div>
                        			<div class="col-md-2">
                    					<label for="contact_person">{{ __('master.Director/Administrator') }} :</label>
                    					<input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="{{ __('master.Contact Person') }}" value="{{old('contact_person')}}">
                        			</div>
                        			<div class="col-md-2">
                        		   	    <lable class="text-danger">{{ __('master.Mobile Number') }}* :</lable>
                        		   	        <div style="display : inline-flex;">
                            				  
                        		   		        <div class="input text">
                            		   		        <input name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="{{ __('master.Mobile Number') }}" maxlength="10" minlength="10" type="tel" value="{{old('mobile')}}" onkeypress="javascript:return isNumber(event)">
                            		   		        @error('mobile')
                        						        <span class="invalid-feedback" role="alert">
                        							    <strong>{{ $message }}</strong>
                        						        </span>
                        					        @enderror
                            		   		    </div>		   		
                            		     	</div>
                            		   	</div>
                            		   	<div class="col-md-2">
                            					<label for="email" class="text-danger">{{ __('common.Email') }}*   :</label>
                            					<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('common.Email') }}" value="{{old('email')}}">
                            				    @error('email')
                            						<span class="invalid-feedback" role="alert">
                            							<strong>{{ $message }}</strong>
                            						</span>
                            					@enderror
                            			</div>
                            			<div class="col-md-2">
                        					<label for="address">{{ __('common.Address') }} :</label>
                        					<input type="text" class="form-control" id="address" name="address" placeholder="{{ __('common.Address') }}" value="{{old('address')}}" />
                    			        </div>
                    		            <div class="col-md-2" >
                                            <label> {{ __('common.Country') }} :</label>
                                            <select class="form-control select2" name="country_id" id="country_id" value="{{ old('country_id') }}">
                                                <option value="">{{ __('common.Select') }}</option>
                                              @if(!empty($getCountry)) 
                                                  @foreach($getCountry as $country)
                                                     <option value="{{ $country->id ?? ''  }}" >{{ $country->name ?? ''  }}</option>
                                                  @endforeach
                                              @endif
                                            </select>
                                        </div>
                    			        <div class="col-md-2">
                        					<label for="State">{{ __('common.State') }} :</label>
                        					<select class="form-control select2" id="state_id" name="state_id" value="{{ old('state_id') }}" >
                                                <option value="">{{ __('common.Select') }}</option>
                                                    <!-- @if(!empty($getState)) 
                                                          @foreach($getState as $state)
                                                             <option value="{{ $state->id ?? ''}}" >{{ $state->name ?? ''}}</option>
                                                          @endforeach
                                                    @endif -->
                                            </select>
                    			        </div>
                    			        <div class="col-md-2">
                        			        <label for="City">{{ __('common.City') }} :</label>
                        			        <select class="form-control select2" name="city_id" id="city_id" value="{{ old('city_id') }}">
                                                <option value="">{{ __('common.Select') }}</option>
                                                <!-- @if(!empty($getCity)) 
                                                    @foreach($getCity as $cities)
                                                        <option value="{{ $cities->id ?? ''  }}" >{{ $cities->name ?? ''  }}</option>
                                                    @endforeach
                                                @endif -->
                            				</select>
                    			        </div>
                            			<div class="col-md-2">
                        					<label for="Pin Code">{{ __('common.Pin Code') }} :</label>
                        					<input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="{{ __('common.Pin Code') }}" value="{{old('pin_code')}}"maxlength="6" onkeypress="javascript:return isNumber(event)">
                            			</div>
                            			
                            			<div class="col-md-2">
                        					<label for="Password">{{ __('master.Trial Period') }} :</label>
                        						<select name="trial_period" id="trial_period" class="form-control select2">
                                                    <option value="">{{ __('common.Select') }}</option>
                                                    <option value="7">1 Week</option>
                                                    <option value="14">2 Week</option>
                                                    <option value="30">1 Month</option>
                                                    <option value="90">1 Quarter</option>
                                                    <option value="365">1 Year</option>
                                                    <option value="750">Life Time</option>
                                                </select>
                            			</div>
                            		   	<div class="col-md-2">
                        					<label for="expert_name">{{ __('master.Expert Name') }} :</label>
                        					<input type="text" class="form-control" id="expert_name" name="expert_name" placeholder="{{ __('master.Expert Name') }}" value="{{old('expert_name')}}">
                            			</div>
                            			
                        			    <div class="col-md-2">
                        					<label for="login_background">{{ __('master.Login Background') }} :</label>
                        					<input type="file" class="form-control" id="login_background" name="login_background"  value="{{old('login_background')}}" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_error"></p>
                            			</div>
                            			
                            			     
                                    <!--<div class="col-md-2">
                                        <label>Whatsapp API Link</label>
                                        <input type="text" class="form-control" id="api_link" name="api_link" placeholder="Whatsapp API Link" value="{{old('api_link')}}">
                                    </div>    
                                        
                                    <div class="col-md-2">
                                        <label>Instance Id</label>
                                        <input type="text" class="form-control" id="instance_id" name="instance_id" placeholder="Instance Id" value="{{old('instance_id')}}">
                                    </div>    
                                        
                                    <div class="col-md-2">
                                        <label>Access Token</label>
                                        <input type="text" class="form-control" id="access_token" name="access_token" placeholder="Access Token" value="{{old('access_token')}}">
                                    </div>    -->
                            		
                            			
                        		    </div>
                        		    	@if($branchCount <= Session::get('branch_count') )
                                    <div class="col-md-12 text-center mt-3">
                            			<button type="submit" class="btn btn-primary mb-3">{{ __('common.Submit') }}</button>
                            		</div>
                            		
                            		@else
                            			<div class="col-md-12 text-center">
							    
							    
				<h3 class="text-danger blink_me">	Please upgrade your current plan to add branch </h3>
							</div>
                            		@endif
                            	</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#login_background').change(function(e){
            $('#image_error').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_error').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_error').html("");
            }
        }else{
            $('#image_error').html("Image Size File");
            $(this).val('');
        }
        });
    });
    </script>
    
    <style>
    #image_error{
        font-weight: bold;
    font-size: 14px;
    }
        .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
    </style>
@endsection