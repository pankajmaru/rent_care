@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="alert alert-warning alert-dismissible fade show" style="display:none;" role="alert"
            id="data-success">
            your Data Deleted Successfully!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id="btn"> Bill lists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible">                            
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session('success') }}</strong>
                          </div>
                          @endif
                        <div class="card-header">
                            <nav class="navbar navbar-light">
                                <form class="form-inline" role="form" action="" method="get">
                                    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                                <a href="{{ route('bill-create') }}" type="button"
                                    class="btn btn-primary float-right font-weight-bold text-light">Add New Bill</a>
                            </nav>
                        </div>
                        <!-- /.card-header -->
                        <div class="alert alert-warning alert-dismissible fade show" style="display:none;" role="alert"
                            id="success">
                            your Data Delted Successfully!!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Room Number</th>
                                    <th>Invoice Number</th>                                                                     
                                    {{-- <th>Net Amount</th>                                                                      --}}
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $i = 1;
                                @endphp
                                @foreach ($bills as $bill)
                                <tr>                                    
                                    <td>{{ $i++ }}</td>                                    
                                    <td>{{ $bill->id }}</td>                                    
                                    <td>{{ $bill->name->first_name }}</td>
                                    <td>{{ $bill->room->room_number }}</td>                              
                                    <td>{{ $bill->invoice_number }}</td>
                                    {{-- <td>{{ $bill->net_amount  }}</td> --}}
                                    <td>
                                        <a href="{{ route('bill-view',[$bill->id]) }}" type="button" class="btn btn-danger">View</a>
                                        <a href="{{ route('bill-edit',[$bill->id]) }}" type="button" class="btn btn-success">Edit</a>
                                        <a href="{{ route('tenant-delete', [$bill->id]) }}" type="button" class="btn btn-primary">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
