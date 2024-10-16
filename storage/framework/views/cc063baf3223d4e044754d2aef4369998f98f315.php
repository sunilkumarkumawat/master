<?php
    $getHostel = Helper::getHostel();
    $classType = Helper::classType();
    $getgenders = Helper::getgender();
    $getSetting=Helper::getSetting();
    $getPaymentMode = Helper::getPaymentMode();

   
?>
 
<?php $__env->startSection('content'); ?>
<style>
.select2-container .select2-selection--single {height:38px !important;}
.select2-container--default .select2-selection--single .select2-selection__arrow {height:38px !important;}
.c_height {height: 160px;overflow-y:scroll;}
.c_height1 {height: 260px;overflow-y:scroll;}
.bed {
    display: none;
}
@media (max-width: 600px) {
  .modal div {
      font-size:10px;
  }
}
@media (min-width: 605px) {
  .level4 .btn-xs {
      font-size:1.7rem;
  }
}
</style>

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row text-center">
          <div class="col-12">
            <div class="card card-outline card-orange">
                
                    <div class="row text-center m-2">
                        <div class="col-md-12">
                        <?php if(!empty($getHostel)): ?> 
                            <?php $__currentLoopData = $getHostel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button class="btn btn-primary hostels" data-id="<?php echo e($hostel->id ?? ''); ?>"><?php echo e($hostel->name ?? ''); ?></button>
        	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </div>
               <div style='transform: scale(0.8, 0.8);transform-origin: top left;transition: transform 0.5s ease;'>         
              <div id='boys_hostel' class='pt-4 text-center'style='display:none'> 
              
              <div class='p-2 text-center'>
                 <button class="btn btn-primary floor" data-label="all">All</button>
                 <button class="btn btn-outline-primary floor" data-label="third_floor">3rd Floor</button>
                 <button class="btn btn-outline-primary floor" data-label="forth_floor">4th Floor</button>
                 <button class="btn btn-outline-primary floor" data-label="fifth_floor">5th Floor</button>
                </div>        
                   <div id='third_floor' class='mt-3'style='border:3px solid black'>      
                   <p><i class="fa fa-dot-circle-o"></i><strong>3rd Floor</strong></p>
<div class="d-flex">                        
                       
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>301</span>
      <div class="upper-part_3">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'>Store<br>Room</strong></div>
       
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>302</span>
           <div class="upper-part_3">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'>Hostel Warden<br>Room</strong></div>
       
       <img class='hostel_door' style='left: 55px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
    
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>303</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-room='303' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box" data-room='303' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-room='303' data-bed='3'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box" data-room='303' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
           <div class="box_none"></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
           <div class="box_none"></div>
         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>304</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-room='304' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
           <div class="box_none"></div>
        <div class="box" data-room='304' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2" data-room='304' data-bed='3'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box" data-room='304' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
           <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
           <div class="box_none"></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
  
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>305</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          <div class="box_none"></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
           <div class="box_none"></div>
        <div class="box_none"> </div>

        <div class="box_none"></div>
   <div class="box_none"></div>
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>306</span>
       <div class="upper-part_3">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
       
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
   
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>307</span>
   <div class="upper-part_3">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
       
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>308</span>
         <div class="upper-part_3">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
       
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
   
</div>
 <div class="fixed-container-big">
      <span class='font-weight-bold text-danger pb-1'>&nbsp;</span>
          <div class="bathroom">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-dark" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>
        <div class="box_none bg-white" style='width:109px !important'><img class='hostel_stairs'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/stairs.png"/></div>
        <div class="box_none bg-dark" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>
        
      
    </div>
  
    
</div>
</div>
<div class="d-flex">                        
                       
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>317</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>316</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>315</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>314</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>313</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>312</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>
 

 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>311</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>

 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>310</span>
        <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>309</span>
          <div class="lower-part_2">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
       <div class="box_none bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>
    </div>
</div>

</div>
</div>       
                  <div id='forth_floor' class='mt-3'style='border:3px solid black'>   
                  
                <p><i class="fa fa-dot-circle-o"></i><strong>4th Floor</strong></p>
<div class="d-flex">                        
                       
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>401</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='1' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='1' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='1' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='1' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box " data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='1' data-bed='5'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='1' data-bed='6'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='1' data-bed='7'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>402</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='2' data-bed='8'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='2' data-bed='9'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='2' data-bed='10'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='2' data-bed='11'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box " data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='2' data-bed='12'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='2' data-bed='13'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='2' data-bed='14'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
    
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>403</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='3' data-bed='15'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='3' data-bed='16'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='3' data-bed='17'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='3' data-bed='18'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='3' data-bed='19'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='3' data-bed='20'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-floor='1' data-building='1' data-room='3' data-bed='21'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>404</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='4' data-bed='22'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='4' data-bed='23'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1' data-building='1' data-floor='1'  data-room='4' data-bed='24'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='4' data-bed='25'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='4' data-bed='26'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='4' data-bed='27'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='4' data-bed='28'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
  
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>405</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='5' data-bed='29' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='5' data-bed='30' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='5' data-bed='31' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='5' data-bed='32'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='5' data-bed='33'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='5' data-bed='34' ><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='5' data-bed='35'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>406</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='6' data-bed='36' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='6' data-bed='37' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='6' data-bed='38' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='6' data-bed='39' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='6' data-bed='40' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='6' data-bed='41' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='6' data-bed='42' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
   
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>407</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='7' data-bed='43' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='7' data-bed='44' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='7' data-bed='45' ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='7' data-bed='46' ><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='7' data-bed='47' ><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='7' data-bed='48' ><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='7' data-bed='49' ><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>408</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='8' data-bed='50'  ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='8' data-bed='51'  ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='8' data-bed='52'  ><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='8' data-bed='53'  ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='8' data-bed='54'  ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='8' data-bed='55'  ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='8' data-bed='56'  ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
   
</div>
 <div class="fixed-container-big">
      <span class='font-weight-bold text-danger pb-1'>&nbsp;</span>
          <div class="bathroom">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-dark" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>
        <div class="box_none bg-white" style='width:109px !important'><img class='hostel_stairs'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/stairs.png"/></div>
        <div class="box_none bg-dark" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>
        
      
    </div>
  
    
</div>
</div>
<div class="d-flex">                        
                       
 <div class="fixed-container-big">
    <span class='font-weight-bold text-danger pb-1'>414</span>
      <div class="upper-part_2">
            <img class='hostel_door_2' style='left: 174px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
        
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
     
       <!-- 1 Boxes -->
        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            
            
              <!-- 2 Boxes -->  
        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            <!-- 3 Boxes -->
            
            
        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          
          
              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
       
         <div class="box_none"></div>
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
         
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
        
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
              
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          
         
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            <div class="box_none"></div>
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
            
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
              
        
       
         
    </div>
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>413</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
       
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='13' data-bed='85'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='13' data-bed='86'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='13' data-bed='87'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <div class="box mb-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='13' data-bed='88'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='13' data-bed='89'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='13' data-bed='90'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='13' data-bed='91'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>412</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='12' data-bed='78'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='12' data-bed='79'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='12' data-bed='80'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box mb-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='12' data-bed='81'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='12' data-bed='82'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='12' data-bed='83'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='12' data-bed='84'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>

 <div class="fixed-container-big_2">
      <span class='font-weight-bold text-danger pb-1'>Library</span>
          <div class="upper-part_3">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-white" ><strong class='text-danger rotate-120'>Library</strong></div>
    </div>
  
  
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>411</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='11' data-bed='71'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='11' data-bed='72'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='11' data-bed='73'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box mb-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='11' data-bed='74'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='11' data-bed='75'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='11' data-bed='76'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='11' data-bed='77'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>

 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>410</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
       
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='10' data-bed='64' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='10' data-bed='65' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box mt-2" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='10' data-bed='66' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <div class="box mb-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='10' data-bed='67'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='10' data-bed='68'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='10' data-bed='69'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='10' data-bed='70'><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>409</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='9' data-bed='57' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='9' data-bed='58' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='9' data-bed='59' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box mb-2"  data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='9' data-bed='60' ><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='9' data-bed='61'  ><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='9' data-bed='62' ><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-admission_id='' data-assign_id='' data-hostel='1'  data-building='1' data-floor='1' data-room='9' data-bed='63' ><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>

</div>
</div>
                  <div id='fifth_floor' class='mt-3'style='border:3px solid black'>      
                   <p><i class="fa fa-dot-circle-o"></i><strong>5th Floor</strong></p>
<div class="d-flex">                        
                       
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>501</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box " data-hostel='501' data-floor='501' data-building='501' data-room='501' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box " data-room='501' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box " data-room='501' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none "></div>
        <div class="box_none"></div>
        <div class="box mt-2 " data-room='501' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box " data-room='501' data-bed='5'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-room='501' data-bed='6'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box" data-room='501' data-bed='7'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>502</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-room='502' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-room='502' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-room='502' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2" data-room='502' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box " data-room='502' data-bed='5'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-room='502' data-bed='6'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box" data-room='502' data-bed='7'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
    
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>503</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-room='503' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-room='503' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-room='503' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-room='503' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box" data-room='503' data-bed='5'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-room='503' data-bed='6'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box" data-room='503' data-bed='7'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>504</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box" data-room='504' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-room='504' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box" data-room='504' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2" data-room='504' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box" data-room='504' data-bed='5'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2" data-room='504' data-bed='6'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box" data-room='504' data-bed='7'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
  
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>505</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>506</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box "><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
   
</div>
 <div class="fixed-container">
    <span class='font-weight-bold text-danger pb-1'>507</span>
      <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
   
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>508</span>
          <div class="upper-part">
        <!-- 9 Boxes in the upper part -->
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
    </div>
  
   
</div>
 <div class="fixed-container-big">
      <span class='font-weight-bold text-danger pb-1'>&nbsp;</span>
          <div class="bathroom">
        <!-- 9 Boxes in the upper part -->
        <div class="box_none bg-dark" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>
        <div class="box_none bg-white" style='width:109px !important'><img class='hostel_stairs'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/stairs.png"/></div>
        <div class="box_none bg-dark" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>
        
      
    </div>
  
    
</div>
</div>
<div class="d-flex">                        
                       
 <div class="fixed-container-big">
    <span class='font-weight-bold text-danger pb-1'>517</span>
      <div class="upper-part_2">
            <img class='hostel_door_2' style='left: 174px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
        
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
     
       <!-- 1 Boxes -->
        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            
            
              <!-- 2 Boxes -->  
        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            <!-- 3 Boxes -->
            
            
        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          
          
              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
       
         <div class="box_none"></div>
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
         
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
        
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
              
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          
         
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            <div class="box_none"></div>
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
            
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
       
         <div class="box_none"></div>
         <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box_none"></div>
          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
              
        
       
         
    </div>
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>516</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
       
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>514</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>514</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
       
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>513</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>512</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
       
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 


 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>511</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box "><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>

 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>510</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
       
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"></div>
        <div class="box_none"></div>
          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
      
        <div class="box_none"> </div>
        <div class="box_none"></div>
         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>
 <div class="fixed-container">
      <span class='font-weight-bold text-danger pb-1'>509</span>
          <div class="lower-part">
               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> 
        <!-- 9 Boxes in the upper part -->
      
        <div class="box_none"></div>
          <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"></div>
        <div class="box_none"></div>
       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box_none"> </div>
        <div class="box_none"></div>
          <div class="box "><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>
        
    </div>
  
    
</div>

</div>
</div>
                        
      
                    </div>
                    </div>
                    
                    <div class="studentinformation mt-3 position-fixed "
                      style="border: 3px solid black; top: 122px; text-align: left;right:38px;width: 350px;">
                        
                        <div class='row  all_hostel_detail'>
                            <div class='col-md-12'>
                                
                                <table border=1 width='100%'>
                                    <thead>
                                        <tr>
                                            <td><strong>Hostel</strong></td>
                                            <td id='hostel'>All</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Floor</strong></td>
                                            <td id='floor'>All</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Seats</strong></td>
                                            <td id='total_seats'></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Available Seats</strong></td>
                                            <td id='available_seat'></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Enrolled</strong></td>
                                            <td><strong style='width:100px;display:inline-block'>Unnati Girls</strong><span>: 20</span><br><strong style='width:100px;display:inline-block'>Uday Boys</strong><span>: 20</span></td>
                                        </tr>
                                       
                                    </thead>
                                </table>
                                <table border=1 width='100%'>
                                    <thead>
                                        <tr>
                                            <td><strong>Today Enquiries</strong></td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Today Seat Booked</strong></td>
                                            <td>200</td>
                                        </tr>
                                     
                                       
                                    </thead>
                                </table>
                               
                            </div>
                            
                            
                        </div>
                        <div class="selected_student_detail" style='display:none'>
                      <div class="card d-flex flex-fill m-0" >
                          
                          <button class='btn btn-xs btn-primary m-1 w-25 go_back'>Back</button>
                        <div class="card-header text-muted border-bottom-0">
                          <!--Digital Strategist-->&nbsp;
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-7">
                              <h2 class="lead name_student"><b></b></h2>
                              <p class="text-muted text-sm detail_student"></p>
                              
                              
                            </div>
                            <div class="col-5 text-center">
                              <img src="" class="img-circle img-fluid image_student">
                            </div>
                          </div>
                        </div>
                   <!--     <div class="card-footer">
                          <div class="text-right">
                            <a href="#" class="btn btn-sm bg-teal">
                              <i class="fa fa-comments"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                              <i class="fa fa-user"></i> View Profile
                            </a>
                          </div>
                        </div>-->
                      </div>
                      </div>
                    </div>

                    
<!--        <div id='girl_hostel' style='display:none'>          -->
                        
<!--                   <div id='third_floor' class='mt-3'style='border:3px solid black'>      -->
<!--                   <p><i class="fa fa-dot-circle-o"></i><strong>3rd Floor</strong></p>-->
<!--<div class="d-flex">                        -->
                       
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>301</span>-->
<!--      <div class="upper-part_3">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white border-0" ><strong class='text-danger rotate-120'>Store<br>Room</strong></div>-->
       
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>302</span>-->
<!--           <div class="upper-part_3">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white border-0" ><strong class='text-danger rotate-120'>Hostel Warden<br>Room</strong></div>-->
       
<!--       <img class='hostel_door' style='left: 55px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>303</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='303' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='303' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='303' data-bed='3'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='303' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--           <div class="box_none"></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--           <div class="box_none"></div>-->
<!--         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>304</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='304' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--           <div class="box_none"></div>-->
<!--        <div class="box" data-room='304' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2" data-room='304' data-bed='3'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='304' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--           <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--           <div class="box_none"></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
  
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>305</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--           <div class="box_none"></div>-->
<!--        <div class="box_none"> </div>-->

<!--        <div class="box_none"></div>-->
<!--   <div class="box_none"></div>-->
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>306</span>-->
<!--       <div class="upper-part_3">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
       
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>307</span>-->
<!--   <div class="upper-part_3">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
       
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>308</span>-->
<!--         <div class="upper-part_3">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
       
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
   
<!--</div>-->
<!-- <div class="fixed-container-big">-->
<!--      <span class='font-weight-bold text-danger pb-1'>&nbsp;</span>-->
<!--          <div class="bathroom">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>-->
<!--        <div class="box bg-white" style='width:109px !important'><img class='hostel_stairs'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/stairs.png"/></div>-->
<!--        <div class="box bg-white" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>-->
        
      
<!--    </div>-->
  
    
<!--</div>-->
<!--</div>-->
<!--<div class="d-flex">                        -->
                       
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>317</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>316</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>315</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>314</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>313</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>312</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->
 

<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>311</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->

<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>310</span>-->
<!--        <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>309</span>-->
<!--          <div class="lower-part_2">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--       <div class="box bg-white border-0" ><strong class='text-danger rotate-120'></strong></div>-->
<!--    </div>-->
<!--</div>-->

<!--</div>-->
<!--</div>       -->
                        
                        
                        
                        
<!--                  <div id='forth_floor' class='mt-3'style='border:3px solid black'>   -->
                  
<!--                <p><i class="fa fa-dot-circle-o"></i><strong>4th Floor</strong></p>-->
<!--<div class="d-flex">                        -->
                       
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>401</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box " data-hostel='401' data-floor='401' data-building='401' data-room='401' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box " data-room='401' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box " data-room='401' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none "></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2 " data-room='401' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box " data-room='401' data-bed='5'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='401' data-bed='6'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='401' data-bed='7'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>402</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='402' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='402' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='402' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2" data-room='402' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box " data-room='402' data-bed='5'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='402' data-bed='6'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box" data-room='402' data-bed='7'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>403</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='403' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='403' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='403' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='403' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='403' data-bed='5'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='403' data-bed='6'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='403' data-bed='7'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>404</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='404' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='404' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='404' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2" data-room='404' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='404' data-bed='5'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='404' data-bed='6'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box" data-room='404' data-bed='7'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
  
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>405</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>406</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box "><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>407</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>408</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
   
<!--</div>-->
<!-- <div class="fixed-container-big">-->
<!--      <span class='font-weight-bold text-danger pb-1'>&nbsp;</span>-->
<!--          <div class="bathroom">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>-->
<!--        <div class="box bg-white" style='width:109px !important'><img class='hostel_stairs'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/stairs.png"/></div>-->
<!--        <div class="box bg-white" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>-->
        
      
<!--    </div>-->
  
    
<!--</div>-->
<!--</div>-->
<!--<div class="d-flex">                        -->
                       
<!-- <div class="fixed-container-big">-->
<!--    <span class='font-weight-bold text-danger pb-1'>414</span>-->
<!--      <div class="upper-part_2">-->
<!--            <img class='hostel_door_2' style='left: 174px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
        
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
     
       <!-- 1 Boxes -->
<!--        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
            
            
              <!-- 2 Boxes -->  
<!--        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
            <!-- 3 Boxes -->
            
            
<!--        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
          
          
<!--              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
         
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
        
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
              
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
          
         
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--            <div class="box_none"></div>-->
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
            
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
              
        
       
         
<!--    </div>-->
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>413</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
       
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>412</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->

<!-- <div class="fixed-container-big_2">-->
<!--      <span class='font-weight-bold text-danger pb-1'>Library</span>-->
<!--          <div class="upper-part_3">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white" ><strong class='text-danger rotate-120'>Library</strong></div>-->
<!--    </div>-->
  
  
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>411</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box "><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->

<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>410</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
       
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>409</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box "><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->

<!--</div>-->
<!--</div>-->
<!--                  <div id='fifth_floor' class='mt-3'style='border:3px solid black'>      -->
<!--                   <p><i class="fa fa-dot-circle-o"></i><strong>5th Floor</strong></p>-->
<!--<div class="d-flex">                        -->
                       
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>501</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box " data-hostel='501' data-floor='501' data-building='501' data-room='501' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box " data-room='501' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box " data-room='501' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none "></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2 " data-room='501' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box " data-room='501' data-bed='5'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='501' data-bed='6'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='501' data-bed='7'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>502</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='502' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='502' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='502' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2" data-room='502' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box " data-room='502' data-bed='5'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='502' data-bed='6'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box" data-room='502' data-bed='7'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>503</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='503' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='503' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='503' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='503' data-bed='4'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='503' data-bed='5'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='503' data-bed='6'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='503' data-bed='7'><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>504</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box" data-room='504' data-bed='1'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='504' data-bed='2'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box" data-room='504' data-bed='3'><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2" data-room='504' data-bed='4'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box" data-room='504' data-bed='5'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2" data-room='504' data-bed='6'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box" data-room='504' data-bed='7'><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
  
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>505</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--       <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>506</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box "><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--    <span class='font-weight-bold text-danger pb-1'>507</span>-->
<!--      <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--         <img class='hostel_door' style='left: 7px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
   
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>508</span>-->
<!--          <div class="upper-part">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <img class='hostel_door' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
<!--    </div>-->
  
   
<!--</div>-->
<!-- <div class="fixed-container-big">-->
<!--      <span class='font-weight-bold text-danger pb-1'>&nbsp;</span>-->
<!--          <div class="bathroom">-->
        <!-- 9 Boxes in the upper part -->
<!--        <div class="box bg-white" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>-->
<!--        <div class="box bg-white" style='width:109px !important'><img class='hostel_stairs'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/stairs.png"/></div>-->
<!--        <div class="box bg-white" style='width:50px !important'><span style="transform: rotate(90deg);">Bathroom</span></div>-->
        
      
<!--    </div>-->
  
    
<!--</div>-->
<!--</div>-->
<!--<div class="d-flex">                        -->
                       
<!-- <div class="fixed-container-big">-->
<!--    <span class='font-weight-bold text-danger pb-1'>517</span>-->
<!--      <div class="upper-part_2">-->
<!--            <img class='hostel_door_2' style='left: 174px;' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
        
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
     
       <!-- 1 Boxes -->
<!--        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
            
            
              <!-- 2 Boxes -->  
<!--        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
            <!-- 3 Boxes -->
            
            
<!--        <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
          
          
<!--              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--              <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
         
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
        
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
              
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
          
         
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--            <div class="box_none"></div>-->
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
            
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--            <div class="box"><img class='hostel_bed_2 rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
       
<!--         <div class="box_none"></div>-->
<!--         <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed_2 rotate-90' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
              
        
       
         
<!--    </div>-->
    <!--<div class="lower-part">-->
       
       
       
    <!--</div>-->
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>516</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
       
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>514</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>514</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
       
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>513</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>512</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
       
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
 


<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>511</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box "><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->

<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>510</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 7px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
       
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
      
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--         <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--          <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->
<!-- <div class="fixed-container">-->
<!--      <span class='font-weight-bold text-danger pb-1'>509</span>-->
<!--          <div class="lower-part">-->
<!--               <img class='hostel_door_2' style='left: 55px;'src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/exit.png"/> -->
        <!-- 9 Boxes in the upper part -->
      
<!--        <div class="box_none"></div>-->
<!--          <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box mt-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"></div>-->
<!--        <div class="box_none"></div>-->
<!--       <div class="box mb-2"><img class='hostel_bed rotate-270' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box_none"> </div>-->
<!--        <div class="box_none"></div>-->
<!--          <div class="box "><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
<!--        <div class="box"><img class='hostel_bed rotate-180' src="<?php echo e(env('IMAGE_SHOW_PATH')); ?>default/bed.png"/></div>-->
        
<!--    </div>-->
  
    
<!--</div>-->

<!--</div>-->
<!--</div>-->
                        
      
<!--                    </div>    -->
                        
                    </div>
                   
                   
                    </div>
                
            </div>
</div>
</div>
</div>
</section>
</div>

                
<style>
    .hostel_bed{
        width:11px;
        height:15px;
    }
    .hostel_bed_2{
    width: 8px;
  height: 10px;
    }
    .hostel_door{
        width:35px;
        height:25px;
        position: relative;
        bottom: -4px;
    }
    .hostel_door_2{
        width:35px;
        height:25px;
        position: relative;
          transform: rotate(180deg);
          top:-4px;
       
    }
    .hostel_stairs{
      width: 79px;
  height: 104px;
     
    }
</style>

<style>
    .fixed-container-big_2 {
            /*position: absolute;*/
            padding:10px;
            top: 20px; /* Adjust the position as needed */
            left: 20px; /* Adjust the position as needed */
            width: 360px;
            height: 215px;
            
            /*border: 1px solid #ccc;*/
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform-origin: 0 0; /* Prevents scaling from the center */
            transform: scale(1); /* Maintains original scale */
            overflow: auto;
            display: flex;
            flex-direction: column; /* Stacks upper and lower parts vertically */
        }
    .fixed-container-big {
            /*position: absolute;*/
            padding:10px;
            top: 20px; /* Adjust the position as needed */
            left: 20px; /* Adjust the position as needed */
            width: 240px;
            height: 215px;
            
            /*border: 1px solid #ccc;*/
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform-origin: 0 0; /* Prevents scaling from the center */
            transform: scale(1); /* Maintains original scale */
            overflow: auto;
            display: flex;
            flex-direction: column; /* Stacks upper and lower parts vertically */
        }
    .fixed-container {
            /*position: absolute;*/
            padding:10px;
            top: 20px; /* Adjust the position as needed */
            left: 20px; /* Adjust the position as needed */
            width: 120px;
            height: 215px;
            
            /*border: 1px solid #ccc;*/
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform-origin: 0 0; /* Prevents scaling from the center */
            transform: scale(1); /* Maintains original scale */
            overflow: auto;
            display: flex;
            flex-direction: column; /* Stacks upper and lower parts vertically */
        }
        .upper-part {
           flex: 1;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(5, 1fr);
  border: 2px solid black;
  padding: 1px;
        }
        .upper-part_2 {
           flex: 1;
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  grid-template-rows: repeat(12, 0.1fr);
  border: 2px solid black;
  padding: 1px;
        }
        .upper-part_3 {
           flex: 1;
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-template-rows: repeat(1, 1fr);
  border: 2px solid black;
  padding: 1px;
        }
        .bathroom {
           flex: 2;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(1, 1fr);
  border: 2px solid black;
  padding: 1px;
        }
        .box {
            border: 1px solid #000; 
            display: flex;
            align-items: center;
            justify-content: center;
            margin:1px;
            /*font-size: 12px;*/
          
            
            background-color: #adffad;
        }
        .box1 {
            border: 1px solid #000; 
            display: flex;
            align-items: center;
            justify-content: center;
            margin:1px;
            /*font-size: 12px;*/
          
            
            background-color: #adffad;
        }
        .box_none {
            border: 0px solid #000; 
            display: flex;
            align-items: center;
            justify-content: center;
            /*font-size: 12px;*/
            background-color: #fff;
        }
       .lower-part {
           flex: 1;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(6, 1fr);
  border: 2px solid black;
  padding: 1px;
        }
       .lower-part_2 {
           flex: 1;
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-template-rows: repeat(3, 1fr);
  border: 2px solid black;
  padding: 1px;
        }

             .rotate-90 {
        transform: rotate(90deg);
    }
             .rotate-120 {
        transform: rotate(-32deg);
    }
             .rotate-270 {
        transform: rotate(270deg);
    }
             .rotate-180 {
        transform: rotate(180deg);
    }
    
    .bed_green{
        background-color:#adffad;
    }
    .bed_red{
        background-color:#ffadad;
    }

</style>

<script>
    $(document).ready(function() {
        
       
     
        
        

    $('.go_back').on('click', function() {
         $('.selected_student_detail').hide()
        $('.all_hostel_detail').show()
        
    });
       $(document).on('keydown', function(event) {
        if (event.key === "Escape") { // Check if the 'Esc' key is pressed
            $('.selected_student_detail').hide(); // Toggle visibility
            $('.all_hostel_detail').show(); // Toggle visibility
        }
    });
    $('.box').on('click', function() {
        
        var env = "<?php echo e(env('IMAGE_SHOW_PATH')); ?>profile/";
        var room = $(this).attr('data-room');
        var bed = $(this).attr('data-bed');
        var admission_id =  $(this).attr('data-admission_id');
        
        	 var data = <?php echo json_encode($admission, 15, 512) ?>; 		 
        
        
          var filteredData = data.filter(item =>
            item.id == admission_id
        );
        

        if (filteredData.length > 0) {
         $('.name_student').html(`<b>${filteredData[0].first_name}</b>`);
         $('.detail_student').html(`<b>Father:</b>${filteredData[0].father_name}<br><b>Mobile:</b>${filteredData[0].mobile}`);
         $('.image_student').attr('src',`${env}${filteredData[0].image}`);
        $('.selected_student_detail').show()
        $('.all_hostel_detail').hide()
         
        } else {
           toastr.error('No Data')
        }
    });
    $('.hostels').on('click', function() {
        var id = $(this).attr('data-id');
        
         $('#boys_hostel').hide();
          $('#girls_hostel').hide();
     
        if(id == 1)
        {
            $('#boys_hostel').show()
        }
        else if(id == 2)
        {
            $('#girls_hostel').show()
        }
        
    });
    $('.floor').on('click', function() {
        
        
        var id = $(this).attr('data-label');
          $('.floor').siblings().removeClass().addClass('btn btn-outline-primary floor');
        $(this).removeAttr('class');
        $(this).addClass('btn btn-primary floor');
  
        
        
         $('#third_floor').hide();
          $('#forth_floor').hide();
          $('#fifth_floor').hide();
     
       if(id == 'all')
       {
            $('#third_floor').show();
          $('#forth_floor').show();
          $('#fifth_floor').show();
            var total_seats = Number($('.box').length);
        var used_seats = Number($('.bed_red').length);
         $('#total_seats').html(total_seats);
        $('#available_seat').html(total_seats-used_seats);  
         $('#hostel').html('All');
        $('#floor').html('All');  
       }
       else
       {
           $('#'+id).show();
           
           var total = Number($('#'+id).find('.box').length);
           var used = Number($('#'+id).find('.box_red').length);
            $('#total_seats').html(total);
        $('#available_seat').html(total-used);  
        
         $('#hostel').html('1');
         
         let str = id;
let formattedStr = str.replace(/_/g, ' ') 
                      .replace(/\b\w/g, function(char) { return char.toUpperCase(); }); 

        $('#floor').html(formattedStr);  
           
       }
        
    });
    
    
    
    
    
    filter();
    
    function filter() {
    var data = <?php echo json_encode($data, 15, 512) ?>; 

    document.querySelectorAll('.box').forEach(function(element) {
        var hostel = element.getAttribute('data-hostel');
        var floor = element.getAttribute('data-floor');
        var building = element.getAttribute('data-building');
        var room = element.getAttribute('data-room');
        var bed = element.getAttribute('data-bed');

           
        var filteredData = data.filter(item =>
            item.hostel_id == hostel &&
            item.floor_id == floor &&
            item.building_id == building &&
            item.room_id == room &&
            item.bed_id == bed
        );

        if (filteredData.length > 0) {
           
            $(element).addClass('bed_red');
        
            element.setAttribute('data-admission_id', filteredData[0].admission_id);
        } else {
            element.style.backgroundColor = '#adffad'; 
        }
    });
}
    
    
     var total_seats = Number($('.box').length);
        var used_seats = Number($('.bed_red').length);
         $('#total_seats').html(total_seats);
        $('#available_seat').html(total_seats-used_seats);  
       
    
});
</script>
<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/hostel/hostel_assign/hostelAssignDashboard.blade.php ENDPATH**/ ?>