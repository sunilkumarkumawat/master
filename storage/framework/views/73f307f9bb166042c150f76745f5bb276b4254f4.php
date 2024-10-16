
 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    
   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-hospital-o"></i> &nbsp; <?php echo e(__('hostel.Hostel Management')); ?></h3>
                    <div class="card-tools">
                        <a href="<?php echo e(url('hostel_assign_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-eye"></i> Diagramatic VIew</a>
                    </div>
            
                </div>               
            </div>
            </div>  
            
            <?php if(!empty(Helper::SidebarSubPerm(15))): ?>
                <?php $__currentLoopData = Helper::SidebarSubPerm(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 col-6">
                    <a href="<?php echo e(url($sub_sidebar['url'] ?? '')); ?>" class="small-box-footer">
                        <div class="small-box bg-<?php echo e($sub_sidebar['bg_color'] ?? ''); ?>">
                            <div class="inner">
                                <h4 class="mobile_text_title"> <?php if(Session::get('locale') == 'hi'): ?><?php echo e($sub_sidebar['hindi_name'] ?? ''); ?> <?php else: ?> <?php echo e($sub_sidebar['name'] ?? ''); ?> <?php endif; ?> </h4>
                                <p><?php echo e(__('common.Enter')); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fa <?php echo e($sub_sidebar['ican'] ?? ''); ?>"></i>
                            </div>
                            <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
            
        
            
            <!--<div class="col-md-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4><?php echo e(__('hostel.Room')); ?></h4>
                        <h4><?php echo e(\App\Models\hostel\HostelRoom::countTotelRoom()); ?>

                        <span>
                            <a href="<?php echo e(url('room_add')); ?>" class="btn btn-primary btn-xs ml-4" title="Add Room"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?> </a>
                            <a href="<?php echo e(url('room_view')); ?>" class="btn btn-primary btn-xs ml-4" title="View Room"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a>
                        </span>
                        </h4>                        
                    </div>
                    <div class="icon">     
                        <i class="fa fa-trello"></i>
                    </div>
                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?> <i class="fa fa-arrow-circle-right"></i></div>
                </div>
            </div> --> 

            <!--<div class="col-md-3">
                <a href="<?php echo e(url('room_view')); ?>"  class="small-box-footer">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4>Room View</h4>
                        <h4><?php echo e(\App\Models\hostel\HostelRoom::countTotelRoom()); ?></h4>
                    </div>
                    <div class="icon">     
                        <i class="fa fa-trello"></i>
                    </div>
                    <div class="text-center small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>-->
            

            <!--<div class="col-md-3">
                <a href="<?php echo e(url('bed_view')); ?>"  class="small-box-footer">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4>Bed View</h4>
                        <h4><?php echo e(\App\Models\hostel\HostelBed::countTotelBed()); ?></h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bed"></i>
                    </div>
                    <div class="text-center small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>-->

         
                <!-- <div class="col-md-3">-->
                <!--    <a href="<?php echo e(url('studentsAttendanceAdd')); ?>" class="small-box-footer">-->
                <!--        <div class="small-box bg-primary">-->
                <!--            <div class="inner">-->
                <!--                <h4><?php echo e(__('student.Students Attendance')); ?></h4>-->
                <!--                <p><?php echo e(__('messages.Enter')); ?></p>-->
                <!--            </div>-->
                <!--            <div class="icon">-->
                <!--                <i class="fa fa-bar-chart"></i>-->
                <!--            </div>-->
                <!--            <div class="text-center small-box-footer"><?php echo e(__('messages.More info')); ?> <i class="fa fa-arrow-circle-right"></i></div>-->
                <!--        </div>-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div class="col-md-3">-->
                <!--    <a href="<?php echo e(url('studentsAttendanceView')); ?>" class="small-box-footer">-->
                <!--        <div class="small-box bg-success">-->
                <!--            <div class="inner">-->
                <!--                <h4><?php echo e(__('student.Attendance View')); ?></h4>-->
                <!--                <p><?php echo e(__('messages.Enter')); ?></p>-->
                <!--            </div>-->
                <!--            <div class="icon">-->
                <!--                <i class="fa fa-bar-chart"></i>-->
                <!--            </div>-->
                <!--            <div class="text-center small-box-footer"><?php echo e(__('messages.More info')); ?> <i class="fa fa-arrow-circle-right"></i></div>-->
                <!--        </div>-->
                <!--    </a>-->
                <!--</div>-->
        </div>
    
        <div class="row" style="margin-top:5%;">
              <!--<div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-hospital-o"></i> &nbsp; <?php echo e(__('hostel.Hostel Expenses Management')); ?></h3>
                    <div class="card-tools">
                        <a href="<?php echo e(url('add_user')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-plus"></i> Add User</a>
                    </div>
            
                </div>               
            </div>
            </div> -->
            
            
        </div>
        <div class="row" style="margin-top:5%;">
              <!--<div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-hospital-o"></i> &nbsp; <?php echo e(__('hostel.Hostel Mess Management')); ?></h3>
                    <div class="card-tools">
                        <a href="<?php echo e(url('add_user')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-plus"></i> Add User</a>
                    </div>
            
                </div>               
            </div>
            </div> -->
            
             
        </div>
        
    </div>
    </section>
</div>


  
       

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_dashboard.blade.php ENDPATH**/ ?>