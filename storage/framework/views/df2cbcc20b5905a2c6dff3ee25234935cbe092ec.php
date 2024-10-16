<?php
  $classType = Helper::classType();
  $getsubject = Helper::getSubject();
  $date = date('Y-m-d');
  
?>
 
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class=" card-outline card-orange">
						<div class="card-header bg-primary">
                        <?php if(Session::get('') == 3): ?>
                            <h3 class="card-title"><i class="fa fa-leanpub></i> &nbsp; <?php echo e(__('Send Message')); ?></h3>
                        <?php else: ?>						    
							<h3 class="card-title"><i class="nav-icon fas fa fa-leanpub "></i> &nbsp;<?php echo e(__('Send Message')); ?></h3>
						<?php endif; ?>
						<!--	<div class="card-tools"> 
							<?php if(Session::get('role_id') !== 3): ?>
							    <a href="<?php echo e(url('send_message')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i><?php echo e(__('common.Add')); ?> </a> 
							    <a href="<?php echo e(url('send_message_terminal')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?>  </a> 
                            <?php endif; ?>

                                
                            </div>-->
						</div>
						
						<div class="container-flulid mt-2 pl-2">
						<div class='row'>
						    
						     
            <div class="col-md-3 col-6">
                <a href="<?php echo e(url('send_message')); ?>" class="small-box-footer">
                <div class="small-box bg-danger">
                    <div class="inner">
                    <h4 class="mobile_text_title"><?php echo e(__('Send Messages')); ?></h4>
                    <h4 class="mobile_text_title">
                           &nbsp;
                    
                        </h4>
                    </div>
                <div class="icon">
                    <i class="fa fa-leanpub"></i>
                </div>
                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>
            <div class="col-md-3 col-6">
                <a href="<?php echo e(url('resend_message')); ?>" class="small-box-footer">
                <div class="small-box bg-success">
                    <div class="inner">
                    <h4 class="mobile_text_title"><?php echo e(__('Re-send Messages')); ?></h4>
                    <h4 class="mobile_text_title">
                  
                 <?php echo e(App\Models\FailedMessages::countResendMessages()); ?>

                    </h4>
                    </div>
                <div class="icon">
                    <i class="fa fa-leanpub"></i>
                </div>
                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>
            
                  <div class="col-md-3 col-6">
                <a href="<?php echo e(url('happy_birthday')); ?>" class="small-box-footer">
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h4 class="mobile_text_title"><?php echo e(__('Send Birthday Wishes')); ?></h4>
                    <h4 class="mobile_text_title">
                  
                 <?php echo e((App\Models\Admission::countTodaysBirthday()) + (App\Models\User::countTodaysBirthday())); ?>

                    </h4>
                    </div>
                <div class="icon">
                    <i class="fa fa-leanpub"></i>
                </div>
                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>
                  <div class="col-md-3 col-6">
                <a href="<?php echo e(url('group_view')); ?>" class="small-box-footer">
                <div class="small-box bg-primary">
                    <div class="inner">
                    <h4 class="mobile_text_title"><?php echo e(__('Add Messages Groups')); ?></h4>
                    <h4 class="mobile_text_title">
                  
               &nbsp;
                    </h4>
                    </div>
                <div class="icon">
                    <i class="fa fa-leanpub"></i>
                </div>
                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>
                  <div class="col-md-3 col-6">
                <a href="<?php echo e(url('group_messages_send')); ?>" class="small-box-footer">
                <div class="small-box bg-danger">
                    <div class="inner">
                    <h4 class="mobile_text_title"><?php echo e(__('Send Group Messages')); ?></h4>
                    <h4 class="mobile_text_title">
                  
               &nbsp;
                    </h4>
                    </div>
                <div class="icon">
                    <i class="fa fa-leanpub"></i>
                </div>
                    <div class="text-center small-box-footer"><?php echo e(__('common.More info')); ?><i class="fa fa-arrow-circle-right"></i></div>
                </div></a>
            </div>
            
						</div>
						</div>
			
					</div>
				</div>
			</div>
		</div>
	</section>
</div>



<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl" >
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="width:100%;"><?php echo e(__('examination.Select Questions for Exam')); ?> : &nbsp; <span id="exam_name"></span><span style="float: inline-end;" id="q_array"></span></h4>   
                <button type="button" id="closeModal"class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>
            <div class="modal-body">
                <form id="quickForm" action="#" method="post" >
                    <?php echo csrf_field(); ?> 
                    <div class="row">
            		<!--<div class="col-md-6">
            			<div class="form-group">
            				<label>Search By Keywords</label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="Ex. Question, Question Type, Subject, Class etc.">
            		    </div>
            		</div>   
                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label>Class</label>
                    			<select class="form-control" id="class_type_id">
                    			<option value="">Select</option>
                                 <?php if(!empty($classType)): ?> 
                                      <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                    	    </div>
                    	</div>
                    	<div class="col-md-2">
                    		<div class="form-group">
                    			<label>Section</label>
                    				<select class="form-control section_id" id="section_id" >
                    			   <option value="">Select</option>
                                 <?php if(!empty($getSection)): ?> 
                                      <?php $__currentLoopData = $getSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                                
                    	    </div>
                    	</div>-->   
                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label><?php echo e(__('examination.Subject')); ?></label>
                    			<select class="form-control select2" id="subject_id" >
                    			<option value=""><?php echo e(__('common.Select')); ?></option>
                                 <?php if(!empty($getsubject)): ?> 
                                      <?php $__currentLoopData = $getsubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($type->id ?? ''); ?>" ><?php echo e($type->name ?? ''); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </select>
                    	    </div>
                    	</div>                    	
                    	<div class="col-md-2">
                    		<div class="form-group">
                    			<label><?php echo e(__('examination.Question Type')); ?></label>
                    				<select class="form-control select2" id="question_type_id" >
                    			   <option value=""><?php echo e(__('common.Select')); ?></option>
                    			   <option value="1">Objective</option>
                    			   <option value="2">Descriptive</option>
                                </select>
                    	    </div>
                    	</div>    

                        <div class="col-md-1 ">
                             <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                    	    <button type="button" id ="search_que"class="btn btn-primary" onclick="SearchValue()"><?php echo e(__('common.Search')); ?></button>
                    	</div>
                    			
                    </div>
                </form> 
                    <div style="height: 110px;overflow: scroll;">
				<table class="table table-bordered table-striped  dataTable">
					<tbody id="question_list_show"> 

					</tbody>
				</table>
</div>

                    <div style="height: 300px;overflow: scroll;">
                        <h3><?php echo e(__('examination.Already Assigned Questions')); ?> : - </h3>
				<table class="table table-bordered table-striped  dataTable">
					<tbody id="question_list_show2"> 

					</tbody>
				</table>
</div>
            </div>
        
            <div class="modal-footer">
              <button class="btn btn-danger" id="closeModal"class="close" data-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
            </div>
      </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #555b5beb;">
			<div class="modal-header">
				<h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<input type="hidden" id="exam_id1" >
			<form action="<?php echo e(url('delete/exam')); ?>" method="post"> 
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


<script>
 var count = 0;
    function SearchValue() {
       
        var question_type_id = $('#question_type_id :selected').val();
        
        var subject_id = $('#subject_id :selected').val();
       
        
           var exam_id1 = $('#exam_id1').val();
        if(question_type_id > 0 || subject_id > 0 ){
           $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: '/search/assigned/question',
            data: {question_type_id:question_type_id,subject_id:subject_id,exam_id1:exam_id1},
             //dataType: 'json',
            success: function (data) {
                
                $('#question_list_show').html(data);
              
               $( ".add_question" ).each(function() {
                  if($(this).prop('checked') == true){
                    //count++;
                 }
                 
                });
                
             
           
                
          // $("#q_array").text("Selected questions : " + count);
          
            }
            
          }); 
          
            
        }
        // else{
        //     alert('Please put a value in minimum one column !');
        // }
        
    };
    
    
      
    
    
    
    
    
$('.deleteData').click(function() {
	var delete_id = $(this).data('id');
	$('#delete_id').val(delete_id);
});

var exam_id = '';


$('.assignQuestion').click(function() {
   
    
    exam_id = $(this).data('id');
    
       getAssignedQuestion();
    
    
var name = $(this).data('name');

$('#exam_id').val(exam_id);
$('#exam_id1').val(exam_id);

$('#exam_name').html(name);
$('#examName').html(name);

});



function getAssignedQuestion(){
    var cou = -1;
     $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url: '/search/already/assigned/question',
            data: {id:exam_id},
             //dataType: 'json',
            success: function (data) {
                
                $('#question_list_show2').html(data);
              
               $( "#question_list_show2 tr" ).each(function() {
                 
                    cou++;
              
                 
                });
                
               
           $("#q_array").text("Selected questions : " + cou);
            }
          }); 
}

$(document).on('click', ".add_question", function () {
    
 
    var question_id = $(this).data('question_id');
    var subject_id = $(this).data('subject_id');
    var subject_type_id = $(this).attr('data-subject_id');
    var question_type_id = $(this).attr('data-question_id');
    
  $('#myModal #subject_id').val(subject_type_id).change();
 
    var submit_id="";
    if($(this).prop('checked') == true){
        
      submit_id="0";
      count++;
     // $("#q_array").text("Selected questions : " + count);
    }else{
       submit_id="1";
    count--;
   // $("#q_array").text("Selected questions : " + count);
        
    }
    var data = {
                'exam_id': exam_id,
                'question_id': question_id,
                'subject_id': subject_id,
                'submit_id': submit_id,
                }
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
           $.ajax({
                type: "POST",
                url: "/assign/question",
                data: data,
                dataType: "html",
                success: function (response) {
                toastr.info('Record Saved Successfully.');
                getAssignedQuestion()
               $('#myModal #search_que').trigger("click");
               
                },

            });
   
});



//   function SearchValueAfter(question_type_id,subject_type_id) {
      
//           var exam_id1 = $('#exam_id1').val();
          
//         if(question_type_id > 0 || subject_id > 0 ){
//           $.ajax({
//                  headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
//             type:'post',
//             url: '/search/assigned/question',
//             data: {question_type_id:question_type_id,subject_id:subject_id,exam_id1:exam_id1},
//              //dataType: 'json',
//             success: function (data) {
                
//                 $('#question_list_show').html(data);
              
//               $( ".add_question" ).each(function() {
//                   if($(this).prop('checked') == true){
//                     //count++;
//                  }
                 
//                 });
                
             
           
                
//           $("#q_array").text("Selected questions : " + count);
          
//             }
            
//           }); 
          
            
//         }else{
//             alert('Please put a value in minimum one column !');
//         }
        
//     };
</script>
<script>
$(document).on('click', ".startExam", function () {
        toastr.error('You Cannot Attempt This Exam Now !');        
});
$(document).on('click', ".oldData", function () {
        toastr.error('You Already Attempted This Exam !');        
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/sms_service/terminal.blade.php ENDPATH**/ ?>