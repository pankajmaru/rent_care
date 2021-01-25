@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Room</h1>
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
                        {!! Form::model($room, array('route' => array('room-update',$room->room_id))) !!}                  
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label> Add Room </label>                                      
                                    {!! Form::text('room_number',null,['class'=>'form-control ','placeholder'=>"Room Number"]) !!}
                                    @if ($errors->has('room_number'))
                                    <span style="color:red;">{{ $errors->first('room_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Rent Amount </label>
                                    {!! Form::text('rent_amount',null,['class'=>'form-control','placeholder'=>"Amount"]) !!}
                                    @if ($errors->has('rent_amount'))
                                    <span style="color:red;">{{ $errors->first('rent_amount') }}</span>
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
