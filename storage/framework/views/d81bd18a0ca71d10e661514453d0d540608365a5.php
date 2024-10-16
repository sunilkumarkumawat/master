<?php
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
    				    <div class="card-header bg-primary">
    					<h3 class="card-title"><i class="fa fa-shirtsinbulk"></i> &nbsp; <?php echo e(__('Sale Inventory')); ?></h3>
    					    <div class="card-tools">
    					        <?php if(Session::get('role_id') == 1): ?>
    					        <a href="<?php echo e(url('sales_invantory_add')); ?>" class="btn btn-primary"  ><i class="fa fa-plus"></i> <?php echo e(__('common.Add')); ?> </a> 
    					        <a href="<?php echo e(url('invantory_dashboard')); ?>" class="btn btn-primary"  ><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a> 
    			                <?php endif; ?>
        			          
    			            </div>
    				    </div>  
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                    <thead class="bg-primary">
                                        <tr role="row">
                                            <th><?php echo e(__('invantory.S.NO.')); ?></th>
                                            <th><?php echo e(__('Invoice No')); ?></th>
                                            <th><?php echo e(__('Student Name')); ?></th>
                                            <th><?php echo e(__('Mobile')); ?></th>
                                            <th><?php echo e(__('invantory.Date')); ?></th>
                                            <th><?php echo e(__('Qty')); ?></th>
                                            <th><?php echo e(__('Total Amount')); ?></th>
                                            <th><?php echo e(__('invantory.Action')); ?></th>
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
                                                    <td><?php echo e($item['invoice_no'] ?? ''); ?> </td>
                                                    <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']); ?></td>
                                                    <td><?php echo e($item['mobile']); ?></td>
                                                    
                                                    <td><?php echo e(date('d-m-Y', strtotime($item['date'])) ?? ''); ?></td>
                                                    <td><?php echo e($item['total_qty']); ?></td>
                                                    <td><?php echo e($item['total_amount']); ?></td>
                                                    <td><a href="<?php echo e(url('sales_invantory_edit')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  btn-xs"  ><i class="fa fa-edit"></i></a>
                                                        <a href="javascript:;" data-id='<?php echo e($item['id']); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger btn-xs ml-3"><i class="fa fa-trash-o"></i></a>
                                                        <a href="<?php echo e(url('sale_inventory_print')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  btn-xs"  ><i class="fa fa-print"></i></a></td>
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
    </section>
</div>
        
        
        <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
        
        
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

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('sales_invantory_delete')); ?>" method="post">
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/invantory/sales_invantory/view.blade.php ENDPATH**/ ?>