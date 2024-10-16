<?php
  $getSetting=Helper::getSetting();

?>
                  <div class="col-md-12" style="height:300px; overflow-y: scroll;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                       <th><?php echo e(__('certificate.Admission No.')); ?></th>
                       <th><?php echo e(__('certificate.Student Name')); ?></th>
                      <th><?php echo e(__('common.Fathers Name')); ?></th>
                      <th><?php echo e(__('common.Fathers Mobile No.')); ?></th>
                      <th><?php echo e(__('common.Mothers Name')); ?>.</th>
                       
                      <th><?php echo e(__('common.Date Of  Birth')); ?></th>
                      <!--<th>School Name</th>-->
                      
                    </tr>
                  </thead>
                  <tbody class="mytable">
                            <?php if(!empty($data)): ?>
                                <?php
                                   $i=1
                                ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php
                                  //dd($item);
                                $character = DB::table('tc_certificates')->where('admission_id',$item->id)->whereNull('deleted_at')->count();
                              //dd($character);
                              ?>
                               <tr style="cursor:pointer; " class="fillData" data-id="<?php echo e($item['id'] ?? ''); ?>" data-class_type_id="<?php echo e($item['class_type_id'] ?? ''); ?>"  data-admission_date="<?php echo e($item['admission_date'] ?? ''); ?>"  data-mother_name="<?php echo e($item['mother_name'] ?? ''); ?>" data-old="<?php echo e($character ?? '0'); ?>" data-school_name="<?php echo e($getSetting['name'] ?? ''); ?>" data-class_type_id="<?php echo e($item['class_type_id'] ?? ''); ?>" data-registration_no="<?php echo e($item['registration_no'] ?? ''); ?>" 
                                data-first_name="<?php echo e($item['first_name'] ?? ''); ?>" data-last_name="<?php echo e($item['last_name'] ?? ''); ?>" 
                              data-father_mobile="<?php echo e($item['father_mobile'] ?? ''); ?>" data-dob="<?php echo e($item['dob'] ?? ''); ?>" data-father_name="<?php echo e($item['father_name'] ?? ''); ?>" data-address="<?php echo e($item['address'] ?? ''); ?>" >
                                        <td class="p-1" ><?php echo e($item['id'] ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($item['first_name'] ?? ''); ?><?php echo e($item['last_name'] ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($item['father_name']  ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($item['father_mobile']  ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e($item['mother_name']  ?? ''); ?></td>
                                        <td class="p-1" ><?php echo e(date('d-m-Y', strtotime($item['dob'])) ?? ''); ?></td>
                                        <!--<td class="p-1" ><?php echo e($getSetting['name']); ?></td>-->
                                      
                                        
                                       <!-- <td><?php echo e($item['hostel']); ?></td>-->
                                       
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php else: ?>
                                <tr><td colspan="12" class="text-center">No Students Found !</td></tr>
                            <?php endif; ?>
                </tbody>
                </table>
                  </div>     
<script>
$(".fillData").on("click", function() {
    
    var old = $(this).data('old');
    var first_name = $(this).data('first_name');
     var addmission_id = $(this).data('id');
    var class_type_id = $(this).data('class_type_id');
    var last_name = $(this).data('last_name');
    var father_mobile = $(this).data('father_mobile');
    var father_name = $(this).data('father_name');
    var registration_no = $(this).data('registration_no');
    var class_type_id = $(this).data('class_type_id');
    var mother_name = $(this).data('mother_name');
    var admission_date = $(this).data('admission_date');
    var class_type_id = $(this).data('class_type_id');
    var id = $(this).data('id');
    var dob = $(this).data('dob');
    var full_name = first_name + last_name;
    
  
    $('#admission_id').val(addmission_id);
    $('#first_name').val(full_name);
    $('#father_mobile').val(father_mobile);
    $('#father_name').val(father_name);
    $('#class_type_id1').val(class_type_id);
    $('#registration_no').val(registration_no);
    $('#dob1').val(dob);
    $('#mother_name1').val(mother_name);
    $('#admission_no1').val(id);
    $('#admission_date1').val(admission_date);
    $('#class_type_id1').val(class_type_id);
    if (old === 0) {
   
    } else if (old > 0) {
    toastr.error('Already Exists');
    $('#admission_id,#first_name,#father_mobile,#father_name,#school_name,#class_type_id1,#registration_no,#dob1,#mother_name1,#admission_no1,#admission_date1,#class_type_id1').val('');
    }
   
});

$('.mytable tr').click(function(){
    $(this).css('background-color','#6639b5c4');
    $(this).css('color','white');
    $(this).siblings().css('background-color','white');
    $(this).siblings().css('color','black');
});
</script>                 <?php /**PATH /home/rusoft/public_html/demo3/resources/views/certificate/tc_certificate/tc_search.blade.php ENDPATH**/ ?>