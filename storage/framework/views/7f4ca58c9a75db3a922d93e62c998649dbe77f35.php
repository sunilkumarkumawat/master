<?php
  $getHostel = Helper::getHostel(); 
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    
<section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-8 pl-0">
                <div class="card card-outline card-orange ml-1">
                 <div class="card-header bg-primary">
                <h3 class="card-title"><i class="fa fa-building"></i> &nbsp;<?php echo e(__('hostel.Building List')); ?></h3>
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
                                        <th><?php echo e(__('hostel.Building Name')); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <?php if(!empty($building_list)): ?>
                                    <?php
                                       $i=1
                                    ?>
                                    <?php $__currentLoopData = $building_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php
                                    $getHostelBuilding = Helper::getHostelBuilding($item['hostel_id']);
                                    ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item['Hostel']['name'] ?? ''); ?></td>
                                            <td>
                                                <?php if(!empty($getHostelBuilding)): ?>
                                                <?php $__currentLoopData = $getHostelBuilding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                    <?php echo e($type['name'] ?? ''); ?> &nbsp;
                                                    <a href="<?php echo e(url('building_edit')); ?>/<?php echo e($type['id'] ?? ''); ?>"  title="Edit Building"><i class="fa fa-pencil text-primary"></i></a> &nbsp;
                                                    <a href="javascript:;"  data-id='<?php echo e($type->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData"  title="Delete Building"><i class="fa fa-remove text-danger"></i></a>
                                                    <br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>                                        
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
                <h3 class="card-title"><i class="fa fa-edit"></i> &nbsp;<?php echo e(__('hostel.Edit Building')); ?> </h3>
                <div class="card-tools">
                <!--<a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add</a>
                <a href="<?php echo e(url('students_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> Back</a>-->
                </div>
                
                </div>                      
                    <form id="quickForm" action="<?php echo e(url('building_edit')); ?>/<?php echo e($data['id'] ?? ''); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row m-2">
                            <div class="col-md-12">
                    			<label style="color:red;"><?php echo e(__('hostel.Select Hostel')); ?>*</label>
                				<select class="form-control <?php $__errorArgs = ['hostel_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="hostel_id" name="hostel_id">
                                 <?php if(!empty($getHostel)): ?> 
                                      <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == $data['hostel_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                                 <?php $__errorArgs = ['hostel_id'];
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
                        <div class="col-md-12">
                			<label style="color:red;"><?php echo e(__('hostel.Building Name')); ?>*</label>
                			<input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" id="name" placeholder="<?php echo e(__('hostel.Building Name')); ?>" value="<?php echo e($data['name'] ?? ''); ?>">
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
     
                    <div class="row m-2">
                        <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('common.Update')); ?></button>
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
        <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="<?php echo e(url('building_delete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5>
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
         </div>
       </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/building/edit.blade.php ENDPATH**/ ?>