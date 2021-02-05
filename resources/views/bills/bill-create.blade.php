@extends('layouts.front-layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info bg-primary">
                        <h1 class="text-center text-light"> Tenant Invoice </h1>
                    </div>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4 id="globe_heading">
                                    <i class="fas fa-globe"></i> Rent Care
                                    <p class="float-right">Invoice Date:- <span>{{ date('d-m-Y') }} </span></p>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        {!! Form::open(['method' => 'post', 'route' => 'bill-store']) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('name', 'Name', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::select('user_id', $users, '' , ['class' => 'form-control', 'placeholder'
                                    => 'Select Name', 'id' => 'userId']) !!}
                                    @if ($errors->has('user_id'))
                                    <span style="color:red;">{{ $errors->first('user_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('room number', 'Room Number', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::select('room_number', $rooms, null , ['class' =>
                                    'form-control','placeholder' => 'Select Room', 'id' => 'roomId']) !!}
                                    @if ($errors->has('room_number'))
                                    <span style="color:red;">{{ $errors->first('room_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('invoice Number', 'Invoice Number', ['class' => 'col-md-6
                                    control-label']) !!}
                                    {!! Form::text('invoice_number', $value = old('invoice_number'), ['class' =>
                                    'form-control', 'placeholder' => 'Invoice Number']) !!}
                                    @if ($errors->has('invoice_number'))
                                    <span style="color:red;">{{ $errors->first('invoice_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('mobile Number', 'Mobile Number', ['class' => 'col-md-6
                                    control-label']) !!}
                                    {!! Form::text('mobile_number', $value = old('mobile_number'), ['class' =>
                                    'form-control', 'placeholder' => 'Mobile Number', 'id' => 'mobile_number']) !!}
                                    @if ($errors->has('mobile_number'))
                                    <span style="color:red;">{{ $errors->first('mobile_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('from date', 'From Date', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::date('from_date', \Carbon\Carbon::now(), ['class' => 'form-control',
                                    'placeholder' => 'From Date']); !!}
                                    @if ($errors->has('from_date'))
                                    <span style="color:red;">{{ $errors->first('from_date') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('to date', 'To Date', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::date('to_date', \Carbon\Carbon::now(), ['class' =>
                                    'form-control','placeholder' => 'To Date']); !!}
                                    @if ($errors->has('to_date'))
                                    <span style="color:red;">{{ $errors->first('to_date') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('rent amount', 'Rent Amount', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::select('rent_amount', $rent, null , ['class' =>
                                    'form-control','placeholder' => 'Select Rent Amount']) !!}
                                    @if ($errors->has('rent_amount'))
                                    <span style="color:red;">{{ $errors->first('rent_amount') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('electricity unit', 'Electricity Unit', ['class' => 'col-md-6
                                    control-label']) !!}
                                    {!! Form::text('electricity_unit', $value = old('electricity_unit'), ['class' =>
                                    'form-control', 'placeholder' => 'Electricity Unit']) !!}
                                    @if ($errors->has('electricity_unit'))
                                    <span style="color:red;">{{ $errors->first('electricity_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('water unit', 'Water Unit', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::text('water_unit', $value = old('water_unit'), ['class' => 'form-control',
                                    'placeholder' => 'Water Unit']) !!}
                                    @if ($errors->has('water_unit'))
                                    <span style="color:red;">{{ $errors->first('water_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('total paid', 'Total Paid', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::text('total_paid', $value = old('total_paid'), ['class' => 'form-control',
                                    'placeholder' => 'Total Paid']) !!}
                                    @if ($errors->has('total_paid'))
                                    <span style="color:red;">{{ $errors->first('total_paid') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('total dues', 'Total Dues', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::text('total_dues', $value = old('total_dues'), ['class' => 'form-control',
                                    'placeholder' => 'Total Dues']) !!}
                                    @if ($errors->has('total_dues'))
                                    <span style="color:red;">{{ $errors->first('total_dues') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-2">
                                    <button class="btn btn-primary" type="submit" name="submit" value="Submit"> Submit
                                    </button>
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
@section('scripts')
<script>
$('#userId').on('change', function() {
    var userId = this.value;
    $.ajax({
               type:'GET',
               url:'{{ route('get-user-info') }}' + '/' +  userId ,
               success:function(data) {
                 
                
                $('#mobile_number').val(data.mobile_number) ; 

               }
            });

});
</script>
hellow erold
@endsection