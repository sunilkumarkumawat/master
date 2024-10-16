 
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
							<h3 class="card-title"><i class="fa fa-cloud-download"></i> &nbsp;<?php echo e(__('master.Assignment List')); ?></h3>
							<div class="card-tools"> <a href="<?php echo e(url('download_center')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?> </a> </div>
						</div>
				
    	<div class="row mb-2 m-2">
		    <div class="col-md-12">	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
          <thead class="bg-primary">
          <tr role="row">

                                    <tr role="row">
                                        <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                        <th><?php echo e(__('messages.Content Title')); ?></th>
                                        <th><?php echo e(__('messages.Class')); ?></th>
                                        <th><?php echo e(__('messages.Type')); ?></th>
                                        <th><?php echo e(__('messages.Date')); ?></th>
                                        <th><?php echo e(__('Link')); ?></th>
                                        <th><?php echo e(__('Description')); ?></th>
                                        <th><?php echo e(__('messages.Action')); ?></th>

                                </thead>
                                <tbody>
                      
                                    <?php if(!empty($data)): ?>
                                    <?php
                                       $i=1;
                                       //dd($data);
                                    ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php if($item->content_type =="Assignments"): ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($item['content_title']); ?></td>
                                        <td><?php echo e($item['class_name']); ?></td>
                                        <td><?php echo e($item['content_type']); ?></td>
                                        <td><?php echo e(date('d-m-Y', strtotime($item['upload_date'])) ?? ''); ?></td>
                                           <td>  <?php if(($item['video_link'] ?? '') != ''): ?>
                                        <a class='text-primary' target='_blank'href="<?php echo e($item['video_link'] ?? ''); ?>" >Click to View</a>
                                        <?php endif; ?></td>
                                            <td><?php echo e($item['description'] ?? ''); ?></td>
                                        <td>
                                        <?php if(Session::get('role_id') == 3): ?>
                                                <a href="<?php echo e(url('download')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="ml-2" title="Download"><i class="fa fa-download text-success"></i></a>
                                                
                                        <?php else: ?>
                                            <?php if($getPermission->deletes == 1 || $getPermission->download == 1): ?>
                                                <?php if($getPermission->download == 1): ?> 
                                                    <?php if(!empty($item->content_file)): ?>
                                                <a href="<?php echo e(url('download')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="ml-2" title="Download"><i class="fa fa-download text-success"></i></a>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($getPermission->deletes == 1): ?>
                                                <a href="javascript:;"  data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id"  class="deleteData ml-4" title="Delete"><i class="fa fa-trash-o text-danger"></i></a>
                                                <?php endif; ?>
                                                <!--<?php if(!empty($item->description)): ?>-->
                                                <!--    <i class="fa fa-play ml-4 text-danger change_src" data-src='<?php echo e($item->description ?? ""); ?>' style='cursor:pointer' aria-hidden="true"  data-toggle="modal" data-target="#videoModal"></i>-->
                                                <!--<?php endif; ?>-->
                                                <!--<?php if(!empty($item->content_file)): ?>-->
                                                <!--<i class="fa fa-play ml-4 text-info change_src" data-src='<?php echo e((env("IMAGE_SHOW_PATH")."download_center/".$item->content_file ?? '')); ?>' style='cursor:pointer' aria-hidden="true"  data-toggle="modal" data-target="#videoModal"></i>-->
                                                <!--<?php endif; ?>-->
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </td>
                                        
                                    </tr>
                                    <?php endif; ?>
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
        <h4 class="modal-title text-white">Delete Confirmation</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('upload_delete')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              
            
            
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white">Are you sure you want to delete  ?</h5>
           
      </div>

      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
         </div>
       </form>

    </div>
  </div>
</div>     
 

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Demo Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="315" src="https://www.youtube.com/watch?v=SFgUg9y0b8U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div> 
<script>
    $( ".change_src" ).on( "click", function() {
        
        var src = $(this).attr('data-src');
 $('iframe').attr('src',src)
});
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/download_center/assignments.blade.php ENDPATH**/ ?>