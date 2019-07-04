@php
    $viewName='articles.index';
@endphp

@extends('layouts.master')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>Article list</h2>
        </div>

        <div class="text-right">
            <a href="{{ route('articles.create') }}" type="button" class="btn btn-default">Create</a>
        </div>

        @include('tags.index')

        <article class="col-md-10">
            @forelse ($articles as $article)
                @include('articles.partial.article')
            @empty
                <p class="text-danger">Empty</p>
            @endforelse
        </article>

        <div class="text-center">
            {{ $articles->appends(Request::except('page'))->render() }}
        </div>
    </div>
@endsection