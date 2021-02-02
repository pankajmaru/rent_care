@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-center">Edit Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 justify-content-center offset-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline text-center">
                        {!! Form::model($profile, array('route' => array('update-admin-profile',$profile->id), 'files' => 'true')) !!}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-8 offset-2">
                                    {!! Form::label('name', 'Name', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::text('name',  $value = old('name') , ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                    @if ($errors->has('name'))
                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-8 offset-2">
                                {!! Form::label('image','Image Upload', ['class' => 'col-md-6 control-label']) !!}
                                <br>
                                {!! Form::file('image', ['class' => 'form-control']) !!}
                                @if ($errors->has('image'))
                                <span style="color:red;">{{ $errors->first('image') }}</span>
                                @endif
                            </div> 
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button class="btn btn-primary" type="submit" name="submit" value="Submit"> Submit </button>
                        </div>
                        {!! Form::close() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->
    @endsection
