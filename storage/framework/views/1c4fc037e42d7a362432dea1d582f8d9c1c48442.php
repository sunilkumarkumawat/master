<?php
  $classType = Helper::classType();
  $getState = Helper::getState();
  $getCity = Helper::getCity();
  $getCountry = Helper::getCountry();
?>

 
<?php $__env->startSection('content'); ?>



<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12"> 
            <div class="card  card-outline card-orange">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp; <?php echo e(__('student.Students Registration Detail')); ?></h3>
            <div class="card-tools">
            <a href="<?php echo e(url('enquiryView')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i> View</a>
            <a href="<?php echo e(url('studentsDashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            
            </div> 
            
             <div class="row m-2">
          <div class="col-12">
           
                <table id="" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead>
                   <?php if(!empty($data)): ?>
                   
                   <?php
                   //dd($data);
                   ?>
                      <tr>
                        <th><?php echo e(__('common.Name')); ?> </th>
                        <th><?php echo e($data['first_name'] ?? ''); ?></th>
                       </tr>
                      <tr>
                        <th><?php echo e(__('common.Class')); ?> </th>
                        <th><?php echo e($data['ClassTypes']['name'] ?? ''); ?></th>
                       </tr>
                     
                      <tr>
                        <th><?php echo e(__('common.Mobile')); ?></th>
                        <th><?php echo e($data['mobile'] ?? ''); ?></th>
                      </tr>
                      <tr>
                        <th><?php echo e(__('common.Email')); ?></th>
                        <th><?php echo e($data['email'] ?? ''); ?></th>
                       </tr>
                       <?php if($data->id_proof != ''): ?>
                        <tr>
                        <th><?php echo e($data->id_proof ?? ''); ?></th>
                        <th><?php echo e($data['id_number'] ?? ''); ?></th>
                       </tr>
                       <?php endif; ?>
                       
                      <tr>
                        <th><?php echo e(__('common.Fathers Name')); ?></th>
                        <th><?php echo e($data['father_name'] ?? ''); ?></th>
                       </tr>
                      <tr>
                        <th><?php echo e(__('common.Mothers Name')); ?></th>
                        <th><?php echo e($data['mother_name'] ?? ''); ?></th>
                       </tr>
                      <tr>
                        <th><?php echo e(__('common.DOB')); ?></th>
                        <th><?php echo e(date('d-m-Y', strtotime($data['dob'])) ?? ''); ?></th>
                       </tr>
                      <tr>
                        <th><?php echo e(__('student.Registration Date')); ?></th>
                        <th><?php echo e(date('d-m-Y', strtotime($data['registration_date'])) ?? ''); ?></th>
                       </tr>
                      <!--<tr>-->
                      <!--  <th><?php echo e(__('common.Pincode')); ?></th>-->
                      <!--  <th><?php echo e($data['pincode'] ?? ''); ?></th>-->
                      <!-- </tr>-->
                      <tr>
                        <th><?php echo e(__('common.Address')); ?></th>
                        <th><?php echo e($data['address'] ?? ''); ?></th>
                       </tr>
                    <?php endif; ?>
                </thead>
            </table>
        </div>
    </div>
  </div>
</div>
</div>
</div>
</section> 
                    
                 </div>
               
               
             <div class="content-wrapper rem_edit_pos">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12"> 
            <div class="card  card-outline card-orange">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp; <?php echo e(__('student.Remark View')); ?></h3>
            <div class="card-tools">
          <!--  <a href="<?php echo e(url('students/add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i><?php echo e(__('messages.Add')); ?></a>
            <a href="<?php echo e(url('students_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?></a>
            --></div>
            
            </div> 
            
             <div class="row m-2">
          <div class="col-12">
           
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                      <thead>
                                                  <tr>
                                                    <th><?php echo e(__('common.SR.NO')); ?></th>
                                                    <th> <?php echo e(__('common.Date')); ?></th>
                                                     <th> <?php echo e(__('student.Remark')); ?></th>
                                                     <th><?php echo e(__('common.Action')); ?> </th>
                                                  </tr>
                                              </thead>
                                                <tbody >
                                             <?php if(!empty($remark)): ?>
                                             <?php
                                             
                                                $i=1;
                                             ?>
                    
                                          <?php $__currentLoopData = $remark; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                          <tr >
                                          
                                             <td><?php echo e($i++); ?></td>
                                             <td><?php echo e(date('d-m-Y', strtotime($item['date'])) ?? ''); ?></td>
                                              <td><?php echo e($item['remark'] ?? ''); ?></td>
        
                                             <td>

                                               <a href="javascript:;" data-remark="<?php echo e($item->remark); ?>" data-date="<?php echo e($item->date); ?>"  data-id='<?php echo e($item->id); ?>' data-toggle="modal" data-target="#Modal_id" class="editBtn"><i class="fa fa-edit"></i> </li></a>

                                             </td>
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
            
            
            
            
            
            <div class="modal" id="Modal_id">
  <div class="modal-dialog ">
    <div class="modal-dialog">
    <div class="modal-content mod_siz">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo e(__('student.Edit Remark')); ?> </h4>
        <button type="button" class="btn-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>
      <!-- Modal body -->
      <form action="<?php echo e(url('enquiryRemarkEdit')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
				 <input type="hidden" id="student_id" name="student_id" value="">
				   <div class=" row p-4">
            	<div class="col-md-6">    
            	 <label for="name"><?php echo e(__('common.Date')); ?></label>
            		<input type="date" class="form-control input-radius <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="datevv" placeholder="Date" name="date" value="" >	
					                        
            		</div>                 
            	<div class="col-md-6">    
            	 <label for="name"><?php echo e(__('student.Remark')); ?></label>
            		<input type="" class="form-control input-radius <?php $__errorArgs = ['remark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="remark" placeholder="<?php echo e(__('student.Remark')); ?>" name="remark" value="" required>	
					                        
            		</div>                 
            	             
            	                       
							</div>														
            					<div class="text-center col-md-12">
            					  
            				 <button type="submit" class="btn btn-primary mt-3"><?php echo e(__('common.Update')); ?></button>
                            
            			</div>
            		</form>

    </div>
  </div>
</div>
</div>

<script>
	$(".remark").click(function(){
		var remark_id = $(this).data('id');
		$("#remark_id").val(remark_id);
	})
	
	</script>
	<script>
 	$(".editBtn").click(function(){
		var id = $(this).data('id');
		var date = $(this).data('date');
		var remark = $(this).data('remark');
		$("#student_id").val(id);
		$("#datevv").val(date);
		$("#remark").val(remark);
		
	})   
</script>

<style>
    .mod_siz{
        width: 136%;
height: 300px;
    }
    .rem_edit_pos{
        margin-top:-10%;
    }
</style>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/enquiry/studentRegistrationDetail.blade.php ENDPATH**/ ?>