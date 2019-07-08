@extends('layouts.master')

@section('content')
    <div class="register col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2 class="text-center">{{ trans('users.create.title') }}</h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('users.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">{{ trans('users.form.name') }}</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ trans('users.form.name') }}">
                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">{{ trans('users.form.email') }}</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('users.create.email_placeholder') }}">
                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">{{ trans('users.form.password') }}</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password" placeholder="{{ trans('users.form.password') }}">
                    {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-3 control-label">{{ trans('users.form.password_confirm') }}</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('users.form.password_confirm') }}">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="phone_number" class="col-sm-3 control-label">{{ trans('users.form.phone_number') }}</label>
                <div class="col-sm-7">
                    <input type="tel" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="{{ trans('users.form.phone_number') }}">
                    {!! $errors->first('phone_number', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label">{{ trans('users.form.address') }}</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="{{ trans('users.form.address') }}">
                    {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">{{ trans('users.create.submit') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection