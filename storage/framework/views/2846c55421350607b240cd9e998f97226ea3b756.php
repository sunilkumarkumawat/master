<?php
$getstudents = Helper::getstudents();
$classType = Helper::classType();
$getState = Helper::getState();
$getCity = Helper::getCity();
$getCountry = Helper::getCountry();
$getSetting = Helper::getSetting();
?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-certificate"></i> &nbsp; <?php echo e(__('Achievement Certificate')); ?> </h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('cc/form/index')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a>
                                <a href="<?php echo e(url('certificate_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <form id="quickForm" action="#" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="State" class="required"><?php echo e(__('certificate.Admission No.')); ?></label>
                                        <input type="text" class="form-control" id="admission_no" name="admissionNo" placeholder="Admission No." value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label><?php echo e(__('common.Class')); ?></label>
                                        <select class="select2  form-control" id="class_type_id" name="class_type_id">
                                            <option value=""><?php echo e(__('common.Select')); ?></option>
                                            <?php if(!empty($classType)): ?>
                                            <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-1 ">
                                    <label for="">&nbsp;</label><br>
                                    <button type="button" class="btn btn-primary " onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="certificate_list_show"></div>
                </div>
               <div class="col-md-12">
                    <div class="card m-2">
                    <div class="card-body">
                        <form id="quickForm" action="<?php echo e(url('cc/form/add')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                    
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="color:red;"><?php echo e(__('certificate.Admission No.')); ?> *</label>
                                            <input type="text" name="admissionNo" id="admissionNo" class="form-control" placeholder="<?php echo e(__('certificate.Admission No.')); ?>" readonly="readonly" value="<?php echo e(old('admission_id')); ?>">
                                            <input type="hidden" name="admission_id" id="admission_id">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Student Name</label>
                                        <input type="text" id="student_name" readonly="readonly" class="form-control" placeholder="<?php echo e(__('certificate.Student Name')); ?>" value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                    
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="color:red;"><?php echo e(__('certificate.Date')); ?> *</label>
                                        <input type="date" name="iessu_date" id="iessu_date" class="form-control <?php $__errorArgs = ['iessu_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(date('Y-m-d')); ?>">
                                        <?php $__errorArgs = ['iessu_date'];
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
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label><?php echo e(__('Class')); ?> </label>
                                        <input type="text" name="class_name" id="class_name" class="form-control" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label><?php echo e(__('Achievement For')); ?> </label>
                                        <input type="text" name="achievement_for" id="achievement_for" class="form-control" placeholder="<?php echo e(__('Achievement For')); ?>" value="<?php echo e(old('achievement_for')); ?>">
                                        <?php $__errorArgs = ['achievement_for'];
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
                                
                            </div>
                            <div class="row m-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('common.submit')); ?> </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
</section>
</div>

<script>
    function SearchValue() {
        var class_type_id = $('#class_type_id :selected').val();
        var admissionNo = $('#admission_no').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/student_search_certificate',
            data: {
                class_type_id: class_type_id,
                admissionNo: admissionNo
            },
            //dataType: 'json',
            success: function(data) {
                $('.certificate_list_show').html(data);

            }
        });
    };
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/cc_form/add.blade.php ENDPATH**/ ?>