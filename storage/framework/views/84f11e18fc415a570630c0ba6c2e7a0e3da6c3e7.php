<?php
$getPaymentMode = Helper::getPaymentMode();
$getAllUsers = Helper::getAllUsers();
$getAllHead = Helper::getAllHead();

?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;<?php echo e(__('hostel.Hostel Expense Add')); ?></h3>
							<div class="card-tools">
								<a href="<?php echo e(url('hostelExpensesView')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?></a>
								<a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
							</div>

						</div>
						<form id="quickForm" action="<?php echo e(url('hostelExpensesAdd')); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>

							<div class="row m-2">
								<div class="col-md-3">
									<div class="form-group">
										<label style="color:red;"><?php echo e(__('hostel.Expense Head')); ?>*</label>
										<select class="form-control <?php $__errorArgs = ['expense_head'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="expense_head" name="expense_head">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getAllHead)): ?>
											<?php $__currentLoopData = $getAllHead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('expense_head')) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										<?php $__errorArgs = ['expense_head'];
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
										<label style="color:red;"><?php echo e(__('hostel.Expense Name')); ?>*</label>
										<input type="text" class="form-control <?php $__errorArgs = ['expense_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="expense_name" name="expense_name" placeholder="<?php echo e(__('hostel.Expense Name')); ?>" value="<?php echo e(old('expense_name')); ?>">
										<?php $__errorArgs = ['expense_name'];
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
										<label style="color:red;"><?php echo e(__('hostel.Expense Date')); ?>*</label>
										<input type="date" class="form-control <?php $__errorArgs = ['expense_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="expense_date" name="expense_date" placeholder="<?php echo e(__('messages.Last Name')); ?>" value="<?php echo e(date('Y-m-d')); ?>">
										<?php $__errorArgs = ['expense_date'];
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
										<label style="color:red;"><?php echo e(__('hostel.Expense Amount')); ?>*</label>
										<input type="text" class="form-control <?php $__errorArgs = ['expense_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="expense_amount" name="expense_amount" placeholder="<?php echo e(__('hostel.Expense Amount')); ?>" value="<?php echo e(old('expense_amount')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
										<?php $__errorArgs = ['expense_amount'];
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
										<label style="color:red;"><?php echo e(__('hostel.Expense By')); ?>*</label>
										<select class="form-control <?php $__errorArgs = ['expense_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="expense_by" name="expense_by">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getAllUsers)): ?>
											<?php $__currentLoopData = $getAllUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('expense_by')) ? 'selected' : ''); ?>><?php echo e($value->first_name ?? ''); ?><?php echo e($value->last_name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										<?php $__errorArgs = ['expense_by'];
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
										<label style="color:red;"><?php echo e(__('hostel.Payment Mode')); ?>*</label>
										<select class="form-control <?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="payment_mode" name="payment_mode">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getPaymentMode)): ?>
											<?php $__currentLoopData = $getPaymentMode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('expense_head')) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										
										</select>
										<?php $__errorArgs = ['payment_mode'];
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
										<label><?php echo e(__('hostel.Expense Bill')); ?></label>
										<input type="file" class="form-control" id="expense_bill" name="expense_bill"  accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_error"></p>
									
									</div>
								</div>
								</div>
							<div class="row m-2">
								<div class="col-md-12 text-center pb-2">
									<button type="submit" class="btn btn-primary "><?php echo e(__('common.submit')); ?></button>
									<!-- <a href="https://wa.me/?text= hello this  msg is for testing purpose">Whatsapp testing</a>-->

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#expense_bill').change(function(e){
            $('#image_error').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_error').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_error').html("");
            }
        }else{
            $('#image_error').html("Image Size File");
            $(this).val('');
        }
        });
    });
    </script>
    
    <style>
    #image_error{
        font-weight: bold;
    font-size: 14px;
    }
    </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/ExpanceAdd/add.blade.php ENDPATH**/ ?>