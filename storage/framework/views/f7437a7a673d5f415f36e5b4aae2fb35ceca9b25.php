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
                            <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp; <?php echo e(__('Send Message')); ?></h3>
                        <?php else: ?>						    
							<h3 class="card-title"><i class="nav-icon fas fa fa-leanpub"></i> &nbsp;<?php echo e(__('Send Message')); ?></h3>
						<?php endif; ?>
							<div class="card-tools"> 
							<?php if(Session::get('role_id') !== 3): ?>
							    <a href="<?php echo e(url('send_message_terminal')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
                            <?php endif; ?>

                                
                            </div>
						</div>
						       
       
        <section>
         <form id="sendSms" action="<?php echo e(url('resend_message')); ?>" method="post">   
            <?php echo csrf_field(); ?>
    
                <div class="row m-2">
                    <div class="col-md-12" id="student_list_show" style="overflow-y: scroll;">
               <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th>
                                        Sr.No.
                                        <!--<input class="ml-3" type="checkbox" id="all_checkbox" checked></th>-->
                                    <th>Mobile/GroupId</th>
                                    <!--<th>Type</th>-->
                                    <th>Sender Message</th>
                                    <th>Media Url</th>
                                    <th>Date of Faliure</th>
                                    <th>Error</th>
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

                                    <input class="ml-3 checkbox" type="checkbox" id="checkbox" name="ids[]" value="<?php echo e($item['id'] ?? ''); ?>" checked>
                                    </td>
                                    <td><?php echo e($item['mobile'] ?? ''); ?><?php echo e($item['group_id'] ?? ''); ?>

                                     <input type='hidden' name ='mobile[]' value="<?php echo e($item['mobile'] ?? ''); ?>" /> 
                                    </td>
                                  
                                 <!--<td><?php echo e($item['type'] ?? ''); ?></td>-->
                                    
                                    
                                    <td><?php echo e($item['sender_message'] ?? ''); ?>

                                    <input type='hidden' name ='text[]' value="<?php echo e($item['sender_message'] ?? ''); ?>" /> 
                                    </td>
                                    <td>
                                    <?php if( !empty ($item['media_url'] ?? '')): ?>
                                    <a target='_blank' href="<?php echo e($item['media_url'] ?? ''); ?>" >Click for view</a>
                                    
                                    <?php else: ?>
                                    
                                    <?php endif; ?>
                                    
                                    <input type='hidden' name ='media_url[]' value="<?php echo e($item['media_url'] ?? ''); ?>" />
                                    </td>
                                    <td><?php echo e(date('d/m/Y', strtotime($item['created_at']))); ?></td>
                                    <td class='text-danger'><?php echo e($item['message'] ?? ''); ?>

                                      <!--<input type='hidden' name ='resend_status[]' value="<?php echo e($item['resend_status'] ?? ''); ?>" />-->
                                    </td>
                                    <td class='text-danger'>
                                          <a href="javascript:;"  data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData btn btn-danger btn-xs m-1" title="Delete"> &nbsp;<i class="fa fa-trash"></i> </a>
                                     
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                             
                            </tbody>
                        </table>
                        
                    </div>
                       <?php if(count($data)>0): ?>
                 <div class="col-md-12 text-center pb-2">
                    <button type="submit" id="submit" class="btn btn-primary">Send Message</button>
                </div>
                
                <?php endif; ?>
                </div>
         </section>
        
        </form>
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
      <form action="<?php echo e(url('failed_messages_delete')); ?>" method="post">
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


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/sms_service/resend.blade.php ENDPATH**/ ?>