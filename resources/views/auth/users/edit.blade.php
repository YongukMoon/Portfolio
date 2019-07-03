@extends('layouts.master')

@section('content')
    <div class="edit">
        <div class="page-header">
            <h2 class="text-center">User edit</h2>
        </div>

        <form class="form-horizontal" method="post" action="{{ route('users.update', $user->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Name (필수)">
                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-7">
                    <span class="form-control">{{ $user->email }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="phone_number" class="col-sm-3 control-label">Phone number</label>
                <div class="col-sm-7">
                    <input type="tel" class="form-control" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" placeholder="Phone number">
                    {!! $errors->first('phone_number', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}" placeholder="Address">
                    {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="submit" class="btn btn-default">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection