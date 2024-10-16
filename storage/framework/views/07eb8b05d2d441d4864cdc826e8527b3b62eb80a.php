                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead class="bg-primary">
                                <tr role="row">
                                    <th>
                                        Sr.No.
                                        <?php if(!empty($data)): ?>
                                        <?php if($data[0]->role_id == 3): ?>
                                        <input class="ml-3" type="checkbox" id="all_checkbox" checked>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </th>
                                    <th>Name</th>
                                    <?php if(!empty($data)): ?>
                                    <?php if($data[0]->role_id == 3): ?>
                                    <th>Class</th>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <th>F Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
 
                                <?php if(!empty($data)): ?>
                                <?php
                                    $i=1
                                ?>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                    <?php echo e($i++); ?>

                                    <input class="ml-3 checkbox" type="checkbox" id="checkbox" name="admission_id[]" value="<?php echo e($item['id'] ?? ''); ?>" checked>
                                    </td>
                                    <td><?php echo e($item['first_name']); ?> <?php echo e($item['last_name']); ?></td>
                                    <?php if($item->role_id == 3): ?>
                                 <td><?php echo e($item['ClassTypes']['name'] ?? ''); ?></td>
                                    
                                    <?php endif; ?>
                                    <td><?php echo e($item['father_name'] ?? ''); ?></td>
                                    <td><?php echo e($item['mobile'] ?? ''); ?></td>
                                    <td><?php echo e($item['email'] ?? ''); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr><td colspan="12" id="no_data" data-count="<?php echo e($data); ?>" class="text-center">No Students Found !</td></tr>
                                <?php endif; ?>
                             
                            </tbody>
                        </table>
                        
                        
    <script>
        $(document).ready(function(){
            $('#chcekshow').addClass('d-none');
            var searchdata = $('#no_data').data('count');
            if(searchdata == 0){
                $('#chcekshow').addClass('d-none');
            }else{
                $('#chcekshow').removeClass('d-none');
            }
            $('#all_checkbox').click(function(){
                var isChecked = $(this).prop("checked");
                $(".checkbox").prop("checked", isChecked);
                
                var checkedCount = $(".checkbox:checked").length;
                
                if (checkedCount == "0") {
                    $('#chcekshow').addClass('d-none');
                } else {
                    $('#chcekshow').removeClass('d-none');
                }
            });

            
            $('.checkbox').click(function() {
                var checkbox_length = $(".checkbox").length;
                var checkedCount = $(".checkbox:checked").length;
                if(checkbox_length == checkedCount){
                    $("#all_checkbox").prop("checked", true);
                }else{
                    $("#all_checkbox").prop("checked", false);
                }
                if (checkedCount === 0) {
                    $('#chcekshow').addClass('d-none');
                } else {
                    $('#chcekshow').removeClass('d-none');
                }
            });
        })
    </script>                    <?php /**PATH /home/rusoft/public_html/demo3/resources/views/sms_service/sms_search.blade.php ENDPATH**/ ?>