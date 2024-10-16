<?php
$getSetting=Helper::getSetting();

?>
<table class="table table-bordered table-striped dataTable dtr-inline " style="  width: 100%;">
  <thead>
    <tr>
      <th><?php echo e(__('common.SR.NO')); ?></th>
      <th><?php echo e(__('master.Student Name')); ?></th>
      <th><?php echo e(__('common.Fathers Name')); ?></th>
      <th><?php echo e(__('master.Admission No.')); ?></th>
      <th><?php echo e(__('common.Fathers Mobile')); ?></th>


    </tr>
  </thead>
  <tbody>
    <?php if(!empty($data)): ?>
    <?php
    $i=1;

    ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr style="cursor:pointer; " class="fillData trColor" data-id="<?php echo e($item['id'] ?? ''); ?>" data-school_name="<?php echo e($getSetting['name'] ?? ''); ?>" data-class_type_id="<?php echo e($item['class_type_id'] ?? ''); ?>" data-name="<?php echo e($item['first_name'] ?? ''); ?>" data-father_mobile="<?php echo e($item['father_mobile'] ?? ''); ?>" data-dob="<?php echo e($item['dob'] ?? ''); ?>" data-father_name="<?php echo e($item['father_name'] ?? ''); ?>" data-address="<?php echo e($item['address'] ?? ''); ?>">
      <td class="p-1"><?php echo e($i++); ?></td>
      <td class="p-1"><?php echo e($item['first_name'] ?? ''); ?></td>
      <td class="p-1"><?php echo e($item['father_name']  ?? ''); ?></td>
      <td class="p-1"><?php echo e($item['admissionNo'] ?? ''); ?></td>
      <td class="p-1"><?php echo e($item['father_mobile']  ?? ''); ?></td>


      <!-- <td><?php echo e($item['hostel']); ?></td>-->

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <tr>
      <td colspan="12" class="text-center">No Students Found !</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(".fillData").on("click", function() {

  $(this).css('backgroundColor', '#6639b5c4');
        $(this).css('color', '#fff');
        $( this ).siblings().css( "background-color", "white" );
        $( this ).siblings().css( "color", "black" );
        
        
    var name = $(this).data('name');
    var father_mobile = $(this).data('father_mobile');
    var father_name = $(this).data('father_name');
    var school_name = $(this).data('school_name');
    var admissionunmber = $(this).data('id');

    $('#stuAdmissionNo').val(admissionunmber);
    $('#father_mobile2').val(father_mobile);

    $('#student_name').val(name);

    $('#father_mobile').val(father_mobile);
    $('#father_name').val(father_name);
    $('#address').val(address);



  });
  

</script><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/GatePass/search.blade.php ENDPATH**/ ?>