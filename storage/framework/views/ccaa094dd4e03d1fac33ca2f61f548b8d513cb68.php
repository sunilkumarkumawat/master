<?php
$role_id = Session::get('role_id');
?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">

        <div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-support"></i> &nbsp;<?php echo e(__('master.View Shops')); ?> </h3>
							<div class="card-tools">
						<?php if($role_id != 3): ?>
                            <a href="<?php echo e(url('books_uniform_add')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i> <?php echo e(__('common.Add')); ?> </a>
                        <?php endif; ?>    
                            <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
                            </div>
						</div>
						<div class="row">
							<?php if(!empty($data)): ?>
							 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-4">
							    <div class="card shop_card">
							        <div class="card-body">
							            <div class="row d-flex align-items-center">
							                <div class="col-md-4 col-3">
							                    <div class="shadow_box">
							                  <img class="shadow_drop" src="<?php if($item->category == "Books"): ?>
							                                                <?php echo e(env('IMAGE_SHOW_PATH').'default/Book.png'); ?>

							                                                <?php else: ?>
							                                                <?php echo e(env('IMAGE_SHOW_PATH').'default/Uniform.png'); ?>

							                                                <?php endif; ?>" alt="Card image" style="width:100%">
							                   </div>
							                        
							                </div>
							                <div class="col-md-8 col-9 all_p_oof">
							                    <p><b><?php echo e(__('master.Shop Name')); ?> :- <?php echo e($item->shop_name ?? '--'); ?></b></p>
							                    <p><b><?php echo e(__('master.Shopkeeper No')); ?> :- <?php echo e($item->shop_keeper_no ?? '--'); ?></b></p>
							                    <p><b><?php echo e(__('master.Live Location')); ?> :- <?php echo e($item->live_location ?? '--'); ?></b></p>
							                    <p><b><?php echo e(__('common.Address')); ?> :- <?php echo e($item->address ?? '--'); ?></b></p>
							                </div>
							            </div>
							        </div>
							        <?php if($role_id != 3): ?>
							        <div class="card-footer text-center">
							            
										<a href="<?php echo e(url('books_uniform_edit')); ?>/<?php echo e($item->id); ?>">
										    <button class="btn btn-lg btn-primary"><?php echo e(__('common.Edit')); ?></button>
										</a> 
										<a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData">
										   <button class="btn btn-lg btn-danger"><?php echo e(__('common.Delete')); ?></button>
										</a> 
												
							        </div>
							        <?php endif; ?>
							    </div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
            </div>

</section>
</div>

<style>
    .all_p_oof p{
        margin-bottom:0px;
        font-size: 14px;
    }
    
    .shop_card{
        margin:10px;
    }
    
    .shadow_drop{
        filter:drop-shadow(4px 4px 2px gray);
    }
    
    .shadow_box{
        border: 1px solid #cbcbcb;
        border-radius: 4px;
        padding: 10px;
        height: 100px;
        width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<script>
    $('.deleteData').click(function() {
	var delete_id = $(this).data('id');
	$('#delete_id').val(delete_id);
});
</script>

<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #555b5beb;">
			<div class="modal-header">
				<h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="<?php echo e(url('books_uniform_delete')); ?>" method="post"> 
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/books_uniform/view.blade.php ENDPATH**/ ?>