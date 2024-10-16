 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-edit"></i> &nbsp;<?php echo e(__('master.School Desk')); ?> </h3>
                    <div class="card-tools">
                    <!--<a href="<?php echo e(url('add_user')); ?>" class="btn btn-primary  btn-sm" title="Add User"><i class="fa fa-plus"></i> Add </a>-->
                    <?php if(Session::get('role_id') == 1): ?>
                    <a href="<?php echo e(url('messageTemplate')); ?>" class="btn btn-primary  btn-sm" title="View Users"><i class="fa fa-arrow-left"></i> <?php echo e(__('common.Back')); ?>  </a>
                    <?php endif; ?>
                    </div>
                    
                    </div>                 
               
                    <div class="row m-2">
             
                          
                        	<div class="col-md-12 pt-2" id="log">
                                <?php echo e($data->description ?? ''); ?>

                            </div>
                        	<div class="col-md-12 pt-2" id="divMain">
                             
                            </div>
                            
                                              
                    </div>                        
        
                
                
            </div>
            </div>
        </div>
    </div>
</section>
</div>  


<script>
    var support = (function() {
        if (!window.DOMParser) return false;
        var parser = new DOMParser();
        try {
            parser.parseFromString('x', 'text/html');
        } catch (err) {
            return false;
        }
        return true;
    })();

    var textToHTML = function(str) {

        // check for DOMParser support
        if (support) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(str, 'text/html');
            return doc.body.innerHTML;
        }

        // Otherwise, create div and append HTML
        var dom = document.createElement('div');
        dom.innerHTML = str;
        return dom;

    };

    var myValue9 = document.getElementById("log").innerText;

    document.getElementById("divMain").innerHTML = textToHTML(myValue9);

    document.getElementById("log").innerText="";
</script>

 <?php $__env->stopSection(); ?>    
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/schoolDesk/school_desk_view.blade.php ENDPATH**/ ?>