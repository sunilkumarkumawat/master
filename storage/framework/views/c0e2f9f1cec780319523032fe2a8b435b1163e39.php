 
<?php $__env->startSection('content'); ?>
<?php
$classType = Helper::examPanelClassType();
?>
<div class="content-wrapper">
<section class="content pt-3">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
               <div class="card-header bg-primary">
                  <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp; <?php echo e(__('Fill Marks')); ?> </h3>
                  <div class="card-tools cl-6"> 
                   
                     <a href="<?php echo e(url('examination_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('messages.Back')); ?>  </a> 
                  </div>
               </div>
               <div class="card-body">
                  <form id="quickForm" action="<?php echo e(url('fill_marks')); ?>" method="post"  class="was-validated">
                     <?php echo csrf_field(); ?> 
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label style="color:red;"><?php echo e(__('messages.Class')); ?>*</label>
                              <select class="select2 form-control <?php $__errorArgs = ['class_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="class_type_id" name="class_name" required>
                                 <option value=""><?php echo e(__('messages.Select')); ?></option>
                                 <?php if(!empty($classType)): ?>
                                 <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['class_type_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </select>
                              
                             <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label style="color:red;"><?php echo e(__('messages.Exam Name')); ?>*</label>
                              <select class="select2 form-control <?php $__errorArgs = ['exam_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> exam_id_" id="exam_id" name="exam_id" required >
                                 <option value=""><?php echo e(__('messages.Select')); ?></option>
                               <?php if(!empty($examlist)): ?>
                                      <?php $__currentLoopData = $examlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                      <option value="<?php echo e($item->exam_id ?? ''); ?>" <?php echo e(($item->exam_id == $search['exam_id']) ? 'selected' : ''); ?>><?php echo e($item->exam_name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                               
                              </select>
                                 <div class="invalid-feedback">Please fill out this field.</div>
                           </div>
                        </div>
                     
                        <div class="col-md-1 col-6">
                           <label for="" class="text-white">Search</label>
                           <button type="submit" class="btn btn-primary"><?php echo e(__('messages.Search')); ?></button>
                        </div>
                     </div>
                  </form>
                  
                  
                  
                  
                  <?php if(!empty($data1)): ?>    
                  
                
                  <div class="row m-2">
                     <div class="col-12">
                        <form action=<?php echo e(url('fill_marks_submit')); ?> method="post">
                           <?php echo csrf_field(); ?>
                            <div class="card card-outline card-orange">
   <div class="card-header border-transparent bg-primary">
      <div class="card-tools">
         <button type="button" class="btn btn-primary btn-tool" data-card-widget="collapse">
         <i class="fa fa-minus"></i>
         </button>
      </div>
   </div>
   <div class="card-body p-0" style="display: block;">
      <div class="table-responsive">
         <table class="table table-bordered table-striped dataTable dtr-inline">
                            <thead class="bg-primary">
                                <tr>
                                    <th>S No</th>
                                    <th>Subject Name</th>
                                    <th>Maximum Marks</th>
                                    <th>Minimum Marks</th>
                                    <!--<th>Marks Add in Total</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                 
                                <?php if($data1->count() != 0): ?>
                                 <?php if(!empty($data1)): ?> 
                                 <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->other_subject == 0): ?>
                                 <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                        <?php if($item->sub_name != ''): ?>
                                        <?php echo e($item->sub_name ?? ''); ?>

                                        
                                        <?php else: ?> 
                                        <?php echo e($item->name ?? ''); ?>

                                        <?php endif; ?>
                                        </td>
                                    <td>
                                     
                                     <?php
                                     
                                     $old_value = DB::table('fill_min_max_marks')
                                     ->where('exam_id', $search['exam_id'] ?? '')
                                     ->where('class_type_id',$search['class_type_id'] ?? '')
                                     ->where('subject_id',$item->id ?? '')
                                     ->where('branch_id',Session::get('branch_id'))
                                     ->where('session_id',Session::get('session_id'))
                                     ->whereNull('deleted_at')->first();
                                     
                                   
                                     ?>
                                     
                                     
                                       <?php if(!empty($old_value)): ?>
                                               <input type='hidden' name='fill_min_max_marks_id[]' value='<?php echo e($old_value->id ?? ''); ?>'/>
                                                 <?php else: ?>
                                                 <input type='hidden' name='fill_min_max_marks_id[]' value=''/>
                                              
                                            <?php endif; ?>
                                     
                                   <input type="hidden" name="subject_id[]" value="<?php echo e($item->id ?? ''); ?>" class="form-control" >
                                      
                                       <input type="text" name="exam_maximum_marks[]"  value="<?php echo e($old_value->exam_maximum_marks ?? 100); ?>" class="form-control validate_subject_<?php echo e($item->id ?? ''); ?>" >
                                    </td>
                                    <td> <input type="text" name="exam_minimum_marks[]"  value="<?php echo e($old_value->exam_minimum_marks ?? 30); ?>" class="form-control"></td>
                                   
                                 </tr>
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                                 <?php else: ?>
                                 <tr>
                                    <td class="text-center" colspan="12">No Data Found</td>
                                </tr>
                                <?php endif; ?> 
                                 <input type="hidden" value="<?php echo e($search['exam_id'] ?? ''); ?>" name="exam_id">
                                 <input type="hidden" value="<?php echo e($search['class_type_id'] ?? ''); ?>" name="class_type_id">
                              </tbody>
         </table>
      </div>
   </div>
</div>


 
                 
                     <div class="col-12">
                         
                         <span class='text-danger'>Note: - [T]-Trival,  [AB]-Absent,  [M]-Medical,  [JL]-Join Late,  [F]-Fail</span>
                         
                         </div>
                      
                           <div class="col-12 mt-3">
                               <div class="card card-outline card-orange">
   <div class="card-header border-transparent bg-primary">
      <div class="card-tools mb-1">
         <button type="button" class="btn btn-primary btn-tool" data-card-widget="collapse">
         <i class="fa fa-minus"></i>
         </button>
      </div>
   </div>
   <div class="card-body p-0" style="display: block;">
      <div class="table-responsive">
         <table class="table table-bordered table-striped m-0">
                                 <thead class="bg-primary"> 
                                    <tr>
                                       <th>S No</th>
                                       <th>Adm Number</th>
                                       <th>Student's Name</th>
                                       <th>Father's Name</th>
                                       <?php
                                       $count =0;
                                       ?>
                                       <?php if(!empty($data1)): ?> 
                                       <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($item->other_subject == 0): ?>
                                       <th style="text-transform: capitalize;"><?php if($item->sub_name != ''): ?>
                                        <?php echo e($item->sub_name ?? ''); ?>

                                        
                                        <?php else: ?>
                                        <?php echo e($item->name ?? ''); ?>

                                        <?php endif; ?></th>
                                        
                                        <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                                    </tr>
                                 </thead>
                              
                                 <tbody>
                                     <?php if($data2->count() != 0): ?>
                                    <!--<input type="text" value="<?php echo e($count ?? ''); ?>" name="sub_count" />-->
                                    <?php if(!empty($data2)): ?> 
                                  
                                    <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td><?php echo e($key+1 ?? ""); ?></td>
                                       <td><?php echo e($item->admissionNo ?? ""); ?></td>
                                       <td><?php echo e($item->first_name ?? ""); ?> <?php echo e($item->last_name ?? ""); ?></td>
                                       <td><?php echo e($item->father_name ?? ""); ?></td>
                                       <input type="hidden" name="admission_id[]" value="<?php echo e($item->id ?? ""); ?>"  class="form-control"  style="width:100px">
                                      <?php if(!empty($data1)): ?> 
                                       <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <?php
                                    
                                         $old_marks = DB::table('fill_marks')
                                     ->where('exam_id', $search['exam_id'] ?? '')
                                     ->where('admission_id',$item->id)
                                      ->where('subject_id',$item1->id ?? '')
                                     ->where('branch_id',Session::get('branch_id'))
                                     ->where('session_id',Session::get('session_id'))
                                     ->whereNull('deleted_at')->first();
                                        ?>
                                   
                                            
                                             <?php
                                            $stream = [];
                                           
                                          
                                           if($classOrderBy > 10)
                                           {
                                           $stream  = explode(",", $item->stream_subject ?? '');
                                           }
                                            
                                            ?>

                                            <?php if(!empty($old_marks)): ?>
                                               <input type='hidden' name='fill_marks_id[]' value='<?php echo e($old_marks->id ?? ''); ?>'/>
                                               <?php else: ?>
                                                 <input type='hidden' name='fill_marks_id[]' value=''/>
                                              
                                            <?php endif; ?>
                                            
                                            
                                             <?php if($classOrderBy > 10): ?>
                                         <?php if(in_array($item1->id, $stream) ): ?>
                                           <?php if($item1->other_subject == 0): ?>
                                           <td>
                                            <input type='text' name='student_marks[]' value='<?php echo e($old_marks->student_marks ?? ''); ?>' class='marks_subject' data-subject_id='<?php echo e($item1->id ?? ""); ?>'/>
                                             <input type='hidden' name='check_null[]' value='<?php echo e($old_marks->student_marks ?? null); ?>'/>
                                        <input type='hidden' name='subject_id_fill[]' value='<?php echo e($item1->id ?? ''); ?>'/>
                                        </td>
                                        <?php endif; ?>
                                         <?php else: ?>
                                           <?php if($item1->other_subject == 0): ?>
                                           <td>
                                         <input type='text' name='student_marks[]' value='<?php echo e($old_marks->student_marks ?? ''); ?>' placeholder='Not Assigned' readonly/>
                                          <input type='hidden' name='check_null[]' value='<?php echo e($old_marks->student_marks ?? null); ?>'/>
                                        <input type='hidden' name='subject_id_fill[]' value='<?php echo e($item1->id ?? ''); ?>'/>
                                        </td>
                                        <?php endif; ?>
                                         <?php endif; ?>
                                         
                                         <?php else: ?>
                                          <?php if($item1->other_subject == 0): ?>
                                               <td>
                                           <input type='text' name='student_marks[]' value='<?php echo e($old_marks->student_marks ?? ''); ?>' class='marks_subject' data-subject_id='<?php echo e($item1->id ?? ""); ?>' />
                                         <input type='hidden' name='check_null[]' value='<?php echo e($old_marks->student_marks ?? null); ?>'/>
                                        <input type='hidden' name='subject_id_fill[]' value='<?php echo e($item1->id ?? ''); ?>'/>
                                               
                                       </td>
                                        <?php else: ?>
                                     
                                         <?php endif; ?>
                                         <?php endif; ?>
                                         

                                      
                                        
                                     
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    
                                    <tr >
                                       <td colspan="30">
                                          <center><input type="submit" name="finish" value="Submit" class=" m-3 btn btn-primary"></center>
                                       </td>
                                    </tr>
                                    <?php else: ?>
                                     <tr>
                                        <td class="text-center" colspan="12">No Data Found</td>
                                    </tr>
                                    <?php endif; ?>
                                 </tbody>
                              </table>
      </div>
   </div>
</div>
                              
                           </div>
                        </form>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
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
            <h4 class="modal-title text-white"><?php echo e(__('messages.Delete Confirmation')); ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
         </div>
         <!-- Modal body -->
         <form action="<?php echo e(url('delete_exam_result')); ?>" method="post">
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

<script>



$(document).ready(function(){
    
 $('.marks_subject').on('blur', function(e){

    var id = $(this).data('subject_id');
    var marks = $(this).val();
    var validate_from = $(".validate_subject_" + id).val();

    var allowedChars = /^(\d+(\.\d+)?|T|AB|M|JL|F)?$/i;

    if (marks !== "" && !allowedChars.test(marks)) {
        toastr.error('Invalid input. Only numbers, floats, T, AB, M, JL, F, or empty value are allowed.');
        $(this).val('');
        return;
    }

    if (marks !== "" && !isNaN(parseFloat(marks)) && parseFloat(marks) > parseFloat(validate_from)) {
        toastr.error('Number is greater than maximum marks');
        $(this).val('');
    }

});
        $('#class_type_id').on('change', function(e){
            
                $("#stream_id").val("");
                $("#stream_subject").html("");
                $("#stream_id_div").css("display","none");
                $("#stream_subject_div").css("display","none");
                
                $(".div_stream_id_").css("display","none");
                $(".div_subject_id").css("display","block");
                $('#subject_id').prop('required',true);
                $('#stream_subject_id').prop('required',false);
                $('#stream_subject_id').val('')
                $('#stream_id_').prop('required',false);
                $('#stream_id_').val('');

                var baseurl = "<?php echo e(url('/')); ?>";
            	var class_type_id = $(this).val();
            	  
                $.ajax({
                    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            	    url: baseurl + '/examData/' + class_type_id,
            	    success: function(data){
    	         	    $("#exam_id").html(data);
            	    }
            	});
        });       
        
        $('.numbers').keyup(function(){
  if ($(this).val() > 100){
      window.toastr.options = {
          "toastClass": "toast-success-create-campaign",
          "closeButton": false,
          "debug": false,
          "newestOnTop": true,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "onclick": null,
          "showDuration": "100",
          "hideDuration": "100",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut",
          "maxOpened":1,
          "preventOpenDuplicates": true
}
     toastr.error("No numbers above 100");
    $(this).val('100');
  }
});
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/examination/offline_exam/fill_mark/fill_marks.blade.php ENDPATH**/ ?>