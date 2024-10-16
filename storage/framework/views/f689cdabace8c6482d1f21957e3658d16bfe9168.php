                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th><?php echo e(__('common.SR.NO')); ?></th>
                                    <th><?php echo e(__('hostel.Floor Name/No.')); ?></th>
                                    <th><?php echo e(__('common.Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if(!empty($data)): ?>
                                <?php
                                    $i=1
                                ?>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($item['name']); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('floor_edit')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  btn-xs" title="Edit Floor" ><i class="fa fa-edit"></i></a> 
                                        <a href="javascript:;" data-id='<?php echo e($item['id'] ?? ''); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-primary btn-xs ml-3" title="Delete Floor"><i class="fa fa-trash-o"></i></a>
                                    </td>                                    
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php else: ?>
                                <tr><td colspan="3" class="text-center"><?php echo e(__('hostel.No Floor Found')); ?> !</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

<script>
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  
  $('#delete_id').val(delete_id); 
  } );
</script>
                        <!-- The Modal -->
                        <div class="modal" id="Modal_id">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background: #555b5beb;">
                        
                              <div class="modal-header">
                                <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </div>
                        
                              <form action="<?php echo e(url('floor_delete')); ?>" method="post">
                                      	 <?php echo csrf_field(); ?>
                              <div class="modal-body">
                                      <input type=hidden id="delete_id" name="delete_id">
                                      <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5>
                              </div>
                              <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
                                 </div>
                               </form>
                            </div>
                          </div>
                        </div> 
                        <?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/floor/floor_search.blade.php ENDPATH**/ ?>