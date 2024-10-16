<?php
   $getstudents = Helper::getstudents();
   $classType = Helper::classType();
   $getState = Helper::getState();
   $getCity = Helper::getCity();
   $getCountry = Helper::getCountry();
?>

 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-certificate"></i> &nbsp;<?php echo e(__('certificate.Add Tc Certificate')); ?> </h3>
							<div class="card-tools"><a href="<?php echo e(url('tc/certificate/index')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?>  </a>
							     <a href="<?php echo e(url('certificate_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a> </div>
						</div>

                    <form id="quickForm" action="#" method="post" >
                        <?php echo csrf_field(); ?> 
            <div class="row m-2">
                <div class="col-md-2">
            		<div class="form-group">
            		    <div class="form-group">
                        <label for="State" class="required"><?php echo e(__('certificate.Admission No.')); ?></label>
                         <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('certificate.Admission No.')); ?>" value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                      </div>
            	    </div>
            	</div>
                <div class="col-md-2">
            		<div class="form-group">
            			<label><?php echo e(__('common.Class')); ?></label>
            			<select class="select2 form-control" id="class_type_id" name="class_type_id" >
            			<option value=""><?php echo e(__('common.Select')); ?></option>
                         <?php if(!empty($classType)): ?> 
                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
            	    </div>
            	</div>
            	<!--<div class="col-md-3" >-->
             <!--       <div class="form-group">-->
             <!--        <label><?php echo e(__('master.Country')); ?></label>-->
             <!--         <select class="select2 form-control select2" name="country_id" id="country_id" >-->
             <!--             <option value=""><?php echo e(__('master.Select')); ?></option>-->
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
            	<!--		<select class="select2 form-control" id="state_id" name="state_id" >-->
             <!--           <option value=""><?php echo e(__('master.Select')); ?></option>-->
             <!--       <?php if(!empty($getState)): ?> -->
             <!--             <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
             <!--                <option value="<?php echo e($state->id ?? ''); ?>"><?php echo e($state->name ?? ''); ?></option>-->
             <!--             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
             <!--       <?php endif; ?>-->
                      
             <!--           </select>-->
            		
            	<!--	</div>-->
            	<!--</div>-->
            	<!--<div class="col-md-2">-->
            	<!--    <div class="form-group">-->
            	<!--        <label for="City"><?php echo e(__('master.City')); ?></label>-->
            	<!--        <select class="select2 form-control" name="city_id" id="city_id" >-->
            	<!--        <option value=""><?php echo e(__('master.Select')); ?></option>      -->
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
            	    <button type="button" class="btn btn-primary" onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
            	</div>
            			
            </div>
        </form>
   </div>
</div> 
</div>
</div>
<div class="tc_list_show"></div>
        <div class="card">
            <div class="card-body">
                <form id="quickForm" action="<?php echo e(url('tc/certificate/add')); ?>" method="post" >
                     <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-3">
			<div class="form-group">
				<label style="color:red;"><?php echo e(__('certificate.Admission No.')); ?>*</label>
				<input type="text" name="admission_id" id="admission_id"  class="form-control" placeholder="<?php echo e(__('certificate.Admission No.')); ?>" readonly="readonly" value="<?php echo e(old('admission_id')); ?>">
		    </div>
		</div>
                <div class="col-md-3">
        			<div class="form-group">
        				<label style="color:red;"><?php echo e(__('certificate.Student Name')); ?> *</label>
        				<input type="text" name="name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="first_name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" placeholder=" <?php echo e(__('certificate.Student Name')); ?>" value="<?php echo e(old('name')); ?>">
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
            				<label style="color:red;"><?php echo e(__('common.Class')); ?> *</label>
            				
            				<select class="form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" id="class_type_id1" name="class_type_id">
            				   
                             <?php if(!empty($classType)): ?> 
                                  <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>
                             <?php $__errorArgs = ['class_type_id'];
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
            				<label style="color:red;"><?php echo e(__('certificate.examination last taken with result.')); ?> *</label>
            				<div class="flex_Inputes">
                				<div class="d-flex">
                    				<p><?php echo e(__('certificate.Yes')); ?></p>
                    				<input type="radio" name="taken_result" id="taken_result" <?php echo e(("yes" == old('taken_result') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['taken_result'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="yes" >
                    				</div>
                    			<div class="d-flex ml-3">
                    				<p><?php echo e(__('certificate.No')); ?></p>
                    				<input type="radio" name="taken_result" id="taken_result" <?php echo e(("no" == old('taken_result') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['taken_result'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="no" >
                                </div>	
                            </div>	
                            	<?php $__errorArgs = ['taken_result'];
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
            				<label style="color:red;"><?php echo e(__('common.Fathers Name')); ?> *</label>
            				<input type="text" name="father_name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="father_name" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" placeholder="<?php echo e(__('common.Fathers Name')); ?>" value="<?php echo e(old('father_name')); ?>">
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
            				<label style="color:red;"><?php echo e(__('common.Fathers Mobile')); ?>*</label>
            				<input type="text" name="father_mobile" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="father_mobile" class="form-control <?php $__errorArgs = ['father_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" placeholder="<?php echo e(__('common.Fathers Mobile')); ?>" value="<?php echo e(old('father_mobile')); ?>">
                            	<?php $__errorArgs = ['father_mobile'];
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
            				<label style="color:red;"><?php echo e(__('common.Mothers Name')); ?> *</label>
            				<input type="text" name="mother_name" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="mother_name1" class="form-control <?php $__errorArgs = ['mother_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly="readonly" placeholder="<?php echo e(__('common.Mothers Name')); ?>" value="<?php echo e(old('mother_name')); ?>">
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
           
                    <div class="col-md-3">
            			<div class="form-group">
            				<label style="color:red;"><?php echo e(__('common.Date Of  Birth')); ?> *</label>
            				<input type="date" name="dob" id="dob1" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('dob')); ?>">
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
            	<!--	<div class="col-md-3">
            			<div class="form-group">
            				<label style="color:red;"><?php echo e(__('master.Student s Admission No.')); ?> *</label>
            				<input type="text" name="students_admission_no" id="admission_no1" class="form-control <?php $__errorArgs = ['students_admission_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=" <?php echo e(__('master.Student s Admission No.')); ?>" value="<?php echo e(old('students_admission_no')); ?>" onkeypress="javascript:return isNumber(event)">
                            	<?php $__errorArgs = ['students_admission_no'];
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
            		<div class="col-md-3">
            			<div class="form-group">
            				<label style="color:red;"><?php echo e(__('certificate.Admission Date')); ?> *</label>
            				<input type="date" name="admission_date" id="admission_date1" class="form-control <?php $__errorArgs = ['admission_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('admission_date')); ?>">
                            	<?php $__errorArgs = ['admission_date'];
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
            				<label style="color:red;"><?php echo e(__('certificate.Issue Date')); ?> *</label>
            				<input type="date" name="issue_date" id="issue_date" class="form-control <?php $__errorArgs = ['issue_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(date('Y-m-d')); ?>">
                            	<?php $__errorArgs = ['issue_date'];
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
            				<label><?php echo e(__('certificate.Pass')); ?> </label>
            				<div class="flex_Inputes">
                				<div class="d-flex">
                    				<p><?php echo e(__('certificate.Yes')); ?></p>
                    				<input type="radio" name="fail_pass" id="fail_pass" <?php echo e(("yes" == old('fail_pass') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['fail_pass'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="yes" >
                    				</div>
                    			<div class="d-flex ml-3">
                    				<p><?php echo e(__('certificate.No')); ?></p>
                    				<input type="radio" name="fail_pass" id="fail_pass" <?php echo e(("no" == old('fail_pass') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['fail_pass'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="no" >
                                </div>	
                            </div>
                            	<?php $__errorArgs = ['fail_pass'];
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
            				<label><?php echo e(__('certificate.Studied.')); ?> </label>
            				<div class="flex_Inputes">
                				<div class="d-flex">
                    				<p><?php echo e(__('certificate.Yes')); ?></p>
                    				<input type="radio" name="subjects_studied" id="subjects_studied" <?php echo e(("yes" == old('subjects_studied') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['subjects_studied'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="yes" >
                    				</div>
                    			<div class="d-flex ml-3">
                    				<p><?php echo e(__('certificate.No')); ?></p>
                    				<input type="radio" name="subjects_studied" id="subjects_studied" <?php echo e(("no" == old('subjects_studied') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['subjects_studied'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="no" >
                                </div>	
                            </div>
                            	<?php $__errorArgs = ['subjects_studied'];
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
            				<label><?php echo e(__('certificate.Promotion to Higher Class.')); ?> </label>
            				<div class="flex_Inputes">
                				<div class="d-flex">
                    				<p><?php echo e(__('certificate.Yes')); ?></p>
                    				<input type="radio" name="higher_class" id="higher_class" <?php echo e(("yes" == old('higher_class') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['higher_class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="yes" >
                    				</div>
                    			<div class="d-flex ml-3">
                    				<p><?php echo e(__('certificate.No')); ?></p>
                    				<input type="radio" name="higher_class" id="higher_class" <?php echo e(("no" == old('higher_class') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['higher_class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="no" >
                                </div>	
                            </div>
                            	<?php $__errorArgs = ['higher_class'];
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
            				<label><?php echo e(__('certificate.Paid School Dues.')); ?> </label>
            				<div class="flex_Inputes">
                				<div class="d-flex">
                    				<p><?php echo e(__('certificate.Yes')); ?></p>
                    				<input type="radio" name="paid_school_dues" id="paid_school_dues" <?php echo e(("yes" == old('paid_school_dues') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['paid_school_dues'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="yes" >
                    				</div>
                    			<div class="d-flex ml-3">
                    				<p><?php echo e(__('certificate.No')); ?></p>
                    				<input type="radio" name="paid_school_dues" id="paid_school_dues" <?php echo e(("no" == old('paid_school_dues') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['paid_school_dues'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="no" >
                                </div>	
                            </div>
                            	<?php $__errorArgs = ['paid_school_dues'];
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
            				<label><?php echo e(__('certificate.Have you got any scholarship.')); ?> </label>
            				<div class="flex_Inputes">
                				<div class="d-flex">
                    				<p><?php echo e(__('certificate.Yes')); ?></p>
                    				<input type="radio" name="any_scholarship" id="any_scholarship" <?php echo e(("yes" == old('any_scholarship') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['any_scholarship'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="yes" >
                    				</div>
                    			<div class="d-flex ml-3">
                    				<p><?php echo e(__('certificate.No')); ?></p>
                    				<input type="radio" name="any_scholarship" id="any_scholarship" <?php echo e(("no" == old('any_scholarship') ) ? 'checked' : ''); ?> class="form-control <?php $__errorArgs = ['any_scholarship'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> radio_input_size" value="no" >
                                </div>	
                            </div>
                            	<?php $__errorArgs = ['any_scholarship'];
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
            				<label><?php echo e(__('certificate.Have You any Type Sports Certificate.')); ?> </label>
            				<input type="text" name="sports_certificate" id="sports_certificate" class="form-control <?php $__errorArgs = ['sports_certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Cricket/Kabaddi/Yes /No.')); ?>" value="<?php echo e(old('sports_certificate')); ?>">
                            	<?php $__errorArgs = ['sports_certificate'];
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
            				<label><?php echo e(__('certificate.SSSM ID No.')); ?> </label>
            				<input type="text" name="sssm_id_no" id="sssm_id_no" class="form-control <?php $__errorArgs = ['sssm_id_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.SSSM ID No.')); ?>" value="<?php echo e(old('student_id')); ?>" onkeypress="javascript:return isNumber(event)">
                            	<?php $__errorArgs = ['sssm_id_no'];
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
            				<label><?php echo e(__('certificate.What is Behavior.')); ?> </label>
            				<input type="text" name="behavior" id="behavior" class="form-control <?php $__errorArgs = ['behavior'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.What is Behavior.')); ?>" value="<?php echo e(old('behavior')); ?>" >
                            	<?php $__errorArgs = ['behavior'];
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
            				<label><?php echo e(__('certificate.Student UID No.')); ?></label>
            				<input type="text" name="student_uid_no" id="student_uid_no" class="form-control <?php $__errorArgs = ['student_uid_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Student UID No.')); ?>" value="" onkeypress="javascript:return isNumber(event)">
                            	<?php $__errorArgs = ['student_uid_no'];
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
            		
            	
            	
            	<!--	<div class="col-md-3">
            			<div class="form-group">
            				<label><?php echo e(__('master.Class In Which Leaving')); ?> </label>
            				<input type="text" name="which_leaving" id="which_leaving" class="form-control <?php $__errorArgs = ['which_leaving'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('master.Class In Which Leaving')); ?>" value="<?php echo e(old('which_leaving')); ?>">
                            	<?php $__errorArgs = ['which_leaving'];
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
            
                    <div class="col-md-3">
            			<div class="form-group">
            				<label><?php echo e(__('certificate.Due If Any')); ?> </label>
            				<input type="text" name="due_any" id="due_any" class="form-control <?php $__errorArgs = ['due_any'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Due If Any')); ?>" value="<?php echo e(old('due_any')); ?>">
                            	<?php $__errorArgs = ['due_any'];
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
            				<label><?php echo e(__('certificate.Medium')); ?></label>
            				<input type="text" name="mudium" id="mudium" class="form-control <?php $__errorArgs = ['mudium'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Medium')); ?>" value="<?php echo e(old('mudium')); ?>">
                            	<?php $__errorArgs = ['mudium'];
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
            				<label><?php echo e(__('certificate.Reasons for leaving the school')); ?></label>
            				<input type="text" name="reasons_leaving" id="reasons_leaving" class="form-control <?php $__errorArgs = ['reasons_leaving'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Reasons for leaving the school')); ?>" value="<?php echo e(old('reasons_leaving')); ?>">
                            	<?php $__errorArgs = ['reasons_leaving'];
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
            				<label><?php echo e(__('certificate.Any other remarks')); ?></label>
            				<input type="text" name="any_remark" id="any_remark" class="form-control <?php $__errorArgs = ['any_remark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('certificate.Any other remarks')); ?>" value="<?php echo e(old('any_remark')); ?>">
                            	<?php $__errorArgs = ['any_remark'];
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
                    </div>
                    <div class="row m-2">
                        <div class="col-md-12 text-center">
                         <button type="submit" class="btn btn-primary"><?php echo e(__('common.Submit')); ?></button>
                        </div>
                    </div>
            </form>
        </div>
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
                url: '/search_tc',
                data: {class_type_id:class_type_id,country_id:country_id,state_id:state_id,city_id:city_id,admissionNo:admissionNo},
                 //dataType: 'json',
                success: function (data) {
                   
                  
                    $('.tc_list_show').html(data);
                   
                }
              });
        };
    
         function showData(student_id) {
           
            $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                type:'post',
                url: '/tc_add_click',
                data: {student_id : student_id},
                 dataType: 'json',
                success: function (data) {
                     
                     console.log(data);
                 if(data){
                     
                $('#name').val(data.name);
                $('#class_id').val(data.class_type_id);
                $('#father_name').val(data.father_name);
                $('#iessu_date').val(data.iessu_date);
                $('#mother_name').val(data.mother_name);
                $('#dob').val(data.dob);
                $('#students_adnission_no').val(data.students_adni_no);
                $('#admission_date').val(data.dob);
                $('#subject').val(data.subject);
                 $('#student_uid_no').val(data.regUniqueId);
                 }else{
                     alert('No more records found');
                 }
                    
                }
              });
        };    
        </script>
        
        <style>
            .flex_Inputes{
                display: flex;
            }
            
             .radio_input_size{
                width: 20px;
                margin-left: 10px;
            }
        </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/tc_certificate/add.blade.php ENDPATH**/ ?>