<?php
$getgenders = Helper::getgender();
$getclassType = Helper::classType();
?>
 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">   
   <div class="card card-outline card-orange">
				<div class="card-header bg-primary flex_items_toggel">
					<h3 class="card-title"><i class="fa fa-shirtsinbulk"></i> &nbsp;<?php echo e(__('staff.Add Teachers')); ?></h3>
					<div class="card-tools"> 
					    <a href="<?php echo e(url('teachers/index')); ?>" class="btn btn-primary  btn-sm" title="View Teacher"><i class="fa fa-eye"></i> <span class="Display_none_mobile"><?php echo e(__('messages.View')); ?> </span></a> 
					    <a href="<?php echo e(url('staff_file')); ?>" class="btn btn-primary  btn-xs"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('messages.Back')); ?> </span></a>

					</div>
				</div>        
      <div class="panel panel-default">
         <div class="panel-body">
            <!-- personal details row -->
            <form id="quickForm" action="<?php echo e(url('teachers/add')); ?>" method="post" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>  
               <div class="row m-2">
                  <div class=" col-md-12 title">
                     <h5 class="text-danger"><?php echo e(__('staff.Personal Details')); ?>:-</h5>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label style="color:red;"><?php echo e(__('staff.Unique Id')); ?>*</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['UniqueId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="UniqueId" name="UniqueId" placeholder="<?php echo e(__('staff.Unique Id')); ?>" readonly value="<?php echo e(($BillCounter->counter  ?? '') + 1); ?>">
                        <?php $__errorArgs = ['UniqueId'];
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
                        <label style="color:red;"><?php echo e(__('common.First Name')); ?>* </label>
                        <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="first_name" name="first_name" placeholder="<?php echo e(__('common.First Name')); ?>" value="<?php echo e(old('first_name')); ?>">
                        <?php $__errorArgs = ['first_name'];
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
                        <label style="color:red;"><?php echo e(__('common.Last Name')); ?>* </label>
                        <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="last_name" name="last_name" placeholder="<?php echo e(__('common.Last Name')); ?>" value="<?php echo e(old('last_name')); ?>">
                        <?php $__errorArgs = ['last_name'];
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
                        <label style="color:red;"><?php echo e(__('common.Mobile No.')); ?>*</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="" name="mobile" placeholder="<?php echo e(__('common.Mobile No.')); ?>" value="<?php echo e(old('mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
                        <?php $__errorArgs = ['mobile'];
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
                        <label><?php echo e(__('common.Aadhaar No.')); ?></label>
                        <input type="text" class="form-control" id="aadhaar" name="aadhaar" placeholder="<?php echo e(__('common.Aadhaar No.')); ?>" value="<?php echo e(old('aadhaar')); ?>" maxlength="12" onkeypress="javascript:return isNumber(event)">
                       		    
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('common.Email')); ?></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('common.Email')); ?>" value="<?php echo e(old('email')); ?>">
                    </div>
                  </div>
                  <div class="col-md-2 col-6">
                     <div class="form-group">
                        <label style="color:red;"><?php echo e(__('common.Date Of  Birth')); ?>*</label>
                        <input type="date" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dob" name="dob" value="">
                        <?php $__errorArgs = ['dob'];
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
                  
                  <div class="col-md-2 col-6">
                     <div class="form-group">
                        <label style="color:red;"><?php echo e(__('common.Gender')); ?></label>
                        <select class="form-control <?php $__errorArgs = ['gender_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="gender_id" name="gender_id">
                           <option value=""><?php echo e(__('common.Select')); ?></option>
                           <?php if(!empty($getgenders)): ?> 
                           <?php $__currentLoopData = $getgenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('gender_id')) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </select>
                        <?php $__errorArgs = ['gender_id'];
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
                        <label style="color:red;"><?php echo e(__('staff.Father/Husband Name')); ?>*</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="father_name" name="father_name" placeholder="<?php echo e(__('staff.Father/Husband Name')); ?>" value="<?php echo e(old('father_name')); ?>">
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

                  <div class="col-md-2">
                     <div class="form-group">
                        <label style="color:red;"><?php echo e(__('staff.Employee Qualification')); ?>*</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="qualification" name="qualification" placeholder="<?php echo e(__('staff.Employee Qualification')); ?>" value="<?php echo e(old('qualification')); ?>">
                        <?php $__errorArgs = ['qualification'];
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
                  <div class="col-md-2 col-6">
                     <div class="form-group">
                        <label><?php echo e(__('staff.Date of Joining')); ?></label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="<?php echo e(date('Y-m-d')); ?>">
                    </div>
                  </div>
                  

                  <div class="col-md-2 col-6">
                     <div class="form-group">
                        <label><?php echo e(__('common.Class')); ?></label>
                        <select class="form-control" id="" name="class_type_id[]" multiple>
                           <option value=""><?php echo e(__('common.Select')); ?></option>
                           <?php if(!empty($getclassType)): ?> 
                           <?php $__currentLoopData = $getclassType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('class_type_id')) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </select>
                     </div>
                  </div>    
                  
                
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="color:red;"><?php echo e(__('staff.User Name')); ?>*</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['userName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="userName" name="userName" value="<?php echo e(old('userName')); ?>" placeholder="<?php echo e(__('staff.User Name')); ?>">
                                <?php $__errorArgs = ['userName'];
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
                                <label style="color:red;"><?php echo e(__('common.Password')); ?>*</label>
                                <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(__('common.Password')); ?>">
                                <?php $__errorArgs = ['password'];
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
                        <label><?php echo e(__('common.Address')); ?></label>
                        <textarea type="text" class="form-control " id="address" name="address" placeholder="<?php echo e(__('staff.Teacher Address')); ?>" ><?php echo e(old('address')); ?></textarea>
                     
                     </div>
                  </div>
                   <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('staff.Refer Name')); ?></label>
                        <input type="text" class="form-control" name="refer_name" id="refer_name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" placeholder="<?php echo e(__('staff.Refer Name')); ?>" value="<?php echo e(old('refer_name')); ?>">
                     </div> 
                  </div>
                  
                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('staff.Refer Mobile')); ?></label>
                        <input type="text" class="form-control" name="refer_mobile" id="refer_mobile" placeholder="<?php echo e(__('staff.Refer Mobile')); ?>" value="<?php echo e(old('refer_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
                     </div>
                  </div>
                
                     <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('staff.Refer Address')); ?></label>
                        <!--<input type="text" class="form-control" name="refer_address" id="refer_address" placeholder="<?php echo e(__('Refer Address')); ?>" value="<?php echo e(old('refer_address')); ?>">-->
                    <textarea type="text" class="form-control " id="refer_address" name="refer_address" placeholder="<?php echo e(__('staff.Refer Address')); ?>" ><?php echo e(old('refer_address')); ?></textarea>
                     </div>
                  </div>
                  </div>
                  <div class=" col-md-12 title">
                     <h5 style="color:red"><?php echo e(__('staff.Document Upload')); ?>:-</h5>
                  </div>
               <hr>
               <!-- document upload details  -->
               <div class="row m-2">
                  
                  <!--camera img capture-->
                 
                  <div class="row col md-12">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><?php echo e(__('common.Photo')); ?></label>
                           <input type="file" class="form-control " id="photo" name="photo" value="<?php echo e(old('photo')); ?>" accept="image/png, image/jpg, image/jpeg">
								            <p class="text-danger" id="photo_error"></p>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><?php echo e(__('staff.Id Proof')); ?></label>
                           <input type="file" class="form-control " id="id_proof" name="id_proof" value="<?php echo e(old('id_proof')); ?>" accept="image/png, image/jpg, image/jpeg">
								            <p class="text-danger" id="proof_error"></p>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><?php echo e(__('staff.Qualification Proof')); ?></label>
                           <input type="file" class="form-control " id="qualification_proof" name="qualification_proof" value="<?php echo e(old('qualification_proof')); ?>" accept="image/png, image/jpg, image/jpeg">
								            <p class="text-danger" id="qualification_errors"></p>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label><?php echo e(__('staff.Experience Letter')); ?></label>
                           <input type="file" class="form-control " id="experience_letter" name="experience_letter" value="<?php echo e(old('experience_letter')); ?>" accept="image/png, image/jpg, image/jpeg">
								            <p class="text-danger" id="letter_errors"></p>
                        </div>
                     </div>
                     <div class="col-md-3">
                     <div class="form-group">
                        <label><?php echo e(__('common.Pan Card No.')); ?></label>
                        <input type="text" class="form-control " id="pan_card" name="pan_card" placeholder="<?php echo e(__('common.Pan Card No.')); ?>" value="<?php echo e(old('pan_card')); ?>" maxlength="10">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label><?php echo e(__('common.Bank Name')); ?></label>
                        <input type="text" class="form-control " id="bank" name="bank" placeholder="<?php echo e(__('common.Bank Name')); ?>" value="<?php echo e(old('bank')); ?>">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('common.Bank Account No.')); ?></label>
                        <input type="text" class="form-control " id="account_no" name="account_no" placeholder="<?php echo e(__('common.Bank Account No.')); ?>" value="<?php echo e(old('account_no')); ?>" maxlength="18">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('common.Bank IFSC Code')); ?></label>
                        <input type="text" class="form-control " id="ifsc_code" name="ifsc_code" placeholder="<?php echo e(__('common.Bank IFSC Code')); ?>" value="<?php echo e(old('ifsc_code')); ?>" maxlength="11">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('common.Salary')); ?></label>
                        <input type="text" class="form-control " id="salary" name="salary" placeholder="<?php echo e(__('common.Salary')); ?>" value="<?php echo e(old('salary')); ?>" onkeypress="javascript:return isNumber(event)">
                     </div>
                  </div>
                  </div>
               </div>
               <hr>
               <!-- leave details  -->
               <div class="row m-2 d-none">
                  <div class=" col-md-12 title">
                     <h5 style="color:red"><?php echo e(__('staff.Leave Details')); ?>:-</h5>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('staff.Medical Leave')); ?></label>
                        <input type="text" class="form-control " id="medical_leave" name="medical_leave" placeholder="<?php echo e(__('staff.Medical Leave')); ?>" value="<?php echo e(old('medical_leave')); ?>" onkeypress="javascript:return isNumber(event)">
                     </div>
                  </div>                  
                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('staff.Casual Leave')); ?></label>
                        <input type="text" class="form-control " id="casual_leave" name="casual_leave" placeholder="<?php echo e(__('staff.Casual Leave')); ?>" value="<?php echo e(old('casual_leave')); ?>" onkeypress="javascript:return isNumber(event)">
                     </div>
                  </div>

                  <div class="col-md-2">
                     <div class="form-group">
                        <label><?php echo e(__('staff.Other Leave')); ?></label>
                        <input type="text" class="form-control " id="other_leave" name="other_leave" placeholder="<?php echo e(__('staff.Other Leave')); ?>" value="<?php echo e(old('other_leave')); ?>" onkeypress="javascript:return isNumber(event)">
                     </div>
                  </div>
               </div>


               <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary "><?php echo e(__('common.submit')); ?></button><br><br>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#photo').change(function(e){
            $('#photo_error').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#photo_error').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#photo_error').html("");
            }
        }else{
            $('#photo_error').html("Image Size File");
            $(this).val('');
        }
        });
    });
   

    $(document).ready(function(){
        $('#id_proof').change(function(e){
            $('#proof_error').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#proof_error').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#proof_error').html("");
            }
        }else{
            $('#proof_error').html("Image Size File");
            $(this).val('');
        }
        });
    });
   

    $(document).ready(function(){
        $('#qualification_proof').change(function(e){
            $('#qualification_errors').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#qualification_errors').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#qualification_errors').html("");
            }
        }else{
            $('#qualification_errors').html("Image Size File");
            $(this).val('');
        }
        });
    });
    $(document).ready(function(){
        $('#experience_letter').change(function(e){
            $('#letter_errors').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#letter_errors').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#letter_errors').html("");
            }
        }else{
            $('#letter_errors').html("Image Size File");
            $(this).val('');
        }
        });
    });
   
</script>
<style>
    #photo_error{
        font-weight: bold;
    font-size: 14px;
    }
    #letter_errors{
        font-weight: bold;
    font-size: 14px;
    }
    #qualification_errors{
        font-weight: bold;
    font-size: 14px;
    }
    #proof_error{
        font-weight: bold;
    font-size: 14px;
    }
   
   
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/staff/add_teachers/add.blade.php ENDPATH**/ ?>