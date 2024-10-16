<?php

$task = Helper::task();


?>
  <?php if(!empty($task)): ?>
  
  
               <?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php
                $fdate = $item->created_at;
$tdate = date('Y-m-d H:i:s');
$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime1->diff($datetime2);
$days = $interval->format('%a');

?>
                                <li class="" id="_<?php echo e($item->id ?? ''); ?>">
                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" class="task_status"
                                            data-id="<?php echo e($item->id ?? ''); ?>" data-status="<?php echo e($item->status ?? ''); ?>"
                                            name="task_status" id="_<?php echo e($item->name ?? ''); ?>"
                                            style="<?php echo e($item['status'] == 1 ? 'checked' : ''); ?>">
                                        <label for="_<?php echo e($item->name ?? ''); ?>"></label>
                                    </div>
                                    <span class="text"><?php echo e($item->name ?? ''); ?></span>
                                    <small class="badge badge-<?php echo e($days<=2 ? 'success' : ''); ?><?php echo e($days>=3 && $days<=6  ? 'primary' : ''); ?><?php echo e($days>=7  ? 'danger' : ''); ?>"><i class="fa fa-clock"></i> <?php echo e($days); ?> days ago</small>
                                    <div class="tools">
                                        <i class="fa fa-trash-o task_delete" data-id="<?php echo e($item->id ?? ''); ?>"></i>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
<?php /**PATH /home/rusoft/public_html/demo3/resources/views/task_list.blade.php ENDPATH**/ ?>