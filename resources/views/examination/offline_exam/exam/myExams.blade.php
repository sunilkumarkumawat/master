@extends('layout.app')
@section('content')


<div class="content-wrapper">

	<section class="content pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="card card-outline card-orange">
						<div class="card-header bg-primary">
							<h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;Examination</h3>
							<div class="card-tools">
								<!--<a href="{{url('admissionView')}}" class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> <span class="Display_none_mobile"> {{ __('common.View') }} </span></a>-->
								<!--<a href="{{url('studentsDashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i> <span class="Display_none_mobile"> {{ __('common.Back') }} </span></a>-->
							</div>

						</div>


					</div>
				</div>
				
				
				@if(!empty($exam))
				
				@foreach($exam as $list)
	                @php
                    $exam_name = DB::table('exams')->where('id',$list)->first();
                    @endphp

                
                <div class="col-md-3 col-sm-6 col-12">
                    <form action='{{url("bulk_marksheet_generate")}}' method='post'>
                        @csrf
                        
                        <input type='hidden' name='single_student' value='{{$single_student}}'/>
                        <input type='hidden' name='exam[]' value='{{$list}}'/>
                        <input type='hidden' name='exam_array[{{$list}}]' value='1'/>
                        <input type='hidden' name='class_type_id' value='{{Session::get("class_type_id")}}'/>
                     
                        @if(!empty($subjects))
                        @foreach($subjects as $key=>$subject)
                     
                        <input type='hidden' name='subjects[]' value='{{$subject}}'/>
                        <input type='hidden' name='subject_array[{{$subject}}]' value='{{$key+1}}'/>
                     
                        @endforeach
                        @endif
                        
                        <div class="info-box bg-success">
                        <button class='btn btn-primary btn-xs' ><span class="info-box-icon"><i class="fa fa-file-pdf-o"></i></span></button>
                        <div class="info-box-content">
                        <span class="info-box-text">41,410</span>
                        <span class="info-box-number"> {{$exam_name->name ?? ''}}</span>
                        <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                        70% Increase in 30 Days
                        </span>
                        </div>
                        
                        </div>
                    </form>
                </div>

                @endforeach
                @endif
			</div>
		</div>
	</section>

</div>


@endsection