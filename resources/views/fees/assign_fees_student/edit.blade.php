@php
$getFeesGroup = Helper::getFeesGroup();

@endphp
@extends('layout.app') 
@section('content')
 <div class="content-wrapper">
   <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12">    
                    <div class="card card-outline card-orange">
                        <div class="card-header bg-primary">
                        <h3 class="card-title"><i class="fa fa-money"></i> &nbsp; Edit Assign Fees </h3>
                        <div class="card-tools">
                        <a href="{{url('student_assign_fees')}}" class="btn btn-primary  btn-sm" ><i class="fa fa-eye"></i> {{ __('messages.View') }} </a>
            <a href="{{url('fee_dashboard')}}" class="btn btn-primary  btn-sm" ><i class="fa fa-arrow-left"></i> {{ __('common.Back') }} </a>
                        </div> 
                        </div>        
                        <div class"card-body">
                            <form id="quickForm" action="{{url('assign_fees_edit')}}/{{$feesAssign->admission_id}}" method="post">
                                @csrf
                            <div class="row m-2">
                                <div class="col-md-12">
                                <table class="_table" id="tableId">
                                    <thead>
                                      <tr>
                                        <th width="200px"style="color:red;">{{ __('fees.Fees Group') }}*</th>
                                        <th colspan="4" style="color:red;">{{ __('messages.Amount') }}*</th>
                                        <th width="50px"></th>
                
                                      </tr>
                                    </thead>
                                    <tbody id="table_body">
                                      @if(!empty($data))
                                      @foreach($data as $key =>  $item)
                                      <input type="text" id="fees_assign_id" name="fees_assign_id[]" value="{{ $feesAssign->admission_id }}">
                                      <input type="text" id="fees_master_id" name="fees_master_id[]" value="{{ $item->fees_master_id }}">
                                      <tr id="appendRow_0">
                                        <td width="200px">
                                        <input type="hidden" value="{{$item->id ?? ''}}" name="fees_master_id[]">
                                          <select class="form-control select2 @error('fees_group_id') is-invalid @enderror" id="fees_group_id" name="fees_group_id[]">
                                            <option value="">{{ __('messages.Select') }}</option>
                                            @if(!empty($getFeesGroup))
                                            @foreach($getFeesGroup as $type)
                                            <option value="{{ $type->id ?? ''  }}" {{ ( $type->id == $item['feesGroupId'] ? 'selected' : '' ) }}>{{ $type->name ?? ''  }}</option>
                                            @endforeach
                                            @endif
                                          </select>
                                        </td>
                                        <td colspan="3">
                                          <input class="form-control  @error('amount') is-invalid @enderror" type="text" name="amount[]" id="amount" placeholder="Amount" onkeypress="javascript:return isNumber(event)" value="{{ $item['fees_group_amount'] ?? ''}}">
                                        </td>
                                        
                                        <td colspan="3">
                                          @if($key == 0)
                                          <div class="action_container">
                                            <button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn"><i class="fa fa-plus"></i></button>
                                          </div>
                                          @endif
                                        </td>
                
                                      </tr>
                                      @endforeach
                                      @endif
                                    </tbody>

                                </table>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <lable>EMI</lable>
                                        <input type="checkbox"  id="emi_check" name="emi_check" value="{{ ($feesAssign->emi_check == 0) ? '0' : '1'}}" {{ ($feesAssign->emi_check == 0) ? "" : "checked" }}>
                                    </div>
                                </div>
                                <div class="col-md-12 col-6 text-center">
                            	    <div class="form-group">
                            	        <label>&nbsp;</label><br>
                            			<button type="submit" class="btn btn-primary">Submit</button>
                            	    </div>                    
                            	</div>		
                            </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 

<script>
  $(document).ready(function() {
    count = 0;
    $(".removeprodtxtbx").eq(0).css("display", "none");
    $(document).on("click", "#clonebtn", function() {
      count++;
      var newRow = '<tr id="appendRow_' + count + '">'
        + '<td width="200px">'
        + '<select class="form-control select2" id="fees_group_id" name="fees_group_id[]">'
        + '<option value="">{{ __("messages.Select") }}</option>'
        + '@if(!empty($getFeesGroup))'
        + '@foreach($getFeesGroup as $type)'
        + '<option value="{{ $type->id ?? "" }}">{{ $type->name ?? "" }}</option>'
        + '@endforeach'
        + '@endif'
        + '</select>'
        + '</td>'
        + '<td colspan="3">'
        + '<input class="form-control " type="text" name="amount[]" id="amount" placeholder="Amount" onkeypress="javascript:return isNumber(event)">'
        + '</td>'
        + '<td colspan="3">'
        + '<div class="action_container">'
        + '<button type="button" class="btn btn-primary btn-xs addmoreprodtxtbx" id="clonebtn"><i class="fa fa-plus"></i></button>'
        + '<button type="button" class="btn btn-danger btn-xs removeprodtxtbx" id="removerow"><i class="fa fa-trash"></i></button>'
        + '</div>'
        + '</td>'
        + '</tr>';

      $('#table_body').append(newRow);
      $(".removeprodtxtbx").eq(count).css("display", "block");
      $(".addmoreprodtxtbx").eq(count).css("display", "none");
    });

    $(document).on("click", "#removerow", function() {
      $(this).parents('tr').remove();
      count--;
      window.calculateSum(); // Assuming you have a function named "calculateSum" defined elsewhere.
    });
    
    $('#emi_check').click(function(){
       if($(this).is(':checked')){
           $(this).val(1);
       }else{
           $(this).val(0);
       }
    });
  });
</script>

@endsection    