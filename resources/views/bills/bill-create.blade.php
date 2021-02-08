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
                        </div>
                        <!-- info row -->
                        {!! Form::open(['method' => 'post', 'route' => 'bill-store','autocomplete' => 'off']) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('name', 'Name', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::select('user_id', $users, '' , ['class' => 'form-control', 'placeholder' => 'Select Name', 'id' => 'userId']) !!}
                                    @if ($errors->has('user_id'))
                                    <span style="color:red;">{{ $errors->first('user_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('room number', 'Room Number', ['class' => 'col-md-6 control-label'])
                                    !!}
                                    {!! Form::select('room_number', $rooms, null , ['class' => 'form-control','placeholder' => 'Select Room', 'id' => 'roomId', 'id' => 'room_id']) !!}
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
                                    {!! Form::text('mobile_number', $value = old('mobile_number'), ['class' => 'form-control', 'placeholder' => 'Mobile Number', 'id' => 'mobile_number']) !!}
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
                                    {!! Form::text('rent_amount', $value = old('rent_amount') , ['class' => 'form-control','placeholder' => 'Select Rent Amount','id' => 'rent_amount']) !!}
                                    @if ($errors->has('rent_amount'))
                                    <span style="color:red;">{{ $errors->first('rent_amount') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('electricity unit', 'Electricity Unit', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('electricity_unit', $value = old('electricity_unit'), ['class' => 'form-control', 'placeholder' => 'Electricity Unit']) !!}
                                    @if ($errors->has('electricity_unit'))
                                    <span style="color:red;">{{ $errors->first('electricity_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('elec per unit', 'Electricity Per Unit', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('elec_per_unit', $sites , null ,$value = old('elec_per_unit'), ['class' => 'form-control', 'placeholder' => 'Electricity Per Unit', 'id' => 'elec_per_unit']) !!}
                                    @if ($errors->has('elec_per_unit'))
                                    <span style="color:red;">{{ $errors->first('elec_per_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('water unit', 'Water Unit', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('water_unit', $value = old('water_unit'), ['class' => 'form-control','placeholder' => 'Water Unit']) !!}
                                    @if ($errors->has('water_unit'))
                                    <span style="color:red;">{{ $errors->first('water_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('water per unit', 'Water Per Unit', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('water_per_unit', $value = old('water_per_unit'), ['class' => 'form-control', 'placeholder' => 'Water Per Unit']) !!}
                                    @if ($errors->has('water_per_unit'))
                                    <span style="color:red;">{{ $errors->first('water_per_unit') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('total paid', 'Total Paid', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('total_paid', $value = old('total_paid'), ['class' => 'form-control', 'placeholder' => 'Total Paid']) !!}
                                    @if ($errors->has('total_paid'))
                                    <span style="color:red;">{{ $errors->first('total_paid') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('total dues', 'Total Dues', ['class' => 'col-md-6 control-label']) !!}
                                    {!! Form::text('total_dues', $value = old('total_dues'), ['class' => 'form-control',
                                    'placeholder' => 'Total Dues']) !!}
                                    @if ($errors->has('total_dues'))
                                    <span style="color:red;">{{ $errors->first('total_dues') }}</span>
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
@section('scripts')
<script>
$('#userId').on('change', function() {
    var userId = this.value;
    $.ajax({
        type:'GET',
        url:'{{ route('get-user-info') }}' + '/' + userId,
        success:function(data) {
            $('#mobile_number').val(data.mobile_number);
        }
    });
});
</script>

<script>
$('#room_id').on('change',function(){ //this on change funciton uses here for get dropdown values//
    var roomId = this.value;// first we define varaible which i dont know why we do it, but i figure it out very soon, why we use here this.value??? //
    $.ajax({
        type:'GET',
        url:'{{ route('get-room-info') }}' + '/' + roomId,
        success:function(data) {// here data you got in browser in inspect element in request option and then output shows in response option //
            $('#rent_amount').val(data.rent_amount);
        }
    });
});
</script>

<script>
    $('#elec_per_unit').on('click',function(){ //this on change funciton uses here for get dropdown values//
        alert('hellow orld'); die ;
        var roomId = this.value;// first we define varaible which i dont know why we do it, but i figure it out very soon, why we use here this.value??? //
        $.ajax({
            type:'GET',
            url:'{{ route('get-room-info') }}' + '/' + roomId,
            success:function(data) {// here data you got in browser in inspect element in request option and then output shows in response option //
                $('#rent_amount').val(data.rent_amount);
            }
        });
    });
</script>

@endsection