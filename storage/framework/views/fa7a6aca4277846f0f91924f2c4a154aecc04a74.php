<?php
    $getHostel = Helper::getHostel();
    $getHostelFloor = Helper::getHostelFloor();
    $getHostelBuildingAll = Helper::getHostelBuildingAll();
    $getHostelRoom = Helper::getHostelRoom();
    $getHostelBed = Helper::getHostelBed();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; <?php echo e(__('hostel.View Meter Units')); ?></h3>
							<div class="card-tools"> 
							    <a href="<?php echo e(url('meter_unit_view_room')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?>  </a> 
							    <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
							</div>
						</div>
                             <form id="quickForm" action="<?php echo e(url('meter_unit')); ?>" method="post" enctype='multipart/form-data'>
                              <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                <div class="col-md-2">
                        			<label><?php echo e(__('hostel.Select Hostel')); ?></label>
                    				<select class=" form-control select2" id="hostel_id" name="hostel_id">
                                        <option value=""><?php echo e(__('common.Select')); ?></option>
                                     <?php if(!empty($getHostel)): ?> 
                                          <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['hostel_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>    
                                <div class="col-md-2">
                        			<label><?php echo e(__('hostel.Select Building')); ?></label>
                    				<select class=" form-control building_id select2" id="building_id" name="building_id">
                                        <option value=""><?php echo e(__('common.Select')); ?></option>
                                          <?php if(!empty($getHostelBuildingAll)): ?> 
                                          <?php $__currentLoopData = $getHostelBuildingAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['building_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>  
                                <div class="col-md-2">
                        			<label><?php echo e(__('hostel.Select Floor')); ?></label>
                    				<select class=" form-control floor_id select2" id="floor_id" name="floor_id">
                                        <option value=""><?php echo e(__('common.Select')); ?></option>
                                          <?php if(!empty($getHostelFloor)): ?> 
                                          <?php $__currentLoopData = $getHostelFloor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['floor_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>   
                                <div class="col-md-2">
                        			<label><?php echo e(__('hostel.Select Room')); ?></label>
                    				<select class=" form-control room_id select2" id="room_id" name="room_id">
                                        <option value=""><?php echo e(__('common.Select')); ?></option>
                                          <?php if(!empty($getHostelRoom)): ?> 
                                          <?php $__currentLoopData = $getHostelRoom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['room_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>  
                               
                                <div class="col-md-2">
                                         <div class="form-group">
                                            <label><?php echo e(__('common.Month')); ?> </label>
                                            <select class="form-control select2" id="month_id" name="month_id">
                                            <option value=""><?php echo e(__('hostel.Select Month')); ?></option>  
                                            <?php if(!empty(Helper::getMonth())): ?>
                                                    <?php $__currentLoopData = Helper::getMonth(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                    <option value="<?php echo e($mon->id); ?>"  <?php echo e(($mon->id == $search['month_id']) ? 'selected' : ''); ?>>  <?php echo e($mon->name ?? ''); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>  
                                            </select>
                                         </div>
                                      </div>
                                <div class="col-md-1 text-center">
                                    <label class="text-white">Search</label>
                                    <button type="submit"class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                                </div>
                            </div> 
                        </form>
                        
                            <div class="row m-2">
                                <div class="col-md-12">
                                    <table id="" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                            <tr role="row">
                                                <th><?php echo e(__('common.SR.NO')); ?></th>
                                               
                                                  <th><?php echo e(__('hostel.Hostel')); ?></th>
                                                <th><?php echo e(__('hostel.Building')); ?></th>
                                                <th><?php echo e(__('hostel.Floor')); ?></th>
                                                <th><?php echo e(__('hostel.Room')); ?></th>                                           
                                                <th><?php echo e(__('common.Month')); ?></th>                                           
                                                <th><?php echo e(__('hostel.Meter Reading Unit')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="student_list_show">
            
                                            <?php if(!empty($data)): ?>
                                            <?php
                                                $i=1;
                                                $all_unit = 0;
                                            ?>
            
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($item['bildng_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['hostel_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['floor_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['hostel_room_name'] ?? ''); ?></td>                                               
                                        
                                                
                                                <td><?php echo e($item['month_name'] ?? ''); ?></td> 
                                                <td><?php echo e($item['meter_unit'] ?? ''); ?></td>   
                                                                              
                                            </tr>
                                            <?php
                                            $all_unit += $item['meter_unit'];
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php else: ?>
                                            <tr><td colspan="12" class="text-center">No Student Found !</td></tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>                                               
                                        
                                                
                                                <td><b>Total</b></td> 
                                                <td><b><?php echo e($all_unit ?? ''); ?></b></td>   
                                                                              
                                            </tr>
                                         </tfoot>
                                    </table>
                                </div>
                                
                                
                            </div>  
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<
<script>

    function SearchValue() {
        var basurl = "<?php echo e(url('/')); ?>";
        var hostel_id = $('#hostel_id :selected').val();
        var building_id = $('.building_id :selected').val();
        var floor_id = $('.floor_id :selected').val();
        var room_id = $('.room_id :selected').val();
        var bed_id = $('.bed_id :selected').val();
        if(hostel_id > 0 || building_id > 0 || floor_id > 0 || room_id > 0 || bed_id > 0){
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            alert("data");
            url: basurl+'/hostel_student_search',
            data: {hostel_id:hostel_id,building_id:building_id,floor_id:floor_id,room_id:room_id,bed_id:bed_id},
             //dataType: 'json',
            success: function (data) {

                $('#student_list_show').html(data);
               
            }
          });
        }else{
                alert('Please put a value in minimum one column !');
            }               
    };
</script>
<script>
        $('#hostel_id').on('change', function(e){
     var basurl = "<?php echo e(url('/')); ?>";
	var hostel_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		  url: basurl+'/hostelData/'+hostel_id,
	  success: function(data){
			$("#building_id").html(data);
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
			$("#floor_id").html(data);
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
			$("#room_id").html(data);
	  }
	});
	
});
$('#room_id').on('change', function(e){
     var basurl = "<?php echo e(url('/')); ?>";
	var room_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	 	  url: basurl+'/RoomData/'+room_id,
	  success: function(data){
			$("#bed_id").html(data);
	  }
	});
	
});
    </script>
                        

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/meter_unit_view.blade.php ENDPATH**/ ?>