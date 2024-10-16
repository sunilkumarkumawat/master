<?php

?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-image"></i> &nbsp; <?php echo e(__('master.Add Gallery')); ?></h3>
                    <div class="card-tools">
                    <a href="<?php echo e(url('gallery_view')); ?>" class="btn btn-primary  btn-sm" title="View Gallery"><i class="fa fa-eye"></i> <?php echo e(__('common.View')); ?> </a>
                    <a href="<?php echo e(url('messageDashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?></a>
                    </div>
                    
                    </div>        
                <form id="quickForm" action="<?php echo e(url('gallery_add')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row m-2" id="box2">
        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="color:red;"><?php echo e(__('master.Image category')); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['img_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="img_category" name="img_category" value="<?php echo e(old('img_category')); ?>" placeholder="<?php echo e(__('master.Image category')); ?>">
                                <?php $__errorArgs = ['img_category'];
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
                               <label><?php echo e(__('common.Photo')); ?></label>
                               <input type="file" class="form-control <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="photo" name="photo[]" multiple value="<?php echo e(old('photo')); ?>"  accept="image/png, image/jpg, image/jpeg">
										 <p class="text-danger" id="image_error"></p>
                                <?php $__errorArgs = ['photo'];
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
                          <div class="col-md-2 pt-4">
                                           <input type="button" class="addmoreprodtxtbx" id="clonebtn" />
                                <input type="button" id="removerow" class="removeprodtxtbx" />
                           </div>
                    </div>
                    <div id="box1">
                        
                    </div>
                 
                       
                  
                    <div class="row m-2 pb-2">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary "><?php echo e(__('common.Submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
</div>
</div>

</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#photo').change(function(e){
            $('#image_error').html("");
            var fileName = $(this).val();
        var extension = fileName.split(".").pop();
        if (
          extension.toLowerCase() === "png" ||
          extension.toLowerCase() === "jpg" ||
          extension.toLowerCase() === "jpeg"
        ) {
            if (e.target.files[0].size > Img_Size) {
                $('#image_error').html("please select Image Size under 2MB");
                $(this).val('');
            }else{
                $('#image_error').html("");
            }
        }else{
            $('#image_error').html("Image Size File");
            $(this).val('');
        }
        });
    });
    </script>
    
    <style>
    #image_error{
        font-weight: bold;
    font-size: 14px;
    }
    </style>

<script>
    
$(document).ready(function() {
    $(document).on("click", "#clonebtn", function() {
        //we select the box clone it and insert it after the box
        $('#box2').clone().appendTo('#box1')
        $('#box1').find('#removerow').addClass("buttondel")
        $('.buttondel').css('visibility', 'visible')
    });
    
    $(document).on("click", "#removerow", function() {
        $(this).parents("#box2").remove();
        $('#removerow').focus();
    });
    
    $(".#clonebtn").keyup(function () {
        if (this.value.length == this.maxLength) {
          $(this).next('.inputs').focus();
        }
    });
});
</script>
<style>
 .addmoreprodtxtbx {
  background-color: #FFFFFF;
  background-image: url(<?php echo e(url('https://saleanalysics.rukmanisoftware.com/public/images/list_add.png')); ?>);
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 16px;
  margin-top:4px;
  width: 16px;
}

.removeprodtxtbx {
  background-color: #FFFFFF;
  background-image: url(<?php echo e(url('https://saleanalysics.rukmanisoftware.com/public/images/delete2.png')); ?>);
  background-repeat: no-repeat;
  border: medium none;
  cursor: pointer;
  height: 15px;
  margin-left: 5px;
   margin-top:4px;
  width: 16px;
  visibility:hidden;
}
</style>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/gallery/add.blade.php ENDPATH**/ ?>