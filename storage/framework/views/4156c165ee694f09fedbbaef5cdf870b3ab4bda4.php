<?php
    $getHostel = Helper::getHostel();
//dd($data);
?>
 
<?php $__env->startSection('content'); ?>
<style>
    .top{
        margin-top: -12px;
    }
</style>
<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-credit-card"></i> &nbsp;<?php echo e(__('hostel.Hostel View Expense')); ?></h3>
							
							
							<div class="card-tools"> 
					
							    <a href="<?php echo e(url('hostelExpensesAdd')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?></a>
							    <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
							</div>
							
						</div>
						<div class="card-body">
                        <form id="quickForm" action="<?php echo e(url('hostelExpensesView')); ?>" method="post" >
                        <?php echo csrf_field(); ?> 
                    <div class="row m-2">
                   <div class="col-md-2 mb-2 top">
                    		<div class="form-group">
                    			<label><?php echo e(__('hostel.From Date')); ?></label>
            				<input type="date" class="form-control" id="from_date" name="from_date"  value="<?php echo e($_POST['from_date'] ?? ''); ?>" >
                            </div>
                    	</div>
                    	<div class="col-md-2 top">
                            <div class="form-group ">
                                <label><?php echo e(__('hostel.To Date')); ?></label>
            				<input type="date" class="form-control" id="to_date" name="to_date"  value="<?php echo e($_POST['to_date'] ?? ''); ?>">
                			</div> 
                        </div>
            		<div class="col-md-3 top">
            			<div class="form-group">
            				<label><?php echo e(__('common.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('Expenses. Name, ')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
            		    </div>
            		</div>                     	
                        <div class="col-md-1 top">
                             <label class="text-white">Search</label>
                    	    <button type="submit" class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                    	</div>
                    			
                    </div>
                     </form>
                            <div class="col-md-12" id="">

                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th><?php echo e(__('common.SR.NO')); ?></th>
                                    <th><?php echo e(__('hostel.Expense Head')); ?></th>
                                    <th><?php echo e(__('hostel.Expense Date')); ?></th>
                                    <th><?php echo e(__('hostel.Expense Name')); ?></th>
                                  <th><?php echo e(__('hostel.Expences Amount')); ?></th>
                                    <th><?php echo e(__('hostel.Expences By')); ?></th>
                                    <th><?php echo e(__('common.Action')); ?></th>
                              
                                </tr>
                            </thead>
                            <tbody>

                                <?php if(!empty($data)): ?>
                                <?php
                                    $i=1;
                                   $total = 0;
                                ?>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($item['expense_head'] ?? ''); ?> </td>
                                    <td><?php echo e(date('d-M,Y', strtotime($item['expense_date'])) ?? ''); ?></td>
                                    <td><?php echo e($item['expense_name'] ?? ''); ?></td>
                                    <td ><?php echo e($item['expense_amount'] ?? ''); ?></td>
                                    <td ><?php echo e($item['first_name'] ?? ''); ?><?php echo e($item['last_name'] ?? ''); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('hostelExpensesPrint')); ?>/<?php echo e($item['id']); ?>" class="btn btn-success  btn-xs ml-3" title="Edit Expense" target="_blank"><i class="fa fa-print"></i></a> 
                                        <a href="<?php echo e(url('hostelExpensesEdit')); ?>/<?php echo e($item['id']); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Expense" ><i class="fa fa-edit"></i></a> 
                                        <a href="javascript:;" data-id='<?php echo e($item['id'] ?? ''); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger btn-xs ml-1" title="Delete Expense"><i class="fa fa-trash-o"></i></a>
                                    </td>                                    
                                </tr>
                               
                               <?php
                               $total += $item['expense_amount'] ;
                               ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                             
                             <tfoot>
                              
                                  <tr>
                                        <th class="text-white"><?php echo e(__('hostel.Total')); ?></th>
                                        <th> </th>
                                        <th> </td>
                                        <th> <b><?php echo e(__('hostel.Total Amount')); ?></b></th>
                                        <th> <b id="total_amt">₹ <?php echo e($total ?? ''); ?></b></th>
                                        <th></th>   
                                        <th></th>   
                                  </tr>    
                              
                               
                            
                               
                            </tfoot>
                              <?php endif; ?>
                            </tbody>
                        </table>
        
                            </div>
                        </div>                        
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- The Modal -->
<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #555b5beb;">
			<div class="modal-header">
				<h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="<?php echo e(url('hostelExpensesDelete')); ?>" method="post"> 
			    <?php echo csrf_field(); ?>
				<div class="modal-body">
					<input type=hidden id="delete_id" name=delete_id>
					<h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5> </div>
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
});


</script>


<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/ExpanceAdd/view.blade.php ENDPATH**/ ?>