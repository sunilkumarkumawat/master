 

		<table style="border-bottom: 2px solid;">
			<tbody >
					<tr>
      <td  rowspan="4" style="width: 33%;">
          <img alt="left_logo" rowspan="4" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'" style="width: 180px;"></td>
  
      <td   style=" font-size:28px;width:100%;"><span class="style71"><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span></td>
   
      <td rowspan="4"> 
      <!--<img  alt="right_logo" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/right_logo/'.$getSetting['right_logo']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/common_images/rukmani_logo.png'); ?>'" style="width: 130px;">--></td>
     
    
     
   </tr>
	<tr style="">
       
 
   
      <td   style="font-size:14px;"><p style="margin-bottom:-0.5%;"><b >Address :- </b> <?php echo e($getSetting['address'] ?? ''); ?></p></td>

      </tr>
      <tr>
     
   
      <td  style="font-size:14px;"><p style="margin-bottom:-0.5%;"><b >Phone:-</b> <?php echo e($getSetting['mobile'] ?? ''); ?> &nbsp;<b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?>  </p></td>
    </tr>
   	<tr style="text-align:center;">
       

   
      <!--<td   style="font-size:14px;text-align:center;"><b>www.rukmanisoftware.com</b></td>-->

      </tr>

    
  </tbody></table> <?php /**PATH /home/rusoft/public_html/demo3/resources/views/print_file/print_header.blade.php ENDPATH**/ ?>