<?php
    $getHostel = Helper::getHostel();
    use Carbon\Carbon;
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    
<section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12 pl-0">
                <div class="card card-outline card-orange ml-1">
                 <div class="card-header bg-primary">
                <h3 class="card-title"><i class="fa fa-inbox"></i> &nbsp;<?php echo e(__('hostel.Mess Food Routine Add')); ?></h3>
                <div class="card-tools">
                       <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i
                                        class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                </div>
                 </div>    
                         <form id="quickForm" action="<?php echo e(url('messFoodRoutineAdd')); ?>" method="post" enctype="multipart/form-data">   
                        <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-3">
                        			<label style="color:red;"><?php echo e(__('hostel.Routine name')); ?>*</label>
                    				<input type="text" name="name" id="name" class="form-control" Placeholder="Routine Name">
                            	</div>    
                                <div class="col-md-3">
                        			<label style="color:red;"><?php echo e(__('hostel.Routine Time Frome')); ?>*</label>
                    				<input type="time" name="frome_time" id="frome_time" class="form-control" >
                            	</div>                 	
                                <div class="col-md-3">
                        			<label style="color:red;"><?php echo e(__('hostel.Routine Time To')); ?>*</label>
                    				<input type="time" name="to_time" id="to_time" class="form-control" >
                            	</div>                 	
                              
                            </div>
                            <div class="row m-2">
                                <div class="col-md-12 text-center" id="floor_list_show">
                                <button type="submit" class="btn btn-primary "><?php echo e(__('common.submit')); ?></button>

                                </div>
                            </div>
                            </form>
                </div> 
                
                
            </div>
                
              <div class="col-md-12 pl-0">
                <div class="card card-outline card-orange ml-1">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-building"></i> &nbsp;<?php echo e(__('hostel.Routine List')); ?> </h3>
                    <div class="card-tools">
                    <!--<a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add</a>-->
                    </div>
                     </div>                 
                    <div class="row m-2">
                        <div class="col-md-12">
                    	</div>
                        <div class="col-md-12">
                           <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                <thead class="bg-primary">   
                                    <tr role="row">
                                        <th><?php echo e(__('common.SR.NO')); ?></th>
                                        <th><?php echo e(__('hostel.Routine Name')); ?></th>
                                        <th><?php echo e(__('hostel.Time Frome')); ?></th>
                                        <th><?php echo e(__('hostel.Time To')); ?></th>
                                        <th><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <?php if(!empty($data)): ?>
                                    <?php
                                       $i=1;
                                    ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                                        <?php
                                            $dateTime = Carbon::parse($item['frome_time']);
                                            $dateto = Carbon::parse($item['to_time']);
                                        ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item['name'] ??''); ?></td>
                                            <td><?php echo e($dateTime->format('h:i A')); ?></td>
                                            <td><?php echo e($dateto->format('h:i A')); ?></td>
                                            <td>
                                    <a href="<?php echo e(url('messFoodRoutineEdit',$item->id)); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Student Registration"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:;"  data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData btn btn-primary  btn-xs ml-3" title="Delete Student Registration"><i class="fa fa-trash-o"></i></a>  
                                               
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

      <form action="<?php echo e(url('messFoodRoutineDelete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5>
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
         </div>
       </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/mess_food_routine/add.blade.php ENDPATH**/ ?>