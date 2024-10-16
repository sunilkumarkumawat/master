<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">

        <div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-support"></i> &nbsp; <?php echo e(__('master.Add Shop Detail')); ?></h3>
							<div class="card-tools">
                            <a href="<?php echo e(url('books_uniform_view')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <?php echo e(__('View')); ?> </a>
                            <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
                            </div>
						</div>
						<div class="row">
                          <div class="col-12">
                           <form id="quickForm" action="<?php echo e(url('books_uniform_add')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row m-2">
                                         <div class="col-md-2">
                                            <div class="form-group">
                                               <label class="text-danger"><?php echo e(__('master.Category')); ?>*</label>
                                               <select class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="category" name="category">
                                                   <option value=""><?php echo e(__('common.Select')); ?></option>
                                                   <option value="Books" <?php echo e(("Books") == old("category") ? 'selected' : ''); ?> ><?php echo e(__('master.Books')); ?></option>
                                                   <option value="Uniform" <?php echo e(("Uniform") == old("Uniform") ? 'selected' : ''); ?>><?php echo e(__('master.Uniform')); ?></option>
                                               </select>
                                            <?php $__errorArgs = ['category'];
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
                                               <label class="text-danger"><?php echo e(__('master.Shop Name')); ?>*</label>
                                               <input type="text" id="shop_name" value="<?php echo e(old('shop_name')); ?>" name="shop_name" class="form-control <?php $__errorArgs = ['shop_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('master.Shop Name')); ?>">
                                            <?php $__errorArgs = ['shop_name'];
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
                                               <label class="text-danger"><?php echo e(__('common.Address')); ?>*</label>
                                               <textarea type="text" id="address" value="<?php echo e(old('address')); ?>" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('common.Address')); ?>"></textarea>
                                            <?php $__errorArgs = ['address'];
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
                                        
                                         <div class="col-md-2">
                                            <div class="form-group">
                                               <label><?php echo e(__('master.Shopkeeper No')); ?></label>
                                               <input maxlength="10" onkeypress="javascript:return isNumber(event)" type="text" value="<?php echo e(old('shop_keeper_no')); ?>"  id="shop_keeper_no" name="shop_keeper_no" class="form-control" placeholder="<?php echo e(__('master.Shopkeeper No')); ?>">
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-2">
                                            <div class="form-group">
                                               <label><?php echo e(__('master.Live Location')); ?></label>
                                               <input type="text" value="<?php echo e(old('live_location')); ?>"  id="live_location" name="live_location" class="form-control" placeholder="<?php echo e(__('master.Live Location')); ?>">
                                            </div>
                                        </div>
                                        
                                   
                                        </div>
                                        <div class="row m-2">
                                     
                                         <div class="col-md-12 mt-3 mb-3 text-center">
                                            <button type="submit" class="btn btn-primary "><?php echo e(__('common.Submit')); ?></button>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/books_uniform/add.blade.php ENDPATH**/ ?>