@php
    $viewName='articles.index';
@endphp

@extends('layouts.master')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2><i class="fa fa-list" aria-hidden="true"></i> {{ trans('articles.index.title') }}</h2>
        </div>

        <div class="text-right">
            <div class="btn-group" role="group">
                <a href="{{ route('articles.create') }}" type="button" class="btn btn-default">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('articles.index.create') }}
                </a>
              
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ trans('articles.index.sort') }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach (config('project.sorting') as $column => $text)
                            <li>{!! link_for_sort($column, $text) !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            @include('tags.index')
        </div>

        <article class="col-md-9">
            @forelse ($articles as $article)
                @include('articles.partial.article')
            @empty
                <p class="text-danger">{{ trans('articles.index.empty') }}</p>
            @endforelse
        </article>

        <div class="text-center">
            {{ $articles->appends(Request::except('page'))->render() }}
        </div>
    </div>
@endsection