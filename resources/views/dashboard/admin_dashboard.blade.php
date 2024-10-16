@php
$noticeBoard = Helper::noticeBoard();
$getstudentbirthday = Helper::getstudentbirthday();
$task = Helper::task();
$chartAttendanceStudents = Helper::chartAttendanceStudents();
$chartAttendanceTeachers = Helper::chartAttendanceTeachers();
$getremark = Helper::getremark();
$roleName = DB::table('role')->whereNull('deleted_at')->find(Session::get('role_id'));
$data = Helper::getMonthWiseFeeCollection();
$data1 = Helper::getWeeklyWiseFeeCollection();

@endphp

@extends('layout.app')
@section('content')


<div class="content-wrapper students_search">
<input type="hidden" id="value">
<input type="hidden" id="value2">
    <section class="content pt-3">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-home"></i> &nbsp;{{ $roleName->name ?? '' }} Dashboard</h3>
                            
                            <div class="card-tools">
                                <!--<a href="{{url('add_user')}}" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-plus"></i> Add User</a>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            <p><i class="fa fa-dot-circle-o"></i> Student Details</p>
            </div>
                <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('admissionView') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-graduation-cap"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.TOTAL STUDENTS') }}</span>
                                <span class="info-box-number">{{App\Models\Admission::countActiveAdmission()}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('studentsAttendanceView') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="ion ion-stats-bars"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.PRESENT STUDENTS') }}</span>
                                <span class="info-box-number">{{\App\Models\StudentAttendance::countPresentStudents()
                                    }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-money"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.FEES COLLECTION') }}</span>
                                <span class="info-box-number"><i class="fa fa-rupee"></i>
                                    {{ number_format(\App\Models\FeesDetail::totalCollection() ,2) ?? '' }}</span>
                            </div>
                        </div>
                    
                </div>
                  
             <div class="col-12 col-sm-6 col-md-3">
           <form id="myForm" action="{{ url('fees/index') }}" method="post">
                @csrf  
                <input type="hidden" class="form-control" id="starting" name="starting" value="{{ date('Y-m-d') }}">
                <input type="hidden" class="form-control" id="ending" name="ending" value="{{ date('Y-m-d') }}">
                <div class="info-box mb-3 text-dark" onclick="submitForm()">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-money"></i></span>
                    <div class="info-box-content">
                       <button type="submit" class="bg-white" style="border:hidden;text-align:left"> <span class="info-box-text">{{ __('dashboard.TODAY COLLECTION') }}</span></button>
                        <span class="info-box-number"><i class="fa fa-rupee"></i>
                            {{ number_format(\App\Models\FeesDetail::todayCollection(), 2) ?? '' }}
                        </span>
                    </div>
                </div>
            </form>
        </div>
        
  </div>
                  
        <div class="row">
            <p><i class="fa fa-dot-circle-o"></i> {{ __('dashboard.User Details') }} </p>
            </div>
            
            
             <div class="row">
                   <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('viewUser') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-user-secret"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.TOTAL USERS') }}</span>
                                <span class="info-box-number">{{ \App\Models\User::countUser() ?? '0' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('teachers/index') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-shirtsinbulk"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.TOTAL TEACHERS') }}</span>
                                <span class="info-box-number">{{\App\Models\Teacher::countTeacher() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('staff/Attendance/view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1"><i class="ion ion-stats-bars"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.PRESENT TEACHERS') }}</span>
                                <span class="info-box-number">{{\App\Models\TeacherAttendance::countTeacherAttendance()
                                    }}</span>
                            </div>
                        </div>
                    </a>
                </div>
   <!--             <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('bank/account/index') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-bank"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.TOTAL ACCOUNTS') }}</span>
                                <span class="info-box-number">{{\App\Models\Account::countAccount() }}</span>
                            </div>
                        </div>
                    </a>
                </div>-->
          <!--      <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('invantory_dashboard') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-archive"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.INVENTORY') }}</span>
                                <span class="info-box-number"> 0</span>
                            </div>
                        </div>
                    </a>
                </div>-->
           
            <!--  <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('complaint_view') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-snapchat"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.TOTAL COMPLAINTS') }}</span>
                                <span class="info-box-number">{{\App\Models\Master\Complaint::countComplaint() }}</span>
                            </div>
                        </div>
                    </a>
                </div>-->
                 <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('expenseView') }}">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-credit-card"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('dashboard.MONTHLY EXPENSES') }}</span>
                                <span class="info-box-number"><i class="fa fa-rupee"></i>
                                    {{ number_format(\App\Models\Expense::totalExpense() ,2) ?? '' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                 </div>
       
 
    <div class="row">

                     @if(count($getstudentbirthday) > 0)  
                  <div class="col-md-4">
                     <div class="card card-warning" >
                    <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-bell"> {{ __('Birthday Notification') }}</i> </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                     
                            <marquee direction="up" scrollamount="4" id="test" onMouseOver="document.all.test.stop()"
                                onMouseOut="document.all.test.start()">
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                    @if(!empty($getstudentbirthday))
                              
                                    @foreach($getstudentbirthday as $item)
                                 
                                    <li class="">
                                        <a href="{{ url('admissionView') }}">
                                            <span class="text text-dark">{{ $item->first_name ?? '' }}{{ $item->last_name ?? '' }}</span>
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
                          

                     @if(count($getremark) > 0)  
                     
                  <div class="col-md-4">
                     <div class="card card-danger" >
                    <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-bell"> {{ __('Student Remark Notification') }}</i> </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                     
                            <marquee direction="up" scrollamount="4" id="student" onMouseOver="document.all.student.stop()"
                                onMouseOut="document.all.student.start()">
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                    @if(!empty($getremark))
                              
                                    @foreach($getremark as $item)
                                 
                                    <li class="">
                                        <a href="{{ url('students/index') }}">
                                            <span class="text text-dark">{{ $item->remark ?? '' }}</span>
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
                
                
                 
                
                
                       @if(count($noticeBoard) > 0) 

                   
                  
                        
                         <div class="col-md-4">
                     <div class="card card-warning">
                    <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-bell"> {{ __('Notifications ') }}</i> </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                         <div class="card-body">
                            <marquee direction="up" scrollamount="4" id="newnotic" onMouseOver="document.all.newnotic.stop()"
                                onMouseOut="document.all.newnotic.start()">
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                   @if(!empty($noticeBoard))
                                    @foreach($noticeBoard as $item)
                                 
                                    <li class="">
                                      <a href="{{ url('notice_board/view') }}/{{$item->id}}">
                                           <span class="text text-dark"> {!! html_entity_decode($item->message ?? '', ENT_QUOTES, 'UTF-8') !!} {!! html_entity_decode($item->title ?? '', ENT_QUOTES, 'UTF-8') !!}</span>
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
           
         <!--   @if(count($noticeBoard) > 0) 
                    <div class="col-md-6">
                     <div class="card card-warning">
                    <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-bell">{{ __('dashboard.Notifications') }} </i> </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                              </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <marquee direction="up" scrollamount="4" id="Notifications" onMouseOver="document.all.Notifications.stop()"
                                onMouseOut="document.all.Notifications.start()">
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                   @if(!empty($noticeBoard))
                                    @foreach($noticeBoard as $item)
                                 
                                    <li class="">
                                      <a href="{{ url('notice_board/view') }}/{{$item->id}}">
                                           <span class="text text-dark">{{ $item->title ?? '' }}</span>
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
              
  -->
          
      <!--
                             <div class="card-body">
                            <marquee direction="up" scrollamount="4" id="Notifications" onMouseOver="document.all.Notifications.stop()"
                                onMouseOut="document.all.Notifications.start()">
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                    @if(!empty($noticeBoard))
                                    @foreach($noticeBoard as $item)
                                    <li class="">
                                        <a href="{{ url('notice_board/view') }}/{{$item->id}}">
                                            <span class="text text-dark">{{ $item->title ?? '' }}</span>
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
                    
                    @endif
                    -->
                 
                 <div class="col-md-5">
                    <div class="card">
                        <div class="card-header ui-sortable-handle flex_items_mb">
                            <h3 class="card-title_mb">
                                <i class="ion ion-clipboard mr-1"></i>
                                {{ __('dashboard.To Do List') }}
                            </h3>
                            <div class="card-tools">
                                <div class="row">
                                    <div class="col-md-8 col-8">
                                        <input type="text" class="form-control form-control-border" id="task"
                                            name="task" placeholder="{{ __('dashboard.Enter Task') }}...">
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <button type="button" class="add_task btn btn-primary float-right btn-xs"><i
                                                class="fa fa-plus"></i> {{ __('common.Add') }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                         
                        <div class="card-body">
                           
                            <ul class="todo-list ui-sortable todoList" data-widget="todo-list">
                              
                            </ul>
                        </div>
                        
                    </div>
                </div>
               <div class="col-md-6">
                    <div class="card">
                        <div class="card-header ui-sortable-handle flex_items_mb">
                            <h3 class="card-title_mb  collection">
                              <i class="fa fa-money mr-1" aria-hidden="true"></i>

                                {{ __('Monthly Fee Collection') }}
                            </h3>
                           
                            <button id="monthly" class='btn btn-primary btn-xs' >Monthly</button>
                            <button id="7_days" class='btn btn-primary btn-xs' >{{date('d')}} Days</button>
                        </div>
                         
                        <div class="card-body " id="chart-container">
                           
                             <canvas class='bg-white'id="myChart"></canvas>
                              
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6" id="calendarElement">

                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
      <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('dashboard.Student Attendance Chart') }} </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                class="chartjs-render-monitor" width="487" height="250"></canvas>
                        </div>

                    </div>
                   

                    <div class="card card-primary" style="display:none !important">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('dashboard.Area Chart') }} </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="areaChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    class="chartjs-render-monitor" width="487" height="250"></canvas>
                            </div>
                        </div>

                    </div>


              


       </div>

                <div class="col-md-6">
                   <div class="card card-danger">
<div class="card-header">
<h3 class="card-title">{{ __('dashboard.Teacher Attendance Chart') }} </h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fa fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fa fa-times"></i>
</button>
</div>
</div>
<div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
<canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
</div>

</div>
                    <div class="card card-info" style="display:none !important">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('dashboard.Line Chart') }} </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="lineChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    class="chartjs-render-monitor" width="487" height="250"></canvas>
                            </div>
                        </div>

                    </div>


                  <!--  <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('dashboard.Bar Chart') }} </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="barChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    class="chartjs-render-monitor" width="487" height="250"></canvas>
                            </div>
                        </div>

                    </div>-->


             <!--       <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"> {{ __('dashboard.Stacked Bar Chart') }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="stackedBarChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    class="chartjs-render-monitor" width="487" height="250"></canvas>
                            </div>
                        </div>

                    </div>-->

                </div>

            </div>

           <!-- <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> {{ __('dashboard.Draggable Events') }}</h4>
                            </div>
                            <div class="card-body">
                                <div id="external-events">
                                    <div class="external-event bg-success ui-draggable ui-draggable-handle"
                                        style="position: relative;">{{ __('dashboard.Lunch') }}</div>
                                    <div class="external-event bg-warning ui-draggable ui-draggable-handle"
                                        style="position: relative;">{{ __('dashboard.Go home') }}</div>
                                    <div class="external-event bg-info ui-draggable ui-draggable-handle"
                                        style="position: relative;">{{ __('dashboard.Do homework') }}</div>
                                    <div class="external-event bg-primary ui-draggable ui-draggable-handle"
                                        style="position: relative;">{{ __('dashboard.Work on UI design') }}</div>
                                    <div class="external-event bg-danger ui-draggable ui-draggable-handle"
                                        style="position: relative;">{{ __('messages.Holiday') }}</div>
                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove">{{ __('dashboard.remove after drop')
                                            }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('dashboard.Create Event') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-primary" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-warning" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-success" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-danger" href="#"><i class="fa fa-square"></i></a></li>
                                        <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                    </ul>
                                </div>
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control"
                                        placeholder="{{ __('dashboard.Event Title') }}">
                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary">{{
                                            __('messages.Add') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                                <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                                    <div class="fc-toolbar-chunk">
                                        <div class="btn-group">
                                            <button type="button" title="Previous month" aria-pressed="false"
                                                class="fc-prev-button btn btn-primary"><span
                                                    class="fa fa-chevron-left"></span></button>
                                            <button type="button" title="Next month" aria-pressed="false"
                                                class="fc-next-button btn btn-primary"><span
                                                    class="fa fa-chevron-right"></span></button>
                                        </div>
                                        <button type="button" title="This month" disabled="" aria-pressed="false"
                                            class="fc-today-button btn btn-primary">today</button>
                                    </div>
                                    <div class="fc-toolbar-chunk">
                                        <h2 class="fc-toolbar-title" id="fc-dom-1">April 2022</h2>
                                    </div>
                                    <div class="fc-toolbar-chunk">
                                        <div class="btn-group">
                                            <button type="button" title="month view" aria-pressed="true"
                                                class="fc-dayGridMonth-button btn btn-primary active">month</button>
                                            <button type="button" title="week view" aria-pressed="false"
                                                class="fc-timeGridWeek-button btn btn-primary">week</button>
                                            <button type="button" title="day view" aria-pressed="false"
                                                class="fc-timeGridDay-button btn btn-primary">day</button>
                                        </div>
                                    </div>
                                </div>
                                <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active"
                                    style="height: 590.37px;">
                                    <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                        <table role="grid" class="fc-scrollgrid table-bordered fc-scrollgrid-liquid">
                                            <thead role="rowgroup">
                                                <tr role="presentation"
                                                    class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                                    <th role="presentation">
                                                        <div class="fc-scroller-harness">
                                                            <div class="fc-scroller" style="overflow: hidden;">
                                                                <table role="presentation" class="fc-col-header "
                                                                    style="width: 795px;">
                                                                    <colgroup></colgroup>
                                                                    <thead role="presentation">
                                                                        <tr role="row">
                                                                            <th role="columnheader"
                                                                                class="fc-col-header-cell fc-day fc-day-sun">
                                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                                        aria-label="Sunday"
                                                                                        class="fc-col-header-cell-cushion ">Sun</a>
                                                                                </div>
                                                                            </th>
                                                                            <th role="columnheader"
                                                                                class="fc-col-header-cell fc-day fc-day-mon">
                                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                                        aria-label="Monday"
                                                                                        class="fc-col-header-cell-cushion ">Mon</a>
                                                                                </div>
                                                                            </th>
                                                                            <th role="columnheader"
                                                                                class="fc-col-header-cell fc-day fc-day-tue">
                                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                                        aria-label="Tuesday"
                                                                                        class="fc-col-header-cell-cushion ">Tue</a>
                                                                                </div>
                                                                            </th>
                                                                            <th role="columnheader"
                                                                                class="fc-col-header-cell fc-day fc-day-wed">
                                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                                        aria-label="Wednesday"
                                                                                        class="fc-col-header-cell-cushion ">Wed</a>
                                                                                </div>
                                                                            </th>
                                                                            <th role="columnheader"
                                                                                class="fc-col-header-cell fc-day fc-day-thu">
                                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                                        aria-label="Thursday"
                                                                                        class="fc-col-header-cell-cushion ">Thu</a>
                                                                                </div>
                                                                            </th>
                                                                            <th role="columnheader"
                                                                                class="fc-col-header-cell fc-day fc-day-fri">
                                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                                        aria-label="Friday"
                                                                                        class="fc-col-header-cell-cushion ">Fri</a>
                                                                                </div>
                                                                            </th>
                                                                            <th role="columnheader"
                                                                                class="fc-col-header-cell fc-day fc-day-sat">
                                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                                        aria-label="Saturday"
                                                                                        class="fc-col-header-cell-cushion ">Sat</a>
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody role="rowgroup">
                                                <tr role="presentation"
                                                    class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                                    <td role="presentation">
                                                        <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                                            <div class="fc-scroller fc-scroller-liquid-absolute"
                                                                style="overflow: hidden auto;">
                                                                <div class="fc-daygrid-body fc-daygrid-body-unbalanced "
                                                                    style="width: 795px;">
                                                                    <table role="presentation"
                                                                        class="fc-scrollgrid-sync-table"
                                                                        style="width: 795px; height: 558px;">
                                                                        <colgroup></colgroup>
                                                                        <tbody role="presentation">
                                                                            <tr role="row">
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other"
                                                                                    data-date="2022-03-27"
                                                                                    aria-labelledby="fc-dom-102">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-102"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="March 27, 2022">27</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other"
                                                                                    data-date="2022-03-28"
                                                                                    aria-labelledby="fc-dom-104">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-104"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="March 28, 2022">28</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other"
                                                                                    data-date="2022-03-29"
                                                                                    aria-labelledby="fc-dom-106">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-106"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="March 29, 2022">29</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other"
                                                                                    data-date="2022-03-30"
                                                                                    aria-labelledby="fc-dom-108">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-108"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="March 30, 2022">30</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other"
                                                                                    data-date="2022-03-31"
                                                                                    aria-labelledby="fc-dom-110">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-110"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="March 31, 2022">31</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                                    data-date="2022-04-01"
                                                                                    aria-labelledby="fc-dom-112">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-112"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 1, 2022">1</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-event-harness"
                                                                                                style="margin-top: 0px;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past"
                                                                                                    style="border-color: rgb(245, 105, 84); background-color: rgb(245, 105, 84);">
                                                                                                    <div
                                                                                                        class="fc-event-main">
                                                                                                        <div
                                                                                                            class="fc-event-main-frame">
                                                                                                            <div
                                                                                                                class="fc-event-title-container">
                                                                                                                <div
                                                                                                                    class="fc-event-title fc-sticky">
                                                                                                                    All
                                                                                                                    Day
                                                                                                                    Event
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="fc-event-resizer fc-event-resizer-end">
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                                    data-date="2022-04-02"
                                                                                    aria-labelledby="fc-dom-114">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-114"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 2, 2022">2</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr role="row">
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                                    data-date="2022-04-03"
                                                                                    aria-labelledby="fc-dom-116">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-116"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 3, 2022">3</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                                    data-date="2022-04-04"
                                                                                    aria-labelledby="fc-dom-118">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-118"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 4, 2022">4</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                                    data-date="2022-04-05"
                                                                                    aria-labelledby="fc-dom-120">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-120"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 5, 2022">5</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                                    data-date="2022-04-06"
                                                                                    aria-labelledby="fc-dom-122">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-122"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 6, 2022">6</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                                    data-date="2022-04-07"
                                                                                    aria-labelledby="fc-dom-124">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-124"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 7, 2022">7</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                                    data-date="2022-04-08"
                                                                                    aria-labelledby="fc-dom-126">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-126"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 8, 2022">8</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                                    data-date="2022-04-09"
                                                                                    aria-labelledby="fc-dom-128">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-128"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 9, 2022">9</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr role="row">
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                                    data-date="2022-04-10"
                                                                                    aria-labelledby="fc-dom-130">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-130"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 10, 2022">10</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                                    data-date="2022-04-11"
                                                                                    aria-labelledby="fc-dom-132">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-132"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 11, 2022">11</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                                    data-date="2022-04-12"
                                                                                    aria-labelledby="fc-dom-134">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-134"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 12, 2022">12</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                                    data-date="2022-04-13"
                                                                                    aria-labelledby="fc-dom-136">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-136"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 13, 2022">13</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                                    data-date="2022-04-14"
                                                                                    aria-labelledby="fc-dom-138">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-138"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 14, 2022">14</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                                    data-date="2022-04-15"
                                                                                    aria-labelledby="fc-dom-140">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-140"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 15, 2022">15</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                                    data-date="2022-04-16"
                                                                                    aria-labelledby="fc-dom-142">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-142"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 16, 2022">16</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr role="row">
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                                    data-date="2022-04-17"
                                                                                    aria-labelledby="fc-dom-144">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-144"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 17, 2022">17</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                                    data-date="2022-04-18"
                                                                                    aria-labelledby="fc-dom-146">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-146"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 18, 2022">18</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                                    data-date="2022-04-19"
                                                                                    aria-labelledby="fc-dom-148">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-148"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 19, 2022">19</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                                    data-date="2022-04-20"
                                                                                    aria-labelledby="fc-dom-150">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-150"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 20, 2022">20</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-past"
                                                                                    data-date="2022-04-21"
                                                                                    aria-labelledby="fc-dom-152">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-152"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 21, 2022">21</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-past"
                                                                                    data-date="2022-04-22"
                                                                                    aria-labelledby="fc-dom-154">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-154"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 22, 2022">22</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-past"
                                                                                    data-date="2022-04-23"
                                                                                    aria-labelledby="fc-dom-156">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-156"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 23, 2022">23</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-event-harness"
                                                                                                style="margin-top: 0px;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-past"
                                                                                                    style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);">
                                                                                                    <div
                                                                                                        class="fc-event-main">
                                                                                                        <div
                                                                                                            class="fc-event-main-frame">
                                                                                                            <div
                                                                                                                class="fc-event-time">
                                                                                                                12a
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="fc-event-title-container">
                                                                                                                <div
                                                                                                                    class="fc-event-title fc-sticky">
                                                                                                                    Long
                                                                                                                    Event
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr role="row">
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-past"
                                                                                    data-date="2022-04-24"
                                                                                    aria-labelledby="fc-dom-158">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-158"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 24, 2022">24</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs"
                                                                                                style="top: 0px; left: 0px; right: -113.562px;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-end fc-event-past"
                                                                                                    style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);">
                                                                                                    <div
                                                                                                        class="fc-event-main">
                                                                                                        <div
                                                                                                            class="fc-event-main-frame">
                                                                                                            <div
                                                                                                                class="fc-event-time">
                                                                                                                12a
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="fc-event-title-container">
                                                                                                                <div
                                                                                                                    class="fc-event-title fc-sticky">
                                                                                                                    Long
                                                                                                                    Event
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 25px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-past"
                                                                                    data-date="2022-04-25"
                                                                                    aria-labelledby="fc-dom-160">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-160"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 25, 2022">25</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 25px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-past"
                                                                                    data-date="2022-04-26"
                                                                                    aria-labelledby="fc-dom-162">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-162"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 26, 2022">26</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-past"
                                                                                    data-date="2022-04-27"
                                                                                    aria-labelledby="fc-dom-164">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-164"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 27, 2022">27</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-today "
                                                                                    data-date="2022-04-28"
                                                                                    aria-labelledby="fc-dom-166">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-166"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 28, 2022">28</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-event-harness"
                                                                                                style="margin-top: 0px;">
                                                                                                <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today"
                                                                                                    href="https://www.google.com/">
                                                                                                    <div class="fc-daygrid-event-dot"
                                                                                                        style="border-color: rgb(60, 141, 188);">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="fc-event-time">
                                                                                                        12a</div>
                                                                                                    <div
                                                                                                        class="fc-event-title">
                                                                                                        Click for Google
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-event-harness"
                                                                                                style="margin-top: 0px;">
                                                                                                <a
                                                                                                    class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today">
                                                                                                    <div class="fc-daygrid-event-dot"
                                                                                                        style="border-color: rgb(0, 115, 183);">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="fc-event-time">
                                                                                                        10:30a</div>
                                                                                                    <div
                                                                                                        class="fc-event-title">
                                                                                                        Meeting</div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-event-harness"
                                                                                                style="margin-top: 0px;">
                                                                                                <a
                                                                                                    class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today">
                                                                                                    <div class="fc-daygrid-event-dot"
                                                                                                        style="border-color: rgb(0, 192, 239);">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="fc-event-time">
                                                                                                        12p</div>
                                                                                                    <div
                                                                                                        class="fc-event-title">
                                                                                                        Lunch</div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-future"
                                                                                    data-date="2022-04-29"
                                                                                    aria-labelledby="fc-dom-168">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-168"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 29, 2022">29</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-event-harness"
                                                                                                style="margin-top: 0px;">
                                                                                                <a
                                                                                                    class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future">
                                                                                                    <div class="fc-daygrid-event-dot"
                                                                                                        style="border-color: rgb(0, 166, 90);">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="fc-event-time">
                                                                                                        7p</div>
                                                                                                    <div
                                                                                                        class="fc-event-title">
                                                                                                        Birthday Party
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-future"
                                                                                    data-date="2022-04-30"
                                                                                    aria-labelledby="fc-dom-170">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-170"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="April 30, 2022">30</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr role="row">
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sun fc-day-future fc-day-other"
                                                                                    data-date="2022-05-01"
                                                                                    aria-labelledby="fc-dom-172">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-172"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="May 1, 2022">1</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other"
                                                                                    data-date="2022-05-02"
                                                                                    aria-labelledby="fc-dom-174">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-174"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="May 2, 2022">2</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other"
                                                                                    data-date="2022-05-03"
                                                                                    aria-labelledby="fc-dom-176">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-176"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="May 3, 2022">3</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
                                                                                    data-date="2022-05-04"
                                                                                    aria-labelledby="fc-dom-178">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-178"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="May 4, 2022">4</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other"
                                                                                    data-date="2022-05-05"
                                                                                    aria-labelledby="fc-dom-180">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-180"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="May 5, 2022">5</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other"
                                                                                    data-date="2022-05-06"
                                                                                    aria-labelledby="fc-dom-182">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-182"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="May 6, 2022">6</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td role="gridcell"
                                                                                    class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other"
                                                                                    data-date="2022-05-07"
                                                                                    aria-labelledby="fc-dom-184">
                                                                                    <div
                                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                        <div class="fc-daygrid-day-top">
                                                                                            <a id="fc-dom-184"
                                                                                                class="fc-daygrid-day-number"
                                                                                                aria-label="May 7, 2022">7</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="fc-daygrid-day-events">
                                                                                            <div class="fc-daygrid-day-bottom"
                                                                                                style="margin-top: 0px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="fc-daygrid-day-bg">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->



        </div>
    </section>

</div>


<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fullcalendar/main.css">
<script src="https://adminlte.io/themes/v3/plugins/fullcalendar/main.js"></script>
<script>
    $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function () {

                // create an Event Object (https://fullcalendar.io/docs/event-object)
                // it doesn't need to have a start or end
               
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }
     
                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function (eventEl) {
                 $("#value").val(eventEl.innerText)
                 
                return {
                    title: eventEl.innerText,
                  
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            //Random default events
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1),
                    backgroundColor: '#f56954', //red
                    borderColor: '#f56954', //red
                    allDay: true
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d - 5),
                    end: new Date(y, m, d - 2),
                    backgroundColor: '#f39c12', //yellow
                    borderColor: '#f39c12' //yellow
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false,
                    backgroundColor: '#0073b7', //Blue
                    borderColor: '#0073b7' //Blue
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false,
                    backgroundColor: '#00c0ef', //Info (aqua)
                    borderColor: '#00c0ef' //Info (aqua)
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false,
                    backgroundColor: '#00a65a', //Success (green)
                    borderColor: '#00a65a' //Success (green)
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'https://www.google.com/',
                    backgroundColor: '#3c8dbc', //Primary (light-blue)
                    borderColor: '#3c8dbc' //Primary (light-blue)
                }
            ],
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function (info) {
                    let text = Object.values(info)
                    $("#value2").val(text)
                    sendCalenderData()
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                  
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });

        
        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        // Color chooser button
        $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        
        
        function sendCalenderData(){
            var value1 = $('#value').val();
            var value2 = $('#value2').val();
            let text = value2;
            const myArray = text.split(",");
                let date = myArray[1];
           $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
		            $.ajax({
                     	url:'/school_calender_add',
					type:'post',
				  data: {
				date: date,
                message: value1,
              
            },
               
                success: function(result) {
                   // var result = JSON.parse(result);
                
                    if (result) {

                      //  toastr.success(result.msg);
                        //	$('.todoList').html(result)
                        	alert("done");
                      
                    } else {
                       // toastr.error(result.msg);
                    }
                }
            })
        }
        $('#add-new-event').click(function (e) {
            e.preventDefault()
            // Get value and make sure it is not null
            var val = $('#new-event').val()
           
            if (val.length == 0) {
                return
            }

            // Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            // Add draggable funtionality
            ini_events(event)

            // Remove event from text input
            $('#new-event').val('')
        })
    })
</script>
<script>

   $(window).on("load", function(){
        tableviewajax()
			
			  });
      function tableviewajax() {
     $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
		            $.ajax({
                     	url:'/task_list',
					type:'post',
				  data: {
                status: "1",
               
            },
               
                success: function(result) {
                   // var result = JSON.parse(result);
                
                    if (result) {

                      //  toastr.success(result.msg);
                        	$('.todoList').html(result)
                        //	alert("done");
                      
                    } else {
                       $('.todoList').html("<p class='text-center'><img style='width:184px' src='{{ env('IMAGE_SHOW_PATH') ?? '' }}/default/Dashboard/task-task-icon-155379995.webp'></p>");

                    }
                }
            })
      }
      
    $(document).on('click', ".add_task", function () {
        var task = $('#task').val();
        var data = { 'task': task }
        if(task=="")
        {
             setTimeout(function() {
          $("#task").css("border-bottom","1px solid red")
          $("#task").css("margin-left","0px")
          }, 20);
             setTimeout(function() {
          $("#task").css("border-bottom","1px solid black")
           $("#task").css("margin-left","3px")
          }, 40);
             setTimeout(function() {
          $("#task").css("border-bottom","1px solid red")
           $("#task").css("margin-left","0px")
          }, 60);
             setTimeout(function() {
          $("#task").css("border-bottom","1px solid black")
           $("#task").css("margin-left","3px")
          }, 80);
             setTimeout(function() {
          $("#task").css("border-bottom","1px solid red")
           $("#task").css("margin-left","0px")
          }, 100);
             setTimeout(function() {
          $("#task").css("border-bottom","1px solid black")
           $("#task").css("margin-left","3px")
          }, 120);
             setTimeout(function() {
          $("#task").css("border-bottom","1px solid red")
           $("#task").css("margin-left","0px")
          }, 140);
             
        }
        else{
        
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type: "POST",
            url: "/add/task",
            data: data,
            dataType: "html",
            success: function (response) {
                toastr.success('Task Added Successfully.');
                  tableviewajax()
                  $("#task").val("");
                     $("#task").css("border-bottom","1px solid black");
            },
        });
        }
    });

    $(document).on('click', ".task_status", function () {
        var id = $(this).data('id');
        var status = $(this).data('status');
        $.ajax({
            url: '/status/task',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                id: id
            },
            success: function () {
                toastr.success('Record Saved Successfully.');
               
            },
        });
    });

    $(document).on('click', ".task_delete", function () {
        var task_id = $(this).data('id');
        var data = { 'task_id': task_id }
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type: "POST",
            url: "/delete/task",
            data: data,
            dataType: "html",
            success: function (response) {
                $("#task_li").remove();
                toastr.error('Task Deleted Successfully.');
              tableviewajax()
            },
        });
    });
</script>
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = $.extend(true, {}, areaChartOptions)
        var lineChartData = $.extend(true, {}, areaChartData)
        lineChartData.datasets[0].fill = false;
        lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
        var donutData = {
            labels: [
                'Present',
                'Absent',
                'Work From Home',
                'Half-Day',
                'Holiday',
               
            ],
            datasets: [
                {
                    data: [ 
                    {{$chartAttendanceStudents['Present']}},{{$chartAttendanceStudents['Absent']}},{{$chartAttendanceStudents['Work_From_Home']}},{{$chartAttendanceStudents['Half_Day']}},{{$chartAttendanceStudents['Holiday']}}],
                    backgroundColor: ['#00a65a', '#f56954',  '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
            ]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      //  var pieData = donutData;
         var pieData = {
            labels: [
                'Present',
                'Absent',
                'Work From Home',
                'Half-Day',
                'Holiday',
               
            ],
            datasets: [
                {
                    data: [ 
                    {{$chartAttendanceTeachers['Present']}},{{$chartAttendanceTeachers['Absent']}},{{$chartAttendanceTeachers['Work_From_Home']}},{{$chartAttendanceTeachers['Half_Day']}},{{$chartAttendanceTeachers['Holiday']}}],
                    backgroundColor: ['#00a65a', '#f56954',  '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
            ]
        }
       
       
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = $.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })
</script>
<script>
    $(window).on("load", function(){
        
      function tableviewajax() {
     $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
		            $.ajax({
                     	url:'/task_list',
					type:'post',
				  data: {
                status: "1",
               
            },
               
                success: function(result) {
                   // var result = JSON.parse(result);
                
                    if (result) {

                      //  toastr.success(result.msg);
                        	$('.todoList').html(result)
                        //	alert("done");
                      
                    } else {
                       // toastr.error(result.msg);
                    }
                }
            })
      }
      tableviewajax()
			
			  });
			  
			  
			  
</script>

<script>
$( document ).ready(function() {
    
 
    
 $(window).on("load", function(){
     
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/calender_view",
                dataType: "json",
         success:function(response){ 
              
              $.each(response.data,function (key, item){
                  var myArray = [
                      "bg-danger",
                      "bg-warning",
                      "bg-primary",
                      "bg-info",
                      "bg-success",
                        ];
                        
                        var randomItem = myArray[Math.floor(Math.random()*myArray.length)];
      var value = $.trim(""+item.date);
          $(".fc-daygrid-day").each(function() {
    
            var data=  $(this).data("date");
           
            if(data == value)
            {
                $(this).find(".fc-daygrid-day-events").append("<div class='mt-1 fc-event-title fc-sticky "+randomItem+"'>"+item.message+"</div>");
                
            }
            })
          
            })
    }
            });
 });

  $(".fc-daygrid-day").each(function() {
       
var data=  $(this).data( "date" );
if(data == "2022-08-01")
{
    $(this).find(".fc-daygrid-day-events").text("dfsdfsfsfsfsf");
}
});
});
</script>

<script>

var token_no = "{{env('SOFTWARE_TOKEN_NO')}}";
                   $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "https://rukmanisoftware.com/api/checkSchoolToken/" + token_no,
              
         success:function(response){ 
                setSession(response.data.student_count,response.data.user_count,response.data.branch_count);
            }
        });
            
            
            function setSession(data1,data2,data3){
                
                
                    $.ajax({
                type: "POST",
                url: "/set_session_count",
                data:{
                    student_count:data1,
                    user_count:data2,
                    branch_count:data3
                },
               
         success:function(response){ 
                  
    }
            });
            }
 

</script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

  $(document).ready(function() {
     chartData(@json($data));
 $('#7_days').click(function() {
        $('#myChart').remove(); // Remove the existing canvas
        $('#chart-container').append('<canvas id="myChart"></canvas>'); // Append a new canvas
        chartData(@json($data1));
        $('.collection').html(`
            <i class="fa fa-money mr-1" aria-hidden="true"></i>
            Weekly Fee Collection
        `);
    });

    $('#monthly').on('click', function() {
        $('#myChart').remove(); // Remove the existing canvas
        $('#chart-container').append('<canvas id="myChart"></canvas>'); // Append a new canvas
        chartData(@json($data));
        $('.collection').html(`
            <i class="fa fa-money mr-1" aria-hidden="true"></i>
            Monthly Fee Collection
        `);
    });
   


function chartData(val){
  var val1 = val['val1'];
  var val2 = val['val2'];
  
    // var total = monthlyData.reduce((sum, value) => sum + value, 0);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Example type, can be 'line', 'pie', 'doughnut', etc.
        data: {
           labels: val1,
            datasets: [{
                label: '',
                data: val2,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
 });

</script>
@endsection