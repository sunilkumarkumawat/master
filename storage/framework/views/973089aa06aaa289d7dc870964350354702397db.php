<?php
$getRole = Helper::roleType();
$classType = Helper::classType();
?>
 
<?php $__env->startSection('content'); ?>

                                                                    
<div class="content-wrapper">
   <form id="sendSms" action="<?php echo e(url('group_messages_send')); ?>" method="post" enctype='multipart/form-data'>   
            <?php echo csrf_field(); ?>
   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">
    <div class="card card-outline card-orange">
        	<div class="card-header bg-primary">
                        <?php if(Session::get('') == 3): ?>
                            <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp; <?php echo e(__('smsService.Send SMS E-Mail Whatsapp')); ?></h3>
                        <?php else: ?>						    
							<h3 class="card-title"><i class="nav-icon fas fa fa-leanpub"></i> &nbsp;<?php echo e(__('smsService.Send SMS E-Mail Whatsapp')); ?></h3>
						<?php endif; ?>
							<div class="card-tools"> 
							<?php if(Session::get('role_id') !== 3): ?>
							    <a href="<?php echo e(url('send_message_terminal')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
                            <?php endif; ?>

                                
                            </div>
						</div>
						
                 
        <section class="content">
            <div class="container-fluid">
                <div class="row m-2">
                    <div class=" col-md-12 title"><h5 class="text-danger"><?php echo e(__('smsService.Select Candidates')); ?> :-</h5></div>
            
                       	
                    <div class="col-md-3 class_type_id" >
                		<div class="form-group">
                			<label>Class</label>
                			<select class="form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="class_type_id" name="class_type_id" >
                			<option value="">Select</option>
                             <?php if(!empty($classType)): ?> 
                                  <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>
                             <?php $__errorArgs = ['class_type_id'];
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
                    <div class="col-md-3 group_name" >
                		<div class="form-group">
                			<label>Group Name</label>
                			<select class="form-control <?php $__errorArgs = ['group_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="group_name" name="group_name" >
                			<option value="">Select</option>
                             
                                     <option value="">Select</option>
                                 
                            </select>
                             <?php $__errorArgs = ['group_name'];
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
                
                 <!--   <div class="col-md-1">
                         <label class="text-white"><?php echo e(__('messages.Search')); ?></label>
                	    <button class="btn btn-primary" ><?php echo e(__('smsService.Search')); ?></button>
                	</div>-->
                </div>
      
        </section>
        <section>
      
    
                <div class="row m-2">
                    <div class="col-md-12" id="student_list_show" style="height: 110px; overflow-y: scroll;">

                    </div>
                </div>
         </section>
            <div id="chcekshow" class="d-none">
            <hr>
            <div class="row m-2">
                <div class=" col-md-12 title"><h5 class="text-danger"><?php echo e(__('smsService.Message Details')); ?>:-</h5></div>
        
        		<div class="col-md-12">
        	    	<div class="form-group">
        				<label style="color:black;"><?php echo e(__('smsService.Message')); ?></label>
        				<textarea id="message_box" name="message" class="form-control "><?php echo e(old('message') ?? ''); ?></textarea>
        				    
                        <div id="count"><?php echo e(__('smsService.Total Characters')); ?>: <span id="current_count">0</span></div>        				    
        		    </div>
        	    </div>
        		<div class="col-md-12">
        	    	<div class="form-group">
        				<label style="colo:black"><?php echo e(__('Attachment')); ?></label></br>
        				<input id='attachment_box' type='file' name='file'  />   				    
        		    </div>
        	    </div>
        
        	</div>
        	

            <div class="row m-2">
                <div class="col-md-12 text-center pb-2">
                    <button type="submit"  class="btn btn-primary"><?php echo e(__('messages.Send Message')); ?></button>
                </div>
                <!--<div class="col-md-12 text-right pb-2">-->
                <!--    <button type="submit" id="submit2" style="opacity:0"></button>-->
                <!--</div>-->
            </div>
            </div>
        
    </div>
</div>
</div>
</div>
</div>
</section>
</form>
</div>

<script src="https://demo.smart-school.in/backend/plugins/ckeditor/ckeditor.js"></script>

<script>
    var baseurl = "https://www.school.rukmanisoftware.com/";
    CKEDITOR.replace(ckeditor, {
      toolbar: 'Ques',    
      allowedContent : true,              
      extraPlugins: 'ckeditor_wiris',
      enterMode : CKEDITOR.ENTER_BR,
      shiftEnterMode: CKEDITOR.ENTER_P,
      customConfig: baseurl+'public/assets/school/js/ckeditor_config.js'
    });
</script>



<script type="text/javascript">
$('textarea').keyup(function() {    
    var characterCount = $(this).val().length,
        current_count = $('#current_count'),
        count = $('#count');    
        current_count.text(characterCount);        
});

    // function SearchValue() {
       
    //     var class_type_id = $('#class_type_id :selected').val();
    //     var role_id = $('#role :selected').val();
    //     if(class_type_id > 0 || role_id > 0){
    //     $.ajax({
    //              headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
    //         type:'post',
    //         url: '/sms_search_data',
    //         data: {class_type_id:class_type_id,role_id:role_id},
    //          //dataType: 'json',
    //         success: function (data) {
    //             $('#student_list_show').html(data);
    //             $('#chcekshow').removeClass('d-none');
    //         }
    //       });
    //     }else{
    //         toastr.error('Please put a value in column !');
    //     }               
    // };

</script>


<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



 <script>
        $('#class_type_id').on('change', function(e){
            
                var baseurl = "<?php echo e(url('/')); ?>";
            	var class_type_id = $(this).val();
                $.ajax({
                     headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            	  url: baseurl+'/getGroupData/'+class_type_id,
            	  success: function(data){
            			$("#group_name").html(data);
            		//	 $('#chcekshow').removeClass('d-none');
            	  }
            	});
            	
            });
        $('#group_name').on('change', function(e){
            
               
            			 $('#chcekshow').removeClass('d-none');
            
            	
            	
            });
            
            
            </script>
            
            <script>
    $(document).ready(function() {
     $("#sendSms").submit(function (e) {
      
     var attachment = $('#attachment_box').val();
     var message = $('#message_box').val();
     
     var count = 1;
     if(attachment == '' && message == '')
     {
         count = 0;
     }
     
     
     if(count == 0)
     {
         e.preventDefault();
         toastr.error('You have to select message or attachment')
     }

});
});
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/sms_service/group_messages_send.blade.php ENDPATH**/ ?>