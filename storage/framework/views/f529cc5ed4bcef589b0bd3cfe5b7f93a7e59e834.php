<?php
  $feesType = Helper::feesType();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  
  <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">    
         

        <div class="col-md-4 pr-0">
            <div class="card card-outline card-orange mr-1">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-id-badge"></i> &nbsp;<?php echo e(__('Apply for leave')); ?></h3>
            <div class="card-tools">
           
            </div>
            
            </div>                 
                <form id="quickForm" action="<?php echo e(url('leaveAdd')); ?>" method="post">
  
                <?php echo csrf_field(); ?>
                <div class="row m-2">
                        
                               <div class="col-md-12">
                			<label style="color:red;"><?php echo e(__('messages.Subject')); ?>*</label>
            			<input class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="input" id="subject" name="subject" placeholder="Subject">
                             <?php $__errorArgs = ['subject'];
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
                			<label style="color:red;"><?php echo e(__('messages.From Date')); ?>*</label>
            				<input class="form-control <?php $__errorArgs = ['from_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" id="from_date" name="from_date" value="<?php echo e(date('Y-m-d')); ?>">
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
                        <div class="col-md-6">
                			<label style="color:red;"><?php echo e(__('messages.To Date')); ?>*</label>
            				<input class="form-control <?php $__errorArgs = ['to_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" id="to_date" name="to_date" value="<?php echo e(date('Y-m-d')); ?>">
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
                        <div class="col-md-12">
                    			<label style="color:red;"><?php echo e(__('messages.Reason')); ?>*</label>
                    			<textarea class="form-control <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="reason" id="reason" placeholder="Reason"></textarea>
                             <?php $__errorArgs = ['reason'];
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
                    <button type="submit" class="btn btn-primary"> <?php echo e(__('messages.submit')); ?> </button>
                    </div>
                </div>
                </form>
            </div>          
        </div>
        
        <div class="col-md-8 pl-0">
            <div class="card card-outline card-orange ml-1 table-responsive">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-id-badge"></i> &nbsp; <?php echo e(__('Applied leave list')); ?> </h3>
            <div class="card-tools">
            </div>
            
            </div>                 
                <div class="row m-2">
                    <div class="col-md-12">
                	</div>
                    <div class="col-md-12">
                       <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                          <thead class="bg-primary">
                          <tr role="row">
                              <th><?php echo e(__('messages.Sr.No.')); ?></th>
                              <th><?php echo e(__('messages.Status')); ?></th>
                              <th><?php echo e(__('messages.Subject')); ?></th>
                              <th><?php echo e(__('Date')); ?></th>
                              
                              <th><?php echo e(__('messages.Reason')); ?></th>
                              <th><?php echo e(__('messages.Action')); ?></th>
                              </tr>
                              
                              
                          </thead>
                          <tbody id="">
                          
                          <?php if(!empty($dataview)): ?>
                                <?php
                                   $i=1
                                ?>
                                <?php $__currentLoopData = $dataview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                               <?php if(Session::get('id')==$item['admission_id']): ?>
                               
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <?php if($item['status']== "1"): ?>
                                        <td>
                                            
                                            <a style="user-select:none;font-size: 12px;"class="btn btn-xs btn-success reminder_status w-100" >Approved</a>
                                            <!--<a data-id="<?php echo e($item['admission_id'] ?? ''); ?>" style="<?php echo e($item['status'] == 1 ? 'display:none'   : ''); ?>" data-status="1" class="btn btn-xs btn-danger reminder_status" data-text="Deactivate">Deactive </a>                                                               -->
                                        </td>
                                        <?php endif; ?>
                                
                                    <?php if($item['status']== "0"): ?>
                                        <td>
                                        <a style="user-select:none;font-size: 12px;"class="btn btn-xs btn-danger reminder_status w-100" >Denied</a>                                                              
                                        </td>
                                        <?php endif; ?>
                                        
                                         <?php if($item['status']== "2"): ?>
                                        <td>
                                        <a style="user-select:none;font-size: 12px;"class="btn btn-xs btn-warning reminder_status w-100" >Pending</a>                                                              
                                        </td>
                                        <?php endif; ?>
                                        <td><?php echo e($item['subject'] ?? ''); ?></td>
                                        <td><?php echo e(date('d-m', strtotime($item['from_date'])) ?? ''); ?>/<?php echo e(date('d-m-Y', strtotime($item['to_date'])) ?? ''); ?></td>
                                        
                                        <td><?php echo e($item['reason'] ?? ''); ?></td>
                                        
                                        <td>
                                                 <?php if($item['status']== "2"): ?>
                                              <a href="<?php echo e(url('leaveUpdate')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                              <a href="javascript:;" data-id="<?php echo e($item->id); ?>"  class="btn btn-danger btn-xs ml-1"data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData"><i class="fa fa-trash"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
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

<!--<script>
    $(document).on('click', ".reminder_status", function () {
var id = $(this).data("id");
    var status = $(this).data("status");
    if(confirm('Are you sure ?')){
      
        $.ajax({
            url: 'fees_reminder_status',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { status: status, id: id },
            success: function (response) {

                /*if (response == 0) {
                    alert("Internal Server Error");
                }else if (response == 1) {
                    alert("Internal Server Error");
                }
                else {
                    alert("Internal Servasaser Error");
                }*/
            },
        });
    }

});

</script>-->

<script>
    $('#fees_type_id').on('change', function(e){
    
	var fees_type_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: '/duedate/'+fees_type_id,
	  success: function(data){
      $("#due_date").val(data);
	  }
	});	
});
</script>
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

      <form action="<?php echo e(url('leave_delete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              <input type=hidden id="delete_id" name=delete_id >
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/student/leave/student_leave.blade.php ENDPATH**/ ?>