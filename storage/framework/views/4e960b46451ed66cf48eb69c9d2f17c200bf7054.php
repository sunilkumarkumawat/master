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
        <h3 class="card-title"><i class="fa fa-bar-chart-o"></i> &nbsp;<?php echo e(__('Fee Receipts')); ?></h3>
        <div class="card-tools">
        <!--<a href="<?php echo e(url('hostel/collect/fees')); ?>" class="btn btn-primary  btn-sm" title="Add Fees"><i class="fa fa-plus"></i> Add</a>-->
        <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?></a>
        </div>
        
        </div>  
        
        
        <form id="quickForm" action="<?php echo e(url('ca_report')); ?>" method="post" >
                <?php echo csrf_field(); ?> 
                    <div class="row m-2">
                       
                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label>Class</label>
                                    <select class="form-control select2" id="class_type_id" name="class_type_id">
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
                    	    <button type="submit" class="btn btn-primary" srtle="margin-top: 26px !important;"><?php echo e(__('messages.Search')); ?></button>
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
            <th>Counter</th>
            <th>Receipt No.</th>
            <th>Status</th>
            <th>Admission No.</th>
              <th>Class</th>
                <th><?php echo e(__('Student Name')); ?></th>
           
               <th><?php echo e(__('Image')); ?></th>
        
            <th><?php echo e(__('messages.Fathers Name')); ?></th>
            <th><?php echo e(__('messages.Mobile')); ?></th>
            <th><?php echo e(__('Payment date')); ?></th>
            <th><?php echo e(__('Amount')); ?></th>
         
          </thead>
         <tbody>
             
             <?php if(!empty($data)): ?>
             
             <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $revert_amount = 0;
                    $count = 0;
                    $deleted = DB::table('fees_detail')->where('receipt_no',$receipt->receipt_no)->whereNotNull('deleted_at')->get();
                ?>

                <?php if(!empty($deleted)): ?>
                    <?php $__currentLoopData = $deleted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $revert_amount += $del->total_amount;
                            $count++;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
             <tr>
                 
                 <td><?php echo e($key+1); ?></td>
                 <td><?php echo e($receipt->counter_name ?? ''); ?></td>
                 <td class='d-flex'>
                      <?php if(!$count > 0): ?>
                     <form action=<?php echo e(url('printFeesInvoice')); ?> method="post">
                         <?php echo csrf_field(); ?>
                         <button class="text-primary" type="submit" id="invoice_no" style="border: none; background: transparent; border-bottom: 2px solid #1f2d3d;" name="invoice_no" value="<?php echo e($receipt->receipt_no ?? ''); ?>"><?php echo e($receipt->receipt_no ?? ''); ?></button>
                     </form>
                     <?php else: ?>
                      <form action=<?php echo e(url('PrintRevertFeesInvoice')); ?> method="post">
                         <?php echo csrf_field(); ?>
                    <a href="<?php echo e(url('PrintRevertFeesInvoice')); ?>" target="_blank" ><button class="text-danger" type="submit" id="invoice_no" style="border: none; background: transparent; border-bottom: 2px solid #1f2d3d;" name="invoice_no" value="<?php echo e($receipt->receipt_no ?? ''); ?>"><?php echo e($receipt->receipt_no ?? ''); ?></button></a>
                     </form>
                     <?php endif; ?>
                 </td>
               <td>
                     <?php if($count > 0): ?>
                     <span class='text-danger'>Cancelled</span>
                     <?php endif; ?>
                   
               </td>
                 
                 <td><?php echo e($receipt->admissionNo ?? ''); ?></td>
                 <td><?php echo e($receipt->class_name ?? ''); ?></td>
                 <td><?php echo e($receipt->first_name ?? ''); ?> <?php echo e($receipt->last_name ?? ''); ?></td>
                 <td>
                     <!--<img width='50px' height='50px'src='<?php echo e(env("IMAGE_SHOW_PATH")."profile/"); ?><?php echo e($receipt->image ?? ''); ?>'/>-->
                    <img class="profileImg pointer" src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$receipt['image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'"  width='50px' height='50px' data-img="<?php if(!empty($receipt->image)): ?> <?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$receipt['image']); ?> <?php endif; ?>" >
                 </td>
                 <td><?php echo e($receipt->father_name ?? ''); ?></td>
                 <td><?php echo e($receipt->mobile ?? ''); ?></td>
                 <td><?php echo e(date('d-m-Y', strtotime($receipt->date ?? ''))); ?></td>
                 <td>
                 <?php
                 $amount = DB::table('fees_detail')->where('fees_detail.session_id', Session::get('session_id'))
                                    ->where('fees_detail.branch_id', Session::get('branch_id'))->where('receipt_no',$receipt->receipt_no ?? '')->whereNull('deleted_at')->sum('paid_amount');
                 
                 ?>
                 
                 
                                       <?php if(!$count > 0): ?>
                   <?php echo e($amount); ?>

                     <?php else: ?>
                       <p class="text-danger"><?php echo e($revert_amount); ?></p>
                     
                     <?php endif; ?>
                
                 
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

<script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
<script>
$('.profileImg').click(function(){
    var profileImgUrl = $(this).data('img');
    if(profileImgUrl != ''){
        $('#profileImgModal').modal('toggle');
        $('#profileImg').attr('src',profileImgUrl);
    }
});
</script>
 <div id="profileImgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>-->
      <div class="modal-body">
        <img id="profileImg" src="" width="100%" height="470px">
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>       

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/fees/reports/CA.blade.php ENDPATH**/ ?>