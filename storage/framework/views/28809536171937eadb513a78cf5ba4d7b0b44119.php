<?php
$getSetting=Helper::getSetting();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
    <style>
     
        body {
   font-family: Arial, sans-serif;
      font-size:12px;
      max-width:750px;
      margin: 25px auto ;
     
   /* border: 0.5px solid; */
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
       top: 80px;
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
            margin: 0px;
        }
        .inner_table th{
            border: 1px solid #000;
            padding: 5px;
            /* background-color: #f2f2f2; */
        }
      
        .invoice-header {
            margin-bottom: 20px;
            text-align:'center'
        }
        .inner_table td{
            padding:5px
        }
        .ltr{
            text-align: left;
            border-right: none !important;
        }
        .rtr{
            text-align:right;
        }
        .ctr{
            text-align:center;
        }

       #personal_detail th {
            //border: 1px solid #000;
            text-align: left;
            padding: 8px;
            //background:#dddddd
        }
       #personal_detail td {
            //border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }
        .border_none{
            border: 0px solid black;
        }
   </style>
</head>
<body class='page'>
<table style="border: 1px solid black;">
			<tbody >
					<tr>
      <td rowspan='2' width='25%'>
          <img  src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?>" style="width: 150px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'">
          </td>
      <td   width='50%' style="font-size:20px;text-align:center;"><span><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span></td>
      <td width='25%'> 
      </td>
    
   </tr>
	<tr style="text-align:center;">
      <td width='50%'  style="text-align:center;">
      <p ><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?></p>
      <p ><b >Phone:-</b> <?php echo e($getSetting['mobile'] ?? ''); ?> &nbsp;<b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?></p>
    </td>
      <td width='25%'></td>
      </tr>

  </tbody>
  </table> 
  <p style='text-align: center;font-weight: bold;line-height: 20px;margin-top: 0px;font-size: 18px;background-color: #673ab7;color: white;padding: 10px;font-family: initial;'>
        Fees Ledger
   </p>

<table id='personal_detail'>
      	<tbody >
      <tr>
          <th style="width: 14%;">Name</th>
          <td><?php echo e($data['stuData']['first_name'] ?? ''); ?> <?php echo e($data['stuData']['last_name'] ?? ''); ?></td>
          <th style="width: 14%;">Father's Name</th>
          <td><?php echo e($data['stuData']['father_name'] ?? ''); ?></td>
         
      </tr>
      <tr>
          <th>Class</th>
          <td> <?php echo e($data['stuadmissions']['class_name'] ?? ''); ?> 
              <?php if(!empty($data['stuData']['Section']['name'])): ?>
              (<?php echo e($data['stuData']['Section']['name'] ?? ''); ?>)
              <?php endif; ?></td>
          <th>Mobile</th>
          <td><?php echo e($data['stuData']['mobile'] ?? ''); ?></td>
         
      </tr>
      <tr>
          <th>Admission No.</th>
          <td><?php echo e($data['stuData']['admissionNo'] ?? ''); ?> </td>
          <td></td>
          <td></td>
          
      </tr>
       </tbody>
  </table>



  <table style ='margin-top:20px' >
      	<tbody >
      <tr>
        <td style='border:0px solid black;width:50%'>
        <table class='inner_table'>
        <thead>
            <tr>
                <th class='ctr' >Slip No.</th>
                <th class='ctr'>Date</th>
                <th class='ctr'>Paymant Mode</th>
                <th class='ctr' >Discount</th>
                <th class='ctr'>Amount</th>
               
              
            </tr>
        </thead>
      	<tbody>
      	     <?php if(!empty($data['stuPaidDetail'])): ?>
        <?php

        $i=1;
        $total_amount = 0;
        $discount_amount = 0;
        ?>
        <?php $__currentLoopData = $data['stuPaidDetail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr >
                
            <td style="border:1px solid black" class='ctr'><?php echo e($item->receipt_no  ?? ''); ?></td>
            <td style="border:1px solid black" class='ctr'><?php echo e(date('d-m-Y', strtotime($item['date'])) ?? ''); ?></td>
            <td style="border:1px solid black" class='ctr'><?php echo e($item->name  ?? ''); ?></td>
            <td style="border:1px solid black" class='ctr'><?php echo e(number_format($item->discount ,2) ?? ''); ?></td>
            <td style="border:1px solid black" class='ctr'><?php echo e(number_format($item->total_amount ,2) ?? ''); ?></td>
            </tr>
         
            <?php
        $total_amount += $item->total_amount;
        $discount_amount += $item->discount;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </tbody>
    <tfoot style='border:1px solid black'>
            <tr>
            <td rowspan='4' style="text-align: left;"></td>
                <td></td>
                <td></td>
                <td class="border_none rtr"><b>Total Assign Amount : </b></td>
                <td class="border_none ctr"><b><?php echo e($data['total_assign'] ?? ''); ?></b></td>
            </tr>
            <tr>
               
                <td></td>
                <td></td>
                <td class="border_none rtr" ><b>Total Amount : </b></td>
                <td class="border_none ctr" id="inNumber" ><b><?php echo e($total_amount ?? ''); ?></b></td>
            </tr>
            <tr>
                
                <td></td>
                <td></td>
                <td class="border_none rtr"><b>Total Discount : </b></td>
                <td class="border_none ctr"><b><?php echo e($discount_amount  ?? ''); ?></b></td>
            </tr>
            <tr>
               
                <td></td>
                <td></td>
                <td class="border_none rtr"><b>Due : </b></td>
                <td class="border_none ctr"><b><?php echo e($data['total_assign']-$total_amount-$discount_amount  ?? ''); ?></b></td>
            </tr>
            <tr style='border-top:1px solid black'>
               <td></td>
              
                <td colspan='2'  style="text-align: center;"><b>Amount In Words:</b></td>
                <td><b id="inWords"> <?php echo e($total_amount ?? ''); ?></b></td>
            </tr>
           
           
        </tfoot>
    </table>

        </td>
       
         
      </tr>
    
       </tbody>
  </table>


  <table style ='margin-top:5px;' >

    <tfoot style='border:1px solid black'>
            <tr>
            <td style="text-align: center;"></td>
                <td style="text-align: right">
                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/seal_sign/'.$getSetting['seal_sign']); ?>" style="height:90px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/seal.png'); ?>'">

                </td>
                
            </tr>
            <tr>
            <td style="text-align: left;">&nbsp;&nbsp;&nbsp;Signature</td>
                <td style="text-align: right;padding:10px">
            Seal & Sign    
            </td>
                
            </tr>
           
           
           
        </tfoot>
    </table>

</body>
</html>

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

    var number = document.getElementById("inNumber").innerText;
    var b = parseInt(number);
    var Inwords = toWordsconver(b);

    document.getElementById("inWords").innerText = Inwords + " " + "Only";

    //alert(Inwords);
</script><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/FeesManagement/template04.blade.php ENDPATH**/ ?>