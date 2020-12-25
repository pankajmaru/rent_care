@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">    
    <section class="content-header">
        <div class="alert alert-warning alert-dismissible fade show" style="display:none;" role="alert"
            id="data-success">
            your Data Delted Successfully!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id="btn">Rooms Search List</h1>
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
                                {!! Form::open(['method' => 'get', 'route' => 'room-search', 'role' => 'form', 'class' => 'form-inline']) !!}
                                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search Tenants" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search </button>
                                {!! Form::close() !!}
                                <a href="{{ route('room-add') }}" type="button"
                                    class="btn btn-primary float-right font-weight-bold text-light">Add Room</a>
                            </nav>
                        </div>
                        <!-- /.card-header -->                        
                        <table id="example2" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Id</th>                                    
                                    <th>Room Number</th>
                                    <th>Rent Amount</th>                                    
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>         
                                @php
                                $i = 1;
                                @endphp                       
                                @foreach ($search_results as $search_result)
                                <tr>
                                    <td>{{ $i++ }}</td>                                    
                                    <td>{{ $search_result->room_id }}</td>                                                                   
                                    <td>{{ $search_result->room_number }}</td>
                                    <td>{{ $search_result->rent_amount }}</td>
                                    <td>
                                        <a href="{{ route('room-edit',[$search_result->room_id]) }}" type="button" class="btn btn-success">Edit</a>
                                        <a href="{{ route('room-delete',[$search_result->room_id]) }}" type="button" class="btn btn-primary">Delete</a>
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