<?php

?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-edit"></i> &nbsp;<?php echo e(__('Edit Inventory Invoice')); ?> </h3>
            <div class="card-tools">
      
           
            <a href="<?php echo e(url('viewStoreRequest')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <?php echo e(__('Back')); ?> </a>
            </div>
            
            </div>                 
                <form id="quickForm" action="<?php echo e(url('editInvoiceInventory')); ?>/<?php echo e($receipt); ?>" method="post">
                <?php echo csrf_field(); ?>
                
                
            <table id="example1" class="mt-3 table table-bordered table-striped  dataTable">
								<thead>
									<tr role="row">
									    
									    <th>S.No.</th>
									    <th>Date</th>
									    <th>Amount</th>
									    <th>Action</th>
									    </tr>
									    </thead>
									    
									    <tbody>
									        
									        <?php if(!empty($data)): ?>
									        <?php
									        $count = 0;
									        ?>
									        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(($item->amount ?? 0) > 0): ?>
                                                    <?php
                                                    $count++;
                                                    ?>
                                                 <tr>
									            <td><?php echo e($count); ?></td>
									            <td>
									                
									                <input type='hidden' name='id[]' value='<?php echo e($item->id); ?>' />
									                <input type='date' name='date[]' value='<?php echo e($item->date); ?>' /></td>
									            <td><input type='text' name='amount[]' value='<?php echo e($item->amount); ?>'/></td>
									            <td>
									                 <a class='btn btn-danger btn-xs delete_row' data-id="<?php echo e($item->id ?? ''); ?>" href="<?php echo e(url('deleteInvoiceInventory')); ?>/<?php echo e($item->id ?? ''); ?>" data-toggle="modal" data-target="#revert_modal"><i class="fa fa-trash"></i></a>
									                
									            </td>
									        </tr>
									        
									        <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									        <?php endif; ?>
									       
									    </tbody>
									    
									    <tfoot>
									        <tr>
									            <td colspan='4' class='text-center'>
									                <button class='btn btn-primary m-1'>Update</button>
									            </td>
									        </tr>
									    </tfoot>
									    </table>
 
                
        
    	</form>
             </div>
        </div>
    </div>
    </section>
</div>



<div class="modal fade" id="revert_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header --> 
        <div class="modal-header">
          <h4 class="modal-title">Delete Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method='post' action='<?php echo e(url("deleteInvoiceInventory")); ?>' method="post">
      	    <?php echo csrf_field(); ?>
            <div class="modal-body">
              
                <input type="hidden" id="delete_id" name="delete_id">
                <h5><?php echo e(__('Are you sure you want to delete this recipt  ? This action is irreversible.')); ?></h5>
            </div>
        
            <div class="modal-footer">
                <button type="button" id="hide_modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  
  
  
  <script>
      $( ".delete_row" ).on( "click", function() {


var delete_id = $(this).data('id');

$('#delete_id').val(delete_id);
} );
  </script>
  
  

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/store_management/editInvoice.blade.php ENDPATH**/ ?>