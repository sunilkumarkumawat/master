<?php
  $getSetting = Helper::getSetting();

?>
     <div class="col-md-12 card card-outline " style="height: 300px; overflow-y: scroll;">
                <table class="table table-bordered">
                                      <thead class="bg-primary">
                    <tr>
                       <th><?php echo e(__('certificate.Admission No.')); ?></th>
                       <th><?php echo e(__('certificate.Student Name')); ?> </th>
                      <th><?php echo e(__('common.Fathers Name')); ?></th>
                      <th><?php echo e(__('common.Fathers Mobile No.')); ?></th>
                    </tr>
                  </thead>
                  <tbody  id="trColor">
                            <?php if(!empty($data)): ?>
                                <?php
                                   $i=1;
                                ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $character = DB::table('c_certificates_form')->where('admission_id',$item->id)->whereNull('deleted_at')->count();
                              ?>
                               <tr style="cursor:pointer; " class="fillData p-0" data-class_name="<?php echo e($item->class_name ?? ''); ?>" data-id="<?php echo e($item['id'] ?? ''); ?>" data-old="<?php echo e($character ?? '0'); ?>" data-admissionNo="<?php echo e($item['admissionNo'] ?? ''); ?>" 
                                        data-name="<?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?>" data-father_mobile="<?php echo e($item['father_mobile'] ?? ''); ?>" data-father_name="<?php echo e($item['father_name'] ?? ''); ?>">
                                        <td class="p-1" ><?php echo e($item['admissionNo'] ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($item['first_name'] ?? ''); ?><?php echo e($item['last_name'] ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($item['father_name']  ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($item['father_mobile']  ?? ''); ?></td>
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php else: ?>
                                <tr><td colspan="12" class="text-center">No Students Found !</td></tr>
                            <?php endif; ?>
                </tbody>
                </table>
                </div>
<script>
$(".fillData").on("click", function() {
  var old = $(this).data('old');
    var admission_id = $(this).data('id');
    var admissionNo = $(this).data('admissionno');
    var class_name = $(this).data('class_name');
    var student_name = $(this).data('name');
    var father_mobile = $(this).data('father_mobile');
    var father_name = $(this).data('father_name');
    
    $('#class_name').val(class_name);
    $('#admissionNo').val(admissionNo);
    $('#admission_id').val(admission_id);
    $('#student_name').val(student_name);
    $('#father_mobile').val(father_mobile);
    $('#father_name').val(father_name);
    if (old == 0){
         
    }else if(old > 0){
        toastr.error('Already Exists');
        $('#admissionNo,#admission_id,#student_name,#father_mobile,#father_name').val('');
    }
});

$(document).ready(function() {
    $('#trColor tr').click(function() {
        $(this).css('backgroundColor', '#002c54');
        $(this).css('color', '#002c54');
        $( this ).siblings().css( "background-color", "#002c54" );
        $( this ).siblings().css( "color", "black" );
    });
});
</script>                 <?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/cc_form/search_certificate.blade.php ENDPATH**/ ?>