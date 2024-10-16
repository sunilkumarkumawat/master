<?php
$getstudents = Helper::getstudents();
$getgenders = Helper::getgender();
$classType = Helper::classType();
$getState = Helper::getState();
$getCity = Helper::getCity();
$getCountry = Helper::getCountry();
$getSetting = Helper::getSetting();
$bloodGroupType = Helper::bloodGroupType();
$getAdmissionDatatableFields = Helper::getAdmissionDatatableFields();
$list = DB::table('custom_villages_list')->orderBy('name','ASC')->whereNull('deleted_at')->get();
$gender = DB::table('gender')->whereNull('deleted_at')->pluck('name')->implode(',');
$villageList = DB::table('custom_villages_list')->whereNull('deleted_at')->pluck('name')->implode(',');
$class = DB::table('class_types')->whereNull('deleted_at')->pluck('name')->implode(',');
$setting = Db::table('settings')->whereNull('deleted_at')->first();
$stateList = DB::table('states')->where('id', 13)->pluck('name')->implode(',');
$cityList = DB::table('citys')->whereNull('deleted_at')->where('state_id', 13)->take(25)->pluck('name')->implode(',');
$bloodgroupList = DB::table('blood_groups')->whereNull('deleted_at')->pluck('name')->implode(',');
?>

<?php $__env->startSection('content'); ?>

<?php
    $studentCount = DB::table('admissions')->where('deleted_at',null)->count();
?>
						
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;<?php echo e(__('student.Students Admission Management')); ?></h3>
							<div class="card-tools">
								<a href="<?php echo e(url('admissionView')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <span class="Display_none_mobile"> <?php echo e(__('common.View')); ?> </span></a>
								<a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"> <?php echo e(__('common.Back')); ?> </span></a>
							</div>

						</div>
            <div class="row ">
              <div class="col-md-4 m-1" style="overflow-x:hidden;">
                <table id="studentList" style='visibility:hidden' class="table table-bordered table-striped dataTable dtr-inline nowrap">
                  <thead>
                    <tr role="row">
                        
                   
                      <?php if($getAdmissionDatatableFields): ?>
                      <?php $__currentLoopData = $getAdmissionDatatableFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                    
                        <th class="text-center"><?php echo e($key); ?></th>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    
                    </tr>
                  </thead>
                 <tbody id="product_list_show">
                     
                     </tbody>
                </table>
              </div>
             <form id="" class='col-md-7' action="<?php echo e(url('studentExcelAdd')); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>         
                        <div class="row ">
                            <!--<div class="col-md-2">-->
                            <!--    <label><?php echo e(__('student.Download Excel Format')); ?></label>-->
                            <!--    <button class="btn btn-danger" id="downloadExcel" type="button" data-link="schoolimage/Student_Blank_Excel_Format.xlsx"><i class="fa fa-download"></i> <?php echo e(__('student.Download Excel')); ?></button>-->
                            <!--</div>-->

                            <div class="col-md-5">
                                <label><?php echo e(__('student.Upload Excel')); ?> </label>
                                <div class='d-flex'>
                                <input class="form-control" type="file" id="excel" name="excel" required><button type="submit" class="ml-2 btn btn-primary"><?php echo e(__('student.Upload')); ?></button>
                            </div>
                            </div>
                                                        
                           
                        </div>
                      </form>
            </div>
						              
						<form id="quickForm" action="<?php echo e(url('admissionStudentSearch')); ?>" method="post">
							<?php echo csrf_field(); ?>

							<div class="row m-2">
								<div class=" col-md-12 title">
									<h5><?php echo e(__('student.Search Registered Students')); ?>:-</h5>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Registration No')); ?></label>
										<input type="text" class="form-control"  id="registration_no"name="registration_no" placeholder="<?php echo e(__('student.Registration No')); ?>" value="<?php echo e($search['registration_no'] ?? ''); ?>">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class='text-danger'><?php echo e(__('common.Class')); ?>*</label>
										<select class="form-control select2 " id="class_search_id" name="class_search_id" required>
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<?php if(!empty($classType)): ?>
											<?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
								
								<div class="col-md-5">
									<div class="form-group">
										<label><?php echo e(__('common.Search By Keywords')); ?></label>
										<input type="text" class="form-control" id="searchName" name="name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
									</div>
								</div>
								<div class="col-md-1 ">
									<div class="form-group">
										<label class="text-white"><?php echo e(__('common.Search')); ?></label>
										<button type="button" class="btn btn-primary" onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
									</div>
								</div>

							</div>
						</form>

						<div class="student_list_show"></div>
                        <hr>
						<form id="quickForm_addmission" action="<?php echo e(url('admissionAdd')); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="row m-2">
								<div class=" col-md-12 title mt-n3">
									<h5 class="text-danger"><?php echo e(__('student.Personal Details')); ?>:-</h5>
								</div>
								<div class="col-md-2">
									<input type="hidden" class="form-control" id="reg_id" name="registration_id" placeholder="<?php echo e(__('student.Registration No')); ?>" value="">
									<div class="form-group">
										<label><?php echo e(__('student.Admission No.')); ?></label>
									<!--	<input type="text" class="form-control" id="admission_no" name="admissionNo" placeholder="<?php echo e(__('student.Admission No.')); ?>"  
										value=""
										onkeypress="javascript:return isNumber(event)">	-->
										<input type="text" class="form-control invalid" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('student.Admission No.')); ?>" value="<?php echo e($BillCounter ?? ''); ?>" onkeypress="javascript:return isNumber(event)">
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
								</div>
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
										<label><?php echo e(__('Jan Aadhaar No.')); ?></label>
										<input type="text" class="form-control " id="jan_aadhaar" name="jan_aadhaar" placeholder=" <?php echo e(__('Jan Aadhaar No.')); ?>" value="<?php echo e(old('jan_aadhaar')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Gender')); ?><span style="color:red;">*</span></label>
										<select class="form-control invalid select2" id="gender_id" name="gender_id">
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

										<select class="form-control invalid select2" id="class_type_id" name="class_type_id">
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
								
								
								<div class="col-md-2" id="stream_subject_div" style="display:none;">
									<div class="form-group">
										<label>Stream Subject<span style="color:red;">*</span></label>

										<select class="form-control select2" multiple id="stream_subject" name="stream_subject[]">
											<option value=""><?php echo e(__('common.Select')); ?></option>
										</select>
									</div>
								</div>
                                <!--<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Is RTE Student')); ?><span style="color:red;">*</span></label>
										<select class="form-control invalid" id="rte_student" name="rte_student">
											
											<option value="Yes" <?php echo e(('Yes' == old('rte_student')) ? 'selected' : 'selected'); ?>>Yes</option>
											<option value="No" <?php echo e(('No' == old('rte_student')) ? 'selected' : ''); ?>>NO</option>
										</select>
									    <span class="invalid-feedback" id="rte_student_invalid" role="alert">
                                            <strong>The RTE Student is required</strong>
                                        </span>
									</div>
								</div>-->
                              <div class="col-md-2">
									<div class="form-group">
										<label>Admission Type(Non RTE)<span style="color:red;">*</span></label>
										<select class="form-control invalid select2" id="admission_type_id" name="admission_type_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<option value="1" <?php echo e((1 == old('admission_type_id')) ? 'selected' : 'selected'); ?>>Yes</option>
											<option value="2" <?php echo e((2 == old('admission_type_id')) ? 'selected' : ''); ?>>NO</option>
										</select>
									    <span class="invalid-feedback" id="admission_type_id_invalid" role="alert">
                                            <strong>The Admission Type is required</strong>
                                        </span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Religion</label>
										<select class="form-control select2" id="religion" name="religion">
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
										<select class="form-control select2" id="category" name="category">
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
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Blood Group')); ?></label>
										<select class="form-control select2" id="blood_group" name="blood_group">
											<option value=""><?php echo e(__('common.Select')); ?></option>
        										<?php if(!empty($bloodGroupType)): ?>
        											<?php $__currentLoopData = $bloodGroupType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        											<option value="<?php echo e($bloodtype->name ?? ''); ?>" <?php echo e(($bloodtype->name == old('blood_group')) ? 'selected' : ''); ?>><?php echo e($bloodtype->name ?? ''); ?></option>
        											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        										<?php endif; ?>
										</select>
									
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Medium</label>
										<select class="form-control select2" id="medium" name="medium">
											<option value="">Select</option>
											<option value="Hindi">Hindi</option>
											<option value="English">English</option>
										</select>
									</div>
								</div>
								
                                <div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Date Of Admission')); ?></label>
										<input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo e(date('Y-m-d')); ?>">
									
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('common.Country')); ?></label>
										<select class="form-control select2" name="country" id="country_id">
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
										<select class="form-control stateId select2" id="state_id" name="state">
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
										<select class="form-control cityId select2" name="city" id="city_id">
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
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Relation with the student')); ?></label>
										<input type="text" name="relation_student" id="relation_student" class="form-control" value="" placeholder="<?php echo e(__('Relation with the student')); ?>">
										
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('School Studied Last Year')); ?></label>
										<input type="text" name="school_namestudied_last_year" id="school_namestudied_last_year" class="form-control" value="" placeholder="<?php echo e(__('School Studied Last Year')); ?>">
										
									</div>
								</div>
								<div class="col-md-2">
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
								</div>
                                
								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('student.Remark')); ?> </label>
										<input type="text" class="form-control" id="remark_1" name="remark_1" placeholder="<?php echo e(__('student.Remark')); ?> " value="<?php echo e(old('remark_1')); ?>">
									</div>
								</div>
									<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Transport')); ?></label>
										<select class="form-control select2" id="transport" name="transport">
											<option value="Yes" <?php echo e(('Yes' == old('transport')) ? 'selected' : 'selected'); ?>><?php echo e(__('Yes')); ?></option>
											<option value="No" <?php echo e(('No' == old('transport')) ? 'selected' : ''); ?>><?php echo e(__('No')); ?></option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
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
								</div>
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
								<div class="col-md-2">
									<div class="form-group">
										<label>Optional Subject</label>
										<input type="text" class="form-control" id="optional_subject" name="optional_subject" placeholder="Optional Subject" value="<?php echo e(old('optional_subject')); ?>">
									</div>
								</div>
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
										<select class="form-control select2" id="income_tax_payee_father" name="income_tax_payee_father">
										    <option value="">Select</option>
										    <option value="Yes">Yes</option>
										    <option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>Income Tax Payee Mother</label>
										<select class="form-control select2" id="income_tax_payee_mother" name="income_tax_payee_mother">
										    <option value="">Select</option>
										    <option value="Yes">Yes</option>
										    <option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>BPL</label>
										<select class="form-control select2" id="bpl" name="bpl">
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
								<div class="row m-2">
								<div class="col-md-4">
									<div class="form-group">
										<label>Name  And  Address Of Previous School</label>
										<input type="text" class="form-control" id="previous_school" name="previous_school" placeholder="Name  And  Address Of Previous School" value="<?php echo e(old('previous_school')); ?>">
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
	</section>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        var baseUrl = "<?php echo e(url('/')); ?>";
        
        $('#class_type_id').change(function(){
            var class_type_id = parseInt($(this).val());
            var orderBy = parseInt($(this).find('option:selected').attr('data-orderBy'));
            
            if(orderBy > 10){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: baseUrl + '/getStreamSubjects',
                    data: {
                        class_type_id: class_type_id
                    },
                    success: function(data) {
                        var options = "";
                        $('#stream_subject').html("");
                            for(var i = 0; i < data.length; i++){
                                options += '<option value="'+ data[i].id +'">'+ data[i].name +'</option>';
                            }
                        $('#stream_subject').html(options);
                        $('#stream_subject_div').show();
                    }
                });
            }else{
                $('#stream_subject').html("");
                $('#stream_subject_div').hide();
            }
        });
    });
</script>





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
<script>
$(document).ready(function(){
    $('#class_type_id').val('');
    
    $('#class_type_id').change(function(){
        if($('#admission_type_id').val() == 1){
            $('.mesterClassAmt').removeClass('d-none');
            mesterData();
        }else{
            $('.mesterClassAmt').addClass('d-none');
        }
    });
    
    $('#admission_type_id').change(function(){
      //      $('#class_type_id').val('');
      
            if($('#admission_type_id').val() == 1){
            $('.mesterClassAmt').removeClass('d-none');
            mesterData();
        }else{
            $('.mesterClassAmt').addClass('d-none');
        }veClass('d-none');
            mesterData();
    });
    
})
	var basurl = "<?php echo e(url('/')); ?>";
	function mesterData() {
	
		var class_type_id = $('#class_type_id :selected').val();
		if (class_type_id > 0) {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: basurl + '/mesterClassAmt',
				data: {
					class_type_id: class_type_id
				},
				//dataType: 'json',
				success: function(data) {
                if(data != ""){
                     $('.mesterClassAmt').show();
                    	$('.mesterClassAmt').html(data);

                }else{
                   $('.mesterClassAmt').hide();
                   $('#class_type_id').val("");
                    alert('Please assign master fees*!');
                      window.open(basurl+'/feesMasterAdd', 'blank');
                  
                    			
                }

				}
			});
		} else {
			toastr.error('Please put a value in one column !');
		}
	};
		function sum_amount(amot) {
		    var sum = 0;
    
            sum += amot;
       
            $("#net_amount").val(sum.toFixed(2));
		}
		
		
		
	function SearchValue() {
		var basurl = "<?php echo e(url('/')); ?>";
		var name = $('#searchName').val();
		var registration_no = $('#registration_no').val();
		var class_search_id = $('#class_search_id :selected').val();
		if (class_search_id > 0 || registration_no != '' || name != '') {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: basurl + '/admissionStudentSearch',
				data: {
					class_search_id: class_search_id,
					name: name,
					registration_no: registration_no
				},
				//dataType: 'json',
				success: function(data) {
                    $('.student_list_show').addClass('fadeinout');
					$('.student_list_show').html(data);
                    setTimeout(function() {
                         $('.student_list_show').removeClass('fadeinout');
                    }, 2000);
				}
			});
		} else {
			toastr.error('Please put a value in one column !');
		}
	};
    
 

	function showData(student_id) {
		var basurl = "<?php echo e(url('/')); ?>";
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
			},
			type: 'post',
			url: basurl + '/admissionStudentOnClick',
			data: {
				student_id: student_id
			},
			dataType: 'json',
			success: function(data) {

				if (data) {
				    if(data.stu_data.status !== 1){
					$('#reg_id').val(data.stu_data.registration_no);
					$('#first_name').val(data.stu_data.first_name);
					$('#last_name').val(data.stu_data.last_name);
					$('#aadhaar').val(data.stu_data.aadhaar);
					$('#student_id').val(data.stu_data.name);
					$('#gender_id').val(data.stu_data.gender_id);
					$('#class_type_id').val(data.stu_data.class_type_id);
					$('#dob').val(data.stu_data.dob);
					$('#mobile').val(data.stu_data.mobile);
					$('#email').val(data.stu_data.email);
					$('#father_name').val(data.stu_data.father_name);
					$('#mother_name').val(data.stu_data.mother_name);
					$('#father_mobile').val(data.stu_data.father_mobile);
					$('#admission_type_id').val(data.stu_data.admission_type_id);
					$('#sms_contact_no').val(data.stu_data.sms_contact_no);
					$('#village_city').val(data.stu_data.village_city);
					$('#address').val(data.stu_data.address);
					$('#pincode').val(data.stu_data.pincode);
					$('#remark_1').val(data.stu_data.remark_1);
					$('#country_id').val(data.stu_data.country_id);
                    $('.stateId').val(data.stu_data.state_id);
                    $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                	  url: basurl+'/stateData/' + data.stu_data.state_id,
                	  success: function(value){
            		    $(".cityId").html(value);
                	  }
                    });
        	        setTimeout(function() {
                        var count = $('.cityId').children('option').length;
                        for (var i = 0; i < count; i++) {
                            var option = $('.cityId').children('option').eq(i);
                            var id = option.val();
                            if (id == data.stu_data.city_id) {
                                option.prop('selected', true);
                            }
                        }
                    }, 500); 
					$('#student_img').val(data.stu_data.student_img);
					$('#father_img').val(data.stu_data.father_img);
					$('#mother_img').val(data.stu_data.mother_img);
					$('#student_roll_no').val(data.stu_data.roll_no);
					$('#school_name').val(data.stu_data.school_name);
					$('#date_of_admission').val(data.stu_data.dob);
					
					mesterData();
				}else{
				    $('#reg_id,#first_name,#last_name,#aadhaar,#student_id,#gender_id,#class_type_id,#dob,#mobile,#email,#father_name,#mother_name,#father_mobile,#admission_type_id,#sms_contact_no,#village_city,#address,#pincode,#remark_1,#country_id').val("");
				}
				} else {
					alert('No more records found');
				}

			}
		});
	};

	
	$('#is-invalid').click(function(e){
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
        var total_amt = $('#total_amount').val();
        if(total_amt == ""){
            
            if($('#admission_type_id').val() == 1){
                toastr.error('First Assign Fees');
            }else{
                $('#quickForm_addmission').trigger('submit');
            }
            
        }else{
        $('#quickForm_addmission').trigger('submit');
        }
    }else{
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }
})
</script>
<script>
    $("#downloadExcel").click(function(){
        var excel_link = $(this).data('link');
        window.location.href = excel_link;
    })
</script>

<style>
    .fadeinout
{
  animation: fadeinout 1s infinite;
}

@keyframes  fadeinout
{
  0%{
    opacity:0;
  }
  50%
  {
    opacity:1;
  }
  100%
  {
    opacity:0;
  }
}
</style>


<script>
$(document).ready(function(){
 $("#studentList").DataTable({
        
                   "bPaginate": false,"bAutoWidth": false,"bInfo": false,"lengthChange": false, "searching":false,"autoWidth": false,"lengthChange": false, // Default number of rows per page
                 "buttons": [{
                    extend: 'excelHtml5',
                      extend: 'excelHtml5',
                        text: '<i class="fa fa-arrow-down" aria-hidden="true"></i> Excel Format',
                        filename: 'Student Upload Format',
                         className: 'btn btn-primary',
                      exportOptions: {
                            modifier: {
                                page: 'current'
                            },
                            format: {
                                body: function (data, row, column, node) {
                                    return row === 0 ? '' : data; // Clear data for the first row
                                }
                            }},
                    customize: function (xlsx) {
                         var cellName ='';
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        var rows = sheet.getElementsByTagName('row');
                       
                        

                        // Modify all header cells' background color, font size, color, and border
                        var styles = xlsx.xl['styles.xml'];
                        var fills = styles.getElementsByTagName('fills')[0];
                        var fonts = styles.getElementsByTagName('fonts')[0];
                        var borders = styles.getElementsByTagName('borders')[0];

                        // Add new fill
                        var fillIndex = fills.childNodes.length;
                        var fill = $.parseXML('<fill><patternFill patternType="solid"><fgColor rgb="6639b5"/></patternFill></fill>').documentElement;
                        fills.appendChild(fill);

                        // Add new font
                        var fontIndex = fonts.childNodes.length;
                        var font = $.parseXML('<font><sz val="14"/><color rgb="ffffff"/></font>').documentElement;
                        fonts.appendChild(font);

                        // Add new border
                        var borderIndex = borders.childNodes.length;
                        var border = $.parseXML('<border><left style="thin"/><right style="thin"/><top style="thin"/><bottom style="thin"/></border>').documentElement;
                        borders.appendChild(border);

                        // Add new xf for the cell
                        var cellXfs = styles.getElementsByTagName('cellXfs')[0];
                        var xfIndex = cellXfs.childNodes.length;
                        var xf = $.parseXML('<xf applyFill="1" applyFont="1" applyBorder="1" fontId="' + fontIndex + '" fillId="' + fillIndex + '" borderId="' + borderIndex + '">'+'<alignment vertical="center"/>'+'</xf>').documentElement;
                        cellXfs.appendChild(xf);

                        // Apply the style to all header cells
                        var headerCells = sheet.querySelectorAll('row:first-of-type c');
                        headerCells.forEach(function(cell) {
                            cell.setAttribute('s', xfIndex);
                        });

var dataCells = sheet.querySelectorAll('row:not(:first-of-type) c');
var dataValidations = sheet.getElementsByTagName('dataValidations')[0];
    if (!dataValidations) {
        dataValidations = sheet.createElement('dataValidations');
        sheet.getElementsByTagName('worksheet')[0].appendChild(dataValidations);
    }

    // Iterate through the rows and add data validation to each V4 cell
    var numberOfRows = dataCells.length; 
                        // Apply the same style to cells with text from <th>
                        var tableHeaders = $('#studentList thead th');
                    var count=-1;
                       var head = '';
                        tableHeaders.each(function(index, th) {
                            count++;
                            var thText = $(th).text();
                            var headerCells = sheet.querySelectorAll('row c[r^="' + String.fromCharCode(65 + index) + '"] is t');
                                head = thText;
                               
                               
                            headerCells.forEach(function(headerCell) {
                              
                                if (headerCell.textContent === thText) {
                        
                                   // headerCell.parentElement.parentElement.setAttribute('s', xfIndex);
                                }
                            });
                             function indexToColumnName(index) {
    let columnName = '';
 while (index >= 0) {
        columnName = String.fromCharCode((index % 26) + 65) + columnName;
        index = Math.floor(index / 26) - 1;
    }
    
    return columnName;
}

                if(head ==='Class')
                {
             for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"<?php echo e($class); ?>"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
     
                }
                
                 if(head ==='Gender')
                {
                for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"<?php echo e($gender); ?>"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                    
                }
                
                 if(head ==='State')
                {
                    
                    for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"<?php echo e($stateList); ?>"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                    
                }
                
                
                 if(head ==='City')
                {
                    
                    for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"<?php echo e($cityList); ?>"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                    
                }                


                 if(head ==='Blood Group')
                {
                    
                    for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"<?php echo e($bloodgroupList); ?>"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                    
                }   
                
                 if(head ==='Admission Type')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"Non RTE,RTE"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }
                
                 if(head ==='Income Tax Payee Father')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"Yes,No"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }
                
                 if(head ==='Income Tax Payee Mother')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"Yes,No"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }
                
                 if(head ==='Income Tax Payee Mother')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"Yes,No"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }
                
                 if(head ==='BPL')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"Yes,No"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }
                
                 if(head ==='Religion')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"HINDU,ISLAM,SIKH,BUDDHISM,ADIVASI,JAIN,CHRISTIANITY,OTHER"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }
                 if(head ==='Category')
                {
                    for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"OBC,SC,ST,BC,GEN,SBC,Other"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }

                 if(head ==='Transport')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"Yes,No"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }                
                 if(head ==='Village')
                {
                      for (var rowIndex = 3; rowIndex <= numberOfRows; rowIndex++) {
        var cellRef = indexToColumnName(count) + rowIndex;
        var dataValidation = sheet.createElement('dataValidation');
        dataValidation.setAttribute('type', 'list');
        dataValidation.setAttribute('allowBlank', '1');
        dataValidation.setAttribute('showInputMessage', '1');
        dataValidation.setAttribute('showErrorMessage', '1');
        dataValidation.setAttribute('sqref', cellRef); // Apply to the current V cell
        var formula1 = sheet.createElement('formula1');
        formula1.textContent = '"<?php echo e($villageList); ?>"'; // Options for the dropdown
        dataValidation.appendChild(formula1);
        dataValidations.appendChild(dataValidation);
    }
                    
                }                
                
                 dataValidations.setAttribute('count', dataValidations.childNodes.length);
  
                        });

                        
                    }
                }
                ]
                }).buttons().container().appendTo('#studentList_wrapper .col-md-6:eq(0)');

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/admission/add.blade.php ENDPATH**/ ?>