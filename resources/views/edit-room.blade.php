@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Room</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>                        
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Room </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <span style="color:red;"></span>
                        {!! Form::open(['method' => 'post']) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label> Add Room </label>                                                                                                   
                                    <input type="text" class="form-control dropdown-toggle" placeholder="Add Room"
                                        name="room_number" data-toggle="dropdown" value="">
                                    @if ($errors->has('room_number'))
                                    <span style="color:red;">{{ $errors->first('room_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Rent Amount </label>
                                    <input type="text" class="form-control dropdown-toggle" placeholder="Room Amount"
                                        name="rent_amount" data-toggle="dropdown">
                                    @if ($errors->has('rent_amount'))
                                    <span style="color:red;">{{ $errors->first('rent_amount') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Electricity Unit</label>
                                    <input type="text" class="form-control dropdown-toggle"
                                        placeholder="Electricity Amount" name="electricity_amount" data-toggle="dropdown">
                                    @if ($errors->has('electricity_amount'))
                                    <span style="color:red;">{{ $errors->first('electricity_amount') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Water Amount</label>
                                    <input type="text" class="form-control dropdown-toggle"
                                        placeholder="Water Amount" name="water_amount" data-toggle="dropdown">
                                    @if ($errors->has('water_amount'))
                                    <span style="color:red;">{{ $errors->first('water_amount') }}</span>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button class="btn btn-info text-light" type="submit" name="submit" value="Submit">
                                        Submit
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
@endsection
