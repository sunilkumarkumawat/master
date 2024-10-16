<?php
$getPermission = Helper::getPermission();
?>

 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">

                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-cogs"></i> &nbsp;<?php echo e(__('setting.View Setting')); ?> </h3>
                    <div class="card-tools">
                      <!--<?php if(Session::get('role_id') == 1): ?>
                        <a href="<?php echo e(url('addSetting')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-plus"></i> <?php echo e(__('common.Add')); ?> </a>
                      <?php endif; ?>-->
                        <!-- <a href="<?php echo e(url('/')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?> </a> -->
                    </div>
                </div> 
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead class="bg-primary">
                  <tr role="row">
                      <th><?php echo e(__('common.SR.NO')); ?></th>
                            <th><?php echo e(__('setting.Logo')); ?></th>
                            <th><?php echo e(__('common.E-Mail')); ?> </th>
                            <th><?php echo e(__('common.Name')); ?></th>
                            <th><?php echo e(__('common.Address')); ?></th>
                            <th><?php echo e(__('common.Mobile')); ?></th>
                            <th><?php echo e(__('setting.Pin Code')); ?></th>
                            <th><?php echo e(__('setting.Seal & Sign.')); ?></th>
                            <?php if($getPermission->edit == 1 || $getPermission->deletes == 1): ?>
                            <th><?php echo e(__('common.Action')); ?></th>
                            <?php endif; ?>
                             
                      
                  </thead>
                  <tbody>
                      
                      <?php if(!empty($data)): ?>
                        <?php
                           $i=1
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <td><?php echo e($i++); ?></td>
                               
                                <td><img src="<?php echo e(env('IMAGE_SHOW_PATH').'setting/left_logo/'.$item['left_logo']); ?>" width="120px" height="50px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/no_image.png'); ?>'"></td>
                                <td><?php echo e($item['gmail'] ?? ''); ?></td>
                                <td><?php echo e($item['name'] ?? ''); ?></td>
                                <td><?php echo e($item['address'] ?? ''); ?></td>
                                <td><?php echo e($item['mobile'] ?? ''); ?></td>
                                <td><?php echo e($item['pincode'] ?? ''); ?></td>
                                <td><img src="<?php echo e(env('IMAGE_SHOW_PATH').'setting/seal_sign/'.$item['seal_sign']); ?>" width="120px" height="50px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/no_image.png'); ?>'"></td>
                                <?php if($getPermission->edit == 1 || $getPermission->deletes == 1): ?>
                                    <td>
                                        <?php if($getPermission->edit == 1): ?>
                                        <a href="<?php echo e(url('editSetting',$item->id)); ?>" class="btn btn-primary  btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                                        <?php endif; ?>
                                      <?php if($item->id !== 1 && Session::get('role_id') == 1): ?>
                                      <?php if($getPermission->deletes == 1): ?>
                                      <a class="deleteData btn btn-danger  btn-xs ml-2"data-id='<?php echo e($item->id); ?>'  href="javascript:"data-bs-toggle="modal" data-bs-target="#Modal_id" title="Delete"><i class="fa fa-trash"></i></a>
                                      <?php endif; ?>
                                      <?php endif; ?>
                                    </td>
                                <?php endif; ?>
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
    </section>
    

    
</div>
        
        
        <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
        
        
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
      <form action="<?php echo e(url('deleteSetting')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              
            
            
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5>
           
      </div>

      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
         </div>
       </form>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/settings/setting/viewSetting.blade.php ENDPATH**/ ?>