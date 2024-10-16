<?php
  $classType = Helper::classType();
  $getCountry = Helper::getCountry();
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

.capitalize{
    text-transform:capitalize;
}
</style>

<div class="content-wrapper">

   <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">      
    <div class="card card-outline card-orange">
        <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('fees.Fees Details')); ?> </h3>
        <div class="card-tools">
        <a href="<?php echo e(url('Fees/add')); ?>" class="btn btn-primary  btn-sm" title="Add Fees"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?></a>
        <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
        </div>
        
        </div>  
        
                    <form id="quickForm" action="<?php echo e(url('fees/index')); ?>" method="post" >
                        <?php echo csrf_field(); ?> 
                    <div class="row m-2">
                    <?php if(Session::get('role_id') !== 2): ?>
                        <div class="col-md-1">
                    		<div class="form-group">
                    			<label><?php echo e(__('common.Class')); ?></label>
                    			<select class="form-control select2" id="class_type_id" name="class_type_id" >
                    			<option value=""><?php echo e(__('common.Select')); ?></option>
                                 <?php if(!empty($classType)): ?> 
                                      <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == $serach['class_type_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                    	    </div>
                    	</div>
                    <?php endif; ?>
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
                    <!--    <div class="col-md-2">
            			<div class="form-group">
            				<label><?php echo e(__('student.Admission No.')); ?></label>
            				<input type="text" class="form-control" id="admission_no" name="admission_no" placeholder="<?php echo e(__('student.Admission No.')); ?>" value="<?php echo e($serach['admission_no'] ?? ''); ?>">
            		    </div>
            		</div>--> 
            		<div class="col-md-3">
            			<div class="form-group"> 
            				<label><?php echo e(__('common.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('common.Search By Keywords')); ?>" value="<?php echo e($serach['name'] ?? ''); ?>">
            		    </div>
            		</div>                     	
                        <div class="col-md-1 ">
                             <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                    	    <button type="submit" class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                    	</div>
                    			
                    </div>
                </form>        

   
        
    	<div class="row mb-2 m-2">
		    <div class="col-md-12">	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
        <thead>
            <tr role="row">
                <th><?php echo e(__('common.SR.NO')); ?></th>
                <th>Ledger No.</th>
                <th><?php echo e(__('fees.Receipt No')); ?></th>
                <th><?php echo e(__('fees.Pay Mode')); ?></th>
                <th>Transaction Id</th>
                <th>Bank Name</th>
                <th>Payment Date</th>
                <th>Fees Type</th>
                <th><?php echo e(__('fees.Student Name')); ?></th>
                <th><?php echo e(__('common.Fathers Name')); ?></th>
                <th><?php echo e(__('common.Class')); ?></th>
                <th><?php echo e(__('common.Date')); ?></th>
                <th><?php echo e(__('common.Amount')); ?></th>
                <th><?php echo e(__('common.Action')); ?></th>
            </tr>    
        </thead>
         
        <tbody id="fees_list_show">
              <?php if(!empty($fees)): ?>
                <?php
                   $i=1;
       
                   $total=0;
                ?>
                <?php $__currentLoopData = $fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $feesType = DB::table('fees_group')->where('id',$item->fees_group_id)->whereNull('deleted_at')->first();
                ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($item['Admission']['ledger_no'] ?? 'N/A'); ?></td>
                    <td><?php echo e($item['receipt_no'] ??'-'); ?></td>
                    <td><?php echo e($item['PaymentMode']['name']); ?></td>
                    <td><?php echo e($item['transition_id'] ?? '-'); ?></td>
                    <td><?php echo e($item['bank_name'] ?? '-'); ?></td>
                    <td><?php echo e(date('d-M-Y', strtotime($item['date']))); ?></td>
                    <td><?php echo e($feesType->name  ?? '-'); ?></td>
                    <td class="capitalize"><?php echo e(strtolower($item['Admission']['first_name'] ?? '')); ?> <?php echo e(strtolower($item['Admission']['last_name'] ?? '')); ?></td>
                    <td class="capitalize"><?php echo e(strtolower($item['Admission']['father_name'] ?? '')); ?></td>
                    <td><?php echo e($item['class_name'] ?? ''); ?></td>
                    <td><?php if(!empty($item->date)): ?><?php echo e(date('d-M-Y', strtotime($item->date))); ?><?php endif; ?></td>
                    <td>₹ <?php echo e(number_format($item['total_amount'] ,2) ?? ''); ?></td>
                    <td>
                    <a href="<?php echo e(url('print_payement',$item->id)); ?>" target="blank" class="btn btn-primary  btn-xs" title="Fees Print"><i class="fa fa-print"></i></a>
                    <!--<a data-admission_id='<?php echo e($item->admission_id ?? ''); ?>' data-first_name='<?php echo e($item['Student']->first_name ?? ''); ?> <?php echo e($item['Student']->last_name ?? ''); ?>' data-class_type_id='<?php echo e($item['ClassTypes']->name ?? ''); ?>' data-toggle="modal" data-target="" class="btn btn-primary  btn-xs ml-3 feesDetail " title="View Fees"><i class="fa fa-bars"></i></a>-->
                    <!--<a href="javascript:;" data-id='<?php echo e($item->id); ?>'data-collect_id='<?php echo e($item->fees_collect_id); ?>'data-revert_amount='<?php echo e($item->total_amount); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger  btn-xs" title="Revert Fees"><i class="fa fa-undo"></i></a>-->
                    <a href="<?php echo e(url('fees_ledger_print',$item['Admission']['id'] ?? '')); ?>"  class="btn btn-primary  btn-xs" title="View Fees Ledger"><i class="fa fa-bar-chart-o"></i></a>
                    </td>
                </tr>
              <?php
              $total +=$item['total_amount'];
              ?>
             
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <tfoot>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b><?php echo e(__('Total')); ?></b></td>
                  <td><b>₹ <?php echo e(number_format($total ,2) ?? ''); ?></b></td>
                  <td></td>
              </tr>
              </tfoot>
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
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('fees.Revert Fees Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="<?php echo e(url('collect_fees_delete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              <input type=hidden id="delete_id" name="delete_id">
              <input type=hidden id="collect_id" name="collect_id">
              <input type=hidden id="revert_amount" name="revert_amount">
              <h5 class="text-white"><?php echo e(__('fees.Are you sure you want to revert fees ? This action is irreversible.')); ?></h5>
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
         </div>
       </form>
    </div>
  </div>
</div>
 
<script>
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  var collect_id = $(this).data('collect_id'); 
  var revert_amount = $(this).data('revert_amount'); 
  
  $('#delete_id').val(delete_id); 
  $('#collect_id').val(collect_id); 
  $('#revert_amount').val(revert_amount); 
  } );

    
             $('.feesDetail').click(function() {
                 count=2;
	var first_name = $(this).data('first_name');
	var class_type_id = $(this).data('class_type_id');
	var admission_id = $(this).data('admission_id');

// 	$('#first_name').html(first_name);
// 	$('#class_type_id1').html(class_type_id);
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/fees/fees_collect/index.blade.php ENDPATH**/ ?>