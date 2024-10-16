 
<?php $__env->startSection('content'); ?>
<?php
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
     

?>

<div class="content-wrapper desktop">
   <section class="content pt-3">

      <div class="container-fluid">
      <div class="row">
      <div class="col-12 col-sm-6 col-md-8">
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('teachers/index')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-graduation-cap"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><?php echo e(__('My Teachers')); ?></span>
                                <span class="info-box-number"><?php echo e(count($tea)); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('studentsAttendanceView')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><?php echo e(__('Attendance')); ?></span>
                                <span class="info-box-number"><?php echo e(\App\Models\StudentAttendance::studentTotalPresent()); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                   <a href="<?php echo e(url('student_fees_details')); ?>/<?php echo e(Session::get('id')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fa fa-money"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><?php echo e(__('Fees Status')); ?></span>
                                <span class="info-box-number"><i class="fa fa-rupee"></i>
                                    
                                    <?php echo e($fee_pending > 0 ? number_format($fee_pending,2). ' Due': 'No Dues'); ?>

                            </div>
                        </div>
                    </a>
                </div>
                 <div class="col-12 col-sm-6 col-md-3">
                   <a href="<?php echo e(url('my_exams')); ?>">
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
                        <a href="<?php echo e(url('homework/index')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-info elevation-1 text-white"><i class="fa fa-tasks" aria-hidden="true"></i>
</span>
                            <div class="info-box-content">
                                <span class="info-box-text"><?php echo e(__('Home Work')); ?></span>
                                <span class="info-box-number">
                                    <?php echo e($home_work > 0 ? $home_work : 'No Pendings'); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
      </div>
<div class="row">
<div class="col-12 col-md-3">
            <div class="card card-outline card-orange">

                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-user-circle-o"></i> &nbsp;<?php echo e(__('messages.Profile')); ?></h3>
                    <div class="card-tools">
                        <!--<a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-arrow-left"></i> Back</a>-->
                    </div>
                </div> 
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" style="width:105px; height:105px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
                    </div>
    
                    <h3 class="profile-username text-center"><?php echo e(Session::get('name')); ?></h3>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b><?php echo e(__('student.Admission No.')); ?></b> <a class="float-right"><?php echo e($getUser['admissionNo'] ?? ''); ?></a>
                      </li>
                      <li class="list-group-item">
                        <b><?php echo e(__('student.Roll No')); ?></b> <a class="float-right"><?php echo e($getUser['roll_no'] ?? ''); ?></a>
                      </li>
                      <li class="list-group-item">
                        <b><?php echo e(__('messages.Class')); ?></b> <a class="float-right"><?php echo e($getUser['ClassTypes']['name'] ?? ''); ?></a>
                      </li>
                      <li class="list-group-item">
                        <b><?php echo e(__('messages.Admission')); ?></b> 
                            <?php if($getUser['admission_type_id'] == 1): ?>
                                <a class="float-right">Regular</a>
                            <?php endif; ?>
                            <?php if($getUser['admission_type_id'] == 2): ?>
                                <a class="float-right">Non</a>
                            <?php endif; ?>                      
                            <?php if($getUser['admission_type_id'] == 3): ?>
                                <a class="float-right"><?php echo e(__('messages.Other')); ?></a>
                            <?php endif; ?>                        
                        </li>                   
                    </ul>
    
                  </div>
             
            </div>

         </div>
         <div class="col-12 col-md-9">
            <div class="card card-outline card-orange">

                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;<?php echo e(__('messages.Personal Details')); ?> </h3>
                    <div class="card-tools">
                        <!--<a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-arrow-left"></i> Back</a>-->
                    </div>
                </div> 
              <!-- <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab"><?php echo e(__('messages.Profile')); ?></a></li>
                </ul>
              </div> -->
              <div class="p-1">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                        <div class=" p-0 mb-3">
                            <table class="table border">
                                <tbody>
                                    <tr>
                                    <td width="25%"><?php echo e(__('messages.Admission Date')); ?></td>
                                    <td width="25%"><?php if(!empty($getUser['admission_date'])): ?> <?php echo e(date('d-m-Y', strtotime($getUser['admission_date']))  ?? ''); ?> <?php else: ?> - <?php endif; ?></td>
                                    <td width="25%"><?php echo e(__('messages.Date Of  Birth')); ?></td>
                                    <td width="25%"><?php echo e(date('d-m-Y', strtotime($getUser['dob'])) ?? ''); ?> </td>   
                                </tr>
                                    
                                    <tr>
                                    <td><?php echo e(__('messages.Mobile Number')); ?></td>
                                    <td><?php echo e($getUser['mobile'] ?? ''); ?></td>
                                    <td><?php echo e(__('messages.E-Mail')); ?></td>
                                    <td><?php echo e($getUser['email'] ?? ''); ?></td>
                                    </tr>
                                   
                                    <tr>
                                    <td><?php echo e(__('messages.Address')); ?></td>
                                    <td><?php echo e($getUser['address'] ?? ''); ?></td>
                                    <td><?php echo e(__('messages.Gender')); ?></td>
                                    <td><?php echo e($getUser['Gender']['name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Aadhar')); ?></td>
                                    <td><?php echo e($getUser->aadhaar ?? ''); ?></td>
                                    <td><?php echo e(__('Religions')); ?></td>
                                    <td><?php echo e($getUser->religion ?? ''); ?></td>
                                    </tr>
                                    
                                    <tr>
                                    <td><?php echo e(__('Blood Group')); ?></td>
                                    <td><?php echo e($getUser->blood_group_type_id ?? ''); ?></td>
                                    <td><?php echo e(__('Category')); ?></td>
                                    <td><?php echo e($getUser->caste_categories_id ?? ''); ?></td>
                                    </tr>
                                   
                                    <tr>
                                    <td><?php echo e(__('Country')); ?></td>
                                    <td><?php echo e($getUser['Country']['name'] ?? ''); ?></td>
                                    <td><?php echo e(__('State')); ?></td>
                                    <td><?php echo e($getUser['State']['name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                   
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('City')); ?></td>
                                    <td><?php echo e($getUser['City']['name'] ?? ''); ?></td>
                                    <td><?php echo e(__('House')); ?></td>
                                    <td><?php echo e($getUser->house ?? ''); ?></td>
                                    </tr>
                                    
                                    <tr>
                                    <td><?php echo e(__('Height')); ?></td>
                                    <td><?php echo e($getUser->height ?? ''); ?></td>
                                    <td><?php echo e(__('Weight')); ?></td>
                                    <td><?php echo e($getUser->weight ?? ''); ?></td>
                                    </tr>
                                   
                                    <tr>
                                    <td><?php echo e(__('Pincode')); ?></td>
                                    <td><?php echo e($getUser->pincode ?? ''); ?></td>
                                    <td><?php echo e(__('Remark')); ?></td>
                                    <td><?php echo e($getUser->remark_1 ?? ''); ?></td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="card-body p-0 mb-3">
                            <table class="table table-sm border table-hover">
                                <thead>
                                    <tr class="bg-light">
                                    <th width="39%" class="text-white"><?php echo e(__('messages.Parent / Guardian Details')); ?> </th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="col-md-4"><?php echo e(__('messages.Fathers Name')); ?></td>
                                    <td class="col-md-5"><?php echo e($getUser['father_name'] ?? ''); ?></td>
                                    <td rowspan="3">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo e(env('IMAGE_SHOW_PATH').'/father_image/'.$getUser['father_img']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" style="width:105px; height:105px;">
                                    </td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('messages.Fathers Contact No')); ?></td>
                                    <td><?php echo e($getUser['father_mobile'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <!--<td><?php echo e(__('messages.Father Occupation')); ?></td>-->
                                    <!--<td><?php echo e($getUser['null'] ?? ''); ?></td>-->
                                    </tr>
                                    <tr>
                                    <td class="col-md-4"><?php echo e(__('messages.Mothers Name')); ?></td>
                                    <td class="col-md-5"><?php echo e($getUser['mother_name'] ?? ''); ?></td>
                                    <td rowspan="3">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo e(env('IMAGE_SHOW_PATH').'/mother_image/'.$getUser['mother_img']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" style="width:105px; height:105px;">
                                    </td>
                                    </tr>
                                    <!--<tr>-->
                                    <!--<td><?php echo e(__('messages.Mothers Contact No.')); ?></td>-->
                                    <!--<td><?php echo e($getUser['mother_mobile'] ?? ''); ?></td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--<td><?php echo e(__('messages.Mother Occupation')); ?></td>-->
                                    <!--<td><?php echo e($getUser['null'] ?? ''); ?></td>-->
                                    <!--</tr>-->
                                </tbody>
                            </table>
                        </div>
                   
                        
                        <?php if(!empty($getUser)): ?>
                        <?php if($getUser->hostel ?? ''): ?>
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
                                    <td><?php echo e($hostelDeatils['hostel_name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td>Building</td>
                                    <td><?php echo e($hostelDeatils['building_name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td>Floor</td>
                                    <td><?php echo e($hostelDeatils['floor_name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td>Room</td>
                                    <td><?php echo e($hostelDeatils['room_name'] ?? ''); ?></td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Bed No.</td>
                                    <td><?php echo e($hostelDeatils['bed_name'] ?? ''); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php endif; ?>
                      
                                <?php if($getUser->library ?? ''): ?>
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
                                    <td> <?php if(!empty($libraryDetails)): ?>
                                                   <?php $__currentLoopData = $libraryDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                    <span class="badge <?php echo e(date('Y-m-d') <= $time['renew_date']  ? 'badge-active' : 'badge-expired'); ?> "><?php echo e($time->study_time ?? ''); ?> (Valid: <?php echo e(date('d-M-Y', strtotime($time['renew_date']))); ?>) <br></span>
                                                   <br>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?></td>
                                    </tr>
                                  
                                    
                                </tbody>
                            </table>
                        </div>
                          <?php endif; ?>
                          <?php endif; ?>
                  </div>
                 
                  <div class="tab-pane" id="fees">
                      
                          <div class="card-body p-0 mb-3">
                            <table class="table table-sm table-hover border">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                        <th><?php echo e(__('Fees Group')); ?></th>
                                        <th><?php echo e(__('messages.Amount')); ?></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php if(!empty($result['school_fees'])): ?>
                                <?php
                                   $i=1;
                                $total_amount = 0;
                            
                                ?>
                                <?php $__currentLoopData = $result['school_fees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($item['group_name'] ?? ''); ?></td>
                                    <td>
                                        <?php echo e($item['amount'] ?? ''); ?>

                                        
                                        <!--<?php echo e($total_amount += $item['amount'] ?? 0); ?>-->
                                    
                                    </td>
                                   </tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php endif; ?>
                                     <?php if(!empty($result['hostel_fees'])): ?>
                                <?php $__currentLoopData = $result['hostel_fees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e('Hostel Fees'); ?></td>
                                    <td><?php echo e($item['hostel_fees'] ?? ''); ?>

                                     <!--<?php echo e($total_amount += $item['hostel_fees'] ?? 0); ?>-->
                                    </td>
                                   </tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                     <?php if(!empty($result['library_fees'])): ?>
                                <?php $__currentLoopData = $result['library_fees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e('Library Fees'); ?></td>
                                    <td><?php echo e($item['library_fees'] ?? ''); ?>

                                   <!--<?php echo e($total_amount += $item['library_fees'] ?? 0); ?>-->
                                    
                                    </td>
                                   </tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                                <tr>
                                    <th class="text-center" colspan=2>Total</th>
                                    
                                    <th ><?php echo e($total_amount ?? 0); ?></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-body p-0 mb-3">
                            <table class="table table-sm table-hover border">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                        <th><?php echo e(__('fees.Fees Type')); ?></th>
                                        <th><?php echo e(__('messages.Amount')); ?></th>
                                        <th><?php echo e(__('Deposit Date')); ?></th>
                                        <th><?php echo e(__('messages.Pay Mode')); ?></th>
                                        <th><?php echo e(__('messages.Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php if(!empty($result['feesDetail'])): ?>
                                <?php
                                   $i=1;
                                
                            
                                ?>
                                <?php $__currentLoopData = $result['feesDetail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td>
                                    <?php if( $item['fees_type'] == 0): ?>
                                    School
                                    <?php elseif($item['fees_type'] == 1): ?>
                                    Hostel
                                    <?php elseif($item['fees_type'] == 2): ?>
                                    Library
                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item['total_amount'] ?? ''); ?></td>
                                    <td><?php echo e(date('d-m-Y', strtotime($item['date'] ?? ''))); ?></td>
                                    <td><?php echo e($item['PaymentMode']['name'] ?? ''); ?></td>
                                    <td><a href="<?php echo e(url('print_payement',$item->id)); ?>" target="blank" class="btn btn-success  btn-xs" title="Fees Print"><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
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
      <?php if(count($noticeBoard) > 0): ?> 
<div class="col-md-12">
<div class="card card-dark">
<div class="card-header">
   <h3 class="card-title"><i class="fa fa-bell"> <?php echo e(__('Notice Board')); ?></i> </h3>
  
</div>
<div class="">
   <marquee direction="up" scrollamount="4" id="newnotic" onMouseOver="document.all.newnotic.stop()"
       onMouseOut="document.all.newnotic.start()">
       <ul class="todo-list ui-sortable" data-widget="todo-list">
          <?php if(!empty($noticeBoard)): ?>
           <?php $__currentLoopData = $noticeBoard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
           <li class="">
             <a target='blank' href="<?php echo e(url('notice_board/view')); ?>/<?php echo e($item->id); ?>">
                  <span class="text font-weight-bold"> <?php echo html_entity_decode($item->title ?? '', ENT_QUOTES, 'UTF-8'); ?> </span><br>
                  <span class="text text-dark"> <?php echo html_entity_decode($item->message ?? '', ENT_QUOTES, 'UTF-8'); ?> </span>
                   <small class="badge badge-danger"><i class="fa fa-envelope-o"></i>
                       New</small>
               </a>
           </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
       </ul>
   </marquee>
</div>

</div>

</div>
<?php endif; ?>
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
         <a href="<?php echo e(url('student_fees_details')); ?>/<?php echo e(Session::get('id')); ?>">
            <div>
                <p>
                    Total Remaining Fess
                </p>
                <p><i class="fa fa-inr"></i><?php echo e($fee_pending > 0 ? number_format($fee_pending,2). ' Due': 'No Dues'); ?></p>
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
          <?php
            $url = "profile/edit/".Session::get('id');
            ?>
                    <a href="<?php echo e(url($url)); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-secondary elevation-1"><i
                                    class="fa fa-user"></i></span>
                                    <p>Profile</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('teachers/index')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-graduation-cap"></i></span>
                            <p>My Teachers</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('studentsAttendanceView')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            <p>Attendence</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('student_fees_details')); ?>/<?php echo e(Session::get('id')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fa fa-money"></i></span>
                           <p>Fees Status</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('my_exams')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="fa fa-book"></i></span>
                            <p>My Exam</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('homework/index')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-info elevation-1 text-white"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                            <p>Home Work</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('timetable')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fas fa fa-calendar-plus-o" aria-hidden="true"></i></span>
                            <p>Time Table</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('student_subject_view')); ?>">
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
                        <a href="<?php echo e(url('download_center')); ?>">
                            <div class="info-box mb-3 text-dark">
                                <span class="info-box-icon bg-secondary elevation-1"><i class="nav-icon fas fa fa-download"></i></span>
                                        <p>Download Center</p>
                            </div>
                        </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('gallery_view')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fa fa-image"></i></span>
                            <p>Gallery</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('rule_view')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fa fa-check-square"></i></i></span>
                            <p>Rules</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('notice_board/view/0')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-warning elevation-1 text-white"><i class="nav-icon fas fa fa-envelope"></i></span>
                           <p>Notice Board</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('leave_management')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fas fa fa-check-square"></i></span>
                            <p>Apply Leave</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('prayer')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-info elevation-1 text-white"><i class="nav-icon fas fa fa-calendar-plus-o"></i></span>
                            <p>Prayer</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('complaint_view')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fas fa fa fa-list-alt"></i></span>
                            <p>Complain Box</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('books_uniform_view')); ?>">
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
                    <a href="<?php echo e(url('student_gate_pass_view')); ?>">
                        <div class="info-box mb-3 text-dark">
                            <span class="info-box-icon bg-primary elevation-1 text-white"><i class="nav-icon fa fa-times-circle-o"></i></span>
                            <p>Gate Pass</p>
                        </div>
                    </a>
                </div>
      <div class="col-3 col-sm-6 col-md-3">
                    <a href="<?php echo e(url('student_bus_assign_view')); ?>">
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
    @media  only screen and (max-width: 600px){
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
<?php $__env->stopSection(); ?>
 

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/student_dashboard.blade.php ENDPATH**/ ?>