@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    
    <section class="content-header">        
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id="btn"> Bill Search lists</h1>
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
                            <div class="row">
                                <nav class="navbar navbar-light">
                                    {!! Form::open(['method' => 'get', 'route' => 'bill-search', 'role' => 'form', 'class' => 'form-inline']) !!}                                    
                                        {{-- {!! Form::label('name', 'Name', ['class' => 'col-md-6 control-label']) !!}  --}}
                                        {!! Form::text('search',$value = old('search'), ['placeholder' => 'Search By Name','aria-label' => 'Search','class' => 'form-control']) !!}
                                        <br>
                                        {!! Form::selectMonth('month',$value = old('search'),['placeholder' => 'Search By Month','aria-label' => 'Search','class' => 'form-control ml-3']) !!}
                                        <br>
                                        {!! Form::selectYear('year', 2018, 2021, $value = old('search'), ['placeholder' => 'Search By Year','aria-label' => 'Search','class' => 'form-control ml-3']) !!}
                                        <br>                                        
                                        <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit"> Search </button>
                                    {!! Form::close() !!}
                                </nav>
                            </div>
                            <a href="{{ route('bill-create') }}" type="button" class="btn btn-primary float-right font-weight-bold text-light">Add New Bill</a>
                        </div>
                        <!-- /.card-header -->                        
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Room Number</th>
                                    <th>Invoice Number</th>                                                             
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
                                    <td>{{ $search_result->id }}</td>
                                    <td>{{ $search_result->user->first_name }}</td>
                                    <td>{{ $search_result->room->room_number }}</td>                              
                                    <td>{{ $search_result->invoice_number }}</td>
                                    <td>                             
                                        <a href="{{ route('bill-view',[$search_result->id]) }}" type="button" class="btn btn-danger">View</a>           
                                        <a href="{{ route('bill-edit',[$search_result->id]) }}" type="button" class="btn btn-success">Edit</a>
                                        <a href="{{ route('bill-delete',[$search_result->id]) }}" type="button" class="btn btn-primary">Delete</a>
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
