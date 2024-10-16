      
            <div class="m-2">
              <table class="table table-bordered">
                <thead class="bg-primary">
                  <tr>
                    <th><?php echo e(__('common.SR.NO')); ?></th>
                    <th class="text-center"><?php echo e(__('common.Reg.No.')); ?></th>
                    <th><?php echo e(__('common.Name')); ?> </th>
                    <th><?php echo e(__('common.Mobile')); ?></th>
                    <th><?php echo e(__('common.Email')); ?></th>
                    <th><?php echo e(__('common.F Name')); ?></th>
                    <th><?php echo e(__('common.M Name')); ?></th>
                    <th><?php echo e(__('common.Reg. Date')); ?></th>
                    <th><?php echo e(__('common.V/C')); ?></th>
                  </tr>
                </thead>
                
                <tbody id="trColor">
                  <?php if($data->count() > 0): ?>
                  <?php
                  $i=1
                  ?>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <tr style="cursor:pointer; " onclick="showData('<?php echo e($item['id']); ?>');" data-status="<?php echo e($item->status); ?>">
                    <td><?php echo e($i++); ?></td>
                    <td class="text-center"><?php echo e($item['registration_no'] ?? ''); ?></td>
                    <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                    <td><?php echo e($item['mobile']); ?></td>
                    <td><?php echo e($item['email']); ?></td>
                    <td><?php echo e($item['father_name']); ?></td>
                    <td><?php echo e($item['mother_name']); ?></td>
                    <td><?php echo e(date('d-m-Y', strtotime($item->registration_date))); ?></td>
                    <td><?php echo e($item['village_city']); ?></td>

                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php else: ?>
                  <tr>
                    <td colspan="12" class="text-center">No Registerd Students Found !</td>
                  </tr>
                  <?php endif; ?>

                </tbody>
              </table>
            </div>
            
    <script>
                
$(document).ready(function() {
    $('#trColor tr').click(function() {
        $(this).css('backgroundColor', '#6639b5c4');
        $(this).css('color', '#fff');
        $( this ).siblings().css( "background-color", "white" );
        $( this ).siblings().css( "color", "black" );
        
        var status = $(this).data('status');
        
        if(status == 1){
            toastr.error('Student Already Exist');
        }
    });
});
</script><?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/admission/studentSearchView.blade.php ENDPATH**/ ?>