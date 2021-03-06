@php
    $viewName='articles.create';
@endphp

@extends('layouts.master')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('articles.create.title') }}</h2>
        </div>

        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('articles.partial.form')
            
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    {{ trans('articles.create.submit') }}
                </button>
            </div>
        </form>
    </div>
@endsection