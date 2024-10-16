@php
  $classType = Helper::classType();
  $getCountry = Helper::getCountry();
@endphp
@extends('layout.app') 
@section('content')


<style>
.padding_table thead tr{
    background: #002c54;
    color:white;
}
    
.padding_table th, .padding_table td{
     padding:5px;
     font-size:14px;
}

.capitalize{
    text-transform:capitalize;
}
</style>

<div class="content-wrapper">

   <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">      
    <div class="card card-outline card-orange">
        <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-money"></i> &nbsp;{{ __('fees.Fees Details') }} </h3>
        <div class="card-tools">
        <a href="{{url('Fees/add')}}" class="btn btn-primary  btn-sm" title="Add Fees"><i class="fa fa-plus"></i>{{ __('common.Add') }}</a>
        <a href="{{url('fee_dashboard')}}" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i>{{ __('common.Back') }} </a>
        </div>
        
        </div>  
        
                    <form id="quickForm" action="{{url('fees/index')}}" method="post" >
                        @csrf 
                    <div class="row m-2">
                    @if(Session::get('role_id') !== 2)
                        <div class="col-md-1">
                    		<div class="form-group">
                    			<label>{{ __('common.Class') }}</label>
                    			<select class="form-control select2" id="class_type_id" name="class_type_id" >
                    			<option value="">{{ __('common.Select') }}</option>
                                 @if(!empty($classType)) 
                                      @foreach($classType as $type)
                                         <option value="{{ $type->id ?? ''  }}" {{ ( $type['id'] == $serach['class_type_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                      @endforeach
                                  @endif
                                </select>
                    	    </div>
                    	</div>
                    @endif
                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label>{{ __('fees.From Date') }}</label>
                                    <input type="date" class="form-control " id="starting" name="starting" value="{{ $_POST['starting'] ?? '' }}">                 	    
                            </div>
                    	</div>
                    	<div class="col-md-2">
                            <div class="form-group ">
                                <label>{{ __('fees.To Date') }}</label>
                                    <input type="date" class="form-control " id="ending" name="ending" value="{{ $_POST['ending'] ?? '' }}">
                			</div> 
                        </div>
                    <!--    <div class="col-md-2">
            			<div class="form-group">
            				<label>{{ __('student.Admission No.') }}</label>
            				<input type="text" class="form-control" id="admission_no" name="admission_no" placeholder="{{ __('student.Admission No.') }}" value="{{$serach['admission_no'] ?? ''}}">
            		    </div>
            		</div>--> 
            		<div class="col-md-3">
            			<div class="form-group"> 
            				<label>{{ __('common.Search By Keywords') }}</label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="{{ __('common.Search By Keywords') }}" value="{{$serach['name'] ?? ''}}">
            		    </div>
            		</div>                     	
                        <div class="col-md-1 ">
                             <label class="text-white">{{ __('common.Search') }}</label>
                    	    <button type="submit" class="btn btn-primary" >{{ __('common.Search') }}</button>
                    	</div>
                    			
                    </div>
                </form>        

   
        
    	<div class="row mb-2 m-2">
		    <div class="col-md-12">	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
        <thead>
            <tr role="row">
                <th>{{ __('common.SR.NO') }}</th>
                <th>Ledger No.</th>
                <th>{{ __('fees.Receipt No') }}</th>
                <th>{{ __('fees.Pay Mode') }}</th>
                <th>Transaction Id</th>
                <th>Bank Name</th>
                <th>Payment Date</th>
                <th>Fees Type</th>
                <th>{{ __('fees.Student Name') }}</th>
                <th>{{ __('common.Fathers Name') }}</th>
                <th>{{ __('common.Class') }}</th>
                <th>{{ __('common.Date') }}</th>
                <th>{{ __('common.Amount') }}</th>
                <th>{{ __('common.Action') }}</th>
            </tr>    
        </thead>
         
        <tbody id="fees_list_show">
              @if(!empty($fees))
                @php
                   $i=1;
       
                   $total=0;
                @endphp
                @foreach ($fees  as $item)
                @php
                    $feesType = DB::table('fees_group')->where('id',$item->fees_group_id)->whereNull('deleted_at')->first();
                @endphp
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item['Admission']['ledger_no'] ?? 'N/A' }}</td>
                    <td>{{ $item['receipt_no'] ??'-' }}</td>
                    <td>{{ $item['PaymentMode']['name']  }}</td>
                    <td>{{ $item['transition_id'] ?? '-'  }}</td>
                    <td>{{ $item['bank_name'] ?? '-'  }}</td>
                    <td>{{ date('d-M-Y', strtotime($item['date']))  }}</td>
                    <td>{{ $feesType->name  ?? '-'}}</td>
                    <td class="capitalize">{{ strtolower($item['Admission']['first_name'] ?? '')  }} {{ strtolower($item['Admission']['last_name'] ?? '')  }}</td>
                    <td class="capitalize">{{ strtolower($item['Admission']['father_name'] ?? '')  }}</td>
                    <td>{{ $item['class_name'] ?? ''  }}</td>
                    <td>@if(!empty($item->date)){{ date('d-M-Y', strtotime($item->date))}}@endif</td>
                    <td>₹ {{ number_format($item['total_amount'] ,2) ?? '' }}</td>
                    <td>
                    <a href="{{url('print_payement',$item->id)}}" target="blank" class="btn btn-primary  btn-xs" title="Fees Print"><i class="fa fa-print"></i></a>
                    <!--<a data-admission_id='{{$item->admission_id ?? ''}}' data-first_name='{{$item['Student']->first_name ?? ''}} {{$item['Student']->last_name ?? ''}}' data-class_type_id='{{$item['ClassTypes']->name ?? ''}}' data-toggle="modal" data-target="" class="btn btn-primary  btn-xs ml-3 feesDetail " title="View Fees"><i class="fa fa-bars"></i></a>-->
                    <!--<a href="javascript:;" data-id='{{$item->id}}'data-collect_id='{{$item->fees_collect_id}}'data-revert_amount='{{$item->total_amount}}' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger  btn-xs" title="Revert Fees"><i class="fa fa-undo"></i></a>-->
                    <a href="{{url('fees_ledger_print',$item['Admission']['id'] ?? '')}}"  class="btn btn-primary  btn-xs" title="View Fees Ledger"><i class="fa fa-bar-chart-o"></i></a>
                    </td>
                </tr>
              @php
              $total +=$item['total_amount'];
              @endphp
             
              
              @endforeach
              <tfoot>
               <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b>{{__('Total') }}</b></td>
                  <td><b>₹ {{ number_format($total ,2) ?? '' }}</b></td>
                  <td></td>
              </tr>
              </tfoot>
            @endif
            </tbody>
        </table>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>
</section>
</div>
        


<div class="modal" id="Modal_id">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #555b5beb;">

      <div class="modal-header">
        <h4 class="modal-title text-white">{{ __('fees.Revert Fees Confirmation') }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
      </div>

      <form action="{{ url('collect_fees_delete') }}" method="post">
              	 @csrf
      <div class="modal-body">
              <input type=hidden id="delete_id" name="delete_id">
              <input type=hidden id="collect_id" name="collect_id">
              <input type=hidden id="revert_amount" name="revert_amount">
              <h5 class="text-white">{{ __('fees.Are you sure you want to revert fees ? This action is irreversible.') }}</h5>
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">{{ __('common.Close') }}</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">{{ __('common.Delete') }}</button>
         </div>
       </form>
    </div>
  </div>
</div>
 
<script>
  $('.deleteData').click(function() {
  var delete_id = $(this).data('id'); 
  var collect_id = $(this).data('collect_id'); 
  var revert_amount = $(this).data('revert_amount'); 
  
  $('#delete_id').val(delete_id); 
  $('#collect_id').val(collect_id); 
  $('#revert_amount').val(revert_amount); 
  } );

    
             $('.feesDetail').click(function() {
                 count=2;
	var first_name = $(this).data('first_name');
	var class_type_id = $(this).data('class_type_id');
	var admission_id = $(this).data('admission_id');

// 	$('#first_name').html(first_name);
// 	$('#class_type_id1').html(class_type_id);
// 	$('#admission_id').val(admission_id);
   var basurl = "{{ url('/') }}";
            $.ajax({
                 type: "post",
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        	    url: basurl+'getFeesDetail',
        	     data:{admission_id:admission_id},
        	    success: function(result){
        	     
        	  jQuery('#tbody').html(result)
        	   $('#myModal').modal('toggle');
        	         	$('#first_name').html(first_name);
                        $('#class_type_id1').html(class_type_id);
 	                    $('#admission_id').val(admission_id);
 	        	 
 	        	   $(".editable").each(function () {
        //Reference the Label.
        var label = $(this);
 
        //Add a TextBox next to the Label.
        label.after("<input type = 'text' style = 'display:none;width:100px;' />");
 
        //Reference the TextBox.
        var textbox = $(this).next();
 
        //Set the name attribute of the TextBox.
        
        textbox[0].name = this.id.replace("n"+count, "amount[]");
    count++;
        //Assign the value of Label to TextBox.
        textbox.val(label.html());
 
        //When Label is clicked, hide Label and show TextBox.
        label.click(function () {
            $(this).hide();
            $(this).next().show();
        });
 
        //When focus is lost from TextBox, hide TextBox and show Label.
        textbox.focusout(function () {
            $(this).hide();
            $(this).prev().html($(this).val());
            $(this).prev().show();
        });
    });
 	       	  }
        	});
        
             });
</script>
@endsection 