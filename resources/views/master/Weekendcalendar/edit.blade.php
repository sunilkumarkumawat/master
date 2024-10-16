@php
$getstudents = Helper::getstudents();
$getgenders = Helper::getgender();
$classType = Helper::classType();
$getState = Helper::getState();
$getCity = Helper::getCity();
$getCountry = Helper::getCountry();
$getSetting = Helper::getSetting();
$bloodGroupType = Helper::bloodGroupType();
$getMonths = Helper::getMonth();
$getAttendanceStatus= Helper::getAttendanceStatus();
@endphp
@extends('layout.app')
@section('content')

@php
    $studentCount = DB::table('admissions')->where('deleted_at',null)->count();
@endphp
						
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-calendar"></i> &nbsp;{{ __('Academic Calendar Edit') }}</h3>
							<div class="card-tools">
								<a href="{{url('view_weekend')}}" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <span class="Display_none_mobile"> {{ __('common.View') }} </span></a>
								<a href="{{url('master_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"> {{ __('common.Back') }} </span></a>
							</div>

						</div>


                        
                        <form id="quickForm_addmission" action="{{ url('edit_weekend') }}/{{$data->id}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row m-2">
								<div class="col-md-3">
									<div class="form-group">
										<label>{{ __('From Date') }}<span style="color:red;">*</span></label>
										<input type="date" class="form-control invalid" id="from_date" name="from_date" placeholder="From Date" value="{{$data->from_date ?? ''}}" required>
										<span class="invalid-feedback" id="from_date_invalid" role="alert">
                                            <strong>The From Date field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>{{ __('To Date') }}<span style="color:red;">*</span></label>
										<input type="date" class="form-control invalid" id="to_date" name="to_date" placeholder="To Date" value="{{$data->to_date ?? ''}}" required>
										<span class="invalid-feedback" id="to_date_invalid" role="alert">
                                            <strong>The To Date field is required</strong>
                                        </span>
									</div>
								</div>
                                <div class="col-md-3">
									<div class="form-group">
										<label>{{ __('Event/Schedule') }}<span style="color:red;">*</span></label>
										<input type="text" name="event_schedule" id="event_schedule" class="form-control invalid " value="{{$data->event_schedule ?? ''}}" placeholder="{{ __('Event/Schedule') }}" required>
										<span class="invalid-feedback" id="event_schedule_invalid" role="alert">
                                            <strong>The Event/Schedule field is required</strong>
                                        </span>
									</div>
								</div>

								
                              
                                <!-- <div class="col-md-3">
									<div class="form-group">
										<label>{{ __('Day') }}</label>
										<input type="text" name="day" id="day" class="form-control" value="{{ old('day') }}" placeholder="{{ __('Day') }}">
									</div>
								</div> -->
                                
                                 <div class="col-md-3">
								 <label>{{ __('Attendance status for that day') }}<span style="color:red;">*</span></label>
									<select class="form-control" id="attendance_status" name='attendance_status' required>
                    			   <option value="" >Select</option>
                                 @if(!empty($getAttendanceStatus)) 
                                    @foreach($getAttendanceStatus as $attendance_status)
                                    
                                            <option value="{{ $attendance_status->id ?? '' }}" {{$attendance_status->id == $data->attendance_status ? 'selected' : ''}}>{{ $attendance_status->name ?? '' }}</option>
                                      
                                    @endforeach
                                @endif

                                </select>  
								</div>
                                
                                
                            @if($data->is_attendance_submitted == 0)

                                <div class="col-md-12 text-center mt-5">
								    <button type="submit" class="btn btn-primary ">{{ __('common.Submit') }}</button><br><br>
							    </div>
@else
<div class="col-md-12 text-center text-danger mt-5">
								   You cannot edit this event because the attendance status has already been used in attendance.
							    </div>
@endif
                            </div>

							

	                    </form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

@endsection