<?php
$getSetting = Helper::getSetting();
$getstudentbirthday = Helper::getstudentbirthday();
$getUsersBirthday = Helper::getUsersBirthday();
$getUser=Helper::getUser();
$getSession=Helper::getSession();
$getNewChat=Helper::getNewChat();
$getAllBranch = Helper::getAllBranch();
$roleName = DB::table('role')->whereNull('deleted_at')->find(Session::get('role_id'));
?>
<style>
  .selectDesign {
    padding: 5px 10px;
    background: transparent;
    border: 1px solid #a5a5a5;
    border-radius: 4px;
  }
</style>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light p-0">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item ml-1">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
    </li>
  </ul>
<ul class="navbar-nav" style="margin-left: 73px; margin-top: 25px; color:black">
    <li class="nav-item dropdown" style="color: black;">
      <div class="Display_none_desktop" >
       <h4><?php echo e(Session::get('first_name') ?? ''); ?></h4>
       <div style="display: flex;align-items: first baseline;justify-content: space-evenly;">
           <h4><?php echo e($getUser['ClassTypes']['name'] ?? ''); ?></h4>
        <p><?php echo e($roleName->name ?? ''); ?></p>
       </div>
      </div>
    </li>
</ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto flex_centerd_profile">

    <?php if(Session::get('role_id') == 1): ?>
    <?php if(count($getstudentbirthday) > 0 || count($getUsersBirthday) > 0): ?>

    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(url('happy_birthday')); ?>" title="Today Birthday">

        <img width="40px" style="margin-top:-8px" src="<?php echo e(env('IMAGE_SHOW_PATH').'default/birthday.webp'); ?>">
      </a>
    </li>

    <?php endif; ?>
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" data-toggle="modal" data-target="#subModules" role="button" title="Search">
        <i class="fa fa-search"></i>
      </a>
    </li>
    <?php endif; ?>

    <li class="nav-item dropdown Display_none_mobile">
      <form action="<?php echo e(url('changeLang')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <select class="selectDesign select2" id="lang" name="lang" onchange="this.form.submit()">
          <?php
          $languages = DB::table('languages')->whereNull('deleted_at')->get();
          ?>
          <?php if(!empty($languages)): ?>
          <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($type->value ?? ''); ?>" <?php echo e(session()->get('locale') == $type->value ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </select>
      </form>
    </li>


    <?php if(Session::get('role_id') == 1): ?>
    <li class="nav-item dropdown">
      <div class="Display_none_mobile">
        <form action="<?php echo e(url('changeBranch')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <select class="selectDesign select2" id="branch_id" name="branch_id" onchange="this.form.submit()">
            <?php if(!empty($getAllBranch)): ?>
            <!--<option value=""> All Branch</option>-->
            <?php $__currentLoopData = $getAllBranch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <option value="<?php echo e($branch->id ?? ''); ?> " <?php echo e(( $branch->id == Session::get('admin_branch_id')) ? 'selected' : ''); ?>><?php echo e($branch->branch_name ?? ''); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </select>
        </form>
      </div>
    </li>
    <?php endif; ?>

    <?php if(Session::get('role_id') != 1): ?>
    <li class="nav-item dropdown">
      <div class="Display_none_mobile">
        <select class="selectDesign select2" id="sessionData" name="sessionData" disabled>
          <?php if(!empty($getSession)): ?>
          <?php $__currentLoopData = $getSession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($type->id ?? ''); ?> " <?php echo e(( $type->id == Session::get('session_id')) ? 'selected' : ''); ?>><?php echo e($type->from_year ?? ''); ?> - <?php echo e($type->to_year ?? ''); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </select>
      </div>
    </li>
    <?php else: ?>
    <li class="nav-item dropdown">
      <div class="Display_none_mobile">
        <form action="<?php echo e(url('sectionDataId')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <select class="selectDesign " id="sessionData" name="sessionData" onchange="this.form.submit()">
            <?php if(!empty($getSession)): ?>
            <?php $__currentLoopData = $getSession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($type->id ?? ''); ?> " <?php echo e(( $type->id == Session::get('session_id')) ? 'selected' : ''); ?>><?php echo e($type->from_year ?? ''); ?> - <?php echo e($type->to_year ?? ''); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </select>
        </form>
      </div>
    </li>
    <?php endif; ?>

    <li class="nav-item dropdown">
      <div class="Display_none_mobile">
        <a href="" id="refresh" class="refresh_btn" title="Refersh"><i class="fa fa-refresh" aria-hidden="true"></i></a>
      </div>
    </li>
    <!--<li class="nav-item dropdown">-->
    <!--  <div class="Display_none_desktop" >-->
    <!--   <h4><?php echo e(Session::get('first_name') ?? ''); ?></h4>-->
    <!--          <p><?php echo e($roleName->name ?? ''); ?></p>-->
    <!--  </div>-->
    <!--</li>-->

    <?php if(!empty(Session::get('id'))): ?>
    <li class="nav-item dropdown mobile_padding">
      <a class="user-panel" data-toggle="dropdown" href="#">
        <?php if(Session::get('role_id')==3): ?>
        <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" class="img-circle elevation-2" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'">
        <?php else: ?>
        <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" class="img-circle elevation-2" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'default/user_image.jpg'); ?>'">
        <?php endif; ?>
        
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
        
        <div class="row border-bottom mr-0">
          <div class="col-md-4 col-4">
            <?php if(Session::get('role_id')==3): ?>
            <img class="profile_user_img" src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
            <?php else: ?>
            <img class="profile_user_img" src="<?php echo e(env('IMAGE_SHOW_PATH').'/profile/'.$getUser['image']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
            <?php endif; ?>
          </div>
          <div class="col-md-8 col-8 align_centerd">
            <div>
              <h4><?php echo e(Session::get('first_name') ?? ''); ?></h4>
              <p><?php echo e($roleName->name ?? ''); ?></p>
            </div>
          </div>
        </div>

        <a href="<?php echo e(url('profile/edit')); ?>/<?php echo e(Session::get('id') ?? ''); ?>" class="<?php echo e(url('profile/edit/'.Session::get('id'))  == URL::current() ? 'dropdown-item border-bottom back_active_header' : "dropdown-item border-bottom"); ?>" >
          <i class="fa fa-user-circle mr-2" title="Profile Setting"></i>Profile Setting
          
        </a>

        <a href="<?php echo e(url('change_password')); ?>" class="<?php echo e(url('change_password')  == URL::current() ? 'dropdown-item border-bottom back_active_header' : "dropdown-item border-bottom"); ?>">
          <i class="fa fa-key mr-2"></i>Change Password
          
        </a>

        <div class="dropdown-item border-bottom Display_none_PC">
          <div class="flex_row">
            <i class="fa fa-calendar-check-o mr-2"></i>
            <form action="<?php echo e(url('sectionDataId')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <select class="form-control select" id="sessionData" name="sessionData" onchange="this.form.submit()">
                <?php if(!empty($getSession)): ?>
                <?php $__currentLoopData = $getSession; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id ?? ''); ?> " <?php echo e(( $type->id == Session::get('session_id')) ? 'selected' : ''); ?>><?php echo e($type->from_year ?? ''); ?> - <?php echo e($type->to_year ?? ''); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </select>
            </form>
          </div>
        </div>

        <a href="<?php echo e(url('logout')); ?>" class="dropdown-item border-bottom text-danger">
          <i class="fa fa-sign-out mr-2"></i> Log Out
          
        </a>

        
      </div>
    </li>
    <?php endif; ?>

  </ul>
</nav>

<div class="modal fade" id="subModules">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <input type="text" id="find_value" name="find_value" class="form-control" placeholder="Search Modules">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body" id="sub_modules" style="display: flex;flex-wrap: wrap;gap: 20px;">
        No Data Found
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="overlay">
    <div class="overlay-content">
        <button id="close-overlay">&times;</button>
       <div class="darksoul-circular-nav" onmouseover="stopanim()" onmouseout="startanim()" id="svg">
        <div class="darksoul-circle-1">

        </div>
        <a href="<?php echo e(url('teachers/index')); ?>" class="darksoul-circle-2">

            <svg id="svg1" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 32 32" width="32px" height="32px"><path d="M 12.462891 2.9921875 C 7.2252655 2.9921875 2.9570313 7.2584727 2.9570312 12.496094 C 2.9570313 17.733715 7.2252655 22.001953 12.462891 22.001953 C 13.551086 22.001953 14.59344 21.809606 15.568359 21.470703 C 15.99358 22.887072 16.692358 24.307595 17.519531 25.537109 C 18.577194 27.109224 19.7277 28.416844 21.224609 28.794922 C 26.102058 30.025875 30.187787 25.499181 28.738281 21.185547 C 28.256532 19.751584 26.978583 18.591015 25.451172 17.566406 C 24.223816 16.743079 22.81752 16.060497 21.423828 15.638672 C 21.771069 14.653136 21.96875 13.598209 21.96875 12.496094 C 21.96875 7.2584726 17.700515 2.9921875 12.462891 2.9921875 z M 12.462891 4.9921875 C 16.619636 4.9921875 19.96875 8.339351 19.96875 12.496094 C 19.96875 15.357898 18.380714 17.836704 16.035156 19.103516 A 1.0001 1.0001 0 0 0 15.617188 19.304688 C 14.657924 19.748285 13.592418 20.001953 12.462891 20.001953 C 8.306145 20.001953 4.9570313 16.652836 4.9570312 12.496094 C 4.9570312 8.339351 8.306145 4.9921875 12.462891 4.9921875 z M 20.542969 17.472656 C 21.786212 17.810526 23.17863 18.450868 24.337891 19.228516 C 25.66373 20.117907 26.6425 21.223229 26.84375 21.822266 C 27.804244 24.680631 25.251442 27.748516 21.712891 26.855469 C 21.264781 26.740933 20.097832 25.784656 19.179688 24.419922 C 18.399212 23.25982 17.748239 21.852135 17.408203 20.595703 C 18.682449 19.814124 19.756598 18.743656 20.542969 17.472656 z"/></svg>
        </a>
        <div class="darksoul-circle-3">

        </div>
        <a href="<?php echo e(url('admissionView')); ?>" class="darksoul-circle-4">
            <svg id="svg2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 32 32">
                <path d="M 20.455078 4.7519531 C 19.347051 4.7757776 18.202062 5.0893295 17.111328 5.7636719 C 14.890526 7.1361011 12.838975 8.7495765 10.990234 10.566406 C 8.5649573 12.950567 6.8890333 15.898332 5.8632812 19.070312 A 1.0001 1.0001 0 0 0 5.6757812 19.724609 C 5.0803984 21.789935 4.6916746 23.920766 4.7421875 26.107422 C 4.7563305 26.730187 5.2715454 27.244697 5.8945312 27.257812 C 8.0805181 27.308113 10.210713 26.919488 12.275391 26.324219 A 1.0001 1.0001 0 0 0 12.929688 26.136719 C 16.101605 25.110844 19.048028 23.433772 21.431641 21.007812 C 23.249576 19.157965 24.862109 17.106227 26.234375 14.886719 C 28.032621 11.978096 27.264736 8.6944239 25.285156 6.7148438 C 24.295366 5.7250536 22.978936 5.0371209 21.546875 4.8222656 C 21.18886 4.7685518 20.82442 4.7440116 20.455078 4.7519531 z M 20.541016 6.7207031 C 20.796625 6.7147589 21.047429 6.732706 21.292969 6.7714844 C 22.275127 6.9265978 23.165509 7.4233213 23.871094 8.1289062 C 25.282264 9.5400762 25.858957 11.691561 24.533203 13.835938 C 24.461793 13.951431 24.355983 14.039771 24.283203 14.154297 C 22.809995 11.415367 20.586852 9.18791 17.851562 7.7089844 C 17.963773 7.6377404 18.050919 7.5347649 18.164062 7.4648438 C 18.968204 6.9676861 19.774189 6.7385358 20.541016 6.7207031 z M 16.125 9.0644531 C 19.138178 10.456945 21.544591 12.863417 22.929688 15.880859 C 21.993489 17.156927 21.112563 18.479338 20.005859 19.605469 C 18.042935 21.603265 15.661654 23.069064 13.082031 24.023438 C 12.548664 21.426565 10.573434 19.451336 7.9765625 18.917969 C 8.9306698 16.338659 10.395766 13.957421 12.392578 11.994141 C 13.520031 10.886148 14.846417 10.002092 16.125 9.0644531 z M 7.4335938 20.806641 C 9.3891799 21.132294 10.867706 22.61082 11.193359 24.566406 C 9.7647736 24.934212 8.3058475 25.156333 6.8105469 25.189453 C 6.8436669 23.694148 7.0658132 22.235277 7.4335938 20.806641 z"></path>
                </svg>
        </a>
        <a href="<?php echo e(url('/')); ?>" class="darksoul-circle-5">
            
        <svg id="svg5"  viewBox="0 0 32 32" width="32px" height="32px">
            
            <path d="M 16.105469 2.5351562 C 15.649335 2.5315682 15.193947 2.6430484 14.791016 2.8710938 C 12.204135 4.3291982 9.3582739 6.0810231 6.3964844 7.7871094 A 1.0001 1.0001 0 0 0 6.390625 7.7910156 C 4.934111 8.6442641 3.7537333 9.984391 3.5507812 11.599609 A 1.0001 1.0001 0 0 0 3.5507812 11.601562 C 3.070352 15.475925 3.2819546 19.358573 4.1835938 23.226562 A 1.0001 1.0001 0 0 0 4.1894531 23.246094 C 4.4585727 24.308167 5.1073155 25.27809 5.9121094 26.095703 C 6.7169032 26.913317 7.6791299 27.579013 8.7421875 27.863281 A 1.0001 1.0001 0 0 0 8.7617188 27.869141 C 13.579059 29.056186 18.420941 29.056186 23.238281 27.869141 A 1.0001 1.0001 0 0 0 23.257812 27.863281 C 24.320871 27.579013 25.283157 26.913542 26.087891 26.095703 C 26.892624 25.277864 27.542058 24.306963 27.810547 23.244141 A 1.0001 1.0001 0 0 0 27.814453 23.226562 C 28.718163 19.352345 28.930776 15.464439 28.447266 11.583984 A 1.0001 1.0001 0 0 0 28.445312 11.582031 C 28.242468 9.9798449 27.07737 8.6471954 25.634766 7.7910156 A 1.0001 1.0001 0 0 0 25.628906 7.7871094 C 22.732857 6.095988 19.951052 4.355459 17.417969 2.8886719 C 17.01807 2.6566693 16.561603 2.5387444 16.105469 2.5351562 z M 16.091797 4.5097656 C 16.190422 4.5107078 16.289962 4.5471445 16.414062 4.6191406 C 18.902981 6.0603535 21.691183 7.8027971 24.621094 9.5136719 C 25.63428 10.117407 26.372813 11.145633 26.460938 11.832031 C 26.91478 15.474383 26.718353 19.107322 25.869141 22.755859 C 25.727048 23.31585 25.268911 24.076675 24.662109 24.693359 C 24.055311 25.31004 23.303878 25.779371 22.744141 25.929688 C 21.997265 26.11325 21.253393 26.082382 20.507812 26.205078 C 20.945272 23.683317 20.958002 21.066257 20.421875 18.570312 A 1.0001 1.0001 0 0 0 20.396484 18.341797 A 1.0001 1.0001 0 0 0 20.375 18.261719 A 1.0001 1.0001 0 0 0 20.371094 18.246094 A 1.0001 1.0001 0 0 0 20.363281 18.222656 A 1.0001 1.0001 0 0 0 20.355469 18.203125 A 1.0001 1.0001 0 0 0 20.324219 18.130859 A 1.0001 1.0001 0 0 0 20.277344 18.042969 A 1.0001 1.0001 0 0 0 19.386719 17.550781 C 17.224714 16.610059 14.8144 16.617036 12.652344 17.554688 A 1.0001 1.0001 0 0 0 11.603516 18.341797 C 11.602316 18.346897 11.602764 18.352322 11.601562 18.357422 A 1.0001 1.0001 0 0 0 11.578125 18.564453 A 1.0001 1.0001 0 0 0 11.578125 18.568359 C 11.04162 21.064863 11.054622 23.68268 11.492188 26.205078 C 10.746607 26.082382 10.002735 26.113247 9.2558594 25.929688 C 8.6960893 25.779394 7.9448786 25.310016 7.3378906 24.693359 C 6.7320554 24.077874 6.2742554 23.319202 6.1308594 22.759766 C 5.2833441 19.117002 5.0844626 15.486039 5.5351562 11.849609 L 5.5351562 11.847656 C 5.623024 11.154921 6.3775335 10.115977 7.4023438 9.515625 C 10.394786 7.7916807 13.239164 6.0397011 15.773438 4.6113281 A 1.0001 1.0001 0 0 0 15.775391 4.6113281 C 15.895459 4.5433734 15.993171 4.5088235 16.091797 4.5097656 z M 16 18.744141 C 16.858834 18.742541 17.69746 19.001507 18.505859 19.339844 C 18.957083 21.671327 18.962039 24.134409 18.478516 26.455078 C 16.827372 26.604628 15.172628 26.604628 13.521484 26.455078 C 13.038759 24.138253 13.043261 21.679682 13.492188 19.351562 C 14.299845 19.009047 15.139857 18.745697 16 18.744141 z"/>
            
            </svg>
        </a>
        <a href="<?php echo e(url('viewUser')); ?>" class="darksoul-circle-6">
            <svg id="svg3" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 32 32">
                <path d="M 15.857422 3.015625 C 13.583363 3.0341579 11.309618 3.4941687 9.0605469 4.3945312 C 7.3131314 5.0939849 6.0588651 6.6124601 5.5742188 8.3867188 C 3.9302864 14.408984 3.979683 20.470192 5.7207031 26.490234 C 6.1731256 28.054988 7.8218378 29.052054 9.4257812 28.574219 A 1.0001 1.0001 0 0 0 9.4277344 28.574219 C 11.461092 27.967103 13.817877 26.805283 15.982422 25.089844 C 16.004472 25.072364 15.982511 25.07049 16.009766 25.09375 A 1.0001 1.0001 0 0 0 16.009766 25.095703 C 18.117576 26.890652 20.550662 28.017842 22.609375 28.597656 C 24.205007 29.047667 25.825388 28.05488 26.275391 26.505859 A 1.0001 1.0001 0 0 0 26.275391 26.503906 C 28.018455 20.482908 28.071568 14.421752 26.429688 8.3984375 C 25.909351 6.4889364 24.479412 4.9842541 22.658203 4.2851562 C 20.407376 3.4208261 18.131481 2.9970921 15.857422 3.015625 z M 15.873047 5.0019531 C 17.887483 4.985486 19.903233 5.3696739 21.941406 6.1523438 C 23.194197 6.633246 24.154336 7.6553292 24.5 8.9238281 C 26.05012 14.610514 26.000458 20.25827 24.353516 25.947266 L 24.355469 25.947266 C 24.199472 26.484245 23.648712 26.811864 23.152344 26.671875 A 1.0001 1.0001 0 0 0 23.150391 26.671875 C 21.353793 26.165883 19.148358 25.140254 17.308594 23.574219 L 17.306641 23.572266 C 16.583881 22.957185 15.489496 22.929464 14.740234 23.523438 C 12.788779 25.069999 10.620112 26.131319 8.8554688 26.658203 C 8.3519949 26.808257 7.8008041 26.483891 7.6425781 25.935547 A 1.0001 1.0001 0 0 0 7.6425781 25.933594 C 5.9975982 20.245683 5.9518386 14.599797 7.5039062 8.9140625 C 7.8332599 7.708321 8.6841029 6.7004995 9.8046875 6.2519531 C 11.844616 5.4353157 13.858606 5.0184202 15.873047 5.0019531 z"></path>
                </svg>
        </a>
        <div class="darksoul-circle-7">

        </div>
        <a  href="<?php echo e(url('Fees/add')); ?>"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fee Collect" class="darksoul-circle-8">
          
            <img  src='<?php echo e(env("IMAGE_SHOW_PATH")); ?>default/pay_625599.png'/>
        </a>
        <div class="darksoul-circle-9"> 

        </div>
    </div>
    </div>
</div>

<!--<button id="show-overlay">Show Overlay</button>-->

<script>
    document.addEventListener('DOMContentLoaded', function () {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
})
</script>
<script>
  $(document).ready(function() {
    var BASEURL = "<?php echo e(url('/')); ?>";
    $(document).on('keyup', '#find_value', function() {
          $('#sub_modules').html('')
      var values = $(this).val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: BASEURL + '/get_modules',
        data: {
          name: values
        },
        success: function(data) {
         $('#sub_modules').html(data)
        }
      });
    });
  });
</script>


<script>
  function SearchValue() {

    var BASEURL = "<?php echo e(url('/')); ?>";
    var SearchItem = $('#SearchItem').val();

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url: BASEURL + '/all_students_search',
      data: {
        name: SearchItem
      },
      success: function(data) {

        $('.students_search').html('');
        $('.students_search').html(data);

      }
    });

  }
</script>
<script>
  var today = new Date();
  var day = today.getDate();
  var month = today.getMonth() + 1;

  function appendZero(value) {
    return "0" + value;
  }

  function theTime() {
    var d = new Date();
    document.getElementById("time").innerHTML = d.toLocaleTimeString("en-US");
  }

  if (day < 10) {
    day = appendZero(day);
  }

  if (month < 10) {
    month = appendZero(month);
  }

  today = day + "-" + month + "-" + today.getFullYear();

  document.getElementById("date").innerHTML = today;

  var myVar = setInterval(function() {
    theTime();
  }, 1000);
</script>

<script>
  $(document).ready(function() {
    // Function to show or hide the brand title
    function brandShow() {
      if ($('.sidebar').hasClass('os-host-scrollbar-horizontal-hidden')) {
        $('.brand_title').show();
      } else {
        $('.brand_title').hide();
      }
    }

    // Run the function initially to set the correct state
    brandShow();

    // Observe DOM changes and run the function when needed
    const observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.attributeName === 'class') {
          brandShow();
        }
      });
    });

    // Start observing the sidebar element for attribute changes
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
      observer.observe(sidebar, {
        attributes: true
      });
    }
  });
</script>

<script>


    $(document).ready(function(){
        
$('body').on("dblclick", function() {
   
        $("#overlay").fadeIn();
    
});

       
   

    $("#close-overlay").click(function() {
        $("#overlay").fadeOut();
    });
    
    $("#overlay").click(function(event) {
        if ($(event.target).is("#overlay")) {
            $("#overlay").fadeOut();
        }
    });
});
</script>
<script>
     let s1 = document.getElementById("svg1");
        let s2 = document.getElementById("svg2");
        let s3 = document.getElementById("svg3");
        let s4 = document.getElementById("svg4");
        let s5 = document.getElementById("svg5");
        function stopanim() {
            s1.style.animationPlayState = "paused";
            s2.style.animationPlayState = "paused";
            s3.style.animationPlayState = "paused";
            s4.style.animationPlayState = "paused";
            s5.style.animationPlayState = "paused";
            
        }
        function startanim() {
            s1.style.animationPlayState = "running";
            s2.style.animationPlayState = "running";
            s3.style.animationPlayState = "running";
            s4.style.animationPlayState = "running";
            s5.style.animationPlayState = "running";
        }
</script>

<style>
.Display_none_desktop{
    display:none;
}

/* Overlay screen */
#overlay {
    display: none; /* Hidden by default */
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.33); 
    z-index: 1000; /* Sit on top */
}

/* Overlay content */
.overlay-content {
    position: relative;
    /*width: 50%;*/
    margin: 10% auto; /* Center the overlay */
    padding: 20px;
    /*background: white;*/
    border-radius: 10px;
}

/* Close button */
#close-overlay {
    position: absolute;
    /*top: 10px;*/
    left: 10%;
    background-color: transparent;
    border: none;
    color:white;
    font-size: 40px;
    cursor: pointer;
}
  @media  screen and (max-width:600px) {
    .user-panel {
      padding: 0px 0px !important
    }
    
  }

  .solid {
    border: solid thin;
    margin: 4px;
    width: 110px;
    height: 91px;
  }

  .center {
    margin-left: 33%;
  }

  .user-panel {
    padding: 0px 1rem;
  }

  .user-panel img {
    height: 2rem;
    width: 2rem;
    margin-top: 4px;
  }

  .preloader {
    /*background-color:#f7f7f7e8;
*/
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 999999;
    -webkit-transition: .6s;
    -o-transition: .6s;
    transition: .6s;
    margin: 0 auto;
  }

  .preloader .preloader-circle {
    width: 169px;
    height: 169px;
    position: relative;
    border-style: solid;
    border-width: 1px;
    border-top-color: #ff2020;
    border-bottom-color: transparent;
    border-left-color: transparent;
    border-right-color: transparent;
    z-index: 10;
    border-radius: 50% ! important;
    -webkit-box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
    box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
    background-color: #ffffff;
    -webkit-animation: zoom 2000ms infinite ease;
    animation: zoom 2000ms infinite ease;
    -webkit-transition: .6s;
    -o-transition: .6s;
    transition: .6s;
  }

  .preloader .preloader-circle2 {
    border-top-color: #0078ff;
  }

  .preloader .preloader-img {
    position: absolute;
    top: 50%;
    z-index: 200;
    left: 0;
    right: 0;
    margin: 0 auto;
    text-align: center;
    display: inline-block;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    padding-top: 6px;
    -webkit-transition: .6s;
    -o-transition: .6s;
    transition: .6s;
  }

  .preloader .preloader-img img {
    max-width: 163px
  }

  . .preloader .pere-text strong {
    font-weight: 800;
    color: #dca73a;
    text-transform: uppercase;
  }

  @-webkit-keyframes zoom {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: .6s;
      -o-transition: .6s;
      transition: .6s
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
      -webkit-transition: .6s;
      -o-transition: .6s;
      transition: .6s
    }
  }

  @keyframes  zoom {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: .6s;
      -o-transition: .6s;
      transition: .6s
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
      -webkit-transition: .6s;
      -o-transition: .6s;
      transition: .6s;
    }
  }

  .section-padding2 {
    padding-top: 200px;
    padding-bottom: 200px;
  }

  @media  only screen and (min-width: 1200px) and (max-width: 1600px) {
    .section-padding2 {
      padding-top: 200px;
      padding-bottom: 200px;
    }
  }

  @media  only screen and (min-width: 992px) and (max-width: 1199px) {
    .section-padding2 {
      padding-top: 200px;
      padding-bottom: 200px;
    }
  }

  @media  only screen and (min-width: 768px) and (max-width: 991px) {
    .section-padding2 {
      padding-top: 100px;
      padding-bottom: 100px;
    }
  }

  @media  only screen and (min-width: 576px) and (max-width: 767px) {
    .section-padding2 {
      padding-top: 50px;
      padding-bottom: 50px;
    }
  }

  @media (max-width: 575px) {
    .section-padding2 {
      padding-top: 50px;
      padding-bottom: 50px
    }
  }

  .padding-bottom {
    padding-bottom: 250px;
  }

  @media  only screen and (min-width: 1200px) and (max-width: 1600px) {
    .padding-bottom {
      padding-bottom: 250px;
    }
  }

  @media  only screen and (min-width: 992px) and (max-width: 1199px) {
    .padding-bottom {
      padding-bottom: 150px;
    }
  }

  @media  only screen and (min-width: 768px) and (max-width: 991px) {
    .padding-bottom {
      padding-bottom: 40px;
    }
  }

  @media  only screen and (min-width: 576px) and (max-width: 767px) {
    .padding-bottom {
      padding-bottom: 10px;
    }
  }

  @media (max-width: 575px) {
    .padding-bottom {
      padding-bottom: 10px;
    }
    .Display_none_desktop{
        display:block;
        color:black;
        margin: 0px auto;
    }
  }

  .lf-padding {
    padding-left: 60px;
    padding-right: 60px;
  }

  @media  only screen and (min-width: 992px) and (max-width: 1199px) {
    .lf-padding {
      padding-left: 60px;
      padding-right: 60px;
    }
  }

  @media  only screen and (min-width: 768px) and (max-width: 991px) {
    .lf-padding {
      padding-left: 30px;
      padding-right: 30px
    }
  }

  @media  only screen and (min-width: 576px) and (max-width: 767px) {
    .lf-padding {
      padding-left: 15px;
      padding-right: 15px;
    }
  }

  .align-items-center {
    -ms-flex-align: center !important;
    align-items: center !important;
  }

  .justify-content-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
  }

  .d-flex {
    display: -ms-flexbox !important;
    display: flex !important;
  }
  
  
  .darksoul-circular-nav
        {
            margin: auto;
            width: 300px;
            height: 300px;
            display: grid;
            grid-template-columns: auto auto auto;
            border-radius: 50%;
            animation-name: nav-rotate;
            animation-iteration-count: infinite;
            animation-duration: 10s;
            animation-delay: 0s;
            animation-timing-function: linear;
            
        }
        .darksoul-circle-1
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
           
            margin: auto;
        }
        .darksoul-circle-2
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(255, 255, 255);
            box-shadow: 1px 1px 20px rgb(208, 207, 207);
            margin: auto;
            display: flex;
        
        }
        .darksoul-circle-3
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            
            margin: auto;
        }
        .darksoul-circle-4
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(255, 255, 255);
            box-shadow: 1px 1px 20px rgb(208, 207, 207);
            margin: auto;
            display: flex;
        }
        .darksoul-circle-5
        {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: rgb(255, 255, 255);
            box-shadow: 1px 1px 20px rgb(208, 207, 207);
            margin: auto;
            display: flex;
        }
        svg
        {
            margin: auto;
            animation-name: svg-rotate;
            animation-iteration-count: infinite;
            animation-duration: 10s;
            animation-delay: 0s;
            animation-timing-function: linear;
        }
     
        .darksoul-circle-6
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(255, 255, 255);
            box-shadow: 1px 1px 20px rgb(208, 207, 207);
            margin: auto;
            display: flex;
        }
        .darksoul-circle-7
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
       
            margin: auto;
        }
        .darksoul-circle-8
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            /*background-color: rgb(255, 255, 255);*/
            /*box-shadow: 1px 1px 20px rgb(208, 207, 207);*/
            margin: auto;
            display: flex;
        }
        .darksoul-circle-9
        {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: auto;
        }
        
        .darksoul-circular-nav:hover 
        {
            animation-play-state: paused;
        }
        .darksoul-circle-2:hover
        {
          transform: scale(1.09);
          transition: 0.5s;
          cursor: pointer;
          box-shadow: 1px 1px 40px rgb(208, 207, 207);
          animation-play-state: paused;
        }
        .darksoul-circle-4:hover
        {
          transform: scale(1.09);
          transition: 0.5s;
          cursor: pointer;
        }
        .darksoul-circle-6:hover
        {
          transform: scale(1.09);
          transition: 0.5s;
          cursor: pointer;
        }
        .darksoul-circle-8:hover
        {
          transform: scale(1.09);
          transition: 0.5s;
          cursor: pointer;
        }
        .darksoul-circle-5:hover
        {
          transform: scale(1.09);
          transition: 0.5s;
          cursor: pointer;
        }

        @keyframes  nav-rotate {
            
            100%
            {
                transform: rotate(360deg);
            }
        }
        @keyframes  svg-rotate {
            
            100%
            {
                transform: rotate(-360deg);
            }
        }
        .disclaimer
        {
            margin: auto;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        a
        {
            color: black;
            text-decoration: none;
            font-weight: 500;
        }
        a:hover
        {
            color: rgb(105, 106, 106);
        }
</style><?php /**PATH /home/rusoft/public_html/demo3/resources/views/layout/header.blade.php ENDPATH**/ ?>