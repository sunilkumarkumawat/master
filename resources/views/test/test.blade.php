
@extends('layout.app') 
@section('content')

<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-credit-card"></i> &nbsp;TEST DATA</h3>
							
							
							<div class="card-tools"> 
							  <!--<a class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> {{ __('Add Head') }} </a>-->
							    <!--<a href="{{url('hostel_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> Back </a>--> 
							</div>
							
						</div>
						<div class="card-body">
     
                            <div class="col-md-12" id="">

                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                                    <thead class="bg-primary">
                                        <tr role="row">
                                           <th>Sr.</th>
                                           <th>Hostel</th>
                                           <th>Building</th>
                                           <th>Floor</th>
                                           <th>Room</th>
                                           <th>Bed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($data))
                                            @php
                                            $i = 1;
                                            @endphp
                                        @foreach($data as $item)
                                            @php
                                                $hostel = DB::table('hostel')->whereNull('deleted_at')->where('id', $item->hostel_id)->first();
                                                $building = DB::table('hostel_building')->whereNull('deleted_at')->where('id', $item->building_id)->first();
                                                $floor = DB::table('hostel_floor')->whereNull('deleted_at')->where('id', $item->floor_id)->first();
                                                $room = DB::table('hostel_room')->whereNull('deleted_at')->where('id', $item->room_id)->first();
                                            @endphp
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $hostel->name ?? '' }} <b>[{{ $hostel->id ?? '' }}]</b></td>
                                            <td>{{ $building->name ?? '' }} <b>[{{ $building->id ?? '' }}]</b></td>
                                            <td>{{ $floor->name ?? '' }} <b>[{{ $floor->id ?? '' }}]</b></td>
                                            <td>{{ $room->name ?? '' }} <b>[{{ $room->id ?? '' }}]</b></td>
                                            <td>{{ $item->name ?? '' }} <b>[{{ $item->id ?? '' }}]</b></td>
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
		</div>
	</section>
</div>














   


@endsection      