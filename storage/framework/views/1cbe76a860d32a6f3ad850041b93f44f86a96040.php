<?php 
$getCountry = Helper::getCountry();
$getState = Helper::getState();
$getCity = Helper::getCity();
?> 

 <?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-orange ml-1">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp;<?php echo e(__('master.View Subject')); ?></h3>
                        </div>
                        
                            <div class="card-body">
                                <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead class="bg-primary">
                                        <tr role="row">
                                            <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                            <th><?php echo e(__('messages.Subject')); ?></th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if(!empty($data)): ?> 
                                        <?php $i=1 
                                        ?> 
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($item['name'] ?? ''); ?></td>
                                            <td><?php if($item->other_subject == 0): ?> Main <?php else: ?> Other <?php endif; ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

  
       <script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>

<script>
    $(".deleteData").click(function () {
        var delete_id = $(this).data("id");

        $("#delete_id").val(delete_id);
    });
</script>



<!-- The Modal -->
<div class="modal" id="Modal_id">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #555b5beb;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>

            <!-- Modal body -->
            <form action="<?php echo e(url('delete_subject')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" id="delete_id" name="delete_id" />
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


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/subject/student_subject_view.blade.php ENDPATH**/ ?>