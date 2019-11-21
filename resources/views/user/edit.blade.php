@extends('layouts.admin')

<!-- Main Content -->
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph text-success">
                    </i>
                </div>
                <div>Form Layouts
                    <div class="page-title-subheading">Build whatever layout you need with our Architect framework.
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Add User</h5>
            {!! Form::open(['route' => array('user.update', $user->id), 'method' => 'put', 'class' => 'form-horizontal', 'id' => 'myform', 'files' => 'true', 'enctype' => "multipart/form-data"]) !!}
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                        	<label for="username" class="">Usename</label>
                        	<input name="username" id="username" placeholder="Enter Username" type="text" value="{{ old('username', $user->username) }}" class="form-control" onfocus="this.removeAttribute('readonly');" readonly>
                        	@if($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                        	<label for="password" class="">Password</label>
                        	<input name="password" id="password" placeholder="Enter Password" type="password" class="form-control">
                        	@if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="email" class="">Email</label>
                            <input name="email" id="email" placeholder="Enter Email" type="email" value="{{ old('email', $user->email) }}" class="form-control">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="phone" class="">Phone</label>
                            <input name="phone" id="phone" placeholder="Enter Phone" type="text" value="{{ old('phone', $user->phone) }}" class="form-control">
                            @if($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="avatar" class="">Avatar/Profile Image</label>
                            <input name="avatar" id="avatar" type="file" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="cover_image" class="">Cover Image</label>
                            <input name="cover_image" id="cover_image" type="file" class="form-control-file">
                        </div>
                    </div>
                </div>

                <button class="mt-2 btn btn-primary">SAVE</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection