<?php $__env->startSection('content'); ?>


<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-bus"></i> &nbsp;<?php echo e(__('bus.Add Bus')); ?> </h3>
							<div class="card-tools">
								<a href="<?php echo e(url('busView')); ?>" class="btn btn-primary  btn-sm" title="View bus"><i class="fa fa-eye"></i><?php echo e(__('messages.View')); ?> </a>
								<a class="pl-2"><a href="<?php echo e(url('busDashboard')); ?>" class="btn btn-primary  btn-xs"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?></a>
							</div>

						</div>

						<form id="quickForm" action="<?php echo e(url('busAdd')); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
							<div class="row m-2">
								<div class="col-md-3">
									<div class="form-group">
										<label for="name" style="color:red;"><?php echo e(__('bus.Bus Name')); ?>*</label>
										<input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="name" name="name" placeholder="<?php echo e(__('bus.Bus Name')); ?>" value="<?php echo e(old('name')); ?>">
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
										<label for="bus_no" style="color:red;"><?php echo e(__('bus.Bus No.')); ?>*</label>
										<input type="text" class="form-control <?php $__errorArgs = ['bus_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="bus_no" name="bus_no" placeholder="<?php echo e(__('bus.Bus No.')); ?>" value="<?php echo e(old('bus_no')); ?>">
										<?php $__errorArgs = ['bus_no'];
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
										<label for="owner_no" style="color:red;"><?php echo e(__('bus.Bus Owner Contact No.')); ?>*</label>
										<input type="text" class="form-control <?php $__errorArgs = ['owner_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="owner_no" name="owner_no" placeholder="<?php echo e(__('bus.Bus Owner Contact No.')); ?>" value="<?php echo e(old('owner_no')); ?>" maxlength="10" onkeypress="javascript:return isNumber(event)">
										<?php $__errorArgs = ['owner_no'];
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
										<label for="bus_owmer_name" style="color:red"><?php echo e(__('bus.Bus Owner Name')); ?>*</label>
										<input type="text" class="form-control <?php $__errorArgs = ['bus_owmer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)" id="bus_owmer_name" name="bus_owmer_name" placeholder="<?php echo e(__('bus.Bus Owner Name')); ?>" value="<?php echo e(old('bus_owmer_name')); ?>">
										<?php $__errorArgs = ['bus_owmer_name'];
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
										<label for="bus_registration_no" style="color:red;"><?php echo e(__('bus.Bus Registration No.')); ?>*</label>
										<input type="text" class="form-control <?php $__errorArgs = ['bus_rigistration_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="bus_registration_no" name="bus_rigistration_no" placeholder="<?php echo e(__('bus.Bus Registration No.')); ?>" value="<?php echo e(old('bus_rigistration_no')); ?>">
										<?php $__errorArgs = ['bus_rigistration_no'];
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
									<lable style="color:red;"><?php echo e(__('bus.Bus Photo')); ?>*</lable>
									
										<input type="file" class="input file form-control <?php $__errorArgs = ['bus_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bus_photo" id="bus_photo" value="<?php echo e(old('bus_photo')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_error"></p>
									<?php $__errorArgs = ['bus_photo'];
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
								<div class="col-md-3">
									<div class="form-group">
										<label for="bus_company" style="color:red;"><?php echo e(__('Bus Company.*')); ?></label>
										<input type="text" class="form-control <?php $__errorArgs = ['bus_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="bus_company" name="bus_company" placeholder="<?php echo e(__('bus.Bus Company')); ?>" value="<?php echo e(old('bus_company')); ?>">
										<?php $__errorArgs = ['bus_company'];
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
										<label for="bus_model_no" style="color:red;"><?php echo e(__('Bus Model No.*')); ?></label>
										<input type="text" class="form-control <?php $__errorArgs = ['bus_model_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="bus_model_no" name="bus_model_no" placeholder="<?php echo e(__('bus.Bus Model No.')); ?>" value="<?php echo e(old('bus_model_no')); ?>">
										<?php $__errorArgs = ['bus_model_no'];
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
										<label for="capacity_bus" style=""><?php echo e(__('bus.Capacity Of Bus')); ?></label>
										<input type="text" class="form-control <?php $__errorArgs = ['capacity_bus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="capacity_bus" name="capacity_bus" placeholder="<?php echo e(__('bus.Capacity Of Bus')); ?>" value="<?php echo e(old('capacity_bus')); ?>">
										<?php $__errorArgs = ['capacity_bus'];
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
									<lable><?php echo e(__('bus.Bus Rigistration Card')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_rigistration_card'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_rigistration_card" id="bus_rigistration_card" value="<?php echo e(old('bus_rigistration_card')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_errors"></p>
										<?php $__errorArgs = ['bus_rigistration_card'];
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
									<lable style=""><?php echo e(__('bus.Bus Insurance')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_insurance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_insurance" id="bus_insurance" value="<?php echo e(old('bus_insurance')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_errorss"></p>
										<?php $__errorArgs = ['bus_insurance'];
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
									<lable style=""><?php echo e(__('bus.Bus Other Document')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_document" id="bus_document" value="<?php echo e(old('bus_document')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_er"></p>
										<?php $__errorArgs = ['bus_document'];
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
									<lable style=""><?php echo e(__('bus.Bus Pollution Certificate')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_pollution'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_pollution" id="bus_pollution" value="<?php echo e(old('bus_pollution')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_erro"></p>
										<?php $__errorArgs = ['bus_pollution'];
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
									<lable style=""><?php echo e(__('bus.Bus Fitness Certificate')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_fitness'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_fitness" id="bus_fitness" value="<?php echo e(old('bus_fitness')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_errorr"></p>
										<?php $__errorArgs = ['bus_fitness'];
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
									<lable style=""><?php echo e(__('bus.Bus Speed Certificate')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_speed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_speed" id="bus_speed" value="<?php echo e(old('bus_speed')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_bus"></p>
										<?php $__errorArgs = ['bus_speed'];
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
									<lable style=""><?php echo e(__('bus.Bus Permit Certificate')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_permit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_permit" id="bus_permit" value="<?php echo e(old('bus_permit')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_permit"></p>
										<?php $__errorArgs = ['bus_permit'];
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
									<lable style=""><?php echo e(__('bus.Bus GPS Certificate')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_gps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_gps" id="bus_gps" value="<?php echo e(old('bus_gps')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_gps"></p>
										<?php $__errorArgs = ['student_img'];
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
									<lable style=""><?php echo e(__('bus.Bus Camera Certificate')); ?></lable>
									<div class="input file form-control <?php $__errorArgs = ['bus_camera'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
										<input type="file" name="bus_camera" id="bus_camera" value="<?php echo e(old('bus_camera')); ?>" accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_camera"></p>
										<?php $__errorArgs = ['bus_camera'];
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
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-primary "><?php echo e(__('messages.submit')); ?></button><br><br>
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
        $('#bus_photo').change(function(e){
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
        $('#bus_rigistration_card').change(function(e){
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
        $('#bus_insurance').change(function(e){
            $('#image_errorss').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_errorss').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_errorss').html("");
            }
        }else{
            $('#image_errorss').html("Image Size File");
            $(this).val('');
        }
        });
    });
    $(document).ready(function(){
        $('#bus_document').change(function(e){
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
    $(document).ready(function(){
        $('#bus_pollution').change(function(e){
            $('#image_erro').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_erro').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_erro').html("");
            }
        }else{
            $('#image_erro').html("Image Size File");
            $(this).val('');
        }
        });
    });
    $(document).ready(function(){
        $('#bus_fitness').change(function(e){
            $('#image_errorr').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_errorr').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_errorr').html("");
            }
        }else{
            $('#image_errorr').html("Image Size File");
            $(this).val('');
        }
        });
    });
    $(document).ready(function(){
        $('#bus_speed').change(function(e){
            $('#image_bus').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_bus').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_bus').html("");
            }
        }else{
            $('#image_bus').html("Image Size File");
            $(this).val('');
        }
        });
    });
    $(document).ready(function(){
        $('#bus_permit').change(function(e){
            $('#image_permit').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_permit').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_permit').html("");
            }
        }else{
            $('#image_permit').html("Image Size File");
            $(this).val('');
        }
        });
    });
    $(document).ready(function(){
        $('#bus_gps').change(function(e){
            $('#image_gps').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_gps').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_gps').html("");
            }
        }else{
            $('#image_gps').html("Image Size File");
            $(this).val('');
        }
        });
    });
    $(document).ready(function(){
        $('#bus_camera').change(function(e){
            $('#image_camera').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_camera').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_camera').html("");
            }
        }else{
            $('#image_camera').html("Image Size File");
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
    #image_errors{
        font-weight: bold;
    font-size: 14px;
    }
    #image_errorss{
        font-weight: bold;
    font-size: 14px;
    }
    #image_er{
        font-weight: bold;
    font-size: 14px;
    }
    #image_erro{
        font-weight: bold;
    font-size: 14px;
    }
    #image_errorr{
        font-weight: bold;
    font-size: 14px;
    }
    #image_bus{
        font-weight: bold;
    font-size: 14px;
    }
    #image_permit{
        font-weight: bold;
    font-size: 14px;
    }
    #image_gps{
        font-weight: bold;
    font-size: 14px;
    }
    #image_camera{
        font-weight: bold;
    font-size: 14px;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/bus/bus/add.blade.php ENDPATH**/ ?>