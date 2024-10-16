<?php
  $classType = Helper::examPanelClassType();
  $getsubject = Helper::getSubject();
?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary flex_items_toggel">
                    <h3 class="card-title"><i class="nav-icon fas fa fa-tag"></i> &nbsp;Edit :: <?php echo e($data->name ?? ''); ?> </h3>
                    <div class="card-tools">
                    <a href="<?php echo e(url('view/exam')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('messages.Back')); ?></span>  </a>
                    </div>
                    
                    </div>        
                    <form id="quickForm" action="<?php echo e(url('assign/exam')); ?>/<?php echo e($data->id ?? ''); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row m-2">
    
                           <div class="col-md-3 col-6">
                			<div class="form-group">
                				<label style="color:red;"><?php echo e(__('messages.Class')); ?>*</label>
                				<select class="form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="class_type_id" name="class_type_id" value="<?php echo e(old('class_type_id')); ?>">
                                <option value="" ><?php echo e(__('messages.Select')); ?></option>
                                 <?php if(!empty($classType)): ?> 
                                      <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == old('class_type_id')) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                                 <?php $__errorArgs = ['class_type_id'];
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
                		   
                      
                		   <div class="col-md-3 col-6">
        		                <lable class="Display_none_mobile">&nbsp;</lable><br>
        		                <input type="hidden" name="id" value="<?php echo e($data->id ?? ''); ?>" />
                                <button type="submit" class="btn btn-primary "><?php echo e(__('examination.Assign')); ?></button>
                           </div>
    		            </div>
                    </form>

                <div class="row m-3 pb-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Sr No.</td>
                                <td>Class</td>
                                <td>Result Declaration Date</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($AssignExam)): ?>
                            <?php
                            $i = 1;
                            ?>
                            <?php $__currentLoopData = $AssignExam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($item->class_name); ?></td>
                                <!--<td><?php echo e($item->result_declaration_date); ?></td>-->
                                    <!--<?php echo e(date('d-M-Y', strtotime($item['result_declaration_date'])) ?? ''); ?>-->
                                <td  class="myBtn  editable" style="cursor:pointer;" data-id="<?php echo e($item->id ?? ''); ?>"data-field='result_declaration_date' data-modal='exam\AssignExam'>
                                    <?php echo e($item['result_declaration_date'] ?? ''); ?>

                                </td>
                                

                               
                                <td>
                                    <button type="button" class="btn btn-danger deleteAssign" data-assign_id="<?php echo e($item->id ?? ''); ?>" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="modal fade" id="deleteModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Conformation</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="<?php echo e(url('assign/delete/exam')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                            <div class="modal-body">
                            <input type="hidden" id="exam_id" name="exam_id" value="<?php echo e($data->id ?? ''); ?>">
                            <input type="hidden" id="assign_id" name="assign_id">
                             Are You Sure ?
                            </div>
                            
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Sumbit</button>
                            </div>
                            </form>
        
                            </div>
                        </div>
                    </div>
</div>
</div>
</div>
</div>
</section>
</div>




<script>
    $(document).ready(function(){
        $('.deleteAssign').click(function(){
           var assign_id = $(this).data('assign_id');
           $('#assign_id').val(assign_id);
        });
    })
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/examination/offline_exam/exam/assign.blade.php ENDPATH**/ ?>