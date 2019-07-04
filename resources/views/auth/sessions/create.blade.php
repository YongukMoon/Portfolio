@extends('layouts.master')

@section('content')
    <div class="login col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2 class="text-center">
                Login
            </h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('sessions.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <label for="remember">Login remember</label>
                    <input type="checkbox"value="{{ old('remember', 1) }}" checked>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <p class="text-danger">
                        Forget your password ?
                        <a href="{{ route('remind.create') }}">Click</a>
                    </p>
                </div>
            </div>
        </form>
        <hr>
        <div class="social text-center">
            Social login : <a href="{{ route('social.login', ['provider'=>'github']) }}">Github</a>
        </div>
    </div>
@endsection