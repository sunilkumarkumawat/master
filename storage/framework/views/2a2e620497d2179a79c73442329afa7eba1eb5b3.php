<?php
$role = Helper::roleType();
$actionPermission = Helper::actionPermission();
?>
 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-desktop"></i> &nbsp; <?php echo e(__('View Users')); ?></h3>
							<div class="card-tools">
							     <a href="<?php echo e(url('addUser')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-plus"></i> <?php echo e(__('common.Add')); ?> </a>
							     
							     <a href="<?php echo e(url('user_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back User"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?></a>
							     
							     </div>
						</div>
						<div class="card-body">
						    
                            <form id="quickForm"  method="post" >
                                <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-2">
                            		<div class="form-group">
                            			<label><?php echo e(__('user.Search By Role')); ?></label>
                            			<select class="select2 form-control" id="role_id" name="role_id" >
                            			<option value=""><?php echo e(__('common.Select')); ?></option>
                                         <?php if(!empty($role)): ?> 
                                              <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == 3 ?? '' ) ? 'hidden' : ''); ?> <?php echo e(($type->id == $search['role_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                        </select>
                            	    </div>
                            	</div>
                               	<div class="col-md-4">
            			<div class="form-group">
            				<label><?php echo e(__('common.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
            		    </div>
            		</div>                     	
                        <div class="col-md-1 ">
                             <label class="text-white">Search</label>
                    	    <button type="submit" class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                    	</div>	
                            </div>
                            </form> 						    
						    
							<table id="example1" class="table table-bordered table-striped  dataTable">
								<thead class="bg-primary">
									<tr role="row">
										<th><?php echo e(__('common.SR.NO')); ?></th>
										<th class="text-center">Image</th>
										<th><?php echo e(__('user.Role')); ?></th>
										<th><?php echo e(__('common.Name')); ?> </th>
										<th><?php echo e(__('common.Mobile')); ?></th>
										<th><?php echo e(__('common.E-Mail')); ?></th>
										<th><?php echo e(__('user.User Name')); ?></th>
										<th><?php echo e(__('common.Password')); ?></th>
										<th><?php echo e(__('common.Status')); ?></th>
										<th><?php echo e(__('common.Action')); ?></th>
								</thead>
								<tbody id="user_list_show"> 
								<?php if(!empty($data)): ?> 
    								<?php 
    								    $i=1; 
    								?> 
								<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($i++); ?></td>
										<td class="text-center">
                                            <img class="profileImg pointer" src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$item['image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'" data-img="<?php if(!empty($item->image)): ?> <?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$item['image']); ?> <?php endif; ?>" >
                                        </td>
										<td><?php echo e($item['roleName']['name'] ?? ''); ?></td>
								        <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
										<td><?php echo e($item['mobile'] ?? ''); ?></td>
										<td><?php echo e($item['email'] ?? ''); ?></td>
										<td><?php echo e($item['userName'] ?? ''); ?></td>
										<td><?php echo e($item['confirm_password'] ?? ''); ?></td>
										<td> 
										<?php if($actionPermission['edit'] == 1): ?>
										<?php if($item->role_id != 2): ?>
										<?php if($item->status==1): ?>

                                            <button data-toggle="modal" data-target="#statusModal" data-id="<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  w-100 btn btn-primary btn-sm userStatus" data-status="0">Active</button>
                                 
                                            <?php else: ?>
                    
                                            <button data-toggle="modal" data-target="#statusModal" data-id="<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  w-75 btn btn-primary btn-sm userStatus" data-status="1">Inactive</button>
                                   
                                            <?php endif; ?> 
                                            <?php else: ?>
                                            <select name="status" data-id="<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary form-control statusDrop w-75 <?php echo e($item->status == 0 ? 'btn btn-primary' : ''); ?> <?php echo e($item->status == 1 ?  : ''); ?> <?php echo e($item->status == 2 ? 'bg-info' : ''); ?>">
                                                <option value="0" <?php echo e($item->status == 0 ? 'selected' : ''); ?>>Inactive</option>
                                                <option value="1" <?php echo e($item->status == 1 ? 'selected' : ''); ?>>Active</option>
                                                <option value="2" <?php echo e($item->status == 2 ? 'selected' : ''); ?>>Dropped Teacher</option>
                                            </select>
                                        <?php endif; ?>    
										<!--<a data-id="<?php echo e($item['id'] ?? ''); ?>" style="<?php echo e($item['status'] == 0 ? 'display:none'   : ''); ?>" 
										data-status="0" class="btn btn-xs btn-success change_status" 
										data-bs-toggle="modal" data-bs-target="#statusModel"> &nbsp; Active &nbsp;</a> <a data-id="<?php echo e($item['id'] ?? ''); ?>" style="<?php echo e($item['status'] == 1 ? 'display:none'   : ''); ?>" data-status="1" class="btn btn-xs btn-danger change_status" data-bs-toggle="modal" data-bs-target="#statusModel">Deactive</a> -->
										<?php endif; ?>
										</td>
										<td>
									    <?php if($actionPermission['edit'] == 1): ?>
									    <a href="<?php echo e(url('editUser',$item['id'])); ?>" class="btn btn-primary  btn-xs" title="Edit User"><i class="fa fa-edit"></i></a>
									    <?php else: ?>
									    <button class="btn btn-primary disabled btn-xs"><i class="fa fa-edit"></i></button>
									    <?php endif; ?>

									    <?php if($item->role_id !== 1 && $item->role_id !== Session::get('role_id')): ?>
									    <?php if($actionPermission['deletes'] == 1): ?>
									    <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-primary  btn-xs ml-3" title="Delete User"><i class="fa fa-trash-o"></i></a> 
									    <?php else: ?>
									    <button class="btn btn-primary disabled btn-xs ml-3"><i class="fa fa-trash-o"></i></button> 
									    <?php endif; ?>	

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
			</div>
		</div>
	</section>
</div>

<script>
    $(document).ready(function(){
        
        $('.statusDrop').change(function(){
           var status = $(this).val(); 
            $('#status_id').val(status);
            $('#id').val($(this).data('id'));
            $('#statusModal').modal('show');
        });
        
        $('.deleteData').click(function() {
        	var delete_id = $(this).data('id');
        	$('#delete_id').val(delete_id);
        });
        
        $('.userStatus').click(function(){
            var status = $(this).data('status');
            $('#status_id').val(status);
            $('#id').val($(this).data('id'));
        });
    });
</script>

<div class="modal fade" id="statusModal">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #002c54;">
      <div class="modal-header">
        <h4 class="modal-title text-white">Change Status Conformation</h4>
        <button type="button" class="btn-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="<?php echo e(url('userStatus')); ?>" method="post">
            <?php echo csrf_field(); ?>
      <div class="modal-body">
          <input type="hidden" id="status_id" name="status_id">
          <input type="hidden" id="id" name="id">
          <h5 class="text-white">Are you sure you want to Change Status ?</h5>
           
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" >Close</button>
            <button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
         </div>
       </form>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #002c54;">
			<div class="modal-header">
				<h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="<?php echo e(url('deleteUser')); ?>" method="post">
			     <?php echo csrf_field(); ?>
				<div class="modal-body">
					<input type=hidden id="delete_id" name=delete_id>
					<h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?> ?</h5> </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
					<button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="profileImgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img id="profileImg" src="" width="100%" height="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
<style>
    .profileImg {
        width:50px;
        height:50px;
        border-radius:50%;
    }
    
    .statusDrop option{
        background-color: white !important;
        color:black !important;
    }
</style>
<script>
    $('.profileImg').click(function(){
        var profileImgUrl = $(this).data('img');
        if(profileImgUrl != ''){
            $('#profileImgModal').modal('toggle');
            $('#profileImg').attr('src',profileImgUrl);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/user/users/view.blade.php ENDPATH**/ ?>