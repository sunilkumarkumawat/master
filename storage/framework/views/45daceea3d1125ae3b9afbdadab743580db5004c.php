 
<?php $__env->startSection('content'); ?>
<style>
    .bus_image_box img{
        width:200px;
    }
    
    .all_text_css p{
        font-size:16px;
        margin-bottom:0px;
    }
    
</style>
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">
                                <i class="fa fa-truck"></i> Transport</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <?php if(!empty($bus)): ?>
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-4 text-center">
                                    <div class="bus_image_box">
                                        <img src="<?php echo e(env('IMAGE_SHOW_PATH').'bus_photo/'.$bus->bus_photo); ?>" alt="bus photo">
                                    </div>
                                </div>
                                <div class="col-md-8 all_text_css">
                                        <p><b>Bus No. : <?php echo e($bus->bus_no ?? ''); ?></b></p>
                                        <p><b>Bus Name : <?php echo e($bus->busName ?? ''); ?></b> </p>
                                        <p><b>Bus Owner Name : <?php echo e($bus->bus_owmer_name ?? ''); ?></b> </p>
                                        <p><b>Bus Owner No. : <?php echo e($bus->owner_no ?? ''); ?></b> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="col-md-8 text-center">
                <h3>No Data Found</h3>
                </div>
                <?php endif; ?>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/bus/student_bus_assign_view.blade.php ENDPATH**/ ?>