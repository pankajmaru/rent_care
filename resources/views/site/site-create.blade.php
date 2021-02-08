@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Unit</h1>
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
            <div class="col-md-4 offset-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">New unit </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <span style="color:red;"></span>
                        {!! Form::open(['method' => 'get', 'route' => 'site-store']) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{-- <label> Add unit</label>
                                    <input type="text" class="form-control dropdown-toggle" placeholder="Add unit" name="unit_number" data-toggle="dropdown"> --}}
                                    {!! Form::label('add water per unit', 'Add Water Per Unit', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::number('water_per_unit', $value = old('water_per_unit'), ['class' => 'form-control', 'placeholder' => 'Add Water Per Unit']) !!}
                                    @if ($errors->has('water_per_unit'))
                                    <span style="color:red;">{{ $errors->first('water_per_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('elec_per_unit', 'Add Electicity Per Unit', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::number('elec_per_unit', $value = old('elec_per_unit'), ['class' => 'form-control', 'placeholder' => 'Electricity Per Unit']) !!}
                                    @if ($errors->has('elec_per_unit'))
                                    <span style="color:red;">{{ $errors->first('elec_per_unit') }}</span>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button class="btn btn-info text-light" type="submit" name="submit" value="Submit">Submit</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
@endsection