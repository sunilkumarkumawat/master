@extends('layout.app') 
@section('content')
@php
$getSetting=Helper::getSetting();
$getUser=Helper::getUser();
$noticeBoard = Helper::noticeBoard();
$busAssign=Helper::busAssign();

$teachers = DB::table('teachers')
    ->select('teachers.*', 'doc.photo') 
    ->leftJoin('teacher_documents as doc', 'doc.teacher_id', '=', 'teachers.id')
    ->leftJoin('users as user', 'user.teacher_id', '=', 'teachers.id') 
    ->where('teachers.branch_id', session('branch_id')) 
    ->where('teachers.class_type_id', session('class_type_id')) 
    ->where('user.status', 1) 
    ->orderBy('teachers.id', 'DESC') ->whereNull('user.deleted_at')
    ->get();
$tea = DB::table('teacher_subjects')
    ->select('teacher_subjects.*', 'teacher.first_name') 
    ->leftJoin('teachers as teacher', 'teacher.id', '=', 'teacher_subjects.teacher_id')
    ->leftJoin('users as user', 'user.teacher_id', '=', 'teacher.id') 
    ->where('teacher_subjects.branch_id', session('branch_id')) 
    ->where('teacher_subjects.class_type_id', session('class_type_id')) 
    ->where('user.status', 1) 
    ->orderBy('teacher.id', 'DESC') ->whereNull('teacher_subjects.deleted_at')
    ->groupBy('teacher_subjects.teacher_id')
    ->get();
    
   
    

    $fee_assigned = DB::table('fees_assigns')->where('admission_id',Session::get('id'))->whereNull('deleted_at')->first();
    $fee_collected = DB::table('fees_collect')->where('admission_id',Session::get('id'))->whereNull('deleted_at')->first();
    $fee_pending = (($fee_assigned->total_amount ?? 0) - ($fee_assigned->total_discount ?? 0))-($fee_collected->amount ?? 0);
    $home_work= DB::table('homeworks')->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'))
            ->whereDate('submission_date', '>=', date("Y-m-d"))->whereDate('homework_date', '<=', date("Y-m-d"))->where('class_type_id',Session::get('class_type_id'))->whereNull('deleted_at')->orderBy('id', 'DESC')->count();
     

@endphp

<div class="content-wrapper desktop">
   <section class="content pt-3">

      <div class="container-fluid">
      <div class="row">
      <div class="col-12 col-sm-6 col-md-8">
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('teachers/index') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-graduation-cap"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('My Teachers') }}</span>
                                <span class="info-box-number">{{count($tea)}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('studentsAttendanceView') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Attendance') }}</span>
                                <span class="info-box-number">{{\App\Models\StudentAttendance::studentTotalPresent()}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                   <a href="{{ url('student_fees_details') }}/{{Session::get('id')}}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fa fa-money"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Fees Status') }}</span>
                                <span class="info-box-number"><i class="fa fa-rupee"></i>
                                    
                                    {{$fee_pending > 0 ? number_format($fee_pending,2). ' Due': 'No Dues'}}
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                   <a href="{{ url('my_exams') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fa fa-book"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">My Exams</span>
                                <span class="info-box-number"><i class="fa fa-book"></i>
                                View
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ url('homework/index') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-info elevation-1 text-white"><i class="fa fa-tasks" aria-hidden="true"></i>
</span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Home Work') }}</span>
                                <span class="info-box-number">
                                    {{ $home_work > 0 ? $home_work : 'No Pendings'}}</span>
                            </div>
                        </div>
                    </a>
                </div>
      </div>
<div class="row">
<div class="col-12 col-md-3">
            <div class="card card-outline card-orange">

                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-user-circle-o"></i> &nbsp;{{ __('messages.Profile')  }}</h3>
                    <div class="card-tools">
                        <!--<a href="{{url('master_dashboard')}}" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-arrow-left"></i> Back</a>-->
                    </div>
                </div> 
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="{{ env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image'] }}" style="width:105px; height:105px;" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/user_image.jpg' }}'">
                    </div>
    
                    <h3 class="profile-username text-center">{{Session::get('name')}}</h3>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>{{ __('student.Admission No.')  }}</b> <a class="float-right">{{$getUser['admissionNo'] ?? ''}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>{{ __('student.Roll No')  }}</b> <a class="float-right">{{$getUser['roll_no'] ?? ''}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>{{ __('messages.Class')  }}</b> <a class="float-right">{{$getUser['ClassTypes']['name'] ?? ''}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>{{ __('messages.Admission')  }}</b> 
                            @if($getUser['admission_type_id'] == 1)
                                <a class="float-right">Regular</a>
                            @endif
                            @if($getUser['admission_type_id'] == 2)
                                <a class="float-right">Non</a>
                            @endif                      
                            @if($getUser['admission_type_id'] == 3)
                                <a class="float-right">{{ __('messages.Other')  }}</a>
                            @endif                        
                        </li>                   
                    </ul>
    
                  </div>
             
            </div>

         </div>
         <div class="col-12 col-md-9">
            <div class="card card-outline card-orange">

                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;{{ __('messages.Personal Details')  }} </h3>
                    <div class="card-tools">
                        <!--<a href="{{url('master_dashboard')}}" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-arrow-left"></i> Back</a>-->
                    </div>
                </div> 
              <!-- <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">{{ __('messages.Profile')  }}</a></li>
                </ul>
              </div> -->
              <div class="p-1">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                        <div class=" p-0 mb-3">
                            <table class="table border">
                                <tbody>
                                    <tr>
                                    <td width="25%">{{ __('messages.Admission Date')  }}</td>
                                    <td width="25%">@if(!empty($getUser['admission_date'])) {{ date('d-m-Y', strtotime($getUser['admission_date']))  ?? '' }} @else - @endif</td>
                                    <td width="25%">{{ __('messages.Date Of  Birth')  }}</td>
                                    <td width="25%">{{ date('d-m-Y', strtotime($getUser['dob'])) ?? '' }} </td>   
                                </tr>
                                    
                                    <tr>
                                    <td>{{ __('messages.Mobile Number')  }}</td>
                                    <td>{{$getUser['mobile'] ?? ''}}</td>
                                    <td>{{ __('messages.E-Mail')  }}</td>
                                    <td>{{$getUser['email'] ?? ''}}</td>
                                    </tr>
                                   
                                    <tr>
                                    <td>{{ __('messages.Address')  }}</td>
                                    <td>{{$getUser['address'] ?? ''}}</td>
                                    <td>{{ __('messages.Gender')  }}</td>
                                    <td>{{$getUser['Gender']['name'] ?? ''}}</td>
                                    </tr>
                                    <tr>
                                    
                                    </tr>
                                    <tr>
                                    <td>{{ __('Aadhar')  }}</td>
                                    <td>{{$getUser->aadhaar ?? ''}}</td>
                                    <td>{{ __('Religions')  }}</td>
                                    <td>{{$getUser->religion ?? ''}}</td>
                                    </tr>
                                    
                                    <tr>
                                    <td>{{ __('Blood Group')  }}</td>
                                    <td>{{$getUser->blood_group_type_id ?? ''}}</td>
                                    <td>{{ __('Category')  }}</td>
                                    <td>{{$getUser->caste_categories_id ?? ''}}</td>
                                    </tr>
                                   
                                    <tr>
                                    <td>{{ __('Country')  }}</td>
                                    <td>{{$getUser['Country']['name'] ?? ''}}</td>
                                    <td>{{ __('State')  }}</td>
                                    <td>{{$getUser['State']['name'] ?? ''}}</td>
                                    </tr>
                                    <tr>
                                   
                                    </tr>
                                    <tr>
                                    <td>{{ __('City')  }}</td>
                                    <td>{{$getUser['City']['name'] ?? ''}}</td>
                                    <td>{{ __('House')  }}</td>
                                    <td>{{$getUser->house ?? ''}}</td>
                                    </tr>
                                    
                                    <tr>
                                    <td>{{ __('Height')  }}</td>
                                    <td>{{$getUser->height ?? ''}}</td>
                                    <td>{{ __('Weight')  }}</td>
                                    <td>{{$getUser->weight ?? ''}}</td>
                                    </tr>
                                   
                                    <tr>
                                    <td>{{ __('Pincode')  }}</td>
                                    <td>{{$getUser->pincode ?? ''}}</td>
                                    <td>{{ __('Remark')  }}</td>
                                    <td>{{$getUser->remark_1 ?? ''}}</td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="card-body p-0 mb-3">
                            <table class="table table-sm border table-hover">
                                <thead>
                                    <tr class="bg-light">
                                    <th width="39%" class="text-white">{{ __('messages.Parent / Guardian Details')  }} </th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="col-md-4">{{ __('messages.Fathers Name')  }}</td>
                                    <td class="col-md-5">{{$getUser['father_name'] ?? ''}}</td>
                                    <td rowspan="3">
                                        <img class="profile-user-img img-fluid img-circle" src="{{ env('IMAGE_SHOW_PATH').'/father_image/'.$getUser['father_img'] }}" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/user_image.jpg' }}'" style="width:105px; height:105px;">
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>{{ __('messages.Fathers Contact No')  }}</td>
                                    <td>{{$getUser['father_mobile'] ?? ''}}</td>
                                    </tr>
                                    <tr>
                                    <!--<td>{{ __('messages.Father Occupation')  }}</td>-->
                                    <!--<td>{{$getUser['null'] ?? ''}}</td>-->
                                    </tr>
                                    <tr>
                                    <td class="col-md-4">{{ __('messages.Mothers Name')  }}</td>
                                    <td class="col-md-5">{{$getUser['mother_name'] ?? ''}}</td>
                                    <td rowspan="3">
                                        <img class="profile-user-img img-fluid img-circle" src="{{ env('IMAGE_SHOW_PATH').'/mother_image/'.$getUser['mother_img'] }}" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/user_image.jpg' }}'" style="width:105px; height:105px;">
                                    </td>
                                    </tr>
                                    <!--<tr>-->
                                    <!--<td>{{ __('messages.Mothers Contact No.')  }}</td>-->
                                    <!--<td>{{$getUser['mother_mobile'] ?? ''}}</td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--<td>{{ __('messages.Mother Occupation')  }}</td>-->
                                    <!--<td>{{$getUser['null'] ?? ''}}</td>-->
                                    <!--</tr>-->
                                </tbody>
                            </table>
                        </div>
                   
                        
                        @if(!empty($getUser))
                        @if($getUser->hostel ?? '')
                         <div class="card-body p-0 mb-3">
                            <table class="table table-sm border table-hover">
                                <thead>
                                    <tr class="bg-light">
                                    <th width="39%" class="text-white">Hostel Details</th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Hostel Name</td>
                                    <td>{{$hostelDeatils['hostel_name'] ?? ''}}</td>
                                    </tr>
                                    <tr>
                                    <td>Building</td>
                                    <td>{{$hostelDeatils['building_name'] ?? ''}}</td>
                                    </tr>
                                    <tr>
                                    <td>Floor</td>
                                    <td>{{$hostelDeatils['floor_name'] ?? ''}}</td>
                                    </tr>
                                    <tr>
                                    <td>Room</td>
                                    <td>{{$hostelDeatils['room_name'] ?? ''}}</td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Bed No.</td>
                                    <td>{{$hostelDeatils['bed_name'] ?? ''}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                      
                                @if($getUser->library ?? '')
                        <div class="card-body p-0 mb-3">
                            <table class="table table-sm border table-hover">
                                <thead>
                                    <tr class="bg-light">
                                    <th width="39%" class="text-white">Library Details</th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                           
                                <tbody>
                                    <tr>
                                    <td>Library Plans</td>
                                    <td> @if(!empty($libraryDetails))
                                                   @foreach ($libraryDetails as $time)  
                                                    <span class="badge {{ date('Y-m-d') <= $time['renew_date']  ? 'badge-active' : 'badge-expired' }} ">{{$time->study_time ?? ''}} (Valid: {{ date('d-M-Y', strtotime($time['renew_date'])) }}) <br></span>
                                                   <br>
                                                   @endforeach
                                                @endif</td>
                                    </tr>
                                  
                                    
                                </tbody>
                            </table>
                        </div>
                          @endif
                          @endif
                  </div>
                 
                  <div class="tab-pane" id="fees">
                      
                          <div class="card-body p-0 mb-3">
                            <table class="table table-sm table-hover border">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.Sr.No.')  }}</th>
                                        <th>{{ __('Fees Group')  }}</th>
                                        <th>{{ __('messages.Amount')  }}</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if(!empty($result['school_fees']))
                                @php
                                   $i=1;
                                $total_amount = 0;
                            
                                @endphp
                                @foreach ($result['school_fees']  as $item)
                                
                                    <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{$item['group_name'] ?? ''}}</td>
                                    <td>
                                        {{$item['amount'] ?? ''}}
                                        
                                        <!--{{ $total_amount += $item['amount'] ?? 0 }}-->
                                    
                                    </td>
                                   </tr>
                                    
                                    @endforeach
                                    
                                    @endif
                                     @if(!empty($result['hostel_fees']))
                                @foreach ($result['hostel_fees']  as $item)
                                
                                    <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{'Hostel Fees'}}</td>
                                    <td>{{$item['hostel_fees'] ?? ''}}
                                     <!--{{ $total_amount += $item['hostel_fees'] ?? 0 }}-->
                                    </td>
                                   </tr>
                                    
                                    @endforeach
                                    @endif
                                     @if(!empty($result['library_fees']))
                                @foreach ($result['library_fees']  as $item)
                                
                                    <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{'Library Fees'}}</td>
                                    <td>{{$item['library_fees'] ?? ''}}
                                   <!--{{ $total_amount += $item['library_fees'] ?? 0 }}-->
                                    
                                    </td>
                                   </tr>
                                    
                                    @endforeach
                                @endif
                                
                                <tr>
                                    <th class="text-center" colspan=2>Total</th>
                                    
                                    <th >{{ $total_amount ?? 0 }}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-body p-0 mb-3">
                            <table class="table table-sm table-hover border">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.Sr.No.')  }}</th>
                                        <th>{{ __('fees.Fees Type')  }}</th>
                                        <th>{{ __('messages.Amount')  }}</th>
                                        <th>{{ __('Deposit Date')  }}</th>
                                        <th>{{ __('messages.Pay Mode') }}</th>
                                        <th>{{ __('messages.Action')  }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if(!empty($result['feesDetail']))
                                @php
                                   $i=1;
                                
                            
                                @endphp
                                @foreach ($result['feesDetail']  as $item)
                                
                                    <tr>
                                    <td>{{ $i++}}</td>
                                    <td>
                                    @if( $item['fees_type'] == 0)
                                    School
                                    @elseif($item['fees_type'] == 1)
                                    Hostel
                                    @elseif($item['fees_type'] == 2)
                                    Library
                                    @endif
                                    </td>
                                    <td>{{$item['total_amount'] ?? ''}}</td>
                                    <td>{{date('d-m-Y', strtotime($item['date'] ?? ''))}}</td>
                                    <td>{{$item['PaymentMode']['name'] ?? ''}}</td>
                                    <td><a href="{{url('print_payement',$item->id)}}" target="blank" class="btn btn-success  btn-xs" title="Fees Print"><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
  
                  </div>
                </div>
               
              </div>
              </div>
              </div>



      </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">

      <div class="row">
      <div class="col-md-12" id="calendarElement">
          
      </div>
      @if(count($noticeBoard) > 0) 
<div class="col-md-12">
<div class="card card-dark">
<div class="card-header">
   <h3 class="card-title"><i class="fa fa-bell"> {{ __('Notice Board') }}</i> </h3>
  
</div>
<div class="">
   <marquee direction="up" scrollamount="4" id="newnotic" onMouseOver="document.all.newnotic.stop()"
       onMouseOut="document.all.newnotic.start()">
       <ul class="todo-list ui-sortable" data-widget="todo-list">
          @if(!empty($noticeBoard))
           @foreach($noticeBoard as $item)
        
           <li class="">
             <a target='blank' href="{{ url('notice_board/view') }}/{{$item->id}}">
                  <span class="text font-weight-bold"> {!! html_entity_decode($item->title ?? '', ENT_QUOTES, 'UTF-8') !!} </span><br>
                  <span class="text text-dark"> {!! html_entity_decode($item->message ?? '', ENT_QUOTES, 'UTF-8') !!} </span>
                   <small class="badge badge-danger"><i class="fa fa-envelope-o"></i>
                       New</small>
               </a>
           </li>
           @endforeach
           @endif
       </ul>
   </marquee>
</div>

</div>

</div>
@endif
      </div>
      </div>
    </div>
    </div>
      <div class="container-fluid">
     
        <div class="row">
      
         
       
            </div>
            
          </div>
    </section>

</div>

<div class="mobile_view">
    <div class="fees_detail">
         <a href="{{ url('student_fees_details') }}/{{Session::get('id')}}">
            <div>
                <p>
                    Total Remaining Fess
                </p>
                <p><i class="fa fa-inr"></i>{{$fee_pending > 0 ? number_format($fee_pending,2). ' Due': 'No Dues'}}</p>
            </div>
            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fa fa-money"></i></span>
        </a>
    </div>
    
    
   <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-8">
                <div class="Section1">
                    <h1 class="text-center" style="font-size: 30px;">Academic</h1>
                    <div class="row mt-3">
                    <div class="col-3 col-sm-6 col-md-3">
          @php
            $url = "profile/edit/".Session::get('id');
            @endphp
                    <a href="{{ url($url) }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-secondary elevation-1"><i
                                    class="fa fa-user"></i></span>
                                    <p>Profile</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('teachers/index') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-graduation-cap"></i></span>
                            <p>My Teachers</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('studentsAttendanceView') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            <p>Attendence</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('student_fees_details') }}/{{Session::get('id')}}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fa fa-money"></i></span>
                           <p>Fees Status</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('my_exams') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="fa fa-book"></i></span>
                            <p>My Exam</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('homework/index') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-info elevation-1 text-white"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                            <p>Home Work</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('timetable') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fas fa fa-calendar-plus-o" aria-hidden="true"></i></span>
                            <p>Time Table</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('student_subject_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-dark elevation-1 text-white"><i class="nav-icon fa fa-book" aria-hidden="true"></i></span>
                            <p>Subjects</p>
                        </div>
                    </a>
                </div>
                </div>
                </div>
                <div class="Section2">
                    <h1 class="text-center" style="font-size: 30px;">Study Marterial</h1>
                    <div class="row mt-3">
                    <div class="col-3 col-sm-6 col-md-3">
                        <a href="{{ url('download_center') }}">
                            <div class="info-box mb-3 text-dark">
                                <span class="info-box-icon bg-secondary elevation-1"><i class="nav-icon fas fa fa-download"></i></span>
                                        <p>Download Center</p>
                            </div>
                        </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('gallery_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fa fa-image"></i></span>
                            <p>Gallery</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('rule_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fa fa-check-square"></i></i></span>
                            <p>Rules</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('notice_board/view/0') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="nav-icon fas fa fa-envelope"></i></span>
                           <p>Notice Board</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('leave_management') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fas fa fa-check-square"></i></span>
                            <p>Apply Leave</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('prayer') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-info elevation-1 text-white"><i class="nav-icon fas fa fa-calendar-plus-o"></i></span>
                            <p>Prayer</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('complaint_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fas fa fa fa-list-alt"></i></span>
                            <p>Complain Box</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('books_uniform_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-dark elevation-1 text-white"> <i class="nav-icon fas fa fa-book"></i></span>
                            <p>Uniform</p>
                        </div>
                    </a>
                </div>
                </div>
                </div>
                <div class="Section3">
                    <h1 class="text-center" style="font-size: 30px;">Other</h1>
                    <div class="row mt-3">
                    <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('student_gate_pass_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fa fa-times-circle-o"></i></span>
                            <p>Gate Pass</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="{{ url('student_bus_assign_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-info elevation-1 text-white"><i class="nav-icon fa fa-truck"></i></span>
                            <p>Transport</p>
                        </div>
                    </a>
                </div>
      
                </div>
                </div>
            </div>
        </div>
    </div>
    


</div>

<style>
    .mobile_view{
        display:none;
    }
    @media only screen and (max-width: 600px){
        body{
            background-color: ghostwhite;
        }
        .main-header{
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
        }
        .desktop{
            display:none;
        }
        
       .mobile_view{
        display:block;
    }
    .fees_detail{
        background-color: #1f2d3d;
         border-radius: 10px;
         color: white;
    }
    .fees_detail a{
        display:flex;
        justify-content:space-around;
        color: white;
        padding: 13px;
        height:100px;
    }
    .fees_detail span{
        margin:auto 0px;
        border-radius:40px;
    }
    .fees_detail span i{
        font-size: 50px;
        padding: 10px;
    }
    .info-box{
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        border-radius: 1.25rem;
        background-color: #fff;
        padding: .5rem;
        height: 115px;
        display:block;
    }
    .info-box-icon{
        margin: 0px auto;
    }
    .info-box p{
        text-align:center;
        font-size: 10px;
        margin-top: 10px;
    }
    }
</style>
@endsection
 
