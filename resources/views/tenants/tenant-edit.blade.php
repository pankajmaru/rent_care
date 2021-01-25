@extends('layouts.front-layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Tenant Details</h1>
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
                            <h3 class="card-title">Edit Tenant Details </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::model($users, array('route' => array('tenant-update',$users->id),'files'=>'true')) !!}
                        {{-- {{!! Form::open(['route' => ('tenant-update'$users->id),'class'=>'form-control','files'=>true]) !!}} --}}
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{-- <label>First Name</label> --}}
                                    {!! Form::label('first name','First Name') !!}
                                    <br>
                                    {!! Form::text('first_name', $value = $users->first_name, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                                    @if ($errors->has('first_name'))
                                    <span style="color:red;">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('last name','Last Name') !!}
                                    <br>
                                    {!! Form::text('last_name', $value = $users->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                                    @if ($errors->has('last_name'))
                                    <span style="color:red;">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('mobile number','Mobile Number') !!}
                                    <br>
                                    {!! Form::text('mobile_number', $value = $users->mobile_number, ['class' => 'form-control', 'placeholder' => 'Mobile Number']) !!}
                                    @if ($errors->has('mobile_number'))
                                    <span style="color:red;">{{ $errors->first('mobile_number') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('room number','Room Number') !!}
                                    <select name="room_id" class="form-control">
                                        @foreach ($rooms as $room)
                                        <option value="{{ $room->room_id }}" @php echo ($room->room_id == $users->room_id ) ? 'selected':'' @endphp>{{ $room->room_number }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('room_id'))
                                    <span style="color:red;">{{ $errors->first('room_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('image', 'Image Upload', ['class' => 'col-md-6 control-label']) !!}
                                    <br>
                                    {!! Form::file('image',['class' => 'form-control']); !!}
                                    @if ($errors->has('image'))
                                        <span style="color:red;">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-primary mt-1" type="submit" name="submit" value="Submit"> Submit </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
