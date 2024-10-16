<?php

?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-image"></i> <?php echo e(__('master.Edit Uniform')); ?></h3>
                    <div class="card-tools">
                    <a href="<?php echo e(url('uniform_add')); ?>" class="btn btn-primary  btn-sm" title="View Gallery"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?> </a>
                    <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?></a>
                    </div>
                    
                    </div>        
                <form id="quickForm" action="<?php echo e(url('uniform_edit')); ?>/<?php echo e($data['id']); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row m-2">
        
                          <div class="col-md-3">
                            <div class="form-group">
                               <label><?php echo e(__('master.Uniform Image')); ?></label>
                               <input type="file" class="form-control" value="<?php echo e($data['uniform_image'] ?? ''); ?>" id="uniform_image" name="uniform_image">
								
                            </div>
                        </div>
                          <div class="col-md-3">
                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'uniform_image/'.$data['uniform_image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/no_image.png'); ?>'" width="160px" height="160px" alt="uniform" />
                        </div>
                        
                        <div class="col-md-12 pt-2">
                                <div class="form-group">
                                    <label class="text-danger"><b><?php echo e(__('master.Description')); ?>*</b></label>
                                    <textarea type="text" class="form-control " id="editor1" name="description" placeholder="<?php echo e(__('master.Description')); ?>"><?php echo e($data['description'] ??  old('description')); ?></textarea>
                               
                                </div>
                            </div>
                        </div>
                        <div class="row m-2">
                     
                         <div class="col-md-12 mt-3 mb-3 text-center">
                            <button type="submit" class="btn btn-primary "><?php echo e(__('common.Submit')); ?></button>
                        </div>
                    </div>
                    </form>
 
                        
                    </div>
                 
                       </div>
            </div>
</div>


</section>
</div>
<script>
$(document).ready(function(){
    var editor1 = new RichTextEditor("#editor1");
});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/Uniform/edit.blade.php ENDPATH**/ ?>