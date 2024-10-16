
<head>
<title>School | Fees Receipt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
@php
$getSetting=Helper::getSetting();

@endphp
<body>
    <style>
        
         body {
            
    border: 1px solid;
    }
    .student_img {
 width: 80px; 
 height:100; margin-top: 10%;margin-left:20%;
    padding-bottom: 10px;
        
    }
    
    .row{
        margin-right: 0px;
    }
    </style>
	<table style="border-bottom: 2px solid;">
			<tbody >
					<tr>
      <td  rowspan="4">
          <img  rowspan="4" src="{{ env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo'] }} " style="width: 115;" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png' }}'"></td>
  
      <td   style=" font-size:28px;text-align:center;width:100%;"><span class="style71"><strong>{{$getSetting['name'] ?? ''}}</strong></span></td>
   
      <td rowspan="4"> 
      <img  src="{{ env('IMAGE_SHOW_PATH').'/setting/left_logo/'.$getSetting['left_logo'] }}"style="width: 115;" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/rukmani_logo.png' }}'"></td>
     
    
     
   </tr>
	<tr style="text-align:center;">
       
 
   
      <td   style="font-size:14px;text-align:center;"><p style="margin-bottom:-0.5%;"><b >{{$getSetting['address'] ?? ''}}</b></p></td>

      </tr>
      <tr>
     
   
      <td  style="font-size:14px; text-align:center;"><p style="margin-bottom:-0.5%;"><b >Phone:-</b> {{$getSetting['mobile'] ?? ''}} &nbsp;<b>Email :</b> {{$getSetting['gmail'] ?? ''}}  </p></td>
    </tr>
   	<tr style="text-align:center;">
       

   
      <!--<td   style="font-size:14px;text-align:center;"><b>www.rukmanisoftware.com</b></td>-->

      </tr>

    
  </tbody></table> 

<table Style="Width:100%;">
<div class="row">
<div class="col-sm-2 border-left"><b>Receipt No</b></div>
<div class="col-sm-3 border-right"><b>: {{ $data['id']  }}</b></div>
<div class="col-sm-2"><b>Name</b></div>
<div class="col-sm-3 border-right"><b>: {{ $data['first_name'] ?? '' }} {{ $data['last_name'] ?? '' }}</b></div>
<div></div>
</div>
<div class="row">
<div class="col-sm-2 border-left"><b>Date</b></div>
<div class="col-sm-3 border-right"><b>: {{ date('d-m-Y', strtotime($data['created_at'])) ?? '' }} </b></div>
<div class="col-sm-2"><b>Father's Name</b></div>
<div class="col-sm-3 border-right"><b>: {{ $data['father_name'] ?? '' }}</b></div>
</div>
<div class="row">
<div class="col-sm-2 border-left"><b></b></div>
<div class="col-sm-3 border-right"><b></b></div>
<div class="col-sm-2"><b>Mother's Name</b></div>
<div class="col-sm-3 border-right"><b>: {{ $data['mother_name'] ?? '' }}</b></div>
</div>
<div class="row">
<div class="col-sm-2"><b>Mobile</b></div>
<div class="col-sm-3 border-right"><b>: {{ $data['mobile'] ?? '' }}</b></div>
<div class="col-sm-2"><b>Electricity Bill Month</b></div>

@php
$dateObj   = DateTime::createFromFormat('!m', $data['month_id']);
@endphp
<div class="col-sm-3 border-right"><b>: {{$dateObj->format('F') ?? '' }}</b></div>
</div>
<div class="row">
<div class="col-sm-2"><b></b></div>
<div class="col-sm-3 border-right"></div>
<div class="col-sm-2"></div>
<div class="col-sm-3 border-right"></div>

<div class="col-sm-2 border-left" style="margin-top: -7%;"><span class="style73">@if(!empty($data['student_img']))

    <img class="student_img" src="{{ env('IMAGE_SHOW_PATH').'/profile/'.$data['student_img'] ?? '' }}" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/user_image.jpg' }}'" >
    @else
    <img class="student_img" src="{{ env('IMAGE_SHOW_PATH').'/student_icon.png' }}" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'/default/user_image.jpg' }}'">
    @endif </span></div>
</div>
</table>


</div>
<div class="row bg-light" style="border: 2px solid black;">
<div class="col-sm-2 border-left"><b>S. NO.</b></div>
<div class="col-sm-4 border-right text-left"><b>PARTICULARS</b></div>
<div class="col-sm-2 border-right text-left"><b>Monthly Consumption Unit</b></div>
<div class="col-sm-2 border-right text-left"><b>Rate Per Unit</b></div>
<div class="col-sm-2 border-right border-left text-center"><b>Amount</b></div>
</div>
<div class="row"style="border: 1px solid black;">
<div class="col-sm-2 border-left">1</div>
<div class="col-sm-4 border-right text-left">Monthly Power Consumption (In Unit):-</div>
<div class="col-sm-2 border-right text-left">{{ $data['monthly_consumption_uni'] ?? '' }}</div>
<div class="col-sm-2 border-right text-left">{{ $data['per_unit_rate'] ?? '' }}</div>
<div class="col-sm-2 border-right border-left text-center">{{ $data['total_amount'] ?? '' }}</div>
</div>


<table style="width:100%;">
    <tr>
<td rowspan="4 border-right border-top;"style="width: 25%;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAG1BMVEUAAAD///8iIiL5+fkmJib39/cfHx/y8vI2NjaY7mNSAAAFNklEQVR4nO2d67KbMAyESUjO6fs/cafTwdCstaxsp0DO7k9btvVBMpIvwHSbu3QDkSpB2LrPv/k2zVOX0EdSJai0fkJJm+azEd6LZ1DSJhPuyoQmNOHnEZbWJVqMI2xzBEuEKhLrcKh7XEX0OJaQ/AIxE8LfraK1lQlNaEITmvCihCSaM1+HEaKvxGkCT5rHhOQqzMIIlVanJcRfspKpVlqZ0IQmNKEJr074iG1JPDyIUDEWOkZ9CCHJyExoQhOa0IQmvBAhKm5VCta1d2h0vpwmQ6jknCfOS01oQhOa0IT/hVAweeuatyKFmZRkrtj5dmaUEnCaYJjQhCY0oQl/OiGxRV9TDtbOtbWpiVBp9IaziW1qIhyVhSoy4a5MWC0xYb2kTSbclQmrJRjriglZBW/TnMsU2oSoQFjxbNjoozpiY5jQhH2jj+qIjWFCE/aNPqojNsYPJowBx/mVy2kU1wRnseYBJcUGH+VLlRxD2LnllCoxoQlNaEITXpWQTOSJDdnQJ5v+tZxG4VFQBRtMzYiNskVzAULMVE1oQhOa0IQ/nZAMjjY4SyaEmx6JeSdG3B957FCxQZFNf23fYjRh6oCoItLKhCY0oQlNeFVCpb+2eIhVrWcT0VkFNR4qlQMofnW/c6+PUElHJzBOHTTtPl9qQhOa0IQmPJoQu/m/8RD7JmBETa0V5iLlzfTHEI7KSxVjE5rQhCb8VEKlkRItlA43hI/7X61dLyWo6Va+4lJGg5Kw+fQdfxXm19erF4vxeqO+X42JzbP1OzPkhgutSdr1FRtj1vYl2JyOMLX39IbTJiY0oQlNeBnCGLAS6LEKS5Bw7XGT05CPs4GWaL4J9JAwTFHPa6QunmGgL7pDx1iChCW70FYxcFi8worNIozUGOhTojszRxCS/0+bTBj4YcJ/Wyk2JmyWCQM/3keINak9bVRyl7tES4ysq2tlCr3oGecJr5N9nKRLM3q8P+tEftEMxsm3Cq6EguLWJNArOScao85C2JZnm9CEJjShCSca6LGKGBPC1UYijFfsMU9YSyAHgDl+JdBjFck7YIlgLVnG2q7qM8JM1c6d/SMS6FOTfbK8v7mbRxAqf78UITuIYkITmtCEH0qoBHpFOPgTB5uWwExm61JVGSTe/cfYLUz2KwkDLt3jZH9LOEiZa1+kTPZRqQT1LIRtWbUJTWhCE5pwoqlEipA6NsMifkbKysAaqsEEQnYl/8L5e3yEr+LgG94jTC5s3E3n8TyyMnABwlRJpWcT7smEJgx9NWG9pNLz+QmLDXlXPXFwu6ofTqor02zEeEIVTPbLBJ7EdyzB5YR4jl9ZBxj3rSDlego8bE0JbLBDtDGhCU1oQhNelbDYks16MjjZFEAvpJN7bEYPrTJn9dlmfbyuQDYFVk9rT+cpN4ERCq0WdZ7ML5I2BQ4h7DwvWyQt1Zkw8JWUkFYmzMqEJmS+khLSalHnyXzsmOUAbySEB/dIyMaboBzaxw6n16rs6csc4X6How6aEplw12kTmtCEJtzVwYTFBCOa8nE1Re8khGf2cXMgPrCHD9yxR/CgOV+nGUWINqDUgT2U9Ns+ljB3MsaEJjShCU2ouZgBZHkCJQyfqqudzCeEMMcnCzZkfR6O8JG1gspe/7idGXLr4huknMGTjueRns9GqPy1TGhCE5rQhNVuyPydfFMt7rj61vn9p+pqsbaCEacH4at4cP5eyTIIIXHwDacvyQ0HdWahiky4KxOa0IQm3NXBhLWny0O1OTinjuhXVMbHEqyKWytqdPA3WHBz+4cepeoAAAAASUVORK5CYII=
"style="height:90px;"></td>


<td colspan="3"><b>Payment Mode</b></td>
<td colspan="3"></td>
<td colspan="3"></td>
<td colspan="3"><b>Cash</b></td>




    
</tr>
<tr>
   
<td colspan="3"><b>Total Paid Amount</b></td>
<td colspan="3"style="width:145px;"></td>
<td colspan="3"></td>
<td colspan="3" ><b>Rs : </b> <b id="inNumber">{{ $data->total_amount ?? '' }}</b></td>



    
</tr>

</table>

<table style="width:100%;text-align:center;border-top:2px solid black;">

<tr>
    
  
<td style="width:59%;"><b>Amount In Word</b></td>
<td style="width:24%;"></td>
<td><b id="inWords"> : {{ $data['amount']['name'] ?? '' }}</b></td>

</tr>

</table>

</body>

</html>
<script>
var th_val = ['', 'thousand', 'Lakh', 'Crore', 'trillion'];
// System for uncomment this line for Number of English 
// var th_val = ['','thousand','million', 'milliard','billion'];
 
var dg_val = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
var tn_val = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
var tw_val = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
function toWordsconver(s) {
  s = s.toString();
    s = s.replace(/[\, ]/g, '');
    if (s != parseFloat(s))
        return 'not a number ';
    var x_val = s.indexOf('.');
    if (x_val == -1)
        x_val = s.length;
    if (x_val > 15)
        return 'too big';
    var n_val = s.split('');
    var str_val = '';
    var sk_val = 0;
    for (var i = 0; i < x_val; i++) {
        if ((x_val - i) % 3 == 2) {
            if (n_val[i] == '1') {
                str_val += tn_val[Number(n_val[i + 1])] + ' ';
                i++;
                sk_val = 1;
            } else if (n_val[i] != 0) {
                str_val += tw_val[n_val[i] - 2] + ' ';
                sk_val = 1;
            }
        } else if (n_val[i] != 0) {
            str_val += dg_val[n_val[i]] + ' ';
            if ((x_val - i) % 3 == 0)
                str_val += 'Hundred ';
            sk_val = 1;
        }
        if ((x_val - i) % 3 == 1) {
            if (sk_val)
                str_val += th_val[(x_val - i - 1) / 3] + ' ';
            sk_val = 0;
        }
    }
    if (x_val != s.length) {
        var y_val = s.length;
        str_val += 'point ';
        for (var i = x_val + 1; i < y_val; i++)
            str_val += dg_val[n_val[i]] + ' ';
    }
    return str_val.replace(/\s+/g, ' ');
}

var number = document.getElementById( "inNumber" ).innerText;
  var b = parseInt(number);
 var Inwords = toWordsconver(b);
 
 document.getElementById( "inWords" ).innerText=Inwords+ " " + "Only" ;

//alert(Inwords);
</script>
@include('print_file.print_footer')

<script type="text/javascript">
window.print();
</script>