<?php
  $classType = Helper::examPanelClassType();
  $getsubject = [];
?>

 
<?php $__env->startSection('content'); ?>
   
    
<div class="content-wrapper">
   
    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">   
        <div class="card card-outline card-orange">
               <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-flask"></i> &nbsp; <?php echo e(__('Add Homework')); ?></h3>
            <input type="hidden" id="role_id" value="<?php echo e(Session::get('role_id') ?? ''); ?>"> 
            <div class="card-tools">
                <a href="<?php echo e(url('homework/index')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <?php echo e(__('messages.View')); ?> </a>
            </div>
            
            </div>   
             <div class="card-body">
                 <form id="quickForm" action="<?php echo e(url('homework/add')); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                <div class="row"> 
                    <div class="col-md-3">
            			<div class="form-group">
            				<label style="color:red;"><?php echo e(__('messages.Class')); ?></label>
            				<select class="form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="class_type_id" name="class_type_id">
                            <option value="" ><?php echo e(__('messages.Select')); ?></option>
                             <?php if(!empty($classType)): ?> 
                                  <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == Session::get('class_type_id')) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
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
                				<label style="color:red;"><?php echo e(__('messages.Subject')); ?></label>
                				<select class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="subject_id" name="subject">
                                 <?php if(!empty($getsubject)): ?> 
                                      <?php $__currentLoopData = $getsubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
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
								<label style="color: red;"><?php echo e(__('messages.Homework Title')); ?></label>
								<input class="form-control  <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" id="title" name="title" placeholder="Homework Title" value="<?php echo e(old('title') ?? ''); ?>"> 
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
						</div>
                 		 
                		<div class="col-md-3">
            			    <div class="form-group">
            				<label style="color:red;"><?php echo e(__('messages.Homework Date')); ?></label>
            				
            					<input type="date" class="form-control <?php $__errorArgs = ['homework_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="homework_date" name="homework_date"value="<?php echo e(date('Y-m-d')); ?>">
            				   
                             <?php $__errorArgs = ['homework_date'];
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
            				<label style="color:red;"><?php echo e(__('messages.Submission Date')); ?></label>
            					<input type="date" class="form-control <?php $__errorArgs = ['submission_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="submission_date" name="submission_date" value="<?php echo e(old('submission_date') ?? ''); ?>">
                             <?php $__errorArgs = ['submission_date'];
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
                			<label><?php echo e(__('messages.Content File')); ?></label>
                            <div class="input file form-control">
                                <input type="file" name="content_file" id="content_file" value="<?php echo e(old('content_file') ?? ''); ?>">
                            </div>                    
                    	</div>  
                    	
            		   <div class="col-md-12">
            			   <div class="form-group">
            				<label style="color:red;"><?php echo e(__('messages.Description')); ?></label>
            					<textarea type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> fixed_height" id="compose-textarea" name="description" placeholder="Please submit before last date."><?php echo e(old('description') ?? ''); ?></textarea>
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
                    
              <div class="row m-2">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary "><?php echo e(__('messages.Submit')); ?></button>
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
    
    
        <style>
            .card-block{
                height:240px;
            }
        </style>
    
<script>
/*$( document ).ready(function() {
    var role_id = $('#role_id').val();
   
   if( role_id == 2 ) { 
        $("#class_type_id").attr('disabled', 'disabled');
        $("#section").attr('disabled', 'disabled');
   }else{
   }     
});*/
</script>
<?php $__env->stopSection(); ?>                
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/home_work/home_work/add.blade.php ENDPATH**/ ?>