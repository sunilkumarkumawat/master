@php
$getSetting=Helper::getSetting();

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
    <style>
     
        body {
   font-family: Arial, sans-serif;
      font-size:12px;
      max-width:750px;
      margin: 25px auto ;
     
   /* border: 0.5px solid; */
   }
   .student_img {
   width: 80px; 
   height:100; 
   margin-top: 5%;
   margin-left:20%;
   padding-bottom: 10px;
       
   }
   
   .row{
       margin-right: 0px;
   }
   .img_background_fixed{
     position: relative;
   }
   
   .img_absolute{
       position: absolute;
       top: 80px;
       width: 100%;
       display: flex;
       align-items: center;
       justify-content: center;
       height: 100%;
       right: 0;
   }
   
   .backhround_img{
       opacity: 0.3;
       width: 34%;
   }

   table {
            width: 100%;
            border-collapse: collapse;
            margin: 0px;
        }
        .inner_table th{
            border: 1px solid #000;
            padding: 5px;
            /* background-color: #f2f2f2; */
        }
      
        .invoice-header {
            margin-bottom: 20px;
            text-align:'center'
        }
        .inner_table td{
            padding:5px
        }
        .ltr{
            text-align: left;
            border-right: none !important;
        }
        .rtr{
            text-align:right;
        }

       #personal_detail th {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
            background:#dddddd
        }
       #personal_detail td {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }
   </style>
</head>
<body class='page'>
<table>
			<tbody >
					<tr>
      <td rowspan='2' width='25%'>
          <img  src="{{ env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo'] }}" style="width: 150px;" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png' }}'">
          </td>
      <td   width='50%' style="font-size:20px;text-align:center;"><span><strong>{{$getSetting['name'] ?? ''}}</strong></span></td>
      <td width='25%'> 
      </td>
    
   </tr>
	<tr style="text-align:center;">
      <td width='50%'  style="text-align:center;">
      <p ><b >Address </b> {{$getSetting['address'] ?? ''}}</p>
      <p ><b >Phone:-</b> {{$getSetting['mobile'] ?? ''}} &nbsp;<b>Email :</b> {{$getSetting['gmail'] ?? ''}}</p>
    </td>
      <td width='25%'></td>
      </tr>

  </tbody>
  </table> 
  <p style='text-align:center; font-weight:900;line-height:20px;margin-top:35px;font-size:18px'>

Fees Ledger

</p>

<table id='personal_detail'>
      	<tbody >
      <tr>
          <th>Name</th>
          <td>{{ $data['stuData']['first_name'] ?? '' }} {{ $data['stuData']['last_name'] ?? '' }}</td>
          <th>Father's Name</th>
          <td>{{ $data['stuData']['father_name'] ?? '' }}</td>
         
      </tr>
      <tr>
          <th>Class</th>
          <td> {{ $data['stuadmissions']['class_name'] ?? '' }} 
              @if(!empty($data['stuData']['Section']['name']))
              ({{ $data['stuData']['Section']['name'] ?? '' }})
              @endif</td>
          <th>Mobile</th>
          <td>{{ $data['stuData']['mobile'] ?? '' }}</td>
         
      </tr>
      <tr>
          <th>Admission No.</th>
          <td>{{$data['stuData']['admissionNo'] ?? ''}} </td>
          <td></td>
          <td></td>
          
      </tr>
       </tbody>
  </table>



  <table style ='margin-top:20px' >
      	<tbody >
      <tr>
        <td style='border:0px solid black;width:50%'>
        <table class='inner_table'>
        <thead>
            <tr>
                <th class='ltr' >Receipt No.</th>
                <th class='rtr'>Paymant Mode</th>
                <th class='rtr'>Transaction Id</th>
                <th class='rtr'>Bank Name</th>
                <th class='rtr' >Fees Type</th>
                <th class='rtr'>Date</th>
                <th colspan="2" class='rtr'>Amount</th>
               
              
            </tr>
        </thead>
      	<tbody>
      	     @if(!empty($data['stuPaidDetail']))
        @php

        $i=1;
        $total_amount = 0;
        $discount_amount = 0;
        @endphp
        @foreach ($data['stuPaidDetail'] as $item)
        
        @php
            $StudentDiscount = DB::table('fees_assign_details')->whereNull('deleted_at')
                        ->where('admission_id',$item->admission_id)
                        ->where('fees_group_id',$item->fees_group_id)
                        ->first();
                        
            $discount_amount +=$StudentDiscount->discount;
       @endphp
            <tr >
                
            <td style="border:1px solid black" class='ltr'>{{$item->receipt_no  ?? '' }}</td>
            <td style="border:1px solid black" class='rtr'>{{$item->name  ?? '' }}</td>
            <td style="border:1px solid black" class='rtr'>{{$item->transition_id  ?? '-' }}</td>
            <td style="border:1px solid black" class='rtr'>{{$item->bank_name  ?? '-' }}</td>
            <td style="border:1px solid black" class='rtr'>{{$item['fees_name'] ?? ''}}</td>
            <td style="border:1px solid black" class='rtr'>{{date('d-M-Y', strtotime($item['date'])) ?? '' }}</td>
            <!--<td style="border:1px solid black" class='rtr'>{{ number_format($item->discount ,2) ?? '' }}</td>-->
            <td style="border:1px solid black" colspan="2" class='rtr'>₹ {{ number_format($item->total_amount ,2) ?? '' }}</td>
            </tr>
         
        @php
            $total_amount += $item->total_amount;
        @endphp
        @endforeach
        @endif

    </tbody>
    <tfoot style='border:1px solid black'>
            <tr>
            <td rowspan='3' style="text-align: left;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAG1BMVEUAAAD///8iIiL5+fkmJib39/cfHx/y8vI2NjaY7mNSAAAFNklEQVR4nO2d67KbMAyESUjO6fs/cafTwdCstaxsp0DO7k9btvVBMpIvwHSbu3QDkSpB2LrPv/k2zVOX0EdSJai0fkJJm+azEd6LZ1DSJhPuyoQmNOHnEZbWJVqMI2xzBEuEKhLrcKh7XEX0OJaQ/AIxE8LfraK1lQlNaEITmvCihCSaM1+HEaKvxGkCT5rHhOQqzMIIlVanJcRfspKpVlqZ0IQmNKEJr074iG1JPDyIUDEWOkZ9CCHJyExoQhOa0IQmvBAhKm5VCta1d2h0vpwmQ6jknCfOS01oQhOa0IT/hVAweeuatyKFmZRkrtj5dmaUEnCaYJjQhCY0oQl/OiGxRV9TDtbOtbWpiVBp9IaziW1qIhyVhSoy4a5MWC0xYb2kTSbclQmrJRjriglZBW/TnMsU2oSoQFjxbNjoozpiY5jQhH2jj+qIjWFCE/aNPqojNsYPJowBx/mVy2kU1wRnseYBJcUGH+VLlRxD2LnllCoxoQlNaEITXpWQTOSJDdnQJ5v+tZxG4VFQBRtMzYiNskVzAULMVE1oQhOa0IQ/nZAMjjY4SyaEmx6JeSdG3B957FCxQZFNf23fYjRh6oCoItLKhCY0oQlNeFVCpb+2eIhVrWcT0VkFNR4qlQMofnW/c6+PUElHJzBOHTTtPl9qQhOa0IQmPJoQu/m/8RD7JmBETa0V5iLlzfTHEI7KSxVjE5rQhCb8VEKlkRItlA43hI/7X61dLyWo6Va+4lJGg5Kw+fQdfxXm19erF4vxeqO+X42JzbP1OzPkhgutSdr1FRtj1vYl2JyOMLX39IbTJiY0oQlNeBnCGLAS6LEKS5Bw7XGT05CPs4GWaL4J9JAwTFHPa6QunmGgL7pDx1iChCW70FYxcFi8worNIozUGOhTojszRxCS/0+bTBj4YcJ/Wyk2JmyWCQM/3keINak9bVRyl7tES4ysq2tlCr3oGecJr5N9nKRLM3q8P+tEftEMxsm3Cq6EguLWJNArOScao85C2JZnm9CEJjShCSca6LGKGBPC1UYijFfsMU9YSyAHgDl+JdBjFck7YIlgLVnG2q7qM8JM1c6d/SMS6FOTfbK8v7mbRxAqf78UITuIYkITmtCEH0qoBHpFOPgTB5uWwExm61JVGSTe/cfYLUz2KwkDLt3jZH9LOEiZa1+kTPZRqQT1LIRtWbUJTWhCE5pwoqlEipA6NsMifkbKysAaqsEEQnYl/8L5e3yEr+LgG94jTC5s3E3n8TyyMnABwlRJpWcT7smEJgx9NWG9pNLz+QmLDXlXPXFwu6ofTqor02zEeEIVTPbLBJ7EdyzB5YR4jl9ZBxj3rSDlego8bE0JbLBDtDGhCU1oQhNelbDYks16MjjZFEAvpJN7bEYPrTJn9dlmfbyuQDYFVk9rT+cpN4ERCq0WdZ7ML5I2BQ4h7DwvWyQt1Zkw8JWUkFYmzMqEJmS+khLSalHnyXzsmOUAbySEB/dIyMaboBzaxw6n16rs6csc4X6How6aEplw12kTmtCEJtzVwYTFBCOa8nE1Re8khGf2cXMgPrCHD9yxR/CgOV+nGUWINqDUgT2U9Ns+ljB3MsaEJjShCU2ouZgBZHkCJQyfqqudzCeEMMcnCzZkfR6O8JG1gspe/7idGXLr4huknMGTjueRns9GqPy1TGhCE5rQhNVuyPydfFMt7rj61vn9p+pqsbaCEacH4at4cP5eyTIIIXHwDacvyQ0HdWahiky4KxOa0IQm3NXBhLWny0O1OTinjuhXVMbHEqyKWytqdPA3WHBz+4cepeoAAAAASUVORK5CYII=
" style="height:90px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: right;border:1px solid black"><b>Total Assign Amount:</b></td>
                <td style="text-align: right;border:1px solid black">₹ {{ number_format($data['total_assign'] ,2) ?? '' }}</td>
            </tr>
            <tr>
               
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style="text-align: right;border:1px solid black"><b>Total Amount:</b></td>
                <td id="inNumber" style="text-align: right;border:1px solid black">₹ {{ number_format($total_amount ,2) ?? '' }}</td>
            </tr>
            <!--<tr>
                
                <td></td>
                <td></td>
                <td  style="text-align: right;border:1px solid black"><b>Total Discount:</b></td>
                <td style="text-align: right;border:1px solid black">{{$discount_amount  ?? '' }}</td>
            </tr>-->
            <tr>
               
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style="text-align: right; border:1px solid black"><b>Due:</b></td>
                <td style="text-align: right;border:1px solid black">₹ {{ number_format($data['total_assign']-$total_amount-$discount_amount ,2) ?? '' }}</td>
            </tr>
            <tr style='border-top:1px solid black'>
               <td></td>
               @php
                    $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                    $words = $formatter->format($total_amount);
                    $words .= ' rupees';
                @endphp
              
                <td colspan='2'  style="text-align: center;"><b>Amount In Words:</b></td>
                <td><b id="inWords"> {{ $words ?? '' }}</b></td>
            </tr>
           
           
        </tfoot>
    </table>

        </td>
       
         
      </tr>
    
       </tbody>
  </table>


  <table style ='margin-top:5px;' >

    <tfoot style='border:1px solid black'>
            <tr>
            <td style="text-align: center;"></td>
                <td style="text-align: right">
                <img src="{{ env('IMAGE_SHOW_PATH').'/setting/seal_sign/'.$getSetting['seal_sign'] }}" style="height:90px;" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/seal.png' }}'">

                </td>
                
            </tr>
            <tr>
            <td style="text-align: left;">&nbsp;&nbsp;&nbsp;Signature</td>
                <td style="text-align: right;padding:10px">
            Seal & Sign    
            </td>
                
            </tr>
           
           
           
        </tfoot>
    </table>


<p style='text-align:center; line-height:20px;margin-top:35px'>

Generated By E-planet</br>
for more details, log on to <a href='http://erp.eplanetacademy.com'>http://erp.eplanetacademy.com</a>

</p>


 



</body>
</html>

<!--<script>-->
<!--    var th_val = ['', 'thousand', 'Lakh', 'Crore', 'trillion'];-->
    
<!--    var dg_val = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];-->
<!--    var tn_val = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];-->
<!--    var tw_val = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];-->

<!--    function toWordsconver(s) {-->
<!--        s = s.toString();-->
<!--        s = s.replace(/[\, ]/g, '');-->
<!--        if (s != parseFloat(s))-->
<!--            return 'not a number ';-->
<!--        var x_val = s.indexOf('.');-->
<!--        if (x_val == -1)-->
<!--            x_val = s.length;-->
<!--        if (x_val > 15)-->
<!--            return 'too big';-->
<!--        var n_val = s.split('');-->
<!--        var str_val = '';-->
<!--        var sk_val = 0;-->
<!--        for (var i = 0; i < x_val; i++) {-->
<!--            if ((x_val - i) % 3 == 2) {-->
<!--                if (n_val[i] == '1') {-->
<!--                    str_val += tn_val[Number(n_val[i + 1])] + ' ';-->
<!--                    i++;-->
<!--                    sk_val = 1;-->
<!--                } else if (n_val[i] != 0) {-->
<!--                    str_val += tw_val[n_val[i] - 2] + ' ';-->
<!--                    sk_val = 1;-->
<!--                }-->
<!--            } else if (n_val[i] != 0) {-->
<!--                str_val += dg_val[n_val[i]] + ' ';-->
<!--                if ((x_val - i) % 3 == 0)-->
<!--                    str_val += 'Hundred ';-->
<!--                sk_val = 1;-->
<!--            }-->
<!--            if ((x_val - i) % 3 == 1) {-->
<!--                if (sk_val)-->
<!--                    str_val += th_val[(x_val - i - 1) / 3] + ' ';-->
<!--                sk_val = 0;-->
<!--            }-->
<!--        }-->
<!--        if (x_val != s.length) {-->
<!--            var y_val = s.length;-->
<!--            str_val += 'point ';-->
<!--            for (var i = x_val + 1; i < y_val; i++)-->
<!--                str_val += dg_val[n_val[i]] + ' ';-->
<!--        }-->
<!--        return str_val.replace(/\s+/g, ' ');-->
<!--    }-->

<!--    var number = document.getElementById("inNumber").innerText;-->
<!--    var b = parseInt(number);-->
<!--    var Inwords = toWordsconver(b);-->

<!--    document.getElementById("inWords").innerText = Inwords + " " + "Only";-->
<!--</script>-->