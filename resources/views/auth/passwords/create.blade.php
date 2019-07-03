@extends('layouts.master')

@section('content')
    <div class="remind">
        <div class="page-header">
            <h2 class="text-center">Password remind</h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('remind.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">Send authentication email</button>
                </div>
            </div>
        </form>
    </div>
@endsection