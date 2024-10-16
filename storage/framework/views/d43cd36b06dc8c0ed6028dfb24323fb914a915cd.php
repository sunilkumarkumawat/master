<?php
$getstudents = Helper::getstudents();
$classType = Helper::classType();
$getPaymentMode = Helper::getPaymentMode();
  $array = [];
?>

<?php $__env->startSection('content'); ?>

<style>
    .padding_table thead tr{
        background: #002c54;
        position: sticky;
        top: 0;
        color: white;
        /*box-shadow: 0px 4px 6px #a8a8a8;*/
    }
    
    .padding_table thead tr th{
        padding:5px !important;
    }
    
    .padding_table tr th, .padding_table tr td{
        font-size:14px;
    }
</style>
<div class="content-wrapper">
    
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange mb-0">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('fees.Collect Student Fees')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('fees/index')); ?>" class="btn btn-primary  btn-sm" title="View Fees"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a>
                                <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <div class"card-body">
                            <form id="quickForm" method="post" action="<?php echo e(url('Fees/add')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row m-2">
                                            <div class="col-md-2">
									<div class="form-group">
										<label>Admission Type(Non RTE)<span style="color:red;">*</span></label>
										<select class="form-control invalid" id="admission_type_id" name="admission_type_id">
											<option value=""><?php echo e(__('common.Select')); ?></option>
											<option value="1" <?php echo e(1 == $serach['admission_type_id']   ? 'selected' : ''); ?>>Yes</option>
											<option value="2" <?php echo e(2 == $serach['admission_type_id']   ? 'selected' : ''); ?>>No</option>
										</select>
									    <span class="invalid-feedback" id="admission_type_id_invalid" role="alert">
                                            <strong>The Admission Type is required</strong>
                                        </span>
									</div>
								</div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label><?php echo e(__('common.Class')); ?></label>
                                            <select class="form-control select2" id="class_type_id" name="class_type_id">
                                                <option value=""><?php echo e(__('common.Select')); ?></option>
                                                <?php if(!empty($classType)): ?>
                                                <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(Session::get('role_id') !== 2): ?>
                                                        <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type->id == $serach['class_type_id'] ?? '' ) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type->id == $serach['class_type_id'] ?? '' ) ? 'selected' : ''); ?> <?php echo e(($type->id !== Session::get('class_type_id')) ? 'hidden' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                                    <?php endif; ?>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                	
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><?php echo e(__('common.Search By Keywords')); ?></label>
                                            <input type="text" class="form-control" value="<?php echo e($serach['name'] ?? ''); ?>" id="name" name="name" placeholder="<?php echo e(__('common.Search By Keywords')); ?>">
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
                            <?php if(!empty($data)): ?>
                            
                            <div class="row m-2" >
                                
                                <div class='col-12 col-md-7' style="max-height: 225px;overflow-y: scroll;">
                                <table class="table table-bordered small_td padding_table" id="trColor">
                                    <thead>
                                        <tr>
                                            <th>RTE/Non RTE</th>
                                            <th>Ledger No.</th>
                                            <!--<th>Image</th>-->
                                            <th class="text-center"><?php echo e(__('fees.Admission No.')); ?> </th>
                                            <th><?php echo e(__('common.Name')); ?></th>
                                            <!--<th><?php echo e(__('common.Class')); ?> </th>-->
                                            <!--<th><?php echo e(__('common.Fathers Name')); ?></th>-->
                                            <!--<th><?php echo e(__('common.Mothers Name')); ?></th>-->
                                            <?php if(Session::get('role_id') == 1): ?>
                                            <!--<th><?php echo e(__('common.Mobile')); ?></th>-->
                                        <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                      
                                        ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $array[$item->id] =$item;
                                ?>
                                            <tr  class="quickCollect" data-id='<?php echo e($item->id ?? ''); ?>'style="cursor:pointer; " onclick="showData('<?php echo e($item['unique_system_id']); ?>','<?php echo e(Session::get('session_id')); ?>')">
                                            <td><?php echo e($item->admission_type_id == 2 ? 'RTE' : 'Non RTE'); ?></td>
                                            <td><?php echo e($item->ledger_no ?? 'NA'); ?></td>
                                            <!--<td class="text-center">-->
                                            <!--    <img src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$item['image']); ?>" -->
                                            <!--        class="photo_img" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">-->
                                            <!--</td>-->
                                            <td class="text-center"><?php echo e($item['admissionNo'] ?? ''); ?></td>
                                            <td><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                                            <!--<td><?php echo e($item['ClassTypes']['name'] ?? ''); ?></td>-->
                                            <!--<td><?php echo e($item['father_name'] ?? ''); ?></td>-->
                                            <!--<td><?php echo e($item['mother_name'] ?? ''); ?></td>-->
                                             <?php if(Session::get('role_id') == 1): ?>
                                         <!--<td><?php echo e($item['mobile'] ?? ''); ?></td>-->
                                        <?php endif; ?>
                                            
                                        </tr>                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
                                   <div class='col-12 col-md-5' id='show_details' style='display:none;position:relative'> 
                                       
                                   <table class='table table-bordered'>
    <tr>
        <th rowspan='6' style='text-center;padding:10px'>
            <img src='' width='150px' height='150px' id="student-image" />
        </th>
    </tr>
    <tr>
        <th>Name</th>
        <th id="student-name"></th>
    </tr>
    <tr>
        <th>Mobile</th>
        <th id="student-mobile"></th>
    </tr>
    <tr>
        <th>Father</th>
        <th id="father-name"></th>
    </tr>
    <tr>
        <th>Mother</th>
        <th id="mother-name"></th>
    </tr>
    <tr>
        <th>Father Mobile</th>
        <th id="father-mobile"></th>
    </tr>
</table>
                                       </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="student_fees_detail"></div>
        </div>
    </section>
</div>


<style>
    .photo_img{
        border-radius: 10px;
        padding: 2px;
        width: 50px;
        height: 50px;
    }
</style>

<script>
$(document).ready(function() {
    $('#trColor tr').click(function() {
        $(this).css('backgroundColor', '#002c54');
        $(this).css('color', '#fff');
        $( this ).siblings().css( "background-color", "white" );
        $( this ).siblings().css( "color", "black" );
    });
});




$(".quickCollect").on("click", function(){
 var array = <?php echo json_encode($array, 15, 512) ?>;
 var id = $(this).data('id');
 
 var student = array[id];

 var path = `<?php echo e(env('IMAGE_SHOW_PATH')); ?>profile/${student.image ? student.image : ''}`;
        $("#student-image").attr("src",path );
        $("#student-name").text(student.first_name + ' ' + (student.last_name ? student.last_name : ''));
        $("#student-mobile").text(student.mobile);
        $("#father-name").text(student.father_name);
        $("#mother-name").text(student.mother_name);
        $("#father-mobile").text(student.father_mobile);


$('#show_details').show();
}); 
    function showData(unique_system_id,session_id) {
         var basurl = "<?php echo e(url('/')); ?>";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }, 
            type: 'post',
            url: basurl+'/student_fees_onclick',
            data: {
                unique_system_id: unique_system_id,
                session_id: session_id,
            },
            // dataType: 'json',
            success: function(data) {
                // alert(JSON.stringify(data));
                if (data == 0) {
                    alert('Please Assign the Fees for this Student !');
                    //window.location.href = "<?php echo e(url('feesMasterAdd')); ?>";
                    var url = "<?php echo e(url('admissionEdit')); ?>/" + admission_id;
                    var width = 1000; 
                    var height = 500; 
                    var leftPosition = (window.screen.width - width) / 2; 
                    var topPosition = (window.screen.height - height) / 2; 
                    var features = 'width=' + width + ',height=' + height + ',left=' + leftPosition + ',top=' + topPosition; 
                    // var newWindow = window.open(url, '_blank', features); 
                    // if (newWindow) {
                    //     newWindow.focus(); 
                    // } else {
                    //     alert('Your browser blocked opening the new window. Please check your browser settings.'); 
                    // }
                    
                } else {
                    $('#student_fees_detail').html(data);
                }
            }
        });
    };

    function SearchValue() {
         var basurl = "<?php echo e(url('/')); ?>";
        var class_type_id = $('#class_type_id :selected').val();
        var name = $('#name').val();
        if (class_type_id > 0 || name != '') {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: basurl+'/SearchValueStd',
                data: {
                    class_type_id: class_type_id,
                    name: name
                },
                //dataType: 'json',
                success: function(data) {
                    $('.student_list_show').html(data);
                }
            });
        } else {
            alert('Please put a value in minimum one column !');
        }

    };
   
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/fees/fees_collect/add.blade.php ENDPATH**/ ?>