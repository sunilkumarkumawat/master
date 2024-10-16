<?php
$role = Helper::roleType();
$getPermission = Helper::getPermission();
$actionPermission = Helper::actionPermission();
?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-code-fork"></i> &nbsp;<?php echo e(__('Student Fees Details')); ?></h3>
                        </div>
                        
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="col-md-12 mt-2 mb-2">
                                        <div class="listing_tab">
                                            <ul>
                                                <?php if($student->school != 0): ?>
                                                <li class="get_data active" data-title="school_fees">School Fees</li>
                                            <?php endif; ?>
                                             <?php if($student->library != 0): ?>
                                                <li class="get_data" data-title="library_fees">Library Fees</li>
                                            <?php endif; ?>
                                             <?php if($student->hostel != 0): ?>
                                                <li class="get_data" data-title="hostel_fees">Hostel Fees</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div> 
                                    
                                    
                                    <div class="row">
                                        <div class="tabData w-100" id="tab_school_fees" style="display:none;">
                                            
                                           
                                                <div class="col-md-12 ml-4 text-left">
                                                <b>Total Assigned Fees :</b> <?php echo e($data['total_school_fees'] ?? ''); ?>

                                                </div>
                                                <div class="col-md-12 ml-4 text-left">
                                                <b>Total Collected Fees :</b> <?php echo e($data['collected_school_fees'] ?? ''); ?>

                                                </div>
                                               
                                           
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <table class="table table-bordered padding_table table-responsive">
                                                        <thead>
                                                            <tr class="sky_tr">
                                                                <th>Sr No.</th>
                                                                <th>Receipt No.</th>
                                                                <!--<th>Mobile</th>-->
                                                                <th>Payment Date</th>
                                                                <th>Pay Amount (₹)</th>
                                                                <th>Payment Mode</th>
                                                                <th>Discount (₹)</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
    
                                                        <tbody>
                                                            <?php if(!empty($data['school_fees'])): ?>
                                                            <?php
                                                                $i = 1;
                                                                $total_amount = 0;
                                                                $total_discount = 0;
                                                            ?>
                                                                <?php $__currentLoopData = $data['school_fees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <tr>
                                                                        <td><?php echo e($i++); ?></td>
                                                                        <td><?php echo e($item->receipt_no ?? ''); ?></td>
                                                                        <!--<td><?php echo e($item->mobile ?? ''); ?></td>-->
                                                                        <td>
                                                                            <?php if(!empty($item->date)): ?> 
                                                                                <?php echo e(date('d-M-Y', strtotime($item->date))); ?>

                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($item->paid_amount ?? '0'); ?></td>
                                                                        <td><?php echo e($item['paymentMode']['name'] ?? '0'); ?></td>
                                                                        <td><?php echo e($item->discount ?? '0'); ?></td>
                                                                        <td>
                                                                            <a href="<?php echo e(url('print_payement')); ?>/<?php echo e($item->id); ?>" target="blank">
                                                                                <button class="btn btn-primary">
                                                                                    <i class="fa fa-print"></i>
                                                                                </button>
                                                                            </a>
                                                                        </td>
                                                                   </tr>
                                                                   <?php
                                                                    $total_amount += $item->paid_amount;
                                                                    $total_discount += $item->discount ?? 0;
                                                                   ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                <tr >
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-right"><b>Total Paid Amount : </td>
                                                                  
                                                                    <td class="text-left">₹<?php echo e($total_amount ?? '0'); ?></b></td>
                                                                    <td class="text-right"><b>Total Discount Amount :</td>
                                                                   <td> ₹ <?php echo e($total_discount ?? '0'); ?></b></td>
                                                                </tr>
                                                                
                                                                <?php else: ?>
                                                                <tr class="text-center">
                                                                    <td colspan="12"><b>!! NO DATA FOUND !!</b></td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabData w-100" id="tab_library_fees" style="display:none;">
                                             <div class="col-md-12 ml-4 text-left">
                                                <b>Total Assigned Fees :</b> <?php echo e($data['total_library_fees'] ?? ''); ?>

                                                </div>
                                                <div class="col-md-12 ml-4 text-left">
                                                <b>Total Collected Fees :</b> <?php echo e($data['collected_library_fees'] ?? ''); ?>

                                                </div>
                                        
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <table class="table table-bordered padding_table">
                                                        <thead>
                                                            <tr class="sky_tr">
                                                                <th>Sr No.</th>
                                                                <th>Invoice</th>
                                                                <th>Total Amount (₹)</th>
                                                                <th>Pay Amount (₹)</th>
                                                                <th>Due Amount (₹)</th>
                                                                <th>Discount (₹)</th>
                                                                  <th>Payment Mode</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
    
                                                        <tbody>
                                                            <?php if(!empty($data['library_fees'])): ?>
                                                            <?php
                                                                $i = 1;
                                                                $total_amount = 0;
                                                                $paid_amount = 0;
                                                                $due_amount = 0;
                                                                $discount = 0;
                                                            ?>
                                                                <?php $__currentLoopData = $data['library_fees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                   <tr>
                                                                        <td><?php echo e($i++); ?></td>
                                                                        <td><?php echo e($item->invoice_no ?? ''); ?></td>
                                                                        <td><?php echo e($item->total_amount ?? '0'); ?></td>
                                                                        <td><?php echo e($item->paid_amount ?? '0'); ?></td>
                                                                   
                                                                        <td><?php echo e($item->due_amount ?? '0'); ?></td>
                                                                        <td><?php echo e($item->discount ?? '0'); ?></td>
                                                                             <td><?php if(!empty($paymentModes)): ?>
                                                                        <?php $__currentLoopData = $paymentModes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($modes->id == $item->payment_mode_id): ?>
                                                                        
                                                                        <?php echo e($modes->name ?? ''); ?>

                                                                        <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(url('invoice')); ?>/<?php echo e($item->invoice_no ?? ''); ?>/<?php echo e($item->admission_id ?? ''); ?>" target="blank">
                                                                                <button class="btn btn-primary">
                                                                                    <i class="fa fa-print"></i>
                                                                                </button>
                                                                            </a>
                                                                        </td>
                                                                   </tr>
                                                                   <?php
                                                                    $total_amount += $item->total_amount;
                                                                    $paid_amount += $item->paid_amount;
                                                                    $due_amount += $item->due_amount;
                                                                    $discount += $item->discount;
                                                                   ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                <tr class="text-left">
                                                                    <td><b>Grand Total</b></td>
                                                                    <td></td>
                                                                    <td><b>₹ <?php echo e($total_amount ?? '0'); ?></b></td>
                                                                    <td><b>₹ <?php echo e($paid_amount ?? '0'); ?></b></td>
                                                                   
                                                                     <td><b>₹ <?php echo e($due_amount ?? '0'); ?></b></td>
                                                                 <td><b>₹ <?php echo e($discount ?? '0'); ?></b></td>
                                                                 <td></td>
                                                                 <td></td>
                                                                </tr>
                                                                
                                                                <?php else: ?>
                                                                <tr class="text-center">
                                                                    <td colspan="12"><b>!! NO DATA FOUND !!</b></td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabData w-100" id="tab_hostel_fees" style="display:none;">
                                              <div class="col-md-12 ml-4 text-left">
                                                <b>Total Assigned Fees :</b> <?php echo e($data['total_hostel_fees'] ?? ''); ?>

                                                </div>
                                                <div class="col-md-12 ml-4 text-left">
                                                <b>Total Collected Fees :</b> <?php echo e($data['collected_hostel_fees'] ?? ''); ?>

                                                </div>
                                     
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <table class="table table-bordered padding_table">
                                                        <thead>
                                                            <tr class="sky_tr">
                                                                <th>Sr No.</th>
                                                                <th>Invoice</th>
                                                                <th>Total Amount (₹)</th>
                                                                <th>Pay Amount (₹)</th>
                                                                <th>Due Amount (₹)</th>
                                                                <th>Discount (₹)</th>
                                                                  <th>Payment Mode</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
    
                                                        <tbody>
                                                            <?php if(!empty($data['hostel_fees'])): ?>
                                                            <?php
                                                                $i = 1;
                                                                $total_amount = 0;
                                                                $paid_amount = 0;
                                                                $due_amount = 0;
                                                                $discount = 0;
                                                            ?>
                                                                <?php $__currentLoopData = $data['hostel_fees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                   <tr>
                                                                        <td><?php echo e($i++); ?></td>
                                                                        <td><?php echo e($item->invoice_no ?? '0'); ?></td>
                                                                        <td><?php echo e($item->total_amount ?? '0'); ?></td>
                                                                        <td><?php echo e($item->paid_amount ?? '0'); ?></td>
                                                                        <td><?php echo e($item->due_amount ?? '0'); ?></td>
                                                                        <td><?php echo e($item->discount ?? '0'); ?></td>
                                                                        <td><?php if(!empty($paymentModes)): ?>
                                                                        <?php $__currentLoopData = $paymentModes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($modes->id == $item->payment_mode_id): ?>
                                                                        
                                                                        <?php echo e($modes->name ?? ''); ?>

                                                                        <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <a href="<?php echo e(url('hostel_invoice')); ?>/<?php echo e($item->invoice_no ?? ''); ?>/<?php echo e($item->admission_id ?? ''); ?>" target="blank">
                                                                                <button class="btn btn-primary">
                                                                                    <i class="fa fa-print"></i>
                                                                                </button>
                                                                            </a>
                                                                        </td>
                                                                   </tr>
                                                                   <?php
                                                                  $total_amount += $item->total_amount;
                                                                    $paid_amount += $item->paid_amount;
                                                                    $due_amount += $item->due_amount;
                                                                    $discount += $item->discount;
                                                                   ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                            <tr class="text-left">
                                                                    <td><b>Grand Total</b></td>
                                                                    <td></td>
                                                                    <td><b>₹ <?php echo e($total_amount ?? '0'); ?></b></td>
                                                                    <td><b>₹ <?php echo e($paid_amount ?? '0'); ?></b></td>
                                                                
                                                                     <td><b>₹ <?php echo e($due_amount ?? '0'); ?></b></td>
                                                                 <td><b>₹ <?php echo e($discount ?? '0'); ?></b></td>
                                                                 <td></td>
                                                                 <td></td>
                                                                </tr>
                                                                
                                                                <?php else: ?>
                                                                <tr class="text-center">
                                                                    <td colspan="12"><b>!! NO DATA FOUND !!</b></td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function(){
        var length = $('.get_data').length;
        for(var i= 0; i < length; i++){
            var title = $('.get_data').eq(0).data('title');
            $('.get_data').eq(0).addClass('active');
        }
        
        $('#tab_' + title).show();
        
        $('.get_data').click(function(){
            var title = $(this).data('title');
            $('.tabData').hide();
            $('.get_data').removeClass('active');
            
            $(this).addClass('active');
            $('#tab_' + title).show();
        }); 
    });

</script>

<style>
    .listing_tab ul{
        padding-left: 0px;
        margin-bottom: 0px;
        list-style: none;
        display: flex;
        align-items: center;
    }
    
    .padding_table td,
    .padding_table th{
        padding: 10px;
    }
    
    .sky_tr{
        background: #002c54;
        color:white;
    }
    
    .listing_tab{
        margin: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-top: 1px solid #c6c6c6;
        border-bottom: 1px solid #c6c6c6;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    
    .listing_tab ul li{
        background: lightgray;
        padding: 10px;
        margin: 0px 10px;
        border-radius: 4px;
        cursor:pointer;
        font-size:16px;
        font-weight:400;
    }
    
    .active{
        box-shadow: 0px 1px 6px #8d8d8d inset;
        background-color: #002c54 !important;
        color: white;
        font-weight:600 !important;
    }
    
    .listing_tab ul li:first_child{
        margin-left:0px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/fees/student_fees_details.blade.php ENDPATH**/ ?>