@extends('layouts.front-layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Invoice</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Invoice</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <section class="content">
      <div class="container-fluid">
         @if (session('success'))
         <div class="alert alert-primary alert-dismissible col-md-4 offset-4">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <strong>{{ session('success') }}</strong>
         </div>
         @endif
         <div class="row">
            <div class="col-12 ">
               <div class="callout callout-info text-center text-danger bg-info">
                  <h1></i> Invoice View </h1>
               </div>
               <!-- Main content -->
               <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                     <div class="col-12">
                        <h4>
                           <i class="fas fa-globe"></i> Rent Care
                           <small class="float-right">Invoice Date: <span class="text-danger"> {{ $bills->user->created_at }} </span> </small>
                        </h4>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info mt-4">
                     <div class="col-sm-4 invoice-col">
                        <b>Name:- </b> <span class="text-danger"> {{ $bills->user->first_name }} </span><br>
                        <b>Mobile Number:- </b> <span class="text-danger"> {{ $bills->user->mobile_number }}
                        </span><br>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-4 invoice-col">
                        <b>Room Number:- </b> <span class="text-danger"> {{ $bills->room->room_number }}
                        </span><br>
                        <b> Invoice:- </b><span class="text-danger"> {{ $bills->invoice_number }} </span><br>
                     </div>
                  </div>
                  <!-- /.row -->
                  <div class="row mt-4">
                     <!-- accepted payments column -->
                     <div class="col-6">
                        <p class="lead">Payment Methods:</p>
                        <img src="../../dist/img/credit/visa.png" alt="Visa">
                        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="../../dist/img/credit/american-express.png" alt="American Express">
                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                           Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                           handango imeem
                           plugg
                           dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p>
                     </div>
                     <!-- /.col -->
                     <div class="col-6">
                        <div class="table-responsive">
                           <table class="table">
                              <tr>
                                 <th style="width:50%">Rent Amount:-</th>
                                 <td class="text-right text-danger"><b> {{ $bills->room->rent_amount }} </b></td>
                              </tr>
                              <tr>
                                 <th style="width:50%">Electricity Unit:-</th>
                                 <td class="text-right text-danger"><b> {{ $bills->electricity_unit }} </b></td>
                              </tr>
                              <tr>
                                 <th style="width:50%">Water Unit:-</th>
                                 <td class="text-right text-danger"><b> {{ $bills->water_unit }} </b></td>
                              </tr>                              
                              <tr class="border border-bottom-1 border-right-0">
                                 <th>Net Amount:-</th>
                                 <td class="text-right text-danger">
                                    <b>
                                     {{ $bills->net_amount }}
                                    </b>
                                 </td>
                              </tr>
                           </table>
                           {{-- <a href="{{ route('generate-pdf',['download'=>'pdf']) }}" type="button" class="btn btn-primary float-right text-light" style="margin-right: 5px;">
                              <i class="fas fa-download"></i> 
                              Generate PDF
                           </a> --}}
                           {{-- {{ dd($bills->id) }} --}}
                           <a href="{{ route('bill-mail-send',[$bills->id]) }}" type="button" class="btn btn-primary float-right text-light" style="margin-right: 5px;">
                              <i class="fas fa-paper-plane mr-1"></i>
                              Send Mail
                           </a>
                        </div>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
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
<!-- /.content-wrapper -->
@endsection

