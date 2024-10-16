

<head>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/all.min.css')); ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/icheck-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/jqvmap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/adminlte.min.css')); ?>">
</head>
<?php
$getSetting=Helper::getSetting();
//dd($getSetting);
?>

<style>
    .body_border {
    border: 2px solid;
    }
      .img_background_fixed{
          position: relative;
        }
        
        .img_absolute{
            position: absolute;
            top: 68px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            right: 0;
        }
        
        .backhround_img{
            opacity: 0.3;
            width:36%;
        }
        .ltr{
            text-align: left;
            border-right: none !important;
            padding:5px
        }
        .rtr{
            text-align:right;
        }
        
   .head{
        margin-top: -12%;
        font-size: 30px;
        font-weight: bold;
        color: #aac818;
    }
    @media  print{@page  {size: landscape}}
</style>
<div style="padding: 10px;">
     <div class="img_background_fixed">
        <div class="img_absolute">
        <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/watermark_image/'.$getSetting['watermark_image']); ?>" alt="bg_logo" class="backhround_img">
        </div>
<div class="col-md-12 body_border">
<table style="width:100%;margin-bottom: 2%;margin-top: 4%;">
    

    <tr>
        <td style="width:20%"><img style="width: 177px; height: 130px;margin-top: -10%; margin-left:50px;" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?>"></td>
        <td style="width:60%" class="text-center" ><h1 class="head"><b><?php echo e($getSetting['name'] ?? ''); ?></b></h1></td>
        <td style="width:20%">
            <!--<img style="width: 177px; height: 130px;margin-top: -10%; margin-left:50px;" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?>">-->
        </td>

    </tr>
</table>

<table style="width:100%;font-size:126%;margin-top: -9%;">
    
    <tr>
       <td class="text-center" style="font-size: 17px; line-height: 10px;">
           <p><b>Email Id - <?php echo e($getSetting['gmail'] ?? ''); ?></b></p>
           <p><b>Mobile No. - <?php echo e($getSetting['mobile'] ?? ''); ?></b></p>
           <p><b>Address - <?php echo e($getSetting['address'] ?? ''); ?>,<?php echo e($getSetting['pincode'] ?? ''); ?></b></p>
           
        </td>
    </tr>
    
    <tr>
        <td class="text-center"></td>
    </tr>
   
  

 </table>
 <div style="">
     
   <hr width="100%;" style="border:2px solid black;">
    <tr>
        <center><td><h3><b><u>SPORT CERTIFICATE</u></b></h3></td></center>
    </tr>  
 <br>

<div class="row m-3" style="font-size:135%;">
<div>This is to certify that:</div>&nbsp;&nbsp;&nbsp;
<div class="col-sm-8 ltr" style="border-bottom:2px dotted;">  <?php echo e($data['stu_first_name'] ?? ''); ?> <?php echo e($data['stu_last_name'] ?? ''); ?></div>
</div>
<div class="row m-3" style="font-size:135%;">
<div>has earned this certificate for outstanding achievement in</div>&nbsp;&nbsp;
<div class="col-sm-5 ltr" style="border-bottom:2px dotted;"><?php echo e($data['event_type'] ?? ''); ?></div>
</div>


<div class="row m-3" style="font-size:135%;">
<div>On tha date</div>&nbsp;&nbsp;
<div class="col-sm-2 ltr" style="border-bottom:2px dotted;"><?php echo e(date('d-m-Y', strtotime($data['organized_date'])) ?? ''); ?></div>
<div>With</div>&nbsp;&nbsp;
<div class="col-sm-3 ltr" style="border-bottom:2px dotted;"><?php echo e($data['rank'] ?? ''); ?></div>
<div>Rank.</div>
</div>

</div>



<?php echo $__env->make('print_file.print_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</div>
</div>
<!--<script type="text/javascript">-->
<!--  window.print();-->
<!--</script>-->
<?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/CertificateManagement/template03.blade.php ENDPATH**/ ?>