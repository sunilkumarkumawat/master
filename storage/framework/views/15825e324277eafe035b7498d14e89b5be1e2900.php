<?php
 $setting = Helper::getSetting();
 $getSetting = Helper::getSetting();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/school/css/invoice.css')); ?>">  
    <title>Invoice</title>
</head>

<style>
    .img_background_fixed{
          position: relative;
        }
        
        .img_absolute{
            position: absolute;
            top: 116px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            right: 0;
        }
        
        .backhround_img{
            opacity: 0.3;
            width:38%;
        }
</style>

<body>
    <div class="panel-options">
        <a href="<?php echo e(URL::previous()); ?>">
            <button class="btn btn-sm btn-danger"><i class="fa-fa-arrow-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
        <button class="btn btn-sm btn-danger" id="downloadBtnPDF"><i class="fa fa-pdf" aria-hidden="true"></i>
            Download PDF
        </button>
        <button class="btn btn-sm btn-danger" id="downloadBtnImage"><i class="fa fa-image"
        aria-hidden="true"></i> Download Image</button>
        <button class="btn btn-sm btn-danger" id="printFile"><i class="fa-fa-print"
        aria-hidden="true"></i> Print</button>
    </div>

    <div class="downloadLeaflet" id="downloadLeaflet">
        <div class="table_view">
            <div class="img_background_fixed">
                <div class="img_absolute">
                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/watermark_image/'.$getSetting['watermark_image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'" alt="" class="backhround_img">
                </div>
            <table class="table">
                <thead>
                    <tr class="flex_Centered">
                        <th>
                            <p class="title_page">PAYMENT RECEIPT sadas</p>
                        </th>
                        <th>
                            <p class="title_page text_right"><?php echo e($setting->name ?? ''); ?></p>
                            <p class="description"><?php echo e($setting->address); ?>-<?php echo e($setting->pincode ?? ''); ?></p>
                            <p class="description">Phone : <?php echo e($setting->mobile ?? ''); ?>| Email : <?php echo e($setting->gmail ?? ''); ?></p>
                        </th>
                    </tr>
                </thead>
            </table>
            
             <?php
                $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                $words = $formatter->format($data[0]->total_amount);
                $words .= ' rupees';
            ?>
            
            <table class="table table_border table_tr_border padding_item">
                <thead>
                    <tr class="sky_tr">
                        <th>STUDENT DETAILS</th>
                        <th>VALIDITY</th>
                        <th>AMOUNT (₹)</th>
                    </tr>
                </thead>
                    <?php
                        $hostel_details = DB::table('hostel_assign')
                            ->select('hostel_assign.*', 'hostel_building.name as building_name','hostel_floor.name as floor_name','hostel_bed.name as bed_name','hostel_room.name as room_name')
                            ->leftJoin('hostel_building', 'hostel_assign.building_id','hostel_building.id')
                            ->leftJoin('hostel_floor', 'hostel_assign.floor_id','hostel_floor.id')
                            ->leftJoin('hostel_room', 'hostel_assign.room_id','hostel_room.id')
                            ->leftJoin('hostel_bed', 'hostel_assign.bed_id','hostel_bed.id')
                            ->where('hostel_assign.id', $data[0]->hostel_assign_id)
                            ->first();
                    ?>
                <tbody>
                    <tr>
                       <td class="capital_letters" style="text-align">
                          <div style="text-align:left;">
                            <p><b>Name: </b><?php echo e($data[0]->first_name ?? ''); ?> </p>
                            <p><b>Admission No: </b><?php echo e($data[0]->admissionNo ?? ''); ?> </p>
                            <p><b>Mobile No: </b><?php echo e($data[0]->mobile ?? ''); ?> </p>
                            <p><b>Invoice No: </b><?php echo e($data[0]->invoice_no ?? ''); ?> </p>
                            <p><b>Building Name: </b><?php echo e($hostel_details->building_name ?? ''); ?> </p>
                            <p><b>Floor Name : </b><?php echo e($hostel_details->floor_name ?? ''); ?> </p>
                            <p><b>Room Name: </b><?php echo e($hostel_details->room_name ?? ''); ?> </p>
                            <p><b>Bed Name: </b><?php echo e($hostel_details->bed_name ?? ''); ?> </p>
                          </div>
                        </td>
                        <td><?php echo e(date('d-M-Y', strtotime($data[0]->hostel_renewal_date))); ?></td>
                        <td><?php echo e($data[0]->total_amount ?? '-'); ?></td>
                    </tr>
                </tbody>
            </table>        

            <table class="table table_border table_tr_border padding_item">
                <thead>
                    <tr class="sky_tr">
                        <th>SR.NO</th>
                        <th>Date</th>
                        <th>Payment Mode</th>
                        <th>DISCOUNT AMOUNT (₹)</th>
                        <th>PAY AMOUNT (₹)</th>
                    </tr>
                </thead>

                <tbody>
                     
                    <?php if(!empty($data)): ?>
                        <?php
                            $sr_no = 2;
                            $total_paid_amount = 0;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sr_no ++); ?></td>
                                <td><?php echo e(date('d-M, Y',strtotime($item['bill_date']))); ?></td>
                                <td><?php echo e($item->payment_mode_name ?? ''); ?></td>
                                <td><?php echo e($item->per_discount ?? ''); ?></td>
                                <td><?php echo e($item->per_paid_amount ?? ''); ?></td>
                            </tr>
                            
                        <?php
                            $total_paid_amount += $item->per_paid_amount;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    <?php endif; ?>
                    <tr>
                        <td rowspan="3" colspan="3" class="padding_bottom_space">
                            <div class="left_all">
                                <p class="capital_letters"><b>In Words :</b> <?php echo e($words ?? ''); ?></p>

                                <div class="notes">
                                    <p class="note">
                                       <b>Note:</b> 
                                    </p>
                                    <div>
                                        <p class="margin_left">1. Fee, Charges, Funds, once paid are not refundable.</p>
                                        <p class="margin_left">2. Cheque subject to encashment.</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="padding_none">
                            <div class="right_items">
                                <p>Total (₹)</p>
                                <p>Total Paid (₹)</p>
                                <p class="other_color">Dues (₹)</p>
                            </div>
                        </td>
                        <td class="padding_none">
                            <div class="center_items">
                                <p><?php echo e($data[0]->total_amount ?? '-'); ?></p>
                                <p><?php echo e(number_format($total_paid_amount, 2)); ?></p>
                                <p class="other_color"><?php echo e(number_format($data[0]->due_amount, 2)); ?></p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>


            <p class="description top_space">* This is computer generated receipt.</p>
        </div>
    </div>
    </div>
</body>

<script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/school/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/school/js/html2canvas.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/assets/school/js/jspdf.js')); ?>"></script>

<script>
function downloadPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const leafletElement = document.getElementById('downloadLeaflet');

        html2canvas(leafletElement, {
            useCORS: true,
            scrollX: 0,
            scrollY: 0,
            dpi: window.devicePixelRatio * 1000, // Set higher DPI value for better image quality
            scale: 5
        }).then((canvas) => {
            const imgData = canvas.toDataURL('image/jpeg', 2.0); // Use JPEG format with highest quality
            const doc = new jsPDF({
                orientation: 'p',
                unit: 'pt',
                format: [canvas.width, canvas.height],
                compress: true,
            });

            const pdfWidth = doc.internal.pageSize.getWidth();
            const pdfHeight = doc.internal.pageSize.getHeight();

            const elementWidth = canvas.width;
            const elementHeight = canvas.height;

            const scaleRatio = Math.min(pdfWidth / elementWidth, pdfHeight / elementHeight);
            const scaledWidth = elementWidth * scaleRatio;
            const scaledHeight = elementHeight * scaleRatio;
            const xOffset = (pdfWidth - scaledWidth) / 2;
            const yOffset = (pdfHeight - scaledHeight) / 2;

            doc.addImage(imgData, 'JPEG', xOffset, yOffset, scaledWidth, scaledHeight, '', 'FAST');
            doc.save('Invoice.pdf');
        });
    }

    function downloadImageLeaflet() {
        const leafletElement = document.getElementById('downloadLeaflet');
        html2canvas(leafletElement, {
            useCORS: true,
            scrollX: 0,
            scrollY: 0,
            dpi: window.devicePixelRatio * 1000, // Set higher DPI value for better image quality
            scale: 5
        }).then((canvas) => {
            const imgData = canvas.toDataURL('image/jpeg', 2.0); // Use JPEG format with highest quality
            // Create a temporary link element
            const link = document.createElement('a');
            link.href = imgData;
            link.download = 'Invoice.png';

            // Trigger the download
            link.click();
        });
    }


    const downloadBtnPDF = document.getElementById('downloadBtnPDF');
    const downloadBtnImage = document.getElementById('downloadBtnImage');
    downloadBtnPDF.addEventListener('click', downloadPDF);
    downloadBtnImage.addEventListener('click', downloadImageLeaflet);
</script>

<script>
$(document).ready(function() {
    $("#printFile").click(function() {
        printContent();
    });
});

function printContent() {
    var styles = '';

    $(document).ready(function() {
        $('style, link[rel="stylesheet"]').each(function() {
            styles += $(this).prop('outerHTML');
        });
        var content = $("#downloadLeaflet").html();
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Invoice</title>' + styles + '</head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');
            
        setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 500);
    });
}

</script>

</html><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/fees/invoice.blade.php ENDPATH**/ ?>