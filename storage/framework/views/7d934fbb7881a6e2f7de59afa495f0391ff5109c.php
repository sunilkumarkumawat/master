<?php
$getRole = Helper::roleType();
$classType = Helper::classType();
?>
 
<?php $__env->startSection('content'); ?>

                                                                    
<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">
    <div class="card card-outline card-orange">
        	<div class="card-header bg-primary">
                        <?php if(Session::get('') == 3): ?>
                            <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp; <?php echo e(__('Add Whatsapp Group')); ?></h3>
                        <?php else: ?>						    
							<h3 class="card-title"><i class="nav-icon fas fa fa-leanpub"></i> &nbsp;<?php echo e(__('Add Whatsapp Group')); ?></h3>
						<?php endif; ?>
							<div class="card-tools"> 
							<?php if(Session::get('role_id') !== 3): ?>
							    <a href="<?php echo e(url('send_message_terminal')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
                            <?php endif; ?>

                                
                            </div>
						</div>
						
                 
        <section class="content">
            <form action='<?php echo e(url("group_add")); ?>' method='post' >
                <?php echo csrf_field(); ?>
            <div class="container-fluid">
                <div class="row m-2">
                    <div class=" col-md-12 title"><h5 class="text-danger"><?php echo e(__('Select Class')); ?> :-</h5></div>
                    <div class="col-md-3">
                		<div class="form-group">
                			<label style="color:red;"><?php echo e(__('messages.Select')); ?>*</label>
                			<select class="form-control select2 <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="class" name="class_type_id">
                			<option value=""><?php echo e(__('messages.Select')); ?></option>
                              <?php if(!empty($classType)): ?>
                                <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id ?? ''); ?>"><?php echo e($value->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>

                            </select>
                             <?php $__errorArgs = ['class_type_id'];
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
                			<label style="color:red;"><?php echo e(__('Group Name')); ?>*</label>
                		<input type='text' class='form-control <?php $__errorArgs = ["group_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>' name='group_name' />
                		 <?php $__errorArgs = ['group_name'];
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
                			<label style="color:red;"><?php echo e(__('Group Id')); ?>*</label>
                	<input type='text' class='form-control <?php $__errorArgs = ["group_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>' name='group_id' />
                	 <?php $__errorArgs = ['group_id'];
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
                       	
                               	
                
                    <div class="col-md-1">
                         <label class="text-white"><?php echo e(__('&nbsp;')); ?></label>
                	    <button class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                	</div>
                </div>
      </form>
        </section>
        <section>
         
    </div>
</div>
</div>
</div>
</div>
</section>
</div>









<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/sms_service/group_add.blade.php ENDPATH**/ ?>