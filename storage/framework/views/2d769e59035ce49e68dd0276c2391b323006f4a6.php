<?php
    $getHostel = Helper::getHostel();
    $getFoodCategory = Helper::getFoodCategory();
    
?>
 
<?php $__env->startSection('content'); ?>


<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12"> 
            <div class="card  card-outline card-orange">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp; <?php echo e(__('hostel.Mess Menu List')); ?></h3>
            <div class="card-tools">
            <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?></a>
            </div>
            
            </div>                 
       
 <form id="quickForm" action="<?php echo e(url('messFoodMenuAdd')); ?>" method="post" enctype="multipart/form-data">   
                        <?php echo csrf_field(); ?>
        <div class="row m-2">
          <div class="col-12">
                 <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-primary">
                <tr>
				  <!-- <th>S No</th> -->
				  <th><?php echo e(__('hostel.Day Name')); ?></th>
				  <?php
                     $data =  DB::table('mess_food_routine')->wherenull('deleted_at')->get();
                  
                ?>
				  				 <?php if(!empty($data)): ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                                      	
                                            <th><?php echo e($item->name ??''); ?> [<?php echo e(date('h:i A', strtotime($item->frome_time ))); ?> <?php echo e(date('h:i A', strtotime($item->to_time ))); ?>]</th>
                                          
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
				                  </tr>
                </thead>
                <tbody>
                    <?php
                    
                
    	$day = 1;
			?>	  
            <?php if(!empty($monthDate)): ?>
                                        <?php $__currentLoopData = $monthDate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $week): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                        <tr>

                                            <td><?php echo e($week); ?></td>
                                            <!-- <td>Monday</td> -->
                                            <?php if(!empty($data)): ?>
                                            <input type="hidden" name="day[]" value="<?php echo e($week); ?>">
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <?php
                                                $sunData = DB::table('food_menu_lists')->where('mess_food_routine_id','=',$item->id)->where('day_name','=',$week)->first();
                                                ?>
                                                    <input type="hidden"  name="mess_food_routine[<?php echo e($week); ?>][]" class="form-control" value="<?php echo e($item->id ?? ''); ?>">
                                                    <td><input type="text" name="names[<?php echo e($week); ?>][]" class="form-control" value="<?php echo e($sunData->name ?? ''); ?>"></td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                                

                                            </tr>                                          
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
      
       	<td colspan="6"><center><input type="submit"  value="Save" class="btn btn-primary"></center></td>
       	</tr>
       	</tbody>
                </table>
           </div>
      </div>
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
        <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="<?php echo e(url('hostelExpensesHeadeDelete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('messages.Are you sure you want to delete')); ?>  ?</h5>
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('messages.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('messages.Delete')); ?></button>
         </div>
       </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/mess_food_menu/add.blade.php ENDPATH**/ ?>