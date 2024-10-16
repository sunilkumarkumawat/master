<?php
   $getstudents = Helper::getstudents();
   
    
?>

 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-edit"></i> &nbsp; Sport Certificate</h3>
							<div class="card-tools"> <a href="<?php echo e(url('sport/certificate/index')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?></a>
							 <a href="<?php echo e(url('certificate_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?></a> </div>
						</div>
            <div class="card-body">
                <form id="quickForm" action="<?php echo e(url('sport/certificate/edit')); ?>/<?php echo e(($data->id)); ?>" method="post" >
                     <?php echo csrf_field(); ?>
             <!--    <div class="row">
                     
                    <div class="col-md-6">
			<div class="form-group">
				<label> Search Student</label>
				<select type="text" name="student" id="student" class="form-control <?php $__errorArgs = ['student'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($data->student); ?>" onchange="student_data()">
               <?php if(!empty($getstudents)): ?> 
                      <?php $__currentLoopData = $getstudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($students->id ?? ''); ?>" ><?php echo e($students->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  
                  	<?php $__errorArgs = ['student'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($message); ?></strong>
						</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </select>
		    </div>
		</div>
                </div>  -->   
                
                <div class="row">
                    <div class="col-md-3">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('certificate.Admission No.')); ?>*</label>
				<input type="hidden" name="admission_id" id="admission_id" class="form-control" readonly="readonly" placeholder="<?php echo e(__('certificate.Admission No.')); ?>"  value="<?php echo e($data->admission_id); ?>">
				<input type="text" name="registration_no" id="registration_no" class="form-control" readonly="readonly" placeholder="<?php echo e(__('certificate.Admission No.')); ?>"  value="<?php echo e($data->admissionNo); ?>">
                
		    </div>
		</div>
                    <div class="col-md-3">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('certificate.Student Name')); ?>*</label>
				<input type="text" name="name" id="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" placeholder="<?php echo e(__('certificate.Student Name')); ?>"  value="<?php echo e($data->stu_name); ?>">
                	<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($message); ?></strong>
						</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		    </div>
		</div>
                    <div class="col-md-3">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('common.Fathers Name')); ?>*</label>
				<input type="text" name="father_name" id="father_name" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" placeholder="<?php echo e(__('common.Fathers Name')); ?>"  value="<?php echo e($data->stu_father_name); ?>">
                	<?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($message); ?></strong>
						</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		    </div>
		</div>
	<!--	<div class="col-md-3">
			<div class="form-group">
				<label style="color:red;">Student Roll No.*</label>
				<input type="text" name="student_roll_no" id="student_roll_no" class="form-control <?php $__errorArgs = ['student_roll_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Student Roll No."  value="<?php echo e($data->student_roll_no); ?>" maxlength="6" onkeypress="javascript:return isNumber(event)">
                	<?php $__errorArgs = ['student_roll_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($message); ?></strong>
						</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		    </div>
		</div>-->
		<div class="col-md-3">
			<div class="form-group">
				<label><?php echo e(__('certificate.Event Type')); ?></label>
				<input type="text" name="event_type" id="event_type" class="form-control <?php $__errorArgs = ['event_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Event Type')); ?>"  value="<?php echo e($data->event_type); ?>">
                	<?php $__errorArgs = ['event_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($message); ?></strong>
						</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		    </div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('Held On')); ?>*</label>
				<input type="date" name="organized_date" id="organized_date" class="form-control <?php $__errorArgs = ['organized_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e($data->organized_date); ?>">
                	<?php $__errorArgs = ['organized_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($message); ?></strong>
						</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		    </div>
		</div>
                
        <div class="col-md-3">
			<div class="form-group">
				<label><?php echo e(__('certificate.Rank')); ?></label>
				<input type="text" name="rank" id="rank" class="form-control <?php $__errorArgs = ['rank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Rank')); ?>"  value="<?php echo e($data->rank); ?>">
                	<?php $__errorArgs = ['rank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert">
							<strong><?php echo e($message); ?></strong>
						</span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		    </div>
		</div>
	
            </div>
       
        <div class="row m-2">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><?php echo e(__('common.Update')); ?></button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/sports/edit.blade.php ENDPATH**/ ?>