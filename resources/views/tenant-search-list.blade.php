@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id="btn"> Search List </h1>
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
                        @error('no_post_result')
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ $message }} </strong>                             
                        </div>
                        @enderror                        
                        <div class="card-header">
                            <nav class="navbar navbar-light">
                                {!! Form::open(['method' => 'get', 'route' => 'tenant-search', 'role' => 'form', 'class' => 'form-inline']) !!}
                                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search Tenants" aria-label="Search" value="{{ request('search') }} ">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search </button>
                                {!! Form::close() !!}
                                <a href="{{ route('tenant-create') }}" type="button"
                                    class="btn btn-primary float-right font-weight-bold text-light">Add Tenant</a>
                            </nav>
                        </div>
                        <!-- /.card-header -->
                        <table id="example2" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile Number</th>
                                    <th>Room Number</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $number = 1;
                                $numElementsPerPage = 5; // How many elements per page
                                $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                                echo "<td>  ". $currentNumber++ ." </td>";
                                @endphp
                                @foreach ($search_results as $search_result)
                                <tr>
                                    <td>{{ $number++;}}</td>
                                    <td>{{ $search_result->id }}</td>
                                    <td>{{ $search_result->first_name }}</td>
                                    <td>{{ $search_result->last_name }}</td>
                                    <td>{{ $search_result->mobile_number }}</td>
                                    <td>{{ $search_result->get_room->room_number }}</td>
                                    <td>
                                        <a href="{{ route('tenant-show',[$search_result->id]) }}" type="button" class="btn btn-danger">View</a>
                                        <a href="{{ route('tenant-edit',[$search_result->id]) }}" type="button" class="btn btn-success">Edit</a>
                                        <a href="{{ route('tenant-delete', [$search_result->id]) }}" type="button" class="btn btn-primary">Delete</a>
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