<?php if(!empty($bed) && count($bed) > 0): ?>
        <div style="display: flex;" >
                    <?php $__currentLoopData = $bed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $assignCheck = DB::table('hostel_assign')->where('bed_id', $bed->id)->where('bed_status', 1)->whereNull('deleted_at')->first();
                        ?>
                        
                        <?php if(!empty($assignCheck)): ?>
                            <?php
                                $admission = DB::table('admissions')->find($assignCheck->admission_id);
                            ?>
                        <div class="col-1 col-md-1  btn-xs m-1" data-id="<?php echo e($bed->id ?? ''); ?>">
                            <div class="modal_bed rounded-circle" data-id="<?php echo e($bed->id ?? ''); ?> "style="background: gainsboro;color: red;height: 66px;width: 66px; border: 2px solid gainsboro; cursor: pointer;" >
                            <i style="font-size:30px; margin-top: 7px;" class="fa fa-bed"></i> <p><?php echo e($bed->name ?? ''); ?></p>
                            <div class="icheck-primary row"  width="100%">
                   
                            </div> 
                            
                            <div id="hoverdiv_<?php echo e($bed->id ?? ''); ?>" class="hover-div rounded-circle d-none">
                                <?php if(!empty($admission->image)): ?>
                                <img src="<?php echo e(env('IMAGE_SHOW_PATH') .'profile/'. $admission->image ?? ''); ?>" width="50px" height="50px" class="rounded-circle">
                                <?php endif; ?>
                                <br><small><?php echo e($admission->first_name ?? ''); ?></small>
                            </div>
                            
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="col-1 col-md-1 btn-xs m-1" data-id="<?php echo e($bed->id ?? ''); ?>">
                            <div class="rounded-circle" style="background: gainsboro;color: green;height: 66px;width: 66px; border: 2px solid gainsboro; cursor: pointer;"><i style="font-size:30px;margin-top: 7px;" class="fa fa-bed"></i> <p><?php echo e($bed->name ?? ''); ?></p> </div>
                        </div>
                        <?php endif; ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                    <div class="d-flex text-center">
                        <a class="btn btn-primary btn-xs" href="<?php echo e(url('bed_add')); ?>" target="_blank"><i class="fa fa-external-link	"></i> No Bed Found! Add New Bed</a>
                    </div>
         <?php endif; ?>
         
         
         
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
          $(document).ready(function(){
        $(".modal_bed").click(function(){
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
        
        
        
        $('.modal_bed').mouseenter(function(){
            var hoverBedId = $(this).data('id');
           $('#hoverdiv_' + hoverBedId).removeClass('d-none');
        });
        $('.modal_bed').mouseleave(function(){
            var hoverBedId = $(this).data('id');
           $('#hoverdiv_' + hoverBedId).addClass('d-none');
        });
        
        
    });
      </script>
      
<style>
        .hover-div {
            width: 80px;
            height: 80px;
            background-color: gainsboro;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/appendbed.blade.php ENDPATH**/ ?>