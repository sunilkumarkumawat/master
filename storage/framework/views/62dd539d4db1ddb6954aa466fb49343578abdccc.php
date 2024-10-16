<?php
  $classType = Helper::classType();
  //$getSection = Helper::getSection();
  $getCountry = Helper::getCountry();
  //dd($data);
?>
 
<?php $__env->startSection('content'); ?>

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

<div class="content-wrapper">

   <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">      
    <div class="card card-outline card-orange">
        <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-bar-chart-o"></i> &nbsp;<?php echo e(__('Student Fees Ledger')); ?></h3>
        <div class="card-tools">
        <!--<a href="<?php echo e(url('hostel/collect/fees')); ?>" class="btn btn-primary  btn-sm" title="Add Fees"><i class="fa fa-plus"></i> Add</a>-->
        <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?></a>
        </div>
        
        </div>  
            <form id="quickForm" action="<?php echo e(url('fees/ledger')); ?>" method="post" >
                <?php echo csrf_field(); ?> 
                    <div class="row m-2">

                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label>Class</label>
                                    <select class="form-control" id="class_type_id" name="class_type_id">
                                        <option value="">All</option>
                                        <?php if(!empty($classType)): ?>
                                            <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($class->id ?? ''); ?>" <?php echo e($class->id == $search['class_type_id'] ? 'selected' : ''); ?>><?php echo e($class->name ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>                 	    
                            </div>
                    	</div>
                    	
                    	<div class="col-md-2">
                    		<div class="form-group">
                    			<label><?php echo e(__('fees.From Date')); ?></label>
                                    <input type="date" class="form-control " id="starting" name="starting" value="<?php echo e($_POST['starting'] ?? ''); ?>">                 	    
                            </div>
                    	</div>
                    	<div class="col-md-2">
                            <div class="form-group ">
                                <label><?php echo e(__('fees.To Date')); ?></label>
                                    <input type="date" class="form-control " id="ending" name="ending" value="<?php echo e($_POST['ending'] ?? ''); ?>">
                			</div> 
                        </div>
                    	
            		<div class="col-md-4">
            			<div class="form-group"> 
            				<label><?php echo e(__('messages.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('messages.Ex. Name, Father Name, Mobile, Email, etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
            		    </div>
            		</div>                     	
                        <div class="col-md-1 ">
                             <label for="" style="color: white;">Search</label>
                    	    <button type="submit" class="btn btn-primary" ><?php echo e(__('messages.Search')); ?></button>
                    	</div>
                    			
                    </div>
                </form>        

        
    	<div class="row m-2">
    	    <div class="col-md-12 head_table text-center"></div>
    	    </div>
    	<div class="row m-2">
		    <div class="col-md-12  ">	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
          <thead>
          <tr role="row">
            <th><?php echo e(__('messages.Sr.No.')); ?></th>
            <!--<th><?php echo e(__('Counter')); ?></th>-->
            <th>Admission No.</th>
            <th>Class</th>
            <th><?php echo e(__('Student Name')); ?></th>
            <th><?php echo e(__('messages.Fathers Name')); ?></th>
            <th><?php echo e(__('messages.Mobile')); ?></th>
            <th><?php echo e(__('Total Fees')); ?></th>
            <th><?php echo e(__('Total Paid Fees')); ?></th>
            <th><?php echo e(__('Paid Fine')); ?></th>
            <th>Discount</th>
            <th><?php echo e(__('Pending Fees')); ?></th>
            <th><?php echo e(__('messages.Action')); ?></th>
          </thead>
          <tbody>
              
              <?php if(!empty($data)): ?>
                <?php
                   $i=1;
                   $total_assigned=0;
                   $total_collected=0;
                   $total_discount=0;
                   $total_pending=0;
                   $total_fine=0;
                   
                ?>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                
              
                  <?php
                 
                  $paid = DB::table('fees_detail')
                                ->where('admission_id', $item->id)
                                ->whereNull('deleted_at')
                                ->select(
                                    DB::raw('SUM(installment_fine) as total_installment_fine'),
                                    DB::raw('SUM(discount) as total_discount'),
                                    DB::raw('SUM(total_amount) as total_amount')
                                )
                                ->first();

                $fees_counters = DB::table('fees_counters')->where('id', $item->fees_counter_id)->whereNull('deleted_at')->first();

                 // dd($paid);
                  $total_assigned += ($item['total_amount'] ?? 0);
                   $total_collected += ($paid->total_amount ?? 0);
                   $total_discount += ($paid->total_discount ?? 0);
                   $total_fine += $paid->total_installment_fine ?? 0;
                   $total_pending += (($item['total_amount'] ?? 0)-($paid->total_amount ?? 0))-($paid->total_discount ?? 0);
              
                ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <!--<td><?php echo e($fees_counters->name ?? ''); ?></td>-->
                    <td><?php echo e($item['admissionNo'] ?? ''); ?></td>
                    <td><?php echo e($item['className'] ?? ''); ?></td>
                    <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                    <td><?php echo e($item['father_name'] ?? ''); ?></td>
                    <td><?php echo e($item['mobile']); ?></td>
                    <!--<td><?php echo e($item['slip_no']); ?></td>-->
                    <td>₹ <?php echo e(number_format($item['total_amount'] ,2) ?? ''); ?></td>
                    <td>₹ <?php echo e(number_format($paid->total_amount ,2) ?? ''); ?></td>
                    <td>₹ <?php echo e(number_format($paid->total_installment_fine ,2) ?? ''); ?></td>
                    <td>₹ <?php echo e(number_format($paid->total_discount ,2) ?? ''); ?></td>
                    <td>₹ <?php echo e(number_format(($item['total_amount']- $paid->total_discount) - $paid->total_amount ,2)); ?></td>
                    <td>
                        <a href="<?php echo e(url('fees_ledger_print',$item->id)); ?>" class="btn btn-primary  btn-xs" title="View Fees Ledger"><i class="fa fa-bar-chart-o"></i></a>
<!--                        <a href="<?php echo e(url('student_assign_fees_edit',$item->id)); ?>" class="btn btn-primary  btn-xs" title="Edit Fees"><i class="fa fa-edit"></i></a>
-->                        <!--<a data-admission_id='<?php echo e($item->admission_id ?? ''); ?>' data-first_name='<?php echo e($item['Student']->first_name ?? ''); ?> <?php echo e($item['Student']->last_name ?? ''); ?>' data-class_type_id='<?php echo e($item['ClassTypes']->name ?? ''); ?>' data-section_id='<?php echo e($item['Section']->name ?? ''); ?>' data-toggle="modal" data-target="" class="btn btn-primary  btn-xs ml-3 feesDetail " title="View Fees"><i class="fa fa-bars"></i></a>-->
                        <!--<a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger  btn-xs ml-3" title="Revert Fees"><i class="fa fa-undo"></i></a>-->
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

var  total_assigned =  "<?php echo e(number_format($total_assigned ,2)); ?>";
var  total_collected =  "<?php echo e(number_format($total_collected ,2)); ?>";
var  total_discount =  "<?php echo e(number_format($total_discount ,2)); ?>";
var  total_pending =  "<?php echo e(number_format($total_pending ,2)); ?>";
var  total_fine =  "<?php echo e(number_format($total_fine ,2)); ?>";
                 
                 
                
$('.head_table').append('<table class="table table-bordered table-striped"><tr><td class="bg-primary">Total Fee</td><td>₹ '+total_assigned+'</td><td class="bg-primary">Total Discount</td><td >₹ '+total_discount+'</td><td class="bg-primary">Total Collected</td><td>₹ '+total_collected+'</td><td class="bg-primary">Total Pending</td><td>₹ '+total_pending+'</td><td class="bg-primary">Total Fine</td><td>₹ '+total_fine+'</td></tr><table>');
    });
</script>
       

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/fees/ledger/view.blade.php ENDPATH**/ ?>