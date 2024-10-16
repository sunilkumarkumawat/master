<?php if(!empty($data)): ?>
                <?php if($data->count() > 0): ?>
                        <?php
                           $i=1;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <input type="hidden" id="class_type_id" name="class_type_id[]" value="<?php echo e($item['class_type_id'] ?? ''); ?>">
                                <input type="hidden" id="admission_id" name="admission_id[]" value="<?php echo e($item['id'] ?? ''); ?>">
                                <input type="hidden" id="name" name="name[]" value="<?php echo e($item['name'] ?? ''); ?>">
                                <input type="hidden" id="email" name="email[]" value="<?php echo e($item['email'] ?? ''); ?>">
                                <input type="hidden" id="name" name="name[]" value="<?php echo e($item['name'] ?? ''); ?>">
                                <input type="hidden" id="mobile" name="mobile[]" value="<?php echo e($item['mobile'] ?? ''); ?>">
                            <td> <?php echo e($i++); ?> &nbsp; <input type="checkbox" id="admission_ids" name="admission_ids[]" value="<?php echo e($item['id'] ?? ''); ?>" checked>
                            
                            </td>
                            <td><?php echo e($item['admissionNo'] ?? ''); ?></td>
                            <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                            <td><?php echo e($item['ClassTypes']['name'] ?? ''); ?></td>
                            
                            <td>
                    			<select class="form-control" id="session_id" name="session_id[]" >
                                  <?php if(!empty($session)): ?> 
                                      <?php $__currentLoopData = $session; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($item->id ?? ''); ?>" 
                                         <?php if(Session::get('session_id')+1 > $item->id): ?>
                                       <?php echo e("disabled"); ?>

                                        
                                         <?php endif; ?>
                                         ><?php echo e($item->from_year ?? ''); ?><?php echo e("-"); ?><?php echo e($item->to_year ?? ''); ?></option>
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
                 <?php /**PATH /home/rusoft/public_html/demo3/resources/views/students/promote/promote_Search.blade.php ENDPATH**/ ?>