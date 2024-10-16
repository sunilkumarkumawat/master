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
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; <?php echo e(__('hostel.View Hostel Students')); ?></h3>
							<div class="card-tools"> 
							    <a href="<?php echo e(url('hostel_assign')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?>  </a> 
							    <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
							</div>
						</div>
                             <form id="quickForm" action="<?php echo e(url('assign_student_view')); ?>" method="post" enctype='multipart/form-data'>
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
                        			<label><?php echo e(__('hostel.Select Bed')); ?></label>
                    				<select class=" form-control bed_id select2" id="bed_id" name="bed_id">
                                        <option value=""><?php echo e(__('common.Select')); ?></option>
                                          <?php if(!empty($getHostelBed)): ?> 
                                          <?php $__currentLoopData = $getHostelBed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['bed_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>                	
                                <div class="col-md-1 text-center">
                                    <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                                    <button type="submit"class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                                </div>
                            </div> 
                        </form>
                            <div class="row m-2">
                                <div class="col-md-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                           
                                            <tr role="row">
                                                <th><?php echo e(__('common.SR.NO')); ?></th>
                                                <th>Renewel Date</th>
                                                <th>Admission Date</th>
                                                <th><?php echo e(__('hostel.Student Name')); ?></th>
                                                <th><?php echo e(__('hostel.Building')); ?></th>
                                                <th><?php echo e(__('hostel.Floor')); ?></th>
                                                <th><?php echo e(__('hostel.Room')); ?></th>
                                                <th><?php echo e(__('hostel.Bed')); ?></th>
                                            
                                                <th><?php echo e(__('common.Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="student_list_show">
            
                                            <?php if(!empty($data)): ?>
                                            
                                            <?php
                                            
                                                $i=1;
                                            ?>
            
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php
                                            $value= Helper::getDocumentsIsNull($item->id ?? '');
                                          
                                            ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php if(!empty($item->hostel_renewal_date)): ?> <?php echo e(date('d-M-Y', strtotime($item->hostel_renewal_date))); ?> <?php endif; ?></td>
                                                <td><?php if(!empty($item->date)): ?> <?php echo e(date('d-M-Y', strtotime($item->date))); ?> <?php endif; ?></td>
                                                <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']  ?? ''); ?></td>
                                                <td><?php echo e($item['HostelBuilding']['name'] ?? ''); ?></td>
                                                <td><?php echo e($item['HostelFloor']['name'] ?? ''); ?></td>
                                                <td><?php echo e($item['HostelRoom']['name'] ?? ''); ?></td>
                                               <td><?php echo e($item['HostelBed']['name']  ?? ''); ?></td>
                                               
                                        
                                                <td>
                                                    <a href="<?php echo e(url('hostel_student_print')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  btn-xs" title="Student Print"  target="_blank"><i class="fa fa-print"></i></a> 
                                                    <a href="<?php echo e(url('hostel_student_edit')); ?>/<?php echo e($item['admission_id'] ?? ''); ?>" class="btn btn-primary ml-3 btn-xs" title="Edit Student" ><i class="fa fa-edit"></i></a> 
                                                    <a href="javascript:;" data-admission_id='<?php echo e($item['admission_id'] ?? ''); ?>' data-id='<?php echo e($item['id'] ?? ''); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-primary btn-xs ml-3" title="Delete Floor"><i class="fa fa-trash-o"></i></a>
                                                </td>                                    
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php else: ?>
                                            <tr><td colspan="12" class="text-center"><?php echo e(__('hostel.No Student Found')); ?> !</td></tr>
                                            <?php endif; ?>
                                            
                                        </tbody>
                                       
                                    </table>
                                     <!--<div style="color:#ffb3b3" class="text-right"><b><?php echo e(__('hostel.Pink row indicate that the students documents are still pending')); ?></b></div>-->
                                </div>
                            </div>  
                       
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  var admission_id = $(this).data('admission_id'); 
  
  $('#admission_id').val(admission_id); 
  $('#delete_id').val(delete_id); 
  } );
</script>
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

                        <!-- The Modal -->
                        <div class="modal" id="Modal_id">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background: #555b5beb;">
                        
                              <div class="modal-header">
                                <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </div>
                        
                              <form action="<?php echo e(url('hostel_student_delete')); ?>" method="post">
                                      	 <?php echo csrf_field(); ?>
                              <div class="modal-body">
                                      <input type=hidden id="delete_id" name="delete_id">
                                      <input type=hidden id="admission_id" name="admission_id">
                                      <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5>
                              </div>
                              <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
                                 </div>
                               </form>
                            </div>
                          </div>
                        </div>
                        
                 
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/view.blade.php ENDPATH**/ ?>