<?php
$role = Helper::roleType();
$getMonth = Helper::getMonth();
?>
 
<?php $__env->startSection('content'); ?>

     
     <div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-shirtsinbulk"></i> &nbsp;<?php echo e(__('My Salary')); ?></h3>
							<div class="card-tools"> 
							    <a href="<?php echo e(url('generate/salary/slip')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i> <?php echo e(__('messages.Add')); ?> </a>
							    <a href="<?php echo e(url('user_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('messages.Back')); ?> </a>
							</div>
						</div>					    

                    <form id="quickForm" action="<?php echo e(url('salary_details')); ?>" method="post" >
                        <?php echo csrf_field(); ?> 
                        <div class="row m-2">
                   
                    	
                        <div class="col-md-2">
                			<label><?php echo e(__('messages.Select Month')); ?></label>
                			<select class="select2 form-control" id="month_id" name="month_id">
                			<option value=""><?php echo e(__('messages.Select')); ?></option>
                             <?php if(!empty($getMonth)): ?> 
                                  <?php $__currentLoopData = $getMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($item->id ?? ''); ?>" <?php echo e(( $item['id'] == $search['month_id']) ? 'selected' : ''); ?>><?php echo e($item->name ?? ''); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>  
                    	</div>   		
        
                	
                        <div class="col-md-1 ">
                             <label for="" class="text-white"><?php echo e(__('messages.Select')); ?></label>
                    	    <button type="submit" class="btn btn-primary"><?php echo e(__('messages.Search')); ?></button>
                    	</div>
            			
            </div>
        </form>
					
    	<div class="row mb-2 m-2">
		    <div class="col-md-12">	
		    <input type='radio'  id='partial' name='text_type' checked/> <label for='partial'>Partial Text</label> &nbsp;&nbsp;&nbsp;
		    <input type='radio' id='full' name='text_type'/> <label for='full'>Full Text</label>
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline text-nowrap">
          <thead class="bg-primary">
          <tr role="row">
     
 
              <th><?php echo e(__('messages.Sr.No.')); ?></th>
                    <th><?php echo e(__('messages.Name')); ?> </th>
                    <th><?php echo e(__('messages.Mobile')); ?> </th>
                    <!--<th><?php echo e(__('messages.E-Mail')); ?> </th>-->
                    <th><?php echo e(__('Salary')); ?> </th>
                    <th><?php echo e(__('Basic')); ?> </th>
                    <th><?php echo e(__('DA')); ?> </th>
                    <th><?php echo e(__('Incentive')); ?> </th>
                    <th><?php echo e(__('TDS')); ?> </th>
                    <th><?php echo e(__('PF')); ?> </th>
                    <th><?php echo e(__('Gross')); ?> </th>
                    <th><?php echo e(__('Attendance')); ?> </th>
                    <th><?php echo e(__('messages.Month')); ?> </th>
                    <th><?php echo e(__('messages.Date')); ?> </th>
                    <th><?php echo e(__('messages.Action')); ?> </th>
                    
          </thead>
          <tbody>
              
              <?php if(!empty($data)): ?>
                <?php
                   $i=1
                ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo e($item['name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                        <td><?php echo e($item['User']['mobile'] ?? ''); ?></td>
                        <!--<td><?php echo e($item['User']['email'] ?? ''); ?></td>-->
                        <td><?php echo e(number_format($item['salary'] ,2) ?? ''); ?></td>
                        <td><?php echo e(number_format($item['basic_amt'] ,2) ?? ''); ?></td>
                        <td><?php echo e(number_format($item['da'] ,2) ?? ''); ?></td>
                        <td><?php echo e(number_format($item['incentive'] ,2) ?? ''); ?></td>
                        <td><?php echo e(number_format($item['tds'] ,2) ?? ''); ?></td>
                        <td><?php echo e(number_format($item['pf'] ,2) ?? ''); ?></td>
                        <td><?php echo e(number_format($item['gross_salary'] ,2) ?? ''); ?></td>
                        <td><p class='show_para hide_para'>
                            <strong>Total Days: </strong><?php echo e($item['total_days'] ?? 0); ?><b class='dot_dot'>...</b><br>
                            <strong>Present: </strong><?php echo e($item['present'] ?? 0); ?><br>
                            <strong>Absent: </strong><?php echo e($item['absent'] ?? 0); ?><br>
                            <strong>Holiday: </strong><?php echo e($item['holiday'] ?? 0); ?><br>
                            <strong>HalfDay: </strong><?php echo e($item['half_day'] ?? 0); ?><br>
                            <strong>DoubleShift: </strong><?php echo e($item['double_shift'] ?? 0); ?>

                        
                        
                        
                        </p></td>
                        <td><?php echo e($item['Month']['name'] ?? ''); ?></td>
                        <td><?php echo e(date('d-m-Y', strtotime($item['date'])) ?? ''); ?></td>
                       
                        
						<td> 
						    <a href="<?php echo e(url('download/salary/slip')); ?>/<?php echo e($item->staff_id); ?>/<?php echo e($item->month_id); ?>" target="blank" class="btn btn-xs btn-primary btn-xs" title="Download"><i class="fa fa-download"></i></a>  
						    <a href="<?php echo e(url('salary_print')); ?>/<?php echo e($item->staff_id); ?>/<?php echo e($item->month_id); ?>" target="blank" class="btn btn-xs btn-primary btn-xs ml-3" title="Print"><i class="fa fa-print"></i></a>  
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
    $(document).ready(function(){
    $("input[name='text_type']").on('change', function() {
        if ($("#partial").is(":checked")) {
           $('.show_para').addClass('hide_para');
            $('.dot_dot').show();
        } else if ($("#full").is(":checked")) {
           $('.show_para').removeClass('hide_para');
           $('.dot_dot').hide();
        }
    });
});
</script>
<style>
.hide_para{
    max-height: 28px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
 
}
</style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/user/salary/staff_salary_view.blade.php ENDPATH**/ ?>