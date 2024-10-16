<script src="<?php echo e(URL::asset('public/assets/school/js/jquery.min.js')); ?>"></script>
<?php
$getUser=Helper::getUser();
?>
<!-- /.content-wrapper -->

<footer class="main-footer Display_none_mobile">
    
    <strong><?php echo e(__('common.Copyright')); ?> &copy; 2014-<?php echo e(date('Y')); ?> <a target="blank" href="http://rukmanisoftware.com/"><?php echo e(__('common.Rukmani Software')); ?></a>.</strong> <?php echo e(__('common.All rights reserved.')); ?>

    <div class="float-right d-none d-sm-inline-block"><b><?php echo e(__('common.Version')); ?></b> 6.1.0</div>
    
</footer>

<?php if(Session::get('role_id') == 3): ?>
<div class="Display_none_PC">
<footer class="main_mobile_footer">
    <div class="flex_footer_items">
        <ul>
            <!--<a href="<?php echo e(url('minidashboard')); ?>">-->
            <!--    <div class="centerd_text_icon">-->
            <!--    <li class="<?php echo e(url('minidashboard') == URL::current() ? 'flex_footer_item_li_active' : ""); ?>">-->
            <!--        <i class="fa fa-home"></i>-->
            <!--    </li>-->
            <!--     </div>-->
            <!--    <p>Home</p>-->
               
            <!--</a>-->
            <a href="<?php echo e(url('/')); ?>">
                <div class="centerd_text_icon">
                <li class="<?php echo e(url('minidashboard') == URL::current() ? 'flex_footer_item_li_active' : ""); ?>">
                    <i class="fa fa-home"></i>
                </li>
                 </div>
                <p>Home</p>
               
            </a>
            <a href="">
                <div class="centerd_text_icon">
                <li>
                    <i class="fa fa-refresh"></i>
                </li>
                </div>
                    <p>Refresh</p>
            </a>
            <!--<a href="<?php echo e(url('clear-cache')); ?>">-->
            <!--    <div class="centerd_text_icon">-->
            <!--    <li>-->
            <!--        <i class="fa fa-recycle"></i>-->
            <!--    </li>-->
            <!--    </div>-->
            <!--        <p>Clear</p>-->
            <!--</a>-->
            <a href="<?php echo e(url('logout')); ?>">
                <div class="centerd_text_icon">
                <li class="bg-danger">
                    <i class="fa fa-sign-out"></i>
                </li>
                </div>
                    <p>Log Out</p>
            </a>
            <?php
            $url = "profile/edit/".Session::get('id');
            ?>
            <a href="<?php echo e(url($url)); ?>">
                <div class="centerd_text_icon">
                <li class="<?php echo e(url($url)  == URL::current() ? 'flex_footer_item_li_active' : ""); ?>">
                    <i class="fa fa-user"></i>
                </li>
                </div>
               <p>Profile</p>
            </a>
        </ul>
    </div>
</footer>
    </div>
<?php endif; ?>
<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark"></aside>

<?php /**PATH /home/rusoft/public_html/demo3/resources/views/layout/footer.blade.php ENDPATH**/ ?>