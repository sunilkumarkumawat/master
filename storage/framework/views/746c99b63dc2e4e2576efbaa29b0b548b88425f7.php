<?php
$getstudents = Helper::getstudents();
$getgenders = Helper::getgender();
$classType = Helper::classType();
$getState = Helper::getState();
$getCity = Helper::getCity();
$getCountry = Helper::getCountry();
$getSetting = Helper::getSetting();
$bloodGroupType = Helper::bloodGroupType();
?>


<?php
    $studentCount = DB::table('admissions')->where('deleted_at',null)->count();
?>
						
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="content-wrapper">

<div class="header">
          <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting->left_logo); ?>" width='40px' alt="Company Logo">
        <a href="<?php echo e(url('logout')); ?>"><button class='btn btn-danger'>&larr;Back</button></a>
    </div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
						<form id="quickForm_addmission" action="<?php echo e(url('newStudentRegistration')); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="row m-2">
								<div class=" col-md-12 title mt-n3">
							
									<h5 class="text-danger"><?php echo e(__('student.Personal Details')); ?>:-</h5>
								</div>
						        <!--<div class="col-md-2">
									<input type="hidden" class="form-control" id="reg_id" name="registration_id" placeholder="<?php echo e(__('student.Registration No')); ?>" value="">
									<div class="form-group">
										<label><?php echo e(__('student.Admission No.')); ?></label>
										<input type="text" class="form-control" id="admission_no" name="admissionNo" placeholder="<?php echo e(__('student.Admission No.')); ?>"  
										value=""
										onkeypress="javascript:return isNumber(event)">	
										<input type="text" class="form-control invalid" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('student.Admission No.')); ?>" value="" onkeypress="javascript:return isNumber(event)">
										<span class="invalid-feedback" id="admissionNo_invalid" role="alert">
                                            <strong>The Admission No field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Ledger No')); ?><span style=""></span></label>
										<input type="text" class="form-control " name="ledger_no" placeholder="<?php echo e(__('Ledger No')); ?>"  >
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('SRN')); ?></label>
										<input type="text" class="form-control" id="srn" name="srn" placeholder="<?php echo e(__('SRN')); ?>" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Family ID')); ?></label>
										<input type="text" class="form-control" id="family_id" name="family_id" placeholder="<?php echo e(__('Family ID')); ?>" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>-->
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Student Name')); ?><span style="color:red;">*</span></label>
										<input type="text" name="first_name" id="first_name" class="form-control invalid " value="<?php echo e(old('first_name')); ?>" placeholder="<?php echo e(__('Student Name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										<span class="invalid-feedback" id="first_name_invalid" role="alert">
                                            <strong>The Student Name field is required</strong>
                                        </span>
									</div>
								</div>
							<!--<div class="col-md-2">
                    	    	<div class="form-group">
                    				<label><?php echo e(__('common.Last Name')); ?></label>
                    				<input type="text" class="form-control" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="last_name" name="last_name" placeholder="<?php echo e(__('common.Last Name')); ?>" value="<?php echo e(old('last_name')); ?>">
                    		    </div>
                    		</div>-->
							
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Aadhaar No.')); ?></label>
										<input type="text" class="form-control " id="aadhaar" name="aadhaar" placeholder=" <?php echo e(__('common.Aadhaar No.')); ?>" value="<?php echo e(old('aadhaar')); ?>" maxlength="12" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Gender')); ?><span style="color:red;">*</span></label>
										<select class="form-control invalid" id="gender_id" name="gender_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getgenders)): ?>
											<?php $__currentLoopData = $getgenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('gender_id')) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										<span class="invalid-feedback" id="gender_id_invalid" role="alert">
                                            <strong>The gender field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Date Of  Birth')); ?><span style="color:red;">*</span></label>
										<input type="date" class="form-control invalid" id="dob" name="dob" placeholder=" Date Of  Birth" value="<?php echo e(old('dob')); ?>">
										<span class="invalid-feedback" id="dob_invalid" role="alert">
                                            <strong>The dob field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Mobile No.')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control " id="mobile" name="mobile" placeholder="<?php echo e(__('common.Mobile No.')); ?>" value="<?php echo e(old('mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
				                        <div id="mobileValidationMessage" style="color: red; display: none; font-size:13px;">must be at least 10 characters</div>


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
										<label><?php echo e(__('common.Class')); ?><span style="color:red;">*</span></label>

										<select class="form-control invalid" id="class_type_id" name="class_type_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($classType)): ?>
											<?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($type->id ?? ''); ?>" data-orderBy="<?php echo e($type->orderBy ?? ''); ?>" <?php echo e(($type->id == old('class_type_id')) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
										<span class="invalid-feedback" id="class_type_id_invalid" role="alert">
                                            <strong>The Class field is required</strong>
                                        </span>
									</div>
								</div>
								
								
							<!--	<div class="col-md-2" id="stream_subject_div" style="display:none;">
									<div class="form-group">
										<label>Stream Subject<span style="color:red;">*</span></label>

										<select class="form-control select2" multiple id="stream_subject" name="stream_subject[]">
											<option value=""><?php echo e(__('common.Select')); ?></option>
										</select>
									</div>
								</div>-->
                                <div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Admission Type')); ?><span style="color:red;">*</span></label>
										<select class="form-control invalid" id="admission_type_id" name="admission_type_id">
											<!--<option value=""><?php echo e(__('common.Select')); ?></option>-->
											<option value="1" <?php echo e((1 == old('admission_type_id')) ? 'selected' : 'selected'); ?>>Non RTE</option>
											<option value="2" <?php echo e((2 == old('admission_type_id')) ? 'selected' : ''); ?>>RTE</option>
										</select>
									    <span class="invalid-feedback" id="admission_type_id_invalid" role="alert">
                                            <strong>The Admission Type is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Religion</label>
										<select class="form-control" id="religion" name="religion">
											<option value="Select" selected="">Select</option>
											<option value="Hindu" <?php echo e(('Hindu' == old('religion')) ? 'selected' : 'selected'); ?>>Hindu</option>
											<option value="Islam" <?php echo e(('Islam' == old('religion')) ? 'selected' : ''); ?>>Islam</option>
											<option value="Sikh" <?php echo e(('Sikh' == old('religion')) ? 'selected' : ''); ?>>Sikh</option>
											<option value="Buddhism" <?php echo e(('Buddhism' == old('religion')) ? 'selected' : ''); ?>>Buddhism</option>
											<option value="Adivasi" <?php echo e(('Adivasi' == old('religion')) ? 'selected' : ''); ?>>Adivasi</option>
											<option value="Jain" <?php echo e(('Jain' == old('religion')) ? 'selected' : ''); ?>>Jain</option>
											<option value="Christianity" <?php echo e(('Christianity' == old('religion')) ? 'selected' : ''); ?>>Christianity</option>
											<option value="Other" <?php echo e(('Other' == old('religion')) ? 'selected' : ''); ?>>Other</option>
										</select>
									
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label>Category</label>
										<select class="form-control" id="category" name="category">
											<option value="">Select</option>
											<option value="OBC" <?php echo e(('OBC' == old('category')) ? 'selected' : 'selected'); ?>>OBC</option>
											<option value="ST" <?php echo e(('ST' == old('category')) ? 'selected' : ''); ?>>ST</option>
											<option value="SC" <?php echo e(('SC' == old('category')) ? 'selected' : ''); ?>>SC</option>
											<option value="BC" <?php echo e(('BC' == old('category')) ? 'selected' : ''); ?>>BC</option>
											<option value="GEN" <?php echo e(('GEN' == old('category')) ? 'selected' : ''); ?>>GEN</option>
											<option value="SBC" <?php echo e(('SBC' == old('category')) ? 'selected' : ''); ?>>SBC</option>
											<option value="Other" <?php echo e(('Other' == old('category')) ? 'selected' : ''); ?>>Other</option>
								        </select>
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Caste')); ?></label>
										<input type="text" class="form-control" id="caste_category" name="caste_category" placeholder="<?php echo e(__('Caste')); ?>" value="<?php echo e(old('caste_category')); ?>" >
									
									</div>
								</div>
								
                          <!--      <div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Date Of Admission')); ?></label>
										<input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo e(date('Y-m-d')); ?>">
									
									</div>
								</div>-->
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Country')); ?></label>
										<select class="form-control" name="country" id="country_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getCountry)): ?>
											<?php $__currentLoopData = $getCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($country->id ?? ''); ?>" <?php echo e(($country->id == $getSetting->country_id) ? 'selected' : ''); ?>><?php echo e($country->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="State" class="required"><?php echo e(__('common.State')); ?></label>
										<select class="form-control stateId " id="state_id" name="state">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getState)): ?>
											<?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($state->id ?? ''); ?>" <?php echo e(($state->id == $getSetting->state_id) ? 'selected' : ''); ?>><?php echo e($state->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>

									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="City"><?php echo e(__('common.City')); ?></label>
										<select class="form-control cityId " name="city" id="city_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($getCity)): ?>
											<?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($cities->id ?? ''); ?>" <?php echo e(($cities->id == $getSetting->city_id) ? 'selected' : ''); ?>><?php echo e($cities->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Village/City')); ?></label>
										<select class="form-control select2 " id="village_city" name="village_city">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($list)): ?>
											<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($type->name ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								<!--<div class="col-md-2">-->
								<!--	<div class="form-group">-->
								<!--		<label><?php echo e(__('student.Village/City')); ?></label>-->
								<!--		<input type="text" class="form-control" id="village_city" name="village_city" placeholder="<?php echo e(__('student.Village/City')); ?>" value="<?php echo e(old('village_city')); ?>">-->
								<!--	</div>-->
								<!--</div>-->
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Students Address')); ?></label>
										<input type="text" class="form-control " id="address" name="address" placeholder="<?php echo e(__('student.Students Address')); ?>" value="<?php echo e(old('address')); ?>">
										
									</div>
								</div>
									<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Family Annual Income')); ?></label>
										<input type="text" name="family_annual_income" id="family_annual_income" class="form-control" value="" placeholder="<?php echo e(__('Family Annual Income')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Pin Code')); ?></label>
										<input type="text" class="form-control" id="pincode" name="pincode" placeholder="<?php echo e(__('common.Pin Code')); ?>" value="<?php echo e(old('pincode')); ?>" maxlength="6" onkeypress="javascript:return isNumber(event)">
										
									</div>
								</div>
						<!--		<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('House')); ?></label>
										<input type="text" name="house" id="house" class="form-control" value="" placeholder="<?php echo e(__('House')); ?>">
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Height')); ?></label>
										<input type="text" name="height" id="height" class="form-control" value="" placeholder="<?php echo e(__('Height')); ?>">
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Weight')); ?></label>
										<input type="text" name="weight" id="weight" class="form-control" value="" placeholder="<?php echo e(__('Weight')); ?>">
										
									</div>
								</div>-->
                                <div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Blood Group')); ?></label>
										<select class="form-control" id="blood_group" name="blood_group">
											<option value=""><?php echo e(__('common.Select')); ?></option>
        										<?php if(!empty($bloodGroupType)): ?>
        											<?php $__currentLoopData = $bloodGroupType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        											<option value="<?php echo e($bloodtype->name ?? ''); ?>" <?php echo e(($bloodtype->name == old('blood_group')) ? 'selected' : ''); ?>><?php echo e($bloodtype->name ?? ''); ?></option>
        											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        										<?php endif; ?>
										</select>
									
									</div>
								</div>
								
							<!--	<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Remark')); ?> </label>
										<input type="text" class="form-control" id="remark_1" name="remark_1" placeholder="<?php echo e(__('student.Remark')); ?> " value="<?php echo e(old('remark_1')); ?>">
									</div>
								</div>-->
								<!--	<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Transport')); ?></label>
										<select class="form-control" id="transport" name="transport">
											<option value="Yes" <?php echo e(('Yes' == old('transport')) ? 'selected' : 'selected'); ?>><?php echo e(__('Yes')); ?></option>
											<option value="No" <?php echo e(('No' == old('transport')) ? 'selected' : ''); ?>><?php echo e(__('No')); ?></option>
										</select>
									</div>
								</div>-->
							<!--	<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Bus Number')); ?> </label>
										<input type="text" class="form-control" id="bus_number" name="bus_number" placeholder="<?php echo e(__('Bus Number')); ?> " value="<?php echo e(old('bus_number')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Bus Route')); ?> </label>
										<input type="text" class="form-control" id="bus_route" name="bus_route" placeholder="<?php echo e(__('Bus Route')); ?> " value="<?php echo e(old('bus_route')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Stoppage')); ?> </label>
										<input type="text" class="form-control" id="stoppage" name="stoppage" placeholder="<?php echo e(__('Stoppage')); ?> " value="<?php echo e(old('stoppage')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Transpor Charges')); ?> </label>
										<input type="text" class="form-control" id="transpor_charges" name="transpor_charges" placeholder="<?php echo e(__('Transpor Charges')); ?> " value="<?php echo e(old('transpor_charges')); ?>">
									</div>
								</div>-->
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Bank Name')); ?> </label>
										<input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="<?php echo e(__('Bank Name')); ?> " value="<?php echo e(old('bank_name')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Bank Account')); ?> </label>
										<input type="text" class="form-control" id="bank_account" name="bank_account" placeholder="<?php echo e(__('Bank Account')); ?> " value="<?php echo e(old('bank_account')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Branch Name')); ?> </label>
										<input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="<?php echo e(__('Branch Name')); ?> " value="<?php echo e(old('branch_name')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('IFSC')); ?> </label>
										<input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="<?php echo e(__('IFSC')); ?> " value="<?php echo e(old('ifsc')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__(' MICR Code')); ?> </label>
										<input type="text" class="form-control" id="micr_code" name="micr_code" placeholder="<?php echo e(__('MICR Code')); ?> " value="<?php echo e(old('micr_code')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Bank Account Holder</label>
										<input type="text" class="form-control" id="bank_account_holder" name="bank_account_holder" placeholder="Bank Account Holder" value="<?php echo e(old('bank_account_holder')); ?>">
									</div>
								</div>
								<!--<div class="col-md-2">
									<div class="form-group">
										<label>Optional Subject</label>
										<input type="text" class="form-control" id="optional_subject" name="optional_subject" placeholder="Optional Subject" value="<?php echo e(old('optional_subject')); ?>">
									</div>
								</div>-->
								<div class="col-md-2">
									<div class="form-group">
										<label>Urban/Ruler</label>
										<input type="text" class="form-control" id="urban" name="urban" placeholder="Urban/Ruler" value="<?php echo e(old('urban')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>District</label>
										<input type="text" class="form-control" id="district" name="district" placeholder="District" value="<?php echo e(old('district')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Tehsil</label>
										<input type="text" class="form-control" id="tehsil" name="tehsil" placeholder="Tehsil" value="<?php echo e(old('tehsil')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Father's Pancard</label>
										<input type="text" class="form-control" id="father_pancard" name="father_pancard" placeholder="Father's Pancard" value="<?php echo e(old('father_pancard')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Mother's Pancard</label>
										<input type="text" class="form-control" id="mother_pancard" name="mother_pancard" placeholder="Mother's Pancard" value="<?php echo e(old('mother_pancard')); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Income Tax Payee Father</label>
										<select class="form-control" id="income_tax_payee_father" name="income_tax_payee_father">
										    <option value="">Select</option>
										    <option value="Yes">Yes</option>
										    <option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Income Tax Payee Mother</label>
										<select class="form-control" id="income_tax_payee_mother" name="income_tax_payee_mother">
										    <option value="">Select</option>
										    <option value="Yes">Yes</option>
										    <option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>BPL</label>
										<select class="form-control" id="bpl" name="bpl">
										    <option value="">Select</option>
										    <option value="Yes">Yes</option>
										    <option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>BPL Cetificate No.</label>
										<input type="text" class="form-control" id="bpl_certificate_no" name="bpl_certificate_no" placeholder="BPL Cetificate No." value="<?php echo e(old('bpl_certificate_no')); ?>">
									</div>
								</div>
							</div>
								<hr>
							<div class="row m-2">
								<div class=" col-md-12 title">
									<h5 class="text-danger"><?php echo e(__('Guardian Details')); ?>:-</h5>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Fathers Name')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control invalid" id="father_name" name="father_name" placeholder="<?php echo e(__('common.Fathers Name')); ?>" value="<?php echo e(old('father_name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										<span class="invalid-feedback" id="father_name_invalid" role="alert">
                                            <strong>The Father's name field is required</strong>
                                        </span>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Fathers Contact No')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control invalid" id="father_mobile" name="father_mobile" placeholder="<?php echo e(__('common.Fathers Contact No')); ?>" value="<?php echo e(old('father_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
										 <div id="fathermobileValidationMessage" style="color: red; display: none; font-size:13px;">must be at least 10 characters</div>

									<span class="invalid-feedback" id="father_mobile_invalid" role="alert">
                                         <strong>The Fathers's No is required</strong>
                                    </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Fathers Aadhaar')); ?></label>
										<input type="text" class="form-control" id="father_aadhaar" name="father_aadhaar" placeholder="<?php echo e(__('Fathers Aadhaar')); ?>" value="<?php echo e(old('father_aadhaar')); ?>" maxlength="12" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label>Father Occupation</label>
										<input type="text" class="form-control" id="father_occupation" name="father_occupation" placeholder="Father Occupation" value="<?php echo e(old('father_occupation')); ?>">
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Mothers Name')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control invalid" id="mother_name" name="mother_name" placeholder="<?php echo e(__('common.Mothers Name')); ?>" value="<?php echo e(old('mother_name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										<span class="invalid-feedback" id="mother_name_invalid" role="alert">
                                            <strong>The Mother's name field is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Mother Mobile No')); ?></label>
										<input type="text" class="form-control" id="mother_mob" name="mother_mob" placeholder="<?php echo e(__('Mother Mobile No')); ?>" value="<?php echo e(old('mother_mob')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Mothers Aadhaar')); ?></label>
										<input type="text" class="form-control" id="mother_aadhaar" name="mother_aadhaar" placeholder="<?php echo e(__('Mothers Aadhaar')); ?>" value="<?php echo e(old('mother_aadhaar')); ?>" maxlength="12" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label>Mother Occupation</label>
										<input type="text" class="form-control" id="mother_occupation" name="mother_occupation" placeholder="Mother Occupation" value="<?php echo e(old('mother_occupation')); ?>">
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Guardian Name')); ?></label>
										<input type="text" class="form-control" id="guardian_name" name="guardian_name" placeholder="<?php echo e(__('Guardian Name')); ?>" value="<?php echo e(old('guardian_name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
									
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Guardian Mobile No')); ?></label>
										<input type="text" class="form-control " id="guardian_mobile" name="guardian_mobile" placeholder="<?php echo e(__('Guardian Mobile No')); ?>" value="<?php echo e(old('guardian_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
								
									</div>
								</div>
								
						    </div>		
							<hr>
							<div class="row m-2">
								<div class=" col-md-12 title">
									<h5 class="text-danger"><?php echo e(__('student.Document Upload')); ?>:-</h5>
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('student.Student Photo')); ?></lable>
									<div class="input file form-control">
										<input type="file" class="" name="student_img" id="student_img" value="<?php echo e(old('student_img')); ?>" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
								<div class="col-md-1">
									<img src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('student.Father Photo')); ?></lable>
									<div class="input file form-control">
										<input type="file" name="father_img" id="father_img" value="<?php echo e(old('father_img')); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
								            <p class="text-danger" id="image_errors"></p>
									</div>
								</div>
								<div class="col-md-1">
									<img src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('student.Mother Photo')); ?></lable>
									<div class="input file form-control">
										<input type="file" name="mother_img" id="mother_img" value="<?php echo e(old('mother_img')); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
								           <p class="text-danger" id="image_er"></p>
									</div>
								</div>
								<div class="col-md-1">
									<img src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
							</div>
							<hr>
							<div class="mesterClassAmt" class="row m-2"></div>
							<div class="col-md-12 text-center"> 
								<button type="submit" class="btn btn-primary " id="is-invalid"><?php echo e(__('common.submit')); ?></button><br><br>
							</div>
						</form>
				
				</div>
			</div>
		</div>
	

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>







<script>
$(document).ready(function() {
    // Handler for form submission
    $('#is-invalid').on('click', function(event) {
        var mobileValue = $('#mobile').val();
        var mobileMinLength = 10;

        if (mobileValue.length < mobileMinLength) {
            $('#mobileValidationMessage').show();
            event.preventDefault();  
            $('html, body').animate({
            scrollTop: 0
        }, 800);
        } else {
            $('#mobileValidationMessage').hide();
        }

        // Perform father's mobile input validation
        var father_mobileInputValue = $('#father_mobile').val();
        var fatherMobileMinLength = 10;

        if (father_mobileInputValue.length < fatherMobileMinLength) {
            $('#fathermobileValidationMessage').show();
            event.preventDefault(); 
            $('html, body').animate({
            scrollTop: 0
        }, 800);
        } else {
            $('#fathermobileValidationMessage').hide();
        }
    });
});
</script>
<script>
    $(document).ready(function(){
        $('#student_img').change(function(e){
            $('#image_error').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_error').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_error').html("");
            }
        }else{
            $('#image_error').html("Image Size File");
            $(this).val('');
        }
        });
    });
   

    $(document).ready(function(){
        $('#father_img').change(function(e){
            $('#image_errors').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_errors').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_errors').html("");
            }
        }else{
            $('#image_errors').html("Image Size File");
            $(this).val('');
        }
        });
    });
   

    $(document).ready(function(){
        $('#mother_img').change(function(e){
            $('#image_er').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_er').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_er').html("");
            }
        }else{
            $('#image_er').html("Image Size File");
            $(this).val('');
        }
        });
    });
   
</script>

<style>
  .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            margin-bottom:10px;
        }
        .header img {
            max-height: 50px;
        }
    
    #image_error{
        font-weight: bold;
        font-size: 14px;
    }
    #image_er{
        font-weight: bold;
        font-size: 14px;
    }
    #image_errors{
        font-weight: bold;
        font-size: 14px;
    }
    
    .blink_me {
        animation: blinker 1s linear infinite;
    }

    @keyframes  blinker {
      50% {
        opacity: 0;
      }
    }
</style>



<style>
	@media  only screen and (max-width: 600px) {
		.upload {
			margin-left: 27%;
			margin-top: 7%;
		}
	}
</style>



<?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/admission/newStudentRegistration.blade.php ENDPATH**/ ?>