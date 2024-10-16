<?php
$getSetting=Helper::getSetting();
//dd($data);
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .dotted {
        border-bottom: 2px dotted;
        width: 100%;
        display: block;
    }

    .name1 {
        white-space: nowrap;
        font-weight: 600;
    }

    .name2 {
        white-space: revert;
        font-weight: 600;
    }

    .div2 {
        display: flex;
        align-items: end;
    }
    tr,td,th{
        border:hidden;
    }
        .img_background_fixed{
          position: relative;
        }
        
        .img_absolute{
            position: absolute;
           top: -308px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            right: 0;
        }
        
        .backhround_img{
            opacity: 0.3;
            width: 47%;
        }
</style>

<div class="container mt-2 mb-3">
    
    <div class="row">
        <div class="card">

            <div class="col-md-12 cl">
    

		<table style="border-bottom: 2px solid;">
			<tbody >
					<tr>
      <td  rowspan="4" style="border:hidden;">
          <img alt="left_logo" rowspan="4" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo']); ?>"  onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'" style="width: 130px;"></td>
  
      <td   style=" font-size:28px;text-align:center;width:100%;"><span class="style71"><strong><?php echo e($getSetting['name'] ?? ''); ?></strong></span></td>
   
      <td rowspan="4" style="border:hidden;"> 
      <!--<img  alt="right_logo" src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/right_logo/'.$getSetting['right_logo']); ?>" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png'); ?>'" style="width: 130px;">-->
      </td>
     
    
     
   </tr>
	<tr style="text-align:center;">
       
 
   
      <td   style="font-size:14px;text-align:center;"><p style="margin-bottom:-0.5%;"><b ><?php echo e($getSetting['address'] ?? ''); ?></b></p></td>

      </tr>
      <tr>
     
   
      <td  style="font-size:14px; text-align:center;"><p style="margin-bottom:-0.5%;"><b >Phone:-</b> <?php echo e($getSetting['mobile'] ?? ''); ?> &nbsp;<b>Email :</b> <?php echo e($getSetting['gmail'] ?? ''); ?>  </p></td>
    </tr>
   	<tr style="text-align:center;">
       

   
      <td   style="font-size:14px;text-align:center;"><b>www.rukmanisoftware.com</b></td>

      </tr>

    
  </tbody></table> 



                <div class="col-md-12 mt-4 mb-3">
                    <div class="img_background_fixed">
        <div class="img_absolute">
        <img src="<?php echo e(env('IMAGE_SHOW_PATH').'/setting/watermark_image/'.$getSetting['watermark_image']); ?>" alt="bg_logo" class="backhround_img">
        </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="div2">
                                        <span class="name1">Name Of Student</span><span class="dotted ml-2"><?php echo e($data->first_name ?? ''); ?> <?php echo e($data->last_name ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Session</span><span class="dotted ml-2"><?php echo e($data->from_year ?? ''); ?>-<?php echo e($data->to_year ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">D.O.B</span><span class="dotted ml-2"><?php echo e($data->dob ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">College</span><span class="dotted ml-2"><?php echo e($data->college ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Course</span><span class="dotted ml-2"><?php echo e($data->Course ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Email</span><span class="dotted ml-2"><?php echo e($data->email ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Student's Contact No</span><span class="dotted ml-2"><?php echo e($data->mobile ?? ''); ?></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Father's Name</span><span class="dotted ml-2"><?php echo e($data->father_name ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Contact No</span><span class="dotted ml-2"><?php echo e($data->f_mobile ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Mother's Name</span><span class="dotted ml-2"><?php echo e($data->mother_name ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="div2">
                                        <span class="name1">Contact No</span><span class="dotted ml-2"><?php echo e($data->mothers_mobile ?? ''); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'profile/'.$data['student_image'] ?? ''); ?>" width="100%" style="border-radius: 13px;    border: 2px solid #978e8e;" height="150px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
                            <?php if(!empty($data['Student_Signature_img'])): ?>
                            <img class="text-center" src="<?php echo e(env('IMAGE_SHOW_PATH').'hostel/Student_Signature_img/'.$data['Student_Signature_img']); ?>"  onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/seal.png'); ?>'" width="80px" height="60px" >
                            <?php else: ?>
                            <p style="padding-top:25px;margin-left: 29px;">No Signature</p>
                            <?php endif; ?>
                            <p class="text-center mt-3" style="border-top: 2px solid;">Student Sign</p>
                        </div>

                       
                        <div class="col-md-12 mt-n3">
                            <div class="div2">
                                <span class="name1">Permanent Address</span><span class="dotted ml-2"><?php echo e($data->student_address ?? ''); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="div2">
                                <span class="name1">Tel</span><span class="dotted ml-2"><?php echo e($data->guardian_tel ?? ''); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="div2">
                                <span class="name1">Mobile 2</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e($data->guardian_whatsapp ?? ''); ?></span>
                            </div>
                        </div>
                         <div class="col-md-6 mt-3">
                            <div class="div2">
                                <span class="name1">Name Of Local Guardian </span><span class="dotted ml-2"><?php echo e($data->guardian_name ?? ''); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="div2">
                                <span class="name1">Mobile</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e($data->guardian_mobile ?? ''); ?></span>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mt-3">
                            <div class="div2">
                                <span class="name1">Address</span><span class="dotted ml-2"><?php echo e($data->guardian_address ?? ''); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <p style="font-weight: 600;">Hostel room preference</p>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ml-5">
                                        <div class="div2">
                                            <span class="name1">Occupancy</span><span class="dotted ml-2"><?php echo e($data->Occupancy ?? ''); ?></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-4">
                                    <div class="div2">
                                        <span class="name1">Duration Of stay </span><span class="dotted ml-2"><?php echo e($data->duration_Of_stay ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-8">

                                </div>
                                <div class="col-md-4">
                                    <div class="div2">
                                        <span class="name1">Bed No.</span><span class="dotted ml-2"><?php echo e($data->bed_name ?? ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-8">

                                </div>

                                <div class="col-md-12 mt-4">
                                    <p style="font-weight: 600;">Details Of Persons who will contact the student</p>
                                    <div class="row">
                                        <div class="col-md-4 col-6 text-center">
                                            <label><b>Father's Photo </b></label><br>

                                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'father_photo/'.$data['father_img']); ?>" width="50%" height="150px" style="border-radius: 14px;border: 1px solid #978e8e;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
                                        </div>
                                        <div class="col-md-4 col-6 text-center">
                                            <label><b>Mother's Photo </b></label><br>

                                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'mother_photo/'.$data['mother_img']); ?>" width="50%" height="150px" style="border-radius: 14px;border: 1px solid #978e8e;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
                                        </div>
                                        <div class="col-md-4 col-6 text-center">
                                            <label><b>Local Guardian Photo </b></label><br>

                                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'hostel/guardian_photo/'.$data['guardian_photo']); ?>" width="50%" height="150px" style="border-radius: 14px;border: 1px solid #978e8e;" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/user_image.jpg'); ?>'">
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-4 text-center mt-3">
                                            <?php if(!empty($data['father_Signature'])): ?>
                                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'hostel/father_Signature/'.$data['father_Signature']); ?>" width="80px" height="80px"  onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/no_image.png'); ?>'">
                                             <?php else: ?>
                                            <p style="padding-top:25px;">No Signature</p>
                                            <?php endif; ?>
                                            <p style="font-weight: 600;border-top: 1px solid;width: 103px;margin-left: 35%;">Signature</p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <p><u></u></p>
                                            <?php if(!empty($data['mother_Signature'])): ?>
                                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'hostel/mother_Signature/'.$data['mother_Signature']); ?>" width="80px" height="80px"  onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/no_image.png'); ?>'">
                                           <?php else: ?>
                                            <p style="padding-top:25px;">No Signature</p>
                                            <?php endif; ?>

                                            <p style="font-weight: 600;border-top: 1px solid;width: 103px;margin-left: 35%;">Signature</p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <p><u></u></p>
                                             <?php if(!empty($data['guardian_Signature'])): ?>
                                            <img src="<?php echo e(env('IMAGE_SHOW_PATH').'hostel/guardian_Signature/'.$data['guardian_Signature']); ?>" width="80px" height="80px" onerror="this.src='<?php echo e(env('IMAGE_SHOW_PATH').'/default/no_image.png'); ?>'" >
                                             <?php else: ?>
                                            <p style="padding-top:25px;">No Signature</p>
                                            <?php endif; ?>
                                            <p style="font-weight: 600;border-top: 1px solid;width: 103px;margin-left: 35%;">Signature</p>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-12 mb-4 mt-4" style="border-bottom: 2px solid black;">
                                            <span></span>
                                        </div>

                                        <div class="col-md-12">
                                            <h3 class="text-center"><u>For office use only</u></h3>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="div2">
                                                <span class="name1">Name of student</span><span class="dotted ml-2"><?php echo e($data->first_name ?? ''); ?> <?php echo e($data->last_name ?? ''); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="div2">
                                                <span class="name1">Duration</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e($data->duration_Of_stay ?? ''); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <div class="div2">
                                                <span class="name1">Advancee deposit Rs</span><span class="dotted ml-2"><?php echo e($data->hostel_total_paid ?? ''); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="div2">
                                                <span class="name1">Recpt No</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e($data->receipt_no ?? ''); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="div2">
                                                <span class="name1">Date</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e(date('d-m-Y', strtotime($data->date)) ?? ''); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="div2">
                                                <span class="name1">Room On Allotted</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e($data->room_id ?? ''); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="div2">
                                                <span class="name1">Date Of joining</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e(date('d-m-Y', strtotime($data->date)) ?? ''); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="div2">
                                                <span class="name1">Remark (if any)</span><span class="dotted ml-2" style="width: 90% !important;"><?php echo e($data->remark ?? ''); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <h5><u>Signature of warden/authorsed signatory</u></h5>
                                        </div>



                                    </div>


                                </div>
                            </div>


                        </div>




                    </div>
                </div></div>

            </div>
        </div>
    </div>


</div>



<div class="container mt-5 mb-3">
    <div class="row" style="margin-top: 39%;">
        <?php echo html_entity_decode($terms->terms ?? ''); ?>


    </div>
</div>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }


    .card {
        width: 100%;
        height: 100%;

    }

    .student_image {
        width: 140px;
    }

    li {
        display: block;
    }
</style><?php /**PATH /home/rusoft/public_html/demo3/resources/views/master/printFilePanel/HostelManagement/template04.blade.php ENDPATH**/ ?>