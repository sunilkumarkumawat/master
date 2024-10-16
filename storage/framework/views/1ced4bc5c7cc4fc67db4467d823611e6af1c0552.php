<?php
    $getHostel = Helper::getHostel();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-bed"></i> &nbsp;<?php echo e(__('hostel.View Bed')); ?></h3>
							<div class="card-tools"> 
							    <a href="<?php echo e(url('bed_add')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?> </a> 
							    <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a> 
							</div>
						</div>
						<div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                    			<label style="color:red;"><?php echo e(__('hostel.Select Hostel')); ?>*</label>
                				<select class="  form-control select2" id="hostel_id" name="hostel_id">
                                    <option value=""><?php echo e(__('common.Select')); ?></option>
                                 <?php if(!empty($getHostel)): ?> 
                                      <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                        	</div>    
                            <div class="col-md-3">
                    			<label style="color:red;"><?php echo e(__('hostel.Select Building')); ?>*</label>
                				<select class="  form-control building_id select2" id="building_id" name="building_id">
                                    <option value=""><?php echo e(__('common.Select')); ?></option>
                                </select>
                        	</div>  
                            <div class="col-md-3">
                    			<label style="color:red;"><?php echo e(__('hostel.Select Floor')); ?>*</label>
                				<select class="  form-control floor_id select2" id="floor_id" name="floor_id">
                                    <option value=""><?php echo e(__('common.Select')); ?></option>
                                </select>
                        	</div>   
                            <div class="col-md-2">
                    			<label style="color:red;"><?php echo e(__('hostel.Select Room')); ?>*</label>
                				<select class="  form-control room_id select2" id="room_id" name="room_id">
                                    <option value=""><?php echo e(__('common.Select')); ?></option>
                                </select>
                        	</div>                        	
                            <div class="col-md-1 text-center">
                                <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                                <button class="btn btn-primary" onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="bed_list_show">
        
                            </div>
                        </div>                        
						</div>
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

    function SearchValue() {
        var basurl = "<?php echo e(url('/')); ?>";
        var hostel_id = $('#hostel_id :selected').val();
        var building_id = $('.building_id :selected').val();
        var floor_id = $('.floor_id :selected').val();
        var room_id = $('.room_id :selected').val();
        if(hostel_id > 0 || building_id > 0 || floor_id > 0 || room_id > 0){
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: basurl+'/bed_search_data',
            data: {hostel_id:hostel_id,building_id:building_id,floor_id:floor_id,room_id:room_id},
             //dataType: 'json',
            success: function (data) {

                $('#bed_list_show').html(data);
               
            }
          });
        }else{
                alert('Please put a value in minimum one column !');
            }               
    };
</script>

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/bed/view.blade.php ENDPATH**/ ?>