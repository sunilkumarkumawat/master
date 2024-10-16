<?php
$getSetting = Helper::getSetting();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?php echo e($data[0]['first_name'] ?? ''); ?>_Store_Receipt_<?php echo e(date('d-m-Y', strtotime($data[0]['date'] ?? date('d-m-Y') ))); ?> </title>
    <style>
     
      body {
   font-family: Arial, sans-serif;
      font-size:12px;
      max-width:750px;
      margin: 25px auto ;
   // border: 0.5px solid; 
   }
   
   .student_img {
   width: 80px; 
   height:100; 
   margin-top: 5%;
   margin-left:20%;
   padding-bottom: 10px;
       
   }
   
   .row{
       margin-right: 0px;
   }
   .img_background_fixed{
     position: relative;
   }
   
   .img_absolute{
       position: absolute;
       top: 85px;
       width: 100%;
       display: flex;
       align-items: center;
       justify-content: center;
       height: 100%;
       right: 0;
   }
   
   .backhround_img{
       opacity: 0.3;
       width: 34%;
   }
   
   .line_height{
       line-height:30px;
   }

   table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .invoice-header {
            margin-bottom: 20px;
            text-align:'center'
        }

        .border_none{
            border: none;
        }
        
        .bg_color_heading td{
            background-color:#f2f2f2;
            font-weight:600;
        }
     
   </style>
</head>
<body class='page'>
<table style="border: 1px solid;width:100%;" >
			<tbody >
					<tr>
      <td class="border_none" rowspan='2' width='25%'>
          <img src="<?php echo e(env('IMAGE_SHOW_PATH').'setting/left_logo/'.$getSetting->left_logo); ?>" style="width: 150px;height: 150px;">
          </td>
      
      </td>
    
   </tr>
	<tr style="text-align:center;">
      <td class="border_none" width='50%'  style="text-align:center;">
       <span style="font-size:20px;text-align:center;"><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span>
      <p style="margin-bottom: -9px;"><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?></p>
    </td>
      <td class="border_none" width='25%'></td>
      </tr>

  </tbody>
  </table> 

  <table >
     
      	<tbody >
      	     <tr>
          <th style="border: 1px solid #000; padding: 8px;">Receipt No.</th>
          <td style="border: 1px solid #000; padding: 8px;"><?php echo e($data[0]['receipt_no'] ?? ''); ?></td>
           <th style="border: 1px solid #000; padding: 8px;">Admission No.</th>
          <td style="border: 1px solid #000; padding: 8px;"><?php echo e($data[0]['admissionNo'] ?? ''); ?></td>
          
      </tr>
      <tr>
          <th style="border: 1px solid #000; padding: 8px;">Name</th>
          <td style="border: 1px solid #000; padding: 8px;"><?php echo e($data[0]['first_name'] ?? ''); ?> <?php echo e($data[0]['last_name'] ?? ''); ?></td>
          <th style="border: 1px solid #000; padding: 8px;">Father's Name</th>
          <td style="border: 1px solid #000; padding: 8px;"><?php echo e($data[0]['father_name'] ?? ''); ?></td>
         
      </tr>
      <tr>
          <th  style="border: 1px solid #000; padding: 8px;">Class</th>
          <td style="border: 1px solid #000; padding: 8px;">
              <?php echo e($data[0]['class_name'] ?? ''); ?>

         </td>
          <th style="border: 1px solid #000; padding: 8px;">Mobile</th>
          <td style="border: 1px solid #000; padding: 8px;"><?php echo e($data[0]['mobile'] ?? ''); ?></td>
         
      </tr>
     
       </tbody>
      
  </table>
 
 <p><strong style='font-size:15px'>Item Details</strong></p>

    <table width="100%" style="border-collapse: collapse; border: 1px solid #000;">
        <thead>
            
           
            <tr>
                <th style="border: 1px solid #000; padding: 8px;" width='50%'>Item Name</th>
                <th style="border: 1px solid #000; padding: 8px;" width='10%'>Qty</th>
                <th style="border: 1px solid #000; padding: 8px;" width='20%'>Rate</th>
                <th style="border: 1px solid #000; padding: 8px;" width='20%'>Amount</th>
            </tr>
           
        </thead>
        <tbody id="itemTable">
        <?php if(!empty($data)): ?>
        
        <?php
        $total = 0;
        $receiptNo= '';
        ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<?php
								$store_item_name = DB::table('store_items')->where('id',$item->store_item_id)->whereNull('deleted_at')->first();
								
								$receiptNo=$item->receipt_no;
								?>
            <tr>
            <td style="border: 1px solid #000; padding: 8px;"><?php echo e($store_item_name->name ?? ''); ?></td>
            <td style="border: 1px solid #000; padding: 8px;"><?php echo e($item->qty ?? 0); ?></td>
            <td style="border: 1px solid #000; padding: 8px;">₹ <?php echo e($item->price ?? 0); ?></td>
            <td style="border: 1px solid #000; padding: 8px;">₹ <?php echo e($item->qty * $item->price); ?></td>
            </tr>
            
            <?php
            $total += ($item->qty * $item->price);
            ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
        </tbody>
        <tfoot>
            <tr class="bg_color_heading">
                <td  style="border: 1px solid #000;"></td>
               <td id="totalAmount" style="border: 1px solid #000; padding: 8px;"></td>
                <td style="border: 1px solid #000; padding: 8px;text-align:right">Total Amount</td>
                  <td id="totalAmount" style="border: 1px solid #000; padding: 8px;">₹ <?php echo e($total ?? 0); ?></td>
            </tr>
            <?php
                $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                $words = $formatter->format($total);
                $words .= ' rupees';
            ?>
            <tr class="bg_color_heading">
                <td  style="border: 1px solid #000;padding: 8px;text-align:right">Amount In Words :</td>
                <td colspan="3" style="border: 1px solid #000;text-transform:capitalize;text-align:center"><?php echo e($words ?? ''); ?></td>
            </tr>
        </tfoot>
    </table>
    <p><strong style='font-size:15px'>Transaction Details</strong></p>
    <table width="100%" style="border-collapse: collapse; border: 1px solid #000;">
        <thead>
            
           
            <tr>
                <th colspan='3'style="border: 1px solid #000; padding: 8px;" >Date</th>
                <th style="border: 1px solid #000; padding: 8px;" width='20%'>Amount</th>
                
            </tr>
           
        </thead>
        <tbody id="itemTable">
        <?php if(!empty($data)): ?>
        
       
          
            
            	<?php
		
								$transactions = DB::table('store_item_billing_details')->where('receipt_no',$receiptNo)->whereNull('deleted_at')->get();
								
								$total_transactions = 0;
								?>
								
								<?php if(!empty($transactions)): ?>
								
								<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
								<?php if($transaction->amount > 0): ?>
								<?php
								$total_transactions += $transaction->amount ?? 0;
								?>
								
								<tr>
								<td colspan='3' style="border: 1px solid #000; padding: 8px;"><?php echo e($transaction->date ?? ''); ?></td>
            <td style="border: 1px solid #000; padding: 8px;">₹ <?php echo e($transaction->amount ?? 0); ?></td>
							</tr>
							
							<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								   
								<?php endif; ?>
         
            
          
            
            <?php endif; ?>
            
        </tbody>
        <tfoot>
            <tr class="bg_color_heading">
               
              
                <td  colspan='3'style="border: 1px solid #000;text-align:right">Total Paid Amount</td>
               <td id="totalAmount" style="border: 1px solid #000; padding: 8px;">₹ <?php echo e($total_transactions); ?></td>
               
            </tr>
            
            <?php
            $pendings = $total-$total_transactions;
            ?>
            
            <?php if($pendings > 0): ?>
            
            <tr class="bg_color_heading">
               
              
                <td  colspan='3'style="border: 1px solid #000;text-align:right;color:red">Total Pending Amount</td>
               <td id="totalAmount" style="border: 1px solid #000; padding: 8px;color:red">₹ <?php echo e($total-$total_transactions); ?></td>
               
            </tr>
            
            <?php endif; ?>
            <?php
                $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                $words = $formatter->format($total_transactions);
                $words .= ' rupees';
            ?>
            <tr class="bg_color_heading">
             
                <td  colspan="2" width='50%'style="border: 1px solid #000;padding: 8px;text-align:right">Amount In Words :</td>
                <td colspan="2" style="border: 1px solid #000;text-transform:capitalize; text-align:center"><?php echo e($words ?? ''); ?></td>
            </tr>
        </tfoot>
    </table>
       <div style="margin-top: 20px;">
        <p><strong>Instructions on School Cash Memo:</strong></p>
        <ol class="line_height">
            <li>Please retain this memo for your records.</li>
             <li>This memo acknowledges the student's request for the following item(s): School Supplies (e.g., Books, Stationery).</li>
            <li>If you have any questions regarding this transaction, please contact [<?php echo e($getSetting['mobile'] ?? ''); ?>].</li>
            <li>Thank you for your support of [<?php echo e($getSetting['name'] ?? ''); ?>].</li>
        </ol>
           <hr style="border-top: 1px solid #000; margin: 20px 0;">
        <p style='text-align:center'><strong>This memo is electronically generated and no signature is required.</strong></p>
    </div>




 



</body>
</html><?php /**PATH /home/rusoft/public_html/demo3/resources/views/print_file/store_print/store_receipt.blade.php ENDPATH**/ ?>