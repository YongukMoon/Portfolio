@php
    $viewName='articles.show';
@endphp

@extends('layouts.master')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>{{ $article->title }}</h2>
        </div>
    
        <article>
            @include('articles.partial.article')
            {!! markdown($article->content) !!}
        </article>

        @include('tags.partial.list', ['tags'=>$article->tags])
    
        <div class="text-center">
            <div class="btn-group" role="group">
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article->id) }}" type="button" class="btn btn-default">
                        {{ trans('articles.show.edit') }}
                    </a>
                @endcan
                
                @can('delete', $article)
                    <button type="button" class="btn btn-default article__delete">
                        {{ trans('articles.show.delete') }}
                    </button>
                @endcan

                <a href="{{ route('articles.index') }}" type="button" class="btn btn-default">
                    {{ trans('articles.show.index') }}
                </a>
            </div>
        </div>

        <hr>

        <div class="comment__container">
            @include('comments.index')
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        $('.article__delete').on('click', function(e){
            if(confirm('Article delete ?')){
                $.ajax({
                    type: 'DELETE',
                    url: '/articles/{{ $article->id }}'
                }).then(function(){
                    window.location.href='/articles';
                });
            }
        });
    </script>
@endsection