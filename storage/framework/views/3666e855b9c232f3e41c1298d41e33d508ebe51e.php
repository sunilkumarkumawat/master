<!DOCTYPE html>
<html>
<head>
<title>School | Fees Receipt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
$getSetting=Helper::getSetting();
$account=Helper::getQRCode($getSetting->account_id);

?>
<body>
    <style>
        
         body {
   font-family: Arial, sans-serif;
      font-size:12px;
      max-width:740px;
      margin: 25px auto ;
    border: 0.5px solid; 
   }
    .student_img {
    width: 80px; 
    height:100; 
    margin-top: 23%;
    margin-left:20%;
    padding-bottom: 0px;
        
    }
    
    .row{
        margin-right: 0px;
    }
    .img_background_fixed{
      position: relative;
    }
    
    .img_absolute{
        position: absolute;
        top: 113px;
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
    </style>
	<table style="border-bottom: 2px solid;">
			<tbody >
					<tr>
      <td  rowspan="4">
          <img  rowspan="4" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?> " style="width: 97px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'"></td>
  
      <td   style=" font-size:28px;text-align:center;width:100%;"><span class="style71"><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span></td>
   
      <td rowspan="4"> 
      </td>
     
    
     
   </tr>
	<tr style="text-align:center;">
       
 
   
      <td   style="font-size:14px;text-align:center;"><p style="margin-bottom: 0px;"><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?></p></td>

      </tr>
      <tr>
     
   
      <td  style="font-size:14px; text-align:center;"><p style="margin-bottom:6px;"><b >Phone:-</b> <?php echo e($getSetting['mobile'] ?? ''); ?> &nbsp;<b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?>  </p></td>
    </tr>
   	<tr style="text-align:center;">
       

   

      </tr>

    
  </tbody></table> 

<table Style="Width:100%;">
     <div class="img_background_fixed">
        <div class="img_absolute">
        <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/watermark_image/'.$getSetting['watermark_image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmanisoft_logo.png'); ?>'" alt="" class="backhround_img">
        </div>
<div class="row">

<div class="col-sm-2"><b>Name</b></div>
<div class="col-sm-3 border-right"><b>:<?php echo e($data[0]['Admission']['first_name'] ?? ''); ?> <?php echo e($data[0]['last_name'] ?? ''); ?></b></div>
<div class="col-sm-2"><b>Father's Name</b></div>
<div class="col-sm-3"><b>: <?php echo e($data[0]['Admission']['father_name'] ?? ''); ?></b></div>

<div></div>
</div>
<div class="row">

</div>
<div class="row">
<div class="col-sm-2 border-left"><b>Class</b></div>
<div class="col-sm-3 border-right"><b>: <?php echo e($data[0]['Admission']['ClassTypes']['name'] ?? ''); ?>


</b>
</div>
<div class="col-sm-2"><b>Mobile</b></div>
<div class="col-sm-3"><b>: <?php echo e($data[0]['Admission']['mobile'] ?? ''); ?></b></div>
</div>
<div class="row">

<div class="col-sm-2"><b>Fee Month</b></div>
<?php if(!empty($data)): ?>
            <?php
            $total_amount = 0;
            ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-sm-3 border-right">
    <?php
                        $fees_master  = DB::table('fees_master')->whereNull('deleted_at')->where('fees_group_id',$item['fees_group_id'])->where('class_type_id',$data[0]['Admission']['ClassTypes']['id'])->first();
                    ?><b>: <?php echo e(date('F', strtotime($fees_master->installment_due_date)) ?? ''); ?></b></div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</div>
<div class="row">
<div class="col-sm-2"><b></b></div>
<div class="col-sm-3 border-right"></div>
<div class="col-sm-2"></div>
<div class="col-sm-3"></div>

<div class="col-sm-2 border-left" style="margin-top: -72px;"><span class="style73"><?php if(!empty($data['Admission']['student_img'])): ?>

    <img class="student_img" src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_image/'.$data['Admission']['student_img'] ?? ''); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
    <?php else: ?>
    <img class="student_img" src="<?php echo e(env('IMAGE_SHOW_PATH').'/student_icon.png'); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
    <?php endif; ?> </span></div>
</div>
</div>
</table>



<table style="width:100%;" class="table-bordered">
    <tr style="border-top:2px solid black;">
        <th colspan="3">Receipt No.</th>
        <th colspan="3">Date</th>
        <th colspan="3">Discount</th>
        <th colspan="3">Amount</th>
        <th colspan="3">Paid</th>
    </tr>
    <?php if(!empty($data)): ?>
            <?php
            $total_amount = 0;
            ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
    <tr style="border-top:2px solid black;">
        <td colspan="3"><?php echo e($data[0]['receipt_no'] ?? ''); ?></td>
        <td colspan="3"><?php echo e(date('d-M-Y', strtotime($data[0]->date))); ?></td>
        <td colspan="3"><?php echo e($data['discount_value'] ?? '-'); ?></td>
        <td colspan="3">
              <?php
        
                        $fees_master  = DB::table('fees_master')->whereNull('deleted_at')->where('fees_group_id',$item['fees_group_id'])->where('class_type_id',$data[0]['Admission']['ClassTypes']['id'])->first();
                    ?>
            
            <?php echo e(number_format($fees_master->amount ?? 0, 2)); ?></td>
            <td>  
            <?php
                $total_amount += $item['total_amount'] ?? 0;
                ?>
    <?php echo e(number_format($item['total_amount'] ?? 0, 2)); ?></td>
    </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
</table>
 <?php
            $payment_name = DB::table('payment_modes')->whereNull('deleted_at')->where('id',$data[0]->payment_mode_id)->first();
        ?>

<table style="width:100%;">
    <tr style="border-top:2px solid black;">
<td rowspan="4 border-right border-top;"style="width: 25%;">
     <?php if(!empty($account->uplode_qr)): ?>
                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/uplode_qr/'.$account->uplode_qr); ?>" style="height:90px;">
            <?php endif; ?>

</td>


<td colspan="3"><b>Payment Mode</b></td>
<td colspan="3"></td>
<td colspan="3"></td>
<td colspan="3"><b>: <?php echo e($payment_name->name ?? ''); ?></b></td>




    
</tr>
<tr>
   
<td colspan="3"><b>Total Discount</b></td>
<td colspan="3"style="width:145px;"></td>
<td colspan="3"></td>
<td colspan="3" ><b>:</b> <b><?php echo e($data['discount'] ?? '-'); ?></b></td>
</tr>
<tr>
   
<td colspan="3"><b>Total Paid Amount</b></td>
<td colspan="3"style="width:145px;"></td>
<td colspan="3"></td>
<td colspan="3" ><b>:</b> <b id="inNumber">
    
                
    <?php echo e(number_format ($total_amount ?? 0, 2)); ?></b></td>

</tr>


</table>

<table style="width:100%;text-align:center;border-top:2px solid black;">

<tr>
    
  
<td style="width:59%;"><b>Amount In Word</b></td>
<td style="width:14%;"></td>
  <?php
                 $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                $words = $formatter->format($total_amount);
                $words .= ' rupees';
                ?>
<td style="width: 32%;"><b id="inWords"> : <?php echo e($words); ?></b></td>

</tr>

</table>


<script>
var th_val = ['', 'thousand', 'Lakh', 'Crore', 'trillion'];
// System for uncomment this line for Number of English 
// var th_val = ['','thousand','million', 'milliard','billion'];
 
var dg_val = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
var tn_val = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
var tw_val = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
function toWordsconver(s) {
  s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s))
        return 'not a number ';
    var x_val = s.indexOf('.');
    if (x_val == -1)
        x_val = s.length;
    if (x_val > 15)
        return 'too big';
    var n_val = s.split('');
    var str_val = '';
    var sk_val = 0;
    for (var i = 0; i < x_val; i++) {
        if ((x_val - i) % 3 == 2) {
            if (n_val[i] == '1') {
                str_val += tn_val[Number(n_val[i + 1])] + ' ';
                i++;
                sk_val = 1;
            } else if (n_val[i] != 0) {
                str_val += tw_val[n_val[i] - 2] + ' ';
                sk_val = 1;
            }
        } else if (n_val[i] != 0) {
            str_val += dg_val[n_val[i]] + ' ';
            if ((x_val - i) % 3 == 0)
                str_val += 'Hundred ';
            sk_val = 1;
        }
        if ((x_val - i) % 3 == 1) {
            if (sk_val)
                str_val += th_val[(x_val - i - 1) / 3] + ' ';
            sk_val = 0;
        }
    }
    if (x_val != s.length) {
        var y_val = s.length;
        str_val += 'point ';
        for (var i = x_val + 1; i < y_val; i++)
            str_val += dg_val[n_val[i]] + ' ';
    }
    return str_val.replace(/\s+/g, ' ');
}

var number = document.getElementById( "inNumber" ).innerText;
  var b = parseInt(number);
 var Inwords = toWordsconver(b);
 
 document.getElementById( "inWords" ).innerText=Inwords+ " " + "Only" ;

//alert(Inwords);
</script>
<?php echo $__env->make('print_file.print_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</body>

</html><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/FeesManagement/template02.blade.php ENDPATH**/ ?>