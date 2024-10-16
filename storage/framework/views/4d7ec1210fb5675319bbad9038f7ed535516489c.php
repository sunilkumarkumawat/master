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
                            <h3 class="card-title"><i class="fa fa-envelope"></i> &nbsp;  <?php echo e(__('master.Add Prayer')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('prayer_view')); ?>" class="btn btn-primary  btn-sm" title="View Notice Bord"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?> </a>
                                <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?></a>
                            </div>
                        </div>        
                        <form id="quickForm" action="<?php echo e(url('prayer_add')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"style="color:red;"><?php echo e(__('common.Name')); ?>*</label>
                                        <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"id="name" name="name" placeholder="<?php echo e(__('common.Name')); ?>" type="text"  />
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
                                </div>
                                <div class="row m-2">

                                <div class="col-md-12">
                                <div class="form-group">
                                        <label style="color:red;"><?php echo e(__('master.Prayer')); ?>*</label>
                                        <textarea   class="form-control <?php $__errorArgs = ['prayer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"id="editor1" name="prayer"> </textarea>
                                        <?php $__errorArgs = ['prayer'];
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

<script>
    $(document).ready(function(){
    var editor1 = new RichTextEditor("#editor1");
});
    
</script>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/Prayer/add.blade.php ENDPATH**/ ?>