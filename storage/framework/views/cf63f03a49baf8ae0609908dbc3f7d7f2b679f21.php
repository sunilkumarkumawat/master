<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- <div class="panel panel-primary">
        <div class="container-fluid panel-heading">
            <div class="row">
                <div class="col-sm-8">
                <h3 class="m-2">Bus List</h3>
                </div>
                <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                <li class="pr-2"><a href="<?php echo e(url('dashboard')); ?>" class="btn btn-primary  btn-xs"><i class="fa fa-home"></i> Home</a></li>
                <li class="pl-2"><a href="<?php echo e(url('bus/index')); ?>" class="btn btn-primary  btn-xs"><i class="fa fa-arrow-left"></i> Back</a></li>
                </ol>
                </div>
            </div>
        <hr class="bg-primary" style="margin-top:-12px;">
        </div>
    </div>-->

  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-outline card-orange">
            <div class="card-header bg-primary">
              <h3 class="card-title"><i class="fa fa-bus"></i> &nbsp; <?php echo e(__('bus.Bus List')); ?></h3>
              <div class="card-tools">
                <a href="<?php echo e(url('busAdd')); ?>" class="btn btn-primary  btn-sm" title="View Holiday"><i class="fa fa-plus"></i><?php echo e(__('messages.Add')); ?> </a>
                <a class="pl-2"><a href="<?php echo e(url('busDashboard')); ?>" class="btn btn-primary  btn-xs"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?> </a>
              </div>

            </div>

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card-body">
                      <table id="example1" class=" table table-bordered table-striped dataTable dtr-inline ">
                        <thead class="bg-primary">
                          <tr role="row">
                            <th><?php echo e(__('messages.Sr.No.')); ?></th>
                            <th><?php echo e(__('bus.Bus Name')); ?></th>
                            <th><?php echo e(__('bus.Bus No.')); ?></th>
                            <th><?php echo e(__('bus.Bus Owner Name')); ?></th>
                            <th><?php echo e(__('bus.Bus Owner Contact No.')); ?></th>
                            <th><?php echo e(__('bus.Bus Rigistration No.')); ?></th>
                            <th><?php echo e(__('bus.Bus Photo')); ?></th>
                            <th><?php echo e(__('messages.Action')); ?></th>
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
                            <td><?php echo e($item['bus_no']); ?></td>
                            <td><?php echo e($item['bus_owmer_name']); ?></td>
                            <td><?php echo e($item['owner_no']); ?></td>



                            <td><?php echo e($item['bus_rigistration_no']); ?></td>
                            <td><img src="<?php echo e(env('IMAGE_SHOW_PATH').'/bus_photo/'.$item['bus_photo']); ?>" width="120px" height="60px"></td>

                            <td>
                              <a href="<?php echo e(url('busEdit',$item->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                              <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger btn-xs ml-1"><i class="fa fa-trash"></i></a>
                            </td>


                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </tbody>
                      </table>

                    </div>


                  </div>

                </div>

            </section>

          </div>

        </div>
      </div>
    </div>

  </section>
</div>






<script>
  $('.deleteData').click(function() {
    var delete_id = $(this).data('id');

    $('#delete_id').val(delete_id);
  });
</script>

<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="<?php echo e(url('busDelete')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal-body">



          <input type=hidden id="delete_id" name=delete_id>
          <h5 class="text-white"><?php echo e(__('messages.Are you sure you want to delete')); ?> ?</h5>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('messages.Close')); ?></button>
          <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('messages.Delete')); ?></button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/bus/bus/view.blade.php ENDPATH**/ ?>