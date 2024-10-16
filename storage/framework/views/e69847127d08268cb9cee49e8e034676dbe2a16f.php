<?php
$role = Helper::roleType();
$liverole = Session::get('role_id');
?>
 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-envelope"></i> &nbsp;<?php echo e(__('master.View Notices')); ?></h3>
							<div class="card-tools"> 
							<?php if(Session::get('role_id') != 3): ?>
							    <a href="<?php echo e(url('notice_board/add')); ?>" class="btn btn-primary  btn-sm" title="Add "><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?>   </a> 
							    <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back "><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>   </a> 
							<?php endif; ?>
							</div>
						</div>

                        <div class="row m-2">
                            <div class="col-12" id="accordion">
                                    <?php if(!empty($data)): ?>
                                    <?php
                                       $i=1
                                    ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php
                                    $roles = $item->role_id;
                                    $checkRole  = explode (",", $roles);
                                    
                                    ?>
                                     
                                    <?php if(in_array($liverole, $checkRole)): ?>
                                    <div class="card card-warning card-outline">
                                            <a class="d-block w-100"id="_<?php echo e($item['id'] ?? ''); ?>" data-toggle="collapse" href="#_<?php echo e($item['id'] ?? ''); ?>">
                    						<div class="card-header">
                    							<h3 class="card-title"><?php echo e($i++); ?>. <?php echo e($item['title'] ?? ''); ?></h3>
                    							<div class="card-tools"> 
                    							<?php if(Session::get('role_id') != 3): ?>
                    							    <a href="<?php echo e(url('notice_board/edit')); ?>/<?php echo e(($item->id)); ?>" class="" title="Edit Notice "><i class="fa fa-pencil"></i></a> &nbsp;
                    							    <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData" title="Delete Notice"><i class="fa fa-remove text-danger"></i></a> 
                    							<?php endif; ?>
                    							</div>
                    						</div>                                                
                                            </a>
                                            <div id="_<?php echo e($item['id'] ?? ''); ?>" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                           <?php echo html_entity_decode($item['message'] ?? '', ENT_QUOTES, 'UTF-8'); ?> 
                                                        </div>
                                                        <div class="col-md-3">
                                                                 
                                                            <span><i class="fa fa-calendar"></i> <?php echo e(__('master.From Date')); ?> :  <?php echo e(date('d-m-Y', strtotime($item['from_date'])) ?? ''); ?></span><br> 
                                                             <span><i class="fa fa-calendar"></i> <?php echo e(__('master.To Date')); ?> :  <?php echo e(date('d-m-Y', strtotime($item['to_date'])) ?? ''); ?></span><br>
                                                             <span><i class="fa fa-user"></i> Created By : Super Admin</span><br>
                                                             <span><h5>Message To</h5></span><br>
                                                             <?php if(!empty($checkRole)): ?>
                                                             <?php $__currentLoopData = $checkRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roleName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                             <?php if($roleName->id == $role_id): ?>
                                                               <span><i class="fa fa-user"></i>&nbsp;<?php echo e($roleName->name ?? '-'); ?></span><br>
                                                             <?php endif; ?>
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                             <?php endif; ?>
                                                             <!--<span><i class="fa fa-user"></i> Admin</span><br>-->
                                                             <!--<span><i class="fa fa-user"></i> Teacher</span><br>-->
                                                             <!--<span><i class="fa fa-user"></i> Super Admin</span><br>-->
                                                             <!--<span><i class="fa fa-user"></i> Student</span><br>-->
                                                             <!--<span><i class="fa fa-user"></i> Parent</span>-->
                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php else: ?>
                                       <div class="card card-warning card-outline">
                                           <h4 class="text-center mb-0">No Notice Here !!</h4>
                                        </div>
                                    <?php endif; ?>
                            </div>
                        </div>              
                                
        </div>
    </div>
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
				<h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="<?php echo e(url('notice_board/delete')); ?>" method="post"> 
			    <?php echo csrf_field(); ?>
				<div class="modal-body">
					<input type=hidden id="delete_id" name=delete_id>
					<h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5> </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
					<button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
				</div>
			</form>
		</div>
	</div>
		</div>
	</div>
		</div>
	</div>
	</section>
</div>

<script>
   $(window).on("load", function(){
  var data_id= <?php echo e($data_id); ?>

 
  setTimeout(
    function() {
      $( "#_"+data_id ).trigger("click");
     }, 100);
      $('html, body').animate({
            scrollTop: $("#_"+data_id).offset().top
          }, 1500);
 
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/notice_board/view.blade.php ENDPATH**/ ?>