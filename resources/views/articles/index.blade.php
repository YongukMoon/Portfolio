@php
    $viewName='articles.index';
@endphp

@extends('layouts.master')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>Post list</h2>
        </div>

        <div class="text-right">
            <div class="btn-group" role="group">
                <a href="{{ route('articles.create') }}" type="button" class="btn btn-default">Create</a>
              
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        {{-- <li><a href="#">Dropdown link</a></li>
                        <li><a href="#">Dropdown link</a></li> --}}
                        @foreach (config('project.sorting') as $column => $text)
                            <li>{!! link_for_sort($column, $text) !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
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