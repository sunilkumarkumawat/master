<?php
  $classType = Helper::classType();
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                    <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-bus"></i> &nbsp; <?php echo e(__('bus.Student Bus assign view')); ?></h3>
                    <div class="card-tools">
                        <?php if(Session::get('role_id') !== 3): ?>
                    <a href="<?php echo e(url('assignBusRoute')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i><?php echo e(__('messages.Add')); ?>  </a>
                    <a href="<?php echo e(url('busDashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?></a>
                    <?php endif; ?>
                    </div>
                    
                    </div>                          
                        <div class="card-body">
                            
                 
                            <table id="example1" class="table table-bordered table-striped  dataTable dtr-inline w-100">
                                <thead class="bg-primary">
                                    <tr role="row">
                                      <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                      <th><?php echo e(__('bus.Bus')); ?></th>
                                      <th><?php echo e(__('bus.Bus No.')); ?></th>
                                      <th><?php echo e(__('bus.Bus Driver')); ?></th>
                                      <th><?php echo e(__('bus.Driver Mobile No')); ?></th>
                                      <!--<th>Student Name</th>-->
                                      <th><?php echo e(__('messages.Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($data)): ?>
                                    <?php
                                       $i=1;
                                       //dd($data);
                                    ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <input  type="hidden" class="form-control" id="name_<?php echo e($item->id); ?>" value="<?php echo e($item['busId']['name']); ?>">
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($item['busId']['name'] ?? ''); ?></td>
                                        <td><?php echo e($item['busId']['bus_no'] ?? ''); ?></td>
                                        <td><?php echo e($item['busId']['bus_owmer_name'] ?? ''); ?></td>
                                        <td><?php echo e($item['busId']['owner_no'] ?? ''); ?></td>
                                        <td class="d-flex">
                                        <?php if(Session::get('role_id') == 3): ?>
                                            <a href="javascript:;" data-id="<?php echo e($item['id'] ?? ''); ?>" data-bus_name="<?php echo e($item['busId']['name'] ?? ''); ?>" data-company="<?php echo e($item['busId']['bus_company'] ?? ''); ?>" data-modal="<?php echo e($item['busId']['bus_model_no'] ?? ''); ?>"
                                            data-bus_no="<?php echo e($item['busId']['bus_no'] ?? ''); ?>" data-driver_name="<?php echo e($item['busId']['bus_owmer_name'] ?? ''); ?>" data-driver_mobile="<?php echo e($item['busId']['owner_no'] ?? ''); ?>" data-capacity="<?php echo e($item['busId']['capacity_bus'] ?? ''); ?>"
                                            data-bs-toggle="modal" data-bs-target="#myModal"  class="btn btn-primary btn-xs viewBus" title="View Bus Detail"><i class="fa fa-navicon"></i></a>
                                        <?php else: ?>
                                            <a href="javascript:;" data-id="<?php echo e($item['id'] ?? ''); ?>" data-bs-toggle="modal" data-bs-target="#myModal"  class="btn btn-primary btn-xs viewBus mr-3" title="View Bus Detail"><i class="fa fa-navicon"></i></a>
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

<!--<script>
  $('.viewBus').click(function() {
  var bus_name = $(this).data('bus_name');
  var bus_owmer_name = $(this).data('id');


  $('#bus_name').html(bus_name);
  $('#bus_owmer_name').html(bus_owmer_name);

  } );
</script>-->
<script>
function deleteData(){
  var delete_id = $(".deleteData").data('id'); 
  $('#delete_id').val(delete_id); 
}
 </script>
 
<div class="modal fade mt-5" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                
                <h4><?php echo e(__('bus.Bus Details')); ?><span class="FeesGroup_name"></span> <span class="FeesType_name"></span></h4>   
                      <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">x</button>
            </div>
    
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        
                        <p><?php echo e(__('bus.Bus Name')); ?>: <b id="bus_name"> <?php echo e($item['busId']['name'] ?? ''); ?></b></p>
                        <p><?php echo e(__('bus.Bus Model No.')); ?>:<b> <?php echo e($item['busId']['bus_model_no'] ?? ''); ?></b></p>
                        <p><?php echo e(__('bus.Driver Name')); ?>: <b id="bus_owmer_name"> <?php echo e($item['busId']['bus_owmer_name'] ?? ''); ?></b></p>
                        <p><?php echo e(__('bus.Bus Capacity')); ?>:<b> <?php echo e($item['busId']['capacity_bus'] ?? ''); ?></b></p>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo e(__('bus.Bus Company')); ?>:<b> <?php echo e($item['busId']['bus_company'] ?? ''); ?></b></p>
                        <p><?php echo e(__('bus.Bus No.')); ?>:<b> <?php echo e($item['busId']['bus_no'] ?? ''); ?></b></p>
                        <p><?php echo e(__('bus.Driver Mobile No')); ?>:<b> <?php echo e($item['busId']['owner_no'] ?? ''); ?></b></p>
                    </div>                
                </div>
                <div class="row">
                            <table id="example1" class="table table-bordered table-striped  dataTable dtr-inline w-100">
                                <thead>
                                    <tr role="row">
                                      <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                      <th><?php echo e(__('messages.Ad. No.')); ?></th>
                                      <th><?php echo e(__('Student Name')); ?></th>
                                      <th>Class</th>
                                      <th><?php echo e(__('messages.Mobile')); ?></th>
                          <?php if(Session::get('role_id') == 1): ?>
                                      <th><?php echo e(__('messages.Action')); ?></th>
                             <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <form action="<?php echo e(url('busLateMessage')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                            <?php if(!empty($stulistbus)): ?>
                                            <?php
                                               $i=1;
                                            ?>
                                            <?php $__currentLoopData = $stulistbus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                                <input type="hidden" name="admission_id[]" id="admission_id" value="<?php echo e($item->admission_id ?? ''); ?>">
                                                <input  type="hidden" class="form-control" id="name_<?php echo e($item->id); ?>" value="<?php echo e($item['busId']['name']); ?>">
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($item['admissionNo'] ?? ''); ?></td>
                                                <td><?php echo e($item['first_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['class_name'] ?? ''); ?></td>
                                                <td><?php echo e($item['studentId']['mobile'] ?? ''); ?></td>
                                               <?php if(Session::get('role_id') == 1): ?>
                                                <td>
                                                    <a href="<?php echo e(url('busAssignEdit')); ?>/<?php echo e($item['id'] ?? ''); ?>"class=" btn btn-primary btn-xs ml-3" title="Edit Assigned Bus"><i class="fa fa-edit"></i></a>
                                                    <a href="javascript:;" data-id='<?php echo e($item->id); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" onClick="deleteData()" class="deleteData btn btn-danger  btn-xs ml-3" title="Delete Assigned Bus"><i class="fa fa-trash"></i></a>      
                                                </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            
                                            
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-success btn-xs "><i class="fa fa-whatsapp"></i> Send Bus Late Message</button>
                                                </div>

                                    </form>
                                </tbody>
                            </table>                    
                </div>
            </div>
        
            <div class="modal-footer">
              <button type="button" class="btn btn-primary waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        

  
<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <div class="modal-header">
        <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="bus_assign_delete" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">

              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('messages.Are you sure you want to delete')); ?>  ?</h5>
           
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/bus/studentBusView.blade.php ENDPATH**/ ?>