@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id="btn"> Tenant Dues List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-4 offset-4">
            @if (session('success'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <nav class="navbar navbar-light">
                                    {{-- <div class="col-md-12">
                                        {!! Form::open(['method' => 'get', 'route' => 'tenant-index', 'role' => 'form', 'class' => 'form-inline']) !!}
                                            {!! Form::text('search', $value = request('search'), ['placeholder' => 'Search By Name,Room','aria-label' => 'Search','class' => 'form-control']) !!}
                                            <br>
                                            {!! Form::selectMonth('month',$value = request('month'), ['placeholder' => 'Search By Month','aria-label' => 'Search','class' => 'form-control ml-3']) !!}
                                            <br>
                                            {!! Form::selectYear('year', 2018, 2021, $value = request('year'), ['placeholder' => 'Search By Year','aria-label' => 'Search','class' => 'form-control ml-3']) !!}
                                            <br>
                                            <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit"> Search </button>
                                        {!! Form::close() !!}
                                    </div> --}}
                                </nav>
                            </div>
                            {{-- <a href="{{ route('tenant-create') }}" type="button" class="btn btn-primary float-right font-weight-bold text-light">Add Tenant</a> --}}
                        </div>
                        {{-- <div class="card-header">
                            <nav class="navbar navbar-light">
                                {!! Form::open(['method' => 'get', 'route' => 'tenant-index', 'role' => 'form', 'class' => 'form-inline']) !!}
                                {!! Form::text('search',$value = old('search'), ['placeholder' => 'Search Tenants','aria-label' => 'Search','class' => 'form-control']) !!}
                                <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit"> Search
                                </button>
                                {!! Form::close() !!}
                            </nav>

                        </div> --}}
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
                                    {{-- <th>Image</th> --}}
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $number = 1;
                                $numElementsPerPage = 5; // How many elements per page
                                $pageNumber = isset($_GET['page']) ? $_GET['page'] : 1 ;
                                $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                                @endphp
                                @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $currentNumber++ }}</td>
                                    <td>{{ $bill->id }}</td>
                                    <td>{{ $bill->user->first_name }}</td>
                                    <td>{{ $bill->user->last_name }}</td>
                                    <td>{{ $bill->user->mobile_number }}</td>
                                    <td>{{ $bill->get_room->room_number??'nullroom' }}</td>
                                    {{-- <td>
                                         @if(!empty($user->get_images))
                                        @foreach ($user->get_images as $images)
                                        <img src="{{ asset('/images').'/'.$images->image }}" height="20px" width="20px">
                                        @endforeach
                                        @endif
                                    </td>--}}
                                    <td>
                                        <a href="{{ route('tenant-show',[$bill->id]) }}" type="button" class="btn btn-danger">View</a>
                                        <a href="{{ route('tenant-edit',[$bill->id]) }}" type="button" class="btn btn-success">Edit</a>
                                        <a href="{{ route('tenant-delete', [$bill->id]) }}" type="button" class="btn btn-primary" onClick="return confirm('Are You Sure Want to Delete?')">Delete</a>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 offset-5 text-center mt-3 mb-3">
                {{-- <span>{{ $users->links() }}</span> --}}
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection