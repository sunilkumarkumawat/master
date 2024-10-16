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
                    <h3 class="card-title"><i class="fa fa-image"></i><?php echo e(__('master.Add Uniform')); ?> </h3>
                    <div class="card-tools">
                    <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" title="View Gallery"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
                    </div>
                    
                    </div>        
                <form id="quickForm" action="<?php echo e(url('uniform_add')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row m-2">
        
                          <div class="col-md-3">
                            <div class="form-group">
                               <label><?php echo e(__('master.Uniform Image')); ?></label>
                               <input type="file" class="form-control <?php $__errorArgs = ['uniform_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value=<?php echo e(old('uniform_image')); ?> id="uniform_image" name="uniform_image[]" multiple>
                            <?php $__errorArgs = ['uniform_image'];
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
						<div class="col-md-12 pt-2">
                                <div class="form-group">
                                    <label class="text-danger"><b><?php echo e(__('master.Description')); ?>*</b></label>
                                    <textarea type="text" class="form-control" id="editor1" name="description" placeholder="<?php echo e(__('master.Description')); ?>"></textarea>
                                  
                                </div>
                            </div>
                            
                   
                        </div>
                        <div class="row m-2">
                     
                         <div class="col-md-12 mt-3 mb-3 text-center">
                            <button type="submit" class="btn btn-primary "><?php echo e(__('common.Submit')); ?></button>
                        </div>
                    </div>
                    </form>

                        
                    </div>
                 
                       </div>
            </div>


     
        <div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-support"></i> &nbsp; <?php echo e(__('master.View Uniform')); ?></h3>
							<div class="card-tools"> 
                            </div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
										<thead class="bg-primary">
											<tr>
												<th><?php echo e(__('common.SR.NO')); ?></td>
											
												<td><?php echo e(__('common.Photo')); ?></td>
												<td><?php echo e(__('master.Description')); ?></td>
												<td><?php echo e(__('common.Action')); ?></td>
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
												
												<td>
												<!--<img src="<?php echo e(env('IMAGE_SHOW_PATH').'uniform_image/'.$item['uniform_image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/no_image.png'); ?>'" width="60px" height="60px">-->
											 <a href="javascript:;" class="imageData2 ml-3" title="" data-bs-toggle="modal" data-bs-target="#Modal_id2" data-image-src="<?php echo e(env('IMAGE_SHOW_PATH').'uniform_image/'.$item['uniform_image']); ?>">
                                                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'uniform_image/'.$item['uniform_image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/no_image.png'); ?>'" width="60px" height="60px">
                                             </a>
												</td>

												<td><?php echo html_entity_decode($item->description ?? ''); ?></td>
											<td>
												    <a href="<?php echo e(url('uniform_edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Sports"><i class="fa fa-edit"></i></a> 
												    <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger  btn-xs ml-3" title="Delete Sports"><i class="fa fa-trash-o"></i></a> 
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
            </div>

</section>
</div>


<script>
    $('.deleteData').click(function() {
	var delete_id = $(this).data('id');
	$('#delete_id').val(delete_id);
});

    $(document).ready(function() {
        $('.imageData2').click(function() {
            var imageSrc = $(this).data('image-src');
            $('#modalImage').attr('src', imageSrc);
        });
    });
</script>

<div class="modal fade" id="Modal_id2" tabindex="-1" aria-labelledby="Modal_id2_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #ffffff;color: black;">
            <div class="modal-header">
                <h4 class="modal-title">Uniform Image</h4>
                <a type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" width="100%">
            </div>
        </div>
    </div>
</div>
<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #555b5beb;">
			<div class="modal-header">
				<h4 class="modal-title text-white">Delete Confirmation</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="<?php echo e(url('uniform_delete')); ?>" method="post"> 
			    <?php echo csrf_field(); ?>
				<div class="modal-body">
					<input type=hidden id="delete_id" name=delete_id>
					<h5 class="text-white">Are you sure you want to delete  ?</h5> </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
$(document).ready(function(){
    var editor1 = new RichTextEditor("#editor1");
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/Uniform/add.blade.php ENDPATH**/ ?>