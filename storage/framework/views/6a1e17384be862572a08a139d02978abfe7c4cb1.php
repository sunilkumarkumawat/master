<?php $__env->startSection('content'); ?>


<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;Examination</h3>
							<div class="card-tools">
								<!--<a href="<?php echo e(url('admissionView')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <span class="Display_none_mobile"> <?php echo e(__('common.View')); ?> </span></a>-->
								<!--<a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"> <?php echo e(__('common.Back')); ?> </span></a>-->
							</div>

						</div>


					</div>
				</div>
				
				
				<?php if(!empty($exam)): ?>
				
				<?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <?php
                    $exam_name = DB::table('exams')->where('id',$list)->first();
                    ?>

                
                <div class="col-md-3 col-sm-6 col-12">
                    <form action='<?php echo e(url("bulk_marksheet_generate")); ?>' method='post'>
                        <?php echo csrf_field(); ?>
                        
                        <input type='hidden' name='single_student' value='<?php echo e($single_student); ?>'/>
                        <input type='hidden' name='exam[]' value='<?php echo e($list); ?>'/>
                        <input type='hidden' name='exam_array[<?php echo e($list); ?>]' value='1'/>
                        <input type='hidden' name='class_type_id' value='<?php echo e(Session::get("class_type_id")); ?>'/>
                     
                        <?php if(!empty($subjects)): ?>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                        <input type='hidden' name='subjects[]' value='<?php echo e($subject); ?>'/>
                        <input type='hidden' name='subject_array[<?php echo e($subject); ?>]' value='<?php echo e($key+1); ?>'/>
                     
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                        <div class="info-box bg-success">
                        <button class='btn btn-primary btn-xs' ><span class="info-box-icon"><i class="fa fa-file-pdf-o"></i></span></button>
                        <div class="info-box-content">
                        <span class="info-box-text">41,410</span>
                        <span class="info-box-number"> <?php echo e($exam_name->name ?? ''); ?></span>
                        <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                        70% Increase in 30 Days
                        </span>
                        </div>
                        
                        </div>
                    </form>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
			</div>
		</div>
	</section>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/examination/offline_exam/exam/myExams.blade.php ENDPATH**/ ?>