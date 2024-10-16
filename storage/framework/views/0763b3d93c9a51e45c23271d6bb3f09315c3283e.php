<?php
   $classType = Helper::examPanelClassType();
?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary flex_items_toggel">
                    <h3 class="card-title"><i class="nav-icon fas fa fa-leanpub"></i> &nbsp; <?php echo e(__('Marksheet Generate')); ?></h3>
                    <div class="card-tools">
                    <a href="<?php echo e(url('examination_dashboard')); ?>" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('messages.Back')); ?> </span> </a>
                    </div>
                   
                    </div>        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="marksheet_text">Marksheet</p>
                                </div>
                                <div class="col-md-6">
                                    <form id="search_class_type" action="<?php echo e(url('bulk_marksheet')); ?>" method="post" >
                                                <?php echo csrf_field(); ?>
                                         			<div class="form-group">
                                    		
                                    				<select class="form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="class_type_id_submit" name="class_type_id" value="<?php echo e(old('class_type_id')); ?>">
                                                    <option value="" ><?php echo e(__('messages.Select')); ?></option>
                                                     <?php if(!empty($classType)): ?> 
                                                          <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                             <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(($type->id == $search['class_type_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                                      
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
                                    		       </form>
                                </div>
                                
                                <hr>
                                
                                <?php if( !empty($exam)): ?>
                                <div class="col-md-12">
                                    <form action="<?php echo e(url('bulk_marksheet_generate')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden"value="<?php echo e($search['class_type_id'] ?? ''); ?>" name="class_type_id"/>
                                        <div class="col-md-12 mb-3">
                                            <span class="text-danger">Note: System auto convert marks to grade.</span>
                                            <br>
                                            <span class="notes_green mt-3">Select Subjects for grade - </span>
                                        </div>
                                
                                        <div class="row">
                                            <?php $__currentLoopData = $subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 col-12 mt-2">
                                                <div class="row">
                                                    <div class="col-md-6 col-6">
                                                    <input type="checkbox" value="<?php echo e($item->id ?? ''); ?>" name="subjects[]" class="checkbox"/> <?php echo e($item->name ?? ''); ?> 
                                                    </div>
                                                
                                                    <div class="col-md-6 col-6">
                                                        <input class="w-50 checkbox_<?php echo e($item->id ?? ''); ?> box1"type="text"  disabled="true" name="subject_array[<?php echo e($item->id ?? ''); ?>]"  required  value="<?php echo e($item->sort_by ?? ''); ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                
                                        <div class="col-md-12 mt-3">
                                            <span class="text-success">Select Exam - </span>
                                        </div>
                                
                                <?php if(!empty($exam)): ?>
                                <div class="row">
                                <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mt-2">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <input type="checkbox" value="<?php echo e($item->exam_id ?? ''); ?>" name="exam[]" class="checkbox1"/> <?php echo e($item->exam_name ?? ''); ?> 
                                        </div>
                                    
                                        <div class="col-md-6 col-6">
                                            <input class="w-50 checkbox1_<?php echo e($item->exam_id ?? ''); ?>  box2"  type="text" disabled="true"  name="exam_array[<?php echo e($item->exam_id ?? ''); ?>]"  required/>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                               <?php if(isset($exam)): ?> 
                               <hr>
                               <div class="row">
                                <div class="col-md-4 text-center mt-3 d-flex">
                              <b> Select Student :  &nbsp;&nbsp;</b>
                                <select class="select2" name="single_student">
                                       <?php if(!empty($student_list)): ?> 
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $student_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <option value="<?php echo e($item->admissionNo ?? ''); ?>"><?php echo e($item->first_name ?? ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                  </div>
                                <div class="col-md-3 text-right mt-3">
                                     <!--<b>With Grade System :    </b> <input type="checkbox" value="1" class=" mt-1"name="make_grade"/>  -->
                                  </div>
                                <div class="col-md-5 text-left mt-3">
                                  <button class="btn btn-primary" id="gen_id_1" style="visibility:hidden">Generate Marksheet</button>
                                  <button type="button" id="gen_id"class="btn btn-primary">Generate Marksheet</button>
                                  
                                </div>
                                </div>
                             <?php endif; ?>
                                    </form>
                                </div>
                                <?php endif; ?>
                                
                            </div>
                        </div> 
                </div>
        </div>
</div>
</section>
</div>
<script type="text/javascript">

var count =0;
$("#class_type_id_submit").change(function(){
$('#search_class_type').submit();
}); 
$(".checkbox").click(function(){
       var value = $(this).val();
  if ($(this).is(":checked")) {

     $('.checkbox_'+value).prop( "disabled", false );
    }
    else{
          $('.checkbox_'+value).prop( "disabled", true );
    }
}); 
$(".checkbox1").click(function(){
       var value = $(this).val();

  if ($(this).is(":checked")) {

     $('.checkbox1_'+value).prop( "disabled", false );
    }
    else{
          $('.checkbox1_'+value).prop( "disabled", true );
    }
}); 


$("#gen_id").click(function(){
    count =0;
    count1 =0;
    $( ".box1" ).each(function( index ) {
 if($(this).val() != '')
 {
     count++;
 }
});
  
    $( ".box2" ).each(function( index ) {
 if($(this).val() != '')
 {
     count1++;
 }
});
  
 if(count > 0 && count1 > 0)
 {
     $('#gen_id_1').trigger('click');
 }
 else
 {
     toastr.error("Please Select atleast one subject and one exam")
 }
});   
    
    

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/examination/offline_exam/bulk_marksheet/bulk_marksheet.blade.php ENDPATH**/ ?>