<?php
   $sidebar =Helper::getSiderbar();
   $getPermisn = Helper::getPermisn();
   $getPermisnByBranch = Helper::getPermisnByBranch();
   $getSetting = Helper::getSetting();
   $allPermisn = explode(',',$getPermisn['sidebar_id']);
?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
        <div class="Display_none_PC">
            <div class="col-md-12 p-0">
                <div class="card title_dash p-2 bg-primary">
                   <h3 class="card-title text-white"><i class="fa fa-home"></i> &nbsp;<?php echo e(__('Mini Dashboard')); ?></h3>
                </div>
            </div>
            <div class="row">
                 <?php if(!empty($sidebar)): ?>
                 <?php
                $colors = ['warning', 'success', 'primary', 'dark', 'danger', 'info','secondary'];
                $previousColor = '';
                ?>
                    <?php $__currentLoopData = $sidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $allPermisn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permisnData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['id'] == $permisnData): ?>
                            <?php
                            do {
                                $colorClass = $colors[array_rand($colors)];
                            } while ($colorClass == $previousColor);
                            $previousColor = $colorClass;
                            ?>
                             <div class="col-6">
                                    <a href="<?php echo e(url($data['url'])); ?>">
                                    <div class="card mobile_dashboard_card">
                                            <div class="box_icon bg-<?php echo e($colorClass); ?>">
                                           <i class="<?php echo e($data['ican'] ?? ''); ?>"></i>
                                           </div>
                                            <div class="info_text_box">
                                                
                                                <?php if(Session::get('locale') == 'hi'): ?>
                                                <p class="info-box-text"><?php echo e($data['hindi_name'] ?? ''); ?></p>
                                                <?php else: ?>
                                                    <p class="info-box-text"><?php echo e($data['name'] ?? ''); ?></p>
                                                <?php endif; ?>
                                            </div>
                                    </div>
                                    </a>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
                <div class="col-6">
                                    <a href="<?php echo e(url('logout')); ?>">
                                    <div class="card mobile_dashboard_card">
                                            <div class="box_icon bg-danger">
                                           <i class="fa fa-sign-out"></i>
                                           </div>
                                            <div class="info_text_box">
                                            <p class="info-box-text">Log Out</p>
                                    </div>
                            </div>
                        </a>
                </div>
        </div>
        </div>
        </div>
    </section>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/minidashboard.blade.php ENDPATH**/ ?>