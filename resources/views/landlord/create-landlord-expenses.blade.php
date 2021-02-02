@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Expenses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-4 offset-4">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ session('success') }}</strong>
            </div>
            @endif
        </div>
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
                            <h3 class="card-title">Admin Expenses </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <span style="color:red;"></span>
                        {!! Form::open(['method' => 'get', 'route' => 'store-landlord-expenses']) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('month', 'Month', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::selectMonth('month',$value = request('month'), ['placeholder' => 'Select a
                                    Month','aria-label' => 'Search','class' => 'form-control']) !!}
                                    @if ($errors->has('month'))
                                    <span style="color:red;">{{ $errors->first('month') }}</span>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group col-md-6">
                                    {!! Form::label('maintenence', 'Maintenence', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::text('maintenance', $value = old('maintenance'), ['class' =>
                                    'form-control', 'placeholder' => 'Add Maintenance Amount']) !!}
                                    @if ($errors->has('maintenance'))
                                    <span style="color:red;">{{ $errors->first('maintenance') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('total_electricity_bill', 'Total Electricity Bill', ['class' =>
                                    'col-md-6 control-label']) !!}
                                    {!! Form::text('total_electricity_bill', $value = old('total_electricity_bill'),
                                    ['class' => 'form-control', 'placeholder' => 'Total Electricity Bill Amount']) !!}
                                    @if ($errors->has('total_electricity_bill'))
                                    <span style="color:red;">{{ $errors->first('total_electricity_bill') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('total_water_bill', 'Total Water Bill', ['class' => 'col-md-6
                                    control-label']) !!}
                                    {!! Form::text('total_water_bill', $value = old('total_water_bill'), ['class' =>
                                    'form-control', 'placeholder' => 'Total Water Bill Amount']) !!}
                                    @if ($errors->has('total_water_bill'))
                                    <span style="color:red;">{{ $errors->first('total_water_bill') }}</span>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button class="btn btn-info text-light" type="submit" name="submit"
                                        value="Submit">Submit</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
@endsection
