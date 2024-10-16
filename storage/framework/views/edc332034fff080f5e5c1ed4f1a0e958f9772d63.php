<?php
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
?>

<?php $__env->startSection('content'); ?>

<?php
    $studentCount = DB::table('admissions')->where('deleted_at',null)->count();
?>
						
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-calendar"></i> &nbsp;<?php echo e(__('Academic Calendar Add')); ?></h3>
							<div class="card-tools">
								<a href="<?php echo e(url('view_weekend')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <span class="Display_none_mobile"> <?php echo e(__('common.View')); ?> </span></a>
								<a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"> <?php echo e(__('common.Back')); ?> </span></a>
							</div>

						</div>


                        
                        <form id="quickForm_addmission" action="<?php echo e(url('add_weekend')); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="row m-2">

                            <!-- <div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('Month Type')); ?><span style="color:red;">*</span></label>
										<select class="form-control invalid" id="month_id" name="month_id">
											<?php if(!empty($getMonths)): ?>
                                                <?php $__currentLoopData = $getMonths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($month->id ?? ''); ?>" <?php echo e(($month->id == old('month_id')) ? 'selected' : ''); ?>><?php echo e($month->name ?? ''); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
										</select>
									    <span class="invalid-feedback" id="month_type_invalid" role="alert">
                                            <strong>The Month Type is required</strong>
                                        </span>
									</div>
								</div> -->
                                <!-- <div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('Special Day')); ?><span style="color:red;">*</span></label>
										<input type="text" name="special_day" id="special_day" class="form-control invalid " value="<?php echo e(old('special_day')); ?>" placeholder="<?php echo e(__('Special Day')); ?>">
										<span class="invalid-feedback" id="special_day_invalid" role="alert">
                                            <strong>The Special Day field is required</strong>
                                        </span>
									</div>
								</div> -->
								<div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('From Date')); ?><span style="color:red;">*</span></label>
										<input type="date" class="form-control invalid" id="from_date" name="from_date" placeholder=" Date" value="<?php echo e(date('Y-m-d')); ?>" required>
										<span class="invalid-feedback" id="from_date_invalid" role="alert">
                                            <strong>The From Date field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('To Date')); ?><span style="color:red;">*</span></label>
										<input type="date" class="form-control invalid" id="to_date" name="to_date" placeholder="To Date" value="<?php echo e(date('Y-m-d')); ?>" required>
										<span class="invalid-feedback" id="to_date_invalid" role="alert">
                                            <strong>The To Date field is required</strong>
                                        </span>
									</div>
								</div>
                                <div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('Event/Schedule')); ?><span style="color:red;">*</span></label>
										<input type="text" name="event_schedule" id="event_schedule" class="form-control invalid " value="<?php echo e(old('event_schedule')); ?>" placeholder="<?php echo e(__('Event/Schedule')); ?>" required>
										<span class="invalid-feedback" id="event_schedule_invalid" role="alert">
                                            <strong>The Event/Schedule field is required</strong>
                                        </span>
									</div>
								</div>

								
                              
                                <!-- <div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('Day')); ?></label>
										<input type="text" name="day" id="day" class="form-control" value="<?php echo e(old('day')); ?>" placeholder="<?php echo e(__('Day')); ?>">
									</div>
								</div> -->
                                
                                 <div class="col-md-3">
								 <label><?php echo e(__('Attendance status for that day')); ?><span style="color:red;">*</span></label>
									<select class="form-control select2" id="attendance_status" name='attendance_status' required>
                    			   <option value="" >Select</option>
                                 <?php if(!empty($getAttendanceStatus)): ?> 
                                    <?php $__currentLoopData = $getAttendanceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                            <option value="<?php echo e($attendance_status->id ?? ''); ?>"  <?php if(!empty($stu_att)): ?> <?php echo e($attendance_status->id == $stu_att->attendance_status_id ? 'selected' : ''); ?> <?php endif; ?>><?php echo e($attendance_status->name ?? ''); ?></option>
                                      
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                </select>  
								</div>
                                

                                <div class="col-md-12 text-center mt-5">
								    <button type="submit" class="btn btn-primary "><?php echo e(__('common.submit')); ?></button><br><br>
							    </div>


                            </div>

							

	                    </form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/Weekendcalendar/add.blade.php ENDPATH**/ ?>