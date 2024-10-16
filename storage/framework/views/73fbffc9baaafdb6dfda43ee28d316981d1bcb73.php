  <?php
  $getSetting = Helper::getSetting();
  ?>

<style>
    /* New Css Start */

       .top_brand_section {
           display: flex;
           align-items: center;
           border-bottom: 2px solid white;
           margin-bottom: 20px;
           padding-bottom: 20px;
           padding-top: 20px;
           padding-left: 10px;
           padding-right: 10px;
           position: relative;
           height: 70px;
       }

       .brand_img {
           width: 40px;
           height: 40px;
       }

       .brand_title {
           margin-bottom: 0px;
           width: 200px;
           font-size: 14px;
           font-weight: 600;
           color: white;
           margin-left: 10px;
       }
</style>
  
<aside class="main-sidebar bg-light  elevation-4">
  
<a href="<?php echo e(url('/')); ?>">
  <div class="top_brand_section">
       <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo'] ?? ''); ?>" alt="" class="brand_img">
       <p class="brand_title" style="display:none;"><?php echo e($getSetting->name); ?></p>
   </div>
</a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


<?php
$sidebarData = DB::table('students_sidebar')->whereNull('deleted_at')->get();
?>

<?php if(!empty($sidebarData)): ?>

<?php $__currentLoopData = $sidebarData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <li class="nav-item menu-open ">
                    <a href="<?php echo e(url($item->url)); ?><?php echo e($item->url == 'student_fees_details' ? '/'.Session::get('id') : ''); ?>" class="nav-link <?php echo e(url($item->url)  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas <?php echo e($item->ican ?? ''); ?>"></i>
                    <p><?php echo e($item->name ?? ''); ?></p>
                    </a>
                </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                <!--<li class="nav-item menu-open ">
                    <a href="<?php echo e(url('dashboard')); ?>" class="nav-link <?php echo e(url('dashboard')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-home"></i>
                    <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('student_fees_details')); ?>/<?php echo e(Session::get('id')); ?>" class="nav-link <?php echo e(url('student_fees_details')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-calendar-check-o"></i>
                    <p>Fees Details</p>
                    </a>
                </li>
                
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('studentsAttendanceView')); ?>" class="nav-link <?php echo e(url('students/attendance/view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-calendar-check-o"></i>
                    <p>Attendance</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('school_desk_view')); ?>" class="nav-link <?php echo e(url('school_desk_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fa fa-table"></i>
                    <p>School Desk</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('teachers/index')); ?>" class="nav-link <?php echo e(url('teachers/index')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-user-secret"></i>
                    <p>My Teacher</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('timetable')); ?>" class="nav-link <?php echo e(url('timetable')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-calendar-plus-o"></i>
                    <p>Time Table</p>
                    </a>
                </li>      
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('gallery_view')); ?>" class="nav-link <?php echo e(url('gallery_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fa fa-image"></i>
                    <p>Gallery</p>
                    </a>
                </li>
                 <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('prayer')); ?>" class="nav-link <?php echo e(url('prayer')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-calendar-plus-o"></i>
                    <p>Prayer</p>
                    </a>
                </li>      
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('student_subject_view')); ?>" class="nav-link <?php echo e(url('student_subject_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Subjects</p>
                    </a>
                </li>    
                <li class="nav-item menu-open">
                    <a href="<?php echo e(url('rule_view')); ?>" class="nav-link <?php echo e(url('rule_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fa fa-check-square"></i>
                    <p>Rules</p>
                    </a>
                </li>    
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('student_gate_pass_view')); ?>" class="nav-link <?php echo e(url('student_gate_pass_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fa fa-times-circle-o"></i>
                    <p>Gate Pass</p>
                    </a>
                </li>      
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('student_uniform_view')); ?>" class="nav-link <?php echo e(url('student_uniform_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fa fa-shirtsinbulk"></i>
                    <p>Uniform</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('books_uniform_view')); ?>" class="nav-link <?php echo e(url('books_uniform_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-book"></i>
                    <p>Books/Uniform Shops</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('homework/index')); ?>" class="nav-link <?php echo e(url('homework/index')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-flask"></i>
                    <p>Homework</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('examTerminal')); ?>" class="nav-link <?php echo e(url('examTerminal')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-map-o"></i>
                    <p>Examinations</p>
                    </a>
                </li>   
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('student_bus_assign_view')); ?>" class="nav-link <?php echo e(url('student_bus_assign_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fa fa-truck"></i>
                    <p>Transport</p>
                    </a>
                </li>   
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('books_library')); ?>" class="nav-link <?php echo e(url('books_library')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-book"></i>
                    <p>Library Books</p>
                    </a>
                </li>  
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('download_center')); ?>" class="nav-link <?php echo e(url('download_center')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-download"></i>
                    <p>Download Center</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('notice_board/view/0')); ?>" class="nav-link <?php echo e(url('notice_board/view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-envelope"></i>
                    <p>Notice Board</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('complaint_view')); ?>" class="nav-link <?php echo e(url('complaint_view')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa fa-list-alt"></i>
                    <p>Complain Box</p>
                    </a>
                </li>
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('leave_management')); ?>" class="nav-link <?php echo e(url('leave_management')  == URL::current() ? 'active' : ""); ?>">
                    <i class="nav-icon fas fa fa-check-square"></i>
                    <p>Apply Leave</p>
                    </a>
                </li>    
                            -->
                <!--<li class="nav-item menu-open ">-->
                <!--    <a href="<?php echo e(url('chat/compose')); ?>" class="nav-link <?php echo e(url('chat/compose')  == URL::current() ? 'active' : ""); ?>">-->
                <!--    <i class="nav-icon fas fa fa-snapchat"></i>-->
                <!--    <p>Chat Panel</p>-->
                <!--    </a>-->
                <!--</li>                -->
                <li class="nav-item menu-open ">
                    <a href="<?php echo e(url('logout')); ?>" class="nav-link ">
                    <i class="nav-icon fa fa-sign-out"></i>
                    <p>Log Out</p>
                    </a>
                </li>
            
            </ul>
        </nav>
    </div>
</aside><?php /**PATH /home/rusoft/public_html/demo3/resources/views/layout/student_sidebar.blade.php ENDPATH**/ ?>