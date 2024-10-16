<?php
   $getstudents = Helper::getstudents();
   $classType = Helper::classType();
   $getState = Helper::getState();
   $getCity = Helper::getCity();
   $getCountry = Helper::getCountry();
  $getSetting=Helper::getSetting();
  $getPermission = Helper::getPermission();
 
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-certificate"></i> &nbsp;<?php echo e(__('certificate.View Tc Certificate')); ?></h3>
							<div class="card-tools"> <a href="<?php echo e(url('tc/certificate/add')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?> </a>
							<a href="<?php echo e(url('certificate_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a> </div>
						</div>
						
						<form id="quickForm" action="<?php echo e(url('tc/certificate/index')); ?>" method="post" >
                        <?php echo csrf_field(); ?> 
            <div class="row m-2">
                <div class="col-md-2">
                      <div class="form-group">
                        <label for="State" class="required"><?php echo e(__('certificate.Admission No.')); ?></label>
                         <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="<?php echo e(__('certificate.Admission No.')); ?>" value="<?php echo e($search['admissionNo'] ?? ''); ?>">
                      </div>
                    </div>
                <div class="col-md-2">
            		<div class="form-group">
            			<label><?php echo e(__('common.Class')); ?></label>
            			<select class="select2  form-control" id="student_class" name="student_class" >
            			<option value=""><?php echo e(__('common.Select')); ?></option>
                         <!--<?php if(!empty($classType)): ?> -->
                         <!--     <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                         <!--        <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id) == old('class_type_id') ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>-->
                         <!--     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                         <!-- <?php endif; ?>-->
                          
                           <?php if(!empty($classType)): ?> 
                              <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['student_class']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </select>
            	    </div>
            	</div>

                <div class="col-md-1 ">
                     <label for="">&nbsp;</label>
            	    <button type="submit" class="btn btn-primary "onclick="SearchValue()"style="margin-top:28px;"><?php echo e(__('common.Search')); ?></button>
            	</div>
            			
            </div>
        </form>
				
    	<div class="row mb-2 m-2">
		    <div class="col-md-12">	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline table-responsive ">
          <thead class="bg-primary">
          <tr role="row">
 

                      <th><?php echo e(__('common.SR.NO')); ?></th>
                            
                            <th><?php echo e(__('certificate.Student Name')); ?>  </th>
                            <th><?php echo e(__('common.Class')); ?></th>
                            <th><?php echo e(__('common.Fathers Name')); ?></th>
                            <th><?php echo e(__('common.Mothers Name')); ?></th>
                            <th><?php echo e(__('common.Date Of  Birth')); ?></th>
                            <th><?php echo e(__('certificate.Students Admission No.')); ?></th>
                            <th><?php echo e(__('certificate.Admission Date')); ?></th>
                           
                            <th><?php echo e(__('common.Action')); ?></th>
                             
                      
                  </thead>
                  <tbody>
                      
                      <?php if(!empty($data)): ?>
                        <?php
                           $i=1
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']); ?></td>
                             
                                <td><?php echo e($item['student_class'] ?? ''); ?></td>
                               <td><?php echo e($item['father_names']); ?></td>
                                <td><?php echo e($item['mother_names']); ?></td>
                                <td><?php echo e(date('d-m-Y', strtotime($item['dob'])) ?? ''); ?></td>
                                <td><?php echo e($item['admissionNo']); ?></td>
                                <td><?php echo e(date('d-m-Y', strtotime($item['admission_date'])) ?? ''); ?></td>
                              
                               <td>
                                
                                   <a class="btn btn-primary btn-xs" data-toggle="dropdown" title="Show Option"><i class="fa fa-bars"></i></a>
                                       
                                        <ul class="dropdown-menu p-3" style="">
                                         <a href="<?php echo e(url('tc/certificate/edit',$item->id)); ?>"><i class="fa fa-edit text-primary" title="Edit"></i> Edit</a><br>
                                      <a href="javascript:;"  data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData text-danger" ><i class="fa fa-trash-o text-danger"></i> Delete</a><br>
                                      <a href="<?php echo e(url('tc_print',$item->id)); ?>" target="blank" class="text-warning"><i class="fa fa-print text-warning"></i>Print1</a><br>
                                      <!--<a href="<?php echo e(url('tc_print_formate')); ?>" target="blank" class="text-success"><i class="fa fa-print text-success"></i>Print2</a><br>-->
                                       <!--<a href="<?php echo e(url('noc_print')); ?>/<?php echo e($item->id); ?>" target="blank" class="text-primary"><i class="fa fa-print text-primary"></i> NOC</a>-->
                                        </ul>
                                        
                                        
                                     

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
      
    </section>
    
  </div>
    
</div>
   
 
<script>
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 

  $('#delete_id').val(delete_id); 
  } );
 </script>

 The Modal 
<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

       Modal Header 
      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

       Modal body 
      <form action="<?php echo e(url('tc_delete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              
            
            
              <input type="hidden" id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?> ?</h5>
           
      </div>

      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
         </div>
       </form>

   	</div>
	</div>
		</div>
	</div>
		</div>
	</div>
	</section>
</div>
  
<?php $__env->stopSection(); ?>
   
   
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/tc_certificate/index.blade.php ENDPATH**/ ?>