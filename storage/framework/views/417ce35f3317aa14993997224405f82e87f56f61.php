 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-credit-card"></i> &nbsp;TEST DATA</h3>
							
							
							<div class="card-tools"> 
							  <!--<a class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> <?php echo e(__('Add Head')); ?> </a>-->
							    <!--<a href="<?php echo e(url('hostel_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back </a>--> 
							</div>
							
						</div>
						<div class="card-body">
     
                            <div class="col-md-12" id="">

                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                    <thead class="bg-primary">
                                        <tr role="row">
                                           <th>Sr.</th>
                                           <th>Hostel</th>
                                           <th>Building</th>
                                           <th>Floor</th>
                                           <th>Room</th>
                                           <th>Bed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)): ?>
                                            <?php
                                            $i = 1;
                                            ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $hostel = DB::table('hostel')->whereNull('deleted_at')->where('id', $item->hostel_id)->first();
                                                $building = DB::table('hostel_building')->whereNull('deleted_at')->where('id', $item->building_id)->first();
                                                $floor = DB::table('hostel_floor')->whereNull('deleted_at')->where('id', $item->floor_id)->first();
                                                $room = DB::table('hostel_room')->whereNull('deleted_at')->where('id', $item->room_id)->first();
                                            ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($hostel->name ?? ''); ?> <b>[<?php echo e($hostel->id ?? ''); ?>]</b></td>
                                            <td><?php echo e($building->name ?? ''); ?> <b>[<?php echo e($building->id ?? ''); ?>]</b></td>
                                            <td><?php echo e($floor->name ?? ''); ?> <b>[<?php echo e($floor->id ?? ''); ?>]</b></td>
                                            <td><?php echo e($room->name ?? ''); ?> <b>[<?php echo e($room->id ?? ''); ?>]</b></td>
                                            <td><?php echo e($item->name ?? ''); ?> <b>[<?php echo e($item->id ?? ''); ?>]</b></td>
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
		</div>
	</section>
</div>














   


<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/test/test.blade.php ENDPATH**/ ?>