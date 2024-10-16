@php
$getSetting=Helper::getSetting();
 $account = Helper::getQRCode($getSetting->account_id);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Breakdowns</title>
    <style>
     
      body {
   font-family: Arial, sans-serif;
      font-size:12px;
      max-width:750px;
      margin: 25px auto ;
   // border: 0.5px solid; 
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
       top: 85px;
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
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .invoice-header {
            margin-bottom: 20px;
            text-align:'center'
        }

        .border_none{
            border: none;
        }
     
   </style>
</head>
<body class='page'>
<table style="border-bottom: 0px solid;width:100%;" >
			<tbody >
					<tr>
      <td class="border_none" rowspan='2' width='25%'>
          <img src="{{ env('IMAGE_SHOW_PATH').'setting/left_logo/'.$getSetting->left_logo }}" style="width: 150px;height: 69px;">
          </td>
      <td class="border_none"   width='50%' style="font-size:20px;text-align:center;"><!--<span><strong>{{$getSetting['name'] ?? ''}}</strong></span>--></td>
      <td class="border_none" width='25%'> 
      </td>
    
   </tr>
	<tr style="text-align:center;">
	    
      <td class="border_none" width='50%'  style="text-align:center;">
       <span style="font-size:20px;text-align:center;"><strong>{{$getSetting['name'] ?? ''}}</strong></span>
      <p style="margin-bottom: -9px;"><b >Address </b> {{$getSetting['address'] ?? ''}}</p>
      <!--<p ><b >Phone:-</b> {{$getSetting['mobile'] ?? ''}}  &nbsp;<b>Email :</b> {{$getSetting['gmail'] ?? ''}}</p>-->
    </td>
      <td class="border_none" width='25%'></td>
      </tr>

  </tbody>
  </table> 

  <table >
     
      	<tbody >
      <tr>
          <th>Name</th>
          <td>{{ $student->first_name ?? '' }} {{ $student->last_name ?? '' }}</td>
          <th>Father's Name</th>
          <td>{{ $student->father_name ?? '' }}</td>
         
      </tr>
      <tr>
          <th>Class</th>
          <td>
              {{ $student->Class_type_id ?? '' }} 
         </td>
          <th>Mobile</th>
          <td>{{ $student->mobile ?? '' }}</td>
         
      </tr>
       </tbody>
      
  </table>
  <table>
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Month</th>
                <th>Amount</th>
              
            </tr>
        </thead>
        <tbody>
        @if(!empty($data->fees_breakdown))
            @php
                $jsonString = $data->fees_breakdown;
                $arrayData = json_decode($jsonString, true);
            @endphp
            @if(!empty($arrayData))
            @php
                $sr_no = 1;
            @endphp
            @foreach($arrayData as $item)
                    <tr>
                        <td>{{ $sr_no++  }}</td>
                        <td>{{ $item['month'] ?? '' }}</td>
                        <td>{{ $item['amount'] ?? '' }}</td>
                    </tr>
                    @endforeach
                @endif    
            @endif
        </tbody>
    </table>
</body>
</html>