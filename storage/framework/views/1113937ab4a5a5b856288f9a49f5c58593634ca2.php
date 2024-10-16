<?php
$incentive_amount = 0;
$role = Helper::roleType();

$getMonth = Helper::getMonth();

$staffAtten = Helper::staffAtten($data->id ,$monthId ?? '' );


$RoleId = Session::get('RoleId');
$MonthId = Session::get('MonthId');
$userData = Session::get('userData');
$totel_sal_day = $staffAtten['P']+$staffAtten['d']+$staffAtten['W']+$staffAtten['H'];
$totel_sre = $data['salary']/$staffAtten['TotalDay'];
$totel_amt   = $totel_sre/2;
$totel_half_day = $totel_amt*$staffAtten['HF'];

$totel_amount = $totel_sal_day*$totel_sre;
//dd($totel_sal_day.'--'.$staffAtten['P'].'--'.$staffAtten['d'].'--'.$staffAtten['W'].'--'.$staffAtten['H']);
$expense = DB::table('expenses')->where('user_id',$data->id ?? '')->whereNull('deleted_at')->whereYear('date',date('Y'))->whereMonth('date',$monthId ?? '')->sum('amount');
$expense_name = DB::table('expenses')->where('user_id',$data->id ?? '')->whereNull('deleted_at')->whereYear('date',date('Y'))->whereMonth('date',$monthId ?? '')->pluck('name')->implode(','. PHP_EOL);


?>
 
<?php $__env->startSection('content'); ?>

<input type="hidden" id="user_data" value="<?php echo e($userData ?? ''); ?>">
<div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">    

            <div class="col-md-12">
                <div class="card card-outline card-orange mr-1">
                 <div class="card-header bg-primary">
                    <h3 class="card-title headings_all "><i class="fa fa-money"></i> &nbsp;<?php echo e(__('staff.Salary Panel')); ?></h3>
                <div class="card-tools">
                <a href="<?php echo e(url('salary_details')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i> <?php echo e(__('messages.View')); ?> </a>
                <a href="<?php echo e(url('user_dashboard')); ?>" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> <?php echo e(__('messages.Back')); ?> </a>
               </div>
                </div>                 
    
                    <div class="row m-2">
                        <div class="col-md-2">
                            <form action="<?php echo e(url('generate/salary/slip')); ?>" method="POST"> 
                            <?php echo csrf_field(); ?> 
                			<label style="color:red;"><?php echo e(__('staff.Select Role')); ?>*</label>
                			<select class="form-control  select2" id="role_id" name="role_id">
                			<option value=""><?php echo e(__('messages.Select')); ?></option>
                             <?php if(!empty($role)): ?> 
                                  <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($type->id ?? ''); ?>" <?php echo e(( $type['id'] == $data['role_id']) ? 'selected' : ''); ?> <?php echo e(( $type['id'] == 3 ?? '' ) ? 'hidden' : ''); ?><?php echo e(( $type['id'] == 1 ?? '' ) ? 'hidden' : ''); ?> <?php echo e(( $type->id == $RoleId) ? 'selected' : ''); ?>><?php echo e($type->name ?? ''); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select> 
                    	</div>
                    	
                        <div class="col-md-2">
                             
                			<label  style="color:red;"><?php echo e(__('staff.Salary Month')); ?>*</label>
                			<select class="form-control  select2" id="monthId" name="monthId">
                			<option value=""><?php echo e(__('messages.Select')); ?></option>
                             <?php if(!empty($getMonth)): ?> 
                                  <?php $__currentLoopData = $getMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($item->id ?? ''); ?>" <?php echo e(( $item->id == $monthId) ? 'selected' : ''); ?> <?php echo e(( $item->id == $MonthId) ? 'selected' : ''); ?>><?php echo e($item->name ?? ''); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                            </select>
                    	</div>                     	
                    	
                        <div class="col-md-4">
                			<label style="color:red;"><?php echo e(__('staff.Select Staff')); ?>* </label>
                			 
                			<select class="form-control  select2" id="user_id" name="user_id" onchange="this.form.submit()">
                			<option value=""><?php echo e(__('messages.Select')); ?></option>
                		
                			<?php if(!empty($dataUsers)): ?> 
                		
                                  <?php $__currentLoopData = $dataUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                                     <option value="<?php echo e($type1->id ?? ''); ?>" <?php echo e(( $type1['id'] == $data['id']) ? 'selected' : ''); ?>><?php echo e($type1['first_name'] ?? ''); ?> <?php echo e($type1['last_name']); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                			
                            </select> 
                            </form>
                    	</div>
                    </div>
                </div>          
            </div>


    
        <?php if($first_load == 'second_load'): ?>      
        
        <?php
        
        $oldSalary = DB::table('staff_salary_details')->where('staff_id',$data->id)->where('month_id',$monthId)->whereNull('deleted_at')->first();
        
        
    
        ?>
        
        <?php if(!empty($oldSalary)): ?>
        
        <div class='col-md-12 text-center'>
            
<p class='text-danger blink_me'> The salary for this month has already been created. If you make changes and save, it will override the previously created salary for this month.</p>
            
        </div>
        
        <?php endif; ?>
      
        <form action="<?php echo e(url('generate/salary')); ?>" method="post">
                        <?php echo csrf_field(); ?> 
            <div class="col-md-12" id="form_salary_generate" >
                <div class="row">
                    <div class="col-md-6 pr-0">
                                 
                            <input type="hidden" name="roleId" value="<?php echo e($data->role_id ?? ''); ?>">
                            <input type="hidden" name="staff_id" value="<?php echo e($data->id ?? ''); ?>">
                            <input type="hidden" name="month_id" value="<?php echo e($monthId ?? ''); ?>">
                            <input type="hidden" id="pfPer" value="<?php echo e($data->pfPer ?? ''); ?>">
                            <input type="hidden" id="tdsPer" value="<?php echo e($data->tdsPer ?? ''); ?>">
                            <input type="hidden" id="daPer" value="<?php echo e($data->daPer ?? ''); ?>">
                            <input type="hidden" id="basicPer" value="<?php echo e($data->basicPer ?? ''); ?>">
                            <!--<input type="hidden" name="per_day_amt" value="<?php echo e(round($data['salary']/$staffAtten['TotalDay']) ?? ''); ?>">-->
                            <!--<input type="hidden" name="salary_day" value="<?php echo e($totel_sal_day ?? ''); ?>">-->
                            <!--<input type="hidden" name="half_day" value="<?php echo e($staffAtten['HF'] ?? ''); ?>">-->
                            <!--<input type="hidden" name="holiday" value="<?php echo e($staffAtten['H'] ?? ''); ?>">-->
                            <!--<input type="hidden" name="double_shift" value="<?php echo e($staffAtten['d'] ?? ''); ?>">--> 
                            <!--<input type="hidden" name="present" value="<?php echo e($staffAtten['P'] ?? ''); ?>">-->
                            <!--<input type="hidden" name="absent" value="<?php echo e($staffAtten['A'] ?? ''); ?>">-->
                            <!--<input type="hidden" name="t_days" value="<?php echo e($staffAtten['TotalDay'] ?? ''); ?>">-->
                            <input type="hidden" name="total_salary" id="total_salary" value="<?php echo e($data['salary'] ?? ''); ?>">
                        <div class="card card-outline card-orange mr-1">
                     <div class="card-header bg-primary">
                    <h3 class="card-title headings_all"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('staff.Salary Panel')); ?></h3>
                    <div class="card-tools">
                  </div>
                    
                    </div>                 
        
                            <div class="row m-2">
                        <div class="col-md-6">
                			<label style="color:red;">Staff First Name*</label>
                			<input class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="first_name" id="first_name" placeholder="Staff First Name" value="<?php echo e($data['first_name'] ?? ''); ?>" required>
                            <?php $__errorArgs = ['first_name'];
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
                        <div class="col-md-6">
                			<label style="color:red;">Staff Last Name*</label>
                			<input class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="last_name" id="last_name" placeholder="Staff Last Name" value="<?php echo e($data['last_name'] ?? ''); ?>" required>
                            <?php $__errorArgs = ['first_name'];
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
                                        	
              	
                        <div class="col-md-6">
                			<label  style="color:red;">Basic Salary* </label>
                			<input class="form-control <?php $__errorArgs = ['basic_amt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onkeyup="calculateAmount(this.value,'basic_amt');" type="text" name="basic_amt" id="basic_amt" placeholder="Basic Salary" value="<?php echo e($data['salary'] ?? ''); ?>" readonly>
                            <?php $__errorArgs = ['basic_amt'];
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
                       <!-- <div class="col-md-6">
                			<label>HRA </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'hra');" type="text" name="hra" id="hra" placeholder="HRA" value="">
                      			
                    	</div>  -->              	
                        <div class="col-md-6">
                			<label>DA Amount  </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'da');" type="text" name="da" id="da" placeholder="DA Amount" value="0" readonly>
                    	</div>                	
                        <div class="col-md-6">
                			<label>Incentive</label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'incentive');" type="text" name="incentive" id="incentive" placeholder="Incentive" value="<?php echo e($expense ?? 0); ?>" readonly >
                    	</div>  
                    	 <div class="col-md-6">
                			<label>Incentive Remark</label>
                			<textarea class="form-control" name="incentive_remark" id="incentive_remark" rows='7'placeholder="Incentive Remark"  ><?php echo e($expense_name ?? ''); ?></textarea>
                    	</div>  
                       <!-- <div class="col-md-6">
                			<label >Allowances</label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'allowance');" type="text" name="allowance" id="allowance" placeholder="Allowances" value="">
                    	</div>  -->              	
                       <!-- <div class="col-md-6">
                			<label >Advance </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'advance');" type="text" name="advance" id="advance" placeholder="Advance" value="">
                    	</div>  -->              	
                        <div class="col-md-6">
                			<label>PF Amount </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'pf');" type="text" name="pf" id="pf" placeholder="PF Amount" value="0" readonly>
                    	</div>                	
                        <div class="col-md-6">
                			<label>TDS Amount</label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'tds');" type="text" name="tds" id="tds" placeholder="TDS Amount" value="0" readonly>
                    	</div>                	
                      <!--  <div class="col-md-6">
                			<label >ESIC Amount </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'esic');" type="text" name="esic" id="esic" placeholder="ESIC Amount" value="">
                   			
                    	</div>  -->              	
                       <!-- <div class="col-md-6">
                			<label>Tax Amount </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'tax');" type="text" name="tax" id="tax" placeholder="Tax Amount" value="">
                    	</div>-->                	
                        <div class="col-md-6">
                			<label >Other Deduction </label>
                			<input class="form-control" onkeyup="calculateAmount(this.value,'other_deduction');" type="text" name="other_deduction" id="other_deduction" placeholder="Other Deduction" value="0">
                    	</div>                	
                        <div class="col-md-6">
                			<label>Other Deduction Remark </label>
                			<textarea class="form-control"  name="deduction_remark" rows='5' id="deduction_remark" placeholder="Deduction Remark"></textarea>
                    	</div>                	
                        <div class="col-md-6">
                			<label  style="color:red;">Salary Generate Date*</label>
                			<input class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="date" name="date" id="date" value="<?php echo e(date('Y-m-d')); ?>">
                            <?php $__errorArgs = ['date'];
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
                        <div class="col-md-6">
                			<label style="color:red;">Final Salary*</label>
                			<input class="form-control" type="text" name="total_amount" id="total_amount" placeholder="Final Salary" value="<?php echo e(round($totel_amount)+$incentive_amount ?? ''); ?>" >
                    	</div> 
                    	
                </div>
           	  <div class="row m-2">
                    <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Generate </button>
                    </div>
                </div>
                       
                    </div>          
                </div>
                    <div class="col-md-6">
                    <div class="card card-outline card-orange mr-1">
                     <div class="card-header bg-primary">
                    <h3 class="card-title headings_all"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('staff.Attendance Panel')); ?></h3>
                    <div class="card-tools">
                   </div>
                    
                    </div> 
                    
                      <div class="row m-2 text-center">
                        <div class="col-md-3">
                			<label> <b>Total Days</b></label><br>
                			<label > 
                			
                			<!--<b style=" color: blue;margin-left: 35px;"><?php echo e($staffAtten['TotalDay'] ?? '0'); ?></b>-->
                		
                		    <input type='text' class=' input form-control'value="<?php echo e($staffAtten['TotalDay'] ?? '0'); ?>" id='totalDays' name='totalDays' readonly />
                			</label>
                		
                    	</div>
                        <div class="col-md-3">
                			<label><b>Holiday</b></label><br>
                			<!--<label><b style="color: red;margin-left: 35px;"><?php echo e($staffAtten['H'] ?? '0'); ?></b></label>-->
        			         <input type='hidden'  name='holiday'class='w-50 input' value="0" id='holiday' readonly />             			
        			         <input type='text'  class='form-control input' value="<?php echo e($staffAtten['H'] ?? 0); ?>"  readonly />             			
                    	</div>                	
                        <div class="col-md-3">
                			<label ><b>Absent</b></label><br>
                			<!--<label ><b style="color: red;margin-left: 35px;"><?php echo e($staffAtten['A'] ?? '0'); ?></b></label>-->
                   			  <input type='text' class='form-control input' value="<?php echo e($staffAtten['A'] ?? '0'); ?>" id='absent' name='absent'/>             		
                    	</div>   
                            
                        <div class="col-md-3">
                			<label ><b> Half-Day</b></label><br>
                			<!--<label ><b style="color: blue;margin-left: 35px;"><?php echo e($staffAtten['HF'] ?? '0'); ?></b></label>-->
                  			  <input type='text' class='form-control input' value="<?php echo e($staffAtten['HF'] ?? '0'); ?>" id='halfDay' name='halfDay' />             		
                    	</div> 
                    	<div class="col-md-3">
                			<label> <b>Double Shift</b></label><br>
                			<!--<label > <b style="color: orange;margin-left: 35px;"><?php echo e($staffAtten['d']/2 ?? '0'); ?></b></label>-->
                			
                		 <input type='text' class=' form-control input' value="<?php echo e($staffAtten['d'] ?? '0'); ?>" id='doubleShift' name='doubleShift' />  
                		                 			
                    	</div>
                    	<div class="col-md-3">
                			<label><b> Working</b></label><br>
                			<!--<label><b style="color: green;margin-left: 35px;"><?php echo e($staffAtten['P']+$staffAtten['d']+$staffAtten['W'] ?? '0'); ?></b></label>-->
                			  <input type='text' class=' form-control input' value="0" id='working' readonly/>                  			
                    	</div> 
           
                      <div class="col-md-3">
            <label><b>Late Come</b></label><br>
            <input type='text' class=' form-control input' value="0" id='lateCome' name='lateCome' />
        </div>
          <div class="col-md-3">
            <label><b>Late Come Frequency</b></label><br>
            <input type='text' class=' form-control input' value="3" id='lateComeFrequency' name='lateComeFrequency' />
        </div>
                        <div class="col-md-3">
                			<label ><b style="margin-left: 10px;">Salary Days</b></label><br>
                			<!--<label ><b style=" color: green;margin-left: 35px;"><?php echo e($totel_salary_day ?? ''); ?></b></label>-->
                			<input type='text'class=' form-control input' value="0" id='salaryDays' name='salaryDays' readonly/>  
                    	</div>                	
                </div>
        
                    </div>  
                    
                   <!--     <div class="card card-outline card-orange mr-1">-->
                   <!--  <div class="card-header bg-primary">-->
                   <!-- <h3 class="card-title headings_all"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('messages.LEAVE INFORMATION')); ?> </h3>-->
                   <!-- <div class="card-tools">-->
                   <!--</div>-->
                    
                   <!-- </div>                 -->
        
                   <!--     <div class="row m-2">-->
                   <!--             <div class="col-md-3">-->
                   <!--     			<label> <b> <?php echo e(__('messages.Casual Leave')); ?></b></label><br>-->
                   <!--     			<label > <b style=" color: blue;margin-left: 35px;"><?php echo e($data['casual_leave'] ?? '0'); ?></b></label>-->
                        			
                        		
                        		                 			
                   <!--         	</div>-->
                   <!--             <div class="col-md-3">-->
                   <!--     			<label><b style="margin-left: 10px;"><?php echo e(__('messages.Pay/Earn Leave')); ?></b></label><br>-->
                   <!--     			<label><b style="color: red;margin-left: 35px;">0</b></label>-->
                        			                  			
                   <!--         	</div>                	-->
                   <!--             <div class="col-md-3 text-center">-->
                   <!--     			<label> <b style="margin-left: 10px;"><?php echo e(__('staff.Medical Leave')); ?> </b></label><br>-->
                   <!--     			<label > <b style="color: orange;"><?php echo e($data['medical_leave'] ?? '0'); ?></b></label>-->
                        			
                        		
                        		                 			
                   <!--         	</div>-->
                   <!--             <div class="col-md-3">-->
                   <!--     			<label><b style="margin-left: 10px;"><?php echo e(__('messages.Other Leave')); ?></b></label><br>-->
                   <!--     			<label><b style="color: green;margin-left: 35px;"><?php echo e($data['other_leave'] ?? '0'); ?></b></label>-->
                        			                  			
                   <!--         	</div>   -->
                   <!--     </div>-->
        
                   <!-- </div>-->
                   
                </div>
                    <!-- <div class="col-md-6 pl-0">
                    <div class="card card-outline card-orange ml-1">
                     <div class="card-header bg-primary">
                    <h3 class="card-title headings_all"><i class="fa fa-money"></i> &nbsp;<?php echo e(__('messages.Salary Detail')); ?></h3>
                    <div class="card-tools">
                    </div>
                    
                    </div>                 
                       <div class="row m-2">
                            <div class="col-md-12">
                            <table  class="table table-bordered table-striped dataTable dtr-inline  text-nowrap">
                                  <thead>
                                  <tr role="row">
                                      <th><?php echo e(__('messages.Sr.No.')); ?></th>
                                      <th><?php echo e(__('messages.Description')); ?></th>
                                      <th><?php echo e(__('messages.Amount')); ?></th>
                                    </tr>  
                                      
                                      
                                  </thead>
                                  <tbody id="">
                                  
                                
                                        <tr>
                                               <td style="padding-left:3%;">A</td>
                                               <td><?php echo e(__('staff.Basic Salary')); ?></td>
                                                <td> <?php echo e($data['salary'] ?? '0'); ?></td>
                
                                            </tr>
                                        <tr>
                                               <td style="padding-left:3%;">B</td>
                                               <td><?php echo e(__('staff.Pre Day Salary (A,B)')); ?> </td>
                                                <td> <?php echo e(round($data['salary']/$staffAtten['TotalDay']) ?? '0'); ?></td>
                
                                            </tr>
        
                                        <tr>
                                               <td style="padding-left:3%;">D</td>
                                               <td><?php echo e(__('staff.Total Days')); ?> </td>
                                                <td><?php echo e($staffAtten['TotalDay'] ?? '0'); ?></td>
                
                                            </tr>                                    
                                        <tr>
                                               <td style="padding-left:3%;">C</td>
                                               <td><?php echo e(__('staff.Working Days')); ?> </td>
                                                <td><?php echo e($totel_sal_day ?? '0'); ?></td>
                
                                            </tr>
        
                                        <tr>
                                               <td style="padding-left:3%;">E</td>
                                               <td><?php echo e(__('staff.Absent')); ?> </td>
                                                <td><?php echo e($staffAtten['A'] ?? '0'); ?></td>
                
                                            </tr>
                                        <tr>
                                               <td style="padding-left:3%;">F</td>
                                               <td><?php echo e(__('staff.Present')); ?> </td>
                                                <td><?php echo e($staffAtten['P']+$staffAtten['d'] ?? '0'); ?></td>
                
                                            </tr>
                                    <tr>
                                               <td style="padding-left:3%;">G</td>
                                               <td>Leave </td>
                                                <td><?php echo e($staffAtten['A'] ?? '0'); ?></td>
                
                                            </tr>-->
                                        <!--<tr>
                                               <td style="padding-left:3%;">H</td>
                                               <td> Sunday</td>
                                                <td><?php echo e($staffAtten['H'] ?? '0'); ?></td>
                
                                            </tr>
                                            
                                        <tr>
                                               <td style="padding-left:3%;">I</td>
                                               <td><?php echo e(__('staff.Holiday')); ?> </td>
                                                <td><?php echo e($staffAtten['H'] ?? '0'); ?></td>
                
                                            </tr>
                                       
                                        <tr>
                                               <td style="padding-left:3%;">S</td>
                                               <td><?php echo e(__('staff.HRA')); ?> </td>
                                                <td id="hra1"> 0</td>
                
                                            </tr>   
                                        <tr>
                                               <td style="padding-left:3%;">T</td>
                                               <td><?php echo e(__('staff.DA Amount')); ?> </td>
                                                <td id="da1"> <?php echo e($data['da_amt'] ?? '0'); ?></td>
                
                                            </tr>  
                                        <tr>
                                               <td style="padding-left:3%;">P</td>
                                               <td><?php echo e(__('staff.Incentive')); ?> </td>
                                                <td id="incentive1"> 0</td>
                
                                            </tr>    
        
                                        <tr>
                                               <td style="padding-left:3%;">Q</td>
                                               <td> <?php echo e(__('staff.Allowances')); ?></td>
                                                <td id="allowance1"> <?php echo e($data['allowance'] ?? '0'); ?></td>
                
                                            </tr>   
                                        <tr>
                                               <td style="padding-left:3%;">R</td>
                                               <td><?php echo e(__('staff.Advance')); ?> </td>
                                                <td id="advance1"> 0</td>
                
                                            </tr> 
                                        <tr>
                                               <td style="padding-left:3%;">M</td>
                                               <td><?php echo e(__('staff.PF Amount')); ?> </td>
                                                <td id="pf1"> <?php echo e($data['pf'] ?? '0'); ?></td>
                
                                            </tr>  
                                        <tr>
                                               <td style="padding-left:3%;">L</td>
                                               <td><?php echo e(__('staff.TDS')); ?> </td>
                                                <td id="tds1"> <?php echo e($data['tds'] ?? '0'); ?></td>
                
                                            </tr>         
                                        <tr>
                                               <td style="padding-left:3%;">N</td>
                                               <td><?php echo e(__('staff.ESIC Amount')); ?> </td>
                                                <td id="esic1"> <?php echo e($data['esic'] ?? '0'); ?></td>
                
                                            </tr>                                    
                                        <tr>
                                               <td style="padding-left:3%;">K</td>
                                               <td><?php echo e(__('staff.Tax Amount')); ?> </td>
                                                <td id="tax1"> <?php echo e($data['tax'] ?? '0'); ?></td>
                
                                            </tr>
                                        <tr>
                                               <td style="padding-left:3%;">O</td>
                                               <td><?php echo e(__('staff.Other Deducation')); ?> </td>
                                                <td id="other_deduction1"> 0</td>
                
                                            </tr>
        
                                            </tr>
        
                                            </tr>
        
                                            </tr>
        
                                            </tr>
                                        <tr>
                                               <td style="padding-left:3%;">U</td>
                                               <td><?php echo e(__('staff.Total Deducation(K+L+M+N+O+R)')); ?> </td>
                                                <td id="total_deduction"> 0</td>
                
                                            </tr>
                                            </tr>
                                        <tr>
                                        
                                               <td style="padding-left:3%;">V</td>
                                               <td><?php echo e(__('staff.Final salary (C*l+P+Q+S+T+R-U)')); ?> </td>
                                                <td id="final_salary"> <?php echo e(round($totel_amount+$totel_half_day) ?? '0'); ?></td>
                                        </tr>
                                 
                                  </tbody>
                            </table>
                                  
                            <div class="row m-2">
                            <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('staff.Generate')); ?> </button>
                            </div>
                        </div>
                        	</div>
                        </div>
                       
                    </div>          
                </div> -->
                </div>
            </div>
        </form>
    <?php endif; ?>
    </div>
</div>
</section>
</div>
<style>
@media  only screen and (max-width: 600px) {
  .headings_all{
        font-size: 22px;
    }
}

   
</style>
<script>
    
 

$(document).ready(function(){
    var user_data = $('#user_data').val();
    if(user_data != ''){
         $("#user_id").html(user_data);
    }
    
    
    $("#role_id").change(function(){

     var basurl = "<?php echo e(url('/')); ?>";
    var role_id = $(this).val();
    
        $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: basurl+'/find/staff',
        data: {role_id:role_id},
	    success: function(data){
	     if(data != ''){
	         	$("#user_id").html(data);
	         	$("#form_salary_generate").css('display','block');
	     }else{
	         	$("#user_id").html(data);
	            toastr.error('User Not Found !');
	     }
	    }
        }); 
 
}); 
});
</script>       

   <script>
        $(document).ready(function(){
            calculateSalaryDays();
            function calculateSalaryDays() {
                var daPer = parseFloat($('#daPer').val()) || 0;
                var tdsPer = parseFloat($('#tdsPer').val()) || 0;
                var pfPer = parseFloat($('#pfPer').val()) || 0;
                var basicPer = parseFloat($('#basicPer').val()) || 0;
            
                
                var totalDays = parseFloat($('#totalDays').val()) || 0;
                var holiday = parseFloat($('#holiday').val()) || 0;
                var absent = parseFloat($('#absent').val()) || 0;
                var halfDay = parseFloat($('#halfDay').val()) || 0;
                var doubleShift = parseFloat($('#doubleShift').val()) || 0;
                var working = parseFloat($('#working').val()) || 0;
                var lateCome = parseFloat($('#lateCome').val()) || 0;
                var lateComeFrequency = parseFloat($('#lateComeFrequency').val()) || 3;

                var lateComePenalty = Math.floor(lateCome / lateComeFrequency) * 0.5;
                
                var salaryDays = totalDays - holiday - absent - (0.5 * halfDay) + (1 * doubleShift) - lateComePenalty;

                $('#salaryDays').val(salaryDays);
                $('#working').val(salaryDays);
                
                var basic = $('#total_salary').val();
                var incentive = Number($('#incentive').val());
               // var da =  Number($('#da').val());
               // var pf =  Number($('#pf').val());
               // var tds =  Number($('#tds').val());
                var other_deduction =  Number($('#other_deduction').val());
                
                
                var perday = basic/totalDays;
                var final = parseInt(perday*salaryDays)


                var A = parseFloat((final*basicPer)/100);
                var B = parseFloat((final*daPer)/100);
                var C = parseFloat((basic*pfPer)/100);
                var D = parseFloat((final*tdsPer)/100);
                
                $('#basic_amt').val(A);
                $('#da').val(B);
                $('#pf').val(C);
                $('#tds').val(D);
              
             
               // $('#total_amount').val((final+incentive+da) - (other_deduction + pf+ tds));
                $('#total_amount').val(parseInt(((A+B)-(C+D+other_deduction))+incentive));
               
            }

            $('input').on('focusout', function(){
                calculateSalaryDays();
            });
        });
    </script>
<script>
$( document ).ready(function() {
  var firstLoad = "<?php echo e($first_load ?? ''); ?>";
  var secondLoad = "<?php echo e($second_load ?? ''); ?>";
 
 if(firstLoad == 'first_load')
 {
     	$("#role_id").val("");
 }
 else if(firstLoad == 'redirect_load')
 {
     toastr.error('Salary Already Generated !');
     	$("#role_id").val("").change();
    	$("#monthId").val("");
 }
     var role = $("#role_id").val();
 
if(role != '')
{
 
  var basurl = "<?php echo e(url('/')); ?>";
   
    
        $.ajax({
             headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
        type:'post',
        url: basurl+'/find/staff',
        data: {role_id:role},
	    success: function(data){
	        
	     if(data != ''){
	         	$("#user_id").html(data);
	         	$("#user_id").val("<?php echo e($data['id'] ?? ''); ?>");
	         	$("#form_salary_generate").css('display','block');
	     }else{
	         	$("#user_id").html(data);
	            toastr.error('User Not Found !');
	     }
	    }
        }); 
    
}
});
</script>

<style>
    .blink_me {
  animation: blinker 0.3s linear infinite;
}

@keyframes  blinker {
  50% {
    opacity: 0.3;
  }
}
</style>
<?php $__env->stopSection(); ?>      
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rusoft/public_html/demo3/resources/views/user/salary/add.blade.php ENDPATH**/ ?>