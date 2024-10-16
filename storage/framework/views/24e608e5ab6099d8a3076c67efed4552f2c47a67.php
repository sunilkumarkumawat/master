<?php
$getstudents = Helper::getstudents();
$classType = Helper::classType();
$getState = Helper::getState();
$getCity = Helper::getCity();
$getCountry = Helper::getCountry();
$getSetting=Helper::getSetting();

?>


<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-certificate"></i> &nbsp;<?php echo e(__('master.Gate Pass Add')); ?> </h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('gate_pass_view')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a>
                                <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <form id="quickForm" action="#" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="row m-2">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="State" class="required"><?php echo e(__('master.Admission No.')); ?></label>
                                        <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('master.Admission No.')); ?>" value="<?php echo e($search['admissionNo'] ?? ''); ?>">
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
                                    <label for="">&nbsp;</label>
                                    <button type="button" class="btn btn-primary " onclick="SearchValue()" style="margin-top:28px;"><?php echo e(__('common.Search')); ?></button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="student_list_show"></div>
                </div>
                <div class="col-md-12">

                    <div class="card m-3">
                        <div class="card-body">
                            <form id="gate_paas_add" action="<?php echo e(url('gate_pass_add')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    <div class="col-md-3">
                                        <input type="hidden" name="admissionID" id="stuAdmissionNo" class="form-control" value="<?php echo e(old('admissionID')); ?>">

                                        <div class="form-group">
                                            <label style="color:red;"><?php echo e(__('master.Student Name')); ?> *</label>

                                            <input type="text" name="student_name" id="student_name" readonly onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control <?php $__errorArgs = ['student_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('master.Student Name')); ?>" value="<?php echo e(old('student_name')); ?>">

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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color:red;"><?php echo e(__('common.Fathers Name')); ?> *</label>
                                            <input type="text" name="father_name" id="father_name" readonly onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('common.Fathers Name')); ?>" value="<?php echo e(old('father_name')); ?>">
                                            <?php $__errorArgs = ['father_name'];
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color:red;"><?php echo e(__('common.Fathers Mobile')); ?> *</label>
                                            <input type="text" name="father_mobile" id="father_mobile" readonly class="form-control <?php $__errorArgs = ['father_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('common.Fathers Mobile')); ?>" value="<?php echo e(old('father_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
                                            <?php $__errorArgs = ['father_name'];
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


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color:red;"><?php echo e(__('common.Date')); ?> *</label>
                                            <input type="datetime-local" name="iessu_date" id="iessu_date" class="form-control <?php $__errorArgs = ['iessu_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(now()->format('Y-m-d\TH:i')); ?>">
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


                                <div class="col-md-6">
                                    <strong><?php echo e(__('common.Fathers Mobile')); ?></strong>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-0" name="father_mobile2" value="<?php echo e(old('father_mobile2')); ?>" readonly id="father_mobile2" placeholder="<?php echo e(__('common.Fathers Mobile')); ?>">
                                        <span class="input-group-append">
                                            <button type="button" id="otpSend" class="btn btn-info btn-flat"><?php echo e(__('master.OTP Send')); ?></button>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <strong><?php echo e(__('master.OTP')); ?></strong>
                                    <input type="hidden" id="otpcheck">
                                    <input type="text" class="otpcheck_submit form-control rounded-0" name="otp" required maxlength="4" value="<?php echo e(old('otp')); ?>" id="otp" placeholder="<?php echo e(__('master.OTP')); ?>">
                                    <p id="errormessage" class="text-danger mb-0"></p>
                                </div>

                                </div>
                                <h5><?php echo e(__('master.Reciver Detail')); ?></h5>

                                <div class="row m-2">
                                    <div class="col-md-3 pl-0">
                                        <div class="form-group">
                                            <label style="color:red;"><?php echo e(__('master.Reciver Name')); ?> *</label>

                                            <input type="text" name="reciver_name" id="reciver_name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control invalid" placeholder="<?php echo e(__('master.Reciver Name')); ?>" value="<?php echo e(old('reciver_name')); ?>">
                                            
                                            <span class="invalid-feedback" id="reciver_name_invalid" role="alert">
                                                <strong><?php echo e(__('master.Reciver name field is required')); ?></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color:red;"><?php echo e(__('master.Reciver Mobile')); ?> *</label>
                                            <input type="text" name="reciver_mobile" id="reciver_mobile" class="form-control invalid" placeholder=" <?php echo e(__('master.Reciver Mobile')); ?>" value="<?php echo e(old('reciver_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
                                            <span class="invalid-feedback" id="reciver_mobile_invalid" role="alert">
                                                <strong><?php echo e(__('master.Reciver mobile field is required')); ?></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-0">
                                        <div class="form-group">
                                            <label style="color:red;"><?php echo e(__('master.Relation')); ?> *</label>

                                            <input type="text" name="relation" id="relation" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control invalid" placeholder="<?php echo e(__('master.Relation')); ?>" value="<?php echo e(old('relation')); ?>">
                                            <span class="invalid-feedback" id="relation_invalid" role="alert">
                                                <strong><?php echo e(__('master.Relation field is required')); ?></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" id="submit_check" class="btn btn-primary"><?php echo e(__('common.Submit')); ?></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

$('#submit_check').click(function(e){
    e.preventDefault();
    var all_filled_up = 2000;
    $('.invalid').each(function(){
        var this_value = $(this).val();
        var this_id = $(this).attr('id'); 
        if(this_value == ''){
            $('#' + this_id + '_invalid').css('display','block');
            all_filled_up = all_filled_up + ' && ' + this_value;
        }else{
            $('#' + this_id + '_invalid').css('display','none');
        }
    })
    if(all_filled_up == 2000){
        $('#gate_paas_add').trigger('submit');
    }else{
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }
});


    function SearchValue() {
        var basurl = "<?php echo e(url('/')); ?>";
        var class_type_id = $('#class_type_id :selected').val();
        var admissionNo = $('#admissionNo').val();
        var name = $('#name').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: basurl + '/search_gate_pass',
            data: {
                class_type_id: class_type_id,
                name: name,
                admissionNo: admissionNo,
            },
            //dataType: 'json',
            success: function(data) {
                $('.student_list_show').html(data);

            }
        });
    };
    
    $('#otpSend').click(function(){
        var basurl = "<?php echo e(url('/')); ?>";
           var num =  $('#father_mobile2').val();
          
           if(num == ""){
               toastr.error("Father's number can not be left blank");
           }else if(num.length == 10){
                var digits = '0123456789';
                let OTP = '';
                for (let i = 0; i < 4; i++ ) {
                    OTP += digits[Math.floor(Math.random() * 10)];
                }
                                   toastr.success("OTP send Successfully ");

          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: basurl + '/gate_pass_otp',
            data: {
                OTP: OTP,
                num: num
            },

            success: function(data) {
                console.log('AJAX request successful:', data);
            },
           
        });
             $("#otpcheck").val(OTP);
                $(".otpcheck_submit").val("");
              //  toastr.success("Your One-Time password(OTP) :-" + " " + OTP);
                
           }else{
              toastr.error("Invalid Numbers");
           }
        });
        
    $('.otpcheck_submit').change(function(){
            var getotp = $('#otpcheck').val();
            var enterotp = $(this).val();
            if(enterotp == ""){
                $('#errormessage').html("Please enter your otp");
                $('#submit_check').prop('disabled', true);
            }else if(enterotp.length < 4){
                $('#errormessage').html("Invalid Otp");
                $('#submit_check').prop('disabled', true);
            }else if(enterotp != getotp){
                $('#errormessage').html("Invalid Otp");
                $('#submit_check').prop('disabled', true);
            }else{
                $('#submit_check').prop('disabled', false);
                $('#errormessage').html("");
                toastr.success("Success");
            }
        })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/GatePass/add.blade.php ENDPATH**/ ?>