<?php
    $getHostel = Helper::getHostel();
    $getHostelFloor = Helper::getHostelFloor();
    $getHostelBuildingAll = Helper::getHostelBuildingAll();
    $getHostelRoom = Helper::getHostelRoom();
    $getHostelBed = Helper::getHostelBed();
   // dd($data);
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; <?php echo e(__('hostel.Add Meter Units')); ?></h3>
							<div class="card-tools"> 
							    <a href="<?php echo e(url('meter_unit')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.View')); ?> </a> 
							    <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
							</div>
						</div>
                             <form id="quickForm" action="<?php echo e(url('meter_unit_view_room')); ?>" method="post" enctype='multipart/form-data'>
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
                                <!-- <div class="col-md-2">
                        			<label><?php echo e(__('hostel.Select Bed')); ?></label>
                    				<select class=" form-control bed_id" id="bed_id" name="bed_id">
                                        <option value=""><?php echo e(__('messages.Select')); ?></option>
                                          <?php if(!empty($getHostelBed)): ?> 
                                          <?php $__currentLoopData = $getHostelBed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['bed_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>                	 -->
                                <div class="col-md-1 text-center">
                                    <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                                    <button type="submit"class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                                </div>
                            </div> 
                        </form>
                        <form id="quickForm" action="<?php echo e(url('meter_unit_update_room')); ?>" method="post" enctype='multipart/form-data'>
                              <?php echo csrf_field(); ?>
                            <div class="row m-2">
                                
                                
                                   <div class="col-md-2">
                                         <div class="form-group">
                                            <label class="text-danger"><?php echo e(__('common.Month')); ?> * </label>
                                            <select class="form-control select2" id="month_id" name="month_id" required>
                                            <option value=""required><?php echo e(__('hostel.Select Month')); ?></option>  
                                            <?php if(!empty(Helper::getMonth())): ?>
                                                    <?php $__currentLoopData = Helper::getMonth(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                    <option value="<?php echo e($mon->id); ?>"  >  <?php echo e($mon->name ?? ''); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>  
                                            </select>
                                            
                                         </div>
                                      </div>
                                      </div>
                              <div class="row m-2">

                                <div class="col-md-12">
                                    
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                            <tr role="row">
                                                <th><?php echo e(__('common.SR.NO')); ?></th>
                                               
                                                <th><?php echo e(__('hostel.Hostel')); ?></th>
                                                <th><?php echo e(__('hostel.Building')); ?></th>
                                                <th><?php echo e(__('hostel.Floor')); ?></th>
                                                <th><?php echo e(__('hostel.Room')); ?></th>                                           
                                                <th><?php echo e(__('hostel.From Unit')); ?></th>                                           
                                                <th><?php echo e(__('hostel.To Unit')); ?></th>                                           
                                                <th><?php echo e(__('hostel.Meter Reading Unit')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="student_list_show">
            
                                            <?php if(!empty($data)): ?>
                                            <?php
                                                $i=1;
                                                $form_u = 1;
                                                $form_unit = 1;
                                                $to_u =1;
                                                $to_unit= 1;
                                                $meter_u= 1;
                                                $meter_unit= 1;
                                            ?>
            
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php
                                            $lastunit = DB::table('hostel_meter_units')->where('hostel_id',$item->hostel_id)->where('floor_id',$item->floor_id)->where('building_id',$item->building_id)->where('hostel_room_id',$item->id)->orderBy('id','DESC')->first();
                                             
                                            ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($item['Hostel']['name'] ?? ''); ?></td>
                                                <td><?php echo e($item['HostelBuilding']['name'] ?? ''); ?></td>
                                                <td><?php echo e($item['HostelFloor']['name'] ?? ''); ?></td>
                                                <td><?php echo e($item['name'] ?? ''); ?></td>                                               
                                                <td>
                                                <input type="text" name="from_unit[]"onBlur="calculateAmount(this.value,<?php echo e($form_u++); ?>);" id="from_unit_<?php echo e($form_unit++); ?>" value="<?php echo e($lastunit->to_unit ?? ''); ?>"class="form-control" placeholder="from unit" onkeypress="javascript:return isNumber(event)" >
                                                </td>                                               
                                                <td>
                                                <input type="text" name="to_unit[]" onBlur="calculateAmount(this.value,<?php echo e($to_u++); ?>);"id="to_unit_<?php echo e($to_unit++); ?>" class="form-control" placeholder="To unit" onkeypress="javascript:return isNumber(event)">
                                                </td>                                               
                                        
                                                <td>
                                                <input type="hidden" name="hostel_id[]" id="hostel_id" class="form-control" value="<?php echo e($item->hostel_id ?? ''); ?>">
                                                <input type="hidden" name="floor_id[]" id="floor_id" class="form-control" value="<?php echo e($item->floor_id ?? ''); ?>">
                                                <input type="hidden" name="building_id[]" id="building_id" class="form-control" value="<?php echo e($item->building_id ?? ''); ?>">
                                                <input type="hidden" name="hostel_room_id[]" id="hostel_room_id" class="form-control" value="<?php echo e($item->id ?? ''); ?>">
                                                <input type="text" name="meter_unit[]" id="meter_unit_<?php echo e($meter_unit++); ?>"onblur="calculateSum(this.value,<?php echo e($meter_u++); ?>)" class="form-control" placeholder="meter reading unit" onkeypress="javascript:return isNumber(event)"value="0">
                                                </td>                                    
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php else: ?>
                                            <tr><td colspan="12" class="text-center"><?php echo e(__('hostel.No Student Found')); ?> !</td></tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                             
                                <div class="col-md-1 text-center">
                                    <label class="text-white">Search</label>
                                    <button type="submit"class="btn btn-primary" ><?php echo e(__('common.Submit')); ?></button>
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


    function calculateAmount(value,row_id) {
        var tounit = $('#to_unit_'+ row_id).val();
          var fromunit = $('#from_unit_'+ row_id).val();
           var totalamount = tounit - fromunit;

      if(tounit >0){
           $('#meter_unit_'+row_id).val(totalamount);
      }

       
        calculateSum();
    };  

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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/meter_unit.blade.php ENDPATH**/ ?>