<?php
$getCountry = Helper::getCountry();
$getState = Helper::getState();
$getCity = Helper::getCity();
$roleType = Helper::roleType();
$sidebar = Helper::getSiderbar();
$getPermisnByBranch = Helper::getPermisnByBranch();
$allPermisn = explode(',',$getPermisnByBranch['branch_sidebar_id']);
$subsidebar  = DB::table('sidebar_sub')->groupBy('sidebar_id')->orderBy('sidebar_id','ASC')->get();
$allowSubSidebar  = explode(',',$getPermisnByBranch['sidebar_sub_id']);
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
                    <h3 class="card-title"><i class="fa fa-desktop"></i> &nbsp;<?php echo e(__('user.Add User')); ?> </h3>
                    <div class="card-tools">
                    <a href="<?php echo e(url('viewUser')); ?>" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?>  </a>
                    <a href="<?php echo e(url('user_dashboard')); ?>" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?>  </a>
                    </div>
                    
                    </div>        
                <form id="quickForm" action="<?php echo e(url('addUser')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row m-2">
        <?php if(Session::get('role_id') == 1): ?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="color:red;"><?php echo e(__('user.Branch ID')); ?> *</label>
                                <select class="form-control <?php $__errorArgs = ['branch_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" name="branch_id" name="branch_id">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="color:red;"><?php echo e(__('common.First Name')); ?> *</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="first_name" name="first_name" value="<?php echo e(old('first_name')); ?>" placeholder="<?php echo e(__('common.First Name')); ?>">
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
                                <label style="color:red;"><?php echo e(__('common.Last Name')); ?> *</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="last_name" name="last_name" value="<?php echo e(old('last_name')); ?>" placeholder="<?php echo e(__('common.Last Name')); ?>">
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
                                <label style="color:red;"><?php echo e(__('common.Mobile No.')); ?> *</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="<?php echo e(__('common.Mobile No.')); ?> " maxlength="10" onkeypress="javascript:return isNumber(event)">
        
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
                                <label style="color:red;"><?php echo e(__('common.Email')); ?> *</label>
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputEmail1" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('common.Email')); ?>">
                                <?php $__errorArgs = ['email'];
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
        		<!--<div class="col-md-2" >
                    <div class="form-group">
                     <label>Country</label>
                      <select class="form-control select2" name="country" id="country_id">
                          <?php if(!empty($getCountry)): ?> 
                              <?php $__currentLoopData = $getCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($country->id ?? ''); ?>" <?php echo e(($country->id == Session::get('countries_id')) ? 'selected' : ''); ?>><?php echo e($country->name ?? ''); ?></option>
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
                    </div>-->
        			<div class="col-md-2">
        				<div class="form-group"> 
        					<label for="State" class="required"  style="color:red;"><?php echo e(__('common.State')); ?>*</label>
        					<select class="select2 form-control <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="state_id" name="state">
        					    <option value="" ><?php echo e(__('common.Select')); ?></option>
                                <?php if(!empty($getState)): ?> 
                                      <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($state->id ?? ''); ?>" <?php echo e(($state->id == $getSetting->state_id) ? 'selected' : ''); ?>><?php echo e($state->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
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
        				</div>
        			</div>
        			<div class="col-md-2">
        			    <div class="form-group">
        			        <label for="City" style="color:red;"><?php echo e(__('common.City')); ?>*</label>
        			        <select class="select2 form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city" id="city_id">
        			            <option value="" ><?php echo e(__('common.Select')); ?></option>
        			            <?php if(!empty($getCity)): ?> 
                              <?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($cities->id ?? ''); ?>" <?php echo e(($cities->id == $getSetting->city_id) ? 'selected' : ''); ?>><?php echo e($cities->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
        					</select>
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
        			    </div>
        			</div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="color:red;"><?php echo e(__('common.Address')); ?> *</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(__('common.Address')); ?>">
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
        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="color:red;"><?php echo e(__('user.User Name')); ?>*</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['userName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="userName" name="userName" value="<?php echo e(old('userName')); ?>" placeholder="<?php echo e(__('user.User Name')); ?>">
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
                                <label style="color:red;"><?php echo e(__('common.Confirm Password')); ?>*</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="confirm_password" name="confirm_password" value="<?php echo e(old('confirm_password')); ?>" placeholder="<?php echo e(__('common.Confirm Password')); ?>">
                                <?php $__errorArgs = ['confirm_password'];
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
                              <label style="color:red;"><?php echo e(__('user.Role')); ?>*</label>
                              <div class="input-group mb-3">
                                <select class="form-control <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" name="role_id" id="role_id">
                                    <option value=""><?php echo e(__('common.Select')); ?></option>
                                    <?php if(!empty($roleType)): ?>
                                    <?php
                                    $array = [1,2,3];
                                    ?>
                                    <?php $__currentLoopData = $roleType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($item->id, $array)): ?> {
                                    <?php else: ?>
                                    <option value="<?php echo e($item->id ?? ''); ?>"><?php echo e($item->name ?? ''); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <div class="input-group-append">
                                    <a href="<?php echo e(url('role_add')); ?>" target="_blank">
                                        <button class="btn btn-primary" type="button" style="height: 100%;">
                                          <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                                <?php $__errorArgs = ['role_id'];
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo e(__('common.Salary')); ?></label>
                                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo e(old('salary')); ?>" placeholder="<?php echo e(__('common.Salary')); ?>" onkeypress="javascript:return isNumber(event)">
                            </div>
                        </div>                         
                        <div class="col-md-2">
                            <div class="form-group">
                               <label><?php echo e(__('common.Photo')); ?></label>
                               <input type="file" class="form-control " id="photo" name="photo" value="<?php echo e(old('photo')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label style="color:red;"><?php echo e(__('user.Sidebar Permission')); ?>*</label>
                                    <?php if(!empty($sidebar)): ?>
                                    <?php $__currentLoopData = $sidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $allPermisn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permisnData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data['id'] == $permisnData): ?>
                                                <div class="custom-control custom-checkbox">
                                                <input name="sidebar_id[]" class="custom-control-input custom-control-input-primary custom-control-input-outline checkbox pointer <?php $__errorArgs = ['sidebar_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" id="<?php echo e($data->id ?? ''); ?>" value="<?php echo e($data->id ?? ''); ?>">
                                                <label for="<?php echo e($data->id ?? ''); ?>" class="custom-control-label pointer ">
                                                    <?php if(Session::get('locale') == 'hi'): ?>
                                                        <p><?php echo e($data['hindi_name']?? ''); ?></p>
                                                    <?php else: ?>
                                                        <p><?php echo e($data['name']?? ''); ?></p>
                                                    <?php endif; ?></label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                <?php $__errorArgs = ['sidebar_id'];
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
                            <!--<label>&nbsp;</label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="select_all" name="" value="" class="checkbox">
                                    <label for="select_all"><?php echo e(__('user.Select All')); ?> </label>
                                </div>
                            </div> -->                           
                        </div>
       		            <div class="col-md-6">
                	    	<div class="form-group">
                	    	    <label class="d-none" style="color:red;"><?php echo e(__('user.Select Action')); ?>*</label>
                                    <div class="row">
                                       <!-- <div class="col-sm-3">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="add" name="add" value="1">
                                                    <label for="add"><?php echo e(__('common.Add')); ?></label>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="col-sm-3 d-none">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="edit" name="edit" value="1">
                                                    <label for="edit"><?php echo e(__('common.Edit')); ?></label>
                                                </div>
                                            </div>
                                        </div>                                 
                                        <div class="col-sm-3 d-none">
                                            <div class="form-group clearfix">
                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="delete" name="delete" value="1">
                                                    <label for="delete"><?php echo e(__('common.Delete')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 d-none">
                                            <div class="form-group clearfix">
                                                <div class="icheck-warning d-inline">
                                                    <input type="checkbox" id="download" name="download" value="1">
                                                    <label for="download"><?php echo e(__('common.Download')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="color:red;"> Sub Panel </label>
                                        <select class="" multiple="multiple" name="sidebar_sub_id[]" id="sidebar_sub_id" style="width: 100%;height: 49pc;">
                                            <option value="">Select</option>
                                           
                                            <?php if(!empty($subsidebar)): ?>
                                                 <?php $__currentLoopData = $subsidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <optgroup label="<?php echo e($sub->sidebar_name ?? ''); ?>" style="display:none" class="sidebar_<?php echo e($sub->sidebar_id ?? ''); ?> local-link">
                                                     <?php
                                                     $sidebar2  = DB::table('sidebar_sub')->where('sidebar_id',$sub->sidebar_id)->orderBy('sidebar_id','ASC')->get();
                                                     ?>
                                                     <?php if(!empty($sidebar2)): ?>
                                                       <?php $__currentLoopData = $sidebar2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $allowSubSidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($sub1->id == $allow): ?>
                                                              <option value="<?php echo e($sub1->id ?? ''); ?>" ><?php echo e($sub1->name ?? ''); ?> </option>
                                                               <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                            
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>

                                                 </optgroup>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                             
                                        </select>
                                       
                                    </div>
                                </div>
                                    </div>
                		    </div>
                		</div>                
                    </div>
                    
                    	<?php if($total_user <= Session::get('user_count') ): ?>
                    <div class="row m-2 pb-2">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary "><?php echo e(__('common.submit')); ?></button>
                        </div>
                    </div>
                    <?php else: ?>
                    	<div class="col-md-12 text-center">
							    
							    
				<h3 class="text-danger blink_me">	Please upgrade your current plan to add User </h3>
							</div>
							
                    <?php endif; ?>
                    
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
        $('#photo').change(function(e){
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
    </script>
    
    <style>
    #image_error{
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

<script>
    $("#select_all").change(function () {  
        $(".checkbox").prop('checked', $(this).prop("checked")); 
    });
    
    $(".checkbox").click(function(){
        var id = $(this).attr('id');
        var name = $(this).attr('data-name');
      if ($(this).is(':checked')) {
     $('.sidebar_'+id).show();
      }else {
         $('.sidebar_'+id).hide();
      }
}); 
    
$( "#role_id" ).change(function() {
    var basurl = "<?php echo e(url('/')); ?>";
    var role_id = $(this).val()
 
    $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
    $.ajax({
        type: "POST",
        url: basurl+"/user_side_per",
        data: {role_id:role_id},
        dataType: "html",
        success: function (response) {
              $(".checkbox").prop('checked', false);
         var side_bar = response;
          var words = side_bar.split(",");


        for(var i=0; i<=words.length; i++)
         {
            $("#"+words[i]).prop('checked', true);
         }
         
        },

    });  
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/user/users/add.blade.php ENDPATH**/ ?>