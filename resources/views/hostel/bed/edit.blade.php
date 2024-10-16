@php
  $getHostel = Helper::getHostel(); 
  $getHostelBuildingAll = Helper::getHostelBuildingAll();
  $getHostelFloor = Helper::getHostelFloor();
  $getHostelRoom = Helper::getHostelRoom();
@endphp
@extends('layout.app') 
@section('content')

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-orange">
                     <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fa fa-edit"></i> &nbsp; {{ __('hostel.Edit Bed') }}</h3>
                    <div class="card-tools">
                    <!--<a href="{{url('bed_view')}}" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> View </a>-->
                    <a href="{{url('bed_view')}}" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i>{{ __('View') }}  </a>
                <a href="{{url('hostel_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> {{ __('common.Back') }} </a>
                    </div>
                    
                    </div>        
        <form id="quickForm" action="{{ url('bed_edit') }}/{{ $data['id'] ?? '' }}" method="post">
        @csrf
        <div class="row m-2">
            <div class="col-md-3">
    			<label style="color:red;">{{ __('hostel.Select Hostel') }}*</label>
				<select class="form-control @error('hostel_id') is-invalid @enderror" id="hostel_id" name="hostel_id">
                 @if(!empty($getHostel)) 
                      @foreach($getHostel as $type)
                         <option value="{{ $type->id ?? ''  }}" {{ ( $type['id'] == $data['hostel_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                      @endforeach
                  @endif
                </select>
                 @error('hostel_id')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror                  			
        	</div>  
            <div class="col-md-3">
    			<label style="color:red;">{{ __('hostel.Select Building') }}*</label>
				<select class="form-control @error('building_id') is-invalid @enderror building_id" id="building_id" name="building_id">
                @if(!empty($getHostelBuildingAll)) 
                      @foreach($getHostelBuildingAll as $type)
                         <option value="{{ $type->id ?? ''  }}" {{ ( $type['id'] == $data['building_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                      @endforeach
                @endif                            
                </select>
                 @error('building_id')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror                  			
        	</div>  
            <div class="col-md-3">
    			<label style="color:red;">{{ __('hostel.Select Floor') }}*</label>
				<select class="form-control @error('floor_id') is-invalid @enderror floor_id" id="floor_id" name="floor_id">
                @if(!empty($getHostelFloor)) 
                      @foreach($getHostelFloor as $type)
                         <option value="{{ $type->id ?? ''  }}" {{ ( $type['id'] == $data['floor_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                      @endforeach
                @endif                            
                </select>
                 @error('floor_id')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror                  			
        	</div>  
            <div class="col-md-3">
    			<label style="color:red;">{{ __('hostel.Select Room') }}*</label>
				<select class="form-control @error('room_id') is-invalid @enderror room_id" id="room_id" name="room_id">
                @if(!empty($getHostelRoom)) 
                      @foreach($getHostelRoom as $type)
                         <option value="{{ $type->id ?? ''  }}" {{ ( $type['id'] == $data['room_id']) ? 'selected' : '' }}>{{ $type->name ?? ''  }}</option>
                      @endforeach
                @endif                            
                </select>
                 @error('room_id')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror                  			
        	</div>                	
            <div class="col-md-3">
    			<label style="color:red;">{{ __('hostel.Bed Name/No.') }}*</label>
    			<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="{{ __('hostel.Bed Name/No.') }}" value="{{ $data['name'] ?? '' }}">
                 @error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
        	</div>
        </div>

        <div class="row m-2">
            <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{ __('common.Update') }} </button>
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

$('#hostel_id').on('change', function(e){
     var basurl = "{{ url('/') }}";
	var hostel_id = $(this).val();
    $.ajax({
         headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
	  url: basurl+'/hostelData/'+hostel_id,
	  success: function(data){
	     if(data != ''){
	         	$(".building_id").html(data);
	     }else{
	         	$(".building_id").html(data);
	         alert('Building Not Found');
	     }
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
	     if(data != ''){
	         	$(".floor_id").html(data);
	     }else{
	         	$(".floor_id").html(data);
	         alert('Floor Not Found');
	     }
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
	     if(data != ''){
	         	$(".room_id").html(data);
	     }else{
	         	$(".room_id").html(data);
	         alert('Room Not Found');
	     }
	  }
	});
});
</script>

@endsection      