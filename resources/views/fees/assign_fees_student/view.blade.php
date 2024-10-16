@php
$classType = Helper::classType();
$getState = Helper::getState();
$getcitie = Helper::getCity();

$getCountry = Helper::getCountry();
@endphp
@extends('layout.app')
@section('content')

<div class="content-wrapper">

  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-outline card-orange">
            <div class="card-header bg-primary flex_items_toggel">
              <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;{{ __('View Students Fees Detail') }}</h3>
              <div class="card-tools">
                <a href="{{url('fee_dashboard')}}" class="btn btn-primary  btn-sm"><i class="fa fa-arrow-left"></i><span class="Display_none_mobile">{{ __('common.Back') }} </span></a>
              </div>

            </div>
    
            <form id="quickForm" action="{{ url('student_assign_fees') }}" method="post">
              @csrf
              <div class="row m-2">

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="State" class="required">{{ __('student.Admission No.') }}</label>
                     <input type="text" class="form-control" id="admissionNo" name="admissionNo" placeholder="{{ __('student.Admission No.') }}" value="{{ $search['admissionNo'] ?? '' }}">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="State" class="required">{{ __('Admission Date') }}</label>
                     <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ $search['admission_date'] ?? '' }}">
                  </div>
                </div>
             
                <div class="col-md-2">
                  <div class="form-group">
                    <label>{{ __('common.Class') }}</label>
                    <select class="form-control select2" id="class_type_id" name="class_type_id">
                      <option value="">{{ __('common.Select') }}</option>
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
                    <label>{{ __('common.Search By Keywords') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('common.Ex. Name, Mobile, Email, Aadhaar etc.') }}" value="{{ $search['name'] ?? '' }}">
                  </div>
                </div>
                <div class="col-md-1 ">
                  <label class="text-white">{{ __('common.Search') }}</label>
                  <button type="submit" class="btn btn-primary">{{ __('common.Search') }}</button>
                </div>

              </div>
            </form>
                <div class="row m-2">
              <div class="col-12" style="overflow-x:scroll;">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline ">
                  <thead>
                    <tr role="row">
                      <th>{{ __('common.SR.NO') }}</th>
                      <th class="text-center">{{ __('student.Ad. No') }}</th>
                      <th>{{ __('common.Name') }}</th>
                      <th>{{ __('common.F Name') }}</th>
                      <th>{{ __('common.Class') }}</th>
                      <th>{{ __('common.Mobile') }}</th>
                      <th>{{ __('student.Ad. Type') }}</th>
                      <th>{{ __('student.Ad. Date') }}</th>
                      <th>{{ __('Assign Fees') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody id="product_list_show">

                    @if(!empty($data))
                    @php
                    $i=1
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td class="text-center">{{ $item['admissionNo'] ?? ''}}</td>
                      <td class="myBtn" style="cursor:pointer;">{{ $item['first_name'] ?? '' }} {{ $item['last_name'] ?? '' }}</td>
                      <td>{{ $item['father_name'] ?? ''}}</td>
                      <td>{{ $item['ClassTypes']['name'] ?? '-' }}</td>
                      <td>{{ $item['mobile'] ?? '-' }}</td>
                      <td>
                      @if($item['admission_type_id'] == 1)
                      <p>Regular</p>
                   
                      @elseif($item['admission_type_id'] == 2)
                      <p>Non</p>
                      
                      @elseif($item['admission_type_id'] == 3)
                      <p>Other</p>
                      @else
                      -
                      @endif
                      </td>
                      <td>{{date('d-m-Y', strtotime($item['admission_date'])) ?? '' }}</td>
                      <td>{{ $item['total_amount'] ?? '-'}}</td>
                      <td>
                          <a href="{{ url('assign_fees_edit') }}/{{$item->id}}"><button class="btn btn-primary">Edit</button></a>
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




            @endsection