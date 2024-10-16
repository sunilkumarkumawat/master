<?php
$busRoute = Helper::busRoute();
$bus = Helper::bus();
?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4 pr-0">
                    <div class="card card-outline card-orange mr-1">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-road"></i> &nbsp;<?php echo e(__('bus.Add Bus to Route')); ?></h3>
                            <div class="card-tools">

                            </div>

                        </div>
                        <form id="quickForm" action="<?php echo e(url('assignBusRoute')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-12">
                                    <label style="color:red;"><?php echo e(__('bus.Route')); ?>*</label>
                                    <select class="form-control <?php $__errorArgs = ['route_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="route_id" name="route_id">
                                        <option value=""><?php echo e(__('messages.Select')); ?></option>
                                        <?php if(!empty($busRoute)): ?>
                                        <?php $__currentLoopData = $busRoute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['route_id'];
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
                                <div class="col-md-12">
                                    <label style="color:red;"><?php echo e(__('bus.Bus')); ?>*</label>
                                    <select class="form-control <?php $__errorArgs = ['bus_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="bus_id" name="bus_id">
                                        <option value=""><?php echo e(__('messages.Select')); ?></option>
                                        <?php if(!empty($bus)): ?>
                                        <?php $__currentLoopData = $bus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['bus_id'];
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

                            <div class="row m-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('messages.submit')); ?> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8 pl-0">
                    <div class="card card-outline card-orange ml-1">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-road"></i> &nbsp;<?php echo e(__('bus.Bus & Route List')); ?></h3>
                            <div class="card-tools">
                                <!--<a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add</a>-->
                                <a href="<?php echo e(url('busDashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?></a>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                    <thead class="bg-primary">
                                        <tr role="row">
                                            <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                            <th><?php echo e(__('bus.Bus Route')); ?></th>
                                            <th><?php echo e(__('bus.Bus Name')); ?></th>

                                    </thead>
                                    <tbody id="">

                                        <?php if(!empty($dataview)): ?>
                                        <?php
                                        $i=1
                                        ?>
                                        <?php $__currentLoopData = $dataview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $busRouteAssign = Helper::busRouteAssign($item['route_id']);
                                        ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item['busRoute']['name'] ?? ''); ?></td>
                                            <td>
                                                <?php if(!empty($busRouteAssign)): ?>
                                                <?php $__currentLoopData = $busRouteAssign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <i class="fa fa-bus"></i>
                                                <?php echo e($type['bus']['name'] ?? ''); ?>&nbsp; &nbsp;
                                                <a href="<?php echo e(url('assignBusRouteEdit')); ?>/<?php echo e($type['id'] ?? ''); ?>"><i class="fa fa-pencil text-primary" title="Edit"></i></a> &nbsp;
                                                <a href="javascript:;" data-id='<?php echo e($type->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData"><i class="fa fa-remove text-danger" title="Delete"></i></a>
                                                <a href="<?php echo e(url('assignBus')); ?>/<?php echo e($type['id'] ?? ''); ?>" title="Assign Bus to Student" class="text-success"><i class="fa fa-tag pl-2"></i> Assign Bus</a>
                                                <br>
                                                <hr class="m-0">

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
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
    </section>
</div>

<script>
    $('.deleteData').click(function() {
        var delete_id = $(this).data('id');

        $('#delete_id').val(delete_id);
    });
</script>

<!-- The Modal -->
<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #555b5beb;">

            <div class="modal-header">
                <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>

            <form action="<?php echo e(url('assignBusRouteDelete')); ?>" method="post">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/bus/assignBusRoute.blade.php ENDPATH**/ ?>