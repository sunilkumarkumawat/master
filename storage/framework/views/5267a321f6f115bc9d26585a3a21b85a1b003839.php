 
<?php $__env->startSection('content'); ?>
<?php

$classType = Helper::examPanelClassType();
$setting = Helper::getSetting();
$studentexamview = Helper::studentexamview();
?>
<div class="content-wrapper">
<section class="content pt-3">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
               <div class="card-header bg-primary">
                  <h3 class="card-title"><i class="fa fa-leanpub"></i> &nbsp; Download Admit Card </h3>
                  <div class="card-tools d-flex align-item-center"> 
                     <a href="<?php echo e(url('examination_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('messages.Back')); ?>  </a> 
                  </div>
               </div>
               <div class="card-body">
                     <div class="row">
                        <div class='col-md-10'>
                        <form id="quickForm_find" action="<?php echo e(url('download_admit_card')); ?>" method="post">
                             <?php echo csrf_field(); ?> 
                            <div class="row">
                            <div class="col-md-3">
                               <div class="form-group">
                                  <label class="text-danger"><?php echo e(__('messages.Class')); ?>*</label>
                                  <select class="select2 form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="class_type_id" name="class_type_id">
                                     <option value=""><?php echo e(__('messages.Select')); ?></option>
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
                            </div>
                            <div class="col-md-2">
                               <div class="form-group">
                                  <label class="text-danger"><?php echo e(__('messages.Exam Name')); ?>*</label>
                                  <select class="select2 form-control exam_id_" id="exam_id" name="exam_id" >
                                     <option value=""><?php echo e(__('messages.Select')); ?></option>
                                     <?php if(!empty($studentexamview)): ?> 
                                     <?php $__currentLoopData = $studentexamview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id); ?> " <?php echo e(( $type->id == $search['exam_id'] ? 'selected' : '' )); ?>><?php echo e($type->name ?? ''); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                                     <?php $__errorArgs = ['exam_id'];
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
                                  </select>
                               </div>
                            </div>
                            <div class="col-md-1 col-6">
                               <label for="" class="text-white">Search</label>
                               <button type="submit" onClick="checkValidation(event)" class="btn btn-primary"><?php echo e(__('messages.Search')); ?></button>
                            </div>
                            </div>
                        </form>
                        </div>
                     </div>
                     
                    <?php
                  
                  $examination_shedule_id = DB::table('examination_schedules')
                   ->where("class_type_id", $search['class_type_id'] ?? '')
                                         ->where("exam_id", $search['exam_id'])
                                         ->where("session_id", Session::get("session_id"))
                                            ->where("branch_id", Session::get("branch_id"))
                                        ->whereNull('deleted_at')->first();
                                        
                  ?>
                  
                  <?php if(!empty($examination_shedule_id)): ?>
                  <?php if(!empty($data1)): ?>    
                  <div class="row m-2">
                     <div class="col-12">
                        <form id="Form1" action="<?php echo e(url('SubmitAdmitCard')); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <input type="hidden" value="<?php echo e($search['stream_id'] ?? ''); ?>" name="stream_id"/>
                            <div class="card p-0">
                               <div class="card-body p-0" style="display: block;">
                                  <div class="table-responsive">
                                     <table class="table table-bordered dataTable dtr-inline card-orange card-outline">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Admission no.</th>
                                    <th>Name</th>
                                    <th>Mob no.</th>
                                    <th>Father's name</th>
                                    <th>Father's mob no.</th>
                                    <th>Exam roll no.</th>
                                    <th>Admit Card</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $i = 1;
                                 $roll_no_count = 0;
                                ?>
                                <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php
                  
                                $exam_roll_no = DB::table('examination_admit_cards')
                                    ->where("class_type_id", $search['class_type_id'] ?? '')
                                    ->where("exam_id", $search['exam_id'])
                                    ->where("admission_id", $item->id)
                                    ->where("session_id", Session::get("session_id"))
                                    ->where("branch_id", Session::get("branch_id"))
                                    ->whereNull('deleted_at')->first();       
                  ?>
                                <input type="hidden" id="class_type_id" name="class_type_id" value="<?php echo e($item->class_type_id ?? ''); ?>">
                                <input type="hidden" id="exam_id" name="exam_id" value="<?php echo e($exam_id ?? ''); ?>">
                                <input type="hidden" class="form-control" name="admission_id[]" id="admission_id" readonly value="<?php echo e($item->id ?? ''); ?>">
                                <tr>
                                    <td>
                                        <?php if(!empty($exam_roll_no)): ?>
                                        <?php if($exam_roll_no->exam_roll_no != ""): ?>
                                            <input type="checkbox" value="<?php echo e($item->id ?? ''); ?>" name='checked_admission_id[]'class="checkbox_admission" checked/></td>
                                        <?php else: ?>
                                            <?php echo e($i++); ?>

                                        <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e($i++); ?>

                                        <?php endif; ?>
                                    </td>    
                                    <td><?php echo e($item->admissionNo ?? ''); ?></td>
                                    <td>
                                       <?php echo e($item->first_name ?? ''); ?> <?php echo e($item->last_name ?? ''); ?>

                                    </td>  
                                    <td>
                                        <span><?php echo e($item->mobile ?? ''); ?></span>
                                    </td>    
                                    <td>
                                        <span><?php echo e($item->father_name ?? ''); ?></span>
                                    </td>    
                                    <td>
                                        <span><?php echo e($item->father_mobile ?? ''); ?></span>
                                    </td>    
                                    <td>
                                        
                                        <?php
                                        $oldCard = DB::table('examination_admit_cards')
                                         ->where("class_type_id", $item->class_type_id ?? '')
                                         ->where("exam_id", $exam_id)
                                         ->where("admission_id", $item->id)
                                         ->where("session_id", Session::get("session_id"))
                                            ->where("branch_id", Session::get("branch_id"))
                                        ->whereNull('deleted_at')->first();
                                        ?>
                                        
                                        <?php if(!empty($oldCard)): ?>
                                            <input type="hidden" name="exam_admit_card_id[]"  value="<?php echo e($oldCard->id ?? ''); ?>"> 
                                        <?php else: ?>
                                            <input type="hidden" name="exam_admit_card_id[]"  value=""> 
                                        <?php endif; ?>
                                        <span><?php echo e($oldCard->exam_roll_no ?? '-'); ?></span>
                              <td>
                                    <?php if(!empty($exam_roll_no->exam_roll_no)): ?>
                                        <a href="<?php echo e(url('single_exam_admit_card')); ?>/<?php echo e($search['class_type_id'] ?? ''); ?>/<?php echo e($search['exam_id'] ?? ''); ?>/<?php echo e($item->id ?? ''); ?>" target="_blank">
                                             <button form="Form_<?php echo e($key); ?>" type="submit" class="btn btn-primary btn-xs ml-3" title="View/Download">
                                                <i class="fa fa-print"></i> 
                                            </button>
                                        </a>
                                        <?php
                                            $roll_no_count++;
                                        ?>
                                        <?php else: ?>
                                        <a href="<?php echo e(url('add/admit_card')); ?>">
                                             <button type="button" class="btn btn-primary btn-xs ml-3" title="View/Download">
                                                Click here to create exam roll No.
                                            </button>
                                        </a>
                                    <?php endif; ?>    
                              </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            </table>
                                  </div>
                               </div>
                               <?php if($roll_no_count != 0): ?>
                                    <div class="row" >
                                        <div class="col-md-12 mt-3 mb-3 text-center">
                                            <button type="button"  data-class="<?php echo e($search['class_type_id'] ?? ''); ?>" data-exam="<?php echo e($search['exam_id'] ?? ''); ?>" 
                                                data-stream="<?php echo e($search['stream_id'] ?? ''); ?>" id="quickForm_find1" class="btn btn-primary"><i class="fa fa-print" style="font-size: 22px;"></i> </button>
                                        </div>
                                    </div>
                               <?php endif; ?>
                        </form>
                     </div>
                    </div>
                  <?php endif; ?>
                  <?php else: ?>
                  <?php if($search['exam_id'] != ""): ?>
                    <p class="text-center text-danger">Please Create Examination Schedule For This Exam First......</p>
                  <?php endif; ?>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
</section>
</div>

<div class="modal fade" id="noteModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Admit Card Note</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form id="form" action="<?php echo e(url('admit_card_notes')); ?>" method="post" >
        <?php echo csrf_field(); ?> 
        <div class="modal-body">
            <?php
            $notes = Helper::getNote(1);
           
            ?>
            <?php if(!empty($notes)): ?>
          <div class="input-group mb-3">
           <textarea type="text" class="form-control" id="note"name="note" placeholder="Your Note"><?php echo e($notes['note'] ?? ''); ?></textarea>
           <div class="input-group-prepend">
            <!--<div class="input-group-text">-->
            <!--  <input class="" id="status" type="checkbox" <?php echo e(($notes['status'] == 0) ? 'checked' : ''); ?> name="status" value="<?php echo e($notes['status'] ?? '0'); ?>">-->
            <!--</div>-->
          </div>
        </div>
        
        <?php endif; ?>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
<script>

    function checkValidation(event){
        event.preventDefault()
        var classval = $('#class_type_id').val();
        var examVal = $('#exam_id').val();
        if(classval == ""){
           toastr.error('Please select a class ');
        }else if(examVal == ""){
            toastr.error('Please select a exam ');
        }else{
            $('#quickForm_find').trigger('submit');
        }
    }
</script>

<script>

$(document).ready(function(){
 
    
      $(".checkbox_admission").on("change", function(){
          var count =0;
     $(".checkbox_admission").each(function( index ) {
         
            if ($(this).prop("checked")){
                count++;
     
            }
          
          
});
if(count > 0){
               $("#quickForm_find1").show();
          }
          else
          {
                $("#quickForm_find1").hide();
          }
});
     $("#quickForm_find1").on("click", function(){
        var baseurl = "<?php echo e(url('/')); ?>";
        
         var stream= $(this).data('stream') ;
         if(stream == '')
         {
             stream="null";
         }
         var classs = $(this).data('class');
         var exam= $(this).data('exam');
         
         var arr ="";
        $(".checkbox_admission").each(function( index ) {
            if ($(this).prop("checked")){
                arr = arr +","+$(this).val();
        }
});

var myString = arr.substring(1);



window.open(baseurl+'/exam_admit_card/'+exam+"/"+classs+"/"+myString, '_blank');
//   $.ajax({
//                      headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
//                       type:'post',
//             	  url: baseurl+'/exam_admit_card/'+exam+"/"+stream+"/"+classs+""+myString,
//             	   data: {stream_id:stream,class_type_id:classs,exam_id:exam,admission_id:myString},
//             	  success: function(data){
//             			alert('done');
//             	  }
//             	});


     }); 
    
    
 $(".autoIncreament").on("change", function(){
  
    var first_val = parseInt($(this).val())+1;
    

    
     var length = $('.autoIncreament').length;
     
    
    for(var i=1; i<length; i++)
    {
        $('.autoIncreament').eq(i).val(first_val++);
    }
  
}); 

$('#status').change(function(){
    if($(this).is(":checked")){
        $(this).val(1);
    }else{
        $(this).val(0);
    }
});
});



</script>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/examination/offline_exam/admit_card/download_admit_card.blade.php ENDPATH**/ ?>