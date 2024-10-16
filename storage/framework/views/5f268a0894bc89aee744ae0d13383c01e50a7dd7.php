<?php
$classType = Helper::classType();
$getAttendanceStatus= Helper::getAttendanceStatus();
?>
 
<?php $__env->startSection('content'); ?>
<input type="hidden" id="session_id" value="<?php echo e(Session::get('role_id') ?? ''); ?>">
 <div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card card-outline card-orange">
         <div class="card-header bg-primary flex_items_toggel">
        <h3 class="card-title"><i class="fa fa-calendar-check-o"></i> &nbsp; <?php echo e(__('staff.Fill Staff Attendance')); ?></h3>
        <div class="card-tools">
        <a href="<?php echo e(url('staff/Attendance/view')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i> <span class="Display_none_mobile"><?php echo e(__('common.View')); ?> </span></a>
        <a href="<?php echo e(url('staff_file')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('common.Back')); ?></span> </a>
        </div> 
        </div>         
        <form id="quickForm" action="#" method="post" >
            <?php echo csrf_field(); ?> 
               
            <div class="row m-2">
                <div class="col-md-5">
            		<div class="form-group">
            			<label><?php echo e(__('common.Search By Keywords')); ?></label>
            			<input type="text" class="form-control" id="searchName" name="name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>"> 
            	    </div>
            	</div> 
                <div class="col-md-1 ">
                     <label for="" class="text-white"><?php echo e(__('common.Search')); ?></label>
            	    <button type="button" class="btn btn-primary" onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
            	</div>
            	</div>
        </form>        
        <form action="<?php echo e(url('staff_attendance_add')); ?>" method="post">
                <?php echo csrf_field(); ?> 
                <div class="row m-2">
                    <div class="col-md-2">
                		<div class="form-group">
                			<label class="text-danger">Time*</label>
                                    <input type="time" class="form-control  <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="select-time"  name="time" required  <?php echo e(( Session::get('role_id') == 2 ? 'readonly' : '' )); ?>>  
                                    <?php $__errorArgs = ['time'];
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
                			<label class="text-danger"><?php echo e(__('common.Date')); ?>*</label>
                			<input class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" id="date" name="date" value="<?php echo e(date('Y-m-d')); ?>" <?php echo e(( Session::get('role_id') == 2 ? 'readonly' : '' )); ?>>
                              	<?php $__errorArgs = ['date'];
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
                <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-striped border  dataTable dtr-inline padding_table">
                  <thead>
                  <tr role="row">
                            <th><?php echo e(__('common.SR.NO')); ?></th>
                            <th><?php echo e(__('common.Name')); ?></th>
                            <th><?php echo e(__('common.Fathers Name')); ?></th>
                            <th><?php echo e(__('common.Mobile No.')); ?></th>
                            <th><?php echo e(__('common.Attendance')); ?></th>
                        </tr>
        
                    </thead>
                    <tbody class="student_list_show">
                        <?php if(!empty($data)): ?>
                                <?php
                               
                    $current_date =   DB::table('teacher_attendance')->where('staff_id',Session::get('staff_id'))->WhereDate('date',date('Y-m-d'))->get(['attendance_status_id'])->first();
                    
                                   $i=1
                                ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Session::get('role_id') != 1): ?>
                                    <?php if($item->id == Session::get('id')): ?>    

                                    <tr>
                                        <input type="hidden" id="staff_id" name="staff_id[]" value="<?php echo e($item['id'] ?? ''); ?>">
                                        <input type="hidden" id="email" name="email[]" value="<?php echo e($item['email'] ?? ''); ?>">
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                                        <td><?php echo e($item['father_name'] ?? ''); ?></td>
                                        <td><?php echo e($item['mobile'] ?? ''); ?></td>
                                        <td style="width: 30% !important;">
                                			<select class="form-control" id="attendance_status" name="attendance_status[]" >
                                             <?php if(!empty($getAttendanceStatus)): ?> 
                                                    <?php $__currentLoopData = $getAttendanceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                            <option value="<?php echo e($attendance_status->id ?? ''); ?>" <?php if(!empty($current_date)): ?> <?php echo e(( $attendance_status->id == $current_date->attendance_status_id ? 'selected' : '' )); ?>   <?php endif; ?> ><?php echo e($attendance_status->name ?? ''); ?></option>
                                                       
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>                                    
                                        </td>                            
                                    </tr>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <tr>
                                        <input type="hidden" id="staff_id" name="staff_id[]" value="<?php echo e($item['id'] ?? ''); ?>">
                                        <input type="hidden" id="email" name="email[]" value="<?php echo e($item['email'] ?? ''); ?>">
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                                        <td><?php echo e($item['father_name'] ?? ''); ?></td>
                                        <td><?php echo e($item['mobile'] ?? ''); ?></td>
                                        <td style="width: 30% !important;">
                                			<select class="form-control" id="attendance_status" name="attendance_status[]" >
                                             <?php if(!empty($getAttendanceStatus)): ?> 
                                                    <?php $__currentLoopData = $getAttendanceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                            <option value="<?php echo e($attendance_status->id ?? ''); ?>" ><?php echo e($attendance_status->name ?? ''); ?></option>
                                                       
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>                                    
                                        </td>                            
                                    </tr>
                                <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                </div>
                <div class="col-md-12 mb-3">
                   
                <?php if(Session::get('role_id') == 2): ?>
                <?php if(empty($current_date)): ?>
                     <div class="text-center"><button type="submit" class="btn btn-primary" ><?php echo e(__('staff.Submit Attendance')); ?></button></div>
                <?php endif; ?>
                <?php else: ?>
                     <div class="text-center"><button type="submit" class="btn btn-primary" ><?php echo e(__('staff.Submit Attendance')); ?></button></div>
                
                <?php endif; ?>
                </div>
                 </div>
            </form>                  
    </div>
</div>
</div>
</div>
</section>
        
</div>
<style>
      .padding_table thead tr{
    background: #002c54;
    color:white;
    }
        
    .padding_table th, .padding_table td{
         padding:5px;
         font-size:14px;
    }
</style>


<script>
    function SearchValue() {
        var name = $('#searchName').val();
        var basurl = "<?php echo e(url('/')); ?>";
        if(name != ''){
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: basurl+'/SearchValueStaffAtten',
            data: {name:name},
             //dataType: 'json',
            success: function (data) {

                $('.student_list_show').html(data);
               
            }
          });
        }else{
                toastr.error('Please put a value in search box !');
            }               
    };

$( document ).ready(function() {
    var session_id = $('#session_id').val();
    if(session_id != 1){
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date")[0].setAttribute('min', today);        
    }
    // Get the current time
    var currentTime = new Date();
    
    // Format the time as HH:MM
    var hours = currentTime.getHours().toString().padStart(2, '0');
    var minutes = currentTime.getMinutes().toString().padStart(2, '0');
    var currentTimeString = hours + ':' + minutes;
    
    // Set the current time as the value of the input element
    document.getElementById('select-time').value = currentTimeString;
});   

</script>  

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/staff/staff_attendance/add.blade.php ENDPATH**/ ?>