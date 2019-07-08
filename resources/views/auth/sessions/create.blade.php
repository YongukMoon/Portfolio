@extends('layouts.master')

@section('content')
    <div class="login col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2 class="text-center">
                {{ trans('users.sessions.title') }}
            </h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('sessions.store') }}">
            {{ csrf_field() }}

            @if ($return=request('return'))
                <input type="hidden" name="return" value="{{ $return }}">
            @endif

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">{{ trans('users.form.email') }}</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('users.form.email') }}">
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
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">
                        {{ trans('users.sessions.submit') }}
                    </button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <label for="remember">{{ trans('users.sessions.remember') }}</label>
                    <input type="checkbox"value="{{ old('remember', 1) }}" checked>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <p class="text-danger">
                        {{ trans('users.sessions.forget_text') }}
                        <a href="{{ route('remind.create') }}">{{ trans('users.sessions.forget_link') }}</a>
                    </p>
                </div>
            </div>
        </form>
        <hr>
        <div class="social text-center">
            {{ trans('users.sessions.social_login') }} : 
            <a href="{{ route('social.login', ['provider'=>'github']) }}">
                <i class="fa fa-github" aria-hidden="true"></i> {{ trans('users.sessions.social_github_link') }}
            </a>
        </div>
    </div>
@endsection