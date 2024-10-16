<?php
$getstudents = Helper::getstudents();
$classType = Helper::classType();
$getPaymentMode = Helper::getPaymentMode();
//dd($data);
?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange mb-0">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('Collect Student Fees By Ledger')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('fees/index')); ?>" class="btn btn-primary  btn-sm" title="View Fees"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a>
                                <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <div class"card-body">
                            <form id="quickForm" method="post" action="<?php echo e(url('fees/ledger/collect')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row m-2">
                                 <div class="col-md-4">
                                        <div class="form-group">
                                            <label><?php echo e(__('common.Search By Keywords')); ?></label>
                                            <input type="text" class="form-control" value="<?php echo e($serach['name'] ?? ''); ?>" id="name" name="name" placeholder="<?php echo e(__('common.Search By Keywords')); ?>">
                                        </div>
                                    </div>
                               <!--     <div class="col-md-2">
                                        <div class="form-group">
                                            <label><?php echo e(__('common.Class')); ?></label>
                                            <select class="form-control " id="class_type_id" name="class_type_id">
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
                                    </div>-->
                                	
                                	     <div class="col-md-2">
                                        <div class="form-group">
                                            <label><?php echo e(__('Ledger No')); ?></label>
                                                 <input type="text" class="form-control" value="<?php echo e($serach['sr_no'] ?? ''); ?>" id="sr_no" name="sr_no" placeholder="<?php echo e(__('Type Ledger No.')); ?>">
                                     
                                          
                                            <?php $__errorArgs = ['sr_no'];
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
                                  
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                                            <button type="submit" class="btn btn-primary" id='form_submit'><?php echo e(__('common.Search')); ?></button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="text-white"><?php echo e(__('Ledger Update Update')); ?></label>
                                            <a target='_blank'href='<?php echo e(url("ledger_update")); ?>'><button type="button" class="btn btn-success"><?php echo e(__('Ledger Update')); ?></button></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                           
                           <div><button id='toggle-columns' class='btn btn-primary  m-1'>Show All Head</button></div>
                           <div class="table-responsive">
                           <table class="table table-bordered" id="trColor" style="cursor:pointer;font-weight: 500 !important;">
                                    <thead>
                                        
                                        <tr>
                                            <th>Ledger no</th>
                                            <th class="text-center">Father's/Account Holder </th>
                                            <th>Name of Student</th>
                                            <th>Class</th>
                                             <!-- <th><?php echo e(__('Add Head')); ?></th>-->
                                            
                                          <?php
                                            $feesGroups = DB::table('fees_group')->where('session_id',Session::get('session_id'))->whereNull('deleted_at')->get();
                                            //dd($feesGroups);
                                            ?>
                                           
                                           <?php if(!empty($feesGroups)): ?>
                                           
                                           <?php $__currentLoopData = $feesGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          
                                           
                                            <th id="key_<?php echo e($key1); ?>"style="text-align: center;"><?php echo e($item->name ?? ''); ?>

                                            <br>  <span style="display: flex; justify-content: space-between; width: 100%; ">
                                                    <span style="width: 78px;">Total</span>
                                                    <span style="color: green; border-right: 1px solid #00000057; border-left: 1px solid #00000057;width: 78px;">Credited</span>
                                                    <span style="color: red;width: 78px;">Due</span>
                                                </span>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                           <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody >
                   <?php if(!empty($data)): ?>
                   
                     <?php
                                        $i=1;
                    $admission_id = array();
                                        ?>
                                       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <?php
                                        $total_amount =0;
                                        $admission_id[] = $item->id;
                                       ?>
                                            <tr class="quickCollect" style="cursor:pointer; " onclick="showData('<?php echo e($item['id']); ?>',<?php echo e($item->ledger_no ?? ''); ?>)" >
                                            <td><?php echo e($item->ledger_no ?? ''); ?></td>
                                            <td class="text-center"><?php echo e($item['father_name'] ?? ''); ?></td>
                                            <td class='openTabButton' title="Add Fee Head"  data-admission_id="<?php echo e($item['id']); ?>"><a><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                                            <td><?php echo e($item['ClassTypes']['name'] ?? ''); ?></td>
<!--                                              <td> <button class='btn btn-sm btn-primary openTabButton' data-admission_id="<?php echo e($item['id']); ?>">Add</button>
-->                  </td>

                                             <?php if(!empty($feesGroups)): ?>
                                           
                                           <?php $__currentLoopData = $feesGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                           
                                            $fees_assigned = DB::table('fees_assign_details')->where('admission_id',$item->id)->where('fees_group_id',$item1->id)
                                            ->where('branch_id',Session::get('branch_id'))
                                            ->where('session_id',Session::get('session_id'))
                                            ->whereNull('deleted_at')->first();
                                       
                                           
                                           $total_amount1 = DB::table('fees_detail')
                                                            ->where('admission_id',$item->id) // Casting to an array
                                                            ->where('fees_group_id', $item1->id)
                                                            ->where('branch_id', Session::get('branch_id'))
                                                            ->where('session_id', Session::get('session_id'))
                                                            ->whereNull('deleted_at')
                                                            ->sum('total_amount');
                                            ?>
                                            <td class='amount_<?php echo e($item->id); ?>'>
                                                
                                                
                                                <span style="display: flex; justify-content: space-between; width: 100%;height: 49px;text-align: center;">
                                                            <span style="width: 78px;"><?php if(!empty($fees_assigned)): ?>
                                                   <?php
                                                   $total_amount += ($fees_assigned->fees_group_amount ?? 0)-($fees_assigned->discount ?? 0);
                                                   ?>
                                                   <?php echo e(($fees_assigned->fees_group_amount ?? 0)-($fees_assigned->discount ?? 0)); ?>

                                                          <?php else: ?>
                                                          0
                                                           <?php
                                               
                                                   $total_amount += 0;
                                                   ?>
                                                    <?php endif; ?></span>
                                                    <span style="color: green; border-right: 1px solid #00000057; border-left: 1px solid #00000057;width: 78px;">
                                                        <?php echo e($total_amount1 ?? ''); ?> </span>
                                                    <span style="color: red;width: 78px;"><?php echo e(($fees_assigned->fees_group_amount ?? 0)-($fees_assigned->discount ?? 0)-($total_amount1 ?? 0)); ?></span>
                                                </span>
                                                
                                                
                                                
                                                
                                               

                                           </td>
                                            
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                           <?php endif; ?>
                                           
                                        
                                          
                                        </tr>                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="" style="text-align: right;">Grand Total  
                                            <?php if(!empty($feesGroups)): ?>
                                           
                                           <?php $__currentLoopData = $feesGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=> $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            
                                            
                                             $fees_group_amount = DB::table('fees_assign_details')
                                                                ->whereIn('admission_id', (array) $admission_id)
                                                                ->where('fees_group_id', $item2->id)
                                                                ->where('branch_id', Session::get('branch_id'))
                                                                ->where('session_id', Session::get('session_id'))
                                                                ->whereNull('deleted_at')
                                                                ->selectRaw('SUM(fees_group_amount) as total_fees, SUM(discount) as total_discount')
                                                                ->first(); // Use `first()` to get the result as an object.

                                          
                                            
                                            $total_fees_mas = $fees_group_amount->total_fees - $fees_group_amount->total_discount ??  '0';
                                                 
                                           $Pay_fees_detail = DB::table('fees_detail')
                                                        ->whereIn('admission_id', (array) $admission_id) ->where('fees_group_id', $item2->id)
                                                        ->where('branch_id', Session::get('branch_id'))
                                                        ->where('session_id', Session::get('session_id'))
                                                        ->whereNull('deleted_at')
                                                        ->sum('total_amount');

                                                                              

                                            ?>
                                            
                                                <td  class='child' data-isZero='<?php echo e($total_fees_mas ?? 0); ?>' data-key='<?php echo e($key2); ?>'>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                      <span style="display: flex; justify-content: space-between; width: 100%;height: 49px;text-align: center;">
                                                            <span style="width: 78px;"><?php echo e($total_fees_mas ?? 0); ?> </span>
                                                    <span style="color: green; border-right: 1px solid #00000057; border-left: 1px solid #00000057;width: 78px;">
                                                        <?php echo e($Pay_fees_detail ?? ''); ?> </span>
                                                    <span style="color: red;width: 78px;"><?php echo e(($total_fees_mas ?? 0)-($Pay_fees_detail ?? 0)); ?></span>
                                                </span>
                                                
                                                
                                                
                                                
                                            

                                           </td>
                                          
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                           <?php endif; ?>
                                        </tr>
                   
                   <?php endif; ?>
                                    </tbody>
                                </table>
                           
                           <?php
                           
                           ?>
                           </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="student_fees_detail"></div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="toastrModal" tabindex="-1" role="dialog" aria-labelledby="toastrModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="toastrMessage"></div>
            </div>
        </div>
    </div>
</div>

<script>


$(document).ready(function() {
    $('#trColor tr').click(function() {
        $(this).css('backgroundColor', 'skyblue');
        $(this).css('color', 'black');
        $( this ).siblings().css( "background-color", "white" );
        $( this ).siblings().css( "color", "black" );
    });
});

    function showData(admission_id,ledgerNo) {
        
        var searchByKeyword = $("#name").val();
       
  
      if(searchByKeyword != '' && ledgerNo !='')
      {
        
        $("#name").val('');
        $('#sr_no').val(ledgerNo);
        $('#form_submit').trigger('click');
        
        return
      }
         var basurl = "<?php echo e(url('/')); ?>";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: basurl+'/student_fees_onclick',
            data: {
                admission_id: admission_id
            },
            // dataType: 'json',
            success: function(data) {
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
                    $('.student_fees_detail').html(data);
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

<script>
 $(document).ready(function(){
    var allStudents = <?php echo json_encode($srno, 15, 512) ?>;
    var old_class_value = parseInt("<?php echo e($serach['class_type_id'] ?? ''); ?>");
    
    if(old_class_value > 0)
    {
            allStudents.forEach(function(item, index) {
            if(parseInt(item.class_type_id) == old_class_value) {        
                $('#sr_no').append('<option value="' + item.ledger_no + '">' + item.ledger_no + ' / '+ item.father_name + '</option>');
            }
        });
        
         var old_srno_value = "<?php echo e($serach['sr_no'] ?? ''); ?>";
         $('#sr_no').val(old_srno_value)
    }

    $("#class_type_id").on("change", function(){
        var class_type_id = $(this).val();

        $('#sr_no').empty();
        
        allStudents.forEach(function(item, index) {
            if(parseInt(item.class_type_id) == parseInt(class_type_id)) {
              $('#sr_no').append('<option value="' + item.ledger_no + '">' + item.ledger_no + ' / '+ item.father_name + '</option>');
            }
        });
    });
    
    
});
</script>
<script>
    $(document).ready(function() {
          var thisTarget ='';
        var basurl = "<?php echo e(url('/')); ?>";

        $(".openTabButton").on("click", function(event) {
            event.stopPropagation(); 
           
           var admission_id = $(this).attr('data-admission_id');
           thisTarget = $(this);
            var newWindow = window.open(basurl+'/admissionEdit/'+admission_id, '_blank');

            var checkWindow = setInterval(function() {
                if (newWindow.closed) {
                    clearInterval(checkWindow); // Stop checking when the tab is closed
                    onTabClosed(); // Call the callback function
               

               }
            }, 1000); // Check every 1 second
        });

        function onTabClosed() {
            // Show toastr message in modal
            $("#toastrMessage").html(`1.) The data has been updated.<br>2.) If the updated data is not reflected, please refresh the page once.`);
            $("#toastrModal").modal('show');

            // Close modal after 2 seconds
            setTimeout(function() {
                $("#toastrModal").modal('hide');
           thisTarget.closest('tr').trigger('click');
            }, 2000);
        }

       
    });
</script>

<script>
$(document).ready(function() {

    var hiddenColumns = [];

    function toggleColumns() {
        var columnsToToggle = [];

        $('td.child').each(function() {
            var isZero = $(this).attr('data-isZero') == 0;
            var key = $(this).attr('data-key');
            var columnId = 'key_' + key;

            if (isZero) {
                columnsToToggle.push(columnId);
            }
        });

        columnsToToggle.forEach(function(columnId) {
            var columnIndex = $('th#' + columnId).index();

            if (columnIndex === -1) {
                console.log('Column with id ' + columnId + ' not found.');
                return;
            }

            var isHidden = hiddenColumns.includes(columnId);

            if (isHidden) {
                $('table thead tr').each(function() {
                    $(this).find('th').eq(columnIndex).show();
                });
                $('table tbody tr').each(function() {
                    $(this).find('td').eq(columnIndex).show();
                });

                hiddenColumns = hiddenColumns.filter(function(id) {
                    return id !== columnId;
                });
            } else {
                $('table thead tr').each(function() {
                    $(this).find('th').eq(columnIndex).hide();
                });
                $('table tbody tr').each(function() {
                    $(this).find('td').eq(columnIndex).hide();
                });

                hiddenColumns.push(columnId);
            }
        });
    }

    toggleColumns();

    $('#toggle-columns').click(function() {
        toggleColumns();
        
        var value = $(this).text().trim();
         $('#toggle-columns').text(value == 'Show All Head' ? 'Hide Head' : 'Show All Head')
    });
});
    </script>
<style>
    .openTabButton{
      color: #570bff;    }
      .table th, .table td {
  padding: 0 0px;
}

.table-bordered td, .table-bordered th {
  border: 2px solid #000;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/fees/fees_collect/byLedger.blade.php ENDPATH**/ ?>