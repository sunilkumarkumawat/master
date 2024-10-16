@php
$classType = Helper::classType();
@endphp
@extends('layout.app')
@section('content')

<style>
    .fixed_item{
        position:sticky !important;
        right:-8px;
        background-color:white;
        z-index:111;
        box-shadow: -6px 2px 6px #cecece;
    }
    
    .dropdown-menu.show {
        left: -79px !important;
    }
    
    .flex_centered{
        display:flex;
        align-items:center;
        /*justify-content: space-between;*/
        height: 55px;
    }
    
    .flex_centered a{
        margin-left:10px;
    }
    
    .nowrap{
        white-space:nowrap;
        font-size:14px;
    }
    
    .colored_table thead tr{
        background-color:#002c54;
        color:white;
    }
    .colored_table thead tr th{
        padding:10px;
    }
    
    .overflow_scroll{
        height:250px;
        overflow:scroll;
    }
</style>

<div class="content-wrapper">
  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-outline card-orange">
            <div class="card-header bg-primary flex_items_toggel">
              <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;{{ __('Fees Dues List') }}</h3>
              <div class="card-tools">
                <a href="{{url('fee_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><span class="Display_none_mobile">{{ __('common.Back') }} </span></a>
              </div>

            </div>
            
            
             <form id="quickForm" action="{{ url('feesRemainderCron') }}" method="post">
              @csrf
              <div class="row  pl-2 pt-2">

      <div class="col-md-1">
                  <div class="form-group">
                    <label>{{ __('common.Class') }}</label>
                    <select class="select2 form-control" id="class_type_id" name="class_type_id">
                      <option value='' >{{ __('All') }}</option>
                      @if(!empty($classType))
                      @foreach($classType as $type)
                      <option value="{{ $type->id ?? ''  }}" {{ ($type->id == $search['class_type_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
									<div class="form-group">
										<label>Admission Type(Non RTE)</label>
										<select class="form-control" id="admission_type_id" name="admission_type_id">
											<!--<option value="">Select</option>-->
											<option value="">All</option>
											<option value="1" {{ ('1' == $search['admission_type_id']) ? 'selected' : '' }}>Yes</option>
											<option value="2" {{ ('2' == $search['admission_type_id']) ? 'selected' : '' }}>No</option>
										</select>
										
									</div>
								</div>
                  <div class="col-md-2">
                       <div class="form-group">
                  <label class="text-white">{{ __('common.Search') }}</label>
                  <button type="submit" class="btn btn-primary">{{ __('common.Search') }}</button>
                </div>
                </div>
              
                </div>
                </form>
            
<form id='remainderForm'action='{{url("whatsappSendFeesRemainder")}}' method='POST'>

@csrf
            <div class="row m-2">
              <div class="col-12" style="overflow-x:scroll;">
                <table id="studentList" class="table table-bordered table-striped dataTable dtr-inline nowrap">
                 <thead>
                     <th>#</th>
                     <th>S.No.</th>
                     <th>Student Name</th>
                     <th>Class</th>
                     <th>Mobile</th>
                     <th>Pendings</th>
                     <!--<th>Action</th>-->
                 </thead>
                 <tbody>
                     
                     @if(!empty($data))
                      
                     @foreach($data as $key=> $stu)
                   
                      <tr>
                          <td><input type='checkbox'class='checkbox_id' name='checkbox[]' value="{{$stu['id'] ?? ''}}" />
                          <input type='hidden' name="message[{{$stu['id'] ?? ''}}]" value="{{$stu['message']}}"/>
                          <input type='hidden' name="mobile[{{$stu['id'] ?? ''}}]" value="{{$stu['mobile']}}"/>
                          </td>
                          <td>{{$key+1}}</td>
                         <td>
                             {{$stu['name'] ?? ''}}
                         </td>
                         <td>
                             {{$stu['class_type_id'] ?? ''}}
                         </td>
                         <td>
                             {{$stu['mobile'] ?? ''}}
                         </td>
                         <td>
                             {!! nl2br($stu['pendings'] ?? '') !!}
                            
                         </td>
                         <!--<td></td>-->
                     </tr>
                     @endforeach
                     
                     @endif
                    
                 </tbody>
                </table>
              </div>
            </div>
  </form>
            </div>
            </div>
            </div>
            </div>
            </section>
</div>


<!-- Confirmation Modal -->
<div class="modal fade" id="confirmSendMessageModal" tabindex="-1" role="dialog" aria-labelledby="confirmSendMessageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        
      <div class="modal-header">
        <h5 class="modal-title" id="confirmSendMessageModalLabel">Send Fee Reminder</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to send a fee reminder to the selected students?
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmSendMessage">Send</button>
      </div>
      
    
    </div>
  </div>
</div>
<script>
       $( document ).ready(function() {
       $('#studentList').DataTable({
                  "lengthChange": false, "autoWidth": false,"lengthChange": true, 
                "lengthMenu": [10, 20, 50,100,200,300,400,500,1000] ,
                 "buttons": ["copy", "csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#studentList_wrapper .col-md-6:eq(0)');
                
                var customElement = $('<div>', {
            id: 'custom-element',
            class: 'custom-element-class'
        });
        customElement.load('{{ url("messangerButtons") }} #custom-buttons', function() {
            $('#studentList_wrapper .col-md-6:eq(1)').append(customElement);
        });
           $('#studentList_wrapper').on('click', '#btn-checkall', function() {
            var status = parseInt($(this).attr('data-status'));
            if(status == 0){
                $(this).attr('data-status',1); 
                $(this).removeAttr('class');
                $(this).attr('class','btn btn-secondary btn-sm');
                $('#check_box_icon').removeAttr('class');
                $('#check_box_icon').attr('class','fa fa-check-square');
                $('.checkbox_id').prop('checked',true);
            }else{
                $(this).attr('data-status',0);
                $(this).removeAttr('class');
                $(this).attr('class','btn btn-outline-secondary btn-sm');
                $('#check_box_icon').removeAttr('class');
                $('#check_box_icon').attr('class','fa fa-square-o');
                $('.checkbox_id').prop('checked',false);
            }
        });     
              $('#studentList_wrapper').on('click', '#btn-whatsapp', function() {
    var selectedStudents = $('.checkbox_id:checked');

    if (selectedStudents.length === 0) {
        alert('Please select at least one student.');
        return;
    }
    $('#confirmSendMessageModal').modal('show');
});

$('#confirmSendMessage').on('click', function() {
   $('#remainderForm').trigger('submit');
});


       });
</script>

            @endsection