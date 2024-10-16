<?php
    $getHostel = Helper::getHostel();
    $getPermission = Helper::getPermission();
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
							<h3 class="card-title"><i class="fa fa-credit-card"></i> &nbsp;<?php echo e(__('expense.View Expense')); ?></h3>
							
							
							<div class="card-tools"> 
							  <!--<a class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> <?php echo e(__('Add Head')); ?> </a>-->
							    <a href="<?php echo e(url('expenseAdd')); ?>" class="btn btn-primary  <?php echo e(($getPermission->add == 1) ? '' : 'd-none'); ?> btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?></a> 
							    <!--<a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back </a>--> 
							</div>
							
						</div>
						<div class="card-body">
                        <form id="quickForm" action="<?php echo e(url('expenseView')); ?>" method="post" >
                        <?php echo csrf_field(); ?> 
                    <div class="row m-2">
                   <div class="col-md-2 mb-2 top">
                    		<div class="form-group">
                    			<label><?php echo e(__('expense.From Date')); ?></label>
            				<input type="date" class="form-control" id="from_date" name="from_date"  value="<?php echo e($_POST['from_date'] ?? ''); ?>" >
                            </div>
                    	</div>
                    	<div class="col-md-2 top">
                            <div class="form-group ">
                                <label><?php echo e(__('expense.To Date')); ?></label>
            				<input type="date" class="form-control" id="to_date" name="to_date"  value="<?php echo e($_POST['to_date'] ?? ''); ?>">
                			</div> 
                        </div>
            		<div class="col-md-3 top">
            			<div class="form-group">
            				<label><?php echo e(__('common.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('common.Search By Keywords')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
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
                                    <th><?php echo e(__('Expense Head')); ?></th>
                                    <th><?php echo e(__('Staff/User')); ?></th>
                                    <th><?php echo e(__('common.Date')); ?></th>
                                    <th><?php echo e(__('expense.Quantity')); ?></th>
                                    <th><?php echo e(__('common.Amount')); ?></th>
                                    <?php if($getPermission->edit == 1 || $getPermission->download == 1 || $getPermission->deletes == 1): ?>
                                    <th><?php echo e(__('common.Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if(!empty($data)): ?>
                                <?php
                                    $i=1;
                                   $total = 0;
                                ?>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php
                            $expance = DB::table('expenses')->where('date',$item['date'])->get();
                               ?>
<!--                                <tr data-bs-toggle="modal" data-bs-target="#Modal_new" class="cursor pointer expanseShow" data-expanse="<?php echo e($expance); ?>">
-->                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    
                                    <?php
                                   
                                    $user_name = DB::table('users')->where('id',$item->user_id)->first();
                                    ?>
                                    <td><?php echo e($item['name']?? 'Not Mentioned'); ?> </td>
                                    <td><?php echo e($user_name->first_name ?? 'Not Mentioned'); ?> <?php echo e($user_name->last_name ?? ''); ?> </td>
                                    <td><?php echo e(date('d-m-Y', strtotime($item['date'])) ?? ''); ?></td>
                                    <td><?php echo e($item['quantity'] ?? ''); ?></td>
                                    <td id="<?php echo e($item['date'] ?? ''); ?>"><?php echo e($item['amount'] ?? ''); ?></td>
                                    <?php if($getPermission->edit == 1 || $getPermission->download == 1 || $getPermission->deletes == 1): ?>
                                    <td>
                                        <?php if($getPermission->download == 1): ?>
                                        <a href="<?php echo e(url('expensePrint')); ?>/<?php echo e($item['id']); ?>" target="blank" class="ml-1 btn btn-primary  btn-xs" title="Print Expense" ><i class="fa fa-print"></i></a> 
                                        <?php endif; ?>
                                        <?php if($getPermission->edit == 1): ?>
                                        <a href="<?php echo e(url('expenseEdit')); ?>/<?php echo e($item['id']); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Expense" ><i class="fa fa-edit"></i></a> 
                                        <?php endif; ?>
                                        <?php if($getPermission->deletes == 1): ?>
                                        <a href="javascript:;" data-id='<?php echo e($item['id'] ?? ''); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-primary btn-xs ml-1" title="Delete Expense"><i class="fa fa-trash-o"></i></a>
                                        <?php endif; ?>
                                    </td>  
                                    <?php endif; ?>
                                </tr>
                               
                               <?php
                               $total += $item['amount'] ;
                               ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                             
                             <tfoot>
                              
                                  <tr>
                                        <th class="text-white">Total</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </td>
                                        <th> <b><?php echo e(__('messages.Total Amount')); ?></b></th>
                                        <th> <b id="total_amt">₹ <?php echo e($total ?? ''); ?></b></th>
                                        <!--<th></th>-->
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

<!--<div class="modal" id="Modal_new">-->
<!--	<div class="modal-dialog">-->
<!--		<div class="modal-content" style="margin-left: -30%;width: 160%;">-->
<!--			<div class="modal-header">-->
<!--			    	<h3>Total Expances</h3>-->
<!--				<h4 class="modal-title text-white"></h4>-->
<!--				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>-->
<!--			</div>-->
		
<!--			    <div class="modal-body">-->
<!--			        <div class="row">-->
<!--			            <div class="col-md-12" id="appendTable"></div>-->
<!--			        </div>-->
<!--			    </div>-->

					  
<!--				<div class="modal-footer">-->
<!--					<button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('messages.Close')); ?></button>-->
<!--				</div>-->
		
<!--		</div>-->
<!--	</div>-->
<!--</div> -->
<!--</div> -->



















<!-- The Modal -->
<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #555b5beb;">
			<div class="modal-header">
				<h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="<?php echo e(url('expenseDelete')); ?>" method="post"> 
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

// $(".expanseShow").click(function(){
//     var expanse = $(this).data('expanse');
//     var tablestart = "<table class='table table-bordered table-striped dataTable dtr-inline'><tr><th>Name</th><th>Name</th><th>Name</th><th>Name</th></tr>";
//     var tableend = "<tr><td></td><td></td><td><b>Total</b></td><td id='sumamt'></td></tr></table>";
//     var tr = "";
//     var sumamt = 0;
//     $.each( expanse, function( key, value ) {
//         tr = tr + "<tr><td>" + value.name + "</td><td>" + value.date + "</td><td>" + value.quantity + "</td><td>" + value.amount + "</td></tr>";
//         sumamt += parseInt(value.amount);
//     });
//     var table = tablestart + tr + tableend;
//     $("#appendTable").html(table);
//     $("#sumamt").html(sumamt);
// })
</script>


<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/expense/view.blade.php ENDPATH**/ ?>