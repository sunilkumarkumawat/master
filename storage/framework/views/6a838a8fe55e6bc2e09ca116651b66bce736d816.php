<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-user-secret"></i> &nbsp;<?php echo e(__('View Gate Pass')); ?> </h3>
                            <div class="card-tools">
                           
                                <a href="<?php echo e(url('dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?> </a>

                            </div>
                        </div>

                        <div class="row mb-2 m-2">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                    <thead class="bg-primary">
                                        <tr role="row">
                                            <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                            <th><?php echo e(__('Student Name')); ?></th>
                                            <th><?php echo e(__('Father Name')); ?></th>
                                            <th><?php echo e(__('Father Mobile')); ?></th>
                                            <th><?php echo e(__('Reciver  Name')); ?></th>
                                            <th><?php echo e(__('Reciver Mobile')); ?></th>
                                            <th><?php echo e(__('Relation')); ?></th>
                                            <th><?php echo e(__('Date')); ?></th>

                                            <!--<th><?php echo e(__('messages.Action')); ?></th>-->
                                    </thead>
                                    <tbody>

                                        <?php if(!empty($data)): ?>
                                        <?php
                                        $i=1
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item['student_name'] ?? ''); ?></td>
                                            <td><?php echo e($item['father_name'] ?? ''); ?></td>
                                            <td><?php echo e($item['father_mobile'] ?? ''); ?></td>
                                            <td><?php echo e($item['reciver_name'] ?? ''); ?></td>
                                            <td><?php echo e($item['reciver_mobile'] ?? ''); ?></td>
                                            <td><?php echo e($item['relation'] ?? ''); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($item['iessu_date'] ?? ''))); ?> <?php echo e(date('h:i A', strtotime($item['iessu_date'] ?? ''))); ?></td>

                                            <!--<td>
                                                <a href="<?php echo e(url('gate_pass_print')); ?>/<?php echo e($item->admissionNo); ?>" class="btn btn-success  btn-xs ml-3" title="Gate Pass Print" target="_blank"><i class="fa fa-print"></i></a>
                                                <a href="<?php echo e(url('gate_pass_edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Complaint"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger  btn-xs ml-3" title="Delete Book"><i class="fa fa-trash-o"></i></a>
                                            </td>-->
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
                                    <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </div>
                                <form action="<?php echo e(url('gate_pass_delete')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        <input type=hidden id="delete_id" name=delete_id>
                                        <h5 class="text-white"><?php echo e(__('messages.Are you sure you want to delete')); ?> ?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('messages.Close')); ?></button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('messages.Delete')); ?></button>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/student/gate_pass_view.blade.php ENDPATH**/ ?>