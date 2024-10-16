<!DOCTYPE html>
<html>
<head>
<title>Marksheet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
use Illuminate\Support\Arr;
$getSetting=Helper::getSetting();
$account=Helper::getQRCode($getSetting->account_id);

?>
<body>
    <style>
        
         body {
       /*font-family: Arial, sans-serif;*/
      /*font-size:12px;*/
      font-family: none;
      max-width:740px;
      margin: 25px auto ;
      
      padding: 10px;
    /*border: 0.5px solid; */
   }
    .student_img {
    width: 80px; 
    height:100; 
    margin-top: 23%;
    margin-left:20%;
    padding-bottom: 0px;
        
    }
    
    td{
        /*font-size:17px;
        padding:5px;*/
        font-size: 15px;
        padding: 4px;
    }
    th{
        font-size:17px !important;
        padding:5px;
    }
    .row{
        margin-right: 0px;
    }
    .img_background_fixed{
      position: relative;
    }
    
    .img_absolute{
        position: absolute;
        top: -52px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        right: 0;
    }
    
    .backhround_img{
        opacity: 0.3;
        width: 76%;
    }
    
    .fontweight{
            font-weight: 600;
  
    }
    .ltr{
        text-align: left; 
    }
    .rtr{
       text-align: right; 
    }
    .ctc{
       text-align: center; 
    }
    
    .AreaBorder{
        border: 2px solid black;
    }
    .subpadding{
        padding: 7px;
    }
    .border_percentage{
       border: 2px solid black;
    }
   
    @media  print {
    }    
        
        @page  {
            border: 2px solid black;
          size: 21cm 29.7cm;
          margin: 0;
        }
        @page  { size: auto; size: A4 portrait; }
    </style>
    <?php if(!empty($admission_id)): ?>
    <?php $__currentLoopData = $admission_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <table style="border: 2px solid;width: 100%;">
			<tbody >
					<tr>
      <td  rowspan="4">
          <img  rowspan="4" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?>" style="width: 97px;margin-top: -20px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/common_images/rukmani_logo.png'); ?>'">
      </td>
  
      <td   style=" font-size:25px;text-align:center;width:100%;"><span class="style71"><strong><?php echo e($getSetting['name'] ?? ''); ?> </strong></span></td>
   
      <td rowspan="4"> 
<!--      <img  rowspan="4" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?> " style="width: 97px;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/common_images/rukmani_logo.png'); ?>'">
-->      </td>
     
    
     
   </tr>
	<tr style="text-align:center;">
       
 
   
      <td   style="text-align:center;"><p style="margin-bottom: 0px;"><b >Address </b> <?php echo e($getSetting['address'] ?? ''); ?></p></td>

      </tr>
      <tr>
     
   
      <td  style="text-align:center;"><p style="margin-bottom:2px;"><b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?>  </p></td>
    </tr>


    
  </tbody>
  </table>
  
    <?php
        $className = DB::table('class_types')
        ->where('id',$admission_id->class_type_id)
        
         ->where('branch_id',Session::get('branch_id'))
        ->whereNull('deleted_at')->first();
        
         $session  = DB::table('sessions')->where('id',Session::get('session_id'))->whereNull('deleted_at')->first();
         $gender  = DB::table('gender')->where('id',$admission_id->gender_id)->whereNull('deleted_at')->first();
    ?>
    
        <div class="" style="border: 2px solid black;padding: 23px;margin-top:-22px">
      <h6 class="text-center" style="margin-top: -14px;margin-bottom: 0px;"><b><?php if(count($list_exam) < 3 ): ?>
       <?php $__currentLoopData = $list_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key == 1): ?>    
         <?php echo e($item->name ?? ''); ?>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
      <?php endif; ?></span> Academic Performance - Session <?php echo e($session->from_year ?? ''); ?><?php echo e("-"); ?><?php echo e($session->to_year ?? ''); ?></b></h6>
      <p class="mb-0"><b>Personal Profile</b></p>
        <div class="img_background_fixed">
            <div class="img_absolute">
            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/watermark_image/'.$getSetting['watermark_image']); ?>" alt="bg_logo" class="backhround_img">
            </div>
  <table class="" style="padding:2px;border:2px solid black;width: 100%;">
    
			<tbody >
			<tr>
			    <td class="fontweight">S.R. No. :</td>
			    <td><?php echo e($admission_id->admissionNo ?? ''); ?></td>
			    
			    <td class="fontweight ">Student Name :</td>
			    <td><?php echo e($admission_id->first_name ?? ''); ?> <?php echo e($admission_id->last_name ?? ''); ?></td>
			    <td class="fontweight">Class:</td>
			    <td><?php echo e($className->name ?? ''); ?></td>
			</tr>	
			<tr>
			    
			    <td class="fontweight ">ExamRollNo. :</td>
			    <td><?php echo e($admission_id->exam_roll_no ?? ''); ?></td>
			    <td class="fontweight ">Date Of Birth :</td>
			    <td><?php echo e(date('d-M-Y', strtotime($admission_id->dob ?? '')) ?? ''); ?></td>
			    <td></td>
			    <td></td>
			</tr>	
			<tr>
			   
			    <td class="fontweight ">Father's Name :</td>
			    <td><?php echo e($admission_id->father_name ?? ''); ?></td>
			    <td class="fontweight ">Mother's Name :</td>
			    <td><?php echo e($admission_id->mother_name ?? ''); ?></td>
			    <td></td>
			    <td></td>
			</tr>	
		
		
  </tbody>
  </table>
  
       <p class="mb-0" style='margin-top:2px;margin-bottom:20px'><b>Scholastic Area:</b></p>
  <table class="" style="border: 2px solid;width: 100%;">
<thead>
  <tr>
    <th class="AreaBorder subpadding">
      Subject
    </th>
    <?php $__currentLoopData = $list_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <th class="AreaBorder ctc "><?php echo e($item->name ?? ''); ?></th>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <th class="AreaBorder ctc">Grade</th>
  </tr>
  <?php if(!empty($list_exam)): ?>
  <?php
  $total_maximum_possible =0;
  $total_obtained =0;
  ?>
   <?php $__currentLoopData = $list_subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $maximum_marks_total_right =0;
   $obtained_total_right =0;
   ?>
   <?php if(($item_subject->other_subject ?? '') != 1): ?>
 <tr>
     <td class="AreaBorder subpadding"><?php echo e($item_subject->name ?? ''); ?></td>
     <?php
     $array=[];
     
     ?>
      <?php $__currentLoopData = $list_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
                                $number = DB::table('fill_marks')
                                ->where('exam_id',$item_td->id)
                                ->where('subject_id',$item_subject->id ?? '')
                                ->where('admission_id',$admission_id->id)
                                ->where('session_id',Session::get('session_id'))
                                ->where('branch_id',Session::get('branch_id'))
                                ->where('deleted_at',null)
                                ->first();
                                
                                $number_max = DB::table('fill_min_max_marks')
                                ->where('exam_id',$item_td->id)
                                ->where('subject_id',$item_subject->id ?? '')
                                ->where('class_type_id',$admission_id->class_type_id ?? '')
                                ->where('session_id',Session::get('session_id'))
                                ->where('branch_id',Session::get('branch_id'))
                                ->where('deleted_at',null)
                                ->first();
                                
                                
                               
                                 $maximum_marks = $number_max->exam_maximum_marks ?? 0;
                                 
                                  if($maximum_marks != 0)
                                  {
                                  
                                  if($number->student_marks != ''  )
                                  {
                                  
                                  if($number->student_marks == 'AB')
                                  {
                                  
                                   $obtained_total_right += 0;
                                $total_obtained += 0;
                                  
                                  }
                                  
                                  else{
                                  $obtained_total_right += $number->student_marks ?? 0;
                                $total_obtained += $number->student_marks ?? 0;
                             
                                  }
                                     $maximum_marks_total_right += $number_max->exam_maximum_marks ?? 0;
                              
                              
                              $total_maximum_possible += $number_max->exam_maximum_marks ?? 0;
                                  }
                                  
                                  
                                  }
                                  else
                                  {
                                  $array[] = $number->student_marks ?? '';
                                  }
                                  
                              
                                ?>
     <td class="AreaBorder ctc ">
         <?php if($maximum_marks ==0 ): ?>
         <?php echo e($number->student_marks ?? '-'); ?>

         <?php else: ?>
         
         <?php if($number->student_marks != ''): ?>
         
           <?php if($number->student_marks == 'AB'): ?>
                                 AB 
                                  <?php else: ?>
                                  
                                      <!-- <?php echo e($number->student_marks ?? 0); ?>/<?php echo e($maximum_marks); ?>       -->     
                                    <?php
                                   $total_number =  $number->student_marks / $maximum_marks*100;
                                    ?>
                                    
                                        <?php if( $total_number >=91 && $total_number <=100 ): ?>
                                        A+
                                        <?php elseif( $total_number >=76 && $total_number <=90.99): ?>
                                        A
                                        <?php elseif( $total_number >=61 && $total_number <=75.99): ?>
                                        B
                                        <?php elseif( $total_number >=41 && $total_number <=60.99): ?>
                                        C
                                        <?php elseif( $total_number >=0 && $total_number <=40.99): ?>
                                        D
                                        <?php else: ?>
                                          -
                                        <?php endif; ?>
                                  <?php endif; ?>
        
         <?php else: ?>
         -
         <?php endif; ?>
           
         <?php endif; ?>
       </td>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <td class="AreaBorder ctc ">
         
         <?php
         $grade ='';
         if($maximum_marks == 0)
         {
          $grade = '' ;
         }
         else
         {
         if($number->student_marks != '')
         {
          $grade = ($obtained_total_right / $maximum_marks_total_right)*100;
          }
          
         }
         
        
         ?>
         <?php if($maximum_marks == 0): ?>
            <?php if(!empty($array)): ?>
        
             <?php if(in_array('A1', $array)): ?>
                                    A1
                                <?php elseif(in_array('A2', $array)): ?>
                                A2
                                <?php elseif(in_array('B1', $array)): ?>
                                B1
                                <?php elseif(in_array('B2', $array)): ?>
                                B2
                                <?php elseif(in_array('C1', $array)): ?>
                                C1
                                <?php elseif(in_array('C2', $array)): ?>
                                C2
                                <?php elseif(in_array('D', $array)): ?>
                                D
                                <?php elseif(in_array('E', $array)): ?>
                               E
                               
                               <?php endif; ?>
           
            <?php endif; ?>
         <?php else: ?>
         
                               <?php if( $grade >=91 && $grade <=100 ): ?>
                                        A+
                                        <?php elseif( $grade >=76 && $grade <=90.99): ?>
                                        A
                                        <?php elseif( $grade >=61 && $grade <=75.99): ?>
                                        B
                                        <?php elseif( $grade >=41 && $grade <=60.99): ?>
                                        C
                                        <?php elseif( $grade >=0 && $grade <=40.99): ?>
                                        D
                                       
                               <?php else: ?>
                              <?php
                              $grade ='';
                              if($number->student_marks != '')
                              {
                               $grade = ($obtained_total_right / $maximum_marks_total_right)*100;
                              }
                              else
                              {
                              $grade ='';
                              }
                              ?>
                              
                              <?php if( $grade >=91 && $grade <=100 ): ?>
                                    A+
                                <?php elseif( $grade >=76 && $grade <=90.99): ?>
                                A
                                <?php elseif( $grade >=61 && $grade <=75.99): ?>
                                B
                                <?php elseif( $grade >=41 && $grade <=60.99): ?>
                                C
                                <?php elseif( $grade >=0 && $grade <=40.99): ?>
                                D
                                <?php else: ?>
                                  -
                                <?php endif; ?>
                               
                               
                               
                               
                                    <?php endif; ?>
                                    
         <?php endif; ?>
                                    
                                    
     </td>
 </tr>
 <?php endif; ?>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
 

</thead>
</table>
 <table width='100%'>
  <tbody class="mt-3" >
         <tr>
			   
			    <?php
			
			    $percentage = ($total_obtained/($total_maximum_possible == 0 ? 1 : $total_maximum_possible))*100;
			    ?>
			    <td class="rtr subpadding"><b>Percentage : <?php echo e(round($percentage ,2)); ?>%</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> <!--Grand Total : <?php echo e($total_obtained); ?> / <?php echo e($total_maximum_possible); ?>--></b></td>
			    
			</tr>
  </tbody>
  </table>
  <table class="mt-2" style="border: 2px solid;width: 81%;">
			<tbody>
			<tr>
			    <th class=" AreaBorder"><b>Non Scholastic Performance</b> </th>
			    
			  
			     <?php $__currentLoopData = $list_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      	   
                     <th class="fontweight AreaBorder ctc"> <?php echo e($item->name ?? ''); ?>                
                       

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tr>
     			      	  <tr>
			   <?php $__currentLoopData = $list_subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item_subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
   <?php if(($item_subject->other_subject ?? '') == 1): ?>
    <td class="fontweight AreaBorder"><?php echo e($item_subject->name ?? 'd'); ?></td>
    
     	       <?php $__currentLoopData = $list_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      	     <?php
			      	     
		 	 $scholastic_number =    DB::table('performance_marks')->where('term_id',$item->id)->where('admission_id',$admission_id->id)
		 	 ->where('performance',0)
		 	 ->where('session_id',Session::get('session_id'))
                                    ->where('branch_id',Session::get('branch_id'))
                                    ->where('deleted_at',null)
                                    ->get();
                                    
                                  
	

			    
			    ?>
			      	   
			      	  <?php if(!empty($scholastic_number)): ?>
			      <?php $__currentLoopData = $scholastic_number; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      
			      
	    

            <td class="fontweight AreaBorder ctc"><?php echo e($number->student_marks ?? 0); ?></td> 
           
            
            
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                          
                 <?php endif; ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 
			 
			 
	 </tr>		 
			 
	
  </tbody>
  </table>
  
  

  <table class="border_percentage" style="width: 100%;margin-top: 2%;">
			<tbody >
			<tr style="height: 84px;">
			    <td class="fontweight">Percentage Grade(Scholastic): </td>
			    <td class="fontweight">A+(91%-100%), A(76%-90%),</td>
			    <td class="fontweight">B(61%-75%),</td>
			    <td class="fontweight">C(41%-60%),</td>
			     <td class="fontweight">D(0%-40%)</td> 
			</tr>
		
  </tbody>
  </table>
  <table class="mt-5" style="border-top: 2px solid;width: 100%;">
			<tbody>
			<tr>
			    <td class="fontweight" style="width: 11%;padding: 25px 0px 0px 0px;">Remarks</td>
			    <td class="fontweight" style="border-bottom: 2px solid;padding: 25px 0px 0px 0px;"></td>
			</tr>
  </tbody>
  </table>
  <table class="mt-4" style="width: 100%;">
			<tbody>
			<tr>
			    <td style='width:33.3%'class="fontweight"></td>
			    <td style='width:33.3% mt-4'class="fontweight ctc"></td>
			    <td style='width:33.3%'class="fontweight ctc"></td>
			</tr>
			<tr>
			    <td class="fontweight pt-4">Result Date</td>
			    <td class="fontweight ctc pt-4">Principal</td>
			    <td class="fontweight ctc pt-4">Exam Controller</td>
			</tr>
  </tbody>
  </table>
  </div>
  </div>
 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</body>
</html><?php /**PATH /home/rusoft/public_html/demo3/resources/views/print_file/exam/marksheet_pdf.blade.php ENDPATH**/ ?>