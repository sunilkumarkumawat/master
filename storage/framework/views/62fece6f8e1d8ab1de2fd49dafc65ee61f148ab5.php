        <?php
   $getRole = Helper::roleType();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-envelope"></i> &nbsp;  <?php echo e(__('master.Add Notice')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('notice_board/view')); ?>/<?php echo e(0); ?>" class="btn btn-primary  btn-sm" title="View Notice Bord"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?> </a>
                                <a href="https://demo3.rusoft.in/master_dashboard" class="btn btn-primary  btn-sm" title="Back "><i class="fa fa-arrow-left"></i>Back   </a>
                            </div>
                        </div>        
                        <form id="quickForm" action="<?php echo e(url('notice_board/add')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"style="color:red;"><?php echo e(__('master.Title')); ?>*</label>
                                        <input autofocus="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"id="title" name="title" placeholder="<?php echo e(__('master.Title')); ?>" type="text" value="" />
                                        <?php $__errorArgs = ['title'];
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
                                    <div class="form-group"><label style="color:red;"><?php echo e(__('master.Message')); ?>*</label>
                                        <textarea   class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"id="compose-textarea" name="message"  style="height: 300px;"> </textarea>
                                        <?php $__errorArgs = ['message'];
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
                                        <label for="exampleInputEmail1"style="color:red;"><?php echo e(__('master.From Date')); ?>*</label><small class="req"> *</small>
                                        <input class="form-control <?php $__errorArgs = ['from_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"id="from_date" name="from_date"  placeholder="From Date" type="date"  value="" />
                                        <?php $__errorArgs = ['from_date'];
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
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"style="color:red;"><?php echo e(__('master.To Date')); ?>*</label><small class="req"> *</small>
                                        <input class="form-control <?php $__errorArgs = ['to_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"id="to_date" name="to_date"  placeholder="To Date" type="date"   value="" />
                                        <?php $__errorArgs = ['to_date'];
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
                                    <div class="form-horizontal">
                                        <label for="exampleInputEmail1"style="color:red;"><?php echo e(__('master.Send To')); ?>*</label>
                                        <?php if(!empty($getRole)): ?> 
                                            <?php $__currentLoopData = $getRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="role_id[]" value="<?php echo e($type['id'] ?? ''); ?>"  /> <b><?php echo e($type['name'] ?? ''); ?></b> </label>
                                                </div>                             
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>  
                             	<div class="col-md-12 text-center">
    								<button type="submit" class="btn btn-primary"><?php echo e(__('common.Submit')); ?></button>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/notice_board/add.blade.php ENDPATH**/ ?>