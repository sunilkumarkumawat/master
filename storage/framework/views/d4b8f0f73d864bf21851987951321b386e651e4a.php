<?php
$getSetting=Helper::getSetting();
$getTimePeriod = Helper::getTimePeriod();
$numbers = [
    0 => 'First',
    1 => 'Second',
    2 => 'Third',
    3 => 'Fourth',
    4 => 'Fifth',
    5 => 'Sixth',
    6 => 'Seventh',
    7 => 'Eighth',
    8 => 'Ninth',
    9 => 'Tenth',
    10 => 'Eleventh',
    11 => 'Twelfth',
    12 => 'Thirteenth',
    13 => 'Fourteenth',
    14 => 'Fifteenth',
    15 => 'Sixteenth',
    16 => 'Seventeenth',
    17 => 'Eighteenth',
    18 => 'Nineteenth',
    19 => 'Twentieth',
];

$newNumber = [];
?>

<?php $__currentLoopData = $getTimePeriod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php
$newNumber[$time->id] = $numbers[$key];
?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/adminlte.min.css')); ?>">
    <style>
     
        body {
   font-family: Arial, sans-serif;
      font-size:12px;
      max-width:750px;
      margin: 10px auto 
     
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
        top: 36px;
       width: 100%;
       display: flex;
       align-items: center;
       justify-content: center;
       height: 100%;
       right: 0;
   }
   
   .backhround_img{
       opacity: 0.3;
       width: 36%;
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
            padding:5px
        }
        .rtr{
            text-align:right;
        }

       #personal_detail th {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
            background:#dddddd
        }
       #personal_detail td {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }
        .img_bwm{
            width: 100px;
            text-align: right;
            height: 109px;
            padding: 3px;
            border: 2px dotted black;
            margin-bottom: -13px;
            margin-top: -17px;
        }
        
        .fontweight{
                font-weight: 600;
        }
         
   </style>
   <script>
       //window.print();
   </script>
</head>
<body class='page'>
<table style="background:#6639b5;color:white; padding: 30px;" >
			<tbody >
			<tr>
      <td rowspan='2' width='25%'>
          <img  src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?>" style="width: 150px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'" >
          </td>
      <td   width='60%' style="font-size:20px;text-align:center;"><span><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span></td>
      <td width='15%'> 
      </td>
    
   </tr>
	<tr style="text-align:center;">
      <td width='60%'  style="text-align:center;">
      <p ><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?> </p>
      <p ><b >Phone:-</b> <?php echo e($getSetting['mobile'] ?? ''); ?> &nbsp;<b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?></p>
    </td>
      <td width='15%'>
          
      </td>
      </tr>

  </tbody>
  </table> 
 
<table style="margin-top: 5px ;border-top:3px solid #6639b5">

<thead>
  <tr>
      <td colspan='3' style="font-size:13px;text-align:center;"><h1>TIME TABLE</h1></td>
    </tr>
<tr>

                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('common.SR.NO')); ?></td>

                                                <th><?php echo e(__('common.Class')); ?> </th>
                                                <th><?php echo e(__('common.Subject')); ?> </th>
                                                <th><?php echo e(__('master.Teacher Name')); ?></th>
                                                <th><?php echo e(__("Period's Name")); ?></th>
                                                <th><?php echo e(__('master.Time Periods')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($data)): ?>
                                            <?php
                                            
                                                $i=1;
                                                $count = 0;
                                                $numbers = [1 => 'First',2 => 'Second',3 => 'Third',4 => 'Fourth',5 => 'Fifth',6 => 'Sixth',7 => 'Seventh',8 => 'Eighth',9 => 'Ninth',10 => 'Tenth',11 => 'Eleventh',12 => 'Twelfth',];
                                                $class_type_id = '';
                                            ?>
                                            
                                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    if($class_type_id == '')
                                                    {
                                                        $class_type_id == $item->class_type_id;
                                                    }
                                                    if($class_type_id == $item->class_type_id)
                                                    {
                                                   
                                                        $count++;
                                                    }
                                                    else
                                                    {
                                                        $class_type_id = $item->class_type_id;
                                                        $count = 0;
                                                    }
                                                ?>
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($item['class_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['subject_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?> </td>
                                                <td><?php echo e($newNumber[$item->time_period_id] ?? ''); ?></td>
                                                <td><?php echo e(date('h:i:s A', strtotime($item->from_time)) ?? ''); ?> To <?php echo e(date('h:i:s A', strtotime($item->to_time)) ?? ''); ?> </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    


    </tr>






    </thead>
    </table>



  <table style='margin-top: 15px; border-bottom:30px solid #6639b5;' >

    <tfoot style='border:1px solid black;padding-bottom:10px'>
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

<?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/TimeTable/template01.blade.php ENDPATH**/ ?>