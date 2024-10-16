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
                            <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp; <?php echo e(__('Send Group Whatsapp Messages')); ?></h3>
                        <?php else: ?>						    
							<h3 class="card-title"><i class="nav-icon fas fa fa-leanpub"></i> &nbsp;<?php echo e(__('Send Group Whatsapp Messages')); ?></h3>
						<?php endif; ?>
							<div class="card-tools"> 
							<?php if(Session::get('role_id') !== 3): ?>
							    <a href="<?php echo e(url('group_add')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?>  </a> 
							    <a href="<?php echo e(url('send_message_terminal')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
                            <?php endif; ?>

                                
                            </div>
						</div>
						
                 
        <section class="content">
           
            <div class="container-fluid">
                 <form action='<?php echo e(url("group_view")); ?>' method='post'>
                     <?php echo csrf_field(); ?>
                <div class="row m-2">
                    <div class=" col-md-12 title"><h5 class="text-danger"><?php echo e(__('smsService.Select Candidates')); ?> :-</h5></div>
                   
                       	
                    <div class="col-md-3 class_type_id">
                		<div class="form-group">
                			<label>Class</label>
                			<select class="form-control select2" id="class_type_id" name="class_type_id" >
                			<option value="">Select</option>
                             <?php if(!empty($classType)): ?> 
                                  <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id ?? ''); ?>"  <?php echo e($search['class_type_id'] == $type->id ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>
                	    </div>
                	</div>                        	
                
                    <div class="col-md-1">
                         <label class="text-white"><?php echo e(__('messages.Search')); ?></label>
                	    <button class="btn btn-primary" onclick="SearchValue()"><?php echo e(__('smsService.Search')); ?></button>
                	</div>
                </div>
      
      </form>
      
         <div class="row m-2">
                    <div class="col-md-12" id="student_list_show" style="overflow-y: scroll;">
               <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th>
                                        Sr.No.
                                        <!--<input class="ml-3" type="checkbox" id="all_checkbox" checked></th>-->
                                    <th>Class</th>
                                    <th>Group Name</th>
                                    <th>Group Id</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
 
                                <?php if(!empty($data)): ?>
                                <?php
                                    $i=1
                                ?>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                    <?php echo e($i++); ?>

                                     </td>
                                   <td><?php echo e($item->class_name ?? ''); ?></td>
                                   <td><?php echo e($item->group_name ?? ''); ?></td>
                                   <td><?php echo e($item->group_id ?? ''); ?></td>
                                   <td class='d-flex'>
                                       <a href="<?php echo e(url('group_edit')); ?>/<?php echo e($item->id ?? ''); ?>" class="btn btn-info btn-xs m-1" > &nbsp;<i class="fa fa-edit"></i> </a>
                                        <a href="javascript:;"  data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData btn btn-danger btn-xs m-1" title="Delete"> &nbsp;<i class="fa fa-trash"></i> </a>
                                       <?php if($item->status == 0): ?> 
                                       
                                       <div>
                                   <form action='<?php echo e(url("whatsapp_group_status")); ?>' method='post'>
                                       <?php echo csrf_field(); ?>
                                       <input type='hidden' name='id' value='<?php echo e($item->id ?? ''); ?>'>
                                       <input type='hidden' name='class_type_id' value='<?php echo e($search["class_type_id"] ?? ''); ?>'>
                                         <button type='submit'class='btn btn-success btn-xs m-1'>Active</button>  
                                   </form>
                                   
                              </div>
                                   <?php else: ?>
                                   <div>
                                    <form action='<?php echo e(url("whatsapp_group_status")); ?>' method='post'>
                                       <?php echo csrf_field(); ?>
                                       <input type='hidden' name='id' value='<?php echo e($item->id ?? ''); ?>'>
                                       <input type='hidden' name='class_type_id' value='<?php echo e($search["class_type_id"] ?? ''); ?>'>
                                          <button type='submit'class='btn btn-danger btn-xs m-1'>Deactive</button>
                                   </form>
                          </div>
                                   <?php endif; ?>
                                   </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                             
                            </tbody>
                        </table>
                        
                    </div>
                       
                </div>
        </section>
        <section>
    </div>
</div>
</div>
</div>
</div>
</section>
</div>



<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('group_delete')); ?>" method="post">
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


<script>
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  
  $('#delete_id').val(delete_id); 
  } );
 </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/sms_service/group_view.blade.php ENDPATH**/ ?>