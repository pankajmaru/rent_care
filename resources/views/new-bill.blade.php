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
                        <h4>
                           <i class="fas fa-globe"></i> Rent Care
                           <small class="float-right">Invoice Date: 2/10/2014</small>
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
                           <label>Name</label>
                           <select name="user_id" class="form-control">
                              <option value="">Select Name</option>
                              @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</option>
                              @endforeach
                           </select>
                           @if ($errors->has('user_id'))
                           <span style="color:red;">{{ $errors->first('user_id') }}</span>
                           @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Room</label>
                           <select name="room_number" class="form-control">
                              <option value="">Select Room</option>
                              @foreach ($rooms as $room)
                              <option value="{{ $room->room_id }}">{{ $room->room_number }}</option>
                              @endforeach
                           </select>
                           @if ($errors->has('room_number'))
                           <span style="color:red;">{{ $errors->first('room_number') }}</span>
                           @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Invoice Number</label>
                           <input type="text" class="form-control" placeholder="Invoice Number" name="invoice_number" value="{{ old('invoice_number') }}">
                              @if ($errors->has('invoice_number'))
                              <span style="color:red;">{{ $errors->first('invoice_number') }}</span>
                              @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Mobile Number</label>
                           <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number" value="{{ old('mobile_number') }}">
                              @if ($errors->has('mobile_number'))
                              <span style="color:red;">{{ $errors->first('mobile_number') }}</span>
                              @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>From Date</label>
                           <input type="date" class="form-control" placeholder="From Date"
                              name="from_date">
                              @if ($errors->has('from_date'))
                              <span style="color:red;">{{ $errors->first('from_date') }}</span>
                              @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>To Date</label>
                           <input type="date" class="form-control" placeholder="To Date"
                              name="to_date">
                              @if ($errors->has('to_date'))
                              <span style="color:red;">{{ $errors->first('to_date') }}</span>
                              @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Rent Amount</label>
                           <input type="text" class="form-control" placeholder="Rent Amount" name="rent_amount" value="{{ old('rent_amount') }}">
                              @if ($errors->has('rent_amount'))
                              <span style="color:red;">{{ $errors->first('rent_amount') }}</span>
                              @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Electricity Unit</label>
                           <input type="text" class="form-control" placeholder="Electricity Unit" name="electricity_unit" value="{{ old('electricity_unit') }}">
                              @if ($errors->has('electricity_unit'))
                              <span style="color:red;">{{ $errors->first('electricity_unit') }}</span>
                              @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Water Unit</label>
                           <input type="text" class="form-control" placeholder="Water Unit" name="water_unit" value="{{ old('water_unit') }}">
                              @if ($errors->has('water_unit'))
                              <span style="color:red;">{{ $errors->first('water_unit') }}</span>
                              @endif
                        </div>
                        {{-- <div class="form-group col-md-6">
                           <label>Sub Total</label>
                           <input type="text" class="form-control" placeholder="Sub Total" name="sub_total" value="{{ old('sub_total') }}">
                           @if ($errors->has('sub_total'))
                              <span style="color:red;">{{ $errors->first('sub_total') }}</span>
                           @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>GST</label>
                           <input type="text" class="form-control" placeholder="GST" name="gst" value="{{ old('gst') }}">
                           @if ($errors->has('gst'))
                              <span style="color:red;">{{ $errors->first('gst') }}</span>
                           @endif
                        </div>
                        <div class="form-group col-md-6">
                           <label>Net Amount</label>
                           <input type="text" class="form-control" placeholder="Net Amount" name="net_amount" value="{{ old('net_amount') }}">
                           @if ($errors->has('net_amount'))
                              <span style="color:red;">{{ $errors->first('net_amount') }}</span>
                           @endif
                        </div> --}}
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

