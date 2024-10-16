@php
$getSetting = Helper::getSetting();
$account = Helper::getQRCode($getSetting->account_id);
//dd($data[0]['Admission']);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Print </title>
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
        
        .bg_color_heading td{
            background-color:#f2f2f2;
            font-weight:600;
        }
        
        .information_text{
            font-size:12px;
        }
        
        .note_listing{
            margin-bottom:0px;
            /*list-style:none;*/
        }
        
        .note_listing li{
            margin-top:10px;
            font-size:12px;
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
      <td class="border_none" width='50%' style="font-size:20px;text-align:center;"><!--<span><strong>{{$getSetting['name'] ?? ''}}</strong></span>--></td>
      <td class="border_none" width='25%'> 
      </td>
    
   </tr>
	<tr style="text-align:center;">
	    
      <td class="border_none" width='50%'  style="text-align:center;">
       <span style="font-size:20px;text-align:center;"><strong>
           
           @if(($data[0]['classNumber'] ?? 0) > 10)
           {{$getSetting['name'] ?? ''}}
           
           @else
           {{ str_replace('Sr.', '', $getSetting['name'] ?? '') }}
           
           
           @endif
           
           </strong></span>
      <p style="margin-bottom: -9px;"><b >Address </b> {{$getSetting['address'] ?? ''}}</p>
      <!--<p ><b >Phone:-</b> {{$getSetting['mobile'] ?? ''}}  &nbsp;<b>Email :</b> {{$getSetting['gmail'] ?? ''}}</p>-->
    </td>
      <td class="border_none" width='25%'></td>
      </tr>
       <tr >
          <td colspan="12" class="border_none" style='text-align: center;padding-top:25px'><span style='color:red;font-size:18px;font-weight:bold'>Cancelled on [{{ date('d-M-Y', strtotime($data[0]->deleted_at)) }}]</span></td>
       </tr>
  </tbody>
  </table> 
<table>
     
      	<tbody >
      	    <tr><td rowspan='4'style="text-align: center;"><b>Receipt No.: <span style='color:red' >{{$data[0]['receipt_no'] ?? ''}}</span></b></td></tr>
      <tr>
          <th>Name</th>
          <td>{{ $data[0]['Admission']['first_name'] ?? '' }} {{ $data[0]['last_name'] ?? '' }}</td>
          <th>Father's Name</th>
          <td>{{ $data[0]['Admission']['father_name'] ?? '' }}</td>
         
      </tr>
      <tr>
          <th>Class</th>
          <td>
              {{ $data[0]['Admission']['ClassTypes']['name'] ?? '' }}
         </td>
          <th>Mobile</th>
          <td>{{ $data[0]['Admission']['mobile'] ?? '' }}</td>
         
      </tr>
      <tr>
          <th>Payment Date</th>
          <td>{{ date('d-M-Y', strtotime($data[0]->date)) }}</td>
          <th>Generated On</th>
          <td>{{ date('d-M-Y', strtotime($data[0]->created_at)) }}</td>
          
      </tr>
       </tbody>
      
  </table>
<table>
        <thead>
            <tr>
                <!--<th>Receipt No.</th>-->
                <th colspan='3' width='65%'>Head Name</th>
                <!--<th>Date</th>-->
                <!--<th>Discount</th>-->
                <th>Amount</th>
                <!--<th>Fine</th>-->
              
            </tr>
        </thead>
        <tbody>
            
            @if(!empty($data))
            @php
            $total_amount = 0;
            @endphp
            @foreach($data as $item)
           
            <tr>
                <!--<td>{{ $item['receipt_no'] ?? '' }}</td>-->
                <td colspan='3'>
                    @php
                        $feesGroup  = DB::table('fees_group')->whereNull('deleted_at')->where('id',$item['fees_group_id'])->first();
                    @endphp
                
                {{$feesGroup->name ?? ''}}
                </td>
                <!--<td>{{date('d-M-Y', strtotime($item['date'])) ?? '' }}</td>-->
                <!--<td>{{ $item['discount'] ?? '-' }}</td>-->
                <td>INR {{ number_format($item['total_amount'] ?? 0, 2) }}
                <!--<td>INR {{ number_format($item['installment_fine'] ?? 0, 2) }}-->
                @php
                $total_amount += $item['total_amount'] ?? 0;
                @endphp
                
                </td>
            </tr>
            @endforeach
            @endif
            <!-- Add more rows for additional items -->
        </tbody>
        @php
            $payment_name = DB::table('payment_modes')->whereNull('deleted_at')->where('id',$data[0]->payment_mode_id)->first();
        @endphp
        <tfoot>
            
            <tr class="bg_color_heading">
                <td >Payment Mode</td>
            
                    <td >Transaction Id</td>
                    <td >Bank Name</td>
               
                <td>Total Paid Amount</td>
            </tr>
            
            <tr>
                <td >{{ $payment_name->name ?? '' }}</td>
            
                    <td >{{ $data[0]->transition_id ?? '-' }}</td>
                    <td >{{ $data[0]->bank_name ?? '-' }}</td>
              
                <td  id="inNumber">INR {{ number_format ($total_amount ?? 0, 2)  }}</td>
            </tr>
            
            <tr>
                <th colspan="3" style="text-align: left;">Amount In Words</th>
                
                @php
                 $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                $words = $formatter->format($total_amount);
                $words .= ' rupees';
                @endphp
                <td colspan="5"><b id="inWords" style='text-transform: capitalize;'> : {{ $words}}</b></td>
            </tr>
            
        </tfoot>
    </table>
    
<table>
    <tbody>
        <tr>
           <td>
               <p class="information_text">Here are some general instructions that an institute could include on a fee receipt:</p>
               <ol class="note_listing">
                    <li>Please retain this receipt for your records.</li>
                    <li>This receipt acknowledges payment for the following item(s): [list the item(s) being paid for, such as tuition fees, library fees, admission fees, or exam fees].</li>
                    <li>If you have any questions regarding this payment, please contact [{{ $getSetting->mobile ?? '' }}].</li>
                    <li>Payments made by check are subject to clearance by our bank, and receipt of a check does not imply immediate availability of funds.</li>
                    <li>Please note that fees are subject to change without notice.</li>
                    <li>All payments made are subject to the terms and conditions of the institute.</li>
                    <li>Thank you for your payment and support of [{{ $getSetting->name ?? '' }}].</li>
               </ol>
           </td>
        </tr>
    </tbody>
</table>




 



</body>
</html>