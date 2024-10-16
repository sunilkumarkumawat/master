
<?php if(!empty($building)): ?> 
    <?php $__currentLoopData = $building; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $build): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-2 col-md-1 btn btn-secondary btn-xs m-1 buildings" style="width: 88px; height: 88px; border-radius: 60px;" data-id="<?php echo e($build->id ?? ''); ?>">
                    <div class="mt-1"><i style="font-size: 40px;margin-top: 2px;" class="fa fa-building-o"></i><p><?php echo e($build->name ?? ''); ?></p></div>
                </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/appendBuilding.blade.php ENDPATH**/ ?>