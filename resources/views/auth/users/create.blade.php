@extends('layouts.master')

@section('content')
    <div class="register">
        <div class="page-header">
            <h2>User register</h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('users.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name (필수)">
                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email 이 Login ID 가 됩니다. (필수)">
                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password (필수)">
                    {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label">Password confirm</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirm (필수)">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="phone_number" class="col-sm-2 control-label">Phone number</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone number (선택)">
                    {!! $errors->first('phone_number', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address (선택)">
                    {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Register</button>
                </div>
            </div>
        </form>
    </div>
@endsection