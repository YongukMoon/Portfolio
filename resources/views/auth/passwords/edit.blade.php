@extends('layouts.master')

@section('content')
    <div class="edit col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2 class="text-center">{{ trans('users.passwords.edit.title') }}</h2>
        </div>

        <form class="form-horizontal" action="{{ route('passwords.update', $user->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">{{ trans('users.passwords.edit.org_pw') }}</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="original_password" placeholder="{{ trans('users.passwords.edit.org_pw') }}">
                    {!! $errors->first('original_password', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">{{ trans('users.passwords.edit.new_pw') }}</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="new_password" placeholder="{{ trans('users.passwords.edit.new_pw') }}">
                    {!! $errors->first('new_password', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-3 control-label">{{ trans('users.passwords.edit.new_pw_confirm') }}</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="{{ trans('users.passwords.edit.new_pw_confirm') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">{{ trans('users.passwords.edit.submit') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection