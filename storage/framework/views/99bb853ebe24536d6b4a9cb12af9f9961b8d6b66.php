 
<?php $__env->startSection('content'); ?>
<?php
//dd(Session::get('id'));
?>

<div class="content-wrapper">

    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
				<div class="card-header bg-primary flex_items_toggel">
					<h3 class="card-title"><i class="fa fa-shirtsinbulk"></i> &nbsp;<?php echo e(__('Parent/Teacher Conversation')); ?></h3>
					<div class="card-tools">
					    <!--<?php if(Session::get('role_id') == 1): ?>
					     <a href="<?php echo e(url('teachers/add')); ?>" class="btn btn-primary  btn-sm" title="Add Teacher"><i class="fa fa-plus"></i> <span class="Display_none_mobile"><?php echo e(__('common.Add')); ?> </span> </a> 
			            <?php endif; ?>
			            <?php if(Session::get('role_id') !== 3): ?>
			            <a href="<?php echo e(url('staff_file')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('common.Back')); ?> </span></a> 
			            <?php endif; ?>-->
			        </div>
				</div>   
				
			<?php if(Session::get('role_id') == 1): ?>
				 <form id="quickForm" action="<?php echo e(url('parent_teacher_conversation')); ?>" method="post" >
                        <?php echo csrf_field(); ?>
                        
                            <div class="row m-2">
                    
                    
            	<div class="col-md-6">
            			<div class="form-group">
            				<label><?php echo e(__('common.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>" value="<?php echo e($search['name'] ?? ''); ?>">
            		    </div>
            		</div>                     	
                        <div class="col-md-1 text-center">
                            <div class="Display_none_mobile">
                             <label class="text-white">Search</label>
                             </div>
                    	    <button type="submit" class="btn btn-primary" ><?php echo e(__('common.Search')); ?></button>
                    	</div>
                    			
                    </div>
                        
                </form>
			<?php endif; ?>	
				
                <div class="card-body p-2">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead class="bg-primary">
                  <tr role="row">
                      <th><?php echo e(__('common.S.NO')); ?></th>
                      <th class="text-center">Image</th>
                            <th><?php echo e(__('Student Name')); ?></th>
                            <th><?php echo e(__('Class')); ?></th>
                            <th><?php echo e(__('Conversation')); ?></th>
                           
                           
                    </tr>
                             
                      
                  </thead>
                  <tbody>
                      
                      <?php if(!empty($data)): ?>
                        <?php
                    
                           $i=1;
                        ?>
                        
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $chat = $item->chat ?? '';
                          $complaint_id = $item->id;
                          $viewStatus = json_decode($item->view_status,true)[Session::get('teacher_id')] ?? 1;
                        ?>
                  
                        <tr>
                                <td><?php echo e($i++); ?></td>
                                <td class="text-center">
                                    <img class="profileImg pointer" src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$item['photo']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'" data-img="<?php if(!empty($item->photo)): ?> <?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$item['photo']); ?> <?php endif; ?>" >
                                </td>
                                
                               
                                <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']); ?></td>
                                <td><?php echo e($item['class_name']); ?></td>
                                <td>
                                <a class="btn btn-<?php echo e($viewStatus == 0 ? 'danger' : 'primary'); ?> btn-xs modal_complaint" id='complaint_id_<?php echo e($item->admission_id); ?>' data-complaint_id="<?php echo e($item->id); ?>" data-student_name="<?php echo e($item['first_name']  ?? ''); ?>" data-student_id="<?php echo e($item->admission_id ?? ''); ?>" data-chat="<?php echo e($item->chat ?? ''); ?>"><i class="fa fa-exclamation-circle" aria-hidden="true" ></i> Start / View Conversation</a>
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
        <h4 class="modal-title text-white"><?php echo e(__('common.Delete Confirmation')); ?> </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <!-- Modal body -->
      <form action="<?php echo e(url('delete_staff')); ?>" method="post">
              	 <?php echo csrf_field(); ?>
      <div class="modal-body">
              
            
            
              <input type=hidden id="delete_id" name=delete_id>
              <h5 class="text-white"><?php echo e(__('common.Are you sure you want to delete')); ?>  ?</h5>
           
      </div>

      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal"><?php echo e(__('common.Close')); ?></button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><?php echo e(__('common.Delete')); ?></button>
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


<div class="modal fade" id="modal_complaint_modal">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-body">
        <div class="col-md-12">
            <div class="centered_flex">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                <p>Chat Panel</p>
            </div>
        </div>
        
          <div class="modal-body">
        <div class="chat-container">
   <div class="messages-container">
       
        </div>
          <div class="input-group mb-3 mt-2">
            <input type="text" class="form-control" id="message"placeholder="Type your message..." aria-label="Type your message" aria-describedby="send-button">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="send-button">Send</button>
            </div>
          </div>
        </div>
      </div>
        
        <!--<div class="col-md-12 text-right">-->
        <!--    <button class="modal_btn bg-white change_status" data-action="Discard" data-bs-dismiss="modal">Discard</button>-->
        <!--    <button class="modal_btn bg-warning change_status" data-action="Confirm" data-bs-dismiss="modal">Send</button>-->
        <!--</div>-->
   
    </div>
  </div>
</div>
</div>

<style>
  /* Style for Messages Container */
  .messages-container {
    height: 300px;
    overflow-y: scroll;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  /* Style for Received Messages */
  .message.received {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 10px;
  }

  .received-message {
    background-color: #f0f0f0;
    padding: 8px 12px;
    border-radius: 10px;
    max-width: 70%;
    word-wrap: break-word;
  }

  .received-label {
    font-size: 12px;
    color: #888;
    margin-bottom: 4px;
  }

  /* Style for Sent Messages */
  .message.sent {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    margin-bottom: 10px;
  }

  .sent-message {
    background-color: #007bff;
    color: #fff;
    padding: 8px 12px;
    border-radius: 10px;
    max-width: 70%;
    word-wrap: break-word;
  }

  .sent-label {
    font-size: 12px;
    color: #888;
    margin-bottom: 4px;
  }

  /* Style for New Message Form */
  #messageForm {
    margin-top: 10px;
  }

    .profileImg {
        width:50px;
        height:50px;
        border-radius:10%;
        margin:5px;
    }
</style>
<script>
$(document).ready(function(){
  
var teacher_id = '';
  var student_id = '';
  var student_name = '';
  var complaint_id = '';

$('.modal_complaint').click(function(){
    var $messagesContainer = $('.messages-container');
    
    $messagesContainer.html('');
    teacher_id = "<?php echo e(Session::get('teacher_id')); ?>";
    complaint_id = $(this).attr('data-complaint_id');
   
    student_id = $(this).attr('data-student_id');
    student_name = $(this).attr('data-student_name');;
    var jsonString = $(this).attr('data-chat');
   
   
   if(jsonString != '')
   {
var messages = JSON.parse(jsonString);


$.each(messages, function(index, messageObject) {
  var userId = Object.keys(messageObject)[0];
  var messageContent = messageObject[userId];
 var messageType = '';
var user_name = '';
    if(userId === teacher_id )
    {
        messageType ='sent';
        user_name = 'Me';
    }
    else
    {
           messageType ='received';
    
        if(userId === '1')
        {
            user_name='Admin';
        }
    else{
        
    user_name =student_name;
    }
        
    }
 

  var messageHTML = `
    <div class="message ${messageType}">
      <div class="${messageType}-label">${user_name}</div>
      <div class="${messageType}-message">${messageContent}</div>
    </div>
  `;

  $messagesContainer.append(messageHTML);
});
 
}
 $('#modal_complaint_modal').modal('show');
  setTimeout(function() {
        var scrollHeight = $messagesContainer.innerHeight();
        $messagesContainer.animate({scrollTop: $messagesContainer[0].scrollHeight}, 'slow');
    }, 800);
});


$('#send-button').click(function() {
        var message = $('#message').val();
        

        var baseUrl = "<?php echo e(url('/')); ?>";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: baseUrl + '/sendConversation',
            data: {
                complaint_id: complaint_id, 
                message: message,
                user_id:teacher_id,
                admin_id:1,
                teacher_id:teacher_id,
                student_id:student_id,
                admin_status:0,
                teacher_status:1,
                student_status:0,
                
            },
            success: function(data) {
               
               $('#complaint_id_'+student_id).attr('data-chat',data.data);
               
                $('#complaint_id_'+ student_id).removeAttr('class'); 
                $('#complaint_id_'+ student_id).attr('class', "btn btn-primary btn-xs modal_complaint");
                 
                 var anchorElement = document.getElementById('complaint_id_'+student_id);
                  anchorElement.click();
                     $('#message').val(''); 
            },
            error: function(xhr, status, error) {
                console.error('Error sending message:', error);
                alert('Failed to send message');
            }
        });
    });
    
$('.profileImg').click(function(){
    var profileImgUrl = $(this).data('img');
    if(profileImgUrl != ''){
        $('#profileImgModal').modal('toggle');
        $('#profileImg').attr('src',profileImgUrl);
    }
});
});
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/staff/parentTeacherConversation/index.blade.php ENDPATH**/ ?>