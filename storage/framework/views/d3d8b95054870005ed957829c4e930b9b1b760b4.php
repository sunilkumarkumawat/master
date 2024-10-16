 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="nav-icon fa fa-calendar-plus-o"></i> &nbsp;<?php echo e(__('My Class Timetable')); ?> </h3>
							<div class="card-tools"> 
                                	<a href="<?php echo e(url('time/table/dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?>  </a>
                            </div>
						</div>
						<div class="card-body">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                             
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Teacher Name</th>
                                        <th>Time Periods</th>
                                    </tr>
                                </thead>
                              <tbody>
                                <?php if(!empty($data)): ?>
                                <?php
                                  $i = 1;
                                ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($item->className ?? ''); ?> <?php if($item->stream != ""): ?>[<?php echo e($item->stream ?? ''); ?>] <?php endif; ?></td>
                                    <td><?php echo e($item->subjectName ?? ''); ?> <?php if($item->sub_name != ""): ?><?php echo e($item->sub_name ?? ''); ?><?php endif; ?></td>
                                    <td style="text-transform: capitalize;"><?php echo e($item->first_name ?? ''); ?> <?php echo e($item->last_name ?? ''); ?></td>
                                    <td><?php echo e(date('h:i A', strtotime($item->from_time)) ?? ''); ?> <?php echo e("To"); ?> <?php echo e(date('h:i A', strtotime($item->to_time)) ?? ''); ?></td>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/student/timetable.blade.php ENDPATH**/ ?>