<?php
  $classType = Helper::classType();
  $getSetting = Helper::getSetting();
?>
 
<?php $__env->startSection('content'); ?>

<style>
       .border_none {
            border: none;
        }
        .bg_color_heading {
            background-color: #f1f1f1;
        }
        @media  print {
            button {
                display: none;
            }
            body {
                margin: 0;
                padding: 20px;
                font-family: Arial, sans-serif;
            }
            .page {
                width: 100%;
                border: 1px solid #000;
                padding: 20px;
                box-sizing: border-box;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            .bg_color_heading td {
                background-color: #f1f1f1;
                font-weight: bold;
            }
            .border_none {
                border: none;
            }
            .no-print {
                display: none;
            }
        }
     
   </style>

<div class="content-wrapper">

   <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">      
    <div class="card card-outline card-orange">
        <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-th-large"></i> &nbsp;<?php echo e(__('View Store Request')); ?> </h3>
        <div class="card-tools">
        <!--<a href="<?php echo e(url('Fees/add')); ?>" class="btn btn-primary  btn-sm" title="Add Fees"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?></a>-->
        <a href="<?php echo e(url('storeDashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
        </div>
        
        </div>  
        
            <div class="row m-2">  
                <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped  dataTable">
								<thead class="bg-primary">
									<tr role="row">
										<th><?php echo e(__('common.SR.NO')); ?></th>
										<th><?php echo e(__('Receipt No.')); ?></th>
										<th><?php echo e(__('common.Name')); ?> </th>
										<th><?php echo e(__('common.Class')); ?> </th>
										<th><?php echo e(__('common.Mobile')); ?></th>
									</tr>
								</thead>
								<tbody > 
								<?php if(!empty($data)): ?> 
    								<?php 
    								    $i=1; 
    								?> 
								<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($i++); ?></td>
											<td>
											     <a href="#" class="toggle-options btn text-info">#<?php echo e($item->receipt_no ?? ''); ?>

</a>
          <div class="options-buttons mt-2 mb-2"style='display:none;'>
            <a target='_blank' class='btn btn-primary btn-xs' href="<?php echo e(url('editInvoiceInventory')); ?>/<?php echo e($item->receipt_no ?? ''); ?>"><i class="fa fa-edit"></i></a>
           <a target='_blank' class='btn btn-info btn-xs' href="<?php echo e(url('storeReceipt')); ?>/<?php echo e($item->receipt_no ?? ''); ?>"><i class="fa fa-eye"></i></a>
           <a class='btn btn-danger btn-xs delete_row' data-id="<?php echo e($item->receipt_no ?? ''); ?>" data-toggle="modal" data-target="#revert_modal"><i class="fa fa-trash"></i></a>
									                
          </div>
											  
											    </td>
								        <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
										<td><?php echo e($item['class_name'] ?? ''); ?></td>
										<td><?php echo e($item['mobile'] ?? ''); ?></td>
									
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
        
        <div class="modal fade" id="revert_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header --> 
        <div class="modal-header">
          <h5 class='text-danger'>If you delete this receipt,all related transactions will also be deleted. </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method='post' action='<?php echo e(url("deleteReceiptInventory")); ?>' method="post">
      	    <?php echo csrf_field(); ?>
            <div class="modal-body">
              
                <input type="hidden" id="delete_receipt" name="delete_receipt">
                <h5 >
               Do you still wish to continue?</h5>
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
var delete_receipt = $(this).data('id');
$('#delete_receipt').val(delete_receipt);
} );
  </script>
<script>
  $(document).ready(function(){
    $('.toggle-options').click(function(e){
      e.preventDefault(); 
      var $options = $(this).next('.options-buttons');
      $('.options-buttons').not($options).slideUp();
      $options.slideToggle();
    });
    $(document).click(function(event) { 
      var $target = $(event.target);
      if(!$target.closest('.toggle-options').length && !$target.closest('.options-buttons').length) {
        $('.options-buttons').slideUp();
      }        
    });
  });
</script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/store_management/viewStoreRequest.blade.php ENDPATH**/ ?>