 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-support"></i> &nbsp; <?php echo e(__('master.View Prayer')); ?></h3>
							<div class="card-tools ml-3"> <a href="https://demo3.rusoft.in/master_dashboard" class="btn btn-primary  btn-sm" title="Back "><i class="fa fa-arrow-left"></i>Back   </a> </div>
							<div class="card-tools"> <a href="<?php echo e(url('prayer_add')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?> </a> </div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
										<thead class="bg-primary">
											<tr>
												<th><?php echo e(__('common.SR.NO')); ?></td>
                                                <th><?php echo e(__('common.Name')); ?></th>
												<th><?php echo e(__('master.Prayer')); ?></th>
												<th><?php echo e(__('common.Action')); ?></th>

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
												<td><?php echo e($item['name'] ?? ''); ?></td>
												<td>
												<div id="log"><?php echo e($item['prayer'] ?? ''); ?></div>
													<div id="divMain"></div>
												</td>
											<td class=d-flex>
												    <a href="<?php echo e(url('prayer_edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Sports"><i class="fa fa-edit"></i></a> 
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
</script>

<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #555b5beb;">
			<div class="modal-header">
				<h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="<?php echo e(url('prayer_delete')); ?>" method="post"> 
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
    var support = (function() {
        if (!window.DOMParser) return false;
        var parser = new DOMParser();
        try {
            parser.parseFromString('x', 'text/html');
        } catch (err) {
            return false;
        }
        return true;
    })();

    var textToHTML = function(str) {

        // check for DOMParser support
        if (support) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(str, 'text/html');
            return doc.body.innerHTML;
        }

        // Otherwise, create div and append HTML
        var dom = document.createElement('div');
        dom.innerHTML = str;
        return dom;

    };

    var myValue9 = document.getElementById("log").innerText;

    document.getElementById("divMain").innerHTML = textToHTML(myValue9);

    document.getElementById("log").innerText = "";
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/Prayer/view.blade.php ENDPATH**/ ?>