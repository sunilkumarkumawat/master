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
							<h3 class="card-title"><i class="fa fa-credit-card"></i> &nbsp;<?php echo e(__('View Message Queue')); ?></h3>	
						</div>
						<div class="card-body">
                            <div class="col-md-12" id="">

                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th><?php echo e(__('Sr No.')); ?></th>
                                    <th><?php echo e(__('Message ID ')); ?></th>
                                    <th><?php echo e(__('Receiver number')); ?></th>
                                    <th><?php echo e(__('Message Type')); ?></th>
                                    <th><?php echo e(__('Content')); ?></th>
                                    <th><?php echo e(__('Media Link')); ?></th>
                                    <th><?php echo e(__('Message status')); ?></th>
                                    <th><?php echo e(__('Submitted at')); ?></th>
                                    <th><?php echo e(__('Sent/failed at')); ?></th>
                                    <th><?php echo e(__('Delivered at')); ?></th>
                                    <th><?php echo e(__('common.Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
  <?php if(!empty($data)): ?>
                        <?php
                       // dd($data);
                           $i=1
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <tr>
                                       
                      
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($item['message_id'] ?? ''); ?> </td>
                                    <td><?php echo e($item['receiver_number'] ?? ''); ?> </td>
                                    <td><?php echo e($item['message_type'] ?? ''); ?> </td>
                                    <td><?php echo e($item['content'] ?? ''); ?> </td>
                                    <td><?php echo e($item['media_link'] ?? ''); ?> </td>
                                    <td><?php echo e($item['message_status'] ?? ''); ?> </td>
                                    <td><?php echo e($item['submitted_at'] ?? ''); ?> </td>
                                    <td><?php echo e($item['sent_at'] ?? ''); ?> </td>
                                    <td><?php echo e($item['delivered_at'] ?? ''); ?> </td>
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


<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/message_queue/view.blade.php ENDPATH**/ ?>