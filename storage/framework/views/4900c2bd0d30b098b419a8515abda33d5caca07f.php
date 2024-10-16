 
<?php $__env->startSection('content'); ?>
<?php
$classType = Helper::classType();
$getallStudent = Helper::getallStudent();
$getExamType = Helper::getExamType();
$getSubject = Helper::getSubject();

?>
<div class="content-wrapper">
<section class="content pt-3">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 col-md-12">
            <div class="card card-outline card-orange">
               <div class="card-header bg-primary">
                  <h3 class="card-title"><i class="fa fa-bar-chart"></i> &nbsp; Examination Result Statistics Graph </h3>
                  <div class="card-tools cl-6"> 
                   
                     <a href="<?php echo e(url('examination_dashboard')); ?>" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <?php echo e(__('messages.Back')); ?>  </a> 
                  </div>
               </div>
               <div class="card-body">

                    <form id="quickForm_find" action="<?php echo e(url('examResultGraph')); ?>" method="post" >
                         <?php echo csrf_field(); ?> 
                         <div class="row">
                            <div class="col-md-2 col-12">
                               <div class="form-group">
                                  <label class="text-danger"><?php echo e(__('messages.Exam Name')); ?>*</label>
                                  <select class="select2 form-control exam_id_" id="exam_id" name="exam_id" >
                                     <option value=""><?php echo e(__('messages.Select')); ?></option>
                                     <?php if(!empty($getExamType)): ?> 
                                    
                                     <?php $__currentLoopData = $getExamType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id); ?> " <?php echo e(($type->id == $search['exam_id']) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                                     <?php $__errorArgs = ['exam_id'];
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
                                  </select>
                               </div>
                            </div>                             
                            <div class="col-md-2 col-12">
                               <div class="form-group">
                                  <label class="text-danger"><?php echo e(__('messages.Class')); ?>*</label>
                                  <select class="select2 form-control <?php $__errorArgs = ['class_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="class_type_id" name="class_type_id" >
                                     <option value=""><?php echo e(__('messages.Select')); ?></option>
                                     <?php if(!empty($classType)): ?>
                                     <?php $__currentLoopData = $classType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($class->id ?? ''); ?>" <?php echo e(($class->id == $search['class_type_id']) ? 'selected' : ''); ?>><?php echo e($class->name ?? ''); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                                  </select>
                                  <?php $__errorArgs = ['class_type_id'];
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
                            <div class="col-md-2 col-12">
    							<div class="form-group">
    								<label class="text-danger">Subjects*</label>
    								<select class="form-control invalid select2 <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " id="subject_id" name="subject_id" >
    									<option value="">Select</option>
    									<?php if(!empty($getSubject)): ?>
                                         <?php $__currentLoopData = $getSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($subject->id ?? ''); ?>" <?php echo e(($subject->id == $search['subject_id']) ? 'selected' : ''); ?>><?php echo e($subject->name ?? ''); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>
    								</select>
                                      <?php $__errorArgs = ['subject_id'];
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
    						<div class="col-md-3 col-12 align-content-end">
    							<div class="form-group">
    								<div class="icheck-warning d-inline">
                                        <input type="radio" id="pattern1" name="pattern" value="1" checked <?php echo e((1 == $search['pattern']) ? 'checked' : ''); ?>>
                                        <label for="pattern1">Exam Wise</label>
                                    </div>
                                    <div class="icheck-warning d-inline">
                                        <input type="radio" id="pattern2" name="pattern" value="2" <?php echo e((2 == $search['pattern']) ? 'checked' : ''); ?>>
                                        <label for="pattern2">Student Wise</label>
                                    </div>
    							</div>
    						</div>
    						<div class="col-md-2 col-12 align-content-end ">
    							<div class="form-group">
    							<div class="icheck-success d-inline">
                                    <input type="checkbox" id="toppers" value="1" name="toppers" <?php echo e((1 == $search['toppers']) ? 'checked' : ''); ?>>
                                    <label for="toppers">Show Toppers</label>
                                    </div>
    							</div>
    						</div>
                            <div class="col-md-8 col-12">
                                <label class="text-danger">Students*</label>
                               <div class="form-group input-group">
                                  
                                  <select class="select2 form-control <?php $__errorArgs = ['admission_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="admission_id" name="admission_id[]" multiple >
                                     <option value=""><?php echo e(__('messages.Select')); ?></option>
                                    <?php if(!empty($getallStudent)): ?>
                                     <?php $__currentLoopData = $getallStudent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($stu->id ?? ''); ?>" <?php echo e(!empty($search['admission_id']) ? in_array($stu->id, $search['admission_id'])  ? 'selected' : '' : ''); ?>><?php echo e($stu->first_name ?? ''); ?> <?php echo e($stu->last_name ?? ''); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php endif; ?>
                                  </select>
                                  <span class="input-group-append">
                                <button type="button" id="allSelect" class="btn btn-success ">Select All</button>
                                </span>
                                  <?php $__errorArgs = ['admission_id'];
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
                            <div class="col-md-1 text-right">
                                <div class="form-group">
                               <label for="" class="text-white">Submit</label>
                               <button type="submit" class="btn btn-primary"><?php echo e(__('messages.Submit')); ?></button>
                               </div>
                            </div>
                         </div>
                    </form>
                    
                    <?php if(!empty($exam)): ?>
                    
                        <div class="row">
                            <?php if($search['pattern'] == 1): ?>
                                
                                <?php if(!empty($search['toppers']) && $search['toppers'] == 1): ?>
                                    
                                        <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $student = DB::table('admissions')->select('admissions.*')->leftJoin('fill_marks','admissions.id','fill_marks.admission_id')->where('admissions.class_type_id', $exa->class_type_id)->where('admissions.status',1)->whereNull('admissions.deleted_at')->groupBy('admissions.id')->orderBy('fill_marks.student_marks', 'DESC')->take(3)->get();
                                                
                                            ?>
                                            <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $studen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="examValues" data-id="barChart_<?php echo e($exa->id ?? ''); ?>" data-subject="<?php echo e($studen->first_name ?? ''); ?>"></span>
                                                <?php
                                                    $mark = DB::table('fill_marks')->where('exam_id', $exa->id)->where('admission_id', $studen->id)->first();
                                                ?>
                                                <span class="markValues" data-id="barChart_<?php echo e($exa->id ?? ''); ?>" data-mark="<?php echo e($mark->student_marks ?? ''); ?>"></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                           
                                            <div class="col-md-6">
                                                
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><i class="fa fa-trophy"></i> <?php echo e($exa['Exam']->name ?? ''); ?> : <?php echo e($exa['ClassType']->name ?? ''); ?> : <?php echo e($exa['Subject']->name ?? ''); ?> <i class="fa fa-angellist"></i> </h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                            <canvas id="barChart_<?php echo e($exa->id ?? ''); ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 645px;" width="1290" height="500" class="chartjs-render-monitor barChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>    
        
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php else: ?>
                                        
                                        <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $student = DB::table('admissions')->where('class_type_id', $exa->class_type_id)->whereIn('id', $studentId)->where('status',1)->whereNull('deleted_at')->orderBy('first_name')->get();
                                                $avgPercent = 0;
                                                $ap = 0;
                                                $averagePercent = 0;
                                            ?>
                                            <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="examValues" data-id="barChart_<?php echo e($exa->id ?? ''); ?>" data-subject="<?php echo e($studen->first_name ?? ''); ?>"></span>
                                                <?php
                                                    $mark = DB::table('fill_marks')->where('exam_id', $exa->id)->where('admission_id', $studen->id)->first();
                                                  if(!empty($mark)){
                                                    $avgPercent = $avgPercent += $mark->percent;
                                                    }
                                                    $ap++;
                                                ?>
                                                <span class="markValues" data-id="barChart_<?php echo e($exa->id ?? ''); ?>" data-mark="<?php echo e($mark->student_marks ?? ''); ?>"></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                                <?php if($avgPercent > 0): ?>
                                                    <?php
                                                        $averagePercent = $avgPercent / $ap;
                                                    ?>
                                                <?php endif; ?>
                                            <div class="col-md-6">
                                                
                                                <div class="card card-light">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><?php echo e($exa['Exam']->name ?? ''); ?> : <?php echo e($exa['ClassType']->name ?? ''); ?> : <?php echo e($exa['Subject']->name ?? ''); ?> </h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                            <canvas id="barChart_<?php echo e($exa->id ?? ''); ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 645px;" width="1290" height="500" class="chartjs-render-monitor barChart"></canvas>
                                                            <div class="progress">
                                                              <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                                                              aria-valuenow="<?php echo e($averagePercent ?? ''); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($averagePercent ?? ''); ?>%">
                                                                <span class="font-weight-bolder">Overall <?php echo e(round($averagePercent, 2) ?? ''); ?>% &nbsp; <?php if($averagePercent >= 80): ?><i class="fa fa-trophy text-warning"></i> <?php elseif($averagePercent <= 30): ?> <i class="fa fa-thumbs-down text-warning"></i> <?php else: ?><i class="fa fa-thumbs-up text-warning"></i> <?php endif; ?></span>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
        
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                                
                                <?php endif; ?>
                                
                                
                            <?php elseif($search['pattern'] == 2): ?>
                                
                                <?php if(!empty($search['toppers']) && $search['toppers'] == 1): ?>
                                
                                        <?php $__currentLoopData = $studentId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $avgPercent = 0;
                                                $ap = 0;
                                                $averagePercent = 0;
                                            ?>
                                            <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="examValues" data-id="barChart_<?php echo e($studen->id ?? ''); ?>" data-subject="<?php echo e($exa['Exam']->name ?? ''); ?> : <?php echo e($exa['Subject']['name'] ?? ''); ?> : <?php echo e(date('d-m-y', strtotime($exa['date'])) ?? ''); ?> "></span>
                                                <?php
                                                    $mark = DB::table('fill_marks')->where('exam_id', $exa->id)->where('admission_id', $studen->id)->first();
                                                   if(!empty($mark)){
                                                    $avgPercent = $avgPercent += $mark->percent;
                                                    }
                                                    $ap++;
                                                ?>
                                                <span class="markValues" data-id="barChart_<?php echo e($studen->id ?? ''); ?>" data-mark="<?php echo e($mark->student_marks ?? ''); ?>"></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                                <?php if($avgPercent > 0): ?>
                                                    <?php
                                                        $averagePercent = $avgPercent / $ap;
                                                    ?>
                                                <?php endif; ?>
                                            <div class="col-md-6">
                
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><i class="fa fa-trophy"></i> <?php echo e($studen->first_name ?? ''); ?> <?php echo e($studen->last_name ?? ''); ?> : <?php echo e($studen['ClassTypes']->name ?? ''); ?> <i class="fa fa-angellist"></i> </h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                            <canvas id="barChart_<?php echo e($studen->id ?? ''); ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 645px;" width="1290" height="500" class="chartjs-render-monitor barChart"></canvas>
                                                            <div class="progress">
                                                              <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                                                              aria-valuenow="<?php echo e($averagePercent ?? ''); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($averagePercent ?? ''); ?>%">
                                                                <span class="font-weight-bolder">Overall <?php echo e(round($averagePercent, 2) ?? ''); ?>% &nbsp; <?php if($averagePercent >= 80): ?><i class="fa fa-trophy text-warning"></i> <?php elseif($averagePercent <= 30): ?> <i class="fa fa-thumbs-down text-warning"></i> <?php else: ?><i class="fa fa-thumbs-up text-warning"></i> <?php endif; ?></span>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                                
                                <?php else: ?>
                                
                                        <?php $__currentLoopData = $studentId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $avgPercent = 0;
                                                $ap = 0;
                                                $averagePercent = 0;
                                            ?>
                                            <?php $__currentLoopData = $exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="examValues" data-id="barChart_<?php echo e($studen->id ?? ''); ?>" data-subject="<?php echo e($exa['Exam']->name ?? ''); ?> : <?php echo e($exa['Subject']['name'] ?? ''); ?> : <?php echo e(date('d-m-y', strtotime($exa['date'])) ?? ''); ?> "></span>
                                                <?php
                                                    $mark = DB::table('fill_marks')->where('exam_id', $exa->id)->where('admission_id', $studen->id)->first();
                                                  if(!empty($mark)){
                                                    $avgPercent = $avgPercent += $mark->percent;
                                                    }
                                                    $ap++;
                                                ?>
                                                <span class="markValues" data-id="barChart_<?php echo e($studen->id ?? ''); ?>" data-mark="<?php echo e($mark->student_marks ?? ''); ?>"></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                                <?php if($avgPercent > 0): ?>
                                                    <?php
                                                        $averagePercent = $avgPercent / $ap;
                                                    ?>
                                                <?php endif; ?>
                                            <div class="col-md-6">
                
                                                <div class="card card-light">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><?php echo e($studen->first_name ?? ''); ?> <?php echo e($studen->last_name ?? ''); ?> : <?php echo e($studen['ClassTypes']->name ?? ''); ?> </h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                            <canvas id="barChart_<?php echo e($studen->id ?? ''); ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 645px;" width="1290" height="500" class="chartjs-render-monitor barChart"></canvas>
                                                            <div class="progress">
                                                              <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                                                              aria-valuenow="<?php echo e($averagePercent ?? ''); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($averagePercent ?? ''); ?>%">
                                                                <span class="font-weight-bolder">Overall <?php echo e(round($averagePercent, 2) ?? ''); ?>% &nbsp; <?php if($averagePercent >= 80): ?><i class="fa fa-trophy text-warning"></i> <?php elseif($averagePercent <= 30): ?> <i class="fa fa-thumbs-down text-warning"></i> <?php else: ?><i class="fa fa-thumbs-up text-warning"></i> <?php endif; ?></span>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php endif; ?>
                            
                            <?php endif; ?>
                        </div>
                        
                    <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
</section>
</div>

<script>
$(document).ready(function(){
    $('#allSelect').click(function(){
        var selectAll = $(this).data('selectAll');
        if (!selectAll) {
          $('#admission_id').find('option').prop('selected', true).end().trigger('change');
          $(this).text('Unselect').data('selectAll', true);
        } else {
          $('#admission_id').find('option').prop('selected', false).end().trigger('change');
          $(this).text('Select All').data('selectAll', false);
        }
    });
    
    $('input[type="radio"][name="pattern"]').click(function(){
        var pattern = $(this).val();
        if(pattern == 2){
            $('#class_type_id').attr('required', true);
        }else{
            $('#class_type_id').attr('required', false);
        }
    });
})
</script>
<script>
  $(function () {

    $('.barChart').each(function(){
        var thiscanvas = $(this);

        var exams = [];
        $('.examValues').each(function(){
            if(thiscanvas.attr('id') == $(this).data('id')){
                var subject = $(this).data('subject');
                exams.push(subject);
            }
        })        
        var marks = [];
        
        $('.markValues').each(function(){
            if(thiscanvas.attr('id') == $(this).data('id')){
                var mark = $(this).data('mark');
                marks.push(mark);
            }
        })
        
        var areaChartData = {
          //labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          labels  : exams,
          datasets: [
            {
              label               : 'Marks Obtained',
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 205, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: [
                  'rgb(255, 99, 132)',
                  'rgb(255, 159, 64)',
                  'rgb(255, 205, 86)',
                  'rgb(75, 192, 192)',
                  'rgb(54, 162, 235)',
                  'rgb(153, 102, 255)',
                  'rgb(201, 203, 207)'
              ],
              borderWidth: 1,
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : marks
            },
          ]
        }
        
        //areaChartData.datasets[0].data.sort((a, b) => a - b);
        
        var barChartCanvas = $('#'+thiscanvas.attr('id')).get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0
    
        var barChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          datasetFill             : false,
          plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        color: 'black',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function (value) {
                            return value;
                        }
                    }
                },
          scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                }
              }]
            }
        }
    
        new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        
        })
    })
  })
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/examination/offline_exam/examResult/examResultGraph.blade.php ENDPATH**/ ?>