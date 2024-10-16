<?php
    $getAttendanceStatus= Helper::getAttendanceStatus();


?>      
<?php if(!empty($data)): ?>
                <?php if($data->count() > 0): ?>
                        <?php
                           $i=1;

                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                           $stu_att = DB::table('student_attendance')
                                <!--->where('session_id', Session::get('session_id'))
                                ->where('branch_id', Session::get('branch_id'))-->
                                ->where('admission_id', $item['id'])
                                ->whereDate('date', $custom_date)
                                ->first();
        
                        ?>
                        <tr>
                                <input type="hidden" id="class_type_id" name="class_type_id[]" value="<?php echo e($item['class_type_id'] ?? ''); ?>">
                                 <input type="hidden" id="name" name="name[]" value="<?php echo e($item['name'] ?? ''); ?>">
                                <input type="hidden" id="email" name="email[]" value="<?php echo e($item['email'] ?? ''); ?>">
                                <input type="hidden" id="first_name" name="first_name[]" value="<?php echo e($item['first_name'] ?? ''); ?>">
                                <input type="hidden" id="mobile" name="mobile[]" value="<?php echo e($item['mobile'] ?? ''); ?>">
                            <td><?php echo e($i++); ?></td>
                            <td>  <input type="hidden" id="admission_id" name="admission_id[]" value="<?php echo e($item['id'] ?? ''); ?>">
                              
                              <input type="checkbox" class="checkbox" name="studentId[]"  checked value="<?php echo e($item['id'] ?? ''); ?>">  <?php echo e($item['admissionNo'] ?? ''); ?></td>
                            <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                            <td><?php echo e($item['ClassTypes']['name'] ?? ''); ?>

                            <?php if(!empty($item['Section']['name'])): ?>
                                (<?php echo e($item['Section']['name']); ?>)
                            <?php endif; ?></td>
                            <td><?php echo e($item['father_name'] ?? ''); ?></td> 
                            <td><?php echo e($item['mother_name'] ?? ''); ?></td>
                            <td style='white-space:nowrap;'><?php echo e(isset($item['dob']) ? \Carbon\Carbon::parse($item['dob'])->format('d-m-Y') : ''); ?></td>
                            <td>
                    		<select class="form-control attendance_status_<?php echo e($item['id'] ?? ''); ?>" id="attendance_status" name="attendance_status[]" 
                    			data-name="<?php echo e($item['first_name'] ?? ''); ?>"
                    			data-mobile="<?php echo e($item['mobile'] ?? ''); ?>"
                    			data-email="<?php echo e($item['email'] ?? ''); ?>"
                    			data-class_type_id = "<?php echo e($item['class_type_id'] ?? ''); ?>"
                    			data-admission_id="<?php echo e($item['id'] ?? ''); ?>"
                    		
                    			>
                    			 
                                 <?php if(!empty($getAttendanceStatus)): ?> 
                                    <?php $__currentLoopData = $getAttendanceStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                            <option value="<?php echo e($attendance_status->id ?? ''); ?>"  <?php if(!empty($stu_att)): ?> <?php echo e($attendance_status->id == $stu_att->attendance_status_id ? 'selected' : ''); ?> <?php endif; ?>><?php echo e($attendance_status->name ?? ''); ?></option>
                                      
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                </select>                                    
                            </td>                            
                        </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                   <tr>
                  <td colspan="12" class="text-center">No Students Found !</td>
                   </tr>
                <?php endif; ?>
                  
              <?php endif; ?>    
              
         
                 <?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/attendance/attendance_Search.blade.php ENDPATH**/ ?>