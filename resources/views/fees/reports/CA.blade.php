@php
  $classType = Helper::classType();
  //$getSection = Helper::getSection();
  $getCountry = Helper::getCountry();
  //dd($data);
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
</style>

<div class="content-wrapper">

   <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">      
    <div class="card card-outline card-orange">
        <div class="card-header bg-primary">
        <h3 class="card-title"><i class="fa fa-bar-chart-o"></i> &nbsp;{{ __('Fee Receipts') }}</h3>
        <div class="card-tools">
        <!--<a href="{{url('hostel/collect/fees')}}" class="btn btn-primary  btn-sm" title="Add Fees"><i class="fa fa-plus"></i> Add</a>-->
        <a href="{{url('fee_dashboard')}}" class="btn btn-primary  btn-sm" title="Back"><i class="fa fa-arrow-left"></i>{{ __('messages.Back') }}</a>
        </div>
        
        </div>  
        
        
        <form id="quickForm" action="{{ url('ca_report') }}" method="post" >
                @csrf 
                    <div class="row m-2">
                       
                        <div class="col-md-2">
                    		<div class="form-group">
                    			<label>Class</label>
                                    <select class="form-control select2" id="class_type_id" name="class_type_id">
                                        <option value="">All</option>
                                        @if(!empty($classType))
                                            @foreach($classType as $class)
                                                <option value="{{ $class->id ?? '' }}" {{ $class->id == $search['class_type_id'] ? 'selected' : '' }}>{{ $class->name ?? '' }}</option>
                                            @endforeach
                                        @endif
                                    </select>                 	    
                            </div>
                    	</div>
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
                    	
            		<div class="col-md-4">
            			<div class="form-group"> 
            				<label>{{ __('messages.Search By Keywords') }}</label>
            				<input type="text" class="form-control" id="name" name="name" placeholder="{{ __('messages.Ex. Name, Father Name, Mobile, Email, etc.') }}" value="{{$search['name'] ?? ''}}">
            		    </div>
            		</div>                     	
                        <div class="col-md-1 ">
                             <label for="" style="color: white;">Search</label>
                    	    <button type="submit" class="btn btn-primary" srtle="margin-top: 26px !important;">{{ __('messages.Search') }}</button>
                    	</div>
                    			
                    </div>
                </form>   
          

        
    	<div class="row m-2">
    	    <div class="col-md-12 head_table text-center"></div>
    	    </div>
    	<div class="row m-2">
		    <div class="col-md-12  ">	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline padding_table">
          <thead>
          <tr role="row">
            <th>{{ __('messages.Sr.No.') }}</th>
            <th>Counter</th>
            <th>Receipt No.</th>
            <th>Status</th>
            <th>Admission No.</th>
              <th>Class</th>
                <th>{{ __('Student Name') }}</th>
           
               <th>{{ __('Image') }}</th>
        
            <th>{{ __('messages.Fathers Name') }}</th>
            <th>{{ __('messages.Mobile') }}</th>
            <th>{{ __('Payment date') }}</th>
            <th>{{ __('Amount') }}</th>
         
          </thead>
         <tbody>
             
             @if(!empty($data))
             
             @foreach($data as $key => $receipt)
                @php
                    $revert_amount = 0;
                    $count = 0;
                    $deleted = DB::table('fees_detail')->where('receipt_no',$receipt->receipt_no)->whereNotNull('deleted_at')->get();
                @endphp

                @if(!empty($deleted))
                    @foreach($deleted as $del)
                        @php
                            $revert_amount += $del->total_amount;
                            $count++;
                        @endphp
                    @endforeach
                @endif
             <tr>
                 
                 <td>{{$key+1}}</td>
                 <td>{{$receipt->counter_name ?? ''}}</td>
                 <td class='d-flex'>
                      @if(!$count > 0)
                     <form action={{url('printFeesInvoice')}} method="post">
                         @csrf
                         <button class="text-primary" type="submit" id="invoice_no" style="border: none; background: transparent; border-bottom: 2px solid #1f2d3d;" name="invoice_no" value="{{$receipt->receipt_no ?? ''}}">{{$receipt->receipt_no ?? ''}}</button>
                     </form>
                     @else
                      <form action={{url('PrintRevertFeesInvoice')}} method="post">
                         @csrf
                    <a href="{{ url('PrintRevertFeesInvoice') }}" target="_blank" ><button class="text-danger" type="submit" id="invoice_no" style="border: none; background: transparent; border-bottom: 2px solid #1f2d3d;" name="invoice_no" value="{{$receipt->receipt_no ?? ''}}">{{$receipt->receipt_no ?? ''}}</button></a>
                     </form>
                     @endif
                 </td>
               <td>
                     @if($count > 0)
                     <span class='text-danger'>Cancelled</span>
                     @endif
                   
               </td>
                 
                 <td>{{$receipt->admissionNo ?? ''}}</td>
                 <td>{{$receipt->class_name ?? ''}}</td>
                 <td>{{$receipt->first_name ?? ''}} {{$receipt->last_name ?? ''}}</td>
                 <td>
                     <!--<img width='50px' height='50px'src='{{env("IMAGE_SHOW_PATH")."profile/"}}{{$receipt->image ?? ''}}'/>-->
                    <img class="profileImg pointer" src="{{ env('IMAGE_SHOW_PATH').'profile/'.$receipt['image'] }}" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'default/user_image.jpg' }}'"  width='50px' height='50px' data-img="@if(!empty($receipt->image)) {{ env('IMAGE_SHOW_PATH').'profile/'.$receipt['image'] }} @endif" >
                 </td>
                 <td>{{$receipt->father_name ?? ''}}</td>
                 <td>{{$receipt->mobile ?? ''}}</td>
                 <td>{{date('d-m-Y', strtotime($receipt->date ?? ''))}}</td>
                 <td>
                 @php
                 $amount = DB::table('fees_detail')->where('fees_detail.session_id', Session::get('session_id'))
                                    ->where('fees_detail.branch_id', Session::get('branch_id'))->where('receipt_no',$receipt->receipt_no ?? '')->whereNull('deleted_at')->sum('paid_amount');
                 
                 @endphp
                 
                 
                                       @if(!$count > 0)
                   {{$amount}}
                     @else
                       <p class="text-danger">{{$revert_amount}}</p>
                     
                     @endif
                
                 
                 </td>
              
             </tr>
             
             @endforeach
             
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

<script src="{{URL::asset('public/assets/school/js/jquery.min.js')}}"></script>
<script>
$('.profileImg').click(function(){
    var profileImgUrl = $(this).data('img');
    if(profileImgUrl != ''){
        $('#profileImgModal').modal('toggle');
        $('#profileImg').attr('src',profileImgUrl);
    }
});
</script>
 <div id="profileImgModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>-->
      <div class="modal-body">
        <img id="profileImg" src="" width="100%" height="470px">
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>       

@endsection 