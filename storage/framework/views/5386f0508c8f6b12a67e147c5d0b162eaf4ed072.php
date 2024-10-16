<?php
$getSetting=Helper::getSetting();
$account=Helper::getQRCode($getSetting->account_id);
?>
<?php
$getSetting=Helper::getSetting();
$account=Helper::getQRCode($getSetting->account_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Cards</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .page {
            width: 210mm;
            height: 297mm;
            padding: 5mm;
            box-sizing: border-box;
            
            page-break-after: always; /* Ensure page break after each page */
        }
        .id-card {
            width: 95mm;
            height: 59mm;
            border: 1px solid #000;
            box-sizing: border-box;
            /*display: flex;*/
            /*flex-direction: column;*/
            /*justify-content: center;*/
            border-radius: 5px;
        }
        .photo {
            width: 100%;
            height: 30mm;
            background-color: #ccc;
            margin-bottom: 5mm;
        }
        .details {
            font-size: 12px;
        }
        table {
            width: 100%;
            font-size: 11px;
        }
        td {
            text-transform: capitalize;
        }
        .logo_size {
            max-width: 100%;
        }
    
    </style>
</head>
<body>
    <?php if(!empty($data)): ?>
    <?php
    $dataArray = $data->toArray();
    $chunkedArray = array_chunk($dataArray, 8);
    $chunkedArray = array_values($chunkedArray);
    ?>
 
    <?php $__currentLoopData = $chunkedArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="page">
            <div width='100%' style='display: grid;
          grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(4, 1fr);
            grid-gap: 10mm;'>
            <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="id-card">
                    <table>
                        <tbody>
                            <tr>
                                <td colspan='3'>
                                    <img class="logo_size" src="<?php echo e(env('IMAGE_SHOW_PATH').'/default/id_card_header.png'); ?>"
                                        onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'"
                                        width="340px">
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3' style='text-align:center;'>
                                    <strong style="margin: 2px;font-size:13px">Identity Card 2024-2025</strong>
                                </td>
                            </tr>
                            <tr>
                                <td width='15%'><strong>Name</strong></td>
                                <td width='60%'><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                                <td width='25%' rowspan='5' style='text-align:center'>
                                    <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$item['image'] ?? ''); ?>"
                                        onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'"
                                        width="70px" height="70px"><br>
                                    <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/seal_sign/'.$getSetting['seal_sign']); ?>"
                                        onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/seal.png'); ?>'"
                                        width="80px" height="25px"><br>
                                    <b>Director</b>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Father</strong></td>
                                <td><?php echo e($item['father_name'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Class</strong></td>
                                <td><?php echo e($item['class_name'] ?? ''); ?></td>
                            </tr>
                            <tr>
                                <td><strong>DOB</strong></td>
                                <td><?php echo e(date('d-m-Y', strtotime($item['dob'])) ?? ''); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Phone</strong></td>
                                <td><?php echo e($item['mobile'] ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td><?php echo e($item['address'] ?? '-'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- Ensure the page break is applied correctly -->
        <div class="page-break"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</body>
</html>

<?php /**PATH /home/rusoft/public_html/demo3/resources/views/print_file/student_print/multipal_id_print.blade.php ENDPATH**/ ?>