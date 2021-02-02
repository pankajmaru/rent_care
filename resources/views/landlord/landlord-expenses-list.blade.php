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
        <div class="col-md-4 offset-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 id="btn"> Landlord Expenses lists</h1>
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
                        <div class="card-header">
                            <div class="row">
                                {{-- <nav class="navbar navbar-light">
                                    {!! Form::model($exp_lists, array('route' => array('update-landlord-expenses',$exp_lists->id) ,'files'=>'true')) !!}
                                        {!! Form::text('search', $value = request('search'), ['placeholder' => 'Search Month','aria-label' => 'Search','class' => 'form-control']) !!}
                                        <br>
                                        {!! Form::selectMonth('month',$value = request('month'), ['placeholder' => 'Search By Month','aria-label' => 'Search','class' => 'form-control ml-3']) !!}
                                        <br>
                                        {!! Form::selectYear('year', 2018, 2021, $value = request('year'), ['placeholder' => 'Search By Year','aria-label' => 'Search','class' => 'form-control ml-3']) !!}
                                        <br>
                                        <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit"> Search </button>
                                    {!! Form::close() !!}
                                </nav> --}}
                            </div>
                            <a href="{{ route('create-landlord-expenses') }}" type="button" class="btn btn-primary float-right font-weight-bold text-light mb-4 mt-3">Add New Expenses</a>
                        </div>
                        <!-- /.card-header -->
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Month</th>
                                    <th>Electricity Bill Amount</th>
                                    <th>Water Bill Amount</th>
                                    <th>Maintainence</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                $number = 1;
                                $numElementsPerPage = 5; // How many elements per page
                                $pageNumber = isset($_GET['page']) ? $_GET['page'] : 1 ;
                                $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                                @endphp --}}
                                @php
                                $i = 1;
                                @endphp
                                @foreach($exp_lists as $exp_list)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ date("F", mktime(0, 0, 0, $exp_list->month, 1)) }}</td>
                                    <td>{{ $exp_list->total_electricity_bill??'null' }}</td>
                                    <td>{{ $exp_list->total_water_bill??'null' }}</td>
                                    <td>{{ $exp_list->maintenance??'null' }}</td>
                                    <td>
                                        {{-- <a href="{{ route('bill-view',[$exp_list->id]) }}" type="button" class="btn btn-danger">View</a> --}}
                                        <a href="{{ route('edit-landlord-expenses',[$exp_list->id]) }}" type="button" class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete-landlord-expenses',[$exp_list->id]) }}" type="button" class="btn btn-primary" onClick="return confirm('Are You Sure Want to Delete?')">Delete</a>
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
        <div class="row">
            <div class="col-md-5 offset-5 mt-3">
                {{-- <span>{{ $exp_lists->links() }}</span> --}}
            </div>
        </div> 
    </section>
    <!-- /.content -->
</div>
@endsection


