 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary flex_items_toggel">
							<h3 class="card-title"><i class="fa fa-shirtsinbulk"></i> &nbsp;<?php echo e(__('staff.Drop Teacher List')); ?></h3>
							<div class="card-tools"> <a href="<?php echo e(url('staff_file')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('common.Back')); ?> </span></a> </div>
						</div>
				
    	<div class="row mb-2 m-2">
		    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
          <thead>
                  <tr role="row">
                      <th><?php echo e(__('common.S.NO')); ?></th>
                            <th><?php echo e(__('common.Name')); ?></th>
                            <th><?php echo e(__('common.Contact No')); ?></th>
                            <th><?php echo e(__('common.E-Mail')); ?></th>
                            <th><?php echo e(__('common.Updated At')); ?></th>
                            <th><?php echo e(__('common.Action')); ?></th>
                    </tr>
          </thead>
                  <tbody>
                      
                      <?php if(!empty($data)): ?>
                      
                      
                        <?php
                      
                           $i=1
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']); ?></td>
                                <td><?php echo e($item['mobile']); ?></td>
                                <td><?php echo e($item['email']); ?></td>
                                <td><?php echo e(date('d-M-Y', strtotime($item['updated_at'])) ?? ''); ?></td>
                               
                                
                                
                                 <td>
                                <a href="javascript:;"  data-id='<?php echo e($item->teacher_id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id1"  class="Re_join btn btn-xs btn-primary"  title="Re-Join">Re-Join</a> 
                                <a href="<?php echo e(url('drop_teacher_letter')); ?>/<?php echo e($item->teacher_id); ?>" target="blank"><i class="fa fa-print btn btn-xs btn-primary"></i> </li></a>

                               
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
      
    </section>
    
  </div>
    
</div>
        
        
 <style>
     .padding_table thead tr{
    background: #002c54;
    color:white;
    }
        
    .padding_table th, .padding_table td{
         padding:5px;
         font-size:14px;
    }
 </style>  
 
 
<script>
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  
  $('#delete_id').val(delete_id); 
  } );
  
  $('.Re_join').click(function() {
  var drop_status = $(this).data('id'); 
  
  $('#staf_id').val(drop_status); 
  } );
 </script>


<!-- The Modal -->
<div class="modal" id="Modal_id1">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-white">Re-Join Confirmation</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('drop_teacher')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              
            
            
              <input type="hidden" id="staf_id" name="staf_id">
              <input type="hidden" id="drop_status" name="drop_status" value="1">
              <h5 class="text-white">Are you sure you want to make Re-Join  ?</h5>
           
      </div>

      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Ok</button>
         </div>
       </form>

    </div>
  </div>
</div>   

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/staff/all_drop_teachers/drop_index.blade.php ENDPATH**/ ?>