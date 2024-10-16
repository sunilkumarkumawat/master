<?php
    $getAttendanceStatus= Helper::getAttendanceStatus();
?>                 
                <?php if($data->count() > 0): ?>
                        <?php
                           $i=1
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <input type="hidden" id="teacher_id" name="teacher_id[]" value="<?php echo e($item['id'] ?? ''); ?>">
                                <input type="hidden" id="first_name" name="first_name[]" value="<?php echo e($item['first_name'] ?? ''); ?>">
                                <input type="hidden" id="mobile" name="mobile[]" value="<?php echo e($item['mobile'] ?? ''); ?>">
                                <input type="hidden" id="email" name="email[]" value="<?php echo e($item['email'] ?? ''); ?>">
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                            <td><?php echo e($item['father_name'] ?? ''); ?></td>
                            <td><?php echo e($item['mobile'] ?? ''); ?></td>
                            <td>
                    			<select class="form-control" id="attendance_status" name="attendance_status[]" >
                               <?php if(!empty($getAttendanceStatus)): ?> 
                                <?php $__currentLoopData = $getAttendanceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <option value="<?php echo e($attendance_status->id ?? ''); ?>"><?php echo e($attendance_status->name ?? ''); ?></option>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                                </select>                                    
                            </td>                            
                        </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                                <tr><td colspan="12" class="text-center">No Staff Found !</td></tr>
                <?php endif; ?>
                  
                  
                 <?php /**PATH /home/rusoft/public_html/demo3/resources/views/staff/staff_attendance/attendance_Search.blade.php ENDPATH**/ ?>