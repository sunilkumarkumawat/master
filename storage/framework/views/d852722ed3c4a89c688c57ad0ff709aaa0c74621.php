<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Achievement Certificate</title>
</head>
<?php
$getSetting=Helper::getSetting();
?>
<style>
    @page{
    margin:0;
    size:landscape;
}

  body{
    margin: 0px;
}

 .print_div{
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
 background-image :url('<?php echo e(env("IMAGE_SHOW_PATH").'/default/print_file_samples/CertificateManagement/template05.jpg'); ?>');background-size: 100% 100%;
overflow: hidden;
}
        @media  print {
            .background_img {
                page-break-after: always;
                margin-top:0px;
            }
        }
        span{
            font-size:24px;
          
           color:#212121;
        }

</style>
<body>
   <div class="print_div">
        <div class="background_img">
    <span  style=" position: absolute;top: 44%;left: 38%;font-size: 42px;font-family: none;"><?php echo e($data['first_name'] ?? ''); ?> <?php echo e($data['last_name'] ?? ''); ?></span>
                <span  style=" position: absolute;top: 52%;left: 27%;font-family: none;"><?php echo e($data['stu_father_name'] ?? ''); ?></span>
                <span  style=" position: absolute;top: 52%;left: 56%;font-family: none;"><?php if(!empty($data['address'])): ?>
                               <?php echo e(strlen($data['address'] ?? '') > 25 ? substr($data['address'], 0, 25) . '...' : ($data['address'] ?? '')); ?>

                                <?php else: ?>-
                                <?php endif; ?></span>
                <span  style=" position: absolute;top: 60.5%;left: 57%;font-family: none;"><?php echo e($data['from_year'] ?? ''); ?>-<?php echo e($data['to_year'] ?? ''); ?> </span>
                <span  style=" position: absolute;top: 60.4%;left: 80%;font-family: none;"><?php echo e($data['admissionNo'] ?? ''); ?></span>
                <span  style=" position: absolute;top: 64.4%;left: 50%;font-family: none;"><?php echo e(date('d-m-Y', strtotime($data['dob'])) ?? ''); ?></span>
                <span  style=" position: absolute;top: 80%;left: 22%;font-family: none;"><?php echo e(date('d-m-Y',strtotime($data['iessu_date'])) ?? ''); ?></span>
                <img src="<?php echo e(env('IMAGE_SHOW_PATH')); ?><?php echo e('setting/seal_sign/'); ?><?php echo e($getSetting['seal_sign']); ?>" alt="seal"
                  width="100px" style="position: absolute;top: 73%;left: 70%;">
                  <span  style="position: absolute;top: 68.2%;left: 24%;font-family: none;"><?php echo e($data['achievement_for'] ?? ''); ?></span>
        </div>
    </div>
</body>

<!--<script type="text/javascript">-->
<!--window.print();-->
<!--</script>-->

</html><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/CertificateManagement/template05.blade.php ENDPATH**/ ?>