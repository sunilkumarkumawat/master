<?php
   $getHostel = Helper::getHostel();
    $getHostelFloor = Helper::getHostelFloor();
    $getHostelBuildingAll = Helper::getHostelBuildingAll();
    $getHostelRoom = Helper::getHostelRoom();
    $getHostelBed = Helper::getHostelBed();
    $getMonth = Helper::getMonth();
$getPaymentMode = Helper::getPaymentMode();
?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange mb-0">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('hostel.Electricity Bill Payment')); ?></h3>
                            <div class="card-tools">
                                <!--<a href="<?php echo e(url('fees/index')); ?>" class="btn btn-primary  btn-sm" title="View Fees"><i class="fa fa-eye"></i><?php echo e(__('messages.View')); ?> </a>-->
                                <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <div class"card-body">
                            <form id="quickForm" action="<?php echo e(url('electricity_bill_payment_add')); ?>" method="post" enctype='multipart/form-data'>
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
                            <!--    <div class="col-md-2">
                        			<label><?php echo e(__('Select Bed')); ?></label>
                    				<select class=" form-control bed_id" id="bed_id" name="bed_id">
                                        <option value=""><?php echo e(__('messages.Select')); ?></option>
                                          <?php if(!empty($getHostelBed)): ?> 
                                          <?php $__currentLoopData = $getHostelBed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['bed_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>           -->     	
                            <div class="col-md-2">
                        			<label><?php echo e(__('hostel.Select Month')); ?></label>
                    				<select class=" form-control month_id select2" id="month_id" name="month_id">
                                        <option value=""><?php echo e(__('common.Select')); ?></option>
                                         <?php if(!empty($getMonth)): ?> 
                                          <?php $__currentLoopData = $getMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($key > 8 ? '' : 0); ?><?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['month_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>          	
                                <div class="col-md-1 text-center">
                                    <label class="text-white">Search</label>
                                    <button type="submit"class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                                </div>
                            </div> 
                        </form>
                            <?php if(!empty($data)): ?>
                            <div class="row m-2" style="max-height: 225px;overflow-y: scroll;">
                                <table class="table table-bordered small_td" id="trColor">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th><?php echo e(__('common.SR.NO')); ?></th>
                                            <th class="text-center"><?php echo e(__('hostel.Admission No.')); ?> </th>
                                            <th><?php echo e(__('common.Name')); ?></th>
                                            <th><?php echo e(__('common.Fathers Name')); ?></th>
                                            <!--<th>Mother Name</th>-->
                                            <th><?php echo e(__('common.Mobile')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        //dd($data);
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="quickCollect" style="cursor:pointer; " onclick="showData(<?php echo e($item['id'] ?? ''); ?>)" >
                                            <td><?php echo e($i++); ?></td>
                                            <td class="text-center"><?php echo e($item['admissionNo']  ?? ''); ?></td>
                                            <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                                            <td><?php echo e($item['father_name']  ?? ''); ?></td>
                                            <!--<td><?php echo e($item['mother_name'] ?? ''); ?></td>-->
                                            <td><?php echo e($item['mobile'] ?? ''); ?></td>
                                        </tr>                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="student_fees_detail"></div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $('#trColor tr').click(function() {
        $(this).css('backgroundColor', '#6639b5c4');
        $(this).css('color', '#fff');
        $( this ).siblings().css( "background-color", "white" );
        $( this ).siblings().css( "color", "black" );
    });
});

    function showData(hostel_assign_id) {
        
        var hostel_id = $("#hostel_id").val();
        var building_id = $("#building_id").val();
        var floor_id = $("#floor_id").val();
        var room_id = $("#room_id").val();
        var month_id = $("#month_id").val();
 
     
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/hostel_fees_onclick',
            data: {
                hostel_assign_id: hostel_assign_id,
                hostel_id :hostel_id,
                building_id :building_id,
                floor_id :floor_id,
                room_id :room_id,
                month_id :month_id
            },
        
            success: function(data) {
                if (data == 0) {
                    alert('Please Assign the Fees for this Class !');
                    window.location.href = "<?php echo e(url('fees_master')); ?>";
                } else {

                    $('.student_fees_detail').html(data);
                }


            }
        });
    };


    function SearchValue() {
         var basurl = "<?php echo e(url('/')); ?>";
        var class_type_id = $('#class_type_id :selected').val();
        var section_id = $('#section_id :selected').val();
        var name = $('#name').val();
        if (section_id > 0 || class_type_id > 0 || name != '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: basurl+'/SearchValueStd',
                data: {
                    class_type_id: class_type_id,
                    section_id: section_id,
                    name: name
                },
                //dataType: 'json',
                success: function(data) {
                    $('.student_list_show').html(data);
                }
            });
        } else {
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/fees/electricityBillPayment/add.blade.php ENDPATH**/ ?>