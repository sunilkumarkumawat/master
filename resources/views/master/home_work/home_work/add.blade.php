@php
  $classType = Helper::examPanelClassType();
  $getsubject = [];
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
            <h3 class="card-title"><i class="fa fa-flask"></i> &nbsp; {{ __('Add Homework') }}</h3>
            <input type="hidden" id="role_id" value="{{ Session::get('role_id') ?? '' }}"> 
            <div class="card-tools">
                <a href="{{url('homework/index')}}" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> {{ __('messages.View') }} </a>
            </div>
            
            </div>   
             <div class="card-body">
                 <form id="quickForm" action="{{ url('homework/add') }}" method="post" enctype="multipart/form-data">
                      @csrf
                <div class="row"> 
                    <div class="col-md-3">
            			<div class="form-group">
            				<label style="color:red;">{{ __('messages.Class') }}</label>
            				<select class="form-control @error('class_type_id') is-invalid @enderror select2" id="class_type_id" name="class_type_id">
                            <option value="" >{{ __('messages.Select') }}</option>
                             @if(!empty($classType)) 
                                  @foreach($classType as $type)
                                     <option value="{{ $type->id ?? ''  }}" {{ ($type->id == Session::get('class_type_id')) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                  @endforeach
                              @endif
                            </select>
                             @error('class_type_id')
            					<span class="invalid-feedback" role="alert">
            						<strong>{{ $message }}</strong>
            					</span>
            				@enderror
            		    </div>
            		</div>
                
                    <div class="col-md-3">
                			<div class="form-group">
                				<label style="color:red;">{{ __('messages.Subject') }}</label>
                				<select class="form-control @error('subject') is-invalid @enderror select2" id="subject_id" name="subject">
                                 @if(!empty($getsubject)) 
                                      @foreach($getsubject as $type)
                                         <option value="{{ $type->id ?? ''  }}" >{{ $type->name ?? ''  }}</option>
                                      @endforeach
                                  @endif
                                </select>
                                 @error('class_type_id')
                					<span class="invalid-feedback" role="alert">
                						<strong>{{ $message }}</strong>
                					</span>
                				@enderror
                		    </div>
                		</div> 
            
                    	<div class="col-md-3">
							<div class="form-group">
								<label style="color: red;">{{ __('messages.Homework Title') }}</label>
								<input class="form-control  @error('title') is-invalid @enderror" type="text" id="title" name="title" placeholder="Homework Title" value="{{ old('title') ?? '' }}"> 
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror								    
						    </div>
						</div>
                 		 
                		<div class="col-md-3">
            			    <div class="form-group">
            				<label style="color:red;">{{ __('messages.Homework Date') }}</label>
            				
            					<input type="date" class="form-control @error('homework_date') is-invalid @enderror" id="homework_date" name="homework_date"value="{{date('Y-m-d')}}">
            				   
                             @error('homework_date')
            					<span class="invalid-feedback" role="alert">
            						<strong>{{ $message }}</strong>
            					</span>
            				 @enderror
            		        </div>
            		    </div>
            		    
                		<div class="col-md-3">
            			    <div class="form-group">
            				<label style="color:red;">{{ __('messages.Submission Date') }}</label>
            					<input type="date" class="form-control @error('submission_date') is-invalid @enderror" id="submission_date" name="submission_date" value="{{ old('submission_date') ?? '' }}">
                             @error('submission_date')
            					<span class="invalid-feedback" role="alert">
            						<strong>{{ $message }}</strong>
            					</span>
            				 @enderror
            		        </div>
            		    </div>
            		    
                        <div class="col-md-3">
                			<label>{{ __('messages.Content File') }}</label>
                            <div class="input file form-control">
                                <input type="file" name="content_file" id="content_file" value="{{ old('content_file') ?? '' }}">
                            </div>                    
                    	</div>  
                    	
            		   <div class="col-md-12">
            			   <div class="form-group">
            				<label style="color:red;">{{ __('messages.Description') }}</label>
            					<textarea type="text" class="form-control @error('description') is-invalid @enderror fixed_height" id="compose-textarea" name="description" placeholder="Please submit before last date.">{{ old('description') ?? '' }}</textarea>
                             @error('description')
            					<span class="invalid-feedback" role="alert">
            						<strong>{{ $message }}</strong>
            					</span>
            				 @enderror
            		        </div>
            		    </div>
                    </div>
                    
              <div class="row m-2">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary ">{{ __('messages.Submit') }}</button>
                    </div>
                </div>
                </form>
                </div>                 
            </div> 
            </div> 
            </div> 
            </div> 
            </section>
        </div>
    
    
        <style>
            .card-block{
                height:240px;
            }
        </style>
    
<script>
/*$( document ).ready(function() {
    var role_id = $('#role_id').val();
   
   if( role_id == 2 ) { 
        $("#class_type_id").attr('disabled', 'disabled');
        $("#section").attr('disabled', 'disabled');
   }else{
   }     
});*/
</script>
@endsection                