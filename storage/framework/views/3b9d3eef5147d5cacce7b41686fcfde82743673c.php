
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-search"></i> &nbsp; Search Results</h3>
							<div class="card-tools"> 
							<!--<a href="<?php echo e(url('add_user')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> Add User</a>-->
							</div>
						</div>
						<div class="card-body">
                            <?php if(!empty($data['Student'])): ?>
                            <?php if(count($data['Student']) > 0): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-center">
                                        <th colspan="12">Students List</th>
                                    </tr>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>St. Name </th>
                                        <th>Class</th>
                                        <th>F. Name</th>
                                        <th>M. Name</th>
                                        <th>Mob. No.</th>                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       $i=1;
                                    ?>
                                    <?php $__currentLoopData = $data['Student']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="cursor:pointer; ">
                                        <td class="p-1" ><?php echo e($i++); ?></td>
                                        <td class="p-1" ><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?> </td>
                                        <td class="p-1" ><?php echo e($item['ClassTypes']['name'] ?? ''); ?> </td>
                                        <td class="p-1" ><?php echo e($item['father_name']); ?></td>
                                        <td class="p-1" ><?php echo e($item['mother_name']); ?></td>
                                        <td class="p-1" ><?php echo e($item['mobile']); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('studentDetail')); ?>/<?php echo e($item->id ?? ''); ?>" class="btn btn-success  btn-xs" title="View Student"><i class="fa fa-bars"></i></a>
                                            <a href="<?php echo e(url('admissionEdit',$item->id)); ?>" class="btn btn-primary  btn-xs ml-3" title="Edit Student"><i class="fa fa-edit"></i></a>
                                        </td>                                             
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($data['Teacher'])): ?>
                            <?php if(count($data['Teacher']) > 0): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-center">
                                        <th colspan="12">Teachers List</th>
                                    </tr>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Teacher Name </th>
                                        <th>F. Name</th>
                                        <th>Mob. No.</th>
                                        <th>Email</th>                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       $i=1;
                                    ?>
                                    <?php $__currentLoopData = $data['Teacher']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="cursor:pointer; ">
                                        <td class="p-1" ><?php echo e($i++); ?></td>
                                        <td class="p-1" ><?php echo e($teacher['first_name'] ?? ''); ?> <?php echo e($teacher['last_name'] ?? ''); ?> </td>
                                        <td class="p-1" ><?php echo e($teacher['father_name']); ?></td>
                                        <td class="p-1" ><?php echo e($teacher['mobile']); ?></td>
                                        <td class="p-1" ><?php echo e($teacher['email']); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('teachers/edit',$teacher->id)); ?>" class="btn btn-primary  btn-xs" title="Edit Teacher"><i class="fa fa-edit"></i></a>
                                        </td>                                             
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                            <?php endif; ?>

                            <?php if(!empty($data['User'])): ?>
                            <?php if(count($data['User']) > 0): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-center">
                                        <th colspan="12">Users List</th>
                                    </tr>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Users Name </th>
                                        <th>F. Name</th>
                                        <th>Mob. No.</th>
                                        <th>Email</th>                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       $i=1;
                                    ?>
                                    <?php $__currentLoopData = $data['User']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="cursor:pointer; ">
                                        <td class="p-1" ><?php echo e($i++); ?></td>
                                        <td class="p-1" ><?php echo e($user['first_name'] ?? ''); ?> <?php echo e($user['last_name'] ?? ''); ?> </td>
                                        <td class="p-1" ><?php echo e($user['father_name']); ?></td>
                                        <td class="p-1" ><?php echo e($user['mobile']); ?></td>
                                        <td class="p-1" ><?php echo e($user['email']); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('editUser',$user->id)); ?>" class="btn btn-primary  btn-xs" title="Edit Teacher"><i class="fa fa-edit"></i></a>
                                        </td>                                             
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if(!empty($data['SidebarSub'])): ?>
                            <?php if(count($data['SidebarSub']) > 0): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-center">
                                        <th colspan="12">Sidebar & Modules</th>
                                    </tr>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Sidebar</th>
                                        <th>Module</th>                                 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       $i=1;
                                    ?>
                                    <?php $__currentLoopData = $data['SidebarSub']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="cursor:pointer; ">
                                        <td class="p-1" ><?php echo e($i++); ?></td>
                                        <td class="p-1" ><?php echo e($sidebar['sidebar_name'] ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($sidebar['name'] ?? ''); ?> </td>
                                        <td>
                                            <a href="<?php echo e($sidebar->url ?? ''); ?>" class="btn btn-success btn-xs" title="Follow Link"><i class="fa fa-external-link"></i></a>
                                        </td>                                             
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                            <?php endif; ?>                            
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php /**PATH /home/rusoft/public_html/demo3/resources/views/dashboard/admin/all_students.blade.php ENDPATH**/ ?>