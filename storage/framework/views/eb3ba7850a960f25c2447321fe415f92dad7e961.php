<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-whatsapp"></i> &nbsp; <?php echo e(__('WhatsApp Setting')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('#')); ?>" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?></a>
                                <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
                            </div>
                        </div>  

                    <div class="row m-2">
                        <div class="col-md-12">
                            <form action="<?php echo e(url('whatsapp_setting')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <table id="example1"class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Module</th>
                                            <th>Permission</th>
                                            <th>Media Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)): ?>
                                            <?php
                                                $i = 1;
                                            ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" name="module_id[]" value="<?php echo e($item->id ?? ''); ?>">
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item->module ?? ''); ?></td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="" name="permission[]">
                                                        <option value="0" <?php echo e(($item->permission == 0) ? 'selected' : ''); ?>>Inactive</option>
                                                        <option value="1" <?php echo e(($item->permission == 1) ? 'selected' : ''); ?>>Active</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="" name="type[]">
                                                        <option value="text" <?php echo e(($item->type == 'text') ? 'selected' : ''); ?>>Text</option>
                                                        <option value="media" <?php echo e(($item->type == 'media') ? 'selected' : ''); ?>>Media & Text</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm text-center">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/whatsapp_setting/view.blade.php ENDPATH**/ ?>