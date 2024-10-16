<?php
$getstudents = Helper::getstudents();
$classType = Helper::classType();
$getPaymentMode = Helper::getPaymentMode();
?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-outline card-orange mb-0">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('Ledger Update')); ?></h3>
                            <div class="card-tools">
                                <a href="<?php echo e(url('fees/index')); ?>" class="btn btn-primary  btn-sm" title="View Fees"><i class="fa fa-eye"></i><?php echo e(__('common.View')); ?> </a>
                                <a href="<?php echo e(url('fee_dashboard')); ?>" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i><?php echo e(__('common.Back')); ?> </a>
                            </div>

                        </div>
                        <div class"card-body">
                            <div class="row m-2">
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
                                    <!--<div class="col-md-1 ">
                                        <div class="form-group">
                                            <label class="text-white"><?php echo e(__('common.Search')); ?></label>
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('common.Search')); ?></button>
                                        </div>
                                    </div>-->
                                </div>
                            
                            <div class="row m-2">
                            <div class="col-md-7" style="max-height: auto;overflow-y: scroll;">
                                <table id='table_1' class="table table-bordered small_td" id="trColor">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('ledger No')); ?></th>
                                            <th class="text-center" width=30px><?php echo e(__('Ad. No.')); ?> </th>
                                            <th><?php echo e(__('common.Name')); ?></th>
                                            <th><?php echo e(__('common.Class')); ?> </th>
                                            <th><?php echo e(__('common.Fathers Name')); ?></th>
                                            <!--<th><?php echo e(__('common.Mothers Name')); ?></th>-->
                                            <th><?php echo e(__('common.Mobile')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="student_listing">
                                        
                                    </tbody>
                                </table>
                            </div>
                               <div class="col-md-5 border text-center" style="max-height: auto;overflow-y: scroll;">
                                      <form  method="post" action="<?php echo e(url('ledger_save')); ?>">
                                          <?php echo csrf_field(); ?>
                                     <table class="table  text-center" >
                                    <thead>
                                        <tr>
                                            <th style='padding:12px'>Selected students for one ledger no.</th>
                                            </tr>
                                            </thead>
                                            </table>
                                            
                                             <table class="table table-bordered small_td">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('ledger No')); ?></th>
                                            <th class="text-center" width=30px><?php echo e(__('Ad.No.')); ?> </th>
                                            <th><?php echo e(__('common.Name')); ?></th>
                                            <!--<th><?php echo e(__('common.Class')); ?> </th>-->
                                            <th><?php echo e(__('common.Fathers Name')); ?></th>
                                            <!--<th><?php echo e(__('common.Mothers Name')); ?></th>-->
                                            <!--<th><?php echo e(__('common.Mobile')); ?></th>-->
                                        </tr>
                                    </thead>
                                    <tbody id='toAppend'>
                                     
                                    </tbody>
                                </table>
                                            <button type="submit" id='save_ledger' class="btn btn-success"><?php echo e(__('common.Submit')); ?></button>
                                 </form>
                                   </div>
                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="student_fees_detail"></div>
        </div>
    </section>
</div>

<!-- Loading screen modal -->
<div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="w-100">
      <div class="modal-body text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only text-white">Loading...</span>
        </div>
        <p class="mt-2 text-white">Loading...</p>
      </div>
    </div>
  </div>
</div>

 <style>
    /* Centering the loader */
    .loader {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1050; /* Make sure this is higher than the modal backdrop */
    }
  </style>

<script>
    $(document).ready(function(){
       var basurl = "<?php echo e(url('/')); ?>";
       $('#name').keyup(function(){
            var name = $(this).val();
                var class_type_id = $('#class_type_id').val();
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: basurl + '/ledger_update',
                    data: {
                        name: name,class_type_id:class_type_id
                    },
                    
                    success: function(data) {
                    if (data.length != 0) {
                        $('#student_listing').html(data);
                    }else{
                        $('#student_listing').html("");
                    }
                }
            });
       }); 
       
       $('#class_type_id').change(function(){
            var name = $('#name').val();
                var class_type_id = $(this).val();
                $('#loadingModal').modal('show');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: basurl + '/ledger_update',
                    data: {
                        name: name,class_type_id:class_type_id
                    },
                    
                    success: function(data) {
                    if (data.length != 0) {
                        $('#student_listing').html(data);
                        $('#loadingModal').modal('hide');
                    }else{
                        $('#student_listing').html("");
                        $('#loadingModal').modal('hide');
                    }
                }
            });
       }); 
    });
</script>

<script>
$(document).ready(function() {
    $(document).on('click', '#trColor tr', function() {
        $(this).css('backgroundColor', '#6639b5c4');
        $(this).css('color', '#fff');
        $( this ).siblings().css( "background-color", "white" );
        $( this ).siblings().css( "color", "black" );
    });
});

    // function showData(admission_id) {
    //      var basurl = "<?php echo e(url('/')); ?>";
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'post',
    //         url: basurl+'/student_fees_onclick',
    //         data: {
    //             admission_id: admission_id
    //         },
    //         // dataType: 'json',
    //         success: function(data) {
    //             if (data == 0) {
                    
    //                 alert('Please Assign the Fees for this Student !');
    //                 //window.location.href = "<?php echo e(url('feesMasterAdd')); ?>";
    //                 var url = "<?php echo e(url('admissionEdit')); ?>/" + admission_id;
    //                 var width = 1000; 
    //                 var height = 500; 
    //                 var leftPosition = (window.screen.width - width) / 2; 
    //                 var topPosition = (window.screen.height - height) / 2; 
    //                 var features = 'width=' + width + ',height=' + height + ',left=' + leftPosition + ',top=' + topPosition; 
    //                 // var newWindow = window.open(url, '_blank', features); 
    //                 // if (newWindow) {
    //                 //     newWindow.focus(); 
    //                 // } else {
    //                 //     alert('Your browser blocked opening the new window. Please check your browser settings.'); 
    //                 // }
                    
    //             } else {
    //                 $('.student_fees_detail').html(data);
    //             }
    //         }
    //     });
    // };



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
     $('#save_ledger').hide();
     $(document).on('click','#table_1 tbody tr',function(){
        if($(this).hasClass('clicked')) {
            toastr.error('Student Already Selected')
        }else{
            var clonedRow = $(this).clone();
            var admission_id = clonedRow.attr('data-admission_id');
            var ledger_no = clonedRow.attr('data-ledger_no');
              clonedRow.find("td:first").html('<input type="text" name="ledger_number[]" class="ledgers" placeholder="Ledger Number" value="'+ledger_no+'" >');
              clonedRow.find("td:eq(1)").append('<input type="hidden" name="admission_id[]" value="'+admission_id+'">');
              clonedRow.find("td:eq(3)").remove();
              clonedRow.find("td:last").remove();
              clonedRow.append('<td><button value="'+ admission_id +'" type="button" class="deleteBtn btn btn-danger btn-xs ml-3"><i class="fa fa-trash-o"></i></button></td>');
                  $(this).addClass('clicked');
                  $(this).css('background-color', '#6639b5');
                  $(this).css('color', '#fff');
                  $(this).attr('data-admission_id', admission_id);
            $("#toAppend").append(clonedRow);
            count();
        }
    });
      $("#toAppend").on("click", ".deleteBtn", function(){
      var admission_id =  $(this).val();
       $('tr[data-admission_id="'+admission_id+'"]').removeClass('clicked');
       $('tr[data-admission_id="'+admission_id+'"]').css('background-color', '#fff');
       $('tr[data-admission_id="'+admission_id+'"]').css('color', '#000');
        $(this).closest("tr").remove();
        //count();
    });
    

      
});

function count(){
    var count = $('.deleteBtn').length;
    if(count > 0)
    {
        $('#save_ledger').show();
    }else{
        $('#save_ledger').hide();
    }
 
           $('.ledgers').hide();
            $('.ledgers').eq(0).show();
            if(count >1)
            {
                $('#toAppend tr:last-child td:first-child').remove();
            }else
            {
                
            }
               $('#toAppend tr:first-child td:first-child').attr('rowspan', count);
    
}
</script>

<style>
    #toAppend tr:first-child td[rowspan] {
   vertical-align: middle;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/fees/fees_collect/ledgerUpdate.blade.php ENDPATH**/ ?>