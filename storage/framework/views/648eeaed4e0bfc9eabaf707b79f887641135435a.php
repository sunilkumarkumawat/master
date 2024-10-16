 
<?php $__env->startSection('content'); ?>
    
<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">        
        <div class="card card-outline card-orange">
			<div class="card-header bg-primary flex_items_toggel">
				<h3 class="card-title"><i class="fa fa-clipboard"></i> &nbsp;<?php echo e(__('staff.Teacher Documents')); ?></h3>
				<div class="card-tools"> <a href="<?php echo e(url('staff_file')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('common.Back')); ?>  </span></a> </div>
			</div>            
          
                 <section class="content">
      <div class="container-fluid">
           <form id="quickForm" action="<?php echo e(url('teacher/image')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>  
        <div class="row">
          <div class="col-12">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped  dataTable dtr-inline padding_table">
                  <thead>
                  <tr role="row">
                    <th><?php echo e(__('common.SR.NO')); ?></th>
                    <th><?php echo e(__('common.Name')); ?></th>
                    <th><?php echo e(__('common.Photo')); ?></th>
                    <th><?php echo e(__('staff.Experience Letter')); ?></th>
                    <th><?php echo e(__('staff.Id Proof')); ?></th>
                    <th><?php echo e(__('staff.Qualification Proof')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      <?php if(!empty($data)): ?>
                        <?php
                           $i=1
                        ?>
                        
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                            <td>
                                <?php if($item['photo'] != null): ?>
                                <a href="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$item['photo']); ?>" target="blank">
                                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$item['photo']); ?>" width="100px" height="100px" >
                                </a>
                                <?php else: ?>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Image_not_available.png/640px-Image_not_available.png" width="100px" height="100px" >
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item['experience_letter_img'] != null): ?>
                                <a href="<?php echo e(env('IMAGE_SHOW_PATH').'teacher/teacher_'.$item['UniqueId'].'/experience_letter/'.$item['experience_letter_img']); ?>" target="blank">
                                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'teacher/teacher_'.$item['UniqueId'].'/experience_letter/'.$item['experience_letter_img']); ?>" width="100px" height="100px" >
                                </a>
                                <?php else: ?>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Image_not_available.png/640px-Image_not_available.png" width="100px" height="100px" >
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item['Id_proof_img'] != null): ?>
                                <a href="<?php echo e(env('IMAGE_SHOW_PATH').'teacher/teacher_'.$item['UniqueId'].'/id_proof/'.$item['Id_proof_img']); ?>" target="blank">
                                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'teacher/teacher_'.$item['UniqueId'].'/id_proof/'.$item['Id_proof_img']); ?>" width="100px" height="100px" >
                                </a>
                                <?php else: ?>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Image_not_available.png/640px-Image_not_available.png" width="100px" height="100px" >
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item['qualification_proof_img'] != null): ?>
                                <a href="<?php echo e(env('IMAGE_SHOW_PATH').'teacher/teacher_'.$item['UniqueId'].'/qualification_proof/'.$item['qualification_proof_img']); ?>" target="blank">
                                <img src="<?php echo e(env('IMAGE_SHOW_PATH').'teacher/teacher_'.$item['UniqueId'].'/qualification_proof/'.$item['qualification_proof_img']); ?>" width="100px" height="100px" >
                                </a>
                                <?php else: ?>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Image_not_available.png/640px-Image_not_available.png" width="100px" height="100px" >
                                <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/staff/teacher_image/index.blade.php ENDPATH**/ ?>