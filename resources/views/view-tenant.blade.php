@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Tenant Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Tenant Details</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> View Tenant Details </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <span style="color:red;"></span>
                        {!! Form::open([]) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                        value="{{ $user->first_name  }}" disabled>
                                    <span style="color:red;"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                        value="{{ $user->last_name  }}" disabled>
                                    <span style="color:red;"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Mobile Number"
                                        name="mobile_number" value="{{ $user->mobile_number  }}" disabled>
                                    <span style="color:red;"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Room Number</label>
                                    <input type="text" class="form-control" placeholder="Room Number" name="room_number"
                                        value="{{ $user->get_room->room_number ?? 'null' }}" disabled>
                                    <span style="color:red;"></span>
                                </div>
                                <div class="row">
                                    @if(!empty($user->get_images))
                                    @foreach ($user->get_images as $images)
                                    <img src="{{ asset('/images').'/'.$images->image }}" width="250px" height="250px">
                                    @endforeach
                                    @endif
                                    <div class='col-md-4'></div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
