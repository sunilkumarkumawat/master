<?php
    $getCountry = Helper::getCountry();
    $getState = Helper::getState();
    $getCity = Helper::getCity();
    $getaccounts = Helper::getaccount();
?>

 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   
   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">

                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-cogs"></i> &nbsp;<?php echo e(__('setting.Add Setting')); ?> </h3>
                    <div class="card-tools">
                        <a href="<?php echo e(url('viewSetting')); ?>" class="btn btn-primary  btn-sm" title="View"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?> </a>
                    </div>
                </div> 

        <div class="card-body">
         <form id="quickForm" action="<?php echo e(url('addSetting')); ?>" method="post"  enctype="multipart/form-data">   
         <?php echo csrf_field(); ?>            
            <div class="row">
                 <?php if(Session::get('role_id') == 1): ?>
                <div class="col-md-3">
				    <div class="form-group"> 
					    <label for="branch" class="text-danger <?php $__errorArgs = ['branch_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(__('setting.Branch')); ?>*</label>
				    	 <select class="form-control" id="branch_id" name="branch_id" 
				    	 
				    	 >
				    	     <option value=""><?php echo e(__('common.Select')); ?></option>
			    	     	<?php if(!empty($branch)): ?> 
                                      <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($Branch->id ?? ''); ?>"><?php echo e($Branch->branch_name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          	<?php endif; ?>
					       </select>	
					       <?php $__errorArgs = ['branch_id'];
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
			    <?php endif; ?>
			    <!-- <div class="col-md-3">
				    <div class="form-group"> 
					    <label for="Username" style="color:red;"><?php echo e(__('messages.Name')); ?>*</label>
				    	<input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" placeholder="Name" value="">
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
					    <label for="Username" style="color:red;"><?php echo e(__('messages.Mobile No.')); ?>*</label>
				    	<input type="numbre" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mobile" name="mobile" placeholder="Mobile No." value="" maxlength="10" onkeypress="javascript:return isNumber(event)">
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
                
			    <div class="col-md-3">
				    <div class="form-group"> 
					    <label for="Username" style="color:red;"><?php echo e(__('messages.E-Mail')); ?>*</label>
				    	<input type="text" class="form-control <?php $__errorArgs = ['gmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gmail" name="gmail" placeholder="Gmail" value="">
					<?php $__errorArgs = ['gmail'];
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
			    </div>  --> 
			<!--  <div class="col-md-3" >
                <div class="form-group">
                 <label><?php echo e(__('messages.Country')); ?></label>
                  <select class="select2 form-control select2" name="country_id" id="country_id" >
                      <?php if(!empty($getCountry)): ?> 
                          <?php $__currentLoopData = $getCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($country->id ?? ''); ?>"><?php echo e($country->name ?? ''); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    
              
                	<?php $__errorArgs = ['country'];
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
					<label for="State" class="required"><?php echo e(__('messages.State')); ?></label>
					<select class="select2 form-control" id="state_id" name="state_id">
                <?php if(!empty($getState)): ?> 
                      <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($state->id ?? ''); ?>"><?php echo e($state->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                  
                  
                  
                  	<?php $__errorArgs = ['state'];
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
			        <label for="City"><?php echo e(__('messages.City')); ?></label>
			        <select class="select2 form-control" name="city_id" id="city_id" >
			            <?php if(!empty($getCity)): ?> 
                      <?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($cities->id ?? ''); ?>"><?php echo e($cities->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
					
					<?php $__errorArgs = ['city'];
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
			</div> -->	    
                
			    <!-- <div class="col-md-3">
				    <div class="form-group"> 
					    <label for="Username" style="color:red;"><?php echo e(__('messages.Pin Code')); ?>*</label>
				    	<input type="numbre" class="form-control <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pincode" name="pincode" placeholder="Pin Code" value="">
					<?php $__errorArgs = ['pincode'];
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
					    <label for="Username" style="color:red;"><?php echo e(__('messages.Address')); ?>*</label>
				    	<input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address" placeholder="Address" value="">
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
               
                <div class="col-md-3">
				    <div class="form-group"> 
					    <label for="right_logo" class="required"><?php echo e(__('messages.Right Logo')); ?></label>
				    	 <input type="file" class="form-control  <?php $__errorArgs = ['right_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="right_logo" name="right_logo" value="">
					    	<?php $__errorArgs = ['right_logo'];
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
					    <label for="left_logo" class="required"><?php echo e(__('messages.Left Logo')); ?></label>
				    	<input type="file" class="form-control  <?php $__errorArgs = ['left_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="left_logo" name="left_logo" value="">
						<?php $__errorArgs = ['left_logo'];
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
					    <label for="seal_sign" class="required"><?php echo e(__('messages.Seal & Sign.')); ?></label>
				    	<input type="file" class="form-control  <?php $__errorArgs = ['seal_sign'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="seal_sign" name="seal_sign" value="">
						<?php $__errorArgs = ['seal_sign'];
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
					    <label for="Username" style="color:red;"><?php echo e(__('messages.Tin No.')); ?>*</label>
				    	<input type="text" class="form-control <?php $__errorArgs = ['tin_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tin_no" name="tin_no" placeholder="Tin No" value="">
						<?php $__errorArgs = ['tin_no'];
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
                         <label><?php echo e(__('messages.Account Name')); ?></label>
                       <select class="select2 form-control  <?php $__errorArgs = ['account_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="account_id" name="account_id" placeholder="Account Name" >
                        <option value=""><?php echo e(__('messages.select')); ?> </option>
                         <?php if(!empty($getaccounts)): ?> 
                              <?php $__currentLoopData = $getaccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($account->id ?? ''); ?>" ><?php echo e($account->bank_name ?? ''); ?> / Holder Name =<?php echo e($account->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php endif; ?>
                        </select>
                        	<?php $__errorArgs = ['account_name'];
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
                </div> -->
			    
             <div class="col-md-12 text-center">
    			<button type="submit" class="btn btn-primary "><?php echo e(__('common.Submit')); ?></button>
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
<?php $__env->stopSection(); ?>        
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/settings/setting/addSetting.blade.php ENDPATH**/ ?>