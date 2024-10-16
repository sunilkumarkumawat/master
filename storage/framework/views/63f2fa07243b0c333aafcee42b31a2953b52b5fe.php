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
							<h3 class="card-title"><i class="fa fa-edit"></i> &nbsp; <?php echo e(__('Achievement Certificate')); ?></h3>
							<div class="card-tools"> <a href="<?php echo e(url('cc/form/index')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?></a> 
							<a href="<?php echo e(url('certificate_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a>
							</div>
						</div>
				
 
            <div class="card-body">
               <!-- <h3>Character Certificate (CC)</h3>
                <hr>-->
              
                <form id="quickForm" action="<?php echo e(url('cc/form/edit')); ?>/<?php echo e($data['id'] ?? ''); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="color:red;"><?php echo e(__('certificate.Admission No.')); ?> *</label>
                                            <input type="hidden" name="admission_id" id="admissionNo" class="form-control" placeholder="<?php echo e(__('certificate.Admission No.')); ?>" readonly="readonly" value="<?php echo e($data->admission_id ?? ''); ?>">
                                            <input type="text" name="registration_no" id="registration_no" class="form-control" placeholder="<?php echo e(__('certificate.Admission No.')); ?>" readonly="readonly" value="<?php echo e($data->admissionNo ?? ''); ?>">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input type="text" id="student_name" readonly="readonly" class="form-control" placeholder="<?php echo e(__('certificate.Student Name')); ?>" value="<?php echo e($data->stu_first_name ?? ''); ?> <?php echo e($data->stu_last_name ?? ''); ?>">
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="color:red;"><?php echo e(__('certificate.Date')); ?> *</label>
                                        <input type="date" name="iessu_date" id="iessu_date" class="form-control <?php $__errorArgs = ['iessu_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($data->iessu_date ?? date('Y-m-d')); ?>">
                                        <?php $__errorArgs = ['iessu_date'];
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
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo e(__('Class')); ?> </label>
                                        <input type="text" name="class_name" id="class_name" class="form-control" value="<?php echo e($data->class_name ?? ''); ?>" placeholder="Class Name" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo e(__('Achievement For')); ?> </label>
                                        <input type="text" name="achievement_for" id="achievement_for" class="form-control" placeholder="<?php echo e(__('Achievement For')); ?>" value="<?php echo e($data->achievement_for ?? ''); ?>">
                                        <?php $__errorArgs = ['achievement_for'];
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
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('common.submit')); ?> </button>
                                </div>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/cc_form/edit.blade.php ENDPATH**/ ?>