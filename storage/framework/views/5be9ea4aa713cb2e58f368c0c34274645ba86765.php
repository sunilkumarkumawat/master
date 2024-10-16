<?php
$classType = Helper::classType();
$getState = Helper::getState();
$getcitie = Helper::getCity();
$getPermission = Helper::getPermission();
$getCountry = Helper::getCountry();
$getMonths = Helper::getMonth();
?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-outline card-orange">
            <div class="card-header bg-primary flex_items_toggel">
              <h3 class="card-title"><i class="fa fa-calendar"></i> &nbsp;<?php echo e(__('View Weekend Calendar')); ?></h3>
              <div class="card-tools">
                <a href="<?php echo e(url('add_weekend')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><span class="Display_none_mobile"><?php echo e(__('common.Add')); ?> </span></a>
                <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><span class="Display_none_mobile"><?php echo e(__('common.Back')); ?> </span></a>
              </div>

            </div>


              <form id="quickForm" action="<?php echo e(url('view_weekend')); ?>" method="post">
							<?php echo csrf_field(); ?>

							<div class="row m-2">								
								<div class="col-md-2">
									<div class="form-group">
										<label><?php echo e(__('Month Type')); ?></label>
										<select class="form-control select2 " id="month_id" name="month_id">
										     <option value="">All</option>
											<?php if(!empty($getMonths)): ?>
                                                <?php $__currentLoopData = $getMonths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($month->id ?? ''); ?>" <?php echo e(($month->id == $search['month_id']) ? 'selected' : ''); ?>><?php echo e($month->name ?? ''); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
										</select>
									</div>
								</div>
								
								
								<div class="col-md-1 ">
									<div class="form-group">
										<label class="text-white"><?php echo e(__('common.Search')); ?></label>
										<button type="submit" class="btn btn-primary"><?php echo e(__('common.Search')); ?></button>
									</div>
								</div>

							</div>
						</form>       

                <div class="row m-2">
              <div class="col-12" style="overflow-x:scroll;">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead class="bg-primary">
                    <tr role="row">
                      <th><?php echo e(__('common.SR.NO')); ?></th>
                    <th><?php echo e(__('Date')); ?></th>
                        <th><?php echo e(__('Day')); ?></th>
                      <th><?php echo e(__('Month')); ?></th>
                      <!--<th><?php echo e(__('Special Day')); ?></th>-->
                      <th><?php echo e(__('Event/Schedule')); ?></th>
                   
                    
                      <th><?php echo e(__('Attendance Status')); ?></th>
                      <th><?php echo e(__('common.Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody id="product_list_show">

                    <?php if(count($data) != 0): ?>
                    <?php
                    $i=1;
                    ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($i++); ?></td>
                      <td><?php echo e(date('d-m-Y', strtotime($item['date'])) ?? ''); ?></td>
                                            <td><?php echo e($item['day'] ?? '-'); ?></td>
                      <td style="cursor:pointer;"><?php echo e($item['month_name'] ?? ''); ?></td>
                      <!--<td style="cursor:pointer;"><?php echo e($item['special_day'] ?? ''); ?></td>-->
                      <td><?php echo e($item['event_schedule'] ?? '-'); ?></td>
                     

                      <td><?php echo e($item['attendance_status'] ?? '-'); ?></td>
           

                      <td>
                        <?php if($getPermission->deletes == 1): ?>
                        
                        <?php
    $eventDate = isset($item['date']) ? strtotime($item['date']) : null;
    $today = strtotime(date('Y-m-d'));
?>

<?php if($eventDate && $eventDate > $today): ?>
   <a href="<?php echo e(url('edit_weekend')); ?>/<?php echo e($item->id); ?>" target='_blank' ><i class="fa fa-edit text-primary"></i></a>
   <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData" title="Admission Delete"><i class="fa fa-trash-o text-danger"></i></a>
                     
<?php endif; ?>
                          <?php endif; ?>    
                       
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td colspan="12" class="text-center pt-2">
                            <a href="<?php echo e(url('print_weekend')); ?>/<?php echo e($search['month_id']); ?>" target="_blank">
                                <button class="btn btn-primary">
                                    <i class="fa fa-print"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <td colspan="12" class="text-center pt-2">
                            <p>No Data Found</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>

            </div>
            </div>
            </div>
            </div>
            </section>
    </div>

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
                  <form action="<?php echo e(url('weekend_delete')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                      <input type="hidden" id="delete_id" name=delete_id>
                      <h5 class="text-white">Are you sure you want to delete ?</h5>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
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
        
            <script>
              $('.deleteData').click(function() {
                var delete_id = $(this).data('id');

                $('#delete_id').val(delete_id);
              });
              
                $('.profileImg').click(function(){
                    var profileImgUrl = $(this).data('img');
                    if(profileImgUrl != ''){
                        $('#profileImgModal').modal('toggle');
                        $('#profileImg').attr('src',profileImgUrl);
                    }
                });
                
                
                
                $( document ).ready(function() {
    $("#studentList").DataTable({
                  "lengthChange": false, "autoWidth": false,"lengthChange": true, // Default number of rows per page
                "lengthMenu": [10, 20, 50,100] ,
                 "buttons": ["copy", "csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#studentList_wrapper .col-md-6:eq(0)');
});
             
    	function SearchValue() {
		var basurl = "<?php echo e(url('/')); ?>";
		var month_type = $('#month_type :selected').val();
		if (class_search_id > 0 ) {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: basurl + '/weekendSearch',
				data: {
					month_type: month_type
				},
				//dataType: 'json',
				success: function(data) {
                    $('.student_list_show').addClass('fadeinout');
					$('.student_list_show').html(data);
                    setTimeout(function() {
                         $('.student_list_show').removeClass('fadeinout');
                    }, 2000);
				}
			});
		} else {
			toastr.error('Please put a value in one column !');
		}
	};          
            </script>
            <style>
                .profileImg {
                    width:50px;
                    height:50px;
                    border-radius:50%;
                }
              .card-header .nav-pills .nav-link {
                color: #db5b06;
              }
            </style>
            
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/Weekendcalendar/view.blade.php ENDPATH**/ ?>