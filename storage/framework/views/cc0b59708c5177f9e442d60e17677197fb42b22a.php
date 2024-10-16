<?php
$getPaymentMode = Helper::getPaymentMode();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; <?php echo e(__('hostel.Hostel Student Expenses Add')); ?></h3>
							<div class="card-tools"> 
							    <a href="<?php echo e(url('student_expenses')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> View </a> 
							     <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?>  </a> 
							</div> 
						</div>
                        <form id="studentDetailsForm" method="post" action="<?php echo e(url('student_expenses_add')); ?>" enctype="multipart/form-data">
                           <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-4">
                        			<label><?php echo e(__('hostel.Select Student')); ?><font style="color:red"><b>*</b></font></label>
                            
                                   <select name="hostel_assign_id" id="hostel_assign_id" class="form-control select2 " required>
                                      <option value=""><?php echo e(__('common.Select')); ?></option>
                                      <?php if(!empty($allstudents)): ?>
                                      <?php $__currentLoopData = $allstudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($value->id); ?>"><?php echo e($value->first_name ?? ''); ?> <?php echo e('[Father Name : '); ?><?php echo e($value->father_name ?? 'N/A'); ?><?php echo e(' ]'); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                   </select>
                       
                            	</div>   
                            	<div class="col-md-2">
                            		<div class="form-group">
                            			<label><?php echo e(__('hostel.Expense Name')); ?></label>
                            			<input type="text" class="form-control" id="expense_name" name="expense_name" placeholder="<?php echo e(__('hostel.Expense Name')); ?>" required> 
                            	    </div>
                            	</div>
                            	
                            	<div class="col-md-2">
									<div class="form-group">
										<label>Expense Date</label>
										<input type="date" class="form-control " id="expense_date" name="expense_date" placeholder="Last Name" value="<?php echo e(date('Y-m-d')); ?>">
									</div>
								</div>
								
								
                               <div class="col-md-2">
                            		<div class="form-group">
                            			<label><?php echo e(__('common.Amount')); ?></label>
                            			<input type="text" class="form-control" id="amount" name="amount" placeholder="<?php echo e(__('common.Amount')); ?>" onkeypress="javascript:return isNumber(event)" required> 
                            	    </div>
                            	</div> 
                            	
                            	<div class="col-md-2">
									<div class="form-group">
										<label>Payment Mode</label>
										<select class="form-control" id="payment_mode select2" name="payment_mode">
											<option value="">Select</option>
											<?php if(!empty($getPaymentMode)): ?>
											<?php $__currentLoopData = $getPaymentMode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('expense_head')) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('hostel.Expense Bill')); ?></label>
										<input type="file" class="form-control" id="expense_bill" name="expense_bill"  accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
                            
                               
                                <div class="col-md-1 ">
                            	    <div class="form-group">
                            	        <label style="visibility:hidden"><?php echo e(__('common.Submit')); ?></label>
                            			<button type="submit" class="btn btn-primary"><?php echo e(__('common.Submit')); ?></button>
                            	    </div>                    
                            	</div>
                            </div> 
                        </form>   
				</div>
			</div>
		</div>
	</section>
</div>
<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/student_expneses/add.blade.php ENDPATH**/ ?>