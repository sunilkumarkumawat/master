<?php
$getTypeclass = Helper::classType();
$getCountry = Helper::getCountry();
$getState = Helper::getState();
$getCity = Helper::getCity();
$getgenders = Helper::getgender();

?>
 
<?php $__env->startSection('content'); ?>
   
<div class="content-wrapper">
    
   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">    
    <div class="card card-outline card-orange">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;<?php echo e(__('student.Students Enquiry')); ?> </h3>
            <div class="card-tools">
            <a href="<?php echo e(url('enquiryView')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?></a>
            <a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
            </div>
            
            </div>        
        <form id="quickForm" action="<?php echo e(url('enquiryAdd')); ?>" method="post" enctype="multipart/form-data">   
         <?php echo csrf_field(); ?>
 
    <div class="row m-2">
		<div class="col-md-2">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('student.Registration No')); ?>*</label>
				<input type="text" class="form-control <?php $__errorArgs = ['registration_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="registration_no" name="registration_no" placeholder="<?php echo e(__('student.Registration No')); ?>" readonly value="<?php echo e(($BillCounter->counter + 1) ?? ''); ?>">
		        <?php $__errorArgs = ['registration_no'];
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
				<label style="color:red;"><?php echo e(__('common.First Name')); ?>*</label>
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
				<label style="color:red;"><?php echo e(__('common.Last Name')); ?>*</label>
				<input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="last_name" name="last_name" placeholder="<?php echo e(__('common.Last Name')); ?>" value="<?php echo e(old('first_name')); ?>">
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
				<label style="color:red;"><?php echo e(__('student.Student Mobile No.')); ?>*</label>
				<input type="text" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mobile" name="mobile" placeholder="<?php echo e(__('student.Student Mobile No.')); ?>" value="<?php echo e(old('mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
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
                  <label style="color:red;"><?php echo e(__('common.Gender')); ?>*</label>
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
				<label>DOB</label>
				<input type="date" class="form-control" id="dob" name="dob" placeholder=" Date Of  Birth" value="<?php echo e(old('dob')); ?>">
		    </div>
		  </div>
		  
		  
	    <div class="col-md-2">
	    	<div class="form-group">
				<label style="color:red;"><?php echo e(__('common.Fathers Name')); ?>*</label>
				<input type="text" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="father_name" name="father_name" placeholder="<?php echo e(__('common.Fathers Name')); ?>" value="<?php echo e(old('father_name')); ?>">
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
				<label style="color:red;"><?php echo e(__('common.Mothers Name')); ?>*</label>
				<input type="text" class="form-control <?php $__errorArgs = ['mother_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="mother_name" name="mother_name" placeholder="<?php echo e(__('common.Mothers Name')); ?>" value="<?php echo e(old('mother_name')); ?>">
				 <?php $__errorArgs = ['mother_name'];
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
			    <label><?php echo e(__('common.Fathers Contact No')); ?></label>
			    <input type="tel" class="form-control" id="father_mobile" name="father_mobile" placeholder="<?php echo e(__('common.Fathers Contact No')); ?>" value="<?php echo e(old('father_mobile')); ?>" maxlength="10" minlength="10" onkeypress="javascript:return isNumber(event)">
	        </div>
	    </div>

	    <div class="col-md-2">
			<div class="form-group">
				<label><?php echo e(__('common.Class')); ?></label>
				<select class="select2 form-control" id="class_type_id" name="class_type_id">
				   <option value=""><?php echo e(__('common.Select')); ?></option>
                 <?php if(!empty($getTypeclass)): ?> 
                      <?php $__currentLoopData = $getTypeclass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == old('class_type_id')) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
		    </div>
		</div>

		<div class="col-md-2">
	    	<div class="form-group">
				<label><?php echo e(__('common.E-Mail')); ?></label>
				<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo e(__('common.E-Mail')); ?>" value="<?php echo e(old('email')); ?>">
		    </div>
		</div>
		
		<div class="col-md-2">
			<div class="form-group">
				<label for="City" >Select ID Proof</label>
				<select class="form-control select2" id="id_proof" name="id_proof" autocomplete="off">
                    <option value="">Select ID Proof</option>
                    <option value="Aadhar Card">Aadhar Card</option>
                    <option value="Voter ID Card">Voter ID Card</option>
                    <option value="Driving License">Driving License</option>
                    <option value="PAN Card">PAN Card</option>
                </select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label for="id_number">ID Number</label>
				<div class="input-group">
				    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-credit-card"></i>
                        </span>
                    </div>
			        <input class="form-control" name="id_number" id="id_number" placeholder="ID Number">
				</div>
			</div>
		</div>
		
<!--
		<div class="col-md-2" >
            <label> <?php echo e(__('common.Country')); ?> </label>
            <select class="form-control select2" name="country_id" id="country_id">
                <option value=""><?php echo e(__('common.Select')); ?></option>
              <?php if(!empty($getCountry)): ?> 
                  <?php $__currentLoopData = $getCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($country->id ?? ''); ?>" ><?php echo e($country->name ?? ''); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>
        </div>
        <div class="col-md-2">
			<label for="State"><?php echo e(__('common.State')); ?> </label>
			<select class="form-control select2" id="state_id" name="state_id">
                <option value=""><?php echo e(__('common.Select')); ?></option>
            </select>
        </div>
        <div class="col-md-2">
	        <label for="City"><?php echo e(__('common.City')); ?> </label>
	        <select class="form-control select2" name="city_id" id="city_id">
                <option value=""><?php echo e(__('common.Select')); ?></option>
			</select>
        </div>-->

	    <div class="col-md-2">
	    	<div class="form-group">
				<label><?php echo e(__('student.Remark')); ?></label>
				<input type="text" class="form-control" id="remark_1" name="remark_1" placeholder="<?php echo e(__('student.Remark')); ?>" value="<?php echo e(old('remark_1')); ?>">
			</div>
		</div>

		 <div class="col-md-12">
	    	<div class="form-group">
				<label><?php echo e(__('student.Students Address')); ?></label>
				
			
				 <textarea class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address"  placeholder="<?php echo e(__('student.Students Address')); ?>" rows="4" cols="50"  value=""><?php echo e(old('address')); ?> </textarea>
				<?php $__errorArgs = ['address'];
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
        <div class="col-md-12 text-center pb-2">
            <button type="submit" class="btn btn-primary "><?php echo e(__('common.submit')); ?></button>
           <!-- <a href="https://wa.me/?text= hello this  msg is for testing purpose">Whatsapp testing</a>-->

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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })

</script>
<?php $__env->stopSection(); ?>    
    
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/enquiry/add.blade.php ENDPATH**/ ?>