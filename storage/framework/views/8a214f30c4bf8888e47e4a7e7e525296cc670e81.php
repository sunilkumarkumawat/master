<?php
$getSetting = Helper::getSetting();
$account = Helper::getQRCode($getSetting->account_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Print </title>
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
        
        .information_text{
            font-size:12px;
        }
        
        .note_listing{
            margin-bottom:0px;
            /*list-style:none;*/
        }
        
        .note_listing li{
            margin-top:10px;
            font-size:12px;
        }
        .copy_font{
            text-align: center;
            margin: 0px;
            font-size: 17px;
            font-family: emoji;
        }
     
   </style>
</head>
<body class='page'>
<div style="border:1px solid;">    
<table style="border-bottom: 0px solid;width:100%;" >
			<tbody >
	<tr>
      <td class="border_none" rowspan='1' colspan="12"width='20%'>
          <img  rowspan="4" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?> " style="width: 97px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'">
          
          </td>
          <td style="text-align:center; border: none"><span class="style71"><strong style="font-size: 40px"><?php echo e($getSetting['name'] ?? ''); ?></strong></span>
          <p style="margin-bottom: 0px;"><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?></p>
          <p style="margin-bottom:6px;"><b >Phone:-</b> <?php echo e($getSetting['mobile'] ?? ''); ?> &nbsp;<b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?>  </p>
          </td>
          
        <!--<td class="border_none" width='50%' style="font-size:20px;text-align:center;"></td>
        <td class="border_none" width='25%'> 
        </td>-->
    
   </tr>
   

<!--	<tr style="text-align:center;">
	    
      <td class="border_none" width='50%'  style="text-align:center;">
       <span style="font-size:20px;text-align:center;"><strong><?php if(($data[0]['classNumber'] ?? 0) > 10): ?>
           <?php echo e($getSetting['name'] ?? ''); ?>

           
           <?php else: ?>
           <?php echo e(str_replace('Sr.', '', $getSetting['name'] ?? '')); ?>

           
           
           <?php endif; ?></strong></span>
      <p style="margin-bottom: -9px;"><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?></p>
    </td>
      <td class="border_none" width='25%'></td>
      </tr>-->

  </tbody>
  </table> 
     <!--<div>     <div class="copy_font" style="text-align: right;">      Office Copy / Student Copy</div>     <div class="copy_font" style="text-align: right;">      Office Copy / Student Copy</div></div>-->
 
<table>
     <?php
                             $sessions  = DB::table('sessions')->whereNull('deleted_at')->where('id',$data[0]['Admission']['session_id'])->first();

     ?>
      	<tbody >
      	    <tr><td rowspan='3'style="text-align: center;"><b>Receipt No.: <span style='color:red' ><?php echo e($data[0]['receipt_no'] ?? ''); ?></span></b>
      	  
      	    </td>
      	    </tr>
      <tr>
          <th>Name</th>
          <td><?php echo e($data[0]['Admission']['first_name'] ?? ''); ?> <?php echo e($data[0]['last_name'] ?? ''); ?></td>
          <th>Father's Name</th>
          <td><?php echo e($data[0]['Admission']['father_name'] ?? ''); ?></td>
         
      </tr>
      <tr>
          <th>Class</th>
          <td>
              <?php echo e($data[0]['Admission']['ClassTypes']['name'] ?? ''); ?>

         </td>
          <th>Mobile</th>
          <td><?php echo e($data[0]['Admission']['mobile'] ?? ''); ?></td>
         
      </tr>
      <tr>
          <td rowspan='2'style="text-align: center;">
      	    <b>Session : <span><?php echo e($sessions->from_year ?? ''); ?>-<?php echo e($sessions->to_year ?? ''); ?></span></b>
      	    </td>
          <th>Payment Date</th>
          <td><?php echo e(date('d-M-Y', strtotime($data[0]->date))); ?></td>
          <th>Generated On</th>
          <td><?php echo e(date('d-M-Y', strtotime($data[0]->created_at))); ?></td>
          
      </tr>
       </tbody>
      
  </table>
<table style="margin-bottom: 0px;">
        <thead>
            <tr>
                <th  width='30%'>Head Name</th>
                <th>Due Date</th>
                <th>Amount</th>
                <th>Late Fee</th>
                <th>Paid</th>
              
            </tr>
        </thead>
        <tbody>
            
            <?php if(!empty($data)): ?>
            <?php
            $total_amount = 0;
            ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td >
                    <?php
                        $feesGroup  = DB::table('fees_group')->whereNull('deleted_at')->where('id',$item['fees_group_id'])->first();
                        $fees_master  = DB::table('fees_master')->whereNull('deleted_at')->where('fees_group_id',$item['fees_group_id'])->where('class_type_id',$data[0]['Admission']['ClassTypes']['id'])->first();
                    ?>
                
                <?php echo e($feesGroup->name ?? ''); ?>

                </td>
                <td><?php echo e(date('d-M-Y', strtotime($fees_master->installment_due_date)) ?? ''); ?></td>
                <td><?php echo e(number_format($fees_master->amount ?? 0, 2)); ?></td>
                <td> <?php echo e(number_format($item['installment_fine'] ?? 0, 2)); ?>

                <?php
                $total_amount += $item['total_amount'] ?? 0;
                ?>
                
                </td>
                <td><?php echo e(number_format($item['total_amount'] ?? 0, 2)); ?></td>
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <!-- Add more rows for additional items -->
        </tbody>

  </table>
        <?php
            $payment_name = DB::table('payment_modes')->whereNull('deleted_at')->where('id',$data[0]->payment_mode_id)->first();
        ?>
           
      
  <table style="margin-bottom: 0px;">
        <tbody>
            
            <tr class="bg_color_heading">
                <td >Payment Mode</td>
            
                    <td >Transaction Id</td>
                    <td >Bank Name</td>
               
                <td colspan="4" style="text-align: right;">Total Paid Amount</td>
            </tr>
            
            <tr>
                <td ><?php echo e($payment_name->name ?? ''); ?></td>
            
                    <td ><?php echo e($data[0]->transition_id ?? '-'); ?></td>
                    <td ><?php echo e($data[0]->bank_name ?? '-'); ?></td>
              
                <td  colspan="4" id="inNumber" style="text-align: right;">INR <?php echo e(number_format ($total_amount ?? 0, 2)); ?></td>
            </tr>
            
            <tr>
                <th colspan="3" style="text-align: left;">Amount In Words :-</th>
                
                <?php
                 $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                $words = $formatter->format($total_amount);
                $words .= ' rupees';
                ?>
                <td colspan="5" style="text-align: right;"><b id="inWords" style='text-transform: capitalize;'>  <?php echo e($words); ?></b></td>
            </tr>
            
        </tbody>
    </table>
    <p style="margin: 3px;">Note :-</p>
    <p style="margin: 0px 14px;">1. Cheque Bounce Charge Rs 500/-</p>

</div>




</body>
</html><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/FeesManagement/template01.blade.php ENDPATH**/ ?>