@extends('layouts.master')

@section('content')
    <div class="reset col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2 class="text-center">
                {{ trans('users.passwords.reset.title') }}
            </h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('reset.store') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">{{ trans('users.passwords.edit.new_pw') }}</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password" placeholder="{{ trans('users.passwords.edit.new_pw') }}">
                    {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-3 control-label">{{ trans('users.passwords.edit.new_pw_confirm') }}</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('users.passwords.edit.new_pw_confirm') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">{{ trans('users.passwords.reset.submit') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection