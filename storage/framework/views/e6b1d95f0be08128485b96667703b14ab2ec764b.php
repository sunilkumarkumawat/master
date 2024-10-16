<?php
   $classType = Helper::classType();
    $getAttendanceStatus= Helper::getAttendanceStatus();
  
?>
 
<?php $__env->startSection('content'); ?>

<style>
    .paddingTable thead tr{
        background:#002c54;
        color:white;
    }
    
    .paddingTable thead tr th{
        padding:5px;
    }
</style>

<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<input type="hidden" id="session_id" value="<?php echo e(Session::get('role_id') ?? ''); ?>">
 <div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    <div class="card card-outline card-orange">
         <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-calendar-check-o"></i> &nbsp;<?php echo e(__('Promote Students')); ?></h3>
        <div class="card-tools">
        <a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?></a>
        </div>
        
        </div>         
        <form id="quickForm" action="<?php echo e(url('student/promote_add')); ?>" method="post" >
            <?php echo csrf_field(); ?> 
            <div class="row m-2">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="State" class="required">Admission No.</label>
                     <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="Admission No." value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                  </div>
                </div>
                <div class="col-md-2">
            		<div class="form-group">
            			<label><?php echo e(__('messages.Class')); ?></label>
            			<select class="form-control select2" id="class_type_id1" name="class_type_id" >
            			<option value=""><?php echo e(__('messages.Select')); ?></option>
                         <?php if(!empty($classType)): ?> 
                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e($search['class_type_id'] == $type->id ? 'selected' : ''); ?> ><?php echo e($type->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
            	    </div>
            	</div>
                <div class="col-md-4">
            		<div class="form-group">
            			<label><?php echo e(__('messages.Search By Keywords')); ?></label>
            			<input type="text" class="form-control"  name="name" placeholder="<?php echo e(__('messages.Ex. Student Name, Father/ Mother Name, Mobile etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>"> 
            	    </div>
            	</div> 
                <div class="col-md-1 ">
                     <label for="" class="text-white">Search</label>
            	    <button type="submit" class="btn btn-primary" onclick="SearchValue()" ><?php echo e(__('messages.Search')); ?></button>
            	</div>
            </div>
        </form>        

            <form action="<?php echo e(url('studentsPromoteAdd')); ?>" method="post">
                <?php echo csrf_field(); ?> 
                <div class="row m-2">
                	<div class="col-md-2">
                		<div class="form-group">
                			<label class="text-danger"><?php echo e(__('messages.Date')); ?>*</label>
                			<input class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" id="date" name="date" value="<?php echo e(date('Y-m-d')); ?>">
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
                	<div class="col-md-2">
                	    <div class="form-group">
                	        <label class="text-danger">Promote To*</label>
                	        <select class="form-control select2" id="promote_class_type_id" name="promote_class_type_id"  required>
                			<option value=""><?php echo e(__('messages.Select')); ?></option>
                             
                             <?php if(!empty($search['class_type_id'])): ?> 
                             <?php if(!empty($classType)): ?> 
                             <?php
                             $orderNumber =0;
                             $class_order = DB::table('class_types')->where('id',$search['class_type_id'])->whereNull('deleted_at')->first();
                             if(!empty($class_order))
                             {
                             $orderNumber = $class_order->orderBy ?? 0;
                             }
                             
                             ?>
                                  <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promoteClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($promoteClass->id ?? ''); ?>" ><?php echo e($promoteClass->name ?? ''); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  
                              <?php endif; ?>
                              <?php endif; ?>
                            </select>
                	    </div>
                	</div>
                	<div class="col-md-2">
                	    <div class="form-group">
                	        <label class="text-danger">In Session *</label>
                	       	<select class="form-control" id="new_session_id" name="session_id" required >
                                  <?php if(!empty($session)): ?> 
                                      <?php $__currentLoopData = $session; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($item->id ?? ''); ?>" 
                                         <?php if(Session::get('session_id')+1 > $item->id): ?>
                                       <?php echo e("disabled"); ?>

                                        
                                         <?php endif; ?>
                                         ><?php echo e($item->from_year ?? ''); ?><?php echo e("-"); ?><?php echo e($item->to_year ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>  
                                </select>      
                	    </div>
                	</div>
                   
                	</div> 
                
           
                	<div class="col-md-12">
             
            	
                
                  <table id="example1" class="table table-bordered table-striped border  dataTable dtr-inline paddingTable">
                  <thead>
                  <tr role="row">
                            <th><?php echo e(__('Select')); ?></th>
                            <th><?php echo e(__('student.Admission No.')); ?></th>
                            <th>Name</th>
                            <th><?php echo e(__('messages.Class')); ?></th>
                            <!-- <th><?php echo e(__('messages.Fathers Name')); ?></th>
                            <th><?php echo e(__('messages.Mobile No.')); ?></th> -->
                            <!--<th><?php echo e(__('Session')); ?></th>-->
                        </tr>
        
                    </thead>
                    <tbody class="student_list_show">
                        <input type="hidden" id="group_ids" name="group_ids">
            <?php if(!empty($data)): ?>
                <?php if($data->count() > 0): ?>
                        <?php
                           $i=1;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <!--<input type="hidden" id="class_type_id" name="class_type_id[]" value="<?php echo e($item['class_type_id'] ?? ''); ?>">-->
                                <input type="hidden" id="admission_id" name="admission_id[]" value="<?php echo e($item['id'] ?? ''); ?>">
                                <!--<input type="hidden" id="name" name="name[]" value="<?php echo e($item['name'] ?? ''); ?>">-->
                                <!--<input type="hidden" id="email" name="email[]" value="<?php echo e($item['email'] ?? ''); ?>">-->
                                <!--<input type="hidden" id="name" name="name[]" value="<?php echo e($item['name'] ?? ''); ?>">-->
                                <!--<input type="hidden" id="mobile" name="mobile[]" value="<?php echo e($item['mobile'] ?? ''); ?>">-->
                                
                            <td> <?php echo e($i++); ?> &nbsp; <input type="checkbox" id="admission_ids" name="admission_ids[]" value="<?php echo e($item['id'] ?? ''); ?>" checked>
                            
                            </td>
                            <td><?php echo e($item['admissionNo'] ?? ''); ?></td>
                            <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                            <td><?php echo e($item['ClassTypes']['name'] ?? ''); ?></td>
                            
                                                      
                        </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                                <tr>
                                    <td colspan="12" class="text-center">No Students Found !</td>
                                </tr>
                <?php endif; ?>
                  
              <?php endif; ?>    
                 
                    </tbody>
                </table>
                </div>
                 <?php if(!empty($data)): ?>
                <div class="row m-2">
                    <div class="col-md-12 text-center"><button type="submit" <?php echo e(count($data) == 0 ? 'disabled' : ''); ?> class="btn btn-primary" ><?php echo e(__('messages.Submit')); ?></button></div>
                </div>
                <?php endif; ?>
                </div>
            </form>                  
    </div>
</div>
</div>
</div>
</section>
        
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select the fees that should be assigned to all students.</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p></p><table class="table">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Session</th>
                            <th>Class</th>
                            <th>Fees Group</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id='fees_group_show'>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id='save_changes'>Save Changes</button>
                <!-- Additional buttons can be added here -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="error_modal">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-body">
        <div class="col-md-12">
            <div class="centered_flex">
                <i class="fa fa-exclamation-triangle text-warning"></i>
                <p>Fees Not Found</p>
            </div>
        </div>
        
        <div class="col-md-12">
            <p id="whatsapp_error_message" class="error_message_whatsapp">
                First create fees group for this class and session.
            </p>
        </div>
        
        <div class="col-md-12 text-right">
            <button class="modal_btn bg-white" data-bs-dismiss="modal">Discard</button>
            <button class="modal_btn bg-warning" data-bs-dismiss="modal">
                <a href="<?php echo e(url('fee_dashboard')); ?>" target="_blank">Click Here</a>
            </button>
        </div>
    </div>
  </div>
</div>
</div>
<script>
$( document ).ready(function() {
$('#promote_class_type_id').change(function(){
    var newClass = $(this).val(); 
    var newSession = $('#new_session_id').val(); 
    $('#group_ids').val(""); 	
    if(newClass != ""){
        var URL = "<?php echo e(url('/')); ?>"; 
        $.ajax({
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}, 
            type: 'post',
            url: URL + '/getFeesGroup', 
            data: {
                class_type_id: newClass,
                session_id: newSession
            },
            success: function (data) {
            var data1 = data.data;
                if(data1.length != 0){
                    var container = $('#fees_group_show');
                        container.html('');
                       data1.forEach(function(item) {
                        var newData = $('<tr class="new-data">' +
                                        '<td><input type="checkbox" class="fees_group_checked" data-id="' + item.id + '"></td>' +
                                        '<td>' + (item.from_year ?? '') + '-' + (item.to_year ?? '') + '</td>' +
                                        '<td>' + (item.class_name ?? '') + '</td>' +
                                        '<td>' + (item.fees_group_name ?? '') + '</td>' +
                                        '<td>' + (item.amount ?? '') + '</td>' +
                                    '</tr>');
                        container.append(newData);
                       $("#myModal").modal('show');
                    });  
                }else{
                    $('#error_modal').modal('show');
                }
                 
               
               
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); 
            }
     });
    }
});
 
$('#save_changes').click(function(){
    var group_ids = [];

    $( ".fees_group_checked" ).each(function( index ) {

    if ($(this).is(':checked')) {
group_ids.push($(this).attr('data-id'))

    }

});

    
$('#group_ids').val(group_ids);    
$('#myModal').modal('hide');
});
});




    function SearchValue() {
        var name = $('#searchName').val();
        var class_type_id = $('#class_type_id :selected').val();
        var admissionNo = $('#admissionNo').val();
        var URL = "<?php echo e(url('/')); ?>";
        if(class_type_id > 0 || name != '' || admissionNo != ''){
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: URL+'/SearchValuePromote',
            data: {class_type_id:class_type_id,name:name,admissionNo:admissionNo},
             //dataType: 'json',
            success: function (data) {

                $('.student_list_show').html(data);
               
            }
          });
        }else{
                toastr.error('Please put a value in minimum one column !');
            }               
    };
    
$( document ).ready(function() {
    var session_id = $('#session_id').val();
    if(session_id != 1){
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date")[0].setAttribute('min', today);        
    }
}); 
</script>  
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })

</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/promote/promote.blade.php ENDPATH**/ ?>