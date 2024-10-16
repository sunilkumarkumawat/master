@php
    $getHostel = Helper::getHostel();
    $getHostelFloor = Helper::getHostelFloor();
    $getHostelBuildingAll = Helper::getHostelBuildingAll();
    $getHostelRoom = Helper::getHostelRoom();
    $getHostelBed = Helper::getHostelBed();
   // dd($data);
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
							<h3 class="card-title"><i class="fa fa-users"></i> &nbsp; {{ __('hostel.Add Meter Units') }}</h3>
							<div class="card-tools"> 
							    <a href="{{url('meter_unit')}}" class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i>{{ __('common.View') }} </a> 
							    <a href="{{url('hostel_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i>{{ __('common.Back') }}  </a> 
							</div>
						</div>
                             <form id="quickForm" action="{{ url('meter_unit_view_room') }}" method="post" enctype='multipart/form-data'>
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
                                <!-- <div class="col-md-2">
                        			<label>{{ __('hostel.Select Bed') }}</label>
                    				<select class=" form-control bed_id" id="bed_id" name="bed_id">
                                        <option value="">{{ __('messages.Select') }}</option>
                                          @if(!empty($getHostelBed)) 
                                          @foreach($getHostelBed as $type)
                                             <option value="{{ $type->id ?? ''  }}" {{ ($type->id == $search['bed_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                                          @endforeach
                                      @endif
                                    </select>
                            	</div>                	 -->
                                <div class="col-md-1 text-center">
                                    <label class="text-white">{{ __('common.Search') }}</label>
                                    <button type="submit"class="btn btn-primary" >{{ __('common.Search') }}</button>
                                </div>
                            </div> 
                        </form>
                        <form id="quickForm" action="{{ url('meter_unit_update_room') }}" method="post" enctype='multipart/form-data'>
                              @csrf
                            <div class="row m-2">
                                
                                
                                   <div class="col-md-2">
                                         <div class="form-group">
                                            <label class="text-danger">{{ __('common.Month') }} * </label>
                                            <select class="form-control select2" id="month_id" name="month_id" required>
                                            <option value=""required>{{ __('hostel.Select Month') }}</option>  
                                            @if(!empty(Helper::getMonth()))
                                                    @foreach(Helper::getMonth() as $mon)
                                                   
                                                    <option value="{{ $mon->id }}"  >  {{ $mon->name ?? ''}}</option>
                                                    @endforeach
                                                @endif  
                                            </select>
                                            
                                         </div>
                                      </div>
                                      </div>
                              <div class="row m-2">

                                <div class="col-md-12">
                                    
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                        <thead class="bg-primary">
                                            <tr role="row">
                                                <th>{{ __('common.SR.NO') }}</th>
                                               
                                                <th>{{ __('hostel.Hostel') }}</th>
                                                <th>{{ __('hostel.Building') }}</th>
                                                <th>{{ __('hostel.Floor') }}</th>
                                                <th>{{ __('hostel.Room') }}</th>                                           
                                                <th>{{ __('hostel.From Unit') }}</th>                                           
                                                <th>{{ __('hostel.To Unit') }}</th>                                           
                                                <th>{{ __('hostel.Meter Reading Unit') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="student_list_show">
            
                                            @if(!empty($data))
                                            @php
                                                $i=1;
                                                $form_u = 1;
                                                $form_unit = 1;
                                                $to_u =1;
                                                $to_unit= 1;
                                                $meter_u= 1;
                                                $meter_unit= 1;
                                            @endphp
            
                                            @foreach ($data  as $item)
                                            
                                            @php
                                            $lastunit = DB::table('hostel_meter_units')->where('hostel_id',$item->hostel_id)->where('floor_id',$item->floor_id)->where('building_id',$item->building_id)->where('hostel_room_id',$item->id)->orderBy('id','DESC')->first();
                                             
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item['Hostel']['name'] ?? ''}}</td>
                                                <td>{{ $item['HostelBuilding']['name'] ?? ''}}</td>
                                                <td>{{ $item['HostelFloor']['name'] ?? ''}}</td>
                                                <td>{{ $item['name'] ?? ''}}</td>                                               
                                                <td>
                                                <input type="text" name="from_unit[]"onBlur="calculateAmount(this.value,{{$form_u++}});" id="from_unit_{{$form_unit++}}" value="{{$lastunit->to_unit ?? ''}}"class="form-control" placeholder="from unit" onkeypress="javascript:return isNumber(event)" >
                                                </td>                                               
                                                <td>
                                                <input type="text" name="to_unit[]" onBlur="calculateAmount(this.value,{{$to_u++}});"id="to_unit_{{$to_unit++}}" class="form-control" placeholder="To unit" onkeypress="javascript:return isNumber(event)">
                                                </td>                                               
                                        
                                                <td>
                                                <input type="hidden" name="hostel_id[]" id="hostel_id" class="form-control" value="{{$item->hostel_id ?? ''}}">
                                                <input type="hidden" name="floor_id[]" id="floor_id" class="form-control" value="{{$item->floor_id ?? ''}}">
                                                <input type="hidden" name="building_id[]" id="building_id" class="form-control" value="{{$item->building_id ?? ''}}">
                                                <input type="hidden" name="hostel_room_id[]" id="hostel_room_id" class="form-control" value="{{$item->id ?? ''}}">
                                                <input type="text" name="meter_unit[]" id="meter_unit_{{$meter_unit++}}"onblur="calculateSum(this.value,{{$meter_u++}})" class="form-control" placeholder="meter reading unit" onkeypress="javascript:return isNumber(event)"value="0">
                                                </td>                                    
                                            </tr>
                                            @endforeach
                                            
                                            @else
                                            <tr><td colspan="12" class="text-center">{{ __('hostel.No Student Found') }} !</td></tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                
                             
                                <div class="col-md-1 text-center">
                                    <label class="text-white">Search</label>
                                    <button type="submit"class="btn btn-primary" >{{ __('common.Submit') }}</button>
                                </div>
                            </div>  
                            </form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>



<script>


    function calculateAmount(value,row_id) {
        var tounit = $('#to_unit_'+ row_id).val();
          var fromunit = $('#from_unit_'+ row_id).val();
           var totalamount = tounit - fromunit;

      if(tounit >0){
           $('#meter_unit_'+row_id).val(totalamount);
      }

       
        calculateSum();
    };  

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