@extends('layout.app') 
@section('content')

<div class="content-wrapper">
	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-envelope"></i> &nbsp;{{ __('master.View Email Records') }} </h3>
							<div class="card-tools"> 
							<a href="{{url('enquiry_add')}}" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i>{{ __('messages.Add') }} </a> 
							<a href="{{url('master_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i>{{ __('messages.Back') }} </a> 
							
							</div>
						</div>
				
    	<div class="row mb-2 m-2">
		    <div class="col-md-12">	
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
          <thead>
          <tr role="row">
              <th>{{ __('messages.Sr.No.') }}</th>
                    <th>{{ __('master.Type') }}</th>
                    <th>{{ __('messages.Description') }}</th>
                  
                     <th>{{ __('messages.Action') }}</th>
          </thead>
          <tbody>
              
              @if(!empty($data))
                @php
                   $i=1
                @endphp
                @foreach ($data  as $item)
                <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item['type'] ?? '' }}</td>
                        <td>{{ $item['description'] ?? '' }}</td>
                      
                       <td>
                                    <a href="{{url('enquiry_edit') }}/{{$item->id}}" class="btn btn-primary  btn-xs ml-3" title="Edit Complaint"><i class="fa fa-edit"></i></a> 
												    <a href="javascript:;" data-id='{{$item->id}}' data-bs-toggle="modal" data-bs-target="#Modal_id" class="deleteData btn btn-danger  btn-xs ml-3" title="Delete Book"><i class="fa fa-trash-o"></i></a> 
												</td>
              </tr>
              @endforeach
            @endif
            </tbody>
        </table>
        </div>
        </div>

</div>


<script>
    $('.deleteData').click(function() {
	var delete_id = $(this).data('id');
	$('#delete_id').val(delete_id);
});
</script>

<div class="modal" id="Modal_id">
	<div class="modal-dialog">
		<div class="modal-content" style="background: #555b5beb;">
			<div class="modal-header">
				<h4 class="modal-title text-white">{{ __('messages.Delete Confirmation') }}</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<form action="{{ url('enquiry_delete') }}" method="post"> 
			    @csrf
				<div class="modal-body">
					<input type=hidden id="delete_id" name=delete_id>
					<h5 class="text-white">{{ __('messages.Are you sure you want to delete') }}  ?</h5> </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-bs-dismiss="modal">{{ __('messages.Close') }}</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light">{{ __('messages.Delete') }}</button>
				</div>
			</form>
		</div>
	</div>
		</div>
	</div>
		</div>
	</div>
	</section>
</div>
@endsection