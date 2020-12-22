@extends('layouts.front-layout')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content">      
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="callout callout-info bg-primary">
                  <h1 class="text-center text-light"> Tenant invoice </h1>
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
                           <select name="name" class="form-control">
                              <option value="">Select Name</option>
                              @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Room Number</label>
                           <select name="room_number" class="form-control">
                              <option value="">Select Room</option>
                              @foreach ($rooms as $room)
                              <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Bill Number</label>
                           <input type="text" class="form-control" placeholder="Bill Number"
                              name="bill_number">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Mobile Number</label>
                           <input type="text" class="form-control" placeholder="Mobile Number"
                              name="mobile_number">
                        </div>
                        <div class="form-group col-md-6">
                           <label>From Date</label>
                           <input type="date" class="form-control" placeholder="From Date"
                              name="from_date">
                        </div>
                        <div class="form-group col-md-6">
                           <label>To Date</label>
                           <input type="date" class="form-control" placeholder="To Date"
                              name="to_date">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Rent Amount</label>
                           <input type="text" class="form-control" placeholder="Rent Amount"
                              name="rent_amount">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Electricity Unit</label>
                           <input type="text" class="form-control" placeholder="Electricity Unit"
                              name="electricity_unit">
                        </div>
                        <div class="form-group col-md-6">
                           <label>Water Unit</label>
                           <input type="text" class="form-control" placeholder="Water Unit"
                              name="water_unit">
                        </div>
                        {{-- <div class="form-group col-md-6">
                           <label>Due Amount</label>
                           <input type="text" class="form-control" placeholder="due Amount"
                              name="due_amount">
                        </div> --}}
                     </div>                                       
                     <div class="row no-print">
                        <div class="col-0">                           
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

