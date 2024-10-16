<?php
  $getHostel = Helper::getHostel(); 
  $getHostelBuildingAll = Helper::getHostelBuildingAll();
  $getHostelFloor = Helper::getHostelFloor();
  $getHostelRoom = Helper::getHostelRoom();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-edit"></i> &nbsp; <?php echo e(__('hostel.Edit Bed')); ?></h3>
                    <div class="card-tools">
                    <!--<a href="<?php echo e(url('bed_view')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> View </a>-->
                    <a href="<?php echo e(url('bed_view')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i><?php echo e(__('View')); ?>  </a>
                <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?> </a>
                    </div>
                    
                    </div>        
        <form id="quickForm" action="<?php echo e(url('bed_edit')); ?>/<?php echo e($data['id'] ?? ''); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row m-2">
            <div class="col-md-3">
    			<label style="color:red;"><?php echo e(__('hostel.Select Hostel')); ?>*</label>
				<select class="form-control <?php $__errorArgs = ['hostel_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="hostel_id" name="hostel_id">
                 <?php if(!empty($getHostel)): ?> 
                      <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == $data['hostel_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
                 <?php $__errorArgs = ['hostel_id'];
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
    			<label style="color:red;"><?php echo e(__('hostel.Select Building')); ?>*</label>
				<select class="form-control <?php $__errorArgs = ['building_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> building_id" id="building_id" name="building_id">
                <?php if(!empty($getHostelBuildingAll)): ?> 
                      <?php $__currentLoopData = $getHostelBuildingAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == $data['building_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>                            
                </select>
                 <?php $__errorArgs = ['building_id'];
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
    			<label style="color:red;"><?php echo e(__('hostel.Select Floor')); ?>*</label>
				<select class="form-control <?php $__errorArgs = ['floor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> floor_id" id="floor_id" name="floor_id">
                <?php if(!empty($getHostelFloor)): ?> 
                      <?php $__currentLoopData = $getHostelFloor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == $data['floor_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>                            
                </select>
                 <?php $__errorArgs = ['floor_id'];
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
    			<label style="color:red;"><?php echo e(__('hostel.Select Room')); ?>*</label>
				<select class="form-control <?php $__errorArgs = ['room_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> room_id" id="room_id" name="room_id">
                <?php if(!empty($getHostelRoom)): ?> 
                      <?php $__currentLoopData = $getHostelRoom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == $data['room_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>                            
                </select>
                 <?php $__errorArgs = ['room_id'];
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
    			<label style="color:red;"><?php echo e(__('hostel.Bed Name/No.')); ?>*</label>
    			<input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" id="name" placeholder="<?php echo e(__('hostel.Bed Name/No.')); ?>" value="<?php echo e($data['name'] ?? ''); ?>">
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

        <div class="row m-2">
            <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary"><?php echo e(__('common.Update')); ?> </button>
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

$('#hostel_id').on('change', function(e){
     var basurl = "<?php echo e(url('/')); ?>";
	var hostel_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/hostelData/'+hostel_id,
	  success: function(data){
	     if(data != ''){
	         	$(".building_id").html(data);
	     }else{
	         	$(".building_id").html(data);
	         alert('Building Not Found');
	     }
	  }
	});
});

$('#building_id').on('change', function(e){
     var basurl = "<?php echo e(url('/')); ?>";
	var building_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/BuildingData/'+building_id,
	  success: function(data){
	     if(data != ''){
	         	$(".floor_id").html(data);
	     }else{
	         	$(".floor_id").html(data);
	         alert('Floor Not Found');
	     }
	  }
	});
});

$('#floor_id').on('change', function(e){
     var basurl = "<?php echo e(url('/')); ?>";
	var floor_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/FloorData/'+floor_id,
	  success: function(data){
	     if(data != ''){
	         	$(".room_id").html(data);
	     }else{
	         	$(".room_id").html(data);
	         alert('Room Not Found');
	     }
	  }
	});
});
</script>

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/bed/edit.blade.php ENDPATH**/ ?>