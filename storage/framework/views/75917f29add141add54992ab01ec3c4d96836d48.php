<?php

?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; <?php echo e(__('hostel.Hostel Room Unassigned')); ?></h3>
							<div class="card-tools"> 
							    <!--<a href="<?php echo e(url('meter_unit')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i>View </a> -->
							    <a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
							</div>
						</div>
                             
                            <div class="row m-2">
                                <div class="col-md-2">
                        			<label><?php echo e(__('hostel.Select Student')); ?><font style="color:red"><b>*</b></font></label>
                        <form id="studentDetailsForm" method="post" action="<?php echo e(url('hostel_unassign')); ?>">
                           <?php echo csrf_field(); ?>
                           <select name="student_details" id="student_details" class="form-control select2 ">
                              <option value=""><?php echo e(__('common.Select')); ?></option>

                              <?php if(!empty($allstudents)): ?>
                              <?php $__currentLoopData = $allstudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($value->id); ?>" <?php echo e(( $value->id == $search['student_details'] ?? '' ) ? 'selected' : ''); ?>><?php echo e($value->first_name ?? ''); ?> <?php echo e($value->last_name ?? ''); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                           </select>
                        </form>
                            	</div>    
                               
                               
                                
                            </div> 
                       
                      
                      
                              <div class="row m-2">

                                <div class="col-md-12">
                                    
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                            <tr role="row">
                                                <th><?php echo e(__('common.SR.NO')); ?></th> 
                                                <th><?php echo e(__('common.Name')); ?></th> 
                                                <th><?php echo e(__('common.Mobile')); ?></th> 
                                               
                                                <th><?php echo e(__('hostel.Hostel')); ?></th>
                                                <th><?php echo e(__('hostel.Building')); ?></th>
                                                <th><?php echo e(__('hostel.Floor')); ?></th>
                                                <th><?php echo e(__('hostel.Room')); ?></th>                                           
                                                <th><?php echo e(__('hostel.Bed')); ?></th>                                           
                                                <th><?php echo e(__('common.Fathers Name')); ?></th>                                           
                                                <th><?php echo e(__('hostel.Assign Date')); ?></th>                                           
                                                <th><?php echo e(__('common.Action')); ?></th>                                           
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="student_list_show">
                            
                                            <?php if(!empty($data)): ?>
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                 <td><?php echo e($key+1); ?></td>  
                                                <td><?php echo e($item->first_name ?? ''); ?> <?php echo e($item->last_name ?? ''); ?></td>
                                                <td><?php echo e($item->mobile ?? ''); ?></td>
                                                <td><?php echo e($item->hostel_name ?? ''); ?></td>
                                                <td><?php echo e($item->building_name ?? ''); ?></td>
                                                <td><?php echo e($item->floor_name ?? ''); ?></td>
                                                <td><?php echo e($item->room_name ?? ''); ?></td>
                                                <td><?php echo e($item->bad_name ?? ''); ?></td>
                                                <td><?php echo e($item->father_name ?? ''); ?></td>
                                                <td><?php echo e(date('d-m-Y', strtotime($item['date'])) ?? ''); ?></td>
                                                <td>
                                                    
                                                    <form action="<?php echo e(url('change_assign_status')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" value="<?php echo e($item->bed_status ?? ''); ?>" name="status" />
                                                    <input type="hidden" value="<?php echo e($item->first_name ?? ''); ?>" name="first_name" />
                                                        <input type="hidden" value="<?php echo e($item->id ?? ''); ?>" name="hostel_assign_id" />
                                                        <button type="submit" class="btn btn-<?php echo e($item->bed_status == 1 ? 'primary' : 'success'); ?>" ><?php echo e($item->bed_status == 1 ? 'Unassign' : 'Assign'); ?></button>
                                                    </form>
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



<script>

 

       $(document).ready(function() {

      $('#student_details').change(function() {
         var student_details = $(this).val();
         if (student_details != '') {
            $('#studentDetailsForm').trigger('submit');
         } else {
            window.location.href = 'fees';
         }
      })
   })

    </script>
                        

<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/remove.blade.php ENDPATH**/ ?>