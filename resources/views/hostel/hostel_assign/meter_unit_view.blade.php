@php
    $getHostel = Helper::getHostel();
    $getHostelFloor = Helper::getHostelFloor();
    $getHostelBuildingAll = Helper::getHostelBuildingAll();
    $getHostelRoom = Helper::getHostelRoom();
    $getHostelBed = Helper::getHostelBed();
@endphp
@extends('layout.app') 
@section('content')

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; {{ __('hostel.View Meter Units') }}</h3>
							<div class="card-tools"> 
							    <a href="{{url('meter_unit_view_room')}}" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i>{{ __('common.Add') }}  </a> 
							    <a href="{{url('hostel_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i>{{ __('common.Back') }}  </a> 
							</div>
						</div>
                             <form id="quickForm" action="{{ url('meter_unit') }}" method="post" enctype='multipart/form-data'>
                              @csrf
                            <div class="row m-2">
                                <div class="col-md-2">
                        			<label>{{ __('hostel.Select Hostel') }}</label>
                    				<select class=" form-control select2" id="hostel_id" name="hostel_id">
                                        <option value="">{{ __('common.Select') }}</option>
                                     @if(!empty($getHostel)) 
                                          @foreach($getHostel as $type)
                                             <option value="{{ $type->id ?? ''  }}" {{ ($type->id == $search['hostel_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                          @endforeach
                                      @endif
                                    </select>
                            	</div>    
                                <div class="col-md-2">
                        			<label>{{ __('hostel.Select Building') }}</label>
                    				<select class=" form-control building_id select2" id="building_id" name="building_id">
                                        <option value="">{{ __('common.Select') }}</option>
                                          @if(!empty($getHostelBuildingAll)) 
                                          @foreach($getHostelBuildingAll as $type)
                                             <option value="{{ $type->id ?? ''  }}" {{ ($type->id == $search['building_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                          @endforeach
                                      @endif
                                    </select>
                            	</div>  
                                <div class="col-md-2">
                        			<label>{{ __('hostel.Select Floor') }}</label>
                    				<select class=" form-control floor_id select2" id="floor_id" name="floor_id">
                                        <option value="">{{ __('common.Select') }}</option>
                                          @if(!empty($getHostelFloor)) 
                                          @foreach($getHostelFloor as $type)
                                             <option value="{{ $type->id ?? ''  }}" {{ ($type->id == $search['floor_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                          @endforeach
                                      @endif
                                    </select>
                            	</div>   
                                <div class="col-md-2">
                        			<label>{{ __('hostel.Select Room') }}</label>
                    				<select class=" form-control room_id select2" id="room_id" name="room_id">
                                        <option value="">{{ __('common.Select') }}</option>
                                          @if(!empty($getHostelRoom)) 
                                          @foreach($getHostelRoom as $type)
                                             <option value="{{ $type->id ?? ''  }}" {{ ($type->id == $search['room_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                          @endforeach
                                      @endif
                                    </select>
                            	</div>  
                               
                                <div class="col-md-2">
                                         <div class="form-group">
                                            <label>{{__('common.Month')}} </label>
                                            <select class="form-control select2" id="month_id" name="month_id">
                                            <option value="">{{__('hostel.Select Month')}}</option>  
                                            @if(!empty(Helper::getMonth()))
                                                    @foreach(Helper::getMonth() as $mon)
                                                   
                                                    <option value="{{ $mon->id }}"  {{ ($mon->id == $search['month_id']) ? 'selected' : '' }}>  {{ $mon->name ?? ''}}</option>
                                                    @endforeach
                                                @endif  
                                            </select>
                                         </div>
                                      </div>
                                <div class="col-md-1 text-center">
                                    <label class="text-white">Search</label>
                                    <button type="submit"class="btn btn-primary" >{{ __('common.Search') }}</button>
                                </div>
                            </div> 
                        </form>
                        
                            <div class="row m-2">
                                <div class="col-md-12">
                                    <table id="" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                            <tr role="row">
                                                <th>{{ __('common.SR.NO') }}</th>
                                               
                                                  <th>{{ __('hostel.Hostel') }}</th>
                                                <th>{{ __('hostel.Building') }}</th>
                                                <th>{{ __('hostel.Floor') }}</th>
                                                <th>{{ __('hostel.Room') }}</th>                                           
                                                <th>{{ __('common.Month') }}</th>                                           
                                                <th>{{ __('hostel.Meter Reading Unit') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="student_list_show">
            
                                            @if(!empty($data))
                                            @php
                                                $i=1;
                                                $all_unit = 0;
                                            @endphp
            
                                            @foreach ($data  as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item['bildng_name'] ?? ''}}</td>
                                                <td>{{ $item['hostel_name'] ?? ''}}</td>
                                                <td>{{ $item['floor_name'] ?? ''}}</td>
                                                <td>{{ $item['hostel_room_name'] ?? ''}}</td>                                               
                                        
                                                
                                                <td>{{ $item['month_name'] ?? ''}}</td> 
                                                <td>{{ $item['meter_unit'] ?? ''}}</td>   
                                                                              
                                            </tr>
                                            @php
                                            $all_unit += $item['meter_unit'];
                                            @endphp
                                            @endforeach
                                            
                                            @else
                                            <tr><td colspan="12" class="text-center">No Student Found !</td></tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>                                               
                                        
                                                
                                                <td><b>Total</b></td> 
                                                <td><b>{{ $all_unit ?? ''}}</b></td>   
                                                                              
                                            </tr>
                                         </tfoot>
                                    </table>
                                </div>
                                
                                
                            </div>  
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<
<script>

    function SearchValue() {
        var basurl = "{{ url('/') }}";
        var hostel_id = $('#hostel_id :selected').val();
        var building_id = $('.building_id :selected').val();
        var floor_id = $('.floor_id :selected').val();
        var room_id = $('.room_id :selected').val();
        var bed_id = $('.bed_id :selected').val();
        if(hostel_id > 0 || building_id > 0 || floor_id > 0 || room_id > 0 || bed_id > 0){
        $.ajax({
                 headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            type:'post',
            alert("data");
            url: basurl+'/hostel_student_search',
            data: {hostel_id:hostel_id,building_id:building_id,floor_id:floor_id,room_id:room_id,bed_id:bed_id},
             //dataType: 'json',
            success: function (data) {

                $('#student_list_show').html(data);
               
            }
          });
        }else{
                alert('Please put a value in minimum one column !');
            }               
    };
</script>
<script>
        $('#hostel_id').on('change', function(e){
     var basurl = "{{ url('/') }}";
	var hostel_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
		  url: basurl+'/hostelData/'+hostel_id,
	  success: function(data){
			$("#building_id").html(data);
	  }
	});
	
});    

$('#building_id').on('change', function(e){
     var basurl = "{{ url('/') }}";
	var building_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	 	  url: basurl+'/BuildingData/'+building_id,
	  success: function(data){
			$("#floor_id").html(data);
	  }
	});
	
});
$('#floor_id').on('change', function(e){
     var basurl = "{{ url('/') }}";
	var floor_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	 		  url: basurl+'/FloorData/'+floor_id,
	  success: function(data){
			$("#room_id").html(data);
	  }
	});
	
});
$('#room_id').on('change', function(e){
     var basurl = "{{ url('/') }}";
	var room_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	 	  url: basurl+'/RoomData/'+room_id,
	  success: function(data){
			$("#bed_id").html(data);
	  }
	});
	
});
    </script>
                        

@endsection      