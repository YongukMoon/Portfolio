@php
    $viewName='articles.edit';
@endphp

@extends('layouts.master')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h2>{{ trans('articles.edit.title') }}</h2>
        </div>

        <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            @include('articles.partial.form')
            
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    {{ trans('articles.edit.submit') }}
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    @parent
    <script>
        $('.attachment_delete').on('click', function(e){
            if(confirm('Image delete ?')){
                var self=$(this);

                $.ajax({
                    type: 'DELETE',
                    url: '/attachments/'+self.data('id')
                }).then(function(){
                    self.parent('li').fadeOut();
                });
            }
        });
    </script>
@endsection