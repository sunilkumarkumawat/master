@extends('layout.app') 
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student Management</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{url('admin_dashboard')}}">Back</a></li>
                </ol>
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-danger m-2">
<div class="card m-2">
    <div class="card-body">
        <section class="content">
         <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h4>Branch</h4>
                        <p>Enter</p>
                        </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                    <a href="{{url('add_branch')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <div class="col-md-3">
                <div class="small-box bg-secondary">
                    <div class="inner">
                    <h4>View Branch</h4>
                    <p>Enter</p>
                    </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                    <a href="{{url('view_branch')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
                
                    
            </div>
    </div>
        </div>
    </div>
</section>
    
    
</div>    
@endsection