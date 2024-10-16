<?php
$getSubject = Helper::getSubject();
$classType = Helper::classType();
$getTimePeriod = Helper::getTimePeriod();
$getAllTeachers = Helper::getAllTeachers();

$numbers = [
    0 => 'First',
    1 => 'Second',
    2 => 'Third',
    3 => 'Fourth',
    4 => 'Fifth',
    5 => 'Sixth',
    6 => 'Seventh',
    7 => 'Eighth',
    8 => 'Ninth',
    9 => 'Tenth',
    10 => 'Eleventh',
    11 => 'Twelfth',
    12 => 'Thirteenth',
    13 => 'Fourteenth',
    14 => 'Fifteenth',
    15 => 'Sixteenth',
    16 => 'Seventeenth',
    17 => 'Eighteenth',
    18 => 'Nineteenth',
    19 => 'Twentieth',
];

$newNumber = [];


?>

<?php $__currentLoopData = $getTimePeriod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php
$newNumber[$time->id] = $numbers[$key];
?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php
//dd($newNumber);
?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-image"></i> <?php echo e(__('master.Add Subject Teacher')); ?></h3>
                            <div class="card-tools">
                                <a onclick="history.back()" class="btn btn-primary  btn-sm" title="View Gallery"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <form id="quickForm" action="<?php echo e(url('teacher_subject_add')); ?>" method="post" enctype="multipart/form-data" class="was-validated">
                            <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="color: red;"><?php echo e(__('common.Class')); ?>*</label>
                                        <select class="form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="class_type_id" name="class_type_id" required>
                                            <option value=""><?php echo e(__('common.Select')); ?></option>
                                            <?php if(!empty($classType)): ?>
                                            <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type->id == old('class_type_id')) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                         <div class="invalid-feedback"><?php echo e(__('master.Please fill out this field.')); ?></div>
                                    </div>
                                </div>
                             
                             
                              
                                <div class="col-md-2 div_subject_id" style="display:block;">
                                    <div class="form-group">
                                        <label style="color: red;"><?php echo e(__('common.Subject')); ?>*</label>
                                        <select class="form-control  <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="subject_id" name="subject_id" required>
                                            <option value=""><?php echo e(__('common.Select')); ?></option>
                                         
                                        </select>
                                        <div class="invalid-feedback"><?php echo e(__('master.Please fill out this field.')); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="color: red;"><?php echo e(__('master.Teacher')); ?>*</label>
                                        <select class="form-control <?php $__errorArgs = ['teacher_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="teacher_id" name="teacher_id" required>
                                            <option value=""><?php echo e(__('common.Select')); ?></option>
                                            <?php if(!empty($getAllTeachers)): ?>
                                            <?php $__currentLoopData = $getAllTeachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type->id == old('teacher_id')) ? 'selected' : ''); ?>><?php echo e($type->first_name ?? ''); ?> <?php echo e($type->last_name ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                       <div class="invalid-feedback"><?php echo e(__('master.Please fill out this field.')); ?></div>
                                    </div>
                                </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="color: red;"><?php echo e(__('master.Time')); ?></label>
                                        <select class="form-control  <?php $__errorArgs = ['time_period_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="time_period_id" name="time_period_id" required>
                                            <option value=""><?php echo e(__('common.Select')); ?></option>
                                            <?php if(!empty($getTimePeriod)): ?>
                                            <?php $__currentLoopData = $getTimePeriod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type->id == old('time_period_id')) ? 'selected' : ''); ?>><?php echo e(date('h:i:s A', strtotime($type->from_time)) ?? ''); ?> To <?php echo e(date('h:i:s A', strtotime($type->to_time)) ?? ''); ?> [<?php echo e($numbers[$key]); ?>]</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="invalid-feedback"><?php echo e(__('master.Please fill out this field.')); ?></div>
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
                            <h3 class="card-title"><i class="fa fa-support"></i> &nbsp; <?php echo e(__('master.View Subject Teacher')); ?> </h3>
                            <div class="card-tools">
                                
                                <form action="<?php echo e(url('printTimeTable')); ?>" method="post" target="_blank">
                                <?php echo csrf_field(); ?>
                                    <select class="selectDesign text-secondary" id="class_type_id_print" name="class_type_id_print">
                                        <option value="">All Classes</option>
                                        <?php if(!empty($classType)): ?>
                                        <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary  btn-sm" title="Print TimeTable"><i class="fa fa-print"></i> Print TimeTable</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th><?php echo e(__('common.SR.NO')); ?></td>

                                                <th><?php echo e(__('common.Class')); ?> </th>
                                                <th><?php echo e(__('common.Subject')); ?> </th>
                                                <th><?php echo e(__('master.Teacher Name')); ?></th>
                                                <th><?php echo e(__("Period's Name")); ?></th>
                                                <th><?php echo e(__('master.Time Periods')); ?></th>
                                                <th><?php echo e(__('common.Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($data)): ?>
                                            <?php
                                            $i=1;
                                            $count = 0;
                                           $class_type_id = '';
                                            ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            
                                            if($class_type_id == '')
                                            {
                                            $class_type_id == $item->class_type_id;
                                            }
                                            if($class_type_id == $item->class_type_id)
                                            {
                                           
                                            $count++;
                                            }
                                            else
                                            {
                                            $class_type_id = $item->class_type_id;
                                            $count =0;
                                            }

                                            ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($item['class_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['subject_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?> </td>
                                                <td><?php echo e($newNumber[$item->time_period_id] ?? ''); ?></td>
                                                <td><?php echo e(date('h:i:s A', strtotime($item->from_time)) ?? ''); ?> To <?php echo e(date('h:i:s A', strtotime($item->to_time)) ?? ''); ?> </td>


                                                <td>
                                                    <!--<a href="<?php echo e(url('teacher_subject_edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Sports"><i class="fa fa-edit"></i></a>-->
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
            <form action="<?php echo e(url('teacher_subject_delete')); ?>" method="post">
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/TeacherSubject/add.blade.php ENDPATH**/ ?>