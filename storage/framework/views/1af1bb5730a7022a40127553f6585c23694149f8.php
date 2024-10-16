 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-list-alt"></i> &nbsp;<?php echo e(__('dashboard.Add Complaint')); ?> </h3>
							<div class="card-tools"> <a href="<?php echo e(url('complaint_view')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a> </div>
						</div>
						<form id="quickForm" action="<?php echo e(url('complaint_add')); ?>" method="post" enctype="multipart/form-data"> 
						    <?php echo csrf_field(); ?>						
							<div class="row col-12">
								<div class="col-md-4">
									<div class="form-group">
										<label style="color: red;"><?php echo e(__('common.Subject')); ?>*</label>
										<input class="form-control  <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="subject" name="subject" placeholder="<?php echo e(__('common.Subject')); ?>"> 
                                        <?php $__errorArgs = ['subject'];
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
								<div class="col-md-8">
									<div class="form-group">
										<label style="color: red;"><?php echo e(__('dashboard.Description')); ?>*</label>
										<textarea class="form-control  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="description" name="description" placeholder="<?php echo e(__('dashboard.Description')); ?>"></textarea> 
                                        <?php $__errorArgs = ['description'];
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
							
							 <div class="row m-2 pb-2">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary "><?php echo e(__('common.submit')); ?></button>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/student/complaint/add.blade.php ENDPATH**/ ?>