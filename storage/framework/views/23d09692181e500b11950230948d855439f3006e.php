
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    
<section class="content pt-3">
      <div class="container-fluid">
    <div class="row">
        
        <div class="col-md-8 pl-0">
            <div class="card card-outline card-orange ml-1">
                 <div class="card-header bg-primary">
                <h3 class="card-title"><i class="fa fa-hospital-o"></i> &nbsp;<?php echo e(__('hostel.Hostel List')); ?> </h3>
                <div class="card-tools">
                <!--<a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add</a>-->
                <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                </div>
                 </div>                  
                <div class="row m-2">
                    <div class="col-md-12">
                	</div>
                    <div class="col-md-12">
                       <table id="" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead>   
                                <tr role="row">
                                    <th><?php echo e(__('common.SR.NO')); ?></th>
                                    <th><?php echo e(__('hostel.Hostel Name')); ?></th>
                                    <th><?php echo e(__('common.Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody id="">
                                <?php if(!empty($dataview)): ?>
                                <?php
                                   $i=1
                                ?>
                               
                                <?php $__currentLoopData = $dataview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($item['name'] ??''); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('hostel_edit')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  btn-xs" title="Edit Hostel" ><i class="fa fa-edit"></i></a> 
                                            <a href="javascript:;" data-id='<?php echo e($item['id']); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger btn-xs ml-3" title="Delete Hostel"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                          </table>
                	</div>
                </div>
            </div>          
        </div>
        
        <div class="col-md-4 pr-0">
            <div class="card card-outline card-orange mr-1">
                 <div class="card-header bg-primary">
                <h3 class="card-title"><i class="fa fa-edit"></i> &nbsp;<?php echo e(__('hostel.Edit Hostel')); ?> </h3>
                <div class="card-tools">
                <!--<a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add</a>
                <a href="<?php echo e(url('students_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> Back</a>-->
                </div>
                
                </div>                 
                <form id="quickForm" action="<?php echo e(url('hostel_edit')); ?>/<?php echo e($data['id'] ?? ''); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row m-2">
                    <div class="col-md-12">
            			<label style="color:red;"><?php echo e(__('hostel.Hostel Name')); ?>*</label>
            			<input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" id="name" placeholder="Hostel Name" value="<?php echo e($data['name'] ?? ''); ?>">
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
                	 <div class="col-md-6">
                			<label style="color:red;"><?php echo e(__('Per Unit Rate')); ?>*</label>
                			<input class="form-control <?php $__errorArgs = ['per_unit_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="per_unit_rate" id="per_unit_rate" placeholder="<?php echo e(__('Per Unit Rate')); ?>" value="<?php echo e($data['per_unit_rate'] ?? ''); ?>">
                            
                    	</div>
                </div>
 
                <div class="row m-2">
                    <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('common.Update')); ?> </button>
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
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  
  $('#delete_id').val(delete_id); 
  } );
</script>

<!-- The Modal -->
<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <div class="modal-header">
        <h4 class="modal-title text-white">Delete Confirmation</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="<?php echo e(url('hostel_delete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white">Are you sure you want to delete  ?</h5>
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
         </div>
       </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel/edit.blade.php ENDPATH**/ ?>