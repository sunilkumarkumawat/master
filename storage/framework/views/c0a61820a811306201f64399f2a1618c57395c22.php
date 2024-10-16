 
<?php $__env->startSection('content'); ?>
<?php
$attendanceType = Helper::attendanceType();
$getMonth = Helper::getMonth();
?>

 <style>
     
    /*.Present {background-color:#0BF930;}
    .Absent{background-color:#F63C3C;}
    .Leave{background-color:#6c757d;} 
    .Half_Day{background-color:#ffc107;}
    .Holiday{background-color:#007bff;}
	.Present, .Absent, .Leave, .Half_Day, .Holiday {font-size:9px;}*/		 		
 </style>

 <div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary flex_items_toggel">
                    <h3 class="card-title"><i class="fa fa-calendar-check-o"></i> &nbsp;View Teacher Attendance</h3>
                    <div class="card-tools">
                    <?php if(Session::get('role_id') !== 2): ?>
                    <a href="<?php echo e(url('staff_attendance_add')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-plus"></i> <span class="Display_none_mobile"><?php echo e(__('common.Add')); ?> </span> </a>
                    <?php endif; ?>
                    <a href="<?php echo e(url('staff_file')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"><?php echo e(__('common.Back')); ?> </span> </a>
                    </div>
                    
                    </div>    
                   
               
                <form id="quickForm" action="<?php echo e(url('staff/Attendance/view')); ?>"  method="post" >
                        <?php echo csrf_field(); ?> 
                    <div class="row m-2">
                        <div class="col-md-2">
            			<div class="form-group">
            			<label  style="color:red;"><?php echo e(__('staff.Salary Month')); ?>*</label>
 			    <select class="form-control select2" id='date' name="date">
                    <option value=''>--<?php echo e(__('staff.Select Month')); ?>--</option>
                    <option <?php echo e($search['date'] == 1 ? "selected" : ""); ?> value='01'>Janaury</option>
                    <option <?php echo e($search['date'] == 2 ? "selected" : ""); ?> value='02'>February</option>
                    <option <?php echo e($search['date'] == 3 ? "selected" : ""); ?> value='03'>March</option>
                    <option <?php echo e($search['date'] == 4 ? "selected" : ""); ?> value='04'>April</option>
                    <option <?php echo e($search['date'] == 5 ? "selected" : ""); ?> value='05'>May</option>
                    <option <?php echo e($search['date'] == 6 ? "selected" : ""); ?> value='06'>June</option>
                    <option <?php echo e($search['date'] == 7 ? "selected" : ""); ?> value='07'>July</option>
                    <option <?php echo e($search['date'] == 8 ? "selected" : ""); ?> value='08'>August</option>
                    <option <?php echo e($search['date'] == 9 ? "selected" : ""); ?> value='09'>September</option>
                    <option <?php echo e($search['date'] == 10 ? "selected" : ""); ?> value='10'>October</option>
                    <option <?php echo e($search['date'] == 11 ? "selected" : ""); ?> value='11'>November</option>
                    <option <?php echo e($search['date'] == 12 ? "selected" : ""); ?> value='12'>December</option>
                </select> 
         		    </div>
            		</div> 
            		<?php if(Session::get('role_id') !== 2): ?>
                    <div class="col-md-4">
            			<div class="form-group">
            				<label><?php echo e(__('common.Search By Keywords')); ?></label>
            				<input type="text" class="form-control" id="name" name="name"  value="<?php echo e($search['name'] ?? ''); ?>" placeholder="<?php echo e(__('common.Ex. Name, Mobile, Email, Aadhaar etc.')); ?>">
            		    </div>
            		</div> 
            		<?php endif; ?>
            		
                        <div class="col-md-1 ">
                    	    <button type="submit" class="btn btn-primary mt-4"><?php echo e(__('common.Search')); ?></button>
                    	</div>
		
                    </div>
                </form>
                
            
            
                <div class="row m-2">
                <div class="view">
                <div class="wrapper">
                <table id="example11" class="table table-bordered table-striped border table-responsive dataTable dtr-inline ">
                    <thead class="bg-primary">
                    <tr role="row">
                      <td class="sticky-col first-col bg-primary"><?php echo e(__('common.SR.NO')); ?></td>
                       <?php
                     $monthDate =$totel_month_day;
                      ?>
                            <td class="sticky-col second-col bg-primary"><?php echo e(__('common.Name')); ?></td>
                               <?php for($day=1;$day <= $monthDate;$day++): ?>
                               <?php
                                   $date = $day.'-'.$search['date'].'-'.date('Y');
                                   $nameOfDay = date('D', strtotime($date));
                               ?>
                           <td class="text-center"><?php echo e($day); ?> <?php echo e($nameOfDay); ?></td>
                               <?php endfor; ?>
                            <td><?php echo e(__('staff.Total Atten.')); ?></td>
                            
                    </tr>
                             
                      
                  </thead>
               
                      
                      <?php if(!empty($all_teachers)): ?>
                         <?php
                        $i =1;
                  
                      ?>
                        <?php $__currentLoopData = $all_teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                         <tr>
                             <input type="hidden" class=" " id="staff_id" name="staff_id" readonly  value="">
                            <input type="hidden" class=" border-0" id="date" name="date" readonly  value="<?php echo e(date('Y-m-d')); ?>">
                           <td class="sticky-col first-col"><?php echo e($i++); ?></td>
                          
                            <td class="sticky-col second-col"><?php echo e($item['first_name'] ?? ''); ?> <?php echo e($item['last_name'] ?? ''); ?></td>
                            <?php if(isset($data[$item['id']])): ?>
                            <?php
                          $teach_att = $data[$item['id']];
                          $totalAttendance =0;
                        ?>
                        <?php for($day=01;$day <= $monthDate;$day++): ?>
                        <?php
                         $loop_date = sprintf("%02d",$day);
                            $date =$curr_yrs.'-'.$curr_mnt.'-'.$loop_date;
                        ?>
                        
                        <?php if(isset($data[$item['id']][$date])): ?>
                            <td class="text-center">
                                <?php
                               
                               $todayHistory = DB::table('teacher_attendance')->select('teacher_attendance.*','attendance_status.simbel')
                                                    ->leftjoin('attendance_status','attendance_status.id','teacher_attendance.attendance_status_id')->where('staff_id', $item['id'])->where('date',$date)->WhereNull('teacher_attendance.deleted_at')->orderBy('attendance_status_id','ASC')->get();
                                                    
                                                    
                            ?>
                            
                           
                            
                            <?php if(!empty($todayHistory)): ?>
                                <?php $__currentLoopData = $todayHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           
                                            <spam class="text-<?php echo e($history->attendance_status_id == 1  ? 'success' : ''); ?><?php echo e($history->attendance_status_id == 3  ? 'danger' : ''); ?>" style="font-size: 10px; padding: 0px; margin: 0px;">
                                                (<?php echo e($history->simbel); ?>-<?php echo e(date('h:ia', strtotime($history->time)) ?? ''); ?>)
                                            </spam>
                                        
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                            <?php endif; ?>
                                  
                            
                            </td>
                        <?php else: ?>
                            <td class="text-center">- </td>
                        <?php endif; ?>
                       
                        <?php
                        
                       $dateCu = !empty($search['date']) ? date('m', strtotime($search['date'])) : date("m");
                       
                        ?>
                        <?php endfor; ?>
                    <th><?php echo e($totel_month_day); ?>/<?php echo e($totalAttendance ?? ''); ?></th>
                    <?php endif; ?>
              </tr>
               
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </table>
                 <div class="col-md-2">
                 
                </div>    
                <div class="col-md-10">
                    <button class="btn btn-primary" onclick="downloadCSV()">Download CSV</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-xs btn-success">&nbsp;P&nbsp;</span> <?php echo e(__('staff.Present')); ?> &nbsp; <span class="btn btn-xs btn-danger">&nbsp;A&nbsp;</span> <?php echo e(__('staff.Absent')); ?> &nbsp; <span class="btn btn-xs btn-warning">Hf</span> <?php echo e(__('staff.Half-day')); ?> &nbsp; <span class="btn btn-xs btn-primary">&nbsp;H&nbsp;</span> <?php echo e(__('staff.Holiday')); ?>  &nbsp; <span class="btn btn-xs btn-info">&nbsp;W&nbsp;</span> <?php echo e(__('staff.Work From Home')); ?> &nbsp; <span class="btn btn-xs btn-secondary">&nbsp;DS&nbsp;</span><?php echo e(__('staff.Double Shift')); ?> 
                </div>                  

            </div>
             </div>
             </div>
 
              </div>
            </div>
        </div>
      </div>
    </section>
</div>

     <script>
  
function downloadCSV() {
  let csv = [];
  const rows = document.querySelectorAll("table tr");

  for (const row of rows.values()) {
    const cells = row.querySelectorAll("td, th");
    const rowText = Array.from(cells).map((cell) => cell.innerText);
    csv.push(rowText.join(","));
  }
  const csvFile = new Blob([csv.join("\n")], {
    type: "text/csv;charset=utf-8;"
  });
  saveAs(csvFile, "Staff Attendance.csv");
}

</script>   
<style>
    .view {
  margin: auto;
  width: 100%;
}

.wrapper {
  position: relative;
  overflow: auto;
  border: 1px solid black;
  white-space: nowrap;
}

.sticky-col {
  position: -webkit-sticky;
  position: sticky;
  background-color: white;
}

.first-col {
  width: 90px;
  min-width: 90px;
  max-width: 90px;
  left: 0px;
}

.second-col {
  width: 150px;
  min-width: 150px;
  max-width: 150px;
  left: 100px;
}
</style>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/staff/staff_attendance/index.blade.php ENDPATH**/ ?>