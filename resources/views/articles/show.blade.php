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
    
        <div class="text-center">
            <div class="btn-group" role="group">
                <a href="{{ route('articles.edit', $article->id) }}" type="button" class="btn btn-default">Edit</a>
                <button type="button" class="btn btn-default article__delete">Delete</button>
                <a href="{{ route('articles.index') }}" type="button" class="btn btn-default">Index</a>
            </div>
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