@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Tenant</h1>
                </div>
            </div>
        </div>
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
                            <h3 class="card-title">New Tenant Details </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <span style="color:red;"></span>
                        {!! Form::open(['files' => 'true','method' => 'post', 'route' => 'tenant-store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('first_name', 'First Name', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::text('first_name', $value = old('first_name'), ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                                    @if ($errors->has('first_name'))
                                    <span style="color:red;">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::text('last_name', $value = old('last_name'), ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                                    @if ($errors->has('last_name'))
                                    <span style="color:red;">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('mobile_number', 'Mobile Number', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::text('mobile_number', $value = old('mobile_number'), ['class' => 'form-control', 'placeholder' => 'Mobile Number']) !!}
                                    @if ($errors->has('mobile_number'))
                                    <span style="color:red;">{{ $errors->first('mobile_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('room_number', 'Room Number', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::select('room_number', $rooms, null , ['class' => 'form-control', 'placeholder' => 'Select Room Number']) !!}
                                    @if ($errors->has('room_number'))
                                    <span style="color:red;">{{ $errors->first('room_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('image', 'Image Upload', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::file('image',['class' => 'form-control']); !!}
                                    @if ($errors->has('image'))
                                    <span style="color:red;">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit" name="submit" value="Submit"> Submit </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
