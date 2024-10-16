 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="nav-icon fa fa-calendar-plus-o"></i> &nbsp;<?php echo e(__('Prayer')); ?> </h3>
							<div class="card-tools"> 
                                	<a href="<?php echo e(url('dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?>  </a>
                            </div>
						</div>
						<div class="card-body">
                            <?php if(!empty($data)): ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <div class="col-md-12">
						        <div class="card">
						            <div class="card-header">
						                <div class="d-flex justify-content-between">
						                    <p class="mb-0"><?php echo e($item->name ?? ''); ?></p>
						                </div>
						            </div>
						            
						            <div class="card-body">
						                <div class="text-center"><?php echo html_entity_decode($item->prayer ?? ''); ?></div>
						            </div>
						        </div>
                            </div>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/student/prayer_view.blade.php ENDPATH**/ ?>