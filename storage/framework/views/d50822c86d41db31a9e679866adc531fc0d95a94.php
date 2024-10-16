<?php
$getPermission = Helper::getPermission();
?>
 
<?php $__env->startSection('content'); ?>

 <div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
          
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
                <div class="card-header bg-primary">
                    <?php if(Session::get('role_id') !== 3): ?>
                        <h3 class="card-title"><i class="fa fa-cloud-download"></i> &nbsp;<?php echo e(__('download.Upload/ Download Content')); ?> </h3>
                    <?php else: ?>
                        <h3 class="card-title"><i class="fa fa-cloud-download"></i> &nbsp; <?php echo e(__('download.Download Center')); ?></h3>
                    <?php endif; ?>
                    <div class="card-tools">
                        </div>
            
                </div>               
            </div>
            </div>
        </div> 

            
        <div class="row">
            <?php if(Session::get('role_id') == 3): ?>
                    <?php if(!empty(Helper::SubSidebarPerm(12))): ?>
                        <?php $__currentLoopData = Helper::SubSidebarPerm(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-6 <?php echo e($key == 0 ? 'd-none' : ''); ?>">
                            <a href="<?php echo e(url($sub_sidebar['url'] ?? '')); ?>" class="small-box-footer">
                                <div class="small-box bg-<?php echo e($sub_sidebar['bg_color'] ?? ''); ?>">
                                    <div class="inner">
                                        <h4 class="mobile_text_title"> <?php if(Session::get('locale') == 'hi'): ?><?php echo e($sub_sidebar['hindi_name'] ?? ''); ?> <?php else: ?> <?php echo e($sub_sidebar['name'] ?? ''); ?> <?php endif; ?> </h4>
                                        <p><?php echo e(__('common.Enter')); ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa <?php echo e($sub_sidebar['ican'] ?? ''); ?>"></i>
                                    </div>
                                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--<div class="col-md-3 col-6">
                            <a href="<?php echo e(url('studentAdmitCard')); ?>" class="small-box-footer">
                                <div class="small-box bg-<?php echo e($sub_sidebar['bg_color'] ?? ''); ?>">
                                    <div class="inner">
                                        <h4 class="mobile_text_title"> Admit Card </h4>
                                        <p><?php echo e(__('common.Enter')); ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa <?php echo e($sub_sidebar['ican'] ?? ''); ?>"></i>
                                    </div>
                                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                                </div>
                            </a>
                        </div>-->
                    <?php endif; ?> 
                
            <?php else: ?>
                    
                    <?php if(!empty(Helper::SidebarSubPerm(12))): ?>
                        <?php $__currentLoopData = Helper::SidebarSubPerm(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-6">
                            <a href="<?php echo e(url($sub_sidebar['url'] ?? '')); ?>" class="small-box-footer">
                                <div class="small-box bg-<?php echo e($sub_sidebar['bg_color'] ?? ''); ?>">
                                    <div class="inner">
                                        <h4 class="mobile_text_title"> <?php if(Session::get('locale') == 'hi'): ?><?php echo e($sub_sidebar['hindi_name'] ?? ''); ?> <?php else: ?> <?php echo e($sub_sidebar['name'] ?? ''); ?> <?php endif; ?> </h4>
                                        <p><?php echo e(__('common.Enter')); ?></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa <?php echo e($sub_sidebar['ican'] ?? ''); ?>"></i>
                                    </div>
                                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?> 
            
            <?php endif; ?>
        </div>
   
    
    </div>
  
</section>
</div>

  
       

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/download_center/download_center.blade.php ENDPATH**/ ?>