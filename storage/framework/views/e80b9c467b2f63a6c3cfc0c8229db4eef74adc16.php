 
<?php $__env->startSection('content'); ?>
<?php
$getSetting = Helper::getSetting();
$getUser = $data;

$busAssign=Helper::busAssign();
?>

<div class="content-wrapper">
    
   <section class="content pt-3">
      <div class="container-fluid">
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
                      <img class="profile-user-img img-fluid img_frame" src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" style="width:105px; height:105px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
                    </div>
    
                    <h3 class="profile-username text-center"><?php echo e($getUser->first_name ?? ''); ?> <?php echo e($getUser->last_name ?? ''); ?></h3>
    
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
                        <a href="<?php echo e(url('studentsDashboard')); ?>"><button class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i> Back
                        </button></a>
                        <?php if($data->status != 3): ?>
                        <a href="<?php echo e(url('admissionEdit',$data->id)); ?>" class="btn btn-primary btn-sm" title="Edit Student"><i class="fa fa-edit"></i></a>
                        <!--<a href="<?php echo e(url('Fees/add')); ?>" class="btn btn-primary  btn-sm" title="Collect Fees"><i class="fa fa-money"></i></a>-->
                        <a href="#" data-user_name="<?php echo e($data['userName'] ?? ''); ?>" data-confirm_password="<?php echo e($data['confirm_password'] ?? ''); ?>" data-first_name="<?php echo e($data['first_name'] ?? ''); ?>" data-last_name="<?php echo e($data['last_name'] ?? ''); ?>" class="btn btn-primary btn-sm loginDetail" title="Login Details"><i class="fa fa-key"></i></a>
                        <a data-id="<?php echo e($data['id'] ?? ''); ?>" style="<?php echo e($data['status'] == 0 ? 'display:none'   : ''); ?>" data-status="0" class="btn btn-primary  btn-sm change_status" data-bs-toggle="modal" data-bs-target="#statusModel" title="Disable Student"><i class="fa fa-thumbs-o-up"></i></a>
                        <a data-id="<?php echo e($data['id'] ?? ''); ?>" style="<?php echo e($data['status'] == 1 ? 'display:none'   : ''); ?>" data-status="1" class="btn btn-primary  btn-sm change_status " data-bs-toggle="modal" data-bs-target="#statusModel" title="Enable Student"><i style="color:red" class="fa fa-thumbs-o-down "></i></a>
                        <?php endif; ?>
                     </div>
                </div> 
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab"><?php echo e(__('messages.Profile')); ?></a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profile">
                        <div class="card-body p-0 mb-3">
                            <table class="table table-sm table-hover border">
                                <tbody>
                                    <tr>
                                    <td><?php echo e(__('messages.Admission Date')); ?></td>
                                    <td><?php if(!empty($getUser['admission_date'])): ?> <?php echo e(date('d-m-Y', strtotime($getUser['admission_date']))  ?? ''); ?> <?php else: ?> - <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('messages.Date Of  Birth')); ?></td>
                                    <td><?php echo e(date('d-m-Y', strtotime($getUser['dob'])) ?? ''); ?> </td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('messages.Mobile Number')); ?></td>
                                    <td><?php echo e($getUser['mobile'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('messages.E-Mail')); ?></td>
                                    <td><?php echo e($getUser['email'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('messages.Address')); ?></td>
                                    <td><?php echo e($getUser['address'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('messages.Gender')); ?></td>
                                    <td><?php echo e($getUser['Gender']['name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Aadhar')); ?></td>
                                    <td><?php echo e($getUser->aadhaar ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Jan Aadhar')); ?></td>
                                    <td><?php echo e($getUser->jan_aadhaar ?? ''); ?></td>
                                    </tr>
                                    <!--<tr>
                                    <td><?php echo e(__('Religions')); ?></td>
                                    <td><?php echo e($getUser->religion ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Blood Group')); ?></td>
                                    <td><?php echo e($getUser->blood_group_type_id ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Category')); ?></td>
                                    <td><?php echo e($getUser->caste_categories_id ?? ''); ?></td>
                                    </tr>-->
                                    <tr>
                                    <td><?php echo e(__('Country')); ?></td>
                                    <td><?php echo e($getUser['country_name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('State')); ?></td>
                                    <td><?php echo e($getUser['state_name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('City')); ?></td>
                                    <td><?php echo e($getUser['city_name'] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('House')); ?></td>
                                    <td><?php echo e($getUser->house ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Height')); ?></td>
                                    <td><?php echo e($getUser->height ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Weight')); ?></td>
                                    <td><?php echo e($getUser->weight ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Pincode')); ?></td>
                                    <td><?php echo e($getUser->pincode ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Remark')); ?></td>
                                    <td><?php echo e($getUser->remark_1 ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                    <td><?php echo e(__('Previous School Name and Address')); ?></td>
                                    <td><?php echo e($getUser->previous_school ?? ''); ?></td>
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
                                        <img class="profile-user-img img-fluid img_frame" src="<?php echo e(env('IMAGE_SHOW_PATH').'/father_image/'.$getUser['father_img']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" style="width:60px; height:60px;">
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
                                        <img class="profile-user-img img-fluid img_frame" src="<?php echo e(env('IMAGE_SHOW_PATH').'/mother_image/'.$getUser['mother_img']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" style="width:60px; height:60px;">
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
    </section>

</div>

<style>
    .card-header .nav-pills .nav-link {
        color: #db5b06;
    }
    
    .img_frame{
        border-radius:4px;
    }
</style>
<script>
    /*$( document ).ready(function() {
    var statusColor = $('#statusColor').data();
    alert(statusColor);
    if(statusColor = 0){
        $(".card").addClass("bg-danger");
    }
});*/
    $(document).on('click', ".loginDetail", function() {
        $('#Modal_id').modal('toggle');
        userName = $(this).data("user_name");
        confirm_password = $(this).data("confirm_password");
        first_name = $(this).data("first_name");
        last_name = $(this).data("last_name");

        $('#userName').html(userName);
        $('#confirm_password').html(confirm_password);
        $('#first_name').html(first_name);
        $('#last_name').html(last_name);
    });

    $(document).on('click', ".change_status", function() {
        $('#myModal').modal('toggle');
        id = $(this).data("id");
        status = $(this).data("status");
    });
    $(document).on('click', ".change_status1", function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/stu_status',
            data: {
                status: status,
                id: id
            },
            success: function(response) {
                location.reload();
                toastr.success('Status Changed Successfully !');
            },
        });
    });
</script>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #555b5beb;">

            <div class="modal-header">
                <h4 class="modal-title text-white"><?php echo e(__('common.Status Change Confirmation')); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>

            <form action="#" method="post">
                <div class="modal-body">
                    <h5 class="text-white"><?php echo e(__('common.Are you sure you want to Change Status ?')); ?></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light change_status1" data-bs-dismiss="modal"><?php echo e(__('common.Yes')); ?></button>
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.No')); ?></button>

                </div>
            </form>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="Modal_id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('student.Login Details')); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center"><span id="first_name"></span> <span id="last_name"></span></h4>
                <div class="row border-bottom">
                    <div class="col-md-4"><b><?php echo e(__('student.User Type')); ?></b></div>
                    <div class="col-md-4"><b><?php echo e(__('student.Username')); ?></b></div>
                    <div class="col-md-4"><b><?php echo e(__('common.Password')); ?></b></div>
                </div>
                <div class="row border-bottom">
                    <div class="col-md-4"><?php echo e(__('student.Student')); ?></div>
                    <div class="col-md-4" id="userName"></div>
                    <div class="col-md-4" id="confirm_password"></div>
                </div>
                <div class="row mt-3">
                    <div class-"col-md-12"><b class=" text-primary"><?php echo e(__('student.Login Url')); ?>: &nbsp; <a href="<?php echo e(url('/')); ?>/student/login" target="blank"><?php echo e(url('/')); ?>/student/login</a></b></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
 

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/admission/studentDetail.blade.php ENDPATH**/ ?>