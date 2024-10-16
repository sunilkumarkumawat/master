<?php
    $getHostel = Helper::getHostel();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    
<section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-8 pl-0">
                <div class="card card-outline card-orange ml-1">
                 <div class="card-header bg-primary">
                <h3 class="card-title"><i class="fa fa-inbox"></i> &nbsp;<?php echo e(__('hostel.Floor List')); ?></h3>
                <div class="card-tools">
                <!--<a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add</a>-->
                </div>
                 </div>                     
                            <div class="row m-2">
                                <div class="col-md-5">
                        			<label style="color:red;"><?php echo e(__('hostel.Select Hostel')); ?>*</label>
                    				<select class="  form-control select2" id="hostel_id_search" name="hostel_id_search">
                                        <option value=""><?php echo e(__('messages.Select')); ?></option>
                                     <?php if(!empty($getHostel)): ?> 
                                          <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    </select>
                            	</div>    
                                <div class="col-md-5">
                        			<label style="color:red;"><?php echo e(__('hostel.Select Building')); ?>*</label>
                    				<select class="  form-control  building_id_search select2" id="building_id_search" name="building_id_search">
                                        <option value=""><?php echo e(__('messages.Select')); ?></option>
                                    </select>
                            	</div>                 	
                                <div class="col-md-2 text-center">
                                    <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                                    <button class="btn btn-primary" onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col-md-12" id="floor_list_show">
            
                                </div>
                            </div>                        
                </div>          
            </div>
            
            <div class="col-md-4 pr-0">
                <div class="card card-outline card-orange mr-1">
                 <div class="card-header bg-primary">
                <h3 class="card-title"><i class="fa fa-inbox"></i> &nbsp;<?php echo e(__('hostel.Add Floor')); ?> </h3>
                <div class="card-tools">
                             <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?></a>

                </div>
                
                </div>                       
                    <form id="quickForm" action="<?php echo e(url('floor_add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row m-2">
                        <div class="col-md-12">
                			<label style="color:red;"><?php echo e(__('hostel.Select Hostel')); ?>*</label>
            				<select class="  form-control  <?php $__errorArgs = ['hostel_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="hostel_id" name="hostel_id">
                                <option value=""><?php echo e(__('messages.Select')); ?></option>
                             <?php if(!empty($getHostel)): ?> 
                                  <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
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
                        <div class="col-md-12">
                			<label style="color:red;"><?php echo e(__('hostel.Select Building')); ?>*</label>
            				<select class="  form-control  <?php $__errorArgs = ['building_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> building_id select2" id="building_id" name="building_id">
                                <option value=""><?php echo e(__('messages.Select')); ?></option>
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
                        <div class="col-md-12">
                            <table class="_table w-100" id="tableId">
                                <thead>
                                  <tr>
                                    <th width="80%" style="color:red;"><?php echo e(__('hostel.Floor Name/No.')); ?>*</th>
                                     <th width="20%"></th>
                                  </tr>
                                </thead>
                                  <tbody id="table_body">
                                      <tr id="appendRow_0">
                                        <td colspan="12">
                			                <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" required name="name[]" id="name" placeholder="<?php echo e(__('hostel.Floor Name/No.')); ?>" value="<?php echo e(old('name')); ?>">
                                        </td>
                                        <td style="width: 92px;">
                                          <div class="action_container">
                                                <button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-danger btn-xs removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button>
                                          </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                </table> 
                    	</div>
                    </div>
     
                    <div class="row m-2">
                        <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('common.submit')); ?> </button>
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
$(document).ready(function() {
    
    count=0;
        $( ".removeprodtxtbx" ).eq( 0 ).css( "display", "none" );
        $(document).on("click", "#clonebtn", function() {
    count++;
        $('#table_body').append('<tr id="appendRow_'+count+'" ><td colspan="12"><input class="form-control" type="text" required name="name[]" id="name" placeholder="<?php echo e(__('hostel.Floor Name/No.')); ?>" value="<?php echo e(old('name')); ?>"></td><td style="width: 92px;"><div class="action_container"><button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger btn-xs removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button></div></td> </tr>');
            

        $( ".removeprodtxtbx" ).eq( count ).css( "display", "block" );
        $( ".addmoreprodtxtbx" ).eq( count ).css( "display", "none" );

        });
    
        $(document).on("click", "#removerow", function() {
            $(this).parents('tr').remove();
            count--;
            window.calculateSum()
        });

});
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


$('#hostel_id_search').on('change', function(e){
     var basurl = "<?php echo e(url('/')); ?>";
	var hostel_id_search = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/hostelDataSearch/'+ hostel_id_search,
	  success: function(data){
	     if(data != ''){
	         	$(".building_id_search").html(data);
	     }else{
	         	$(".building_id_search").html(data);
	         alert('Building Not Found');
	     }
	  }
	});
});

    function SearchValue() {
        var basurl = "<?php echo e(url('/')); ?>";
        var hostel_id_search = $('#hostel_id_search :selected').val();
        var building_id_search = $('.building_id_search :selected').val();
        if(hostel_id_search > 0 || building_id_search > 0 ){
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: basurl+'/floor_search_data',
            data: {hostel_id:hostel_id_search,building_id:building_id_search},
             //dataType: 'json',
            success: function (data) {

                $('#floor_list_show').html(data);
               
            }
          });
        }else{
                alert('Please put a value in minimum one column !');
            }               
    };


</script>

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/floor/add.blade.php ENDPATH**/ ?>