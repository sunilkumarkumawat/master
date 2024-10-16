<?php
$roleType = Helper::roleType();

?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-image"></i><?php echo e(__('master.Add Rule')); ?> </h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" title="View Gallery"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <form id="quickForm" action="<?php echo e(url('rules_add')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row m-2">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="color: red;"><?php echo e(__('common.Name')); ?>*</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="name" name="name" placeholder="<?php echo e(__('common.Name')); ?>">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="color: red;"><?php echo e(__('master.Role Name')); ?>*</label>
                                        <select class="select2 form-control <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role_id" id="role_id">
                                            <option value="">Select</option>
                                            <?php if(!empty($roleType)): ?>
                                            <?php $__currentLoopData = $roleType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id ?? ''); ?>"><?php echo e($item->name ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo e(__('master.Description')); ?></label>
                                        <textarea class="form-control " type="text" id="description" name="description" placeholder="<?php echo e(__('master.Description')); ?>"></textarea>

                                    </div>
                                </div>

                            </div>
                            <div class="row m-2">

                                <div class="col-md-12 mt-3 mb-3 text-center">
                                    <button type="submit" class="btn btn-primary "><?php echo e(__('common.Submit')); ?></button>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>



            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-support"></i> &nbsp; <?php echo e(__('master.View Rule')); ?></h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th><?php echo e(__('common.SR.NO')); ?></td>

                                                <th>Name</th>
                                                <th><?php echo e(__('master.Role Name')); ?></th>
                                                <th><?php echo e(__('master.Description')); ?></th>
                                                <th><?php echo e(__('common.Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($data)): ?>
                                            <?php
                                            $i=1
                                            ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($item['name'] ?? ''); ?></td>
                                                <td><?php echo e($item['role_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['description'] ?? ''); ?></td>


                                                <td>
                                                    <a href="<?php echo e(url('rules_edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Sports"><i class="fa fa-edit"></i></a>
                                                    <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger  btn-xs ml-3" title="Delete Sports"><i class="fa fa-trash-o"></i></a>
                                                </td>
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
</div>


</section>
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
                <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <form action="<?php echo e(url('rules_delete')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type=hidden id="delete_id" name=delete_id>
                    <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?> ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/Rule/add.blade.php ENDPATH**/ ?>