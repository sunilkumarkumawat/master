<?php $getCountry = Helper::getCountry(); $getState = Helper::getState(); $getCity = Helper::getCity(); ?>  <?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 pr-0">
                    <div class="card card-outline card-orange mr-1">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp;<?php echo e(__("master.Add Class Periods Time")); ?></h3>
                        </div>

                        <form id="quickForm" action="<?php echo e(url('time_periods')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row m-2">
                             
                                <div class="col-md-12">
                                    <label class="text-danger"><?php echo e(__('master.From Time')); ?>*</label>
                                    <input type="time" class="form-control <?php $__errorArgs = ['from_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)"
                                        id="from_time"
                                        name="from_time"
                                       
                                        value="<?php echo e(old('from_time')); ?>"
                                    />
                                    <?php $__errorArgs = ['from_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row m-2">
                             
                                <div class="col-md-12">
                                    <label class="text-danger"><?php echo e(__('master.To Time')); ?>*</label>
                                    <input type="time" class="form-control <?php $__errorArgs = ['to_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeydown="return /[a-zA-Z ]/i.test(event.key)"
                                        id="to_time"
                                        name="to_time"
                                       
                                        value="<?php echo e(old('to_time')); ?>"
                                    />
                                    <?php $__errorArgs = ['to_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="row m-2">
                                <div class="col-md-12 text-center"><button type="submit" class="btn btn-primary" onclick="timeCheck()"><?php echo e(__('common.submit')); ?></button><br /></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8 pl-0">
                    <div class="card card-outline card-orange ml-1">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp;<?php echo e(__('master.View Class Periods')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('master_dashboard')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                            </div>
                        </div>
                
                            <div class="col-md-12 p-3">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead class="bg-primary">
                                        <tr role="row">
                                            <th><?php echo e(__('master.Period.No.')); ?></th>
                                            <th><?php echo e(__('master.From Time')); ?></th>
                                            <th><?php echo e(__('master.To Time')); ?></th>
                                         
                                            <th><?php echo e(__('master.Edit/Delete')); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if(!empty($data)): ?> 
                                        <?php $i=1 
                                        ?> 
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                          
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e(date("H:i", strtotime($item['from_time']))); ?></td>
                                            <td><?php echo e(date("H:i", strtotime($item['to_time']))); ?></td>
                                           
                                            <td>
                                           <a href="<?php echo e(url('edit_periods')); ?>/<?php echo e($item['id'] ?? ''); ?>" class="btn btn-primary  btn-xs" title="Edit" ><i class="fa fa-edit"></i></a> 
                                              <a href="javascript:;" data-id='<?php echo e($item['id']); ?>' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger btn-xs ml-3" title="Delete"><i class="fa fa-trash-o"></i></a>
                                              </td>
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
            <form action="<?php echo e(url('delete_periods')); ?>" method="post">
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


<script>

$("#quickForm").submit(function(e){
     
  

  var element = document.getElementById("from_time").value;
  var element1 = document.getElementById("to_time").value;
  
  if (element == "") {
  alert("Please Enter Time");
    return false;  
  }

  else {
  
 
 
  // get input time
  var time = element.split(":");
  var hour = time[0];
  if(hour == '00') {hour = 24}
  var min = time[1];
  
   var inputTime = hour+"."+min;
  
  var time1 = element1.split(":");
  var hour1 = time1[0];
  if(hour1 == '00') {hour1 = 24}
  var min1 = time1[1];
  
  var inputTime1 = hour1+"."+min1;
 
  
  var totalTime = inputTime1 - inputTime;
  
 
  if ((Math.abs(totalTime)) > 0.29000000000000004) {
  
  } 
  else {
   
      e.preventDefault();
    alert("Less Time");
  }
    }
  });
   
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/periods/add.blade.php ENDPATH**/ ?>