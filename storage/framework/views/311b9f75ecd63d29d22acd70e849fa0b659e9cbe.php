<?php
  $classType = Helper::classType();
  $getState = Helper::getState();
  $getCity = Helper::getCity();
  $getCountry = Helper::getCountry();
  $getPermission = Helper::getPermission();
  $getEnquiryStatus = Helper::getEnquiryStatus();
  
?>
 
<?php $__env->startSection('content'); ?>



<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12"> 
            <div class="card  card-outline card-orange">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp; <?php echo e(__('student.View Students Enquiry')); ?> </h3>
            <div class="card-tools">
            <!--<a class="btn btn-danger" href="<?php echo e(url('enquiry_qr_generate')); ?>"><i class="fa fa-download"></i> <?php echo e(__('Enquiry QR')); ?></a>-->
            <a href="<?php echo e(url('enquiryAdd')); ?>" class="btn btn-primary  btn-sm <?php echo e(($getPermission->add == 1) ? '' : 'd-none'); ?>" ><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?></a>
            <a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?></a>
          
            </div>
            
            </div>                 
        <form id="quickForm" action="<?php echo e(url('enquiryView')); ?>" method="post" >
                        <?php echo csrf_field(); ?> 
            <div class="row m-2">
            	<div class="col-md-2 d-none">
            		<div class="form-group"> 
            			<label for="State" class="required"><?php echo e(__('common.State')); ?></label>
            			<select class="form-control  select2" id="state_id" name="state_id" >
                        <option value=""><?php echo e(__('common.Select')); ?></option>
                    <?php if(!empty($getState)): ?> 
                          <?php $__currentLoopData = $getState; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($state->id ?? ''); ?>" <?php echo e(($state->id == $search['state_id']) ? 'selected' : ''); ?>><?php echo e($state->name ?? ''); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                      
                        </select>
            		
            		</div>
            	</div>
            	<div class="col-md-2 d-none">
            	    <div class="form-group">
            	        <label for="City"><?php echo e(__('common.City')); ?></label>
            	        <select class="select2 form-control" name="city_id" id="city_id" >
            	        <option value=""><?php echo e(__('common.Select')); ?></option>      
            	            <?php if(!empty($getCity)): ?> 
                          <?php $__currentLoopData = $getCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($cities->id ?? ''); ?>" <?php echo e(($cities->id == $search['city_id']) ? 'selected' : ''); ?>><?php echo e($cities->name ?? ''); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
            			</select>
            	    </div>
            	</div>    		
                <div class="col-md-2">
            		<div class="form-group">
            			<label><?php echo e(__('common.Class')); ?></label>
            			<select class="select2 form-control" id="class_type_id" name="class_type_id" >
            			<option value=""><?php echo e(__('common.Select')); ?></option>
                         <?php if(!empty($classType)): ?> 
                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['class_type_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
            	    </div>
            	</div>

			                    <div class="col-md-2">    
                        	 <label><?php echo e(__('status')); ?></label>
                        	 <select class="select2  form-control" id="enquiry_status" name="enquiry_status">
                            <option value=""><?php echo e(__('common.Select')); ?></option>
                            <?php if(!empty($getEnquiryStatus)): ?>
                            <?php $__currentLoopData = $getEnquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['enquiry_status']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        </div>
                <div class="col-md-2">    
            	 <label><?php echo e(__('Reminder Date')); ?></label>
            		<input type="date" class="form-control" id="reminder_date"  name="reminder_date" value="<?php echo e($search['reminder_date'] ?? ''); ?>">	
					                        
            		</div> 
        		<div class="col-md-2">
        			<div class="form-group">
        				<label><?php echo e(__('common.Search By Keywords')); ?></label>
        				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
        		    </div>
        		</div> 
                <div class="col-md-1 ">
                     <label for="" class="text-white"><?php echo e(__('common.Select')); ?></label>
                     <div class="btn-group">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('common.Search')); ?></button>
                        <button type="submit" name="pdf"  value="pdf" class="btn btn-primary <?php echo e(($getPermission->download == 1) ? '' : 'd-none'); ?>"><?php echo e(__('common.Pdf')); ?></button>
                    </div>
            	</div>
            			
            </div>
        </form>

        <div class="row m-2">
          <div class="col-12">
           
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
                  <thead>
                  <tr role="row">
                      <th><?php echo e(__('common.SR.NO')); ?></th>
                      <th><?php echo e(__('student.Reg.No.')); ?></th>
                       <th><?php echo e(__('common.Name')); ?></th>
                        <th><?php echo e(__('common.Mobile No.')); ?></th>
                       <th><?php echo e(__('common.Class')); ?></th>
                      <th><?php echo e(__('common.F Name')); ?></th>
                      <th><?php echo e(__('student.Reg.\Date')); ?></th>
                      <th><?php echo e(__('Message')); ?></th>
                      <th><?php echo e(__('Status')); ?></th>
                        <?php if($getPermission->download == 1 || $getPermission->edit == 1 || $getPermission->deletes == 1): ?>   
                          <th><?php echo e(__('common.Action')); ?></th>
                        <?php endif; ?>
                      </tr>
                  </thead>
                  <tbody class="product_list_show">
                  
                      <?php if(!empty($data)): ?>
                            <?php
                           // dd($data);
                               $i=1
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($item['registration_no'] ?? ''); ?></td>
                                <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                                <td class="editable"  data-id="<?php echo e($item->id ?? ''); ?>" data-field="mobile" data-modal='Enquiry'><?php echo e($item['mobile'] ?? ''); ?></td>
                                <td><?php echo e($item['class_name'] ?? ''); ?></td>
                                <td><?php echo e($item['father_name'] ?? ''); ?></td>
                                <td><?php echo e(date('d-M-Y', strtotime($item['registration_date'])) ?? ''); ?></td>
                                <td title="<?php echo e($item['message'] ?? ''); ?>">
                                     <?php if(!empty($item['message'])): ?>
                                   <?php echo e(strlen($item['message'] ?? '') > 10 ? substr($item['message'], 0, 10) . '...' : ($item['message'] ?? '')); ?>

                                    <?php else: ?>
                                    -
                                    <?php endif; ?>
                                   
                                    </td>
                                <?php
                                $enquiry = DB::table('enquiry_status')->where('id',$item->enquiry_status)->whereNull('deleted_at')->first();
                             
                                ?>
                                <td><?php echo e($enquiry->name ?? '-'); ?></td>
                              
                                <?php if($getPermission->download == 1 || $getPermission->edit == 1 || $getPermission->deletes == 1): ?>
                                <td style="width: 18%;">
                                    <?php if($getPermission->download == 1): ?>
                                    <a href="<?php echo e(url('registrationPrint')); ?>/<?php echo e($item->id); ?>" target="blank" class="btn btn-primary  btn-xs" title=" Registration Print"><i class="fa fa-print"></i></a>
                                    <?php endif; ?>
                                    <?php if($getPermission->edit == 1): ?>
                                    <a href="javascript:;"  data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#remark_id"  class="remark btn btn-primary  btn-xs ml-3 m-2 " title="Remark Student Registration"><i class="fa fa-bell"></i></a>                                      
                                    <a href="<?php echo e(url('enquiryEdit',$item->id)); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Student Registration"><i class="fa fa-edit"></i></a>
                                    <?php endif; ?>
                                    <?php if($getPermission->deletes == 1): ?>
                                    <a href="javascript:;"  data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData btn btn-primary  btn-xs ml-3" title="Delete Student Registration"><i class="fa fa-trash-o"></i></a>  
                                    <?php endif; ?>
                                    <a href="<?php echo e(url('studentRegistrationDetail',$item->id)); ?>" class="btn btn-primary  btn-xs ml-3" title="View Student Registration"><i class="fa fa-eye"></i></a>  
                                </td>
                                <?php endif; ?>
                        </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                  </tbody>
                  </table>
            
        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
    </section>
</div>


    <!-- The Modal -->
<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('enquiryDelete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              
            
            
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>?</h5>
           
      </div>

      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
         </div>
       </form>

    </div>
  </div>
</div>


<div class="modal" id="remark_id">
  <div class="modal-dialog">
    <div class="modal-content mod_siz">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> <?php echo e(__('student.Remark Add')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>

      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('enquiryRemarkAdd')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
				 <input type="hidden" id="student_id" name="student_id" value="">
				   <div class="row p-3">
            	<div class="col-md-6">    
            	 <label class="text-danger"><?php echo e(__('Reminder Date')); ?></label>
            		<input type="date" class="form-control input-radius <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="date" placeholder="Date" name="date" value="<?php echo e(date('Y-m-d')); ?>">	
					                        
            		</div>                 
            	               
            	        <div class="col-md-6">    
                        	 <label class="text-danger"><?php echo e(__('Status')); ?></label>
                        	 <select class="select2  form-control" id="enquiry_status_id" name="enquiry_status_id">
                            <option value=""><?php echo e(__('common.Select')); ?></option>
                            <?php if(!empty($getEnquiryStatus)): ?>
                            <?php $__currentLoopData = $getEnquiryStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id ?? ''); ?>"><?php echo e($type->name ?? ''); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        </div>                 
                       
            	        <div class="col-md-6">    
                        	 <label class="text-danger"><?php echo e(__('student.Remark')); ?></label>
                                <textarea id="remark" name="remark"class="form-control" rows="4" cols="50" required></textarea>

                        </div>                 
							</div>														
            					<div class="text-center col-md-12">
            					    

            				 <button type="submit" class="btn btn-primary mt-5 "><?php echo e(__('common.Submit')); ?></button>
                            
            			</div>
            		</form>

    </div>
  </div>
</div>


<!--<div class="modal fade" id="statusEnquiry">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--      <div class="modal-content">-->
<!--        <div class="modal-header">-->
<!--          <h4 class="modal-title">Give Message</h4>-->
<!--          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>-->
<!--        </div>-->
<!--       <form id="quickForm" action="<?php echo e(url('enquiry_status_update')); ?>" method="post" >-->
<!--        <?php echo csrf_field(); ?>-->
<!--        <div class="modal-body">-->
<!--            <input type="hidden" id="admission_id" name="admission_id">-->
<!--            <input type="hidden" id="status" name="status">-->
<!--            <div class="form-group">-->
<!--                <label>Reminder Date</label>-->
<!--                <div id="reminderrrr">-->
                    
<!--                </div>-->
                
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label>Message</label>-->
<!--                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Message"></textarea>-->
<!--            </div>-->
<!--        </div>-->
        
<!--        <div class="modal-footer">-->
<!--          <button type="submit" class="btn btn-primary">Submit</button>-->
<!--          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--        </div>-->
<!--        </form>-->
        
<!--      </div>-->
<!--    </div>-->
<!--</div>-->

<script>
    $(document).ready(function(){
       $('.statusEnquiry').change(function(){
           var status = $(this).find(':selected').val();
           var status_html = $(this).find(':selected').html();
           if(status_html != "Select"){
                var add_id = $(this).data('admission_id');
                var message = $(this).data('message');
                var reminder_date = $(this).data('reminder_date');
                var momentDate = moment(reminder_date, 'DD-MM-YY hh:mm A');
                var formattedDate = momentDate.format('YYYY-MM-DDTHH:mm');
                var inputes = "<input type='datetime-local' class='form-control' id='reminderDate' name='reminder_date' value='"+ formattedDate +"'>"
               $('#reminderrrr').html(inputes);
               $('#status').val(status);
               $('#admission_id').val(add_id);
               $('#message').val(message);
               $('#statusEnquiry').modal('show');
           }
       }); 
    });
</script>

<script>
    $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  
  $('#delete_id').val(delete_id); 
  } );
  

</script>
<script>
     	$(".remark").click(function(){
		var student_id = $(this).data('id');
		$("#student_id").val(student_id);
	})
</script>

<style>
    .mod_siz{
        width: 136%;
height: 370px;
    }
    .padding_table thead tr{
    background: #002c54;
    color:white;
    }
        
    .padding_table th, .padding_table td{
         padding:5px;
         font-size:14px;
    }
</style>

<?php $__env->stopSection(); ?>    

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/enquiry/view.blade.php ENDPATH**/ ?>