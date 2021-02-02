@extends('layouts.front-layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info bg-primary">
                        <h1 class="text-center text-light"> Edit Tenant Invoice </h1>
                    </div>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Rent Care                                    
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        {!! Form::model($bills, array('route' => array('bill-update',$bills->id))) !!}                        
                        @csrf
                        @method('get')
                        <div class="card-body">
                            <div class="row">                                
                                <div class="form-group col-md-6">
                                    {!! Form::label('name', 'Name', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::select('user_id', $users, $value = ['users' => 'id'] , ['class' => 'form-control', 'placeholder' => 'Select Name']) !!}
                                    @if ($errors->has('user_id'))
                                    <span style="color:red;">{{ $errors->first('user_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('room number', 'Room Number', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::select('room_number', $rooms, null , ['class' => 'form-control','placeholder' => 'Select Room']) !!}
                                    @if ($errors->has('room_number'))
                                    <span style="color:red;">{{ $errors->first('room_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('invoice Number', 'Invoice Number', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('invoice_number', $value = old('invoice_number'), ['class' => 'form-control', 'placeholder' => 'Invoice Number']) !!}
                                    @if ($errors->has('invoice_number'))
                                    <span style="color:red;">{{ $errors->first('invoice_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('mobile Number', 'Mobile Number', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('mobile_number', $value = $bills->user->mobile_number, ['class' => 'form-control', 'placeholder' => 'Mobile Number']) !!}
                                    @if ($errors->has('mobile_number'))
                                    <span style="color:red;">{{ $errors->first('mobile_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('from date', 'From Date', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::date('from_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'From Date']); !!}
                                    @if ($errors->has('from_date'))
                                    <span style="color:red;">{{ $errors->first('from_date') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                 {!! Form::label('to date', 'To Date', ['class' => 'col-md-6 control-label']) !!}
                                 {!! Form::date('to_date', \Carbon\Carbon::now(), ['class' => 'form-control','placeholder' => 'To Date']); !!}                                    
                                    @if ($errors->has('to_date'))
                                    <span style="color:red;">{{ $errors->first('to_date') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                 {!! Form::label('rent amount', 'Rent Amount', ['class' => 'col-md-6 control-label']) !!}
                                 {!! Form::text('rent_amount', $value = $bills->room->rent_amount, ['class' => 'form-control', 'placeholder' => 'Rent Amount']) !!}                                    
                                    @if ($errors->has('rent_amount'))
                                    <span style="color:red;">{{ $errors->first('rent_amount') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                 {!! Form::label('electricity unit', 'Electricity Unit', ['class' => 'col-md-6 control-label']) !!}
                                 {!! Form::text('electricity_unit', $value = old('electricity_unit'), ['class' => 'form-control', 'placeholder' => 'Electricity Unit']) !!}
                                    @if ($errors->has('electricity_unit'))
                                    <span style="color:red;">{{ $errors->first('electricity_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                 {!! Form::label('water unit', 'Water Unit', ['class' => 'col-md-6 control-label']) !!}
                                 {!! Form::text('water_unit', $value = old('water_unit'), ['class' => 'form-control', 'placeholder' => 'Water Unit']) !!}
                                    @if ($errors->has('water_unit'))
                                    <span style="color:red;">{{ $errors->first('water_unit') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-2">
                                    <button class="btn btn-primary" type="submit" name="submit" value="Submit"> Submit </button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.invoice -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
