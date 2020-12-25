@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Tenant Image</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Tenant Image</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <span style="color:red;"></span>
                        {!! Form::open(['method' => 'post', 'route' => 'tenant-image-store']) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <select name="name" class="form-control">
                                        <option value="">Select Name</option>
                                    </select>
                                    @if ($errors->has('name'))
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div> --}}
                                <div class="form-group col-md-6">
                                    <label for="fileupload">Image Upload</label>
                                    <input type="file" class="form-control" placeholder="Image Upload" name="fileupload" value="fileupload">
                                    @if ($errors->has('fileupload'))
                                    <span style="color:red;">{{ $errors->first('fileupload') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit" name="submit" value="Submit"> Submit
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
