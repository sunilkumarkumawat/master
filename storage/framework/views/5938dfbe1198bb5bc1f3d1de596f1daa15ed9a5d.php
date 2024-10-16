 
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
							<h3 class="card-title"><i class="fa fa-credit-card"></i> &nbsp;<?php echo e(__('Modules for print file')); ?></h3>
							
							
							<div class="card-tools"> 
							    <!--<a href="<?php echo e(url('printFileAdd')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?></a> -->
							    <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
							
						</div>
						<div class="card-body">
       <!--                 <form id="quickForm" action="<?php echo e(url('printFileAdd')); ?>" method="post" >-->
       <!--                 <?php echo csrf_field(); ?> -->
       <!--             <div class="row m-2">-->
       <!--            <div class="col-md-2 mb-2 top">-->
       <!--             		<div class="form-group">-->
       <!--             			<label><?php echo e(__('expense.From Date')); ?></label>-->
       <!--     				<input type="date" class="form-control" id="from_date" name="from_date"  value="<?php echo e($_POST['from_date'] ?? ''); ?>" >-->
       <!--                     </div>-->
       <!--             	</div>-->
       <!--             	<div class="col-md-2 top">-->
       <!--                     <div class="form-group ">-->
       <!--                         <label><?php echo e(__('expense.To Date')); ?></label>-->
       <!--     				<input type="date" class="form-control" id="to_date" name="to_date"  value="<?php echo e($_POST['to_date'] ?? ''); ?>">-->
       <!--         			</div> -->
       <!--                 </div>-->
       <!--     		<div class="col-md-3 top">-->
       <!--     			<div class="form-group">-->
       <!--     				<label><?php echo e(__('common.Search By Keywords')); ?></label>-->
       <!--     				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('common.Search By Keywords')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">-->
       <!--     		    </div>-->
       <!--     		</div>                     	-->
       <!--                 <div class="col-md-1 top">-->
       <!--                      <label class="text-white">Search</label>-->
       <!--             	    <button type="submit" class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>-->
       <!--             	</div>-->
                    			
       <!--             </div>-->
       <!--</form>-->
       
       
                            <div class="col-md-12">
                                <span><button id='edit_button' class='btn btn-primary'>Edit Module's Name</button></span>
                                </div>
                            <div class="col-md-12" id="">
<form action='' method='post'>
    <?php echo csrf_field(); ?>
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th><?php echo e(__('common.SR.NO')); ?></th>
                                    <th><?php echo e(__('Name of Module')); ?></th>
                                    <th><?php echo e(__('View')); ?></th>

                                </tr>
                            </thead>
                            <tbody>

                               <?php if(!empty($data)): ?>
                               
                               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <tr>
                                    <td><?php echo e($key +1); ?></td>
                                    <td class='module_text'> <?php echo e($item->name_show ?? ''); ?>

                                    </td>
                                    <td class='module_input'>
                                    
                                    <input type='text' name='module[]' value='<?php echo e($item->name_show ?? ''); ?>' />
                                    <input type='hidden' name='id[]' value='<?php echo e($item->id ?? ''); ?>' />
                                    
                                    </td>
                                    <td><a href="<?php echo e(url('printFileModuleWiseView')); ?>/<?php echo e($item->id ?? ''); ?>" class="btn btn-primary btn-xs" title="Start Exam"> &nbsp;<i class="fa fa-eye"></i> </a>
    							 </td>
                                    
                                   
                                </tr>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php endif; ?>
                             
                           
                           
                            </tbody>
                        </table>
         <div class="col-md-12 text-center">
                                <span><button id='module_save' type='submit' class='btn btn-success'>Save</button></span>
                                </div>
                                
                                </form>
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

$('.module_input').hide();
$('#module_save').hide();
$('#edit_button').click(function() {
$('.module_input').toggle();
$('.module_text').toggle();
$('#module_save').toggle();
$(this).text(function(i, text){
            return text === "Edit Module's Name" ? "Edit Cancel" : "Edit Module's Name";
        });
});
$('.deleteData').click(function() {
	var delete_id = $(this).data('id');
	$('#delete_id').val(delete_id);
});

</script>


<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/view.blade.php ENDPATH**/ ?>