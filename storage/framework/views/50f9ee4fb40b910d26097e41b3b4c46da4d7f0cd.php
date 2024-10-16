<?php
    $getHostel = Helper::getHostel();
    $classType = Helper::classType();
    $getgenders = Helper::getgender();
    $getSetting=Helper::getSetting();
    $getPaymentMode = Helper::getPaymentMode();
?>
 
<?php $__env->startSection('content'); ?>
<style>
.select2-container .select2-selection--single {height:38px !important;}
.select2-container--default .select2-selection--single .select2-selection__arrow {height:38px !important;}
.c_height {height: 160px;overflow-y:scroll;}
.c_height1 {height: 260px;overflow-y:scroll;}
.bed {
    display: none;
}
@media (max-width: 600px) {
  .modal div {
      font-size:10px;
  }
}
@media (min-width: 605px) {
  .level4 .btn-xs {
      font-size:1.7rem;
  }
}
</style>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-plus"></i> &nbsp;<?php echo e(__('hostel.Assign Students')); ?></h3>
                    <div class="card-tools">
                    <a href="<?php echo e(url('assign_student_view')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a>
                    <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                    </div>
                    
                    </div>        
                    <form id="quickForm" action="<?php echo e(url('hostel_assign')); ?>" method="post" enctype='multipart/form-data'>
                        <?php echo csrf_field(); ?>
                    
                    
                    <div class="row m-2">
                        <input type="hidden" id="bedId" name="bed_id" value="">
                    	 <div class="col-md-2 card c_height">
                			<label ><?php echo e(__('hostel.Select Hostel')); ?><span class="text-danger">*</span></label>
            		        <?php if(!empty($getHostel)): ?> 
                                <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="icheck-primary">
                                        <input type="radio" class="hostel" name="hostel_id" id="hostel_id<?php echo e($key); ?>" value="<?php echo e($type->id ?? ''); ?>" data-value="<?php echo e($type->id ?? ''); ?>">
                                        <label for="hostel_id<?php echo e($key); ?>"><?php echo e($type->name ?? ''); ?></label>
                                    </div>                                  
            	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-2 card level1 c_height" style="display:none">
                			<label ><?php echo e(__('hostel.Select Building')); ?><span class="text-danger">*</span></label>
                                    <div class="icheck-primary" id="building_id">
                                        
                                    </div><br>                		

                    	</div>  
                        <div class="col-md-2 card level2 c_height" style="display:none">
                			<label ><?php echo e(__('hostel.Select Floor')); ?><span class="text-danger">*</span></label>
            				<div class="icheck-primary" id="floor_id">
                   
                            </div><br>        			
                    	</div>  
                        <div class="col-md-2 card level3 c_height" style="display:none">
                			<label ><?php echo e(__('hostel.Select Room')); ?><span class="text-danger">*</span></label>
            				<div class="icheck-primary" id="room_id">
                   
                            </div><br>     			
                    	</div>  
                        <div class="col-md-12 card level4 c_height1" style="display:none">
                			<label ><?php echo e(__('hostel.Select Bed')); ?><span class="text-danger">*</span> &nbsp; <span class="text-danger"><i class="bg-danger p-1 text-danger"> &nbsp; &nbsp; </i> &nbsp;Booked</span> <span class="text-success"><i class="bg-success p-1"> &nbsp; &nbsp; </i> &nbsp;Empty</span></label>
            				<div class="icheck-primary row" id="bed_id" width="100%">
                   
                            </div>                 			
                    	</div>        	



                        <div class="col-md-12 student_detail" style="display:none;">
                            <div class="row">
                                <div class="col-md-2">
                            		<div class="form-group">
                            			<label><?php echo e(__('hostel.Admission No.')); ?></label>
                            			<input type="text" class="form-control admissionNo" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('hostel.Admission No.')); ?>" value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                            	    </div>
                            	</div>                
                                <!--<div class="col-md-2">
                            		<div class="form-group">
                            			<label>Class</label>
                            			<select class="form-control" id="class_search_id" name="class_search_id" >
                            			<option value="">Select</option>
                                         <?php if(!empty($classType)): ?> 
                                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                        </select>
                            	    </div>
                            	</div>
                            	<div class="col-md-1">
                            		<div class="form-group">
                            			<label>Section</label>
                            				<select class="form-control section_search_id" id="section_search_id" name="section_search_id" >
                            			   <option value="">Select</option>
                                         <?php if(!empty($getSection)): ?> 
                                              <?php $__currentLoopData = $getSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                        </select>
                            	    </div>
                            	</div>-->                
                        		<div class="col-md-5">
                        			<div class="form-group">
                        				<label><?php echo e(__('common.Search Students By Keywords')); ?></label>
                        				<input type="text" class="form-control" id="search_name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>">
                        		    </div>
                        		</div>             	
                                <div class="col-md-1 ">
                            	    <div class="form-group">
                            	        <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                            			<button type="button" class="btn btn-primary" onclick="SearchValue()" ><?php echo e(__('common.Search')); ?></button>
                            	    </div>                    
                            	</div>
                            </div>
                        </div>
                        <div class="student_list_show student_detail col-md-12"></div>


                    	<div class="col-md-12 text-center student_detail" style="display:none;"><h3><?php echo e(__('hostel.Student Details')); ?></h3><hr></div>
                    
                   <div class="col-md-12 name" style="display:none;">
                   <div class="row">
								<div class=" col-md-12 title mt-n3">
									<h5 class="text-danger"><?php echo e(__('hostel.Personal Details')); ?>:-</h5>
								</div>
                    	<input type="hidden" id="admission_id" name="admission_id" value="">
                    	<div class="col-md-3 name" style="display:none;">
									<div class="form-group">
										<label><?php echo e(__('hostel.Admission No.')); ?><span style="color:red;">*</span></label>
										<input type="text" class="form-control" id="admission_no" name="admission_no" placeholder="<?php echo e(__('hostel.Admission No.')); ?>" readonly value="<?php echo e($admissionBillCounter['counter'] +1 ?? ''); ?>" onkeypress="javascript:return isNumber(event)">
									</div>
								</div>
                    	  <div class="col-md-3 name" style="display:none;">
                			<label ><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>
            				<input type="text" class="form-control invalid" placeholder="<?php echo e(__('Name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="first_name" name="first_name" value="<?php echo e(old('first_name')); ?>" >
                             <span class="invalid-feedback" id="first_name_invalid" role="alert">
                                <strong><?php echo e(__('hostel.First name required')); ?></strong>
                             </span>
                    	</div>  
                    	
                    	
                      <div class="col-md-3 gender_id" style="display:none;">
                              <label><?php echo e(__('common.Gender')); ?> </label>
                              <select class="form-control" id="gender_id" name="gender_id">
                				<option value=""><?php echo e(__('common.Select')); ?></option>
                                <?php if(!empty($getgenders)): ?> 
                                      <?php $__currentLoopData = $getgenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($value->id); ?>" <?php echo e(($value->id == old('gender_id')) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                            
                            </div>	 
                        
                        <div class="col-md-3 mobile" style="display:none;">
                			<label  id="alertMessage"><?php echo e(__('common.Mobile No.')); ?><span class="text-danger">*</span></label>
            				<input type="text" class="form-control invalid" id="mobile" name="mobile" placeholder="<?php echo e(__('common.Mobile No.')); ?>" value="<?php echo e(old('mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)" >
                             <span class="invalid-feedback" id="mobile_invalid" role="alert">
                                <strong>Mobile required</strong>
                             </span>
                    	</div>  
                        <div class="col-md-3 email" style="display:none;">
                			<label ><?php echo e(__('common.Email')); ?></label>
            				<input type="email" class="form-control " placeholder="<?php echo e(__('common.Email')); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" >
                           
                    	</div>    
                    
                          <div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('common.DOB')); ?></label>
										<input type="date" class="form-control" id="dob" name="dob" value="">
									
									</div>
								</div>
          <div class="col-md-3">
									<div class="form-group">
										<label><?php echo e(__('hostel.Date Of Admission')); ?></label>
										<input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo e(date('Y-m-d')); ?>">
									
									</div>
								</div>
                		 
                            <div class="col-md-3 name" style="display:none;">
                			<label ><?php echo e(__('hostel.College Name')); ?></label>
            				<input type="text" class="form-control " placeholder="<?php echo e(__('hostel.College Name')); ?>"  id="college" name="college" value="<?php echo e(old('college')); ?>" >
                           
                    	</div> 
                            <div class="col-md-3 name" style="display:none;">
                			<label ><?php echo e(__('hostel.Course Name')); ?></label>
            				<input type="text" class="form-control " placeholder="<?php echo e(__('hostel.Course Name')); ?>"  id="Course" name="Course" value="<?php echo e(old('Course')); ?>" >
                    	
                    	</div> 
                           
                            	<div class="col-md-3">
									<lable><?php echo e(__('hostel.Student Photo')); ?></lable>
									<div class="input file form-group">
										<input type="file" class=" form-control" name="student_img" id="student_img" accept="image/png, image/jpg, image/jpeg">
                                  
									</div>
								</div>
								<div class="col-md-1">
									<img id="student_img_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
									<div class="col-md-3">
									<lable><?php echo e(__('hostel.Student Signature')); ?> </lable>
									<div class="input file form-group">
										<input type="file" class=" form-control" name="Student_Signature_img" id="Student_Signature_img" accept="image/png, image/jpg, image/jpeg">

                                 
									</div>
								</div>
                       	<div class="col-md-1">
									<img id="Signature_img_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
                          <div class="col-md-12 address_1" style="display:none;">
                			<label><?php echo e(__('common.Address')); ?> </label>
            				<textarea type="text" class="form-control" id="address" name="address" placeholder="<?php echo e(__('common.Address')); ?>"><?php echo e(old('address')); ?></textarea>

                    	</div> 
                	</div> 
                </div>
                
           
                             <div class="col-md-12 name" style="display:none;">
                    	<div class="row ">
							    <div class=" col-md-12 title">
									<h5 class="text-danger"><?php echo e(__('hostel.Parents Details')); ?>:-</h5>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('hostel.Father/Guardian Name')); ?></label>
										<input type="text" class="form-control " id="father_name" name="father_name" placeholder="<?php echo e(__('hostel.Father/Guardian Name')); ?>" value="<?php echo e(old('father_name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										
									
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('hostel.Father Contact No')); ?></label>
										<input type="text" class="form-control" id="father_mobile" name="father_mobile" placeholder="<?php echo e(__('hostel.Father Contact No')); ?>" value="<?php echo e(old('father_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
									
									
									</div>
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('hostel.Father Photo')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="father_photo" id="father_photo" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
									<div class="col-md-1">
									<img id="father_photo_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
				            	<div class="col-md-3">
									<lable><?php echo e(__('hostel.Father Signature')); ?> </lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="father_Signature" id="father_Signature" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
									<div class="col-md-1">
									<img id="Signature2_img_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
							</div>		
							</div>
                            
                           <div class="col-md-12 name" style="display:none;">
                               				<div class="row">
								<div class="col-md-2">
								
										<label><?php echo e(__('common.Mothers Name')); ?></label>
										<div class="input file form-group">
										<input type="text" class="form-control " id="mother_name" name="mother_name" placeholder="<?php echo e(__('common.Mothers Name')); ?>" value="<?php echo e(old('mother_name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
									
									
									</div>
								</div>
								<div class="col-md-2">
								
										<label><?php echo e(__('common.Mother Contact No')); ?></label>
											<div class="input file form-group">
										<input type="text" class="form-control" id="mothers_mobile" name="mothers_mobile" placeholder="<?php echo e(__('common.Mother Contact No')); ?>" value="<?php echo e(old('mothers_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">

									</div>
								</div>
									<div class="col-md-3">
									<lable><?php echo e(__('hostel.Mother Photo')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="mother_photo" id="mother_photo" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
									<div class="col-md-1">
									<img id="mother_photo_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
									<div class="col-md-3">
									<lable><?php echo e(__('hostel.Mother Signature')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="mother_Signature" id="mother_Signature" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
									<div class="col-md-1">
									<img id="Signature4_img_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								</div>
                           </div>
                           <div class="col-md-12 name" style="display:none;">
                           	<div class="row">
							    <div class=" col-md-12 title">
									<h5 class="text-danger"><?php echo e(__('hostel.Local Guardian Details')); ?>:-</h5>
								</div>
									<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('hostel.Guardian Name')); ?></label>
										<input type="text" class="form-control " id="guardian_name" name="guardian_name" placeholder="<?php echo e(__('hostel.Guardian Name')); ?>" value="<?php echo e(old('guardian_name')); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)">
										
									
									</div>
								</div>
									<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('hostel.Guardian Mobile')); ?></label>
										<input type="text" class="form-control" id="guardian_mobile" name="guardian_mobile" placeholder="<?php echo e(__('hostel.Guardian Contact No')); ?>" value="<?php echo e(old('guardian_mobile')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
									
									
									
									</div>
								</div>
									<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('hostel.Guardian Telephone')); ?></label>
										<input type="text" class="form-control" id="guardian_tel" name="guardian_tel" placeholder="<?php echo e(__('hostel.Guardian Telephone')); ?>" value="<?php echo e(old('guardian_tel')); ?>"  onkeypress="javascript:return isNumber(event)">
									
									
									
									</div>
								</div>
									<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('hostel.Guardian Whatsapp')); ?></label>
										<input type="text" class="form-control" id="guardian_whatsapp" name="guardian_whatsapp" placeholder="<?php echo e(__('hostel.Guardian Whatsapp')); ?>" value="<?php echo e(old('guardian_whatsapp')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
									
									
									
									</div>
								</div>
									<div class="col-md-3">
									<lable><?php echo e(__('hostel.Guardian Photo')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="guardian_photo" id="guardian_photo" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
									<div class="col-md-1">
									<img id="guardian_photo_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
									<div class="col-md-3">
									<lable><?php echo e(__('hostel.Guardian Signature')); ?> </lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="guardian_Signature" id="guardian_Signature" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
									<div class="col-md-1">
									<img id="Signature1_img_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
									<div class="col-md-12">
									<div class="form-group">
										<label><?php echo e(__('hostel.Guardian Address')); ?></label>
										<textarea type="text" class="form-control " id="guardian_address" name="guardian_address" placeholder="<?php echo e(__('hostel.Guardian Address')); ?>" value="<?php echo e(old('guardian_address')); ?>"></textarea>
										
									</div>
								</div>
								
								</div>
								</div>
							<hr>
                     
                           <div class="col-md-12 name" style="display:none">
                    <div class="row">
                         <div class=" col-md-12 title">
									<h5 class="text-danger"><?php echo e(__('hostel.Hostel Room Preference')); ?>:-</h5>
								</div>
                         <div class="col-md-3 amount" style="display:none;">
                		<label><?php echo e(__('hostel.Hostel Fees')); ?><span class="text-danger">*</span></label>
            				<input type="text" class="form-control invalid" id="hostel_fees" name="hostel_fees" placeholder="<?php echo e(__('hostel.Hostel Fees')); ?>" value="<?php echo e(old('hostel_fees')); ?>" onkeypress="javascript:return isNumber(event)" >
                         <span class="invalid-feedback" id="hostel_fees_invalid" role="alert">
                                <strong><?php echo e(__('hostel.Hostel Fees required')); ?></strong>
                             </span> 
                    	</div> 
                    	
                    	<div class="col-md-12">
                    	    <div class="row">
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label><?php echo e(__('hostel.Receipt No')); ?></label>
                                 <input type="number" name="editable_receipt_no" placeholder="" value="<?php echo e($receipt_no ?? ''); ?>" readonly class="form-control">
                              </div>
                           </div>
                            <?php
                                $dateObj = Carbon\Carbon::now();
                                $modifiedDate = $dateObj->addDays(30)->toDateString();
                            ?>

                           <div class="col-md-2" >
                    			<div class="form-group">
                    			    <label>Renewal Date</label>
                        			<div class="input-group">
            							    <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                    				    <input type="date" class="form-control" id="hostel_renewal_date" name="hostel_renewal_date" value="<?php echo e($modifiedDate ?? ''); ?>">
                                    </div>
                    			</div>
                	        </div>
                           
                	        <div class="col-md-3">
						    <div class="form-group">
                                <label >Total Amount:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rs.
                                        </span>
                                    </div>
                                        <input class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly type="number" name="hostel_amount" id="hostel_amount" value="0"> 
                                        <?php $__errorArgs = ['amount'];
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
                	        
                           <div class="row">
							<div class="col-md-3">
                                <div class="form-group">
                                    <label for="discountType">Discount Type:</label>
                                    <select class="form-control" id="discountType" name="discountType" >
                                        <option value="">Select Discount Type</option>
                                        <option value="value">Flat Discount</option>
                                        <option value="percentage">Percentage (%)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discountValue">Discount Value:</label>
                                    <input type="number" class="form-control" id="discountValue" name="discountValue" value="0" readonly="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="discountAmount">Discount Amount:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rs.
                                        </span>
                                    </div>
                                        <input class="form-control" type="number" name="discountAmount" id="discountAmount" readonly="" value="0">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                              <div class="form-group">
                                 <label><?php echo e(__('hostel.Discount Remark')); ?></label>
                                 <input type="text" name="discount_remark" placeholder="<?php echo e(__('hostel.Discount Remark')); ?>" value="" id="discount_remark" class="form-control">
                              </div>
                           </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                            <label for="totalPayableAmount">Total Payable Amount:</label>
                               <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rs.
                                        </span>
                                    </div>
                                    <input class="form-control" type="number" name="totalPayableAmount" id="totalPayableAmount" readonly="" value="0">
                                    <!-- <span class="input-group-addon">.00</span> -->
                                </div>
                            </div>
                        <div class="col-md-3">
                             <label for="totalPayableAmount"> Payable Amount:</label>
                            <div class="input-group">
                           
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rs.
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" name="amount" value="0" id="amount" autocomplete="off" data-gtm-form-interact-field-id="2">
                                </div>
                            </div>
                         <div class="col-md-3">
                            <div class="form-group">
                             <label><?php echo e(__('hostel.Payment Mode')); ?></label>
                             <select class="form-control" id="payment_mode_id" name="payment_mode_id" onchange="payment_mode_function(this.value);" required>

                                <?php if(!empty($getPaymentMode)): ?>
                                <?php $__currentLoopData = $getPaymentMode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name ?? ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                             </select>
                            </div>
                       </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="duesAmount">Dues Amount:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rs.
                                        </span>
                                    </div>
                                    <input class="form-control" type="number" name="duesAmount" id="duesAmount" readonly="" value="0">
                                    <!-- <span class="input-group-addon">.00</span> -->
                                </div>
                            </div>
                        </div>
                        </div>
                    	</div>
                    	</div> 
                    
                        
                    </div>
                    
                </div>
                   
                    </div>
                    
                   
								<hr>
                  
                          <div class="row m-2 name" style="display:none;">
								<div class=" col-md-12 title">
									<h5 class="text-danger"><?php echo e(__('hostel.Document Upload')); ?>:-</h5>
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('hostel.Student ID Proof')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="student_id_proof" id="student_id_proof" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
								<div class="col-md-1">
									<img id="student_id_proof_link"src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								
								<div class="col-md-3">
									<lable><?php echo e(__('hostel.College Id')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="college_id" id="college_id" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
								<div class="col-md-1">
									<img id="college_id_link" src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('hostel.Police Verification')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="police_verification" id="police_verification" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
								<div class="col-md-1">
									<img id="police_verification_link" src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('hostel.Covid Certificate')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="covid_certificate" id="covid_certificate" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
								<div class="col-md-1">
									<img id="covid_certificate_link" src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('hostel.Father Aadhaar')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="father_adhar" id="father_adhar" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
								<div class="col-md-1">
									<img id="father_adhar_link" src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
								<div class="col-md-3">
									<lable><?php echo e(__('hostel.Other Document')); ?></lable>
									<div class="input file form-group">
										<input type="file" class="form-control" name="other_document" id="other_document" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'" accept="image/png, image/jpg, image/jpeg">
									</div>
								</div>
								<div class="col-md-1">
									<img id="other_document_link" src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/profile_img.png'); ?>" width="60px" height="60px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
								</div>
							</div>


						
                    <div class="row m-2 student_detail">
                        <div class="col-md-12 text-center">
                        <button type="submit" id="uniqueSubmit" class="btn btn-primary" ><?php echo e(__('common.submit')); ?> </button>
                        </div>
                    </div>
                    </form>
            </div>
</div>
</div>
</div>
</section>
</div>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                        
                              <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('hostel.Assigned Student Details')); ?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </div>
                        
                              <form action="#" method="post">
                              <div class="modal-body">
                                     <div class="row">
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-user text-purple"></i>&nbsp; <?php echo e(__('common.Name')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="name1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-phone text-purple"></i>&nbsp; <?php echo e(__('common.Mobile')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="mobile1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-envelope text-purple"></i>&nbsp; <?php echo e(__('common.Email')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="email1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-barcode text-purple"></i>&nbsp; <?php echo e(__('common.Aadhaar')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="aadhaar1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-address-book-o text-purple"></i>&nbsp; <?php echo e(__('common.Fathers Name')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="f_name1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-map-marker text-purple"></i>&nbsp; <?php echo e(__('common.Address')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="address_11"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-money text-purple"></i>&nbsp; <?php echo e(__('hostel.Hostel Fees')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="first_amount1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-hospital-o text-purple"></i>&nbsp; <?php echo e(__('hostel.Hostel')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="1hostel_id"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-building text-purple"></i>&nbsp; <?php echo e(__('hostel.Building')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="building_id1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-inbox text-purple"></i>&nbsp; <?php echo e(__('hostel.Floor')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="floor_id1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-trello text-purple"></i>&nbsp; <?php echo e(__('hostel.Room')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="room_id1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-bed text-purple"></i>&nbsp; <?php echo e(__('hostel.Bed')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="bed_id1"></div>
                                         <div class="col-6 col-md-3 border"><b><i class="fa fa-bed text-purple"></i>&nbsp; <?php echo e(__('hostel.join date')); ?></b></div>
                                         <div class="col-6 col-md-3 border" id="join_date"></div>


                                     </div> 
                                     <div class="row">
                                         <input type="hidden" name="hostel_assign_id" id="hostel_assign_id" class="form-control" value="">
                                     <!--<div class="col-6 col-md-3"><?php echo e(__('hostel.Meter Reading Unit')); ?></div>
                                         <div class="col-6 col-md-3 ">
                                          <input type="text" name="meter_unit" id="meter_unit" class="form-control" placeholder="meter reading unit" onkeypress="javascript:return isNumber(event)">
                                          <input type="hidden" name="hostel_assign_id" id="hostel_assign_id" class="form-control" value="">

                                         </div>-->
                                     </div>                                        
                              </div>
                              <div class="modal-footer">
                                        <button type="button" class="btn btn-danger waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                                            
                                 </div>
                               </form>
                            </div>
                          </div>
                        </div>

<script>

$(document).on('keyup', "#meter_unit", function() {
  var meter_unit = $(this).val();
  var hostel_assign_id = $("#hostel_assign_id").val();
  var basurl = "<?php echo e(url('/')); ?>";
       $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: basurl+'/meter_unit_update',
        data: {meter_unit:meter_unit,hostel_assign_id:hostel_assign_id},
         //dataType: 'json',
        success: function (data) {
alett('ds');            
           
        }
      }); 
});

$(document).on('keyup', "#mobile", function() {
  var mobile = $(this).val();
var basurl = "<?php echo e(url('/')); ?>";
       $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: basurl+'/unique_stu_detail',
        data: {mobile:mobile},
         dataType: 'json',
        success: function (data) {

	     if(data == 0){
	         	toastr.error('Mobile No. Already Exists !');
	         	$("#uniqueSubmit").attr('disabled','true');
	         	$("#alertMessage").text('Mobile No. Already Exits !');
	         	
	     }else{
	         	$("#uniqueSubmit").removeAttr('disabled');
	         	$("#alertMessage").text('Mobile No.');	         	
	     }            
           
        }
      }); 

});  

$(document).on('click', ".studentDetail", function() {
  $('#myModal').modal('toggle');
    id = $(this).data("id");
    $("#meter_unit").val('');
    $("#hostel_assign_id").val('');
var basurl = "<?php echo e(url('/')); ?>";
       $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: basurl +'/stu_bed_detail',
        data: {bed_id:id},
         dataType: 'json',
        success: function (data) {

	     if(data != ''){
	         	$("#name1").html(data.first_name);
	         	$("#mobile1").html(data.mobile);
	         	$("#email1").html(data.email);
	         	$("#aadhaar1").html(data.aadhaar);
	         	$("#f_name1").html(data.father_name);
	         	$("#address_11").html(data.address);
	         	$("#first_amount1").html(data.hostel_fees);
	         	$("#1hostel_id").html(data.hostel_name);
	         	$("#building_id1").html(data.building_name);
	         	$("#floor_id1").html(data.floor_name);
	         	$("#room_id1").html(data.room_name);
	         	$("#bed_id1").html(data.bed_name);
	         	var originalDate = data.date;
                var momentDate = moment(originalDate, 'YYYY-MM-DD');
                var formattedDate = momentDate.format('DD-MM-YYYY');
             $("#join_date").html(formattedDate);
             $("#hostel_assign_id").val(data.id);
             $("#meter_unit").val(data.meter_unit);
	     }else{
	         	toastr.danger('Student Not Found !');
	     }            
           
        }
      }); 

});    
</script>                        


<script>
function studentName (student) {

  var $student = $(
    '<span><span></span></span>'
  );

  $student.find("span").text(student.text);

  return $student;
};

$(".select2").select2({
  templateSelection: studentName
});
</script>
<script>
$('.hostel').on('change', function(e){
    
	var hostel_id = $(this).data('value');
		$(".level1").show();
		$(".level2").hide();
		$(".level3").hide();
		$(".level4").hide();
		 $(".name").hide();
        $(".mobile").hide();
        $(".aadhaar").hide();
        $(".email").hide();
        $(".f_name").hide();
        $(".student_detail").hide();
         $(".father_name").hide();
        $(".father_mobile").hide();
        $(".gender_id").hide();
        $(".institute_name").hide();
        $(".aadhaer_copy").hide();
        $(".address_1").hide();
        $(".address_2").hide();  
        $(".amount").hide();  
        var basurl = "<?php echo e(url('/')); ?>";
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/dataBuilding/'+hostel_id,
	  success: function(data){
	     if(data != ''){
	         	$("#building_id").html(data);
	     }else{
	         	$("#building_id").html(data);
	         	toastr.error('Building Not Found ! <i class="fa fa-frown-o"></i>');
	     }
	  }
	});
});

$(document).on('click', '.building', function(){ 
    
	var building_id = $(this).data('value');
	var basurl = "<?php echo e(url('/')); ?>";
//	alert(building_id);
	$(".level2").show();
	
		$(".level3").hide();
		$(".level4").hide();
		 $(".name").hide();
        $(".mobile").hide();
        $(".aadhaar").hide();
        $(".email").hide();
        $(".f_name").hide();
        $(".student_detail").hide();
         $(".father_name").hide();
        $(".father_mobile").hide();
        $(".gender_id").hide();
        $(".institute_name").hide();
        $(".aadhaer_copy").hide();
        $(".address_1").hide();
        $(".address_2").hide();  
         $(".amount").hide();  
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/datafloor/'+building_id,
	  success: function(data){
	     if(data != ''){
	         	$("#floor_id").html(data);
	     }else{
	         	$("#floor_id").html(data);
	         	toastr.error('Floor Not Found ! <i class="fa fa-frown-o"></i>');
	     }
	  }
	});
});

$(document).on('click', '.floor', function(){ 
    var basurl = "<?php echo e(url('/')); ?>";
	var floor_id = $(this).data('value');
		$(".level3").show();
		
		$(".level4").hide();
		 $(".name").hide();
        $(".mobile").hide();
        $(".aadhaar").hide();
        $(".email").hide();
        $(".f_name").hide();
        $(".student_detail").hide();
         $(".father_name").hide();
        $(".father_mobile").hide();
        $(".gender_id").hide();
        $(".institute_name").hide();
        $(".aadhaer_copy").hide();
        $(".address_1").hide();
        $(".address_2").hide();  
         $(".amount").hide();  
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/dataroom/'+floor_id,
	  success: function(data){
	     if(data != ''){
	         	$("#room_id").html(data);
	     }else{
	         	$("#room_id").html(data);
	         	toastr.error('Room Not Found ! <i class="fa fa-frown-o"></i>');
	     }
	  }
	});
});

$(document).on('click', '.room', function(){ 
    var basurl = "<?php echo e(url('/')); ?>";
	var room_id = $(this).data('value');
		$(".level4").show();
		
		
		 $(".name").hide();
        $(".mobile").hide();
        $(".aadhaar").hide();
        $(".email").hide();
        $(".f_name").hide();
        $(".student_detail").hide();
        $(".father_name").hide();
        $(".father_mobile").hide();
        $(".gender_id").hide();
        $(".institute_name").hide();
        $(".aadhaer_copy").hide();
        $(".address_1").hide();
        $(".address_2").hide();   
         $(".amount").hide();  
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/databed/'+room_id,
	  success: function(data){
	     if(data != ''){
	         	$("#bed_id").html(data);
	     }else{
	         	$("#bed_id").html(data);
	         	toastr.error('Bed Not Found ! <i class="fa fa-frown-o"></i>');
	     }
	  }
	});
});


$(document).on('click', '.formShow', function(){ 
   
        $(".name").show();
        $(".mobile").show();
        $(".aadhaar").show();
        $(".email").show();
        $(".student_detail").show();
        $(".father_name").show();
        $(".father_mobile").show();
        $(".gender_id").show();
        $(".institute_name").show();
        $(".aadhaer_copy").show();
        $(".address_1").show();
        $(".address_2").show();       
        $(".amount").show();  
        $(".old_search").hide();  
});

$(document).on('click', '.formHide', function(){ 
   
        $(".name").hide();
        $(".mobile").hide();
        $(".aadhaar").hide();
        $(".email").hide();
        $(".student_detail").hide();
        $(".father_name").hide();
        $(".father_mobile").hide();
        $(".gender_id").hide();
        $(".institute_name").hide();
        $(".aadhaer_copy").hide();
        $(".address_1").hide();
        $(".address_2").hide();       
        $(".amount").hide();  
        $(".old_search").hide();  
        $(this).siblings('.formShow').removeClass('bg-primary');
});

$(document).on('click', '.formShow', function(){ 
        $(this).addClass('bg-primary');
        $(this).siblings('.formShow').removeClass('bg-primary');
        $("#bedId").val($(this).data('id'));
});

function SearchValue() {
    var basurl = "<?php echo e(url('/')); ?>";
    var search_name = $('#search_name').val(); 
    var admissionNo = $('#admissionNo').val();
    if(admissionNo != '' || search_name != ''){
       $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: basurl+'/school_student_search',
        data: {name:search_name,admissionNo:admissionNo},
         //dataType: 'json',
        success: function (data) {

           $('.student_list_show').html(data);
           
        }
      }); 
    }else{
        toastr.error('Please put a value in one column !');
        }
};
</script>

<script>
    	$('#uniqueSubmit').click(function(e){
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
        $('#quickForm').trigger('submit');
    }else{
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }
})
</script>

<script>
 

    $(document).ready(function(){
        $('.all_img').change(function(e){
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
		$(document).ready(function() {
		    
		    $('#hostel_fees').on('input', function() {
		        var hostel_fees = $(this).val();
		         if(isNaN(hostel_fees)) {
		             $('#hostel_amount').val(0);
		         }else{
		             $('#hostel_amount').val(hostel_fees);
		         }
		    });
		    
		    
		    $('#hostel_fees,#hostel_amount,#discountValue,#locker_fees_amount').on('input', function() {
		        
                calculateDiscountAndDues();
            });

         $('#discountType').change(function() {
            // When the discount type changes, update discount amount and recalculate the dues
            const discountType = document.getElementById("discountType").value;
            const discountValueInput = document.getElementById("discountValue");

            if (discountType === "") {
                discountValueInput.readOnly = true;
                discountValueInput.value = "0";
            } else {
                discountValueInput.readOnly = false;
            }

            calculateDiscountAndDues();
         });
         
        function calculateDiscountAndDues() {
            var totalAmount = parseFloat($('#hostel_amount').val());
            var discountType = $('#discountType').val();
            var discountValue = parseFloat($('#discountValue').val());
            var totalPaid = parseFloat($('#amount').val());

                if(discountValue > totalAmount){
                    alert("Invalid Calculation");
                    $('#discountValue').val(0);
                    $('#totalPayableAmount').val(totalAmount);
                    $('#amount').val(totalAmount);
                    $('#duesAmount').val(totalAmount);
                    $('#discountAmount').val(0);
                }else{
                    if(discountType == "value"){
                        var finalAmt = (totalAmount - discountValue);
                        $('#discountAmount').val(discountValue);
                    }else{
                        var finalAmt = (totalAmount - ((totalAmount*discountValue)/100));
                        $('#discountAmount').val((totalAmount*discountValue)/100);
                    }
                    
                    
                    if (isNaN(finalAmt)) {
                        $('#totalPayableAmount').val(0);
                        $('#amount').val(0);
                        $('#duesAmount').val(0);
                    }else{
                        $('#totalPayableAmount').val(finalAmt);
                        $('#amount').val(finalAmt);
                        $('#duesAmount').val(0);
                    }
                }
            
        }
        
        $('#amount').on('input', function() {
                var amount = parseFloat($(this).val());
                var totalPayableAmount = parseFloat($('#totalPayableAmount').val());
                
                var finalAmt = totalPayableAmount - amount;
                
                $('#duesAmount').val(finalAmt);
                
            });
        });
</script>

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/add.blade.php ENDPATH**/ ?>