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
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-user"></i> &nbsp;<?php echo e(__('Add Event Certificate ')); ?></h3>
							<div class="card-tools"><a href="<?php echo e(url('evente/certificate/index')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?>  </a>
							     <a href="<?php echo e(url('certificate_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a> </div>
						</div>


                    <form id="quickForm" action="#" method="post" >
                        <?php echo csrf_field(); ?> 
            <div class="row m-2">
                                 <div class="col-md-2">
                      <div class="form-group">
                        <label for="State" class="required"><?php echo e(__('certificate.Admission No.')); ?></label>
                         <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="Admission No." value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                      </div>
                    </div>
             <div class="col-md-2">
            		<div class="form-group">
            			<label><?php echo e(__('common.Class')); ?></label>
            			<select class="select2  form-control" id="class_type_id" name="class_type_id" >
            			<option value=""><?php echo e(__('common.Select')); ?></option>
                         <?php if(!empty($classType)): ?> 
                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
            	    </div>
            	</div>
            	<!--<div class="col-md-2" >-->
             <!--       <div class="form-group">-->
             <!--        <label><?php echo e(__('master.Country')); ?></label>-->
             <!--         <select class="select2  form-control select2" name="country_id" id="country_id" >-->
             <!--             <option value="">Select</option>-->
             <!--             <?php if(!empty($getCountry)): ?> -->
             <!--                 <?php $__currentLoopData = $getCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
             <!--                    <option value="<?php echo e($country->id ?? ''); ?>" <?php echo e(($country->id == Session::get('countries_id')) ? 'selected' : ''); ?>><?php echo e($country->name ?? ''); ?></option>-->
             <!--                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
             <!--             <?php endif; ?>-->
             <!--         </select>-->
             <!--         </div>-->
             <!--   </div>-->
            	<!--<div class="col-md-2">-->
            	<!--	<div class="form-group"> -->
            	<!--		<label for="State" class="required"><?php echo e(__('master.State')); ?></label>-->
            	<!--		<select class="select2  form-control" id="state_id" name="state_id" >-->
             <!--           <option value="">Select</option>-->
             <!--       <?php if(!empty($getState)): ?> -->
             <!--             <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
             <!--                <option value="<?php echo e($state->id ?? ''); ?>" <?php echo e(($state->id == Session::get('state_id')) ? 'selected' : ''); ?>><?php echo e($state->name ?? ''); ?></option>-->
             <!--             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
             <!--       <?php endif; ?>-->
                      
             <!--           </select>-->
            		
            	<!--	</div>-->
            	<!--</div>-->
            	<!--<div class="col-md-2">-->
            	<!--    <div class="form-group">-->
            	<!--        <label for="City"><?php echo e(__('master.City')); ?></label>-->
            	<!--        <select class="select2  form-control" name="city_id" id="city_id" >-->
            	<!--        <option value="">Select</option>      -->
            	<!--            <?php if(!empty($getCity)): ?> -->
             <!--             <?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
             <!--                <option value="<?php echo e($cities->id ?? ''); ?>" <?php echo e(($state->id == Session::get('state_id')) ? 'selected' : ''); ?>><?php echo e($cities->name ?? ''); ?></option>-->
             <!--             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
             <!--         <?php endif; ?>-->
            	<!--		</select>-->
            	<!--    </div>-->
            	<!--</div>-->
                <div class="col-md-1 ">
                     <label for="">&nbsp;</label><br>
            	    <button type="button" class="btn btn-primary "onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
            	</div>
            			
            </div>
        </form>
    	    </form>
				</div>
			</div>
		</div>
	
        <div class="evente_list_show"></div>
        <div class="card m-2">
            <div class="card-body">
               <form id="quickForm" action="<?php echo e(url('evente/certificate/add')); ?>" method="post" >
                     <?php echo csrf_field(); ?>
                <div class="row">
	                    <input type="hidden" name="class_type_id" id="class_type_id1" class="form-control"  value="<?php echo e(old('event_type')); ?>">
	                    <input type="hidden" name="father_mobile" id="father_mobile" class="form-control ">

	                    
	                    
                    <div class="col-md-2">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('certificate.Admission No.')); ?>*</label>
				<input type="text" name="registration_no" id="registration_no"  class="form-control" placeholder="Admission No" readonly="readonly" value="<?php echo e(old('registration_no')); ?>">
				<input type="hidden" name="admission_id" id="admission_id"  >
		    </div>
		</div>
                    <div class="col-md-3">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('certificate.Student Name')); ?> *</label>
				<input type="text" name="name" id="first_name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" onkeydown="return /[a-zA-Z ]/i.test(event.key)" placeholder="<?php echo e(__('certificate.Student Name')); ?>"  value="<?php echo e(old('name')); ?>">
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
                    <div class="col-md-3">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('common.Fathers Name')); ?>*</label>
				<input type="text" name="father_name" id="father_name" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" onkeydown="return /[a-zA-Z ]/i.test(event.key)" placeholder="<?php echo e(__('common.Fathers Name')); ?>"  value="<?php echo e(old('father_name')); ?>">
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
				<label style="color:red;"><?php echo e(__('Held On')); ?> *</label>
				<input type="date" name="organized_date" id="organized_date" class="form-control <?php $__errorArgs = ['organized_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  value="<?php echo e(old('organized_date')); ?>">
                	<?php $__errorArgs = ['organized_date'];
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
				<label><?php echo e(__('certificate.Event Type')); ?> </label>
				<input type="text" name="event_type" id="event_type" class="form-control <?php $__errorArgs = ['event_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Event Type')); ?>"  value="<?php echo e(old('event_type')); ?>">
                	<?php $__errorArgs = ['event_type'];
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
             
     <!--   <div class="col-md-3">
			<div class="form-group">
				<label><?php echo e(__('certificate.Rank')); ?> </label>
				<input type="text" name="rank" id="rank" class="form-control <?php $__errorArgs = ['rank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Rank')); ?>"  value="<?php echo e(old('rank')); ?>">
                	<?php $__errorArgs = ['rank'];
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
		</div>-->
		
	
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><?php echo e(__('common.submit')); ?></button>
            </div>
        </div>
        </form>
    </div>
</div>
</section>
</div>
    </section>
    </div>
<script>
        function SearchValue() {
            var class_type_id = $('#class_type_id :selected').val();
            var admission_id = $('#admission_id :selected').val();
            var country_id = $('#country_id :selected').val();
            var state_id = $('#state_id :selected').val();
            var city_id = $('#city_id :selected').val();
            var admissionNo = $('#admissionNo').val();
            $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                type:'post',
                url: '/search_evente',
                data: {class_type_id:class_type_id,country_id:country_id,state_id:state_id,city_id:city_id,admissionNo:admissionNo},
                 //dataType: 'json',
                success: function (data) {
                    $('.evente_list_show').html(data);
                   
                }
              });
        };
    
         function showData(student_id) {
            alert("hello");
            $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                type:'post',
                url: '/evente_add_click',
                data: {student_id : student_id},
                 dataType: 'json',
                success: function (data) {
                 alert(data);
                 if(data){
                $('#name').val(data.name);
                $('#organized_date').val(data.dob);
                $('#student_roll_no').val(data.roll_no);
                }else{
                     alert('No more records found');
                 }
                    
                }
              });
        };  

        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/evente_certificate/add.blade.php ENDPATH**/ ?>