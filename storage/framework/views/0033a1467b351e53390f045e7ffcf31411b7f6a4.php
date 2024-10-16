   <?php
   
   $sidebar =Helper::getSiderbar();
   $getPermisn = Helper::getPermisn();
   $getPermisnByBranch = Helper::getPermisnByBranch();
   $getSetting = Helper::getSetting();
   $allPermisn = explode(',',$getPermisn['sidebar_id']);
    
   ?>
   <style>
       .brand-image {
           height: 2rem !important;
           width: 2rem !important;
       }

       .quick-menu::before {
           content: "";
           border-top: 12px solid transparent;
           border-bottom: 12px solid transparent;
           border-right: 12px solid #fff;
           position: absolute;
           top: 10px;
           left: -12px;
           z-index: 10;
       }

       .dropdown-footer {
           text-align: left;
       }

       .quick-menu[x-placement^="bottom"],
       .quick-menu[x-placement^="left"],
       .quick-menu[x-placement^="right"],
       .quick-menu[x-placement^="top"] {
           right: auto;
           bottom: auto;
       }

       .quick-menu {
           /*transition: 1s;*/
           position: fixed !important;
           top: -38px !important;
           left: 12.8rem !important;
           z-index: 1000;
           display: none;
           float: left;
           min-width: 12rem;
           padding: .5rem 0;
           margin: .125rem 0 0;
           font-size: 1rem;
           color: #212529;
           text-align: left;
           list-style: none;
           background-color: #fff;
           background-clip: padding-box;
           border: 1px solid rgba(0, 0, 0, .15);
           border-radius: .25rem;
           box-shadow: 10px 3px 12px 0 rgba(0, 0, 0, 0.26);
       }

       .nav {
           margin-bottom: 40px !important;
       }

       @media  only screen and (max-width: 990px) {
           .quick-menu {
               top: 4px !important;
               left: -2.2rem !important;
           }
       }


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

       .toggle_button {
           position: absolute;
           background: white;
           width: 30px;
           height: 30px;
           font-size: 18px;
           border-radius: 50%;
           text-align: center;
           display: flex;
           align-items: center;
           justify-content: center;
           bottom: -15px;
           right: -14px;
           border: 2px solid blue;
           cursor: pointer;
       }
   </style>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar bg-light">
        <!-- Brand Logo -->
        <a href="<?php echo e(url('/')); ?>">
          <div class="top_brand_section">
               <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo'] ?? ''); ?>" alt="" class="brand_img" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/no_image.png'); ?>'">
    
               <p class="brand_title" style="display:none;"><?php echo e($getSetting->name); ?></p>
    
                <!--<div class="main-header navbar navbar-expand navbar-white navbar-light p-0">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
                        </li>
                    </ul>
                </div>-->
                
                
               <!--<div class="toggle_button" data-widget="pushmenu">
                   <i class="fa fa-angle-right"></i>
               </div>-->
           </div>
        </a>
     <?php if(session::get('role_id') == 1): ?>
        <a href="#" class="brand-link pt-0 pb-0" style="font-size: 1rem;" data-toggle="dropdown">
        <i class="fa fa-th text-white" style="padding: 0.5rem 0.5rem 0 1.3rem;"></i>
       
        <span class="brand-text text-white"><?php echo e(__('messages.Quick Links')); ?></span>
        
        </a>  
        <?php endif; ?>
          <div class="dropdown-menu quick-menu dropdown-menu-sm dropdown-menu-right text-left">
      <a href="<?php echo e(url('admissionView')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-user-plus"></i> <?php echo e(__('student.Student Details')); ?> </a>
<!--        <a href="<?php echo e(url('fees/add')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-money"></i> <?php echo e(__('fees.Collect Fees')); ?> </a>
-->        <a href="<?php echo e(url('expenseAdd')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-credit-card"></i> <?php echo e(__('expense.Add Expense')); ?> </a>
        <a href="<?php echo e(url('studentsAttendanceView')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-calendar-check-o"></i> <?php echo e(__('student.Student Attendance')); ?></a>
        <a href="<?php echo e(url('staff_attendance_add')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-calendar-check-o"></i> <?php echo e(__('staff.Staff Attendance')); ?></a>
<!--        <a href="<?php echo e(url('#')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-calendar-check-o"></i> <?php echo e(__('staff.Staff Panel')); ?> </a>
        <a href="<?php echo e(url('class/preiod/add')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-calendar-times-o"></i> <?php echo e(__('messages.Class Timetable')); ?></a>
        <a href="<?php echo e(url('admission/add')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-calendar-check-o"></i> <?php echo e(__('student.Student Admission')); ?></a>-->
        <a href="<?php echo e(url('complaint_view')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-calendar-check-o"></i> <?php echo e(__('master.Complain')); ?></a>
         <a href="<?php echo e(url('upload/content')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-download"></i> <?php echo e(__('messages.Upload Content')); ?></a>
       <!--<a href="<?php echo e(url('#')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-object-group"></i> <?php echo e(__('invantory.Invantory')); ?></a>
       <a href="<?php echo e(url('notice_board/view')); ?>" class="dropdown-item dropdown-footer"><i class="fa fa-bullhorn"></i> <?php echo e(__('messages.Notice Board')); ?></a>--> 
        </div>
        
     

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
       

        <!-- SidebarSearch Form -->
        <!--<div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>-->
 
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                
        <?php if(!empty($sidebar)): ?>
            <?php $__currentLoopData = $sidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $allPermisn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permisnData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($data['id'] == $permisnData): ?>
                    <li class="nav-item menu-open ">
                        <a href="<?php echo e(url($data['url'])); ?>" class="nav-link <?php echo e(url($data['url'])  == URL::current() ? 'active' : ""); ?>">
                        <i class="nav-icon fas <?php echo e($data['ican'] ?? ''); ?>"></i>
                        <?php if(Session::get('locale') == 'hi'): ?>
                            <p><?php echo e($data['hindi_name'] ?? ''); ?></p>
                        <?php else: ?>
                            <p><?php echo e($data['name'] ?? ''); ?></p>
                        <?php endif; ?>
                        </a>
                    </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <li class="nav-item menu-open ">
            <a href="<?php echo e(url('logout')); ?>" class="nav-link text-danger">
            <i class="nav-icon fa fa-sign-out"></i>
            <p>
                Log Out
            </p>
            </a>
         </li>
            
         </ul>   
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside><?php /**PATH /home/rusoft/public_html/demo3/resources/views/layout/sidebar.blade.php ENDPATH**/ ?>