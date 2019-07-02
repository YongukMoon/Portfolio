@extends('layouts.master')

@section('content')
    <div class="reset">
        <div class="page-header">
            <h2 class="text-center">
                Password reset
            </h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('reset.store') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">New password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password" placeholder="New password (필수)">
                    {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-3 control-label">New password confirm</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="New password confirm (필수)">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection