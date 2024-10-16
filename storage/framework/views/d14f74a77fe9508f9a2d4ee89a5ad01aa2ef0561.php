 
<?php $__env->startSection('content'); ?>
<?php
$getPermission = Helper::getPermission();
?>
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-bar-chart-o"></i> &nbsp;<?php echo e(__('fees.fees Counter View')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('feesCounterAdd')); ?>" class="btn btn-primary btn-sm" title="Back"><i class="fa fa-plus"></i> <?php echo e(__('Add')); ?></a>
                                <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary btn-sm" title="Back"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?></a>
                            </div>
                        </div>

                        

                        <div class="row m-2">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
                                    <thead>
                                        <tr role="row">
                                            <th><?php echo e(__('common.SR.NO')); ?></th>
                                            <th><?php echo e(__('common.Name')); ?></th>
                                            <th><?php echo e(__('common.Password')); ?></th>
                                            <th><?php echo e(__('common.Action')); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if(!empty($data)): ?> 
                                        <?php $i=1 ?> 
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item['name'] ?? ''); ?></td>
                                            <td><?php echo e($item['password'] ?? ''); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('feesCounterEdit')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  btn-xs" title="Edit" ><i class="fa fa-edit"></i></a> 
                                                <a href="javascript:;" data-id='<?php echo e($item['id']); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-primary btn-xs ml-3" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<style>
    .padding_table thead tr{
    background: #002c54;
    color:white;
}
    
.padding_table th, .padding_table td{
     padding:5px;
     font-size:14px;
}
</style>
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

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('feesCounterDelete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              
            
        <input type=hidden id="delete_id" name=delete_id>
        <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5>
           
      </div>

      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
         </div>
       </form>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/fees/counter/view.blade.php ENDPATH**/ ?>