<?php
  $classType = Helper::classType();
  $getCountry = Helper::getCountry();
  $getPaymentMode = Helper::getPaymentMode();
//dd($fees);
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">      
    <div class="card card-outline card-orange">
        <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('hostel.Hostel Fees Details')); ?></h3>
        <div class="card-tools">
        <a href="<?php echo e(url('hostel/collect/fees')); ?>" class="btn btn-primary  btn-sm" title="Add Fees"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?> </a>
        <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?></a>
        </div>
        
        </div>  
        
                    <form id="quickForm" action="<?php echo e(url('hostel/fees/view')); ?>" method="post" >
                        <?php echo csrf_field(); ?> 
                    <div class="row m-2">

                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label><?php echo e(__('hostel.From Date')); ?></label>
                                    <input type="date" class="form-control " id="starting" name="starting" value="<?php echo e($serach['starting'] ?? ''); ?>">                 	    
                            </div>
                    	</div>
                    	<div class="col-md-2">
                            <div class="form-group ">
                                <label><?php echo e(__('hostel.To Date')); ?></label>
                                    <input type="date" class="form-control " id="ending" name="ending" value="<?php echo e($serach['ending'] ?? ''); ?>">
                			</div> 
                        </div>
                        <div class="col-md-2">
                              <div class="form-group">
                                 <label><?php echo e(__('hostel.Payment Mode')); ?></label>
                                 <select class="form-control" id="payment_mode_id" name="payment_mode_id">
                                            <option value="">All</option>
                                    <?php if(!empty($getPaymentMode)): ?>
                                    <?php $__currentLoopData = $getPaymentMode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"<?php echo e(($value->id == $serach['payment_mode_id']) ? 'selected' : ''); ?>><?php echo e($value->name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                 </select>
                              </div>
                         </div>
                       

            		<div class="col-md-3">
            			<div class="form-group"> 
            				<label><?php echo e(__('common.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($serach['name'] ?? ''); ?>">
            		    </div>
            		</div>                     	
                        <div class="col-md-1">
                            
                             <label for="" style="color: white;">. &nbsp;</label>
                    	    <button type="submit" class="btn btn-primary " ><?php echo e(__('common.Search')); ?></button>
                    	</div>
                    </div>
                </form>        

        
    	<div class="row mb-2 m-2">
		    <div class="col-md-12" >	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
          <thead>
          <tr role="row">
              <th>Sr. No.</th>
           
                    <th><?php echo e(__('hostel.Student Name')); ?></th>
                    <th><?php echo e(__('common.Fathers Name')); ?></th>
                     <th><?php echo e(__('Invoice No.')); ?></th>
                    <th><?php echo e(__('common.Date')); ?></th>
                    <th>Discount</th>
                    <th><?php echo e(__('Paid Amount')); ?></th>
                    <th><?php echo e(__('hostel.Payment Mode')); ?></th>
          </thead>
       
            
            <tbody>
                <?php
                    $i=1;
                ?>
                    <?php if(!empty($feesGroup)): ?>
                      <?php $__currentLoopData = $feesGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                      <tr>
                          <td><?php echo e($i++); ?>.</td>
                          <td><?php echo e($item['first_name'] ?? ''); ?><?php echo e($item['last_name'] ?? ''); ?></td>
                    <td><?php echo e($item['f_name'] ?? ''); ?></td>
                    
                    
                    <?php if(!empty($fees)): ?>
                    
                    <?php
                    
                $invoices = '';
                $dates = '';
                $discount = '';
                $paid_amount = '';
                $payment_mode = '';
                $total =0;
                    ?>
                    
                    <?php $__currentLoopData = $fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    
                    
                      <?php
                      
                     
                if($detail->admission_id == $item['admission_id'])
                {
                $receipt_no =   DB::table('invoices')->find($detail->invoice_id);
     $invoices .= "<span>$receipt_no->invoice_no</span><br>";
     $dates .= "<span>". date('d-m-Y', strtotime($detail->date)) ."</span><br>";
     $discount .= "<span>$detail->discount /-</span><br>";
     $paid_amount .= "<span>$detail->paid_amount /-</span><br>";
      $paymentModeName = $detail['PaymentMode']['name'] ?? '-';
     $payment_mode .="<span>$paymentModeName</span><br>";
    
    
}                  $total += $detail->paid_amount; 
                  ?>

                    
                 
                    
                    
                     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
        <?php endif; ?>

                    <td>
                        <?php echo $invoices; ?>

                    </td>
                    <td>
                        <?php echo $dates; ?>

                    </td>
                    <td>
                        <?php echo $discount; ?>

                    </td>
                    <td>
                        <?php echo $paid_amount; ?>

                    </td>
                    <td>
                        <?php echo $payment_mode; ?>

                    </td>
                          
                      </tr>
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    
                    <?php endif; ?>
            </tbody>
            
            <tfoot>
                
                <tr>
                  <td colspan="6" class="text-right"><b>Total : </b></td>
                  <td colspan="7"><b><?php echo e($total ?? ''); ?> /-</b></td>
                  </tr>
            </tfoot>
        </table>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>
</section>
</div>
        
        


<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content">
        <div class="modal-header">
            
            <h4 class="text-center" style="width:100%;"><?php echo e(__('common.Class')); ?>: <span id="class_type_id1"></span> (<span id="section_id1"></span>) &nbsp; &nbsp; <?php echo e(__('common.Name')); ?>: <span id="first_name"></span></h4>   
                  <button type="button" id="closeModal"class="close" data-bs-dismiss="modal" aria-hidden="true">x</button>
        </div>
        <form action="<?php echo e(url('editFeesDetails')); ?>" method="post">
            <?php echo csrf_field(); ?>
              <input type="hidden" id="admission_id" name="admission_id">
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead>
                  <tr role="row">
                      <th><?php echo e(__('common.SR.NO')); ?></th>
                            <th><?php echo e(__('hostel.Fees Type')); ?></th>
                            <th><?php echo e(__('hostel.Paid Amount')); ?></th>
                             <th><?php echo e(__('common.Action')); ?></th>
                  </thead>
                  <tbody  id="tbody">
                      
                     <!-- <?php if(!empty($dataview)): ?>
                        <?php
                           $i=1
                        ?>
                        <?php $__currentLoopData = $dataview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $getFeesType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item1['id']== $item['fees_type_id']): ?>
                        <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($item['FeesType']['name'] ?? ''); ?></td>
                                <td><span id="<?php echo e($item['FeesType']['name'] ?? ''); ?>" class="editable"><?php echo e($item['amount']); ?></span></td>
                                <td>
                                   <a href="<?php echo e(url('print_payement',$item->id)); ?>" target="blank" class="btn btn-success  btn-xs" title="Fees Print"><i class="fa fa-print"></i></a>
                                    <a href="<?php echo e(url('edit_fees')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary  btn-xs ml-3"><i class="fa fa-edit"></i></a>
                                </td>
                      </tr>
                       <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>-->
                    </tbody>
                </table>

            </div>
        
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" id="closeModal"class="close" data-dismiss="modal"><?php echo e(__('common.Submit')); ?></button>
            </div>
        </form>
      </div>
    </div>
</div>


 
<script>
    
             $('.feesDetail').click(function() {
                 count=2;
	var first_name = $(this).data('first_name');
	var class_type_id = $(this).data('class_type_id');
	var section_id = $(this).data('section_id');
	var admission_id = $(this).data('admission_id');

// 	$('#first_name').html(first_name);
// 	$('#class_type_id1').html(class_type_id);
// 	$('#section_id1').html(section_id);
// 	$('#admission_id').val(admission_id);
    var basurl = "<?php echo e(url('/')); ?>";
            $.ajax({
                 type: "post",
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        	    url: basurl+'getFeesDetail',
        	     data:{admission_id:admission_id},
        	    success: function(result){
        	     
        	  jQuery('#tbody').html(result)
        	   $('#myModal').modal('toggle');
        	         	$('#first_name').html(first_name);
                        $('#class_type_id1').html(class_type_id);
                    	$('#section_id1').html(section_id);
 	                    $('#admission_id').val(admission_id);
 	        	 
 	        	   $(".editable").each(function () {
        //Reference the Label.
        var label = $(this);
 
        //Add a TextBox next to the Label.
        label.after("<input type = 'text' style = 'display:none;width:100px;' />");
 
        //Reference the TextBox.
        var textbox = $(this).next();
 
        //Set the name attribute of the TextBox.
        
        textbox[0].name = this.id.replace("n"+count, "amount[]");
    count++;
        //Assign the value of Label to TextBox.
        textbox.val(label.html());
 
        //When Label is clicked, hide Label and show TextBox.
        label.click(function () {
            $(this).hide();
            $(this).next().show();
        });
 
        //When focus is lost from TextBox, hide TextBox and show Label.
        textbox.focusout(function () {
            $(this).hide();
            $(this).prev().html($(this).val());
            $(this).prev().show();
        });
    });
 	       	  }
        	});
        
             });
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/fees/index.blade.php ENDPATH**/ ?>