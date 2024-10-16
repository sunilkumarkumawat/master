 
<?php $__env->startSection('content'); ?>
 <div class="content-wrapper">

    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
				<div class="card-header bg-primary">
					<h3 class="card-title"><i class="fa fa-shirtsinbulk"></i> &nbsp;Today's Student's Birthday List</h3>
					<div class="card-tools"> 
							<?php if(Session::get('role_id') !== 3): ?>
							    <a href="<?php echo e(url('send_message_terminal')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
                            <?php endif; ?>

                                
                            </div>
				</div>   
				
			
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead class="bg-primary">
                  <tr role="row">
                      <th><input type="checkbox" name="checkbox" id="select_all_student" /> <?php echo e(__('messages.Select')); ?></th>
                      <!--<th><?php echo e(__('messages.S.NO')); ?></th>-->
                            <th><?php echo e(__('Student Name')); ?></th>
                            <th><?php echo e(__('messages.Class')); ?></th>
                            <th><?php echo e(__('messages.F Name')); ?></th>
                            
                            <th><?php echo e(__('messages.Mobile')); ?></th>
                            <th><?php echo e(__('messages.E-Mail')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            <th ><?php echo e(__('Status')); ?></th>
                            <!--<th>Joining Date</th>-->
                           
                    </tr>
                             
                      
                  </thead>
                     <form action="<?php echo e(url('send_wishes')); ?>" method='post'>
                <?php echo csrf_field(); ?>
                  <tbody>
                      
                      <?php if(!empty($data)): ?>
                     
                        <?php
                           $i=1
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php
                        $old = DB::table('birthday_wishes')->where('role_id', $item['role_id'])->where('admission_id', $item['id'])->whereNull('deleted_at')->first();
                        
                        ?>
                     
                        
                      
                        <tr>
                                <td>
                                     <?php if(!empty($old)): ?>
                                       <?php if($old->status ==1): ?>
                                     
                                   <a href="<?php echo e(url('resend_message')); ?>">Click Here</a>  For Resend Wishes
                                     
                                     <?php else: ?>
                                     
                                     
                                     <?php endif; ?>
                                    <?php else: ?>
                                    <input type="checkbox" name="checkbox_student[]" class="email_list_student count" value="<?php echo e($item['id']); ?>"/>
                                    <?php endif; ?>
                                    
                                   <input type="hidden" name="mobile_student[]"  value="<?php echo e($item['mobile']); ?>"/>
                                   <input type="hidden" name="first_name_student[]"  value="<?php echo e($item['first_name']); ?>"/>
                                    <input type="hidden" name="role_id_student[]"  value="<?php echo e($item['role_id']); ?>"/>
                                </td>
                                <!--<td><?php echo e($i++); ?></td>-->
                                <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']); ?></td>
                                <td><?php echo e($item['class_name']); ?></td>
                                <td><?php echo e($item['father_name']); ?></td>
                                
                                <td><?php echo e($item['mobile']); ?></td>
                                <td><?php echo e($item['email']); ?></td>
                               <td><?php echo e(date('d/m/Y', strtotime($item['dob']))); ?></td>
                                <td>    <?php if(!empty($old)): ?>
                                    <?php if($old->status ==1): ?>
                                  
                                   <?php echo e($old->failed_message ?? ''); ?>

                                 <?php else: ?>
                                 
                                <span style='color:green !important'> Sent</span>
                                  <?php endif; ?>
                                    <?php else: ?>
                                  Pending
                                    <?php endif; ?></td>
                                <!--<td><?php echo e($item['joining_date']); ?></td>-->
                                 
                              
                      </tr>
                     
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
                  </table>
                  
                  
                  
                  
                  
              </div>
              
            </div>
           
        </div>
        
        
            
                      <div class="col-12">
            <div class="card card-outline card-orange">
				<div class="card-header bg-primary">
					<h3 class="card-title"><i class="fa fa-shirtsinbulk"></i> &nbsp;Today's User's Birthday List</h3>
			
				</div>   
				
			
                <div class="card-body">
               
                  
                  
                  
                   <table id="example1"  class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead  class="bg-primary">
                  <tr role="row">
                      <th><input type="checkbox" name="checkbox" id="select_all_user" /> <?php echo e(__('messages.Select')); ?></th>
                      <!--<th><?php echo e(__('messages.S.NO')); ?></th>-->
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('messages.F Name')); ?></th>
                            
                            <th><?php echo e(__('messages.Mobile')); ?></th>
                            <th><?php echo e(__('messages.E-Mail')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <!--<th>Joining Date</th>-->
                           
                    </tr>
                             
                      
                  </thead>
                
                  <tbody>
                      
                      <?php if(!empty($data2)): ?>
                     
                        <?php
                           $i=1
                        ?>
                        <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php
                        $old = DB::table('birthday_wishes')->where('role_id', $item['role_id'])->where('user_id_sender', $item['id'])->whereNull('deleted_at')->first();
                        
                        ?>
                       
                        <tr>
                                <td class='text-danger'>
                                     <?php if(!empty($old)): ?>
                                     
                                     <?php if($old->status ==1): ?>
                                     
                                   <a href="<?php echo e(url('resend_message')); ?>">Click Here</a>  For Resend Wishes
                                     
                                     <?php else: ?>
                                     
                                     
                                     <?php endif; ?>
                                     <?php else: ?>
                                      <input type="checkbox" name="checkbox_user[]" class="email_list_user count" value="<?php echo e($item['id']); ?>"/>
                                     <?php endif; ?>
                                   
                                    <input type="hidden" name="mobile_user[]"  value="<?php echo e($item['mobile']); ?>"/>
                                    <input type="hidden" name="first_name_user[]"  value="<?php echo e($item['first_name']); ?>"/>
                                    <input type="hidden" name="role_id_user[]"  value="<?php echo e($item['role_id']); ?>"/>
                                </td>
                                <!--<td><?php echo e($i++); ?></td>-->
                                <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']); ?></td>
                                <td><?php echo e($item['father_name']); ?></td>
                                
                                <td><?php echo e($item['mobile']); ?></td>
                                <td><?php echo e($item['email']); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($item['dob']))); ?></td>
                                <td class='text-danger'><?php if(!empty($old)): ?>
                                  <?php if($old->status ==1): ?>
                                  
                                   <?php echo e($old->failed_message ?? ''); ?>

                                 <?php else: ?>
                                 
                               <span style='color:green !important'> Sent</span>
                                  <?php endif; ?>
                                  
                                    <?php else: ?>
                                  Pending
                                    <?php endif; ?></td>
                                <!--<td><?php echo e($item['joining_date']); ?></td>-->
                                 
                              
                      </tr>
                     
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
                  </table>
              </div>
              
            </div>
           
        </div>
        
        <div class="col-12 text-center">
            
         
                 <button class="btn btn-primary" id="submit" >Send Wishes</button>
            </form>
           </div>
      </div>
      </div>
    </section>
</div>

<script>
   
    var clicked = 0 ;
    var clicked_1 = 0 ;
    $("#select_all_student").click(function(){
        clicked = 0;
        var array = [];
  if($("#select_all_student").prop('checked') == false){
   
    $( ".email_list_student" ).each(function( index ) {
              $(this).prop("checked", false) ;
                //  $("input:text").remove();
              
});

}
else if ($("#select_all_student").prop('checked') == true)
{
  $( ".email_list_student" ).each(function( index ) {
 
                  $(this).prop("checked", true) ;
                  
                
                array.push($(this).val())
                
                });
                
            clicked = array.l 
}

}); 



 $("#select_all_user").click(function(){
        clicked = 0;
        var array = [];
  if($("#select_all_user").prop('checked') == false){
   
    $( ".email_list_user" ).each(function( index ) {
              $(this).prop("checked", false) ;
                //  $("input:text").remove();
              
});

}
else if ($("#select_all_user").prop('checked') == true)
{
  $( ".email_list_user" ).each(function( index ) {
 
                  $(this).prop("checked", true) ;
                  
                
                array.push($(this).val())
                
                });
                
            clicked = array.l 
}

}); 


 $("#submit").click(function (e) {
     
      
    if($('.count:checked').length == 0) {
          e.preventDefault();
          alert("There is no selected value for send wishes");
    }
    
   
    
});
</script>

<script>
   
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/birthday/view.blade.php ENDPATH**/ ?>