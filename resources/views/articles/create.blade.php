@extends('layouts.master')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>Article create</h2>
        </div>

        <form action="{{ route('articles.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
                {!! $errors->first('title', '<span>:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content">{{ old('content') }}</textarea>
                {!! $errors->first('content', '<span>:message</span>') !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Store</button>
            </div>
        </form>
    </div>
@endsection